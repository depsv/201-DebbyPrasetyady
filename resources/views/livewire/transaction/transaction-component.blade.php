<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Master Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="flex items-center text-2xl font-medium text-gray-900 dark:text-white">
                        <div>
                            Transactions
                        </div>
                    </h1>

                    <div class="mt-6">
                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">
                                        No.
                                    </th>
                                    <th class="px-4 py-2">
                                        Customer
                                    </th>
                                    <th class="px-4 py-2">
                                        Amount
                                    </th>
                                    <th class="px-4 py-2">
                                        Status
                                    </th>
                                    <th class="px-4 py-2">
                                        Notes
                                    </th>
                                    <th class="px-4 py-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $index => $transaction)
                                    <tr>
                                        <td class="border px-4 py-2 text-center">{{ $index + 1 + ($transactions->currentPage() - 1) * $transactions->perPage() }}</td>
                                        <td class="border px-4 py-2">{{ $transaction->user->name }}</td>
                                        <td class="border px-4 py-2 text-center">Rp. {{ $transaction->amount }}</td>
                                        <td class="border px-4 py-2">{{ $transaction->status }}</td>
                                        <td class="border px-4 py-2">{{ $transaction->notes ?? 'Empty' }}</td>
                                        <td class="border px-4 py-2 text-center flex justify-center items-center">
                                            <x-button wire:click="showDetailTransaction({{ $transaction->id }})" wire:loading.attr="disabled">
                                                {{ __('Detail') }}
                                            </x-button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>

                    {{-- Show Detail Transactions Modal --}}
                    <x-dialog-modal wire:model="showingDetailTransaction">
                        <x-slot name="title">
                            {{ __('Detail Transaction') }}
                        </x-slot>

                        <x-slot name="content">
                            @if($showingDetailTransaction)
                                <div class="flex justify-center">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Service Name</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Disc</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transactions->find($showingDetailTransaction)->details as $detail)
                                                <tr>
                                                    <td class="pr-5">{{ $detail->service->name }}</td>
                                                    <td class="pr-5">Rp. {{ $detail->service->price }}</td>
                                                    <td class="pr-5">{{ $detail->qty }} {{ $detail->service->unit }}</td>
                                                    <td class="pr-5">Rp. {{ $detail->disc ?? '0' }}</td>
                                                    <td>Rp. {{ $detail->total }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </x-slot>

                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('showingDetailTransaction', false)" wire:loading.attr="disabled">
                                {{ __('Ok') }}
                            </x-secondary-button>
                        </x-slot>
                    </x-dialog-modal>
                </div>
            </div>
        </div>
    </div>
</div>
