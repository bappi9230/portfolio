<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_category',compact('blogCategory'));
    }
    public function AddBlogCategory(){
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.add_blog_category',compact('blogCategory'));
    }
    public function StoreBlogCategory(Request $request){
        $request->validate(
            [
                'blog_category' => 'required',

            ],
            [
                'blog_category.required' => 'Blog Category Name is Required',
            ]
            );
            BlogCategory::insert([
                'blog_category'=> $request->blog_category,
            ]);
                $notification = array(
            'message' => 'Blog Category Inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    public function EditBlogCategory($id){
            $blogCategory = BlogCategory::find($id);
            return view('admin.blog_category.edit_blog_category',compact('blogCategory'));
        }
    public function UpdateBlogCategory(Request $request){
            $blogCategoryId = $request->id;
            BlogCategory::findOrFail($blogCategoryId)->update([
                'blog_category'=> $request->blog_category,
            ]);
                $notification = array(
                        'message' => 'Blog Category Updated successfully',
                        'alert-type' => 'success'
                    );
                return redirect()->route('all.blog.category')->with($notification);
        }
    public function DeleteBlogCategory($id){

            BlogCategory::find($id)->delete();

                $notification = array(
                        'message' => 'Portfolio Updated with Image successfully',
                        'alert-type' => 'success'
                    );
                return redirect()->route('all.blog.category')->with($notification);
        }

}
