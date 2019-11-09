@extends('sensors.layout')

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
    <form method="post" action="{{action('SensorsController@update', $sensor)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="device">Device:</label>
            <input type="text" class="form-control" name="device" value={{$sensors->device}} />
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="temperature">Temperature:</label>
            <input type="text" class="form-control" name="temperature" value={{$sensors->temperature}} />          
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
