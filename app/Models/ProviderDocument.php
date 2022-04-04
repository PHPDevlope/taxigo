<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProviderDocument extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;

    public $table = 'provider_documents';

    public $orderable = [
        'id',
        'user.name',
        'document.name',
        'status',
    ];

    public $filterable = [
        'id',
        'user.name',
        'document.name',
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
        'document_id',
        'status',
    ];

    public function documentName()
    {
        return $this->belongsTo(Document::class, "document_id", "id");
    }

    public function userName()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


}
