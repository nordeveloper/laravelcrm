<?php

namespace App\Console\Commands\generate;

use Illuminate\Console\Command;

class Template extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:template {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Created add edit list template';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        echo 'Making views in resources/views/'.$this->argument('name');
        $name = $this->argument('name');
        mkdir('resources/views/'.$name);

        //list view
        $content = "@extends('layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <h3 class="h3">{{__(\''.$name.'\')}}</h3>
                    </div>
                    <div class="col-md-9 text-right">
                        <p><a class="btn btn-success" href="{{route(\''.$name.'.create\')}}">{{__(\'Add\')}}</a></p>
                    </div>
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
                    Active
                </th>
                <th>
                   Date created
                </th>
                <th>
                   Created by
                </th>
                <th>
                    Title
                </th>
                <th>
                    Actions
                </th>
            </tr>
            @if($result)
            @foreach ($result as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>@if($item->active==1) Yes @else no @endif</td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->created_by}}</td>
                <td>{{$item->title}}</td>
                <td>
                    <a href="{{ route(\''.$name.'.edit\', $item->id)}}" class="btn btn-info btn-sm btn-edit"><i class="fa fa-edit"></i></a>
                    <form class="action-delete" action="{{ route(\''.$name.'.destroy\', $item->id)}}" method="post">
                          @csrf
                          @method(\'DELETE\')
                        <button type="submit" class="btn btn-danger btn-sm btn-remove"><i class="far fa-trash-alt"></i></button>
                    </form>                
                </td>
            </tr>
            @endforeach
            @endif
        </table>
        </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/'.$name.'/list.blade.php', $content);


        //add
        $content = "@extends('layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
        <div class="card-header">
            <p class="h4">{{__(\'Add '.$name.'\')}}</p>
            <p><a class="btn btn-info btn-xs" href="{{route(\''.$name.'.index\')}}">back to list</a></p>
        </div>
    
        <form class="card-body" action="{{route(\''.$name.'.store\')}}" method="post" enctype="multipart/form-data">
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
            <input type="text" class="form-control" name="title" value="{{old(\'title\')}}">
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
    
        </form>
    </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/'.$name.'/add.blade.php', $content);


        //edit
        $content = "@extends('layouts.main') \n @section('content')\n";
        $content.= '<div class="card">
        <div class="card-header">
            <p class="h4">{{__(\'Edit\')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route(\''.$name.'.index\') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route(\''.$name.'.update\', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method(\'PATCH\')
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
    </div>';
        $content.= "\n@endsection";
        file_put_contents('resources/views/'.$name.'/edit.blade.php', $content);

    }
}
