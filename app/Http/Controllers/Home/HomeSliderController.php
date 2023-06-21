<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{   
    public function HomeSlider(){
        $home_slider=HomeSlider::find(1);
        return view('Admin/Home/home_slider',compact('home_slider'));
    }//End Mehtod

    public function UpdateSlider(Request $request){
        $slide_id=$request->id;
        if($request->file('image')){

            $image=$request->file('image');
            $imageName=hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $file_path='uploads/home_slider/'.$imageName;

            Image::class::make($image)->resize(636,852)->save($file_path);

            HomeSlider::findOrFail($slide_id)->update(
                [
                    'title'=>$request->title,
                    'short_title'=>$request->short_title,
                    'image'=> $file_path,
                    'video_url'=>$request->video_url,
                ]
            );
            $notification=array(
                'message'=>'Home slider updated successfully with Image',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
        } else {

            HomeSlider::find($slide_id)->update([
                    'title'=>$request->title,
                    'short_title'=>$request->short_title,
                    'video_url'=>$request->video_url,
                ]
            );
            $notification=array(
                'message'=>'Home slider updated successfully without Image',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
        }
    }//End Method
}
