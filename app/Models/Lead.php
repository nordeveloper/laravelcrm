<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'amount', 'comments', 'status_id', 'responsible_id', 'source_id', 'created_by', 'modified_by'];
}
