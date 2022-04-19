<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisputeType extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public const DISPUTE_TYPE_SELECT = [
        'user'            => 'User',
        'provider'        => 'Provider',
        'fleet_owner'     => 'Fleet Owner',
        'dispatcher'      => 'Dispatcher',
        'account_manager' => 'Account Manager',
        'dispute_manager' => 'Dispute Manager',
    ];

    public $table = 'dispute_types';

    public $orderable = [
        'id',
        'dispute_type',
        'dispute_name',
        'status',
    ];

    public $filterable = [
        'id',
        'dispute_type',
        'dispute_name',
        'status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'dispute_type',
        'dispute_name',
        'status',
    ];

    public function getDisputeTypeLabelAttribute($value)
    {
        return static::DISPUTE_TYPE_SELECT[$this->dispute_type] ?? null;
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
