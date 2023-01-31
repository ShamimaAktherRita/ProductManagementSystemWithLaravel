@extends('admin.master')

@section('title')
    Edit Brand
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 py-5 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="mx-auto">Edit Brand</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('update-brand',['id'=> $brand->id])}}" method="post">
                        @csrf
                        <div class="row mt-2">
                            <label for="" class="col-md-4">Brand Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label class="col-md-4">Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" name="status" value="1"{{$brand->status == 1 ? 'checked' : ''}}>Published</label>
                                <label><input type="radio" name="status" value="2"{{$brand->status == 0 ? 'checked' : ''}}>Unpublished</label>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-success" value="Update Brand">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

