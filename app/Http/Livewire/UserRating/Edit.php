<?php

namespace App\Http\Livewire\UserRating;

use App\Models\RequestHistory;
use App\Models\User;
use App\Models\UserRating;
use Livewire\Component;

class Edit extends Component
{
    public UserRating $userRating;

    public array $listsForFields = [];

    public function mount(UserRating $userRating)
    {
        $this->userRating = $userRating;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.user-rating.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->userRating->save();

        return redirect()->route('admin.ratings-reviews.user-ratings');
    }

    protected function rules(): array
    {
        return [
            'userRating.request_id' => [
                'integer',
                'exists:request_histories,id',
                'nullable',
            ],
            'userRating.user_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'userRating.provider_name_id' => [
                'integer',
                'exists:users,id',
                'nullable',
            ],
            'userRating.rating' => [
                'string',
                'nullable',
            ],
            'userRating.date_time' => [
                'nullable',
                'date_format:' . config('project.datetime_format'),
            ],
            'userRating.comments' => [
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
