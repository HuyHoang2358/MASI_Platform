<form action="{{ route('admin.category.store') }}" method="POST" id="add-category-form" class="modal" tabindex="-1"
    aria-hidden="true">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Thêm danh mục mới
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body flex flex-col gap-2">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="form-label">Tên danh mục</label>
                    <input required id="name" name="name" type="text" class="form-control"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="slug" class="form-label">Slug</label>
                    <div class="flex flex-col gap-2">
                        <input id="slug" name="slug" type="text" class="form-control" placeholder="Tạo slug">
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
                    <div class="input-group flex gap-2">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn
                            </a>
                        </span>
                        <input readonly id="thumbnail" class="form-control" type="text" name="icon">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>
                
                <div class="col-span-12 sm:col-span-6">
                    <label for="cate_type" class="cate_type">Loại danh mục</label>
                    <select id="cate_type" name="cate_type" class="form-control">
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
            <!-- END: Modal Footer -->
        </div>
    </div>
</form>
