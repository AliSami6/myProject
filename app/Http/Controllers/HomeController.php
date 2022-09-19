<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function Homeslider()
    {
        $sliders = DB::table('sliders')->latest()->get();
        //dd($sliders);
        return view('admin.slider.index',compact('sliders'));
    }
    public function AddSlider()
    {
        return view('admin.slider.create');
   
    }
    public function AddSliderStore(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:sliders|max:50',
            'description'=>'required|max:650',
            'image'=>'required|mimes:jpg,png,jpeg'
        ],[
           'title.required'=>'Please input title',
            'description.max'=>'Please input description less than 150 characters',
            'image.required'=>'Please input image',
        ]);
        $slider = [];
        $slider['title'] = $request->title;
        $slider['description'] = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/images', $file);
            $slider['image']=$file;
        }

        DB::table('sliders')->insert($slider);
     
       return redirect()->back()->with('success', ' Slider Added   Succesfully');
    

    }
    public function edit_gallery($id)
    {
        $sliderEdit =  DB::table('sliders')->where('id', $id)->first();
        return view('admin.slider.edit', compact('sliderEdit'));
    }
    public function AllGalleryImageUpdate(Request $request,$id)
    {
        $this->validate($request,[
            'title'=> 'required|max:50',
            'description'=> 'required',
            'image'=> 'required|mimes:jpg,png,jpeg'
        ],[
           'title.required'=>'Please input  title',
            'description.required'=>'Please input  description',
            'image.required'=>'Please input  image',
        ]);
     
        $slider = [];
        $slider['title'] = $request->title;
        $slider['description'] = $request->description;
 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/images', $file);
            $slider['image']=$file;
        }
 
        DB::table('sliders')->where('id', $id)->update($slider);
        //Toastr::success('Data updated successfully', 'success', ["positionClass" => "toast-top-right"]);  
        return redirect()->route('home.slider')->with('success', ' Slider Updated   Succesfully');
    }


}
