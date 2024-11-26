<div>
    <div class="text-end text-gray-600 dark:text-gray-300">
        <x-preline.input id="" label="Valor das entregas" wire:model="deliveryValue"/>
    </div>



    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Nome"/>
            <x-preline.table.header-column label="Entragas"/>
            <x-preline.table.header-column label="Valor das Entregas"/>
            <x-preline.table.header-column label="Soma"/>
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end"/>
        </x-slot>
        <x-slot name="dataRows">
            @foreach($deliveries as $deliverie)
                <x-preline.table.data-row wire:key="{{ $deliverie->id }}">
                    <x-preline.table.data-column data="{{ $deliverie->name}}"/>
                    <x-preline.table.action-column>
                        @hasrole('delivery_driver|super_admin')
                            <x-preline.input id="" label="" type="number" wire:model="delivery"/>
                        @endrole
                    </x-preline.table.action-column>
                </x-preline.table.data-row>
            @endforeach
        </x-slot>
    </x-preline.table.data-table>


    <livewire:pix.destroy id="hs-destroy-pix-modal"/>
    <livewire:pix.edit id="hs-edit-pix-modal"/>
    <div>
        <div class="p-2">{{ $deliveries->links()}}</div>
    </div>
</div>
