<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\productdetail;
use App\Models\producttype;
use App\Models\supplier;
use App\Models\imgview;
use App\Models\imgdetail;
use App\Exports\ExportProducts;
use App\Imports\ImportProducts;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    //
        //
        public function getLstPrd()
        {   
            DB::statement(DB::raw('set @row:=0'));
             $prd= product::selectRaw('*, @row:=@row+1 as row')->paginate(15);
            return view ('admin.product.list_product',['prd'=>$prd]);
        }

        public function getDetailPrd($id)
        {  
            $prd_detail = \DB::table('tb_product')
             ->join('tb_product_type', 'tb_product_type.id', '=', 'tb_product.prd_type_id')
             ->join('tb_product_detail', 'tb_product_detail.product_id', '=', 'tb_product.id')
             ->join('tb_supplier', 'tb_supplier.id', '=', 'tb_product_detail.supplier_id')
            ->where('tb_product.id', $id)
            ->select('*')
            ->get();

             return view ('admin.product.product_detail',['prd_detail'=>$prd_detail]);  	
        }

        public function prdSearch(Request $request)
        {
            // $query = $request->get('query');

            //dd($request);
            $query = trim($request->get('search'));
            DB::statement(DB::raw('set @row:=0'));
            $filterResult = \DB::table('tb_product')
              ->where('name_prd', 'LIKE', '%'. $query. '%')
              ->orWhere('status', 'like', '%'. $query. '%')
              ->selectRaw('*, @row:=@row+1 as row')
              ->paginate(15);           
              return view ('admin.product.list_product',['prd'=>$filterResult]);
        } 
    
        public function getCrtPrd()
        {
            $product_type = producttype::where('status','=','Active')->select('*')->get();
            $supplier = supplier::where('status','=','Active')->select('*')->get();
            // dd($product_type);
            return view ('admin.product.create_product',['product_type' => $product_type],['supplier' => $supplier]);
        }
    
        public function postCrtPrd(Request $request)
        {
        //validate form 
            $this->validate($request,
                ['name_prd'=>'required|min:3|max:100'],
                ['name_prd.required'=>'not input product',
                'name_prd.min'=>'Nhập từ 3->100 ký tự',
                'name_prd.max'=>'Nhập từ 3->100 ký tự',
                'image_prd_view' => 'required',
                'image_prd_view.*' => 'image'
                ]);

        //save image    
            $image = $request->file('image_prd');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images');
            $image->move($destinationPath, $image_name);
        
        //save data product
            $prd = new product;
            $prd->name_prd=$request->name_prd;
            $prd->image_prd = $image_name;
            $prd->prd_type_id=$request->prd_type_id;
            $prd->price=$request->price;
            $prd->price_sale=$request->price_sale;
            $prd->status=$request->status;
            $prd->save();

        //get id late product 
            $prd_late=product::orderBy('id','DESC')->limit(1)->get();

        //save image view
            if($request->hasfile('image_prd_view'))
            {
               foreach($request->file('image_prd_view') as $file)
               {
                   $name = time().rand(1,100).'.'.$file->getClientOriginalExtension();
                   $file->move(public_path('images/view'), $name);  
                   
                   $imgView= new imgview();
                   $imgView->id_prd = $prd_late[0]->id;
                   $imgView->img_view = $name;
                   $imgView->save();
               }
            }

        //save image detail
            if($request->hasfile('image_prd_detail'))
            {
                foreach($request->file('image_prd_detail') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->getClientOriginalExtension();
                    $file->move(public_path('images/detail'), $name);  
                    
                    $imgDetail= new imgdetail();
                    $imgDetail->id_prd = $prd_late[0]->id;
                    $imgDetail->img_detail = $name;
                    $imgDetail->save();
                }
            }
        
        //save data detail
            $prd_detail = new productdetail;
            $prd_detail->product_id=$prd_late[0]->id;
            $prd_detail->supplier_id=$request->supplier_id;
            $prd_detail->date_manufacture=$request->date_manufacture;
            $prd_detail->utilities=$request->utilities;
            $prd_detail->description=$request->description;
            $prd_detail->screen=$request->screen;
            $prd_detail->front_camera=$request->front_camera;
            $prd_detail->rear_camera=$request->rear_camera;
            $prd_detail->system=$request->system;
            $prd_detail->cpu=$request->cpu;
            $prd_detail->card=$request->card;
            $prd_detail->ram=$request->ram;
            $prd_detail->storage=$request->storage;
            $prd_detail->connect=$request->connect;
            $prd_detail->pin=$request->pin;
            $prd_detail->design=$request->design;
            $prd_detail->info=$request->info;
            $prd_detail->save();
    
            return redirect()->route('lst_prd')->with('message','Insert Product Success');
        }
    
    
        public function getEditPrd($id)
        {
             $prd=product::find($id);
             $product_type = producttype::all();
            // dd($prd);
             return view ('admin.product.edit_product',['prd'=>$prd],['product_type'=>$product_type]);  	
        }
      
         public function postEditPrd(Request $request,$id)
        {
            $prd=product::find($id);
            $this->validate($request,
                ['name_prd'=>'required|min:3|max:100'],
                ['name_prd.required'=>'Bạn chưa nhập tên loại sản phảm',
                'name_prd.min'=>'Nhập từ 3->100 ký tự',
                'name_prd.max'=>'Nhập từ 3->100 ký tự',
                ]);
                $image = $request->file('image_prd');
                //dd($request);
                $image_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images');
                $image->move($destinationPath, $image_name);


                $prd->name_prd=$request->name_prd;
                $prd->image_prd=$image_name;
                $prd->prd_type_id=$request->prd_type_id;
                $prd->price=$request->price;
                $prd->price_sale=$request->price_sale;
                $prd->status=$request->status;

                $prd_detail = new productdetail;
                $prd_detail->specifications=$request->specifications;
                $prd_detail->description=$request->description;
                $prd_detail->save();

            $prd->save();
    
            return redirect()->route('lst_prd')->with('message','Update Product  Success');
        }
    
        public function getDelPrd($id)
        {
            // dd($id);
            $prd=product::find($id);
            $prd->delete();
            return redirect()->back()->with('message','Delete Product  Success');
        }
        
        public function delMultiPrd(Request $request)
        {
            $ids = $request->ids;
           // dd($ids);
            DB::table("tb_product")->whereIn('id',explode(",",$ids))->delete();
            return redirect()->route('lst_prd')->with('message','Delete Product Success');
        }

        // Export Excel
        public function getExpPrd()
        {
            $nameFileExport =  'Product_'.time().'.xlsx';  
            return Excel::download(new ExportProducts, $nameFileExport);
        }

        //Import Excel

        public function postImportPrd()
        {
        // dd($request);
            Excel::import(new ImportProducts, request()->file('import_file'));
            return redirect()->back()->with('message','Import Product  Success');
        }
}
