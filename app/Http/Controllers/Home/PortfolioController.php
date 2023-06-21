<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio ;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Image;
class PortfolioController extends Controller
{
    //
    public function AddPortfolio(){
        return view('admin.portfolio.add_portfolio');
    }//End Method

    public function StorePortfolio(Request $request){
        $request->validate([
            'portfolio_name'=>'required',
            'portfolio_title'=>'required',
            'portfolio_discription'=>'required',
            'portfolio_image'=>'required|mimes:jpeg,png,jpg,gif',
        ],[
            'portfolio_name.required'=>'please enter the name',
            'portfolio_title.required'=>'please enter the tiltle',
            'portfolio_discription.required'=>'please enter the discription',
        ]);
        if($request->file('portfolio_image')){
            $image=$request->file('portfolio_image');
            $imageName=hexdec(uniqid()).'.'.$request->file('portfolio_image')->getClientOriginalExtension();
            $file_path='uploads/portfolio/'.$imageName;
            Image::class::make($image)->resize(1020,519)->save($file_path);
            Portfolio::insert([
                'portfolio_name'=>$request->portfolio_name,
                'portfolio_title'=>$request->portfolio_title,
                'portfolio_discription'=>$request->portfolio_discription,
                'portfolio_image'=>$file_path,
                'created_at'=>Carbon::now(),
            ]);
        }
        $notification=array(
            'message'=>'Portfolio added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.portfolio')->with($notification);
    }//End Method 

    public function AllPortfolio(){
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolio.all_portfolio',compact('portfolios'));
    }  // End Method


    public function EditPortfolio($id){
        $portfolio=Portfolio::findOrFail($id);
        return view('admin.portfolio.edit_portfolio',compact('portfolio'));
    }//End Method


    public function UpdatePortfolio(Request $request){
        $request->validate([
            'portfolio_name'=>'required',
            'portfolio_title'=>'required',
            'portfolio_discription'=>'required',
            'portfolio_image'=>'required|mimes:jpeg,png,jpg,gif',
        ]);
        $portfolio_id=$request->id;
        if($request->file('portfolio_image')){
            $image=$request->file('portfolio_image');
            $imageName=hexdec(uniqid()).'.'.$request->file('portfolio_image')->getClientOriginalExtension();
            $file_path='uploads/portfolio/'.$imageName;

            Image::class::make($image)->resize(1020,519)->save($file_path);

            Portfolio::findOrFail($portfolio_id)->update(
                [
                    'portfolio_name'=>$request->portfolio_name,
                    'portfolio_title'=>$request->portfolio_title,
                    'portfolio_discription'=>$request->portfolio_discription,
                    'portfolio_image'=>$file_path,
                ]
            );
            $notification=array(
                'message'=>'Portfolio updated successfully with Image',
                'alert-type'=>'info'
            );
            return redirect()->route('all.portfolio')->with($notification);
        } else {

            Portfolio::findOrFail($portfolio_id)->update(
                [
                    'portfolio_name'=>$request->portfolio_name,
                    'portfolio_title'=>$request->portfolio_title,
                    'portfolio_discription'=>$request->portfolio_discription,
                ]
            );
            $notification=array(
                'message'=>'Portfolio updated successfully without Image',
                'alert-type'=>'info'
            );
            return redirect()->route('all.portfolio')->with($notification);
        }
    }// End Method


    public function DeletePortfolio($id){
    $image=Portfolio::findOrFail($id);
    $image_path=$image->portfolio_image;
    unlink($image_path);
    Portfolio::findOrFail($id)->delete();
    $notification=array(
        'message'=>'Portfolio Deleted successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.portfolio')->with($notification);
    }//End Method

    public function PortfolioDetails($id){
        $portfolio=Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio'));
    }

}
