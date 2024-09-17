@extends('admin.layouts.auth')
@section('title')
    Đăng ký
@endsection
@section('content')
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            Đăng ký tài khoản
        </h2>
        <form action="{{route('admin.register')}}" method="post">
            @csrf
            <div class="intro-x mt-8">
                @error('name')
                <label  class="intro-x text-red-500 block mt-2 text-xs sm:text-sm">{{ $message }}</label>
                @enderror
                <input type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus required class="intro-x login__input form-control py-3 px-4 block" placeholder="Nhập tên của bạn">

                @error('email')
                <label  class="intro-x text-red-500 block mt-2 text-xs sm:text-sm">{{ $message }}</label>
                @enderror
                <input type="text" name="email" value="{{ old('email') }}" autocomplete="email" required class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nhập địa chỉ email của bạn">
                @error('password')
                <label  class="intro-x text-red-500 block mt-2 text-xs sm:text-sm">{{ $message }}</label>
                @enderror
                <input type="password" name="password" value="{{ old('password') }}" autocomplete="password" required class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nhập mật khẩu của bạn">
                <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">
                    <div class="col-span-3 h-full rounded bg-success"></div>
                    <div class="col-span-3 h-full rounded bg-success"></div>
                    <div class="col-span-3 h-full rounded bg-success"></div>
                    <div class="col-span-3 h-full rounded bg-slate-100 dark:bg-darkmode-800"></div>
                </div>
                <input type="password" name="password_confirmation" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nhập lại mật khẩu">
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Đăng ký</button>
                <a href="{{route('admin.login')}}">
                    <button type="button" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Đăng nhập</button>
                </a>
            </div>
        </form>
    </div>
@endsection
