<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MSetting extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public $table = 'm_settings';

    public $orderable = [
        'id',
        'key',
        'value',
        'data',
        'sub_data',
        'field_1',
        'field_2',
    ];

    public $filterable = [
        'id',
        'key',
        'value',
        'data',
        'sub_data',
        'field_1',
        'field_2',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'key',
        'value',
        'data',
        'sub_data',
        'field_1',
        'field_2',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
