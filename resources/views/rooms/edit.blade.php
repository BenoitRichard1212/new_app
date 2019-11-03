@extends('rooms.layout')

@section('content')
<div class="container">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif
    <div class="row">
    <form method="post" action="{{action('RoomsController@update', $name)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="value">Temp_Min:</label>
            <input type="text" class="form-control" name="temp_min" value={{$rooms->temp_min}} />
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="value">Mode:</label>
            <input type="text" class="form-control" name="mode" value={{$rooms->mode}} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
