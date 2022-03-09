<?php

namespace App\Http\Livewire\ProviderRating;

use App\Models\ProviderRating;
use App\Models\RequestHistory;
use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public ProviderRating $providerRating;

    public function mount(ProviderRating $providerRating)
    {
        $this->providerRating = $providerRating;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.provider-rating.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->providerRating->save();

        return redirect()->route('admin.ratings-reviews.provider-ratings');
    }

    protected function rules(): array
    {
        return [
            'providerRating.request_id' => [
                'integer',
                'exists:request_histories,id',
                'nullable',
            ],
            'providerRating.user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'providerRating.provider_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'providerRating.rating' => [
                'string',
                'nullable',
            ],
            'providerRating.date_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'providerRating.comments' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['request']       = RequestHistory::pluck('total_distance', 'id')->toArray();
        $this->listsForFields['user_name']     = User::pluck('name', 'id')->toArray();
        $this->listsForFields['provider_name'] = User::pluck('name', 'id')->toArray();
    }
}
