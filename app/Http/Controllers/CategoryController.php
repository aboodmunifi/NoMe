<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::orderBy('id' , 'desc')->get();
        return view('admin.page.Category.index' , ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $validated = $request->validate([
            'category_name' => 'required',
        ]);
        // dd($request->all());
        category::create(['category_name' => $request->category_name,]);
        return redirect()->route('admin.categories.index')->with('success' , 'تم اضافة القسم بنجاح');

        }catch (\Exception $e){
            return redirect()->route('admin.categories.index')->with('warning','فشل في عملية انشاء القسم');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {
        $category = category::findOrFail($category->id);

        return view('admin.page.Category.edit',['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        try{
            $validated = $request->validate([
                'category_name' => 'required',
            ]);
            // dd($request->all());
            $category = category::findOrFail($category->id);
            $category->update(['category_name' => $request->category_name,]);
            }catch (\Exception $e){
                return redirect()->route('admin.categories.index')->with('warning','فشل في عملية تعديل القسم');
            }
            return redirect()->route('admin.categories.index')->with('success' , 'تم تعديل القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category = category::findOrFail($category->id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('delete' , 'تم حذف القسم بنجاح');
    }
}
