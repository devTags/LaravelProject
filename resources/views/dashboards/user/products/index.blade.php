@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12-md-8">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
    


                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <a class="btn button btn-info" href="/products/create">Add New Product</a>
                            </div>
                            <div class="col-12">
                                <form class="form-inline my-2 my-lg">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                                </form>
                            </div>
                        </div>

                    </div>


                    <div class="card-body">
                        <caption>List of Products</caption>
                        <table class="table caption-top">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col-12">#</th>
                                    <th scope="col-12">Product Name</th>
                                    <th scope="col-12">Product Description</th>
                                    <th scope="col-12">Price</th>
                                    <th scope="col-12">Stock</th>
                                    <th scope="col-12">Status</th>
                                    <th scope="col-12">Action</th>
                                </tr>
                            </thead>
                            @foreach ($products as $i => $product)
                                <tbody>
                                    <tr>
                                        <td> {{ $i + 1 }} </td>
                                        <td>{{ $product->ProductName }}</td>
                                        <td>{{ $product->ProductDescription }}</td>
                                        <td>{{ $product->Price }}</td>
                                        <td>{{ $product->Stock }}</td>
                                        <td>{{ $product->Status }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" >
                                                    <li><a type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter"  style="width:100%;">Delete</a>       
            
                
                                                    </li>
                                                    <li><a type="button" class="btn button btn-info"
                                                          href="/products/{{$product->id}}/edit" style="width:100%;">Edit</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                  Wish to delete this Product?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
                  <form method="POST" action="{{ route('products.destroy', $product->id) }} ">
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-danger">Yes</button>
                </div>
              </div>
            </div>
          </div>
      
        {{-- <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                            <label for="ProductName" class="col-md-4 col-form-label text-md-right">{{ __('Product Name')}}</label>
                            
                                <div class="col-md-6">
                                    <input type="text" name="ProductName" id="ProductName" class="form-control @error('ProductName') is-invalid @enderror"  value="{{old('ProductName')}}"  autofocus>
        
                                    @error('ProductName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                        
                                    @enderror
                                </div>
                            </div>
        
                
                            <div class="form-group row">
                                <label for="ProductDescription" class="col-md-4 col-form-label text-md-right">{{ __('Description')}}</label>
                                
                                    <div class="col-md-6">
                                        <textarea type="text" name="ProductDescription" id="ProductDescription" class="form-control  @error('ProductDescription') is-invalid @enderror" value="{{old('ProductDescription')}}"  autofocus>
                                        </textarea>
                                        @error('ProductDescription')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price')}}</label>
                                    
                                        <div class="col-md-6">
                                            <textarea type="text" name="Price" id="Price" class="form-control  @error('Price') is-invalid @enderror" value="{{old('Price')}}"  autofocus>
                                            </textarea>
                                            @error('Price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{$message}}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                    
                                    <div class="form-group row">
                                        <label for="Stock" class="col-md-4 col-form-label text-md-right">{{ __('Stock')}}</label>
                                        
                                            <div class="col-md-6">
                                                <textarea type="text" name="Stock" id="Stock" class="form-control  @error('Stock') is-invalid @enderror" value="{{old('Stock')}}"  autofocus>
                                                </textarea>
                                                @error('Stock')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{$message}}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="form-group row">
                                            <label for="Status" class="col-md-4 col-form-label text-md-right">{{ __('Status')}}</label>
                                            
                                                <div class="col-md-6">
                                                    <textarea type="text" name="Status" id="Status" class="form-control  @error('Status') is-invalid @enderror" value="{{old('Status')}}"  autofocus>
                                                    </textarea>
                                                    @error('Status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
        
                                        <div class="form-group row">
                                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Post Image')}}</label>
                                            
                                                <div class="col-md-6">
                                                    <input type="file" name="img" id="img" class="form-control-file @error('img') is-invalid @enderror"  value="{{old('img')}}"  autofocus>
                    
                                                    @error('img')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{$message}}</strong>
                                                        </span>
                                                        
                                                    @enderror
                                                </div>
                                            </div>
        
        
        
                                <div class="form-group row md-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit')}}
                                        </button>
                                    </div>
                                </div>
        
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Exit</button>
                        <button type="button" class="btn btn-primary">Save Chanes</button>
                    </div>
                </div>
            </div>
        </div> --}}
        
    @endsection