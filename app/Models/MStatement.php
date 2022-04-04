<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MStatement extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public $table = 'm_statements';

    public $orderable = [
        'id',
        'user.name',
        'document.document_name',
        'booking',
        'picked_up',
        'dropped',
        'commission',
        'request.total_distance',
        'status',
        'eraned',
    ];

    public $filterable = [
        'id',
        'user.name',
        'document.document_name',
        'booking',
        'picked_up',
        'dropped',
        'commission',
        'request.total_distance',
        'status',
        'eraned',
    ];

    protected $appends = [
        'files',
    ];

    protected $fillable = [
        'user_id',
        'document_id',
        'booking',
        'picked_up',
        'dropped',
        'commission',
        'request.total_distance',
        'status',
        'eraned',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function request()
    {
        return $this->belongsTo(RequestHistory::class);
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('m_statement_files')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
