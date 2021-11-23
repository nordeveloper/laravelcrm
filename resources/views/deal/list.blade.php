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
                <label for="">Amount</label>
                <input class="form-control" type="text" name="amount">
            </div>

            <div class="form-grup col-md-3">
                <label for="">Status</label>
                <select class="form-control" name="status_id">
                @if ($statuslist)
                    @foreach ($statuslist as $status)
                    <option value="{{$status->id}}">{{$status->title}}</option>
                    @endforeach
                @endif
                </select>
            </div>

            <div class="form-grup col-md-3">
                <label for="">Responsilble</label>
                <select class="form-control" name="status_id">
                @if ($responsilbleList)
                    @foreach ($responsilbleList as $responsilble)
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
                        <h3 class="h3">{{__('Deal')}}</h3>
                    </div>
                    <div class="col-md-9 text-right">
                        <p><a class="btn btn-success" href="{{route('deal.create')}}">{{__('Add')}}</a></p>
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
                <th>
                    Status
                </th>
                <th>
                    Price
                </th>
                <th>Responsible</th>                
                <th>
                   Date created
                </th>
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
                <td>{{$item->status->title}}</td>
                <td>{{$item->amount}}</td>
                <td>{{$item->responsible->name}}</td>                
                <td>{{$item->created_at}}</td>
                <td>{{$item->createdBy->name}}</td>
                <td>
                    <a href="{{ route('deal.edit', $item->id)}}" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                    <form class="action-delete" action="{{ route('deal.destroy', $item->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn-remove"><i class="far fa-trash-alt"></i></button>
                    </form>                
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        </div>
    </div>    
@endsection