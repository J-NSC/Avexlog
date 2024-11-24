<x-preline.modal id="{{$id}}">
    <x-slot name="title">
        Agendar Escala
    </x-slot>

    <x-slot name="content">
        <x-preline.input
            id="day"
            label="Dia desejado"
            type="date"
            wire:model="date"
            min="{{ $startOfWeek }}"
            max="{{ $endOfNextWeek }}"
        />

        <x-preline.select id="" label="Selecione um turno" wire:model="turn">
            <option value=""> Selecione</option>
            @foreach(\App\Enum\SchedulerRoster::cases() as $roster)
                <option value="{{$roster->value}}">
                    {{$roster->display()}} - {{$roster->timeRange()}}
                </option>
            @endforeach
        </x-preline.select>
    </x-slot>

    <x-slot name="footer">
        <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                data-hs-overlay="#{{$id}}">
            {{ __('Close') }}
        </button>
        <button type="button"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm gap-x-2 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-800"
                wire:click="save">
            {{ __('Save') }}
        </button>
    </x-slot>
</x-preline.modal>
