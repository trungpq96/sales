<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportSupplier;

class supplierController extends Controller
{
    //
    public function getLstSupplier()
    {   
        DB::statement(DB::raw('set @row:=0'));
         $suppliers= supplier::selectRaw('*, @row:=@row+1 as row')->paginate(15);
        return view ('admin.supplier.list_supplier',['suppliers'=>$suppliers]);
    }
     
    public function searchSupplier(Request $request)
    {
        $query = trim($request->get('search_supplier'));
        DB::statement(DB::raw('set @row:=0'));
        $filterResult = \DB::table('tb_supplier')
          ->where('name_supplier', 'LIKE', '%'. $query. '%')
          ->orWhere('email_supplier', 'like', '%'. $query. '%')
          ->selectRaw('*, @row:=@row+1 as row')
          ->paginate(15);           
          return view ('admin.supplier.list_supplier',['suppliers'=>$filterResult]);
    } 

    public function getCrtsupplier()
    {
        return view ('admin.supplier.create_supplier');
    }

    public function postCrtSupplier(Request $request)
    {
        $this->validate($request,
            ['name_supplier'=>'required|min:3|max:100'],
            ['name_supplier.required'=>'Bạn chưa nhập tên loại sản phảm',
            'name_supplier.min'=>'Nhập từ 3->100 ký tự',
            'name_supplier.max'=>'Nhập từ 3->100 ký tự',
            ]);

        $supplier = new supplier;
        $supplier->name_supplier=$request->name_supplier;
        $supplier->email_supplier=$request->email_supplier;
        $supplier->address_supplier=$request->address_supplier;
        $supplier->website=$request->website;
        $supplier->status=$request->status;
        $supplier->save();

        return redirect()->route('lst_supplier')->with('message','Insert Supplier Success');
    }


    public function getEditSupplier($id)
    {
         $supplier=supplier::find($id);
         return view ('admin.supplier.edit_supplier',['supplier'=>$supplier]);  	
    }
  
     public function postEditSupplier(Request $request,$id)
    {
        $supplier=supplier::find($id);
        $this->validate($request,
            ['name_supplier'=>'required|min:3|max:100'],
            ['name_supplier.required'=>'Bạn chưa nhập tên loại sản phảm',
            'name_supplier.min'=>'Nhập từ 3->100 ký tự',
            'name_supplier.max'=>'Nhập từ 3->100 ký tự',
            ]);
        $supplier->name_supplier=$request->name_supplier;
        $supplier->email_supplier=$request->email_supplier;
        $supplier->address_supplier=$request->address_supplier;
        $supplier->website=$request->website;
        $supplier->status=$request->status;
        $supplier->save();

        return redirect()->route('lst_supplier')->with('message','Update Supplier Success');
    }

    public function getDelSupplier($id)
    {
        $supplier=supplier::find($id);
        $supplier->delete();
        return redirect()->back()->with('message','Delete Supplier Success');
    }

    // Export Excel
    public function getExpSupplier()
    {
        return Excel::download(new ExportSupplier, 'Supplier.xlsx');
    }
}
