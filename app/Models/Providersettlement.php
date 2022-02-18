<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Providersettlement extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const TYPE_SELECT = [
        'credit' => 'Credit',
        'debit'  => 'Debit',
    ];

    public const SEND_SELECT = [
        'online'  => 'Online',
        'offline' => 'Offline',
    ];

    public $table = 'providersettlements';

    public static $search = [
        'provider_name',
        'amount',
        'type',
        'send',
    ];

    public $orderable = [
        'id',
        'provider_name',
        'amount',
        'type',
        'send',
    ];

    public $filterable = [
        'id',
        'provider_name',
        'amount',
        'type',
        'send',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'provider_name',
        'amount',
        'type',
        'send',
    ];

    public function getTypeLabelAttribute($value)
    {
        return static::TYPE_SELECT[$this->type] ?? null;
    }

    public function getSendLabelAttribute($value)
    {
        return static::SEND_SELECT[$this->send] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
