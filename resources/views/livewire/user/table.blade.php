<div>
    <x-preline.table.data-table>
        <x-slot name="headerColumns">
            <x-preline.table.header-column label="Nome" />
            <x-preline.table.header-column label="Role" />
            <x-preline.table.header-column label="Valor solicitado" />
            <x-preline.table.header-column label="{{__('Action')}}" class="text-end" />
        </x-slot>
        <x-slot name="dataRows">
            @foreach($users as $user)
                <x-preline.table.data-row wire:key="{{ $user->id }}">
                    <x-preline.table.data-column data="{{ $user->name}}" />
                    @foreach($user->roles as $role)
                        <x-preline.table.data-column data="{{ $role->display}}" />
                    @endforeach
                </x-preline.table.data-row>
            @endforeach
        </x-slot>
    </x-preline.table.data-table>
    <div>
        <div class="p-2">{{ $users->links()}}</div>
    </div>
</div>
