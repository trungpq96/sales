<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\position;
use DB;

class positionController extends Controller
{
    //
    public function getLstPosition()
    {   
        DB::statement(DB::raw('set @row:=0'));
         $positions= position::selectRaw('*, @row:=@row+1 as row')->paginate(15);
        return view ('admin.position.list_position',['positions'=>$positions]);
    }
     
    public function searchPosition(Request $request)
    {
        $query = trim($request->get('search_position'));
        DB::statement(DB::raw('set @row:=0'));
        $filterResult = \DB::table('tb_position')
          ->where('name_position', 'LIKE', '%'. $query. '%')
          ->orWhere('status', 'like', '%'. $query. '%')
          ->selectRaw('*, @row:=@row+1 as row')
          ->paginate(15);           
          return view ('admin.position.list_position',['positions'=>$filterResult]);
    } 

    public function getCrtPosition()
    {
        return view ('admin.position.create_position');
    }

    public function postCrtPosition(Request $request)
    {
        $this->validate($request,
            ['name_position'=>'required|min:3|max:100'],
            ['name_position.required'=>'Bạn chưa nhập tên loại sản phảm',
            'name_position.min'=>'Nhập từ 3->100 ký tự',
            'name_position.max'=>'Nhập từ 3->100 ký tự',
            ]);

        $position = new position;
        $position->name_position=$request->name_position;
        $position->description=$request->description;
        $position->status=$request->status;
        $position->save();

        return redirect()->route('lst_position')->with('message','Insert Sosition Success');
    }


    public function getEditPosition($id)
    {
         $position=position::find($id);
         return view ('admin.position.edit_position',['position'=>$position]);  	
    }
  
     public function postEditPosition(Request $request,$id)
    {
        $position=position::find($id);
        $this->validate($request,
            ['name_position'=>'required|min:3|max:100'],
            ['name_position.required'=>'Bạn chưa nhập tên loại sản phảm',
            'name_position.min'=>'Nhập từ 3->100 ký tự',
            'name_position.max'=>'Nhập từ 3->100 ký tự',
            ]);
        $position->name_position=$request->name_position;
        $position->description=$request->description;
        $position->status=$request->status;
        $position->save();

        return redirect()->route('lst_position')->with('message','Update Sosition Success');
    }

    public function getDelPosition($id)
    {
        $position=position::find($id);
        $position->delete();
        return redirect()->back()->with('message','Delete Sosition Success');
    } 
}
