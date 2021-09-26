<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function index(){
    //     $data = [
    //         'name' => 'norayr',
    //         'email' => 'nordeveloper@gmail.com',
    //         'password' => Hash::make('12345678'),
    //     ];
    //     $r = User::create($data);
    //    dump($r);
    }
}
