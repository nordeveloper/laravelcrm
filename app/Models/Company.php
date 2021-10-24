<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'logo', 'comments', 'responsible_id', 'contact_id', 'source_id', 'created_by', 'modified_by'];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }
}
