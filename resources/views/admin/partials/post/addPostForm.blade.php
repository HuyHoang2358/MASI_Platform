@extends('admin.layouts.app')

@section('post-add')

    <form method="POST" action="{{ route('admin.post.store') }}" class="overflow-x-auto flex flex-col mt-2">
        @csrf
        <div class="flex justify-between my-5">
            <h2 class="text-lg font-medium my-auto">
                Thêm mới bài viết tin tức
            </h2>
        </div>
        {{-- BEGIN --}}
        <div class="intro-y box">
            <div id="input" class="p-5 grid grid-cols-2 gap-5">
                <div class="preview flex flex-col gap-2">
                    <div>
                        <label for="title" class="form-label">Danh mục bài viết</label>
                        <select id="category" name="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @include('admin.partials.category.category_option', [
                                    'categories' => $category->children,
                                    'level' => 1,
                                ])
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image" class="form-label">Hình ảnh</label>
                        <div id="image" class="input-group flex gap-2">
                            <span class="input-group-btn">
                                <a id="lfm3" data-input="post-thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                            </span>
                            <input required readonly id="post-thumbnail" class="form-control" type="text" name="post-thumbnail">
                        </div>
                    </div>
                </div>
                <div>
                    <label for="holder" class="form-label">Hình ảnh xem trước</label>
                    <div id="holder" style="margin-top:15px;"></div>
                </div>
            </div>
        </div>
        {{-- SECTION 2 --}}
        <div class="mt-5 grid grid-cols-2 gap-5">
            <div class="intro-y box">
                <div class="p-5 flex flex-col gap-2">
                    <div>
                        <label for="title" class="form-label">Tiêu đề bài viết</label>
                        <input required id="title" name="title" type="text" class="form-control" placeholder="Nhập tiêu đề">
                    </div>
                    <div>
                        <label for="slug" class="form-label">Slug bài viết</label>
                        <input required required id="slug" name="slug" type="text" class="form-control" placeholder="Nhập slug">
                    </div>
                    <div>
                        <label for="description" class="form-label">Mô tả </label>
                        <textarea required id="post-description" name="post-description" placeholder="Nhập mô tả">
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="intro-y box">
                <div class="p-5 flex flex-col gap-2">
                    <div>
                        <label for="seo-title" class="form-label">Tiêu đề SEO</label>
                        <input required id="seo-title" name="seo-title" type="text" class="form-control" placeholder="Nhập tiêu đề seo">
                    </div>
                    <div>
                        <label for="seo-keyword" class="form-label">Từ khóa SEO</label>
                        <input required id="seo-keyword" name="seo-keyword" type="text" class="form-control" placeholder="Nhập slug">
                    </div>
                    <div>
                        <label for="seo-description" class="form-label">Mô tả SEO</label>
                        <textarea required id="seo-description" name="seo-description" placeholder="Nhập mô tả">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        {{-- END --}}
        {{-- SECTION 3 --}}
        <div class="mt-5">
            <div class="intro-y box">
                <div class="p-5 flex flex-col gap-2">
                    <div>
                        <label for="content" class="form-label">Nội dung bài viết</label>
                        <textarea required id="content" name="content" placeholder="Nhập nội dung" class="h-96">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        {{-- END --}}
        {{-- BUTTON SECTION --}}
        <div class="mt-5">
            <div class="intro-y box">
                <div class="p-3 flex justify-end">
                    <button class="btn btn-secondary w-24 mr-1">Hủy</button>
                    <button type="submit" class="btn btn-primary w-24 mr-1">Lưu</button>
                </div>
            </div>
        </div>
        {{-- END --}}
    </form>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm3').filemanager('image', {prefix: route_prefix});
    </script>
@endsection 
