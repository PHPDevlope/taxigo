<?php

namespace App\Models;

use \DateTimeInterface;
use App\Models\UserAlert;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Hash;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasLocalePreference, HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use Notifiable;
    use SoftDeletes;
    use InteractsWithMedia;

    public const PROVIDER_STATUS_SELECT = [
        'no'  => 'No',
        'yes' => 'Yes',
    ];

    public const GENDER_SELECT = [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];

    public const DEVICE_TYPE_SELECT = [
        'web'     => 'Web',
        'android' => 'Android',
        'ios'     => 'Ios',
    ];

    public $table = 'users';

    public $orderable = [
        'id',
        'name',
        'mobile',
        'mobile_verified_at',
        'email',
        'email_verified_at',
        'locale',
        'otp',
        'firebase_token',
        'device_token',
        'device_type',
        'device',
        'bio',
        'gender',
        'dob',
        'address',
        'provider_status',
    ];

    public $filterable = [
        'id',
        'name',
        'mobile',
        'mobile_verified_at',
        'email',
        'email_verified_at',
        'roles.title',
        'locale',
        'otp',
        'firebase_token',
        'device_token',
        'device_type',
        'device',
        'bio',
        'gender',
        'dob',
        'address',
        'provider_status',
    ];

    protected $appends = [
        'profile',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'mobile_verified_at',
        'email_verified_at',
        'dob',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'mobile',
        'mobile_verified_at',
        'email',
        'password',
        'locale',
        'otp',
        'firebase_token',
        'device_token',
        'device_type',
        'device',
        'bio',
        'gender',
        'dob',
        'address',
        'provider_status',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('title', 'Admin')->exists();
    }

    public function scopeAdmins()
    {
        return $this->whereHas('roles', fn ($q) => $q->where('title', 'Admin'));
    }

    public function alerts()
    {
        return $this->belongsToMany(UserAlert::class)->withPivot('seen_at');
    }

    public function preferredLocale()
    {
        return $this->locale;
    }

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

    public function getProfileAttribute()
    {
        return $this->getMedia('user_profile')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }

    public function getMobileVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setMobileVerifiedAtAttribute($value)
    {
        $this->attributes['mobile_verified_at'] = $value ? Carbon::createFromFormat(config('project.datetime_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = Hash::needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getDeviceTypeLabelAttribute($value)
    {
        return static::DEVICE_TYPE_SELECT[$this->device_type] ?? null;
    }

    public function getGenderLabelAttribute($value)
    {
        return static::GENDER_SELECT[$this->gender] ?? null;
    }

    public function getDobAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProviderStatusLabelAttribute($value)
    {
        return static::PROVIDER_STATUS_SELECT[$this->provider_status] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
