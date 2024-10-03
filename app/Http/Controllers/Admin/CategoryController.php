<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($type)
    {
        //
        $categories = Category::where('parent_id', null)->where('type', $type)->get();
        return view('admin.category_management', ['page' => $type, 'categories' => $categories]);
    }

    public function add_category(Request $request){

        try {
            // Create a new category record
            $category = Category::create([
                'name' => $request->input('name'),
                'slug' => $request->input('slug'),
                'icon' => $request->input('icon'),
                'description' => $request->input('description'),
                'parent_id' => $request->input('parent_id'),
                'type' => $request->input('cate_type')
            ]);

            //dd($request->all());

            // Flash success message
            Session::flash('success', 'Thêm danh mục thành công!');
        } catch (\Exception $e) {
            // Flash error message
            dd($e->getMessage());
            Session::flash('error', 'Thêm danh mục thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    public function delete_category(Request $request){

        try {
            
            $category = Category::findOrFail($request->input('id'));

            $childCategories = Category::where('parent_id', $category->id)->get();

            // If it has child categories, set their parent_id to null
            foreach ($childCategories as $childCategory) {
                $childCategory->parent_id = null;
                $childCategory->save();
            }

            // Delete the category
            $category->delete();

            Session::flash('success', 'Xóa danh mục thành công!');
        } catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Xóa danh mục thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    public function update_category(Request $request){

        try {
            // Find the size record by ID
            $category = Category::findOrFail($request->input('id'));

            // Get the input data
            $input = $request->only(['name', 'icon', 'slug', 'parent_id', 'description', 'type']);

            $descendants = $this->getAllDescendants($category->id);

            if ($input['parent_id'] == $category->id || in_array($input['parent_id'], $descendants)) {
                Session::flash('error', 'Không thể cập nhật danh mục: Danh mục cha không hợp lệ.');
                return redirect()->back();
            }

            // Check for changes and update only if there are changes
            $changes = array_filter($input, function ($value, $key) use ($category) {
                return $category->$key !== $value;
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($changes)) {
                $category->update($changes);
                Session::flash('success', 'Cập nhật danh mục thành công!');
            } else {
                Session::flash('info', 'Không có thay đổi nào được phát hiện.');
            }
        } catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Cập nhật danh mục thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    private function getAllDescendants($categoryId)
    {
            $descendants = [];
            $children = Category::where('parent_id', $categoryId)->get();

            foreach ($children as $child) {
                $descendants[] = $child->id;
                $descendants = array_merge($descendants, $this->getAllDescendants($child->id));
            }

            return $descendants;
    }

    // public function get_category(Request $request, $cate_type){

    //     $pageSize = $request->input('size');

    //     $query = Category::where('type', $cate_type)->get();

    //     if($filters = $request->input('filters')){
    //         foreach ($filters as $filter){
    //             $field = $filter['field'] ?? null;
    //             $type = $filter['type'] ?? null;
    //             $value = $filter['value'] ?? null;
    //             if ($field && $type && $value) {
    //                 // Apply the filter based on the type
    //                 if ($type == 'like') {
    //                     $query->where($field, 'like', '%' . $value . '%');
    //                 } else {
    //                     $query->where($field, $type, $value);
    //                 }
    //             }
    //         }
    //     }

    //     $categories = $this->buildTree($query->toArray());

    //     $page = $request->input('page', 1);
    //     $total = count($categories);
    //     $categories = array_slice($categories, ($page - 1) * $pageSize, $pageSize);

    //     return response()->json(['last_page'=> ceil($total / $pageSize), 'data' => $categories]);

    // }

    // // create a data format that suitable for the tabulator
    // private function buildTree($categories){

    //     // nhom cac cate con theo value la id cua cata cha
    //     $grouped = [];
    //     // store cate that has been child of other cat
    //     $childIds = [];

    //     // group parent_cate => [child_cates]
    //     foreach ($categories as $category) {
    //         if($category['parent_id']){
    //             $grouped[$category['parent_id']][] = $category;
    //             $childIds[] = $category['id'];
    //         }
    //     }

    //     foreach ($categories as &$category) {
    //         //neu cate hien tai co cate con
    //         if (isset($grouped[$category['id']])) {
    //             // goi de quy de gan cac cata con
    //             $category['_children'] = $this->assignChildren($category['id'], $grouped);
    //         }
    //     }

    //     // delete cate that is already child of other cate
    //     $categories = array_filter($categories, function ($category) use ($childIds) {
    //         return !in_array($category['id'], $childIds);
    //     });

    //     // re-indexes the array to ensure it has sequential numeric keys.
    //     return array_values($categories);
    // }   

    // // recursive function to get all the child cate 
    // private function assignChildren($parentId, $grouped)
    // {
    //     $children = $grouped[$parentId] ?? [];
    //     foreach ($children as &$child) {
    //         // su dung group de check cate con co them con ko
    //         if (isset($grouped[$child['id']])) {
    //             $child['_children'] = $this->assignChildren($child['id'], $grouped);
    //         }
    //     }
    //     return $children;
    // }



}
