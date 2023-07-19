<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slider =slider::all();
        return view('admin.page.slider.index' ,compact('slider' ,$slider));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = '';

        if ($request->has('image_src')) {
            $FileEx = $request->file('image_src')->getClientOriginalExtension();
            $image_name = time() . '_' . rand() . '.' . $FileEx;
            $request->file('image_src')->move(public_path('upload/admin/slider'), $image_name);
        }

        // return   $image_name;
        $slider = slider::create([     
            
            'image_name' => $request->image_name,
            'image_src' => $image_name,
            'created_at' => now()   
        ]);

        return redirect()->route('admin.slider.index')->with('success' , 'تم اضافة الصورة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('errors.404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return view('errors.404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        slider::find($id)->delete();
        return redirect()->back();
    }
}
