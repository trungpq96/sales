<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producttype;
use App\Exports\ExportProductType;
use App\Imports\ImportProductType;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class producttypeController extends Controller
{
    //
    public function getLstPrdType()
    {   
        DB::statement(DB::raw('set @row:=0'));
         $prd_type= producttype::selectRaw('*, @row:=@row+1 as row')->paginate(15);
    	return view ('admin.producttype.list_product_type',['prd_type'=>$prd_type]);
    }

    
    public function prdTypeSearch(Request $request)
    {
        // $query = $request->get('query');

        //dd($request);
        $query = trim($request->get('search_prdt'));
        DB::statement(DB::raw('set @row:=0'));
        $filterResult = \DB::table('tb_product_type')
          ->where('name_prd_type', 'LIKE', '%'. $query. '%')
          ->orWhere('status', 'like', '%'. $query. '%')
          ->selectRaw('*, @row:=@row+1 as row')
          ->paginate(15);           
          return view ('admin.producttype.list_product_type',['prd_type'=>$filterResult]);
    } 

    public function getCrtPrdType()
    {
    	return view ('admin.producttype.create_product_type');
    }

    public function postCrtPrdType(Request $request)
    {
    	$this->validate($request,
    		['name_prd_type'=>'required|min:3|max:100'],
    		['name_prd_type.required'=>'Bạn chưa nhập tên loại sản phảm',
    		'name_prd_type.min'=>'Nhập từ 3->100 ký tự',
    		'name_prd_type.max'=>'Nhập từ 3->100 ký tự',
    		]);

    	$prd_type = new producttype;
    	$prd_type->name_prd_type=$request->name_prd_type;
    	$prd_type->description=$request->description;
    	$prd_type->status=$request->status;
    	$prd_type->save();

        return redirect()->route('lst_prd_type')->with('message','Insert Product Type Success');
    }


    public function getEditPrdType($id)
    {
    	 $prd_type=producttype::find($id);
    	 return view ('admin.producttype.edit_product_type',['prd_type'=>$prd_type]);  	
    }
  
     public function postEditPrdType(Request $request,$id)
    {
    	$prd_type=producttype::find($id);
    	$this->validate($request,
    		['name_prd_type'=>'required|min:3|max:100'],
    		['name_prd_type.required'=>'Bạn chưa nhập tên loại sản phảm',
    		'name_prd_type.min'=>'Nhập từ 3->100 ký tự',
    		'name_prd_type.max'=>'Nhập từ 3->100 ký tự',
    		]);
        $prd_type->name_prd_type=$request->name_prd_type;
        $prd_type->description=$request->description;
        $prd_type->status=$request->status;
        $prd_type->save();

        return redirect()->route('lst_prd_type')->with('message','Update Product Type Success');
    }

    public function getDelPrdType($id)
    {
    	$prd_type=producttype::find($id);
    	$prd_type->delete();
        return redirect()->back()->with('message','Delete Product Type Success');
    }

    // Export Excel
    public function getExpPrdType()
    {  
         $nameFileExport =  'ProductType_'.time().'.xlsx';  
        return Excel::download(new ExportProductType, $nameFileExport);
    }

    //Import Excel
    public function postImportPrdType()
    {
        Excel::import(new ImportProductType, request()->file('import_file'));
        return redirect()->back()->with('message','Import Product Type  Success');
    }
  
    
}