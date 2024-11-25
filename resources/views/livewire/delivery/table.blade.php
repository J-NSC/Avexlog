<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Nome"/>
            <x-preline.table.header-column label="Entragas"/>
            <x-preline.table.header-column label="Valor das Entregas"/>
            <x-preline.table.header-column label="Soma"/>
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end"/>
        </x-slot>
        <x-slot name="dataRows">
            @foreach($pixes as $pix)
                <x-preline.table.data-row wire:key="{{ $pix->id }}">
                    <x-preline.table.data-column data="{{ $pix->user->name}}"/>
                    <x-preline.table.data-column data="{{ $pix->pix_key }}" />
                    <x-preline.table.action-column>
                        @hasrole('delivery_driver|super_admin')

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
