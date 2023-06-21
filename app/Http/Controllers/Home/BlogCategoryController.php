<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllCategory(){
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_categoory',compact('blogCategory'));
    }//End Method
    
    public function AddBlogCategory(){
        return view('admin.blog_category.add_blog_categoory');
    }// End Method

    public function StoreBlogCategory(Request $request){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'please enter the name',
        ]);

            BlogCategory::insert([
                'name'=>$request->name,
            ]);
        $notification=array(
            'message'=>'Blog Category added successfully',
            'alert-type'=>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }//End Method

    public function EditBlogCategory($id){
        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_categoory',compact('blogCategory'));
    }//End Method

    public function UpdateBlogCategory(Request $request){
        $request->validate([
            'name'=>'required',
        ],[
            'name.required'=>'please enter the name',
        ]);
        $blogCategory = BlogCategory::findOrFail($request->id);
        $blogCategory->update([
            'name'=>$request->name
        ]);
        $notification=array(
            'message'=>'Blog Category updated successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('all.category')->with($notification);
    }// End Method

    public function DeleteBlogCategory($id){
        $blogCategory = BlogCategory::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Blog Category deleted successfully',
            'alert-type'=>'info'
        );
        return redirect()->route('all.category')->with($notification);
    }
}
