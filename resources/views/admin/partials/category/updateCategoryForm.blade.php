<form action="{{ route('admin.category.update') }}" method="POST" id="update-category-form" class="modal" tabindex="-1" aria-hidden="true">
	@csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Chỉnh sửa danh mục
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body flex flex-col gap-2">
                <input id="id" name="id" class="form-control" type="hidden">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="form-label">Tên Danh mục</label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="Nhập tên danh mục">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="slug" class="form-label">Slug</label>
                    <div class="flex flex-col gap-2">
                        <input id="slug" name="slug" type="text" class="form-control" placeholder="Tạo slug">
                        {{-- <div class="flex">
                            <input type="checkbox" id="auto-generate-slug" class="ml-2">
                            <label for="auto-generate-slug" class="ml-1">Tự động tạo</label>
                        </div> --}}
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="parent_id" class="form-label">Danh mục cha</label>
                    <select id="parent_id" name="parent_id" class="form-control">
                        <option value="">Không có danh mục cha</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @include('admin.partials.category.category_option', [
                                'categories' => $category->children,
                                'level' => 1,
                            ])
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="icon" class="form-label">Biểu tượng</label>
                    <input required id="icon" name="icon" type="text" class="form-control"
                        placeholder="Tải ảnh biểu tượng">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="cate_type" class="cate_type">Loại danh mục</label>
                    <select id="cate_type" name="type" class="form-control">
                        <option value="product-cate">Danh mục sản phẩm</option>
                        <option value="post-cate">Danh mục bài viết</option>
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea id="description" name="description" type="text" class="form-control" placeholder="Nhập mô tả"
                        style="resize: none;"></textarea>
                </div>
            </div>
            <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer">
                <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                <button type="submit" class="btn w-fit btn-primary">Xác nhận</button>
            </div>
        </div>
    </div>
</form>
