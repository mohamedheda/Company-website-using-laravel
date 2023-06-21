<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class BlogController extends Controller
{
    public function AllBlogs(){
        $blogs = Blog::latest()->get();
        return view('admin.blogs.all_blogs',compact('blogs'));
    } // End Method
    
    public function HomeBlog(){
        $blogs = Blog::latest()->paginate(3);
        $categorys=BlogCategory::all();
        return view('frontend.home_blogs',compact('blogs','categorys'));
    }

    public function AddBlogs(){
        $categorys=BlogCategory::orderby('name','ASC')->get();
        return view('admin.blogs.add_blogs',compact('categorys'));
    } //End Method

    public function StoreBlogs(Request $request){
        // Validate all data at one time
        $validator = Validator::make($request->all(), [
            '*' => 'required',
            'blog_image'=>'required'
        ]);
        if ($validator->fails()) {
            // Redirect back with validation errors or handle the validation errors as per your application's requirements
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $image=$request->file('blog_image');
        $imageName=hexdec(uniqid()).'.'.$request->file('blog_image')->getClientOriginalExtension();
        $file_path='uploads/blogs/'.$imageName;
        Image::class::make($image)->resize(430,327)->save($file_path);
        Blog::insert([
            'blog_category_id'=>$request->blog_category_id,
            'blog_title'=>$request->blog_title,
            'blog_image'=>$file_path,
            'blog_tags'=>$request->blog_tags,
            'blog_discription'=>$request->blog_discription,
            'created_at'=>Carbon::now(),
        ]);
    $notification=array(
        'message'=>'Blog added successfully',
        'alert-type'=>'success'
    );
    return redirect()->route('all.blogs')->with($notification);
    }    //End Method

    public function EditBlog($id){
        $blog=Blog::findOrFail($id);
        $categorys=BlogCategory::orderby('name','ASC')->get();
        return view('admin.blogs.edit_blog',compact('blog','categorys'));
    }//End Method

    public function UpdateBlogs(Request $request){
        // Validate all data at one time
        $validator = Validator::make($request->all(), [
            '*' => 'required',
        ]);
        if ($validator->fails()) {
            // Redirect back with validation errors or handle the validation errors as per your application's requirements
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($request->file('blog_image')){
        $image=$request->file('blog_image');
        $imageName=hexdec(uniqid()).'.'.$request->file('blog_image')->getClientOriginalExtension();
        $file_path='uploads/blogs/'.$imageName;
        Image::class::make($image)->resize(430,327)->save($file_path);
        Blog::findorfail($request->id)->update([
            'blog_category_id'=>$request->blog_category_id,
            'blog_title'=>$request->blog_title,
            'blog_image'=>$file_path,
            'blog_tags'=>$request->blog_tags,
            'blog_discription'=>$request->blog_discription,
        ]);
    $notification=array(
        'message'=>'Blog updated successfully with image',
        'alert-type'=>'success'
    );
    return redirect()->route('all.blogs')->with($notification);
}else {
    Blog::findorfail($request->id)->update([
        'blog_category_id'=>$request->blog_category_id,
        'blog_title'=>$request->blog_title,
        'blog_tags'=>$request->blog_tags,
        'blog_discription'=>$request->blog_discription,
    ]);
$notification=array(
    'message'=>'Blog updated successfully without image',
    'alert-type'=>'success'
);
return redirect()->route('all.blogs')->with($notification);
}
    }// End Method

public function DeleteBlog($id){
    $blog=Blog::findorfail($id);
    $image_path=$blog->blog_image;
    unlink($image_path);
    $blog->delete();
    $notification=array(
        'message'=>'Blog deleted successfully',
        'alert-type'=>'info'
    );
    return redirect()->route('all.blogs')->with($notification);
}//End Method

public function BlogDetails($id){
    $blog=Blog::findorfail($id);
    $tags=explode(',',$blog->blog_tags);
    $blogs=Blog::latest()->limit(5)->get();
    $categorys=BlogCategory::all();
    return view('frontend.blog_details',compact('blog','tags','blogs','categorys'));
}//End Method

public function CategoryBlogs($id){
    $blog=Blog::where('blog_category_id',$id)->orderBy('id','ASC')->get();
    $blogs=Blog::latest()->limit(5)->get();
    $categorys=BlogCategory::all();
    $category_name=BlogCategory::findorfail($id);
    return view('frontend.home_all.cat_blogs',compact('blog','blogs','categorys','category_name'));

}
}
