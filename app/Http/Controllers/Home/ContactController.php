<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function ContactMe(){
        $allContact = Contact::find(1);
        return view('frontend.contact',compact('allContact'));
    }
    public function ContactStore(Request $request){
        Contact::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'message' => $request->message,
            'created_at' => Carbon::now(),

        ]);
        $notification = array(
            'message' => 'Your message Submitted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function ContactMessage(){
        $allContactMessage = Contact::latest()->get();
        return view('admin.contact.contact',compact('allContactMessage'));
    }
    public function DeleteMessage($id){

        Contact::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Message Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
