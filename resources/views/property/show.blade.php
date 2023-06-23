@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Detail Product</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('property.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All Products
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="mb-3">
                    <label for="image" class="form-label">property Image <span class="text-danger">*</span></label>
                    <input id="image" name="image" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="detail">Detail</label>
                    <textarea name="detail" id="detail" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="floor">floor</label>
                    <input type="number" name="floor" id="floor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rooms">Rooms</label>
                    <input type="number" name="rooms" id="rooms" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phonenumber">city</label>
                    <input type="text" name="city" id="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="p">owner contact</label>
                    <input type="text" name="phonenumber" id="phonenumber" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" name="status" id="status" class="form-control" required>
                </div>
                <div>
                    <a href="{{route('property.edit',$product->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit Product
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection

