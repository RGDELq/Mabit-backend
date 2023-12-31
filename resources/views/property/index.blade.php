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
                        <th class="pt-0"> Image</th>
                        <th class="pt-0">detail</th>
                        <th class="pt-0">price </th>
                        <th class="pt-0">floor</th>
                        <th class="pt-0">rooms</th>
                        <th class="pt-0">city</th>
                        <th class="pt-0">owner contact</th>
                        <th class="pt-0">status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($property as $index => $val)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$val->name}}</td>
                            {{-- <td>{{$val->category_id}}</td> --}}
                            <td>{{$val->category->name}}</td> 
                            <td><img alt="img" src="/img/{{ $val->image }}" width="100px"></td>
                            <td>
                                @if(strlen($val->detail) > 3)
                                   {{ substr($val->detail, 0, 50) }}... <a href="#" data-toggle="modal" data-target="#property{{$val->id}}">Read more</a>
                                @else
                                   {{$val->detail}}
                                @endif
                             </td>
                            <td>{{$val->price}}</td>
                            <td>{{$val->floor}}</td>
                            <td>{{$val->rooms}}</td>
                            <td>{{$val->city}}</td>
                            <td>{{$val->phonenumber}}</td>
                            <td>{{$val->status == 0 ? 'rejected' : 'accept'}}</td>
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
                    @foreach($property as $index => $val)
   <!-- Modal -->
   <div class="modal fade" id="property{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLongTitle">Property Detail</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <p>{{ $val->detail }}</p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
@endforeach
                </table>
            </div>
        </div>
    </div>
@endsection



