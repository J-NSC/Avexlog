<x-preline.modal id="{{$id}}">
    <x-slot name="title">
        Termos de Serviço
    </x-slot>

    <x-slot name="content">
        <div class="bg-white border border-gray-200 rounded-lg shadow-sm p-4">
            <div class="text-gray-700 text-sm">
                <p class="mb-4 text-center text-gray-500 border border-gray-300 rounded-md py-2">
                    Adiantamento referente ao dia {{\Carbon\Carbon::now()->format('d/m/y')}}.
                </p>
                <p>
                    Ao solicitar o adiantamento, <strong> {{$user->name}} (CPF: {{$user->cpf}})</strong>, você declara estar ciente e
                    concorda que uma taxa de <strong>R$ 5,00</strong> será descontada do valor solicitado. A empresa
                    <strong>IFDADOS INTELIGENCIA DE NEGOCIOS LTDA</strong>, inscrita no CNPJ sob o nº <strong>22.451.373/0001-11</strong>,
                    atuará como intermediadora de pagamentos para antecipar os valores solicitados, mediante a aplicação
                    da referida taxa. O adiantamento será processado e creditado exclusivamente na chave Pix previamente
                    cadastrada no sistema.
                </p>
                <p class="mt-4 font-semibold">
                    Valor Disponível para Adiantamento: <strong>R$ --valor--</strong>
                </p>

                <label for="agreement" class="flex items-center mt-4">
                    <input type="checkbox" id="agreement" class="mr-2" wire:model.live="agreement">
                    Li, aceito e concordo com os termos do serviço prestado.
                </label>

                @error('agreement')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror

            </div>
        </div>

        <x-preline.input id="amount"
                         x-mask:dynamic="$money($input, ',')"
                         label="Insira o valor"
                         wire:model='amount'
                         placeholder="Ex: R$ 321,1" />



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
