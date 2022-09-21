@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->name}} {{$result->last_name}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('contact.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('contact.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$result->name??  old('name')}}">
        </div>

        <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" name="last_name" value="{{$result->last_name?? old('last_name')}}">
        </div>

        <div class="form-group">
            <label>Responsible</label>
            <select name="responsible_id" class="form-control">
                <option value=""></option>
                @if(!empty($users))
                @foreach ($users as $user)
                <option @if( !empty($result->responsible_id) && $result->responsible_id==$user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>  
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Source</label>
            <select name="source_id" class="form-control">
                <option value=""></option>
                @if(!empty($sources))
                @foreach ($sources as $source)
                <option @if($result->source_id==$source->id) selected @endif value="{{$source->id}}">{{$source->title}}</option>  
                @endforeach
                @endif
            </select>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection