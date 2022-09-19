@extends('admin.admin_master')
@section('admin_content')

    <div class="py-12">
       <div class="container">
           <div class="row justify-content-center">
               <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Brand</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('update.brand',$brand->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <div class="form-group">
                                    <label>Brand Name </label>
                                    <input type="text" class="form-control" name="brand_name" value="{{$brand->brand_name}}">
                                   
                                </div>
                                <div class="form-group">
                                    <label>Brand Image </label>
                                    <input type="file" class="form-control" name="brand_image" value="{{$brand->brand_image}}">
                                
                                </div>
                                <div class="form-group">
                                   <img src="{{asset('storage/images/brand').'/'.$brand->brand_image}}" alt="" style="height: 200px; width:400px"/>
                                </div>
                                <button type="submit" class="btn btn-success mt-3 bg-success">Update</button>
                                
                            </form>
                        </div>
                    </div>
               </div>
            
           </div>
       </div>
    </div>
@endsection
