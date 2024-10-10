@extends('admin.layouts.app')

@section('post-management')

    @include('admin.partials.post.deletePostAlert')

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
            <h2 class="text-lg font-medium my-auto">
                Quản lý bài viết
            </h2>
            <a href="{{ route('admin.add') }}" class="btn btn-primary shadow-md mr-2">
                Thêm bài viết mới
            </a>
        </div>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Hình ảnh</th>
                    <th class="whitespace-nowrap">Tên bài viết</th>
                    <th class="whitespace-nowrap">Danh mục bài viết</th>
                    <th class="whitespace-nowrap">Hành động</th>
                </tr>
            </thead>
            <tbody>
                {{-- @php
                    $counter = ($posts->currentPage() - 1) * $posts->perPage() + 1;
                @endphp --}}
                @if(count($posts) > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td> <img width="100" height="100" src="{{ $post->images }}" alt="post_{{ $post->title }}_image"> </td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <div class="">
                                    <a href="{{ route('admin.edit', ['id' => $post->id]) }}" class="mr-1">
                                        <button type="button" class="btn btn-outline-warning">
                                            <i class="fa-solid fa-pen-to-square"></i></i>
                                        <button>
                                    </a>
                    
                                    <a class="mr-1">
                                        <button type="button" class="btn btn-outline-danger">
                                            <i class="fa-solid fa-trash"></i></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Không có bài viết nào</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

@endsection
