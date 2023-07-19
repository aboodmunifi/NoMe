<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\SecondCategory;
use Illuminate\Http\Request;

class SecondCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secondCategories = SecondCategory::orderBy('id' , 'desc')->get();
        return view('admin.page.Second_Category.index',['secondCategories' =>$secondCategories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.page.Second_Category.create',['categories' =>$categories]);
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
                'second_category_name' => 'required',
                'category_id' => 'required'
            ]);
            // dd($request->all());
            SecondCategory::create([
                'second_category_name' => $request->second_category_name,
                'category_id' => $request->category_id
            ]);
            return redirect()->route('admin.second_categories.index')->with('success' , 'تم اضافة القسم الثانوي بنجاح');

        }catch (\Exception $e){
            return redirect()->route('admin.second_categories.index')->with('warning','فشل في عملية انشاء القسم الثانوي');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SecondCategory $secondCategory)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondCategory $secondCategory)
    {
        $secondCategory = SecondCategory::findOrFail($secondCategory->id);
        $categories = category::all();
        return view('admin.page.Second_Category.edit',['secondCategory' =>$secondCategory , 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondCategory $secondCategory)
    {
        try{
            $validated = $request->validate([
                'second_category_name' => 'required',

            ]);

            // dd($request->all());
            $secondCategory = SecondCategory::findOrFail($secondCategory->id);
            $category_id = $request->category_id ?? $secondCategory->category_id ;
            $secondCategory->update([
                'second_category_name' => $request->second_category_name,
                'category_id' => $category_id
        ]);
            }catch (\Exception $e){
                return redirect()->route('admin.second_categories.index')->with('warning','فشل في عملية تعديل القسم الثانوي');
            }
            return redirect()->route('admin.second_categories.index')->with('success' , 'تم تعديل القسم الثانوي بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondCategory  $secondCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondCategory $secondCategory)
    {
        $secondCategory = SecondCategory::findOrFail($secondCategory->id);
        $secondCategory->delete();
        return redirect()->route('admin.second_categories.index')->with('delete' , 'تم حذف القسم الثانوي بنجاح');

    }
}
