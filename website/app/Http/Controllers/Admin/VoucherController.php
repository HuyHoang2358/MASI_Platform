<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin'); // Phải đăng nhập với tài khoản admin thì mới được vào controller này
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $vouchers = voucher::all();
        return view('admin.partials.voucher.index', ['page' => 'Voucher', 'vouchers' => $vouchers]);
    }

    public function add(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.partials.voucher.add', ['page' => 'Voucher']);
    }

    public function store(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $input = $request->all();

        $voucher = new Voucher();
        $voucher['name'] = $input["name"];
        $voucher['code'] = $input["code"];
        $voucher["image"] = $input["image"];
        $voucher['visibility'] = $input["visibility"];
        $voucher["discount_amount"] = $input["amount"];
        $voucher['type'] = $input["type"];
        $voucher['quantity'] = $input["quantity"];
        $voucher['in_stock'] = $input["in_stock"];
        $voucher['description'] = $input["description"];
//        echo "<pre>";
//        print_r($input);
//        echo "</pre>";
//        exit;

        $voucher->save();
        return view('admin.partials.voucher.index', ['page' => 'Voucher']);
    }

    public function edit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $voucher = Voucher::find($id);
        return view ('admin.partials.voucher.edit',
            ['page' => 'Voucher'],
            ['voucher' => $voucher],
        );
    }

    public function update($id, Request $request)
    {
        $input = $request->all();
        $item = Voucher::find($id);

        $item['name'] = $input["name"];
        $item['code'] = $input["code"];
        $item["image"] = $input["image"];
        $item['visibility'] = $input["visibility"];
        $item["discount_amount"] = $input["amount"];
        $item['type'] = $input["type"];
        $item['quantity'] = $input["quantity"];
        $item['in_stock'] = $input["in_stock"];
        $item['description'] = $input["description"];

        $item->save();
        return redirect()->route('voucher.index');
    }

    public function destroy ($id){
        $voucher = Voucher::find($id);
        $voucher->delete();

        return redirect()->route('voucher.index');
    }



}
