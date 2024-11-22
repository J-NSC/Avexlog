<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Dia" />
            <x-preline.table.header-column label="Status" />
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end" />
        </x-slot>

        <x-slot name="dataRows">
            @foreach($schedules as $schedule)
                <x-preline.table.data-row wire:key="{{ $schedule->id }}">
                    <x-preline.table.data-column data="{{ $schedule->date->format('d/m/y')}}" />
                    <x-preline.table.data-column >
                        <span class="uppercase text-xs font-bold text-white bg-{{ $schedule->status->color() }}-400 dark:bg-{{ $schedule->status->color() }}-600 rounded-xl py-1.5 px-2">
                             {{ $schedule->status->display() }}
                        </span>
                    </x-preline.table.data-column>
                </x-preline.table.data-row>
            @endforeach
        </x-slot>

    </x-preline.table.data-table>
    <div>
        <div class="p-2">{{ $schedules->links()}}</div>
    </div>
</div>
