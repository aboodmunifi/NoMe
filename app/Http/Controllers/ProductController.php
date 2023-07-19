<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use App\Models\image;
use App\Models\product;
use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=product::orderBy('id' , 'desc')->get();
        $categories=category::orderBy('id' , 'desc')->get();



        return view('admin.page.Product.index',compact('products','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {


        $subCategories=SubCategory::orderBy('id' , 'desc')->get();

        return view('admin.page.Product.create',compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            //dd($request->all());
            $image_name = '';

            if ($request->has('primary_image')) {
                $FileEx = $request->file('primary_image')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('primary_image')->move(public_path('upload/admin/product'), $image_name);
            }

            // return   $image_name;
            $product = product::create([
                'product_name' => $request->product_name,
                'sub_category_id' => $request->sub_category_id,
                'price' => $request->price,
                'description' => $request->description,
                'primary_image' => $image_name,
                'status_offer' =>  0,
                'created_at' => now()
            ]);

            $sizes = $request->sizes;
            foreach ($sizes as $size) {
                size::create([
                    'product_id' => $product->id,
                    'size_name' => $size['size'],
                ]);
            }

            $colors = $request->colors;
            foreach ($colors as $color) {
                color::create([
                    'product_id' => $product->id,
                    'color_name' => $color['color'],
                ]);
            }

            $images = $request->images;
            foreach ($images as $image) {
                $image_second = '';

                //dd($image);
                    $FileEx = $image['second_image']->getClientOriginalExtension();
                    $image_second = time() . '_' . rand() . '.' . $FileEx;
                    $image['second_image']->move(public_path('upload/admin/product'), $image_second);

                image::create([
                    'product_id' => $product->id,
                    'image_name' => $image_second,
                ]);
            }
            return redirect()->route('admin.products.index')->with('success' , 'تم اضافة المنتج بنجاح');

        } catch (\Throwable $th) {
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        return view('errors.404');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=product::find($id);
        // return $products;
        $subCategories=SubCategory::all();

        return view('admin.page.Product.edit',compact('product','subCategories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {

        //try{
            $product = product::findOrFail($id);
            //dd($request->all());
            $image_name = $product->primary_image ;
            $sub_category_id = $request->sub_category_id ?? $product->sub_category_id ;
            if ($request->has('primary_image')) {
                $FileEx = $request->file('primary_image')->getClientOriginalExtension();
                $image_name = time() . '_' . rand() . '.' . $FileEx;
                $request->file('primary_image')->move(public_path('upload/admin/product'), $image_name);
            }

            // return   $image_name;
            $product->update([
                'product_name' => $request->product_name,
                'sub_category_id' =>$sub_category_id ,
                'price' => $request->price,
                'description' => $request->description,
                'primary_image' => $image_name,
                'status_offer' =>  0,
                'created_at' => now()
            ]);

            $sizes = $request->sizes;
            foreach ($sizes as $size) {
                if ($size['size'] != null) {
                    size::create([
                    'product_id' => $product->id,
                    'size_name' => $size['size'],
                ]);
                }
            }


            $colors = $request->colors;
            foreach ($colors as $color) {
                if($size['size'] != null){
                    color::create([
                        'product_id' => $product->id,
                        'color_name' => $color['color'],
                    ]);
                }

            }

            if($request->has('images')){
                $images = $request->images;

                foreach ($images as $image) {

                        $image_second = '';

                        //dd($image);
                            $FileEx = $image['second_image']->getClientOriginalExtension();
                            $image_second = time() . '_' . rand() . '.' . $FileEx;
                            $image['second_image']->move(public_path('upload/admin/product'), $image_second);

                        image::create([
                            'product_id' => $product->id,
                            'image_name' => $image_second,
                        ]);
                    }

                }


            return redirect()->route('admin.products.index')->with('success' , 'تم تعديل المنتج بنجاح');

        // } catch (\Throwable $th) {
        //     return redirect()->route('admin.products.index');
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try{
        $product = product::findOrFail($id);
        $product->delete();
        $sizes = size::where('product_id' , $id);
        foreach($sizes as $size){
            $size->delete();
        }
        $colors = color::where('product_id' , $id);
        foreach($colors as $color){
            $color->delete();
        }
        $images = image::where('product_id' , $id);
        foreach($images as $image){
            $image->delete();
        }
        return redirect()->route('admin.products.index')->with('delete' , 'تم حذف المنتج بنجاح');

    } catch (\Throwable $th) {
        return redirect()->route('admin.products.index');
    }
    }

    public function out_of_stock(Request $request,  $id){
        $product = product::findOrFail($request->product_id);
        $product->update([
            'out_of_stock' => 1,
        ]);
        return redirect()->route('admin.products.index')->with('success' , 'نفذت كمية المنتج');

    }

    public function not_out_of_stock(Request $request,  $id){
        $product = product::findOrFail($request->product_id);
        $product->update([
            'out_of_stock' => 0,
        ]);
        return redirect()->route('admin.products.index')->with('success' , ' كمية المنتج متوفرة');

    }
}
