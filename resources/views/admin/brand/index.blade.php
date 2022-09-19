@extends('admin.admin_master')
@section('admin_content')

    <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-lg-8">
                   @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   @endif
                   <table class="table table-bordered table-hover">
                        <thead>
                            <th>SI</th>
                            <th>Brand Name</th>
                            <th>Image</th>
                         
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->id}}</td>
                                    <td>{{$brand->brand_name}}</td>
                                    <td>
                                        <img src="{{asset('storage/images/brand').'/'.$brand->brand_image}}" alt="brand image" style="height:50px; width:80px;">
                                    </td>
                                    <td>
                                        <a href="{{route('edit.brand',$brand->id)}}" class="btn btn-primary bg-primary" type="submit">Edit</a>
                                        <a href="{{route('delete.brand',$brand->id)}}" class="btn btn-danger bg-danger" onclick="return confirm('Are you sure you want to delete this?')" type="submit"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                   </table>
            
               </div>
               <div class="col-lg-4">
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">Add Brnad</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                                <div class="form-group mb-4">
                                    <label>Brand Name</label>
                                    <input type="text" name="brand_name" class="form-control">
                                    @error('brand_name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                   
                                </div> 
                                <div class="form-group mb-4">
                                    <label>Brand Image</label>
                                    <input type="file" name="brand_image" class="form-control">
                                    @error('brand_image')
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
