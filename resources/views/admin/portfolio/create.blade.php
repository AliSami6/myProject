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
                           <h4 class="card-title">Create Portfolios</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{route('store.portfolio')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group mb-4">
                                    <label>Name </label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Title </label>
                                    <input type="text" name="title" class="form-control">
                                    @error('title')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Category </label>
                                    <select  name="category" class="form-control">
                                        @foreach($categories as $category )
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Link </label>
                                    <input type="text" name="link" class="form-control">
                                    @error('link')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div>
                                <div class="form-group mb-4">
                                    <label>Details </label>
                                    <textarea name="details" class="form-control"></textarea>
                                    @error('details')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
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
