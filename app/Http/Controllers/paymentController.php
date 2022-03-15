<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use DB;
class paymentController extends Controller
{
    //
        //
        public function getLstPayment()
        {   
            DB::statement(DB::raw('set @row:=0'));
             $payment= payment::selectRaw('*, @row:=@row+1 as row')->paginate(15);
            return view ('admin.payment.list_payment',['payment'=>$payment]);
        }
         
        public function searchPayment(Request $request)
        {
            $query = trim($request->get('search_payment'));
            DB::statement(DB::raw('set @row:=0'));
            $filterResult = \DB::table('tb_payments')
              ->where('name_payment', 'LIKE', '%'. $query. '%')
              ->orWhere('status', 'like', '%'. $query. '%')
              ->selectRaw('*, @row:=@row+1 as row')
              ->paginate(15);           
              return view ('admin.payment.list_payment',['payment'=>$filterResult]);
        } 
    
        public function getCrtPayment()
        {
            return view ('admin.payment.create_payment');
        }
    
        public function postCrtPayment(Request $request)
        {
            $this->validate($request,
                ['name_payment'=>'required|min:3|max:100'],
                ['name_payment.required'=>'Bạn chưa nhập tên loại sản phảm',
                'name_payment.min'=>'Nhập từ 3->100 ký tự',
                'name_payment.max'=>'Nhập từ 3->100 ký tự',
                ]);
    
            $payment = new payment;
            $payment->name_payment=$request->name_payment;
            $payment->description=$request->description;
            $payment->status=$request->status;
            $payment->save();
    
            return redirect()->route('lst_payment')->with('message','Insert Product Type Success');
        }
    
    
        public function getEditPayment($id)
        {
             $payment=payment::find($id);
             return view ('admin.payment.edit_payment',['payment'=>$payment]);  	
        }
      
         public function postEditPayment(Request $request,$id)
        {
            $payment=payment::find($id);
            $this->validate($request,
                ['name_payment'=>'required|min:3|max:100'],
                ['name_payment.required'=>'Bạn chưa nhập tên loại sản phảm',
                'name_payment.min'=>'Nhập từ 3->100 ký tự',
                'name_payment.max'=>'Nhập từ 3->100 ký tự',
                ]);
            $payment->name_payment=$request->name_payment;
            $payment->description=$request->description;
            $payment->status=$request->status;
            $payment->save();
    
            return redirect()->route('lst_payment')->with('message','Update Product Type Success');
        }
    
        public function getDelPayment($id)
        {
            $payment=payment::find($id);
            $payment->delete();
            return redirect()->back()->with('message','Delete Product Type Success');
        }
}
