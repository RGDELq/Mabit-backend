@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Add New user</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('users.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All users
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
            <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name" class="form-label">user Name <span class="text-danger">*</span></label>
                    <input id="name" name="name" type="text" class="form-control" placeholder="user Name">
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email <span class="text-danger">*</span></label>
                    <textarea  class="form-control" placeholder="email" name="email" id="email" cols="12" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">password <span class="text-danger">*</span></label>
                    <textarea  class="form-control" placeholder="password" name="password" id="password" cols="12" rows="3"></textarea>
                </div>
                
                    <button type="submit" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Save user Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

