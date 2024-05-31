<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Master Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Add New Service</h1>
                        <div class="mt-4">
                            <form wire:submit.prevent="updateService">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                                    <input id="name" type="text" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('name') }}" wire:model.defer="name" required autocomplete="name">
                                    <!-- Input error message -->
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                                    <input id="description" type="text" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('description') }}" wire:model.defer="description" required autocomplete="description">
                                    <!-- Input error message -->
                                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="unit" class="block text-sm font-medium text-gray-700 dark:text-white">Unit</label>
                                    <input id="unit" type="text" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('unit') }}" wire:model.defer="unit" required autocomplete="unit">
                                    <!-- Input error message -->
                                    @error('unit') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-white">Price</label>
                                    <input id="price" type="number" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" value="{{ old('price') }}" wire:model.defer="price" required autocomplete="price">
                                    <!-- Input error message -->
                                    @error('price') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>

                                <button wire:navigate href="/services" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Service</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
