@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Detail proprty</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('property.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All properties
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{$property->name}}" type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                {{-- <div class="mb-3">
                    <label for="image" class="form-label">property Image <span class="text-danger">*</span></label>
                    <input id="image" src="/img/{{ $property->image }}" name="image" type="file" class="form-control">
                </div> --}}


                <div class="mb-3">
                    <label for="image" class="form-label">property Image</label>
                    <div>
                        <img class="mt-2" src="/img/{{ $property->image }}" width="300px">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Property Details </label>
                    <textarea class="form-control" disabled placeholder="Detail " name="detail" id="detail" cols="12" rows="3">{{$property->detail}}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" value="{{$property->price}}" name="price" id="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="floor">floor</label>
                    <input type="number" value="{{$property->floor}}" name="floor" id="floor" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rooms">Rooms</label>
                    <input type="number" value="{{$property->rooms}}" name="rooms" id="rooms" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="city">city</label>
                    <input type="text" value="{{$property->city}}" name="city" id="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="p">owner contact</label>
                    <input type="text" value="{{$property->phonenumber}}" name="phonenumber" id="phonenumber" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" value="{{$property->status}}" name="status" id="status" class="form-control" required>
                </div>
                <div>
                    <a href="{{route('property.edit',$property->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit Product
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection

