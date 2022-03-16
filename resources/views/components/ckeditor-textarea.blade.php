<div class="form-textarea w-full" x-data="editorApp()" x-init="init($dispatch)" wire:ignore wire:key="ckEditor" x-ref="ckEditor"
     {{ $attributes }} data-input>
    {!! $attributes['textdata'] !!}
</div>

@push('scripts')
    <script>
        function editorApp() {
            return {
                create: async function($dispatch) {
                    const editor = await ClassicEditor.create(this.$refs.ckEditor);
                    editor.model.document.on('change:data', function() {
                        $dispatch('input', editor.getData())
                    });
                    return editor;
                },
                init: async function($dispatch) {
                    const editor = await this.create($dispatch);
                    const $this = this;
                    Livewire.on('reinit', async function(e) {
                        editor.destroy();
                        await $this.create($dispatch);
                    });
                }
            }
        }
    </script>
@endpush
