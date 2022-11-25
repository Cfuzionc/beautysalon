<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Label84\HoursHelper\Facades\HoursHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $dates = [
        'begin',
        'end',
    ];

    protected $guarded = [];
    protected $primaryKey = "uuid";
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}

