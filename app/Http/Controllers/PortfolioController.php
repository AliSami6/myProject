<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class PortfolioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllPortfolio()
    {
        $portfolio = Portfolio::all();
        return view('admin.portfolio.index',compact('portfolio'));
    }
    public function AddPortfolio()
    {
        $categories = Category::all();
        return view('admin.portfolio.create',compact('categories'));
    }
    public function StorePortfolio(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'title'=>'required|max:50',
            'category' =>'required',
            'details' =>'required',
            'image'=>'required|mimes:jpg,png,jpeg'
        ],[
           'name.required'=>'Please input name less than 50 characters',
            'title.max'=>'Please input title less than 50 characters',
            'image.required'=>'Please input image',
        ]);
        $portfolios = [];
        $portfolios['name'] = $request->name;
        $portfolios['title'] = $request->title;
        $portfolios['category_id'] = $request->category;
        $portfolios['details'] = $request->details;
        $portfolios['link'] = $request->link;
        $portfolios['created_at'] = Carbon::now();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/images/portfolios', $file);
            $portfolios['image']=$file;
        }

        DB::table('portfolios')->insert($portfolios);
       // $categories = Category::all();
        //return view('admin.portfolio.create',compact('categories'));
        return redirect()->back()->with('success', ' portfolio Added   Succesfully');
    

    }
    public function edit_portfolio($id)
    {
        $editProfile =Portfolio::find($id);
        return view("admin.portfolio.edit",compact('editProfile'));
    }
    public function update_portfolio(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|max:50',
            'title'=>'required|max:50',
            'category' =>'required',
            'details' =>'required'
        ],[
           'name.required'=>'Please input name less than 50 characters',
            'title.max'=>'Please input title less than 50 characters'
        ]);
        $portfolios = [];
        $portfolios['name'] = $request->name;
        $portfolios['title'] = $request->title;
        $portfolios['category_id'] = $request->category;
        $portfolios['details'] = $request->details;
        $portfolios['link'] = $request->link;
        $portfolios['created_at'] = Carbon::now();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->extension();
            $file = time().'.'.$ext;
            $image->storeAs('public/images/portfolios', $file);
            $portfolios['image']=$file;
        }

        DB::table('portfolios')->update($portfolios);
       // $categories = Category::all();
        //return view('admin.portfolio.create',compact('categories'));
        return redirect()->back()->with('success', ' portfolio updated   Succesfully');
    
    }
}
