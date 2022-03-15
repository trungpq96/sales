<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;
use App\Models\product;
use App\Models\payment;
use App\Models\order;
use App\Models\orderdetail;
use Session;

class pageController extends Controller
{
    //
   public function getDataIndex(){
    $prds = \DB::table('tb_product')
    ->join('tb_product_type', 'tb_product_type.id', '=', 'tb_product.prd_type_id')
    ->orderBy('tb_product.id','desc')->limit(8)
    ->selectRaw('tb_product.id,tb_product.name_prd,tb_product.image_prd,tb_product_type.name_prd_type,tb_product.price,tb_product.price_sale')->get();

    $prdtypes = \DB::table('tb_product_type')
    ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')->get();

    return view ('pages.index',['prds'=>$prds],['prdtypes'=>$prdtypes]);
   }

   public function searchProduct(Request $request)
   {
       $prd_type = $request->prd_type;
       $prd = $request->search_prd;

       if($prd_type != 0)
        {

            $filterResult = \DB::table('tb_product')
            ->join('tb_product_type', 'tb_product_type.id', '=', 'tb_product.prd_type_id')
            ->where([
                    ['prd_type_id',$prd_type],
                    ['name_prd','LIKE','%'.$prd.'%']
                ])
            ->orderBy('tb_product.id','desc')->limit(8)
            ->selectRaw('tb_product.id,tb_product.name_prd,tb_product.image_prd,tb_product_type.name_prd_type,tb_product.price,tb_product.price_sale')->get();
            
        }
       else
        {

            $filterResult = \DB::table('tb_product')
            ->join('tb_product_type', 'tb_product_type.id', '=', 'tb_product.prd_type_id')
            ->where([
                    ['name_prd','LIKE','%'.$prd.'%']
                ])
            ->orderBy('tb_product.id','desc')->limit(8)
            ->selectRaw('tb_product.id,tb_product.name_prd,tb_product.image_prd,tb_product_type.name_prd_type,tb_product.price,tb_product.price_sale')->get();
            
        }

        $prdtypes = \DB::table('tb_product_type')
        ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')->get();

         return view ('pages.search',['prds'=>$filterResult],['prdtypes'=>$prdtypes]);
   } 

   public function getDetailProduct($id){
    $prdd = \DB::table('tb_product')
    ->join('tb_product_type', 'tb_product_type.id', '=', 'tb_product.prd_type_id')
    ->join('tb_product_detail', 'tb_product_detail.product_id', '=', 'tb_product.id')
    ->join('tb_supplier', 'tb_supplier.id', '=', 'tb_product_detail.supplier_id')
    ->where('tb_product.id', $id)
    ->select('*')
    ->get();

    $id_p = $id;

    $prdtypes = \DB::table('tb_product_type')
    ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')->get();


    $img_views = \DB::table('tb_img_view')
    ->where('tb_img_view.id_prd', $id)
    ->select('*')
    ->get();

    $img_details = \DB::table('tb_img_detail')
    ->where('tb_img_detail.id_prd', $id)
    ->select('*')
    ->get();
    //   dd($img_details);
    return view ('pages.detail_product',compact('prdd', 'prdtypes', 'img_views', 'img_details', 'id_p'));
   }

   public function getAbout(){
    return view ('pages.about');
   }

   public function getLogin(){
    return view ('pages.login');
   }

   public function postLogin( Request $request)
   {
       
       $this->validate($request,[
           'email'=>'required',
           'password'=>'required|min:3|max:30'],
           ['email.required'=>'Bạn chưa nhập email',
           'password.required'=>'Bạn chưa nhập mật khẩu']);
          // dd($request);
       $auth = Auth::attempt([
           'email'=>$request->email,
           'password'=>$request->password,
           'position_id' => $request->position_id,
           'status' =>  $request->status,
           ]);

       if($auth)
       {
           return redirect()->route('index');
       }
       else
       {
           return redirect()->route('login')->with('message','Login Unsuccessful');
       }
   }

   public function getLogout()
   {
       Auth::logout();
       return redirect()->route('login');
   }

   public function getAddtoCart(Request $req, $id)
   {
      // dd($id);
       $product = product::find($id);
      
       $oldCart = Session('cart') ? Session::get('cart') : null;
       //dd($oldCart);
       $cart = new cart($oldCart);
       $cart->add($product, $id);
       $req->session()->put('cart', $cart);
    //    dd($cart);
       return redirect()->back();
   }

   public function getCart()
   {
    $prdtypes = \DB::table('tb_product_type')
    ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')->get();

    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    return view(
        'pages.cart',
        [
            'cart' => Session::get('cart'),
            'product_cart' => $cart->items,
            'totalPrice' => $cart->totalPrice,
            'totalQty' => $cart->totalQty
        ],
        ['prdtypes'=>$prdtypes]
    );
   }

   public function getCheckout()
   {
        $prdtypes = \DB::table('tb_product_type')
        ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')
        ->get();

       $pms = payment::all();
       if (Session('cart')) {
           $oldCart = Session::get('cart');
           $cart = new Cart($oldCart);

           return view(
               'pages.order',
               [
                   'pms' => $pms,
                   'cart' => Session::get('cart'),
                   'product_cart' => $cart->items,
                   'totalPrice' => $cart->totalPrice,
                   'totalQty' => $cart->totalQty
               ],
               ['prdtypes'=>$prdtypes]
           );
       } else {
           $pms = payment::all();
           return view('pages.order', ['pms' => $pms], ['prdtypes'=>$prdtypes]);
       }
   }

   public function getBuyNow($id)
   {
    $prdtypes = \DB::table('tb_product_type')
        ->selectRaw('tb_product_type.id,tb_product_type.name_prd_type')
        ->get();

    $pms = payment::all();

    $product = \DB::table('tb_product')
        ->where('tb_product.id', $id)
        ->select('*')
        ->get();

    return view('pages.order_now',compact('prdtypes', 'pms', 'product'));
   }

   public function postOrder(Request $req)
   {

       $cart = Session::get('cart');
       $order = new order;

       $order->user_id = $req->user_id;
       $order->name_order = $req->name_order;
       $order->number_phone = $req->number_phone;
       $order->address = $req->address;
       $order->attention = $req->attention;
       $order->total_price = $cart->totalPrice;
       $order->date_order = date('Y-m-d');
       $order->payment_id = $req->payment_id;
       $order->status = $req->status;
       $order->save();

       foreach ($cart->items as $key => $value) 
        {
            $orderdetail = new orderdetail;
            $orderdetail->order_id = $order->id;
            $orderdetail->prd_id = $key;
            $orderdetail->quantity = $value['qty'];
            $orderdetail->price = $value['price'] / $value['qty'];
            $orderdetail->save();
        }
       Session::forget('cart');
       return redirect()->route('index');
   }

  

   
}
