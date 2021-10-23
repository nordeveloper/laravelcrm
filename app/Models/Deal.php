<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'amount', 'comments', 'contact_id', 'stage_id', 'responsible_id', 'source_id', 'created_by', 'modified_by'];
}
