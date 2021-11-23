<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'last_name', 'comments', 'responsible_id', 'source_id', 'created_by', 'modified_by'];

    /*
       * Get the user associated with the Contact
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function responsible()
    {
        return $this->hasOne(User::class, 'id', 'responsible_id');
    }
}
