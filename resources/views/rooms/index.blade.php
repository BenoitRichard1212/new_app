@extends('rooms.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rooms</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rooms.create') }}"> Create New Rooms</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Temp min</th>
            <th>Sensor Floor</th>
            <th>Sensor Wall</th>
            <th>Relay</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($rooms as $room)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $room->name }}</td>
            <td>{{ $room->temp_min }}</td>
            <td>{{ $room->sensor_floor }}</td>
            <td>{{ $room->sensor_wall }}</td>
            <td>{{ $room->relay }}</td>
            <td>
                <form action="{{ route('rooms.destroy',$room->name) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('rooms.show',$room->name) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('rooms.edit',$room) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $rooms->links() !!}
      
@endsection
