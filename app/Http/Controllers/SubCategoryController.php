<?php

namespace App\Http\Controllers;

use App\Models\SecondCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::orderBy('id' , 'desc')->get();
        return view('admin.page.Sub_Category.index',['subCategories' =>$subCategories ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $secondCategories = SecondCategory::all();
        return view('admin.page.Sub_Category.create',['secondCategories' =>$secondCategories]);

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
                'sub_category_name' => 'required',
                'second_category_id' => 'required'
            ]);
            //dd($request->all());
            SubCategory::create([
                'sub_category_name' => $request->sub_category_name,
                'second_category_id' => $request->second_category_id
            ]);
            return redirect()->route('admin.sub_categories.index')->with('success' , 'تم اضافة القسم الفرعي بنجاح');

        }catch (\Exception $e){
            return redirect()->route('admin.sub_categories.index')->with('warning','فشل في عملية انشاء القسم الفرعي');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $subCategory = SubCategory::findOrFail($subCategory->id);
        $secondCategories = SecondCategory::all();
        return view('admin.page.Sub_Category.edit',['secondCategories' =>$secondCategories , 'subCategory' => $subCategory]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        try{
            $validated = $request->validate([
                'sub_category_name' => 'required',

            ]);
            // dd($request->all());
            $subCategory = SubCategory::findOrFail($subCategory->id);
            $second_category_id = $request->second_category_id ?? $subCategory->second_category_id;
            $subCategory->update([
                'sub_category_name' => $request->sub_category_name,
                'second_category_id' => $second_category_id
            ]);
        }catch (\Exception $e){
            return redirect()->route('admin.sub_categories.index')->with('warning','فشل في عملية تعديل القسم الفرعي');
        }
        return redirect()->route('admin.sub_categories.index')->with('success' , 'تم تعديل القسم الفرعي بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory = SubCategory::findOrFail($subCategory->id);
        $subCategory->delete();
        return redirect()->route('admin.sub_categories.index')->with('delete' , 'تم حذف القسم الفرعي بنجاح');

    }
}
