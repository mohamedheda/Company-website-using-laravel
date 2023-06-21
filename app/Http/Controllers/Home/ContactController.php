<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ContactController extends Controller
{
    public function Contact(){
        return view('frontend.contact');
    }//End Method
    public function StoreMessage(Request $request){
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'number'=>$request->number,
            'message'=>$request->message,
            'created_at'=>Carbon::now(),
        ]);
        $notification=array(
            'message'=>'Message sented successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification); 
    }//End Method

    public function ContactMessages(){
        $messages=Contact::latest()->get();
        return view('admin.contact.allcontact',compact('messages'));
    }//End Method

    public function DeleteMessage($id){
        Contact::findorfail($id)->delete();
        $notification=array(
            'message'=>'Message deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification); 
    }//End Method

    public function ShowMessage($id){
        $message=Contact::findorfail($id);
        return view('admin.contact.show_message',compact('message'));
    }
}
