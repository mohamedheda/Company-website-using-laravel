<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
class AboutController extends Controller
{
    public function AboutSlider(){
        $aboutSlider=About::find(1);
        return view('admin/about/about',compact('aboutSlider'));
    }//End Method
    public function UpdateAbout(Request $request){
        $about_id=$request->id;
        if($request->file('about_image')){

            $image=$request->file('about_image');
            $imageName=hexdec(uniqid()).'.'.$request->file('about_image')->getClientOriginalExtension();
            $file_path='uploads/about_slider/'.$imageName;

            Image::class::make($image)->resize(523,605)->save($file_path);

            About::findOrFail($about_id)->update(
                [
                    'title'=>$request->title,
                    'short_title'=>$request->short_title,
                    'short_discription'=>$request->short_discription,
                    'long_discription'=>$request->long_discription,
                    'about_image'=> $file_path,
                ]
            );
            $notification=array(
                'message'=>'About slider updated successfully with Image',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
        } else {

            About::findOrFail($about_id)->update(
                [
                    'title'=>$request->title,
                    'short_title'=>$request->short_title,
                    'short_discription'=>$request->short_discription,
                    'long_discription'=>$request->long_discription,
                ]
            );
            $notification=array(
                'message'=>'About slider updated successfully without Image',
                'alert-type'=>'info'
            );
            return redirect()->back()->with($notification);
        }
    }//End Method
    public function About(){
        $about=About::find(1);
        return view('frontend/about',compact('about'));
    }//End Method
    public function MultiImage(){
        return view('admin/about/multi_image');
    }//End Method

    public function StoreImages(Request $request){
        $request->validate([
            'multi_image'=>'required'
        ]);
            $images=$request->file('multi_image');
            foreach($images as $image){
                $imageName=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $file_path='uploads/multi_images/'.$imageName;
    
                Image::class::make($image)->resize(220,220)->save($file_path);
    
                MultiImage::insert(
                    [
                        'multi_image'=> $file_path,
                        'created_at'=>Carbon::now(),
                    ]
                );
            }
            $notification=array(
                'message'=>'Multi Images added successfully',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification);
    }//End Method 
    
    public function AllMultiImage(){
        $images=MultiImage::all();
        return view('admin/about/all_images',compact('images'));
    }//End Method 

    public function EditImage ($id){
        $image=MultiImage::findOrFail($id);
        return view('admin/about/edit_image',compact('image'));
    }//End Method 

    public function UpdateImage(Request $request){
        $id=$request->id;
        if($request->file('multi_image')){

            $image=$request->file('multi_image');
            $imageName=hexdec(uniqid()).'.'.$request->file('multi_image')->getClientOriginalExtension();
            $file_path='uploads/multi_images/'.$imageName;
            Image::class::make($image)->resize(220,220)->save($file_path);
            
            MultiImage::findOrFail($id)->update(
                [
                    'multi_image'=> $file_path,
                    ]
                );
            $notification=array(
                'message'=>'Image updated successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.multi.image')->with($notification);
        }else {
            return redirect()->back();
        }
    }//End Method 

    public function DeleteImage($id){
        $image=MultiImage::findOrFail($id);
        $image_path=$image->multi_image;
        unlink($image_path);
        MultiImage::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Image Deleted successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.multi.image')->with($notification);
    }
}
