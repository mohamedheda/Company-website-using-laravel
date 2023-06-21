<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class FooterControlller extends Controller
{
    public function FooterSetup(){
        $footer=Footer::findorfail(1);
        return view('admin.footer.footer_setup',compact('footer'));
    }//End Method

    public function UpdateFooter(Request $request){
        Footer::findorfail($request->id)->update([
            'number'=>$request->number,
            'short_discription'=>$request->short_discription,
            'country'=>$request->country,
            'adress'=>$request->adress,
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'copy_right'=>$request->copy_right,
        ]);
        $notification=array(
            'message'=>'Footer updated successfully',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
        }
}
