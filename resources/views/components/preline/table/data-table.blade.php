@props(['headerColumns' => null,'dataRows','footer' => null])
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle space-y-4">
            <div class="overflow-hidden border-y dark:border-neutral-700">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    @if ($headerColumns)
                    <thead>
                        <tr>
                            {{ $headerColumns }}
                        </tr>
                    </thead>
                    @endif
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                        {{ $dataRows }}
                    </tbody>
                    @if ($footer)
                    <tfoot>
                        <tr>
                            <th scope="col" colspan="6"
                                class="w-full px-6 py-1 text-xs font-light text-left text-gray-500 border-t col-span-full dark:border-gray-700 whitespace-nowrap dark:text-neutral-200">
                                {{ $footer }}
                            </th>
                        </tr>
                    </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>