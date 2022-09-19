@extends('admin.admin_master')
@section('admin_content')
    <div class="py-12">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('success')}}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   @endif
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h4 class="float-left">Add Slider</h4>
                                <a class="btn btn-primary float-right" href="{{route('create.slider')}}" role="button"> <i class="mdi mdi-plus mr-1"></i>Create</a>
                            </div>
                            
                        </div>
                       <div class="card-body p-0">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>SI</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                             
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($sliders as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>
                                            <img src="{{asset('storage/images').'/'.$item->image}}" alt="item image" style="height:50px; width:80px;">
                                        </td>
                                        <td>
                                            <a href="{{route('edit.slider',$item->id)}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                       </table>
                       </div>
                    </div>
                
            
               </div>
              
           </div>
       </div>

    </div>
@endsection
