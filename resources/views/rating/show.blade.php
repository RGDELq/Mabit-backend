@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Detail rating</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('rating.index')}}" class="btn btn-warning btn-icon-text mb-2 mb-md-0">
        unapproved
            </a>
            <br>
            <a href="{{route('rating.index')}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                approved
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="property_id">property</label>
                        <select name="property_id" id="property_id" class="form-control">
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">comment</label>
                        <input   value="{{$rating->name}}" type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">userName</label>
                        <input   value="{{$rating->username}}" type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <input   value="{{$rating->status}}" type="text" name="status" id="status" class="form-control" required>
                    </div>
                    <div>
                
                </div>

            </form>
        </div>

    </div>
@endsection

