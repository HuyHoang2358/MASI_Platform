<form action="{{ route('admin.color.store') }}" method="POST" id="add-color-form" class="modal" tabindex="-1" aria-hidden="true">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Thêm màu sắc mới
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body flex flex-col gap-2">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="form-label">Tên màu sắc</label>
                    <input required id="name" name="name" type="text" class="form-control"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="form-label">Chọn loại</label>
                    <div class="flex gap-2">
                        <label>
                            <input type="radio" name="color_type" value="icon" onclick="toggleInputFields()" checked>
                            Biểu tượng
                        </label>
                        <label>
                            <input type="radio" name="color_type" value="hex" onclick="toggleInputFields()"> Bảng màu
                        </label>
                    </div>
                </div>
                <div id='icon' class="col-span-12 sm:col-span-6" style="display: none;">
                    <div class="input-group flex gap-2">
                        <span class="input-group-btn">
                            <a id="lfm4" data-input="test_icon" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn
                            </a>
                        </span>
                        <input readonly id="test_icon" class="form-control" type="text" name="icon">
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                </div>
                <div id="hex" class="col-span-12 sm:col-span-6" style="display: block;">
                    <input required name="hex" type="color" class="form-control"
                        placeholder="Nhập mã màu">
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

<script>
    function toggleInputFields() {
        const colorType = document.querySelector('input[name="color_type"]:checked').value;
        const iconInput = document.getElementById('icon');
        const hexInput = document.getElementById('hex');

        if (colorType === 'icon') {
            iconInput.style.display = 'block';
            hexInput.style.display = 'none';
        } else {
            iconInput.style.display = 'none';
            hexInput.style.display = 'block';
        }
    }

    // Initialize the input fields based on the default selection
    document.addEventListener('DOMContentLoaded', function() {
        toggleInputFields();
    });
</script>
