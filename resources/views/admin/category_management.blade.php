@extends('admin.layouts.app')
@section('category-management')
    @include('admin.partials.category.addCategoryForm')
    @include('admin.partials.category.deleteCategoryAlert')
    @include('admin.partials.category.updateCategoryForm')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible show flex items-center mb-2 fixed right-60" role="alert" style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" role="alert" style="z-index: 9999; top: 6.75rem;">
        <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('error') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                class="w-4 h-4"></i> </button>
    </div>
    @endif
    @if (Session::has('info'))
    <div class="alert alert-warning alert-dismissible show flex items-center mb-2 fixed right-60" role="alert" style="z-index: 9999; top: 6.75rem;">
        <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('info') }}
        <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                class="w-4 h-4"></i> </button>
    </div>
    @endif

    <div class="overflow-x-auto flex flex-col mt-2">
        <div class="flex justify-between my-5">
            <h2 class="text-lg font-medium my-auto">Quản lý danh mục
                @switch($page)
                    @case('product-cate')
                        sản phẩm
                    @break

                    @case('post-cate')
                        bài viết
                    @break

                    @default
                        Không có
                @endswitch
            </h2>
            <button data-tw-toggle="modal" data-tw-target="#add-category-form" class="btn btn-primary shadow-md mr-2">
                Thêm danh mục mới
            </button>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Tên danh mục</th>
                    <th class="whitespace-nowrap">Icon</th>
                    <th class="whitespace-nowrap">Slug</th>
                    <th class="whitespace-nowrap">Mô tả</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(count($categories) > 0)
                <tr>
                    @include("admin.partials.category.row_table",["categories"=>$categories, "level"=>0, "is_show"=>True])
                </tr>
                @else
                    <tr>
                        <td colspan="6" class="text-center">Không có danh mục nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{-- <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Danh mục
            @switch($page)
                @case('product-cate')
                    sản phẩm
                    @break
                @case('post-cate')
                    bài viết
                    @break
                @default
                    Không có
             @endswitch
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button data-tw-toggle="modal" data-tw-target="#add-category-form" class="btn btn-primary shadow-md mr-2">
                Thêm danh mục mới
            </button>
            <div class="dropdown ml-auto sm:ml-0">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item"> <i data-lucide="users" class="w-4 h-4 mr-2"></i>
                                Thêm nhóm </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: HTML Table Data -->
    <div class="intro-y box p-5 mt-5">
        <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
            <form id="category-tabulator-html-filter-form" class="xl:flex sm:mr-auto">
                <div class="sm:flex items-center sm:mr-4">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Vùng</label>
                    <select id="category-tabulator-html-filter-field"
                        class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="id">Id</option>
                        <option value="name">Tên danh mục</option>
                        <option value="slug">Slug</option>
                        <option value="description">Mô tả</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Loại</label>
                    <select id="category-tabulator-html-filter-type" class="form-select w-full mt-2 sm:mt-0 sm:w-auto">
                        <option value="like" selected>Giống</option>
                    </select>
                </div>
                <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
                    <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">Giá trị</label>
                    <input id="category-tabulator-html-filter-value" type="text"
                        class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0" placeholder="Tìm kiếm...">
                </div>
                <div class="mt-2 xl:mt-0">
                    <button id="category-tabulator-html-filter-go" type="button" class="btn btn-primary w-full sm:w-16">Lọc</button>
                    <button id="category-tabulator-html-filter-reset" type="button"
                        class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1">Reset</button>
                </div>
            </form>
            <div class="flex mt-5 sm:mt-0">
                <button id="category-tabulator-print" class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"> <i
                        data-lucide="printer" class="w-4 h-4 mr-2"></i> In </button>
                <div class="dropdown w-1/2 sm:w-auto">
                    <button class="dropdown-toggle btn btn-outline-secondary w-full sm:w-auto" aria-expanded="false"
                        data-tw-toggle="dropdown"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Xuất <i
                            data-lucide="chevron-down" class="w-4 h-4 ml-auto sm:ml-2"></i> </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a id="category-tabulator-export-csv" href="javascript:;" class="dropdown-item"> <i
                                        data-lucide="file-text" class="w-4 h-4 mr-2"></i> File CSV </a>
                            </li>
                            <li>
                                <a id="category-tabulator-export-json" href="javascript:;" class="dropdown-item"> <i
                                        data-lucide="file-text" class="w-4 h-4 mr-2"></i> File JSON </a>
                            </li>
                            <li>
                                <a id="category-tabulator-export-xlsx" href="javascript:;" class="dropdown-item"> <i
                                        data-lucide="file-text" class="w-4 h-4 mr-2"></i> File XLSX </a>
                            </li>
                            <li>
                                <a id="category-tabulator-export-html" href="javascript:;" class="dropdown-item"> <i
                                        data-lucide="file-text" class="w-4 h-4 mr-2"></i> File HTML </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <div id="category-tabulator" class="mt-5"></div>
        </div>
    </div> --}}
@endsection
