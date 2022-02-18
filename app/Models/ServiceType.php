<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceType extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use InteractsWithMedia;

    public const STATUS_SELECT = [
        'active'   => 'Active',
        'inactive' => 'Inactive',
    ];

    public $table = 'service_types';

    public $orderable = [
        'id',
        'service_name',
        'provider_name',
        'description',
        'outstation_oneway_price',
        'outstation_roundtrip_price',
        'driver_bata',
        'rental_per_hour',
        'night_fare',
        'status',
    ];

    public $filterable = [
        'id',
        'service_name',
        'provider_name',
        'description',
        'outstation_oneway_price',
        'outstation_roundtrip_price',
        'driver_bata',
        'rental_per_hour',
        'peak_time.peak_price',
        'night_fare',
        'geo_fencing.city_name',
        'status',
    ];

    protected $appends = [
        'service_maker_image',
        'service_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'service_name',
        'provider_name',
        'description',
        'outstation_oneway_price',
        'outstation_roundtrip_price',
        'driver_bata',
        'rental_per_hour',
        'night_fare',
        'status',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 120;
        $thumbnailPreviewHeight = 120;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
    }

    public function getServiceMakerImageAttribute()
    {
        return $this->getMedia('service_type_service_maker_image')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getServiceImageAttribute()
    {
        return $this->getMedia('service_type_service_image')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function peakTime()
    {
        return $this->belongsToMany(PeakTime::class);
    }

    public function geoFencing()
    {
        return $this->belongsToMany(GeoFencing::class);
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
