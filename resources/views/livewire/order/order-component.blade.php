<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Make a new Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Create Order</h1>
                    <div class="mt-4">
                        <form wire:submit.prevent="addOrder">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="services" class="block text-sm font-medium text-gray-700 dark:text-white">Choose Service</label>
                                    <select name="services" id="services" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" wire:model="selectedServiceId" required>
                                        <option value="">Select a service</option>
                                        @foreach($services as $service)
                                            <option value="{{ $service->id }}" {{ old('selectedServiceId', $selectedServiceId) == $service->id ? 'selected' : '' }}>{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                    <!-- Input error message -->
                                    @error('selectedServiceId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-white">Quantity</label>
                                    <input id="quantity" type="number" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('quantity') }}" wire:model.defer="quantity" required autocomplete="quantity">
                                    <!-- Input error message -->
                                    @error('quantity') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="notes" class="block text-sm font-medium text-gray-700 dark:text-white">Notes</label>
                                <textarea id="notes" type="text" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('notes') }}" wire:model.defer="notes" autocomplete="notes" rows="3"></textarea>
                                <!-- Input error message -->
                                @error('notes') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Order</button>
                        </form>
                    </div>
                </div>
            </div>
            @if(count($orders) > 0)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg mt-5">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        @foreach($orders as $index => $order)
                            <h2 class="text-xl font-medium text-gray-900 dark:text-white">Order {{ $index + 1 }}</h2>
                            <p><strong>Service:</strong> {{ $order['service'] }} | <strong>Unit:</strong> {{ $order['unit'] }} | <strong>Price:</strong> {{ $order['price'] }} | <strong>Quantity:</strong> {{ $order['quantity'] }} | <strong>Notes:</strong> {{ $order['notes'] }} | <strong>Total:</strong> {{ $order['total'] }}</p>
                            <hr class="my-5 border-gray-300 dark:border-gray-700">
                        @endforeach
                        <button wire:click='submitOrders' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
