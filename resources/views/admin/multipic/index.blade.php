<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        

           <strong>All Images List</strong>
           
        </h2>
    </x-slot>

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
                   <div class="card-group">
                        @foreach($images as $multi)
                            <div class="col-lg-3">
                                <div class="card">
                                    <img src="{{asset($multi->image)}}" alt="multi image" style="height: 90px;">
                                </div>
                            </div>
                        @endforeach
                   </div>
               
               </div>
               <div class="col-lg-4">
                   <div class="card">
                       <div class="card-header">
                           <h4 class="card-title">Multi Image</h4>
                       </div>
                       <div class="card-body">
                           <form action="{{route('store.image')}}" method="POST" enctype="multipart/form-data">
                               @csrf
                                
                                <div class="form-group mb-4">
                                    <label>Multiple Image</label>
                                    <input type="file" name="image[]" class="form-control">
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
</x-app-layout>
