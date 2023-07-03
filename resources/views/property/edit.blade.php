@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add New property</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('property.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All property
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($errors->any())
                <div class="mt-2 alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('property.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input  value="{{$property->name}}" type="text" name="name" id="name" class="form-control" required>
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
                    <label for="image" class="form-label">property Image</label>
                    <div>
                        <img class="mt-2" src="/img/{{ $property->image }}" width="300px">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">Detail user Name <span class="text-danger">*</span></label>
                    <textarea class="form-control" placeholder="Detail user Name" name="detail" id="detail" cols="12" rows="3">{{$property->detail}}</textarea>
                </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input value="{{$property->price}}"type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="floor">floor</label>
                <input  value="{{$property->floor}}"type="number" name="floor" id="floor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="rooms">Rooms</label>
                <input  value="{{$property->rooms}}"type="number" name="rooms" id="rooms" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phonenumber">city</label>
                <input  value="{{$property->city}}"type="text" name="city" id="city" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="p">owner contact</label>
                <input  value="{{$property->phonenumber}}"type="text" name="phonenumber" id="phonenumber" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="status">status</label>
                <input  value="{{$property->status}}"type="text" name="status" id="status" class="form-control" required>
            </div>

                <div>
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Save property Data
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection

