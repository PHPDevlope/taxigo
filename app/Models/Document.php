<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const DOCUMENT_TYPE_SELECT = [
        'driver_review'  => 'Driver Review',
        'vehicle_review' => 'Vehicle Review',
    ];

    public $table = 'documents';

    public static $search = [
        'document_name',
        'document_type',
    ];

    public $orderable = [
        'id',
        'document_name',
        'document_type',
    ];

    public $filterable = [
        'id',
        'document_name',
        'document_type',
    ];

    protected $fillable = [
        'document_name',
        'document_type',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDocumentTypeLabelAttribute($value)
    {
        return static::DOCUMENT_TYPE_SELECT[$this->document_type] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
