@extends('admin.admin_master')
@section('admin_content')
    <div class="py-12">
       <div class="container">
           <div class="row">
               
                   @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   @endif
                
               <div class="col-lg-9">
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">Edit Slider</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{url('/home/slideredit').'/'.$sliderEdit->id}}" method="POST" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group mb-4">
                                    <label>Title </label>
                                    <input type="text" name="title" class="form-control" value="{{$sliderEdit->title}}">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Description </label>
                                    <textarea name="description" class="form-control" rowspan="4">{{$sliderEdit->description}}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div> 
                                <div class="form-group">
                                    <img src="{{asset('storage/images').'/'.$sliderEdit->image}}" alt="" style="height: 200px; width:400px"/>
                                 </div>
                                <div class="form-group mb-4">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                                <input type="submit" name="submit" class="form-control btn btn-primary bg-primary mt-3" value="create">  
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

    </div>
@endsection
