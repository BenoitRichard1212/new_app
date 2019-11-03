@extends('global_settings.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Global Settings</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('global_settings.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('global_settings.update',$global_settings, $global_settings->name) }}" method="POST">
        @csrf
        @method('POST')
   
         <div class="row">
            <!--<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $global_settings->name }}" class="form-control" placeholder="{{ $global_settings->name }}">
                </div>
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Value:</strong>
                    <textarea class="form-control" style="height:150px" name="value" value="{{ $global_settings->value }}" placeholder="Value">{{ $global_settings->value }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection
