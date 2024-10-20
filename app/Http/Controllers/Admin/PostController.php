<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\News;
use App\Models\Category;
use App\Models\Seo;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        //
        if($type == 'news-post'){
            $news = News::with('category')->get();
            return view('admin.post_management', ['page' => $type, 'posts' => $news]);
        }
        $posts = Post::all();
        return view('admin.post_management', ['page' => $type, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        $categories = Category::where('parent_id', null)->where('type', 'post-cate')->get();
        return view('admin.partials.post.addPostForm', ['page' => null, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());

        // Create a new Seo instance
        DB::beginTransaction();

        try {
            // Create a new Seo instance
            $seo = Seo::create([
                'title' => $request->input('seo-title'),
                'keyword' => $request->input('seo-keyword'),
                'description' => $request->input('seo-description'),
            ]);

            // Create a new Post instance

            //dd($seo->id);

            $post = Post::create([
                'description' => $request->input('post-description'),
                'content' => $request->input('content'),
                'seo_id' => $seo->id,
            ]);

            //dd($request->input('post-thumbnail'));

            // Create a new News instance
            $news = News::create([
                'slug' => $request->input('slug'),
                'images' => $request->input('post-thumbnail'),
                'title' => $request->input('title'),
                'category_id' => $request->input('category'),
                'post_id' => $post->id,
            ]);

            DB::commit();

            return redirect()->route('admin.post', ['type' => 'news-post'])->with('success', 'Post created successfully.');
            
        } catch (\Exception $e) 
        {       
                DB::rollBack();
                return redirect()->route('admin.post', ['type' => 'news-post'])->with('error', 'Failed to create post: ' . $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categories = Category::where('parent_id', null)->where('type', 'post-cate')->get();
        $news = News::where('id', $id)->with(['category', 'post.seo'])->first();
        // foreach($news as $new){
        //     dd($new->post->seo);
        // }
        //dd($news->post->seo);
        return view('admin.partials.post.updatePostForm', ['page' => null, 'news' => $news, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        // Retrieve the news item by its ID

        DB::beginTransaction();

        try {
            $news = News::with(['post.seo'])->findOrFail($request->input('id'));
            $isUpdated = false;

            // Update the news item
            $news->fill($request->only(['title', 'category', 'image', 'slug']));
            if ($news->isDirty()) {
                $news->save();
                $isUpdated = true;
            }

            // Update the related post
            $post = $news->post;
            $post->fill([
                'description' => $request->input('post-description'),
                'content' => $request->input('content')
            ]);
            if ($post->isDirty()) {
                $post->save();
                $isUpdated = true;
            }

            // Update the related SEO data
            $seo = $post->seo;
            $seo->fill([
                'keyword' => $request->input('seo-keyword'),
                'description' => $request->input('seo-description'),
                'title' => $request->input('seo-title')
            ]);
            if ($seo->isDirty()) {
                $seo->save();
                $isUpdated = true;
            }

            DB::commit();

            if ($isUpdated) {
                return redirect()->route('admin.post', ['type' => 'news-post'])->with('success', 'Cập nhật bài viết thành công');
            } else {
                return redirect()->route('admin.post', ['type' => 'news-post'])->with('info', 'Không có thay đổi nào được ghi nhận');
            }
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.post', ['type' => 'news-post'])->with('error', 'Cập nhật bài viết thất bại' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->input('del-post-id');
    
        DB::beginTransaction();

        try {
            $news = News::with(['post.seo'])->findOrFail($id);

            // Delete the related SEO instance
            $seo = $news->post->seo;
            if ($seo) {
                $seo->delete();
            }

            // Delete the related Post instance
            $post = $news->post;
            if ($post) {
                $post->delete();
            }

            // Delete the News instance
            $news->delete();

            DB::commit();

            return redirect()->route('admin.post', ['type' => 'news-post'])->with('success', 'Xóa bài viết thành công.');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.post', ['type' => 'news-post'])->with('error', 'Xóa bài viết thất bại. ' . $e->getMessage());
        }

    }
}
