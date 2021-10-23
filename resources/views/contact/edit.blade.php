@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('contact.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('contact.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
        </div>

        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}">
        </div>

        <div class="form-group">
            <label>Responsible</label>
            <select name="responsible_id" class="form-control">
                <option value=""></option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>  
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Source</label>
            <select name="source_id" class="form-control">
                <option value=""></option>
                @foreach ($sources as $source)
                <option value="{{$source->id}}">{{$source->title}}</option>  
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection