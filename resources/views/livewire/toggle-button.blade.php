{{--<div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">--}}
{{--    <input type="checkbox" wire:model.lazy="status" name="status" id="status" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer focus-none"/>--}}
{{--    <label for="status" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>--}}
{{--</div>--}}

<div class="form-check form-switch">
    <input class="form-check-input payment" type="checkbox" role="switch" name="status" id="status" wire:model.lazy="value">
</div>
