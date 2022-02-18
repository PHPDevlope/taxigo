<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeoFencing extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public const PRICING_LOGIC_SELECT = [
        'per_minute_pricing'              => 'Per Minute Pricing',
        'per_hour_pricing'                => 'Per Hour Pricing',
        'distance_pricing'                => 'Distance Pricing',
        'distance_and_per_minute_pricing' => 'Distance and Per Minute Pricing',
        'distance_and_per_hour_pricing'   => 'Distance and Per Hour Pricing',
    ];

    public $table = 'geo_fencings';

    public $orderable = [
        'id',
        'city_name',
        'distance',
        'distance_price',
        'city_limits',
        'minute_price',
        'pricing_logic',
        'hour_price',
        'base_price',
        'base_distance',
        'unit_time_pricing',
        'unit_distance_price',
        'seat_capacity',
        'waive_off_minutes',
        'per_minute_fare',
        'night_fare',
        'status',
    ];

    public $filterable = [
        'id',
        'city_name',
        'distance',
        'distance_price',
        'city_limits',
        'minute_price',
        'pricing_logic',
        'hour_price',
        'base_price',
        'base_distance',
        'unit_time_pricing',
        'unit_distance_price',
        'seat_capacity',
        'waive_off_minutes',
        'per_minute_fare',
        'night_fare',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'city_name',
        'distance',
        'distance_price',
        'city_limits',
        'minute_price',
        'pricing_logic',
        'hour_price',
        'base_price',
        'base_distance',
        'unit_time_pricing',
        'unit_distance_price',
        'seat_capacity',
        'waive_off_minutes',
        'per_minute_fare',
        'night_fare',
        'status',
    ];

    public function getPricingLogicLabelAttribute($value)
    {
        return static::PRICING_LOGIC_SELECT[$this->pricing_logic] ?? null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
