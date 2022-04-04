<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group mt-2">
        <label class="form-label" for="user_name">User</label>
        <x-select-list class="form-control" id="user_name" name="user_name" :options="$this->listsForFields['user_name']" wire:model="providerDocument.user_id" />
        <div class="validation-message">
            {{ $errors->first('providerDocument.user_id') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="document_name">Document</label>
        <x-select-list class="form-control" id="document_name" name="document_name" :options="$this->listsForFields['document_name']" wire:model="providerDocument.document_id" />
        <div class="validation-message">
            {{ $errors->first('providerDocument.document_id') }}
        </div>
    </div>

    <div class="form-group mt-2">
        <label class="form-label" for="status">Status</label>
        <input type="text" class="form-control" name="status" id="status" wire:model.defer="providerDocument.status" placeholder="Status">
        <div class="validation-message">
            {{ $errors->first('providerDocument.status') }}
        </div>
    </div>

    <div class="form-group mt-4">
        <button class="btn btn-dark btn-sm mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a data-bs-dismiss="offcanvas" class="btn btn-sm btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>
