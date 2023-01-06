<?php

namespace App\Models;

use Carbon\Carbon;
use DB;
use Eloquent;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Label84\HoursHelper\Facades\HoursHelper;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Reservation
 *
 * @property string $uuid
 * @property int $user_id
 * @property string|null $preffered_employee
 * @property \Illuminate\Support\Carbon $begin
 * @property \Illuminate\Support\Carbon $end
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User $user
 * @method static \Database\Factories\ReservationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation newQuery()
 * @method static \Illuminate\Database\Query\Builder|Reservation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereBegin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation wherePrefferedEmployee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Reservation whereUuid($value)
 * @method static \Illuminate\Database\Query\Builder|Reservation withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Reservation withoutTrashed()
 * @mixin Eloquent
 */
class Reservation extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $dates = [
        'begin',
        'end',
    ];

    protected $guarded = [];
    protected $primaryKey = "uuid";
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function deleteColumnByUuid($uuid)
    {
        return DB::table('reservations')
            ->where('uuid', $uuid)
            ->delete();
    }

}

