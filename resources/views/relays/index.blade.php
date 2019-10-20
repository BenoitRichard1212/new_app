@extends('relays.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Relays</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('relays.create') }}"> Create New Relays</a>
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
            <th>Status</th>
            <th>GPIO</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($relays as $relay)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $relay->name }}</td>
            <td>{{ $relay->status }}</td>
            <td>{{ $relay->gpio }}</td>
            <td>
                <form action="{{ route('relays.destroy',$relay->name) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('relays.show',$relay->name) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('relays.edit',$relay->name) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $relays->links() !!}
      
@endsection
