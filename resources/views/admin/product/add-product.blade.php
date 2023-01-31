@extends('admin.master')

@section('title')
    Add Product
@endsection

@section('body')
    <div class="row mt-5">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mx-auto">Add Product</h3>
                </div>
                <div class="card-body">
                    <span class="text-success">{{Session::has('success') ? Session::get('success') : ''}}</span>
                    <form action="{{route('new-product')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="category_id">
                                    <option value="" selected disabled><--Select Category--></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="brand_id">
                                    <option value="" selected disabled><--Select Brand--></option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Price</label>
                            <div class="col-md-8">
                                <input type="number" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Product Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="description" id="productDescription" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-4">Product Image</label>
                            <div class="col-md-8">
                                <input type="file" class="form-control" name="image"/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1" checked>Published</label>
                                <label><input type="radio" name="status" value="2">Unpublished</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="Add Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


