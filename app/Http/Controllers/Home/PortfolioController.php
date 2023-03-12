<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function AllPortfolio(){
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio_page.all_portfolio',compact('portfolio'));
    }
    public function AddPortfolio(){
        return view('admin.portfolio_page.add_portfolio');
    }
    public function StorePortfolio(Request $request){
        $request->validate(
            [
                'title' => 'required',
                'short_title' => 'required',
                'portfolio_image' => 'required'

            ],
            [
                'title.required' => 'Portfolio title is Required',
                'short_title.required' => 'Portfolio short title is Required',
                'portfolio_image.required' => 'Portfolio Image is Required',
            ]
            );

            $image = $request->file('portfolio_image');
            $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
            Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$image_reName);
            $save_url_DB = 'upload/portfolio/'.$image_reName;

            Portfolio::insert([
                'title'=> $request->title,
                'short_title'=> $request->short_title,
                'portfolio_image'=> $save_url_DB,
                'portfolio_description'=> $request->portfolio_description,
                'created_at'=>Carbon::now(),
           ]);

        $notification = array(
            'message' => 'Insert Portfolio successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.portfolio')->with($notification);


    }
    public function EditPortfolio($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio_page.edit_portfolio',compact('portfolio'));
    }
    public function UpdatePortfolio(Request $request){
        $slider_id = $request->id;
        if($request->file('portfolio_image'))
            {
                $image = $request->file('portfolio_image');
                $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
                Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$image_reName);
                $save_url = 'upload/portfolio/'.$image_reName;

                Portfolio::findOrFail($slider_id)->update([
                    'title'=> $request->title,
                    'short_title'=> $request->short_title,
                    'portfolio_description'=> $request->portfolio_description,
                    'portfolio_image'=> $save_url,
                ]);
                            $notification = array(
                'message' => 'Portfolio Updated with Image successfully',
                'alert-type' => 'success'
            );
                 return redirect()->route('all.portfolio')->with($notification);
            }


            else{
                $image = $request->file('portfolio_image');
                $image_reName= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();//123456543.jpg
                Image::make($image)->resize(1020,519)->save('upload/portfolio/'.$image_reName);
                $save_url = 'upload/portfolio/'.$image_reName;

                Portfolio::findOrFail($slider_id)->update([
                    'title'=> $request->title,
                    'short_title'=> $request->short_title,
                    'portfolio_description'=> $request->portfolio_description,
                ]);
                $notification = array(
                    'message' => 'Portfolio Updated without Image successfully',
                    'alert-type' => 'success'
                );
                 return redirect()->route('all.portfolio')->with($notification);
            }
    }
    public function DeletePortfolio($id){
        $deletePortfolioImage = Portfolio::findOrFail($id);
        $image = $deletePortfolioImage->portfolio_image;
        unlink($image);
        Portfolio::findOrFail($id)->delete();
                $notification = array(
        'message' => 'Portfolio Image Deleted successfully',
        'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function PortfolioDetails($id)
    {
         $portfolio = Portfolio::find($id);
         return view('frontend.portfolio.portfolio_details',compact('portfolio'));
    }

    public function HomePortfolio()
    {
        $portfolio = Portfolio::latest()->get();
         return view('frontend.portfolio.portfolio',compact('portfolio'));
    }
}

