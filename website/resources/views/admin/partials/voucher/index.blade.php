@extends('admin.layouts.app')
@section('title')
    {{ __('Voucher') }}
@endsection

@section('content')
    <div class="px-5 py-3 text-orange-400 text-3xl font-semibold my-3 bg-white rounded-lg flex justify-between">
        <h3>Voucher Table</h3>
        <a href="{{route('voucher.add')}}"><button class="bg-green-600 px-10 py-4 text-white text-nowrap text-base rounded-lg">+ Add new voucher</button></a>
    </div>

    <div  class="bg-white p-5">
        <table class="w-full">
            <thead>
            <tr class="p-5 text-base">
                <th class="w-[18%] text-center py-1 border-r-2 border-gray-200">Image review</th>
                <th class="w-[15%] text-center py-1 border-r-2 border-gray-200">Code</th>
                <th class="w-[15%] text-center py-1 border-r-2 border-gray-200">Name</th>
                <th class="w-[7%] text-center py-1 border-r-2 border-gray-200">Discount</th>
                <th class="w-[10%] text-center py-1 border-r-2 border-gray-200">Start Time</th>
                <th class="w-[10%] text-center py-1 border-r-2 border-gray-200">End Time</th>
                <th class="w-[7%] text-center py-1 border-r-2 border-gray-200">Quantity</th>
                <th class="w-[7%] text-center py-1 border-r-2 border-gray-200">In Stock</th>
                <th class="w-[10%] text-center py-1">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($vouchers as $voucher)
                    <tr class="border-t-2 border-gray-200">
                        <td class="flex justify-center items-center border-r-2 border-gray-200">
                            <img class="h-24" src="{{asset('voucher/voucher2.png')}}" alt="anh minh hoa voucher">
                        </td>
                        <td class="text-center border-r-2 border-gray-200">
                            {{$voucher->code}}<br>
                            <p class="{{$voucher->visibility === 'Public voucher' ? 'text-green-500' : ($voucher->visibility === 'Private voucher' ? 'text-orange-600' : '')}} font-semibold text-lg">{{$voucher->visibility}}</p>
                        </td>
                        <td class="border-r-2 border-gray-200 text-base px-3">{{$voucher->name}}</td>
                        <td class="text-end px-3 border-r-2 border-gray-200 text-base">{{$voucher->discount_amount}}</td>
                        <td class="text-center px-5 border-r-2 border-gray-200 text-base">{{$voucher->created_at}}</td>
                        <td class="text-center px-5 border-r-2 border-gray-200 text-base">{{$voucher->updated_at}}</td>
                        <td class="text-center px-3 border-r-2 border-gray-200 text-base">{{$voucher->quantity}}</td>
                        <td class="text-center px-3 border-r-2 border-gray-200 text-base">{{$voucher->in_stock}}</td>
                        <td class="text-center">
                            <a href="{{route('voucher.edit', $voucher->id)}}"><i class="fa-solid fa-pencil px-3 text-yellow-400 text-lg"></i></a>
                            <a href="{{route('voucher.destroy', $voucher->id)}}"><i class="fa-solid fa-trash-can text-red-500 text-lg"></i></a>
                        </td>
                    </tr>
              @endforeach
            </tbody>
        </table>
    </div>
@endsection
