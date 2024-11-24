<div>
    <textarea
        id="tinymce"
        x-init="tinymce.init({
            selector: 'textarea#tinymce',
            language: 'pt_BR',
            plugins: 'table autolink fullscreen lists',
            toolbar: 'undo redo | fontselect | fontsizeselect | formatselect | checklist numlist bullist | casechange bold italic underline strikethrough subscript superscript removeformat blockformats align visualblocks | export link image table | selectall formatpainter cut copy paste | fullscreen print preview pagebreak searchreplace',
            statusbar: false,
            skin: (localStorage.getItem('color-theme') == 'dark' ? 'oxide-dark' : 'oxide'),
            content_css: (localStorage.getItem('color-theme') == 'dark' ? 'dark' : ''),
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
                editor.on('change', function (e) {
                     $wire.set('{{ $attributes->whereStartsWith('wire:model')->first() }}', editor.getContent());
                });
            },
            tinycomments_mode: 'embedded',
            mobile: {
                toolbar_mode: true
            },

        })"
        {{ $attributes }}
    >
    </textarea>
    <script src="https://cdn.tiny.cloud/1/{{ env('VITE_TINY_MCE_API_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
</div>
