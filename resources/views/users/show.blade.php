@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0"> user information</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('users.index')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                All users
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">user Name</label>
                    <input value="{{$user->name}}" disabled id="name" name="name" type="text" class="form-control" placeholder="user Name">
                </div>
                <div class="mb-3">
                    <label for="detail" class="form-label">email</label>
                    <textarea class="form-control" disabled placeholder="email" name="email" id="email" cols="12" rows="3">{{$user->email}}</textarea>
                </div>

                
                </div>

                <div>
                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-success btn-icon-text mb-2 mb-md-0">
                        Edit user
                    </a>
                </div>

            </form>
        </div>

    </div>
@endsection

