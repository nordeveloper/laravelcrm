@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('deal.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('deal.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="{{$result->sort}}">
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$result->title}}">
        </div>    
   
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection