<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class HomeSliderController extends Controller
{

    public function Home(){
        return view('frontend.index');
    }
    public function HomeSlider(){

        $homeSlide = HomeSlide::find(1);
        return view('admin.home_slider.home_slide_all',compact('homeSlide'));
    }
    public function UpdateSlide(Request $request){
        $slider_id = $request->id;
        if($request->file('home_slide'))
        {
            $image = $request->file('home_slide');
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(636,852)->save('upload/home_slide/'.$image_reName);
            $save_url = 'upload/home_slide/'.$image_reName;

            HomeSlide::findOrFail($slider_id)->update([
                'title'=> $request->title,
                'short_title'=> $request->short_title,
                'video_url'=> $request->video_url,
                'home_slide'=> $save_url,
            ]);
            $notification = array(
                'message' => 'Home SLide Updated with Image successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        else
        {
                HomeSlide::findOrFail($slider_id)->update([
                'title'=> $request->title,
                'short_title'=> $request->short_title,
                'video_url'=> $request->video_url,
            ]);
            $notification = array(
                'message' => 'Home SLide Updated without Image successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);

        }
    }
}
