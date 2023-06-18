@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Detail category</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('category.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All category
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">category Name</label>
                    <input value="{{$category->name}}" disabled id="name" name="name" type="text" class="form-control" placeholder="Product Name">
                {{-- </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail Product Name</label>
                    <textarea class="form-control" disabled placeholder="Detail Product Name" name="detail" id="detail" cols="12" rows="3">{{$product->detail}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Product Image</label>
                    <div>
                        <img class="mt-2" src="/img/{{ $product->image }}" width="300px">
                    </div>
                </div> --}}

                <div>
                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit category
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection

