<form action="{{ route("admin.size.get") }}" method="POST" id="add-size-form" class="modal" tabindex="-1" aria-hidden="true">
	@csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- BEGIN: Modal Header -->
            <div class="modal-header">
                <h2 class="font-medium text-base mr-auto">
                    Thêm kích thước mới
                </h2>
            </div>
            <!-- END: Modal Header -->
            <!-- BEGIN: Modal Body -->
            <div class="modal-body flex flex-col gap-2">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="form-label">Tên kích thước</label>
                    <input required id="name" name="name" type="text" class="form-control" placeholder="Nhập tên kích thước">
                </div>
                <div class="grid grid-cols-2 gap-2">
                    <div class="">
                        <label for="weight" class="form-label">Cân nặng</label>
                        <input required id="weight" name="weight" type="text" class="form-control" placeholder="Nhập cân nặng">
                    </div>
                    <div class="">
                        <label for="height" class="form-label">Chiều cao</label>
                        <input required id="height" name="height" type="text" class="form-control" placeholder="Nhập chiều cao">
                    </div>
                </div>
				<div class="col-span-12 sm:col-span-6">
                    <label for="chest" class="form-label">Vòng ngực</label>
                    <input id="chest" name="chest" type="text" class="form-control" placeholder="Nhập vòng ngực">
                </div>
				<div class="col-span-12 sm:col-span-6">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea id="description" name="description" type="text" class="form-control" placeholder="Nhập mô tả" style="resize: none;"></textarea>
                </div>
            </div>
            <!-- END: Modal Body -->
            <!-- BEGIN: Modal Footer -->
            <div class="modal-footer">
                <button type="button" data-tw-dismiss="modal"
                    class="btn btn-outline-secondary w-20 mr-1">Hủy</button>
                <button type="submit" class="btn w-fit btn-primary">Xác nhận</button>
            </div>
            <!-- END: Modal Footer -->
        </div>
    </div>
</form>
