<?php

namespace App\Http\Controllers;

use App\Models\offer;
use App\Models\product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $offers= offer::all();
    //    $offers= offer::with('product')->find(1);
    //    return $offers;
       return view('admin.page.offer.index',compact('offers',$offers));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products= product::where('status_offer',0)->get();
    //    $offers= offer::with('product')->find(1);
    //    return $offers;
       return view('admin.page.offer.create',compact('products',$products));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        try{
        $validated = $request->validate([
            'new_price' => 'required',
            'product_id' => 'required'
        ]);
        $product = product::findOrFail($request->product_id);
        $oldPrice = $product->price;
        offer::create([


            'new_price' => $request->new_price,
            'old_price' => $oldPrice,
            'product_id' => $request->product_id,

        ]);
        product::find($request->product_id)->update([
            'price' => $request->new_price,
            'status_offer' => 1,
            'updated_at' => now()
        ]);
        return redirect()->route('admin.offers.index')->with('success' , 'تم اضافة العرض بنجاح');

        }catch (\Exception $e){
            return redirect()->route('admin.offers.index')->with('warning','فشل في عملية انشاء العرض');
        }
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
        $offer=offer::find($id);
        $product_id= $offer->product_id;
        product::find($product_id)->update([
            'status_offer' => 0,
        ]);
        $offer->delete();

        return redirect()->back();
    }
}
