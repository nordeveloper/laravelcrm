@extends('layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('task.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('task.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$result->title?? old('title')}}">
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status_id" class="form-control">
                <option value=""></option>
                @foreach ($statuses as $status)
                <option @if($result->status_id==$status->id) selected @endif value="{{$status->id}}">{{$status->title}}</option>  
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" cols="30" rows="3">{{$result->description?? old('description')}}</textarea>
        </div>

        {{-- <div class="form-group">
            <label for="">ToDo list</label>
        </div> --}}

        <div class="row form-group">

            <div class="col-md-3">
                <label>Start date</label>
                <input type="date" class="form-control input-date" name="start_date" value="{{$result->start_date?? old('start_date')}}">
            </div>

            <div class="col-md-3">
                <label>Finish date</label>
                <input type="date" class="form-control input-date" name="finish_date" value="{{$result->finish_date?? old('finish_date')}}">
            </div>

            <div class="col-md-3">
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
    
            <div class="col-md-3">
                <label>Project</label>
                <select name="project_id" class="form-control">
                    <option value=""></option>
                    @if(!empty($projects))
                    @foreach ($projects as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>  
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection