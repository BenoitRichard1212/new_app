@extends('sensors.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sensors</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sensors.create') }}"> Create New Sensors</a>
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
            <th>Sensor</th>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Device</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sensors as $sensor)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $sensor->sensor }}</td>
            <td>{{ $sensor->temperature }}</td>
            <td>{{ $sensor->humidity }}</td>
            <td>{{ $sensor->device }}</td>
            <td>
                <form action="{{ route('sensors.destroy',$sensor->sensor, $sensor) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('sensors.show',$sensor->sensor) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('sensors.edit',$sensor->sensor) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $sensors->links() !!}
      
@endsection
