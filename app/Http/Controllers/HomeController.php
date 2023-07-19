<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\image;
use App\Models\offer;
use App\Models\order;
use App\Models\slider;
use App\Models\product;
use App\Models\category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SecondCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth')->only('control_panel');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $latestProducts = product::orderBy('id' , 'desc')->take(20)->get();
        $categories = category::orderBy('id' , 'desc')->get();
        $offerProducts = product::where('status_offer' , 1)->get();

        $products = product::where('status_offer' , 0)->take(6)->get();
        $product = product::orderBy('id' , 'desc')->take(1)->get();
        $sliders = slider::all();

        return view('front.index',compact('latestProducts', $latestProducts , 'categories' ,$categories , 'offerProducts' , $offerProducts ,'products', $products ,'product' ,$product,'sliders' ,$sliders));


    }
    public function control_panel(){

        $product=product::all()->count();
        $orders=order::all()->count();
        $users=User::all()->count();
        $offer=offer::all()->count();

        return view('admin.index',compact('product', 'orders','users','offer'));

    }
    public function about()
    {
        $categories = category::orderBy('id' , 'desc')->get();

        return view('front.about', compact('categories'));
    }
    public function products()
    {
        $categories = category::orderBy('id' , 'desc')->get();

        $products = product::orderBy('id' , 'desc')->get();
        return view('front.products',compact('products', 'categories'));
    }
    public function categorypage(category $category)
    {
        $categories = category::orderBy('id' , 'desc')->get();
        dd($category->secondCategory->subCategory->id);
        $products = product::orderBy('id' , 'desc')->where('sub_category_id' , $category->secondCategory->subCategory->id)->get();
        return view('front.products',compact('products', 'categories'));
    }
    public function secondCategorypage(SecondCategory $secondCategory){
        $secondCategory = SecondCategory::findOrFail($secondCategory->id);
        // dd($secondCategory->subCategoryProduct);

        $products = product::orderBy('id' , 'desc')->get();
        $categories = category::orderBy('id' , 'desc')->get();
        return view('front.secondCategory',compact('secondCategory' ,'products' , 'categories'));
    }
    public function subCategorypage(SubCategory $subCategory){
        $subCategory = SubCategory::findOrFail($subCategory->id);
        $products = product::orderBy('id' , 'desc')->where('sub_category_id' , $subCategory['id'])->get();
        // dd($products);
        $categories = category::orderBy('id' , 'desc')->get();
        return view('front.products',compact('products' , 'categories'));
    }
    public function productpage(product $product)
    {
        $product = product::findOrFail($product->id);
        $products = product::where('sub_category_id' , $product->sub_category_id)->orderBy('id' ,'desc')->get();
        $categories = category::orderBy('id' , 'desc')->get();
        $productImages = image::where('product_id' , $product->id)->get();
       // dd($productImages);
        return view('front.productpage', compact('product'  , 'products' , 'categories'  , 'productImages'));
    }
    public function contact()
    {
        $categories = category::orderBy('id' , 'desc')->get();

        return view('front.contact',compact( 'categories'));
    }
    public function findProduct(Request $request)

    {

        // return $request;
        $search_text = $request->input('query');
        $Products=[];

        $Products =product::where('product_name', 'LIKE', '%' . $search_text . '%')->pluck('id')->toarray();
        // $Products =product::where('product_name', 'LIKE',$search_text )->pluck('id')->toarray();


        $products  = product::whereIn('id',$Products)->get();
        $categories = category::orderBy('id' , 'desc')->get();


        return view('front.products',compact('products'  ,'categories' ));
    }


    public function order(Request $request)
    {
        // return $request->product_id;
        try{
            //dd($request->all());
            $discount = "";
            if($request->discount == "111021"){
                $discount = "خصم بنسبة 10% ";
            }elseif($request->discount == "111521"){
                $discount = "خصم بنسبة 15% ";
            }else{
                $discount = "لا يوجد خصم";
            }
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
            'discount' =>$discount,
        ]);
        return redirect()->back()->with('success' , 'تم اضافة الطلبية بنجاح');

        }catch (\Exception $e){
            return redirect()->back()->with('warning','فشل في عملية انشاء الطلبية');
        }
    }

    public function offers(){
        $offerProducts = product::where('status_offer' , 1)->get();
        $offers = offer::all();
        $categories = category::orderBy('id' , 'desc')->get();
        return view('front.offers',compact( 'categories' ,'offers' , 'offerProducts' ));
    }

    public function app(){
        $categories = category::orderBy('id' , 'desc')->get();

        return view('front.app',compact( 'categories' ));
    }
}
