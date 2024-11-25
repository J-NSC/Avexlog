<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Nome"/>
            <x-preline.table.header-column label="Data de solicitação"/>
            <x-preline.table.header-column label="Data de referencia"/>
            <x-preline.table.header-column label="Taxa"/>
            <x-preline.table.header-column label="Valor solicitado"/>
            <x-preline.table.header-column label="Status"/>
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end"/>
        </x-slot>
        <x-slot name="dataRows">
            @foreach($advances as $advance)
                <x-preline.table.data-row wire:key="{{ $advance->id }}">
                    <x-preline.table.data-column data="{{ $advance->user->name}}"/>
                    <x-preline.table.data-column data="{{ $advance->request_date->format('d/m/y')}}"/>
                    <x-preline.table.data-column data="{{ $advance->reference_date->format('d/m/y')}}"/>
                    <x-preline.table.data-column data="{{ formatMoney($advance->rate) }}"/>
                    <x-preline.table.data-column data="{{ formatMoney($advance->advance_amount) }}"/>
                    <x-preline.table.data-column>
                      <span
                          class="uppercase text-xs font-bold text-white bg-{{ $advance->status->color() }}-400 dark:bg-{{ $advance->status->color() }}-600 rounded-xl py-1.5 px-2">
                            {{ $advance->status->display() }}
                      </span>
                    </x-preline.table.data-column>
                </x-preline.table.data-row>
            @endforeach
        </x-slot>
    </x-preline.table.data-table>
    <div>
        <div class="p-2">{{ $advances->links()}}</div>
    </div>
</div>
