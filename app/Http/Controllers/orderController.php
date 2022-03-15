<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use DB;

class orderController extends Controller
{
    //
    public function getLstOrder()
    {   
        DB::statement(DB::raw('set @row:=0'));
        $orders = \DB::table('tb_order')
        ->join('tb_payments', 'tb_payments.id', '=', 'tb_order.payment_id')
        ->join('users', 'users.id', '=', 'tb_order.user_id')
       ->selectRaw('tb_order.id,tb_order.name_order,tb_order.number_phone,tb_order.address,
                    tb_order.attention,tb_order.total_price,tb_order.date_order,tb_order.status,
                    tb_order.created_at,
                    tb_payments.name_payment,users.name,
                        @row:=@row+1 as row')->paginate(15);
        return view ('admin.orders.list_orders',['orders'=>$orders]);
    }

    public function searchOrder(Request $request)
    {
        $query = trim($request->get('tb_order'));
        DB::statement(DB::raw('set @row:=0'));
        $filterResult = \DB::table('tb_payments')
          ->where('name_order', 'LIKE', '%'. $query. '%')
          ->orWhere('number_phone', 'like', '%'. $query. '%')
          ->orWhere('user_id', 'like', '%'. $query. '%')
          ->selectRaw('*, @row:=@row+1 as row')
          ->paginate(15);           
          return view ('admin.orders.list_orders',['orders'=>$filterResult]);
    } 

    
    public function getDetailOrder($id)
    {    DB::statement(DB::raw('set @row:=0'));
        $order_detail = \DB::table('tb_order')
         ->join('tb_order_detail', 'tb_order_detail.order_id', '=', 'tb_order.id')
         ->join('tb_product', 'tb_order_detail.prd_id', '=', 'tb_product.id')
        ->where('tb_order.id', $id)
        ->selectRaw('*, @row:=@row+1 as row')
        ->paginate(15); 
         return view ('admin.orders.detail_order',['order_detail'=>$order_detail]);  	
    }
}
