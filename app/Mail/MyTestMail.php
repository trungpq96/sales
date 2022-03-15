<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    // public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

        // public function __construct($details)
    // {
    //     $this->details = $details;
    // }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        // return $this->subject('Mail from ItSolutionStuff.com')
        // ->attach(public_path('fileupload/ProductType(1)__1640682029.xlsx'),
        //  [
        //     'as' => 'ProductType(1)__1640682029.xlsx',
        //     'mime' => 'application/xlsx',
        // ]);
        return $this->view('admin.storage.myTestMail');
    }
}
