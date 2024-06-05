<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'service_name',
    ];
    
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }
  
}
