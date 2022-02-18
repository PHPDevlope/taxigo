<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestHistory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const RIDE_STATUS_SELECT = [
        'complated' => 'Complated',
        'cancelled' => 'Cancelled',
    ];

    public $table = 'request_histories';

    public $orderable = [
        'id',
        'user_name.name',
        'provider_name.name',
        'total_distance',
        'ride_start_time',
        'ride_end_time',
        'otp',
        'pickup_address',
        'drop_address',
        'base_price',
        'distance_price',
        'discount_price',
        'eta_discount_price',
        'tax_price',
        'surge_price',
        'total_amount',
        'coupon_deduction',
        'coupon.promocode',
        'paid_amount',
        'provider_earnings',
        'provider_admin_commission',
        'ride_status',
    ];

    public $filterable = [
        'id',
        'user_name.name',
        'provider_name.name',
        'total_distance',
        'ride_start_time',
        'ride_end_time',
        'otp',
        'pickup_address',
        'drop_address',
        'base_price',
        'distance_price',
        'discount_price',
        'eta_discount_price',
        'tax_price',
        'surge_price',
        'total_amount',
        'coupon_deduction',
        'coupon.promocode',
        'paid_amount',
        'provider_earnings',
        'provider_admin_commission',
        'ride_status',
    ];

    protected $dates = [
        'ride_start_time',
        'ride_end_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_name_id',
        'provider_name_id',
        'total_distance',
        'ride_start_time',
        'ride_end_time',
        'otp',
        'pickup_address',
        'drop_address',
        'base_price',
        'distance_price',
        'discount_price',
        'eta_discount_price',
        'tax_price',
        'surge_price',
        'total_amount',
        'coupon_deduction',
        'coupon_id',
        'paid_amount',
        'provider_earnings',
        'provider_admin_commission',
        'ride_status',
    ];

    public function userName()
    {
        return $this->belongsTo(User::class);
    }

    public function providerName()
    {
        return $this->belongsTo(User::class);
    }

    public function getRideStartTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setRideStartTimeAttribute($value)
    {
        $this->attributes['ride_start_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getRideEndTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setRideEndTimeAttribute($value)
    {
        $this->attributes['ride_end_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function coupon()
    {
        return $this->belongsTo(Promocode::class);
    }

    public function getRideStatusLabelAttribute($value)
    {
        return static::RIDE_STATUS_SELECT[$this->ride_status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
