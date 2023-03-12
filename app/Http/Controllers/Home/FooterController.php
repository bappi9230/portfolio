<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function FooterSetup(){
        $allFooter = Footer::find(1);
        return view('admin.footer.all_footer',compact('allFooter'));
    }
    public function UpdateFooter(Request $request){
        $footerId = $request->id;
        Footer::findOrFail($footerId)->update([
              'number'=>$request->number,
              'short_description'=>$request->short_description,
              'address'=>$request->address,
              'email'=>$request->email,
              'facebook'=>$request->facebook,
              'twitter'=>$request->twitter,
              'copyright'=>$request->copyright,
        ]);
        $notification = array(
            'message' => 'Footer Updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
