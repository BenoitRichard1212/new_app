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
            <th>Type</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($relays as $relay)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $relay->name }}</td>
            <td>{{ $relay->status }}</td>
            <td>{{ $relay->gpio }}</td>
            <td>{{ $relay->type }}</td>
            <td>
                <form action="{{ route('relays.destroy',$relay->name) }}" method="POST">

                    <a href="{{action('RelaysController@edit',$relay->name)}}" class="btn btn-primary">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $relays->links() !!}
      
@endsection
