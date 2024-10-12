<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Support\Facades\Session;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $color = Color::all();

        return view('admin.color_management', ['page' => 'color', 'colors' => $color]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            // Create a new category record
            $name = $request->input('name');
            $icon = $request->input('color_type') == 'icon' ? $request->input('icon') : null;
            $hex = $request->input('color_type') == 'hex' ? $request->input('hex') : null;

            $description = $request->input('description');

            $color = Color::create([
                'name' => $name,
                'icon' => $icon,
                'hex_code' => $hex,
                'description' => $description,
            ]);

            //dd($request->all());

            // Flash success message
            Session::flash('success', 'Thêm màu mới thành công!');
        } catch (\Exception $e) {
            // Flash error message
            dd($e->getMessage());
            Session::flash('error', 'Thêm màu mới thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
    
            // Find the color by ID
            $color = Color::findOrFail($request->input('update_id'));

            $color->name = $request->input('update_name');
            $color->description = $request->input('update_description');
    
            // Update fields based on the request

            $icon = $request->input('update_color_type') == 'icon' ? $request->input('icon') : null;
            $hex = $request->input('update_color_type') == 'hex' ? $request->input('hex') : null;

            if ($request->has('hex') && !is_null($hex)) {
                $color->hex_code = $request->input('hex');
                $color->icon = null;
            } elseif ($request->has('icon') && !is_null($icon)) {
                $color->icon = $request->input('icon');
                $color->hex_code = null;
            }
    
            // Save the updated color
            $color->save();
    
            // Flash success message and redirect
            if ($color->isDirty()) {
                // Save the updated color
                $color->save();
    
                // Flash success message and redirect
                Session::flash('success', 'Sửa màu thành công!');
            } else {
                // Flash info message if no changes
                Session::flash('info', 'Không có thay đổi nào được thực hiện.');
            }

        } catch (\Exception $e) {
    
            // Flash error message and redirect back
            Session::flash('error', 'Xóa màu thất bại: ' . $e->getMessage());
        }

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        try {
            
            $color = Color::findOrFail($request->input('id'));

            // Delete the category
            $color->delete();

            Session::flash('success', 'Xóa màu thành công!');
        } catch (\Exception $e) {
            // Flash error message
            Session::flash('error', 'Xóa màu thất bại: ' . $e->getMessage());
        }

        return redirect()->back();
    }
}
