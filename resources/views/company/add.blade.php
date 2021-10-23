@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add company')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('company.index')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label>Contact</label>
            <select name="contact_id" class="form-control">
                <option value=""></option>
            </select>
        </div>

        <div class="form-group">
            <label>Type</label>
            <select name="type_id" class="form-control">
                <option value=""></option>
            </select>
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
            <label>Comments</label>
            <textarea class="form-control" name="comments" cols="30" rows="3">{{old('comments')}}</textarea>
        </div>        
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>
@endsection