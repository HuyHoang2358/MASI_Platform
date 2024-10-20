@extends('admin.layouts.app')
@section('title')
    {{ __('Voucher') }}
@endsection

@section('content')
    <h3 class="px-5 py-3 text-orange-400 text-3xl font-semibold my-3 bg-white rounded-lg">Add new voucher</h3>

    <form method="POST" action="{{route('voucher.add')}}">
        @csrf
        <div class="grid grid-cols-2 gap-7">
            <div class="col-span-1 w-full bg-white rounded-lg p-10">
                <p>Basis Information</p>
                <div class="flex flex-col gap-5 mt-5">
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Name<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-gray-100 rounded-md border-gray-400 pl-5" type="text" placeholder="Type name of Voucher" name="name">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Code<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-gray-100 rounded-md border-gray-400 pl-5" type="text" placeholder="Type code of Voucher" name="code">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Visibility<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" placeholder="Private" name="visibility">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Type<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" placeholder="Percent" name="type">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Discount Amount<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" placeholder="Type code of discount amount" name="amount">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Image<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <div class="flex gap-5">
                            <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" placeholder="Chưa chọn ảnh" name="image">
                            <button type="button" class="bg-green-700 px-10 py-2 text-white text-nowrap text-base rounded-lg">Chọn ảnh</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 w-full bg-white rounded-lg p-7">
                <p>More Information</p>
                <div class="flex flex-col gap-5 mt-5">
                    <div>
                        <h3 class="font-medium text-base flex items-start">Start Time<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-gray-100 rounded-md border-gray-400 pl-5" type="text" placeholder="dd/mm/yy --:-- --">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">End Time<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-gray-100 rounded-md border-gray-400 pl-5" type="text" placeholder="dd/mm/yy --:-- --">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Quantity<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" name="quantity">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">In stock<i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <input class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" name="in_stock">
                    </div>
                    <div>
                        <h3 class="font-medium text-base flex items-start">Voucher Description <i class="fa-solid fa-star-of-life text-[8px] text-red-500 m-1"></i></h3>
                        <textarea class="w-full bg-[#f7f7f7] rounded-md border-gray-400 pl-5" type="text" name="description"></textarea>
                    </div>

                    <div class="flex gap-4 justify-end">
                        <button type="button" class="px-10 py-3 bg-yellow-400 rounded-lg text-white text-base">Cancel </button>
                        <button type="submit" class="px-10 py-3 bg-blue-600 rounded-lg text-white text-base">Submit</button>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection
