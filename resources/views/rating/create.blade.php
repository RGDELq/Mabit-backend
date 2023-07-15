@extends('templates.master')


@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add New rating comment</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('rating.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All comment
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
                <form action="{{ route('rating.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
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
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="name">userName</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <input type="text" name="status" id="status" class="form-control" required>
                    </div>
                <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Save rating Data
                    </button>
                </div>
            </form>
        </div>
    </div>
    

@endsection


