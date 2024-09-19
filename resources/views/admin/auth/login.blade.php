@extends('admin.layouts.auth')
@section('title')
    Đăng nhập
@endsection
@section('content')
    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
            Đăng nhập
        </h2>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="intro-x mt-8">
                @error('name')
                <label  class="intro-x text-red-500 block mt-2 text-xs sm:text-sm">{{ $message }}</label>
                @enderror
                <input type="email" name="email" class="intro-x login__input form-control py-3 px-4 block" placeholder="Nhập địa chỉ email của ban" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('password')
                <label  class="intro-x text-red-500 block mt-2 text-xs sm:text-sm">{{ $message }}</label>
                @enderror
                <input type="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Nhập mật khẩu"  required autocomplete="current-password">
            </div>
            <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
                <div class="flex items-center mr-auto">
                    <input id="remember-me" type="checkbox" class="form-check-input border mr-2" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="cursor-pointer select-none" for="remember-me">Nhớ đăng nhập</label>
                </div>
                <a href="#">Quên mật khẩu?</a>
            </div>
            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Đăng nhập</button>
            </div>
        </form>
    </div>
@endsection
