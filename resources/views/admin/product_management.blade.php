@extends('admin.layouts.app')
@section('product-management')

    @include('admin.partials.product.deleteProductAlert')

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('success') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('error') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif
    @if (Session::has('info'))
        <div class="alert alert-warning alert-dismissible show flex items-center mb-2 fixed right-60" role="alert"
            style="z-index: 9999; top: 6.75rem;">
            <i data-lucide="alert-triangle" class="w-6 h-6 mr-2"></i> {{ Session::get('info') }}
            <button type="button" class="btn-close" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x"
                    class="w-4 h-4"></i> </button>
        </div>
    @endif

    <div class="overflow-x-auto flex flex-col mt-2">
        <div class="flex justify-between my-5">
            <h2 class="text-lg font-medium my-auto">
                Quản lý sản phẩm
            </h2>
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary shadow-md mr-2">
                Thêm sản phẩm mới
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Tên sản phẩm</th>
                    <th class="whitespace-nowrap">Ảnh sản phẩm</th>
                    <th class="whitespace-nowrap">Danh mục</th>
                    <th class="whitespace-nowrap">Miêu tả</th>
                    <th class="whitespace-nowrap">Giá nhập</th>
                    <th class="whitespace-nowrap">Giá bán</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if (count($products) > 0)
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td> <img width="100" height="100" src="{{ $product->images }}" alt="product_{{ $product->name }}_image"> </td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->cost }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <div class="">
                                    <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}" class="mr-1">
                                        <button type="button" class="btn btn-outline-warning">
                                            <i class="fa-solid fa-pen-to-square"></i></i>
                                        <button>
                                    </a>

                                    <a class="mr-1">
                                        <button data-tw-toggle="modal" data-tw-target="#delete-product-form" type="button" class="btn btn-outline-danger" onclick='getProductForDelete("{{ $product->name }}", {{ $product->id }})'>
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Không có sản phẩm nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <script>

        function getProductForDelete(name, id){
                document.getElementById('del-product-name').textContent = name;
                document.getElementById('del-product-id').value = id;
        }
    
    </script>

@endsection
