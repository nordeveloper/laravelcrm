@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Add task')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route('task.index')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route('task.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status_id" class="form-control">
                <option value=""></option>
                @foreach ($statuses as $status)
                <option value="{{$status->id}}">{{$status->title}}</option>  
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" cols="30" rows="3">{{old('description')}}</textarea>
        </div>

        <div class="form-group">
            <button type="button" class="btn btn-link">ToDo list</button>
        </div>

        <div class="row form-group">
            <div class="col-md-4">
                <label>Finish date</label>
                <input type="text" class="form-control input-date" name="finish_date" value="{{old('finish_date')}}">
            </div>

            <div class="col-md-4">
                <label>Responsible</label>
                <select name="responsible_id" class="form-control">
                    <option value=""></option>
                    @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>  
                    @endforeach
                </select>
            </div>        
    
            <div class="col-md-4">
                <label>Project</label>
                <select name="project_id" class="form-control">
                    <option value=""></option>
                    @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>
@endsection