@extends('layouts.main') 
@section('content')

@if($result->isEmpty())
<div class="row">
    @foreach ($result as $item)
    <div class="stream-item col-sm-12">
        <p>{{$item->title}}</p>
    </div>
    @endforeach
</div>
@endif

@endsection