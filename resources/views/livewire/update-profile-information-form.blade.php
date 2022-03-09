<div>
    <div class="flex flex-wrap">
        <form wire:submit.prevent="updateProfileInformation" class="w-full">
            <div x-data="{ shown: false, timeout: null }" x-init="@this.on('saved', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000);  })" x-show.transition.out.opacity.duration.1500ms="shown" x-transition:leave.opacity.duration.1500ms class="text-sm text-success" style="display: none;">
                Profile updated successfully
            </div>
            <div class="form-group">
                <label class="form-label" for="name">{{ __('global.user_name') }}</label>
                <input class="form-control" id="name" type="text" wire:model.defer="state.name" autocomplete="name">
                @error('state.name')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group py-2">
                <label class="form-label" for="email">{{ __('global.login_email') }}</label>
                <input class="form-control" id="email" type="text" wire:model.defer="state.email" autocomplete="email">
                @error('state.email')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group py-2">
                <label class="form-label" for="phone">Phone</label>
                <input class="form-control" id="phone" type="text" wire:model.defer="state.mobile" autocomplete="number">
                @error('state.mobile')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group flex items-center">
                <button class="btn btn-primary my-5 w-full w-md-auto">
                    {{ __('global.save') }}
                </button>

            </div>
        </form>
    </div>
</div>
