<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=order::orderBy('id','desc')->get();
        return view('admin.page.order.index',compact('orders'));
    }
    public function active()
    {
        $orders=order::orderBy('id','desc')->where('status',1)->get();
        return view('admin.page.order.active',compact('orders'));
    }
    public function noactive()
    {
        $orders=order::orderBy('id','desc')->where('status',0)->get();
        return view('admin.page.order.noactive',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('errors.404');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->product_id;
        try{
            //dd($request->all());
        $validated = $request->validate([
            'color' => 'required',
            'size' => 'required',
            'amount' => 'required',
            'person_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'product_id' => 'required'
        ]);
        order::create([

         
            'color' => $request->color,
            'size' => $request->size,
            'amount' => $request->amount,
            'person_name' => $request->person_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'product_id' => $request->product_id,
            'status' => 0,
        ]);
        return redirect()->back()->with('success' , 'تم اضافة الطلبية بنجاح');

        }catch (\Exception $e){
            return redirect()->back()->with('warning','فشل في عملية انشاء الطلبية');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        return view('errors.404');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders=order::find($id);
        return view('admin.page.order.edit',compact('orders'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;

        try {
            if ($request->has('status') == 1) {
                $request->status = 1;
            } else {
                $request->status = 0;
            }
    
            // return   $image_name;
            order::find($id)->update([
    
               
                'status' => $request->status,
                'updated_at' => now()
         
            ]);        
            return redirect()->route('admin.orders.index');

        } catch (\Throwable $th) {
            return redirect()->route('admin.orders.index');
        }

    }
       

   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        order::find($id)->delete();
        return redirect()->back();
    }
}
