<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Entregador" />
            <x-preline.table.header-column label="Data de solicitação" />
            <x-preline.table.header-column label="Data de referencia" />
            <x-preline.table.header-column label="Taxa" />
            <x-preline.table.header-column label="Valor solicitado" />
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end" />
        </x-slot>
        <x-slot name="dataRows">
            @foreach($advances as $advance)
                <x-preline.table.data-column data="{{ $advance->drive->user->name}}" />
                <x-preline.table.data-column data="{{ $advance->request_date}}" />
                <x-preline.table.data-column data="{{ $advance->reference_date}}" />
                <x-preline.table.data-column data="{{ $advance->rate}}" />
                <x-preline.table.data-column data="{{ $advance->advance_amount}}" />
            @endforeach
        </x-slot>
    </x-preline.table.data-table>
    <div>
        <div class="p-2">{{ $advances->links()}}</div>
    </div>
</div>
