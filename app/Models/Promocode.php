<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const PROMOCODES_USE_SELECT = [
        'in_percentage_mode' => 'In Percentage Mode',
        'in_amount_mode'     => 'In Amount Mode',
    ];

    public $table = 'promocodes';

    public $orderable = [
        'id',
        'promocode',
        'discount',
        'promocodes_use',
        'use_count',
        'from_date',
        'expiration',
    ];

    public $filterable = [
        'id',
        'promocode',
        'discount',
        'promocodes_use',
        'use_count',
        'from_date',
        'expiration',
    ];

    protected $dates = [
        'from_date',
        'expiration',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'promocode',
        'discount',
        'promocodes_use',
        'use_count',
        'from_date',
        'expiration',
    ];

    public function getPromocodesUseLabelAttribute($value)
    {
        return static::PROMOCODES_USE_SELECT[$this->promocodes_use] ?? null;
    }

    public function getFromDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setFromDateAttribute($value)
    {
        $this->attributes['from_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpirationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setExpirationAttribute($value)
    {
        $this->attributes['expiration'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
