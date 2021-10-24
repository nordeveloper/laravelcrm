@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add project')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('project.index')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('project.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
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
            <label>Description</label>
            <textarea class="form-control" name="description" cols="30" rows="3">{{old('description')}}</textarea>
        </div> 
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>        
    
        </form>
    </div>
@endsection