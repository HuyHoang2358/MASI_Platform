<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.homepage', ['page' => 'homepage']);
    }

    public function size_management(){
        return view("admin.size_management", ['page' => 'size']);
    }

    public function get_size(Request $request){
        $pageSize = $request->input('size');

        $query = Size::query();

        if($filters = $request->input('filters')){
            foreach ($filters as $filter){
                $field = $filter['field'] ?? null;
                $type = $filter['type'] ?? null;
                $value = $filter['value'] ?? null;
                if ($field && $type && $value) {
                    // Apply the filter based on the type
                    if ($type == 'like') {
                        $query->where($field, 'like', '%' . $value . '%');
                    } else {
                        $query->where($field, $type, $value);
                    }
                }
            }

        }

        //dd($request->all());

        $data = $query->paginate($pageSize);

        return response()->json(['last_page'=> $data->lastPage(), 'data' => $data->items()]);
    }

    public function add_size(Request $request){

        try {
            // Create a new size record
            $size = Size::create([
                'name' => $request->input('name'),
                'weight' => $request->input('weight'),
                'height' => $request->input('height'),
                'chest' => $request->input('chest'),
                'description' => $request->input('description'),
            ]);

            // Flash success message
            Session::flash('success', 'Thêm kích cỡ thành công!');
        } catch (\Exception $e) {
            // Flash error message
            dd($e->getMessage());
            Session::flash('error', 'Thêm kích cỡ thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }


    public function update_size(Request $request){

        try {
            // Find the size record by ID
            $size = Size::findOrFail($request->input('id'));

            // Get the input data
            $input = $request->only(['name', 'weight', 'height', 'chest', 'description']);

            // Check for changes and update only if there are changes
            $changes = array_filter($input, function ($value, $key) use ($size) {
                return $size->$key !== $value;
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($changes)) {
                $size->update($changes);
                Session::flash('success', 'Cập nhật kích cỡ thành công!');
            } else {
                Session::flash('info', 'Không có thay đổi nào được phát hiện.');
            }
        } catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Cập nhật kích cỡ thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    public function delete_size(Request $request){

        try {
            // Find the size record by ID
            $size = Size::findOrFail($request->input('id'));

            // Delete the size record
            $size->delete();

            // Flash success message
            Session::flash('success', 'Xóa kích cỡ thành công!');
        } catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Xóa kích cỡ thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

}
