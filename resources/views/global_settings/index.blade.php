@extends('global_settings.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Global Settings</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('global_settings.create') }}"> Create New Global Settings</a>
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
            <th>Value</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($global_settings as $global_setting)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $global_setting->name }}</td>
            <td>{{ $global_setting->value }}</td>
            <td>
                <form action="{{ route('global_settings.destroy',$global_setting->name, $global_setting) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('global_settings.show',$global_setting->name) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('global_settings.edit',$global_setting) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $global_settings->links() !!}
      
@endsection
