<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentHistory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const PAUMENT_STATUS_SELECT = [
        'paid'     => 'Paid',
        'not_paid' => 'Not Paid',
    ];

    public $table = 'payment_histories';

    public $orderable = [
        'id',
        'transaction',
        'total_amount',
        'provider_amount',
        'payment_mode',
        'paument_status',
    ];

    public $filterable = [
        'id',
        'transaction',
        'total_amount',
        'provider_amount',
        'payment_mode',
        'paument_status',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transaction',
        'total_amount',
        'provider_amount',
        'payment_mode',
        'paument_status',
    ];

    public function getPaumentStatusLabelAttribute($value)
    {
        return static::PAUMENT_STATUS_SELECT[$this->paument_status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
