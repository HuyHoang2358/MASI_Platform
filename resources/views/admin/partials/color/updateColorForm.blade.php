<form action="{{ route('admin.color.update') }}" method="POST" id="update-color-form" class="modal" tabindex="-1" aria-hidden="true">
    @csrf
    @method('PUT')
    <input type="text" id="update_id" name="update_id" hidden>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Chỉnh sửa màu sắc
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body flex flex-col gap-2">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="form-label">Tên màu sắc</label>
                    <input required id="update_name" name="update_name" type="text" class="form-control"
                        placeholder="Nhập tên danh mục">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label class="form-label">Chọn loại</label>
                    <div class="flex gap-2">
                        <label>
                            <input type="radio" name="update_color_type" value="icon" onclick="toggleUpdateInputFields()" checked>
                            Biểu tượng
                        </label>
                        <label>
                            <input type="radio" name="update_color_type" value="hex" onclick="toggleUpdateInputFields()"> Bảng màu
                        </label>
                    </div>
                </div>
                <div id='update_icon' class="col-span-12 sm:col-span-6" style="display: none;">
                    <div class="input-group flex gap-2">
                        <span class="input-group-btn">
                            <a id="lfm5" data-input="update_input_icon" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn
                            </a>
                        </span>
                        <input id="update_input_icon" readonly class="form-control" type="text" name="icon">
                    </div>
                    <div id="update_holder" style="margin-top:15px;max-height:100px;"></div>
                </div>
                <div id="update_hex" class="col-span-12 sm:col-span-6" style="display: block;">
                    <input id="update_input_hex" required name="hex" type="color" class="form-control"
                        placeholder="Nhập mã màu">
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="update_description" class="form-label">Mô tả</label>
                    <textarea id="update_description" name="update_description" type="text" class="form-control" placeholder="Nhập mô tả"
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
    function toggleUpdateInputFields() {

        const colorType = document.querySelector('input[name="update_color_type"]:checked').value;
        const iconInput = document.getElementById('update_icon');
        const hexInput = document.getElementById('update_hex');

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
