<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use QrCode;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class storageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUpload()
    {
        $path = public_path('fileupload');
        $files = File::allFiles($path);
        $no = 1;
        // dd($files);
        if( count($files) > 0){
            foreach( $files as $file ) {
                $filesArr[] = array( 'fileName' => $file->getRelativePathname() , 'row_no' => $no);
                $no = $no + 1 ;
            }  
        }
        else{
            $filesArr[] = array( 'fileName' => '' , 'row_no' => '');
        }
        return view ('admin.storage.fileUpload',compact('filesArr'));
    }

    public function download($file){
        $file_path = public_path('fileupload/'.$file);
        return response()->download( $file_path);
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,xlsx|max:2048',
        ]);

        $namefile = $request->file->getClientOriginalName();
        $search = ['.pdf','.xlx','.csv','.xlsx'];
        $replace = '_';
        $result = str_replace($search, $replace, $namefile);

        $fileName =  $result.'_'.time().'.'.$request->file->extension();  
       
        $request->file->move(public_path('fileupload'), $fileName);
   
        return back()
            ->with('success','You have successfully upload file.')
            ->with('file',$fileName);
   
    }

    // public function generatePDF()
    // {
    //     $data = [
    //         'title' => 'Welcome to ItSolutionStuff.com',
    //         'date' => date('m/d/Y')
    //     ];
          
    //     $pdf = PDF::loadView('admin.storage.myPdf', $data);
    
    //     return $pdf->download('itsolutionstuff.pdf');
    // }

    public function createEmail()
    {   
    	return view ('admin.storage.sendMail');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,xlsx|max:2048',
        ]); 

        $data["email"] = $request->email_to;
        $data["title"] = $request->email_title;
        $data["body"] = $request->contend_mail;
        $data["signature"] = $request->signature;
        //save file
        $namefile = $request->file->getClientOriginalName();
        $search = ['.pdf','.xlx','.csv','.xlsx'];
        $replace = '_';
        $result = str_replace($search, $replace, $namefile);
        $fileName =  $result.'_'.time().'.'.$request->file->extension();  
        $request->file->move(public_path('fileupload'), $fileName);
 
        $files = [
            public_path('fileupload/'.$fileName),
        ];
  
        Mail::send('admin.storage.myTestMail', ['data' => $data], function($message)use($data, $files) {
            $message->to($data["email"])
                    ->subject($data["title"]);
 
            foreach ($files as $file){
                $message->attach($file);
            }            
        });
        return back() ->with('success','Mail send successfully !!');
        //echo "Mail send successfully !!";

        // $details = [
        //     'title' => 'Mail from ItSolutionStuff.com',
        //     'body' => 'This is for testing email using smtp'
        // ];
       
        // \Mail::to('quangtrung240396@gmail.com')->send(new \App\Mail\MyTestMail($details));
       
        // dd("Email is Sent.");
    }

    // public function qrCode()
    // {
    //     \QrCode::size(500)
    //     ->format('png')
    //     ->generate('ItSolutionStuff.com', public_path('images/qrcode.png'));
    //     dd("success");

    // }


    
}
