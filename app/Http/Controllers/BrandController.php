<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use Image;
use Intervention\Image\Exception\NotReadableException;
use Illuminate\Http\Request;

class BrandController extends Controller
{
     public function AllBrand()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

     public function StoreBrand(Request $request)
    {
       $this->validate($request,[
              'brand_name'=>'required|unique:brands|max:50',
              'brand_image'=>'required|mimes:jpg,png,jpeg'
       ],[
             'brand_name.required'=>'Please input brand name',
              'brand_name.max'=>'brand name less than 50 characters',
               'brand_image.required'=>'Please input brand image',
       ]);
       /*
       $brand_image = $request->file('brand_image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);
        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
       
        //Image::make($brand_image)->resize(300,200)->save('image/brand/'.$name_gen);

        $last_img = 'image/brand/'.$name_gen;
       Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
       ]);
       */
      $Brand = [];
      $Brand['brand_name'] = $request->brand_name;
      if ($request->hasFile('brand_image')) {
          $image = $request->file('brand_image');
          $ext = $image->extension();
          $file = time().'.'.$ext;
          $image->storeAs('public/images/brand', $file);
          $Brand['brand_image']=$file;
      }

      DB::table('brands')->insert($Brand);
       return redirect()->route('all.brand')->with('success', ' Brand inserted  succesfully');
    }
    public function edit($id)
    {
        $brand = Brand::find($id);
        return  view('admin.brand.edit',compact('brand'));
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'brand_name'=>'required|unique:brands|max:50',   
        ],
        [
           'brand_name.required'=>'Please input brand name',
            'brand_name.max'=>'brand name less than 50 characters',   
        ]);
        /*
        $old_image = $request->old_image;
        $brand_image = $request->file('brand_image');
        if($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location.$img_name;
            $brand_image->move($up_location,$img_name);
            unlink($old_image);
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' =>$last_img,
                'created_at'=>Carbon::now()
                
            ]);
            return redirect()->route('all.brand')->with('success', ' Brand Updated  Succesfully');
    
        }else{
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' =>$old_image,
                'created_at'=>Carbon::now()
                
            ]);
            return redirect()->route('all.brand')->with('success', ' Brand Updated  Succesfully');
    
        }
        */
        $Brand = [];
        $Brand['id'] = $request->id;
        $Brand['brand_name'] = $request->brand_name;
        if ($request->hasFile('brand_image')) {
            $image = $request->file('brand_image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/images/brand', $file);
            $Brand['brand_image']=$file;
        }
 
        DB::table('brands')->where('id', $id)->update($Brand);
        //Toastr::success('Data updated successfully', 'success', ["positionClass" => "toast-top-right"]);  
        return redirect()->route('all.brand')->with('success', 'Brand Updated Succesfully');

    }
    public function delete($id)
    {
        DB::table('brands')->where('id', $id)->delete();
        return redirect()->route('all.brand')->with('success', ' Brand Deleted  Succesfully');
    
    }

    public function Multipic()
    {
        $images = Multipic::all();
        return view('admin.multipic.index',compact('images'));
    }
    /*
    public function StoreImage(Request $request)
    {
        $image = $request->file('image');
        foreach($image as $multi_image){
            $name_gen = hexdec(uniqid()).'.'.$multi_image->getClientOriginalExtension();
            Image::make($multi_image)->resize(300,300)->save('image/multi/'.$name_gen);
            $last_img = 'image/multi/'.$name_gen;
            Multipic::insert([
                'image'=> $last_img,
                'created_at'=>Carbon::now()
            ]);
        }
        return redirect()->route('multi.image')->with('success', ' Multiple images added  succesfully');
    
    }
    */
}
