<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'customer_name',
        'company_cost',
        'mark_up',
        'date_of_travel',
    ];

    public function services()
    {
        return $this->hasMany(Service::class ,'agent_id', 'id');
    }
 
}
