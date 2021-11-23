<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'finish_date', 'status_id', 'responsible_id', 'observer_id', 'created_by', 'modified_by'];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function responsible()
    {
        return $this->hasOne(User::class, 'id', 'responsible_id');
    }

    public function status()
    {
        return $this->hasOne(Leadstatus::class, 'id', 'status_id');
    }
}
