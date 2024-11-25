<x-preline.modal id="{{$id}}">
    <x-slot name="title">
        Deletar Pix
    </x-slot>

    <x-slot name="content">
        <span >
            tem certeza que quer excluir o PIX {{$pix->pix_key}}
        </span>
    </x-slot>

    <x-slot name="footer">
        <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                data-hs-overlay="#{{$id}}">
            {{ __('Close') }}
        </button>
        <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                wire:click="destroy">
            {{ __('Delete') }}
        </button>
    </x-slot>
</x-preline.modal>
