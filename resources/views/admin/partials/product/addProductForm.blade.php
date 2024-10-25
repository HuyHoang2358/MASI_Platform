@extends('admin.layouts.app')

@section('product-add')
    <form method="POST" action="{{ route('admin.product.store') }}" class="overflow-x-auto flex flex-col mt-2">
        @csrf
        <div class="flex justify-between my-5">
            <h2 class="text-lg font-medium my-auto">
                Thêm mới sản phẩm
            </h2>
        </div>
        {{-- BEGIN --}}
        <div class="intro-y box">
            <div id="input" class="p-5 grid grid-cols-2 gap-5">
                <div class="preview flex flex-col gap-2">
                    <div>
                        <label for="title" class="form-label">Danh mục sản phẩm</label>
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
                                <a id="lfm4" data-input="product-thumbnail" data-preview="holder"
                                    class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Chọn
                                </a>
                            </span>
                            <input required readonly id="product-thumbnail" class="form-control" type="text"
                                name="product-thumbnail">
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
                        <label for="product-name" class="form-label">Tên sản phẩm</label>
                        <input required id="product-name" name="product-name" type="text" class="form-control"
                            placeholder="Nhập tên sản phẩm">
                    </div>
                    <div>
                        <label for="product-slug" class="form-label">Slug sản phẩm</label>
                        <input required required id="product-slug" name="product-slug" type="text" class="form-control"
                            placeholder="Nhập slug">
                    </div>
                    <div>
                        <label for="product-color" class="form-label">Màu sắc</label>
                        <select name="product-color[]" id="product-color" data-placeholder="Chọn màu sắc" class="tom-select w-full" multiple>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">
                                    {{ $color->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="product-size" class="form-label">Kích thước</label>
                        <select name="product-size[]" id="product-size" data-placeholder="Chọn kich thước" class="tom-select w-full" multiple>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">
                                    {{ $size->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="intro-y box">
                <div class="p-5 flex flex-col gap-2">
                    <div>
                        <label for="product-quantity" class="form-label">Số lượng</label>
                        <input required id="product-quantity" name="product-quantity" type="number" class="form-control"
                            placeholder="Nhập tiêu số lượng">
                    </div>
                    <div>
                        <label for="product-stock" class="form-label">Tồn kho</label>
                        <input required id="product-stock" name="product-stock" type="number" class="form-control"
                            placeholder="Nhập lượng tồn kho">
                    </div>
                    <div class="flex flex-row gap-2">
                        <div>
                            <label for="product-price" class="form-label">Giá bán</label>
                            <input required id="product-price" name="product-price" type="number" class="form-control"
                                placeholder="Nhập giá bán">
                        </div>
                        <div>
                            <label for="product-cost" class="form-label">Giá nhập</label>
                            <input required id="product-cost" name="product-cost" type="number" class="form-control"
                                placeholder="Nhập giá nhập">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END --}}
        {{-- SECTION 3 --}}
        <div class="mt-5 z-0">
            <div class="intro-y box">
                <div class="p-5 flex flex-col gap-2">
                    <div>
                        <label for="product-description" class="form-label">Mô tả sản phẩm</label>
                        <textarea required id="product-description" name="product-description" placeholder="Nhập nội dung" class="h-96">
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
                    <a href="{{ route('admin.product.index') }}"
                        onclick="return confirm('Bạn có chắc muốn hủy ? Mọi thay đổi sẽ không được lưu');"><button
                            type="button" class="btn btn-secondary w-24 mr-1">Hủy</button></a>
                    <button type="submit" class="btn btn-primary w-24 mr-1">Lưu</button>
                </div>
            </div>
        </div>
        {{-- END --}}
    </form>
    <script src="{{ asset('/vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm4').filemanager('image', {
            prefix: route_prefix
        });
    </script>
@endsection
