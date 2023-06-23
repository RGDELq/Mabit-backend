@extends('templates.master')

@section('content')
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">All properties</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a href="{{route('property.create')}}" class="btn btn-info btn-icon-text mb-2 mb-md-0">
                <i data-feather="plus"></i> Add New property
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">

            @if ($message = session('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-0">
                    <thead>
                    <tr>
                        <th class="pt-0">#</th>
                        <th class="pt-0">property name</th>
                        <th class="pt-0">category</th>
                        <th class="pt-0">property Image</th>
                        <th class="pt-0">detail</th>
                        <th class="pt-0">price </th>
                        <th class="pt-0">floor</th>
                        <th class="pt-0">rooms</th>
                        <th class="pt-0">city</th>
                        <th class="pt-0">owner</th>
                        <th class="pt-0">status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($property as $index => $val)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$val->name}}</td>
                            <td>{{$val->category_id}}</td>
                            <td><img alt="img" src="/img/{{ $val->image }}" width="100px"></td>
                            <td>{{$val->detail}}</td>
                            <td>{{$val->price}}</td>
                            <td>{{$val->floor}}</td>
                            <td>{{$val->rooms}}</td>
                            <td>{{$val->city}}</td>
                            <td>{{$val->phonenumber}}</td>
                            <td>{{$val->status}}</td>
                            {{-- <td>{{ $val->created_at }}</td> --}}
                            <td>
                                <form action="{{ route('property.destroy',$val->id) }}" method="POST">
                                    {{ csrf_field()  }}
                                    @method('DELETE')
                                 <br><br>
                                    <a class="btn btn-sm btn-success" href="{{route('property.show', $val->id)}}"><i data-feather="eye"></i> Show</a>
                                    <a class="btn btn-sm btn-warning" href="{{route('property.edit', $val->id)}}"><i data-feather="link"></i> Edit</a>
                                    <button class="btn btn-sm btn-danger" type="submit"><i data-feather="trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
