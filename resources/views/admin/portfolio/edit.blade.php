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
                           <h4 class="card-title">Edit Portfolio</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{url('/portfolio/edit').'/'.$editProfile->id}}" method="POST" enctype="multipart/form-data">
                               @csrf
                               <div class="form-group mb-4">
                                <label>Name </label>
                                <input type="text" name="name" class="form-control" value="{{$editProfile->name}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                               
                            </div>
                                <div class="form-group mb-4">
                                    <label>Title </label>
                                    <input type="text" name="title" class="form-control" value="{{$editProfile->title}}">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Link </label>
                                    <input type="text" name="link" class="form-control" value="{{$editProfile->link}}">
                                    @error('link')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Category </label>
                                  
                                    <input type="text" name="category" class="form-control" value="{{$editProfile->category_id}}">                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Details</label>
                                    <textarea name="details" class="form-control" rowspan="4">{{$editProfile->details}}</textarea>
                                    @error('details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div> 
                                <div class="form-group">
                                    <img src="{{asset('storage/images/portfolios').'/'.$editProfile->image}}" alt="" style="height: 200px; width:400px"/>
                                 </div>
                                <div class="form-group mb-4">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control">
                                    @error('image')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> 
                                <input type="submit" name="submit" class="form-control btn btn-primary bg-primary mt-3" value="update">  
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </div>

    </div>
@endsection
