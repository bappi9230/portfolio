<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function AllBlog(){
        $blog = Blog::latest()->get();
        return view('admin.blog_all.blog_All',compact('blog'));
    }
    public function AddBlog(){
        $blogCategory = BlogCategory::orderby('blog_category','ASC')->get();
        return view('admin.blog_All.add_blog',compact('blogCategory'));
    }
    public function StoreBlog(Request $request){
                   $request->validate(
            [
                'blog_category_id' => 'required',

            ],
            [
                'blog_category_id.required' => 'Blog Category Name is Required',
            ]
            );
            $image = $request->file('blog_image');
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(430,327)->save('upload/blog/'.$image_reName);
            $save_url_DB = 'upload/blog/'.$image_reName;

            Blog::insert([
                'blog_category_id'=> $request->blog_category_id,
                'blog_title'=> $request->blog_title,
                'blog_image'=> $save_url_DB,
                'blog_tags'=> $request->blog_tags,
                'blog_description'=> $request->blog_description,
                'created_at'=>Carbon::now(),
           ]);

        $notification = array(
            'message' => 'Inserted Blog successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
    }
    public function EditBlog($id){
            $blog = Blog::find($id);
            $blogCategory = BlogCategory::orderBy('blog_category','ASC')->get();
            return view('admin.blog_all.blog_edit',compact('blog','blogCategory'));
    }
    public function UpdateBlog(Request $request){
        $blogId = $request->id;
        if($request->file('blog_image')){
        $image = $request->file('blog_image');
        $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
        Image::make($image)->resize(430,327)->save('upload/blog/'.$image_reName);
        $save_url_DB = 'upload/blog/'.$image_reName;

            Blog::findOrFail($blogId)->update([
                'blog_category_id'=> $request->blog_category_id,
                'blog_title'=> $request->blog_title,
                'blog_image'=> $save_url_DB,
                'blog_tags'=> $request->blog_tags,
                'blog_description'=> $request->blog_description,
                'created_at'=>Carbon::now(),
           ]);

        $notification = array(
            'message' => 'Updated Blog successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
        }
        else{
            Blog::findOrFail($blogId)->update([
                'blog_category_id'=> $request->blog_category_id,
                'blog_title'=> $request->blog_title,
                'blog_tags'=> $request->blog_tags,
                'blog_description'=> $request->blog_description,
                'created_at'=>Carbon::now(),
           ]);

        $notification = array(
            'message' => 'Updated Blog successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog')->with($notification);
        }

    }
    public function DeleteBlog($id){
        $deleteBlogImage = Blog::findOrFail($id);
        $image = $deleteBlogImage->blog_image;
        unlink($image);
        BLog::findOrFail($id)->delete();
        $notification = array(
        'message' => 'Blog Image Deleted successfully',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }


    public function BlogDetails($id){
        $all_blog = Blog::latest()->limit(5)->get();
        $category= BlogCategory::orderBy('blog_category','ASC')->get();
        $blog = Blog::findOrFail($id);
        return view('frontend.blog_all.blog_details',compact('blog','all_blog','category'));
    }
    public function CategoryBlog($id){

        $blogPost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $all_blog = Blog::latest()->limit(5)->get();
         $category= BlogCategory::orderBy('blog_category','ASC')->get();
         $category_tittle= BlogCategory::findOrFail($id);
        return view('frontend.blog_all.category_blog_details',compact('blogPost','all_blog','category','category_tittle'));
    }
    public function HomeBlog()
    {
        $all_blog = Blog::latest()->paginate(3);
        $category= BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog',compact('all_blog','category'));
    }
}
