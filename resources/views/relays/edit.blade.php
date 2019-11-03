@extends('relays.layout')

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
    <form method="post" action="{{action('RelaysController@update', $name)}}" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="PATCH">
        <div class="form-group">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="value">Status:</label>
            <input type="text" class="form-control" name="status" value={{$relays->status}} />
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="value">GPIO:</label>
            <input type="text" class="form-control" name="gpio" value={{$relays->gpio}} />
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <label for="value">Type:</label>
            <input type="text" class="form-control" name="type" value={{$relays->type}} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
