@extends('admin.master')

@section('title')
    Delete Product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mx-auto">Delete Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('delete-product',['id'=> $product->id])}}" method="post">
                        @csrf
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{$product->name}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4">Product Price</label>
                            <div class="col-md-8">
                                <input type="number" name="price" class="form-control" value="{{$product->price}}">
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
                                <input type="file" class="form-control" name="image" value="{{$product->image}}"/>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1"{{$product->status == 1 ? 'checked' : ''}}>Published</label>
                                <label><input type="radio" name="status" value="2"{{$product->status == 0 ? 'checked' : ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="Delete Product">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


