<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class ProviderService extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;

    public $table = 'provider_services';

    public $orderable = [
        'id',
        'users.name',
        'service_types.service_name',
        'service_number',
        'service_model',
    ];

    public $filterable = [
        'id',
        'users.name',
        'service_types.service_name',
        'service_number',
        'service_model',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'user_id',
        'service_id',
        'service_number',
        'service_model',
    ];

    public function userName()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function serviceName()
    {
        return $this->belongsTo(ServiceType::class, "service_id", "id");
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
