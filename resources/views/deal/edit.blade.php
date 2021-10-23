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
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{old('title')}}">
        </div>

        <div class="form-group">
            <label>Stage</label>
            <select name="stage_id" class="form-control">
                <option value=""></option>
                @foreach ($stages as $stage)
                <option value="{{$stage->id}}">{{$stage->title}}</option>  
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control" name="amount" value="{{old('amount')}}">
        </div>

        <div class="form-group">
            <label>Contact</label>
            <select name="contact_id" class="form-control">
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
            <label>Source</label>
            <select name="source_id" class="form-control">
                <option value=""></option>
                @foreach ($sources as $source)
                <option value="{{$source->id}}">{{$source->title}}</option>  
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