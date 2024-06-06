<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'check_in',
        'check_out',
        'status',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($attendance) {
            $user = $attendance->user;
            $checkInTime = Carbon::parse($attendance->check_in);
            if ($checkInTime->hour >= $user->shift_time) {
                $attendance->status = 'half_day';
            } else {
                $attendance->status = 'full_day';
            }
        });
    }

    public function user()
    {
        return $this->hasOne(User::class , 'id' ,'user_id');
    }

    public function scopeForMonth($query, $month, $year)
    {
        return $query->whereMonth('date', $month)
                    ->whereYear('date', $year);
    }

    // Getter for formatted date (optional)
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->date)->format('d');
    }

    protected $casts = [
        'date' => 'date',
    ];
}
