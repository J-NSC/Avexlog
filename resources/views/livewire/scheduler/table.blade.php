<div class="flex flex-col gap-y-2">

    <div class="grid grid-cols-4 gap-2 p-4">
        <x-preline.input id="date" type="date" label="Filtre por data" wire:model.live='date'/>
        <div>
            <x-preline.select id="" wire:model.live="turn" label="Filtre pro Turno " placeholder="Selecione uma função">
                <option value="">Selecione</option>
                @foreach(\App\Enum\SchedulerRoster::cases() as $roster)
                    <option value="{{ $roster->value }}">{{$roster->display()}}</option>
                @endforeach
            </x-preline.select>
        </div>
    </div>

    <div class="text-end text-gray-600 dark:text-gray-300">
        <span>Total de <strong>{{$schedules->count()}}</strong> Escalas(s) registrada(s)</span>
    </div>

    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="name"/>
            <x-preline.table.header-column label="Escala"/>
            <x-preline.table.header-column label="Turno"/>
            <x-preline.table.header-column label="Status"/>
            <x-preline.table.header-column class="text-end cent" label="{{__('Action')}}"/>
        </x-slot>
        <x-slot name="dataRows">
            @forelse($schedules as $schedule)
                <x-preline.table.data-row wire:key="{{ $schedule->id }}">
                    <x-preline.table.data-column>
                        @foreach($schedule->user as $user)
                            {{ $user->name }}
                        @endforeach
                    </x-preline.table.data-column>
                    <x-preline.table.data-column data="{{ $schedule->date->format('d/m/y')}}"/>
                    <x-preline.table.data-column data="{{ $schedule->turn->display()}}"/>
                    <x-preline.table.data-column>
                <span
                    class="uppercase text-xs font-bold text-white bg-{{ $schedule->status->color() }}-400 dark:bg-{{ $schedule->status->color() }}-600 rounded-xl py-1.5 px-2">
                     {{ $schedule->status->display() }}
                </span>
                    </x-preline.table.data-column>
                    <x-preline.table.action-column>
                        @hasrole('admin|super_admin')
                        <a type="button"
                           class="py-2 px-4 inline-flex items-center justify-center text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 focus:outline-none focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none"
                           wire:click="updateSchedulerStatus({{ $schedule->id }}, '{{ \App\Enum\SchedulerStatus::ACCEPTED }}')"
                        >
                            Aceitar
                        </a>
                        <a type="button"
                           class="py-2 px-4 inline-flex items-center justify-center text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none"
                           wire:click="updateSchedulerStatus({{ $schedule->id }}, '{{ \App\Enum\SchedulerStatus::REJECTED }}')"
                        >
                            Recusar
                        </a>
                        @endrole

                        @hasrole('delivery_driver')
                        <a type="button"
                           class="py-2 px-4 inline-flex items-center justify-center text-sm font-medium rounded-lg border border-transparent bg-gray-500 text-white hover:bg-gray-600 focus:outline-none focus:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none"
                           wire:click="updateSchedulerStatus({{ $schedule->id }}, '{{ \App\Enum\SchedulerStatus::CANCELLED }}')"
                        >
                            Cancelar
                        </a>
                        @endhasrole
                    </x-preline.table.action-column>
                </x-preline.table.data-row>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-sm text-gray-800 dark:text-neutral-200 py-6">
                        Nenhuma vistoria cadastrada
                    </td>
                </tr>
            @endforelse
        </x-slot>

    </x-preline.table.data-table>
    @if($schedules->hasPages())
        <div class="px-4 py-2 border-t dark:border-t-zinc-600">
            {{ $schedules->links() }}
        </div>
    @endif
</div>
