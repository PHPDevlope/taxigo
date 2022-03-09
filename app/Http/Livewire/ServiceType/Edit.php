<?php

namespace App\Http\Livewire\ServiceType;

use App\Models\GeoFencing;
use App\Models\PeakTime;
use App\Models\ServiceType;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $peak_time = [];

    public array $geo_fencing = [];

    public ServiceType $serviceType;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    public function mount(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
        $this->peak_time   = $this->serviceType->peakTime()->pluck('id')->toArray();
        $this->geo_fencing = $this->serviceType->geoFencing()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'service_type_service_maker_image' => $serviceType->service_maker_image,
            'service_type_service_image'       => $serviceType->service_image,
        ];
    }

    public function render()
    {
        return view('livewire.service-type.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->serviceType->save();
        $this->serviceType->peakTime()->sync($this->peak_time);
        $this->serviceType->geoFencing()->sync($this->geo_fencing);
        $this->syncMedia();

        return redirect()->route('admin.service.service-types');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->serviceType->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    protected function rules(): array
    {
        return [
            'serviceType.service_name' => [
                'string',
                'nullable',
            ],
            'serviceType.provider_name' => [
                'string',
                'nullable',
            ],
            'mediaCollections.service_type_service_maker_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.service_type_service_maker_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.service_type_service_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.service_type_service_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'serviceType.description' => [
                'string',
                'nullable',
            ],
            'serviceType.outstation_oneway_price' => [
                'numeric',
                'nullable',
            ],
            'serviceType.outstation_roundtrip_price' => [
                'numeric',
                'nullable',
            ],
            'serviceType.driver_bata' => [
                'numeric',
                'nullable',
            ],
            'serviceType.rental_per_hour' => [
                'string',
                'nullable',
            ],
            'peak_time' => [
                'array',
            ],
            'peak_time.*.id' => [
                'integer',
                'exists:peak_times,id',
            ],
            'serviceType.night_fare' => [
                'string',
                'nullable',
            ],
            'geo_fencing' => [
                'array',
            ],
            'geo_fencing.*.id' => [
                'integer',
                'exists:geo_fencings,id',
            ],
            'serviceType.status' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['status'])),
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['peak_time']   = PeakTime::pluck('peak_price', 'id')->toArray();
        $this->listsForFields['geo_fencing'] = GeoFencing::pluck('city_name', 'id')->toArray();
        $this->listsForFields['status']      = $this->serviceType::STATUS_SELECT;
    }
}
