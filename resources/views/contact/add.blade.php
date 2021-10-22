@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add contact')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('contact.index')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('contact.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="500">
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>
@endsection