@extends('layouts.main') 
 @section('content')

 <div class="card">
    <div class="card-body">
        <form action="" class="row">
            <div class="form-grup col-md-3">
                <label for="">Title</label>
                <input class="form-control" type="text" name="title">
            </div>

            <div class="form-grup col-md-3">
                <label for="">Status</label>
                <select class="form-control" name="status_id">
                @if($statuslist)
                    <option value=""></option>
                    @foreach ($statuslist as $status)
                    <option value="{{$status->id}}">{{$status->title}}</option>
                    @endforeach
                @endif
                </select>
            </div>

            <div class="form-grup col-md-3">
                <label for="">Responsilble</label>
                <select class="form-control" name="user_id">
                @if ($responsilbleList)
                    @foreach ($responsilbleList as $responsilble)
                    <option value=""></option>
                    <option value="{{$responsilble->id}}">{{$responsilble->name}} {{$responsilble->last_name}}</option>
                    @endforeach
                @endif
                </select>
            </div>    
            
            <div class="form-grup col-md-3">
                <label for="">Created By</label>
                <select class="form-control" name="created_by">
                @if ($responsilbleList)
                    @foreach ($responsilbleList as $responsilble)
                    <option value=""></option>
                    <option value="{{$responsilble->id}}">{{$responsilble->name}} {{$responsilble->last_name}}</option>
                    @endforeach
                @endif
                </select>
            </div> 
        </form>
    </div>
</div>

<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="h3">{{__('task')}}</h3>
                    </div>
                    <div class="col-md-9 text-right">
                        <p><a class="btn btn-success" href="{{route('task.create')}}">{{__('Add')}}</a></p>
                    </div>
                </div>
            </div>
        
    <div class="card-body">
         <table class="table table-bordered table-hover">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Title
                </th>
                <th>Status</th>
                <th>
                   Date created
                </th>
                <th>
                   Start Date
                </th>
                <th>
                   Finish Date
                 </th>
                 <th>Responsible</th>
                <th>
                   Created by
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @if($result)
            @foreach ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->status->title?? ''}}</td>
                <td>{{FormatDateTime($item->created_at)}}</td>
                <td>{{FormatDate($item->start_date)}}</td>
                <td>{{FormatDate($item->finish_date)}}</td>
                <td>{{$item->responsible->name?? ''}}</td>
                <td>{{$item->createdBy->name?? ''}}</td>                
                <td>
                    <div class="buttons-action">
                        <a href="{{ route('task.edit', $item->id)}}" class="btn btn-outline-info btn-sm btn-edit mr-2"><i class="fa fa-edit"></i></a>
                        <form class="action-delete" action="{{ route('task.destroy', $item->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm btn-remove"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>              
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>    
@endsection