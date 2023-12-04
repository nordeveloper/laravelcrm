@extends('layouts.main') 

@section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('lead.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('lead.update', $result->id ) }}" method="post" enctype="multipart/form-data">
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
                @if(!empty($statuslist))
                @foreach ($statuslist as $status)
                <option @if( !empty($result->status_id) && $result->status_id==$result->status_id) selected @endif value="{{$status->id}}">{{$status->title}}</option>  
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Amount</label>
            <input type="text" class="form-control" name="amount" value="{{$result->amount?? old('amount') }}">
        </div>

        <div class="form-group">
            <label>Responsible</label>
            <select name="responsible_id" class="form-control">
                <option value=""></option>
                @if(!empty($users))
                @foreach ($users as $user)
                <option @if( !empty($result->responsible_id) && $result->responsible_id==$user->id) selected @endif value="{{$user->id}}">{{$user->first_name}}</option>  
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
            <label>Comments</label>
            <textarea class="form-control" name="comments" cols="30" rows="3">{{ $result->comments?? old('comments')}}</textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>        

        </form>
    </div>
@endsection