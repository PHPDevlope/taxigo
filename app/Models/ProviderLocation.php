<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProviderLocation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public $table = 'provider_locations';

    public $orderable = [
        'id',
        'user.name',
        'current_longitude',
        'current_latitude',
        'preferred_longitude',
        'preferred_latitude',
        'status',
    ];

    public $filterable = [
        'id',
        'user.name',
        'current_longitude',
        'current_latitude',
        'preferred_longitude',
        'preferred_latitude',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'user_id',
        'current_longitude',
        'current_latitude',
        'preferred_longitude',
        'preferred_latitude',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
