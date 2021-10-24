<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_date', 'finish_date', 'status_id', 'project_id', 'responsible_id', 'observer_id', 'created_by', 'modified_by'];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
