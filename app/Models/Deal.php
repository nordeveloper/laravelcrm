<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'amount', 'comments', 'contact_id', 'stage_id', 'responsible_id', 'source_id', 'created_by', 'modified_by'];

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
        return $this->hasOne(DealStage::class, 'id', 'stage_id');
    }

    public function contact()
    {
        return $this->hasOne(Contact::class, 'id', 'contact_id');
    }

    public function contacts()
    {
        return $this->hasMany(DealContact::class, 'deal_id', 'contact_id');
    }
}
