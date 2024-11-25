<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Nome"/>
            <x-preline.table.header-column label="Chave"/>
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end"/>
        </x-slot>
        <x-slot name="dataRows">
            @foreach($pixes as $pix)
                <x-preline.table.data-row wire:key="{{ $pix->id }}">
                    <x-preline.table.data-column data="{{ $pix->user->name}}"/>
                    <x-preline.table.data-column data="{{ $pix->pix_key }}" />
                    <x-preline.table.action-column>
                        @hasrole('delivery_driver|super_admin')
                        <a type="button"
                           class="py-2 px-4 inline-flex items-center justify-center text-sm font-medium rounded-lg border border-transparent bg-yellow-500 text-white hover:bg-yellow-600 focus:outline-none focus:bg-yellow-600 disabled:opacity-50 disabled:pointer-events-none"
                           data-hs-overlay="#hs-edit-pix-modal"
                           wire:click="sendEditId({{$pix->id}})"
                        >
                            Editar
                        </a>
                        <button
                           class="py-2 px-4 inline-flex items-center justify-center text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none"
                           data-hs-overlay="#hs-destroy-pix-modal"
                           wire:click="sendDestroyId({{ $pix->id }})">
                            Excluir
                        </button>
                        @endrole
                    </x-preline.table.action-column>
                </x-preline.table.data-row>
            @endforeach
        </x-slot>
    </x-preline.table.data-table>


    <livewire:pix.destroy id="hs-destroy-pix-modal"/>
    <livewire:pix.edit id="hs-edit-pix-modal"/>
    <div>
        <div class="p-2">{{ $pixes->links()}}</div>
    </div>
</div>
