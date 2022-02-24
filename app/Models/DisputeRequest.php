<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DisputeRequest extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'dispute_requests';

    public $orderable = [
        'id',
        'user_provider',
        'request_detail',
        'dispute.dispute_type',
    ];

    public $filterable = [
        'id',
        'user_provider',
        'request_detail',
        'dispute.dispute_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_provider',
        'request_detail',
        'dispute_id',
    ];

    public function dispute()
    {
        return $this->belongsTo(DisputeType::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}