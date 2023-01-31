@extends('admin.master')

@section('title')
    Manage Products
@endsection

@section('body')
    <div class="row pt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Manage Products</h3>
                </div>
                <div class="card-body">
                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>
                    <table class="table table-striped" id="basic-datatable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Category Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Description</th>
                            <th>Product Image</th>
                            <th>Product Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>{{$product->brand->name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{!!\Illuminate\Support\Str::words($product->description,3,'...') !!}</td>
                            <td>
                                <img src="{{asset($product->image)}}" alt="" style="" height="60"/>
                            </td>
                            <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">View</a>
                                <a href="{{route('edit-product',['id'=> $product->id])}}" class="btn btn-info btn-sm">Edit</a>
                                <a href="{{route('delete-product',['id'=> $product->id])}}" onclick="return confirm('Are you sure to delete this product?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
