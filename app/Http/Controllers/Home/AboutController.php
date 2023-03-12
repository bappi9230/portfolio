<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class AboutController extends Controller
{
    public function AboutPage(){
        $aboutPage = About::find(1);
        return view('admin.about_page.about_page',compact('aboutPage'));
    }
    public function UpdateAbout(Request $request){
    $slider_id = $request->id;
    if($request->file('about_image'))
    {
        $image = $request->file('about_image');
        $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
        Image::make($image)->resize(523,605)->save('upload/about_image/'.$image_reName);
        $save_url = 'upload/about_image/'.$image_reName;

        About::findOrFail($slider_id)->update([
            'title'=> $request->title,
            'short_title'=> $request->short_title,
            'short_description'=> $request->short_description,
            'long_description'=> $request->long_description,
            'about_image'=> $save_url,
        ]);
        $notification = array(
            'message' => 'About Page Updated with Image successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    else
    {
        About::findOrFail($slider_id)->update([
            'title'=> $request->title,
            'short_title'=> $request->short_title,
            'short_description'=> $request->short_description,
            'long_description'=> $request->long_description,
        ]);
        $notification = array(
            'message' => 'About Page Updated without Image successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
    }
    public function HomeAbout(){
        $homeAbout =About::find(1);
        return view('frontend.home_all.about_page',compact('homeAbout'));
    }
    public function AboutMultiImage(){
        return view('admin.about_page.multi_image');
    }
    public function StoreMultiImage(Request $request){
        $multi_image = $request->file('multi_image');
        foreach($multi_image as $image)
        {
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(220,220)->save('upload/multi_image/'.$image_reName);
            $save_url = 'upload/multi_image/'.$image_reName;

            MultiImage::insert([
                'multi_image'=> $save_url,
                'created_at'=> Carbon::now(),
            ]);
        }
        $notification = array(
        'message' => 'Multi Image Store successfully',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function AllMultiImage(){
        $allMultiImage = MultiImage::all();
        return view('admin.about_page.all_multi_image',compact('allMultiImage'));
    }

    public function EditMultiImage($id){
        $editMultiImage = MultiImage::findOrFail($id);
        return view('admin.about_page.edit_multi_image',compact('editMultiImage'));
    }


    public function UpdateMultiImage(Request $request){
        $multi_image_id = $request->id;
       if($request->file('multi_image'))
        {
            $image = $request->file('multi_image');
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(523,605)->save('upload/multi_image/'.$image_reName);
            $save_url = 'upload/multi_image/'.$image_reName;

            MultiImage::findOrFail($multi_image_id)->update([
                'multi_image'=> $save_url,
           ]);
         }
        $notification = array(
            'message' => 'Update Multi Image successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.multi.image')->with($notification);

    }
    public function DeleteMultiImage($id){
        $deleteMultiImage = MultiImage::findOrFail($id);
        $image = $deleteMultiImage->multi_image;
        unlink($image);
        MultiImage::findOrFail($id)->delete();
                $notification = array(
        'message' => 'Multi Image Deleted successfully',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
