<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRating extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'user_ratings';

    public $orderable = [
        'id',
        'request.total_distance',
        'user_name.name',
        'provider_name.name',
        'rating',
        'date_time',
        'comments',
    ];

    public $filterable = [
        'id',
        'request.total_distance',
        'user_name.name',
        'provider_name.name',
        'rating',
        'date_time',
        'comments',
    ];

    protected $dates = [
        'date_time',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'request_id',
        'user_name_id',
        'provider_name_id',
        'rating',
        'date_time',
        'comments',
    ];

    public function request()
    {
        return $this->belongsTo(RequestHistory::class);
    }

    public function userName()
    {
        return $this->belongsTo(User::class);
    }

    public function providerName()
    {
        return $this->belongsTo(User::class);
    }

    public function getDateTimeAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setDateTimeAttribute($value)
    {
        $this->attributes['date_time'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
