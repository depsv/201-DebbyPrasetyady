<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Master Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">
                        <h1 class="text-2xl font-medium text-gray-900 dark:text-white">Add New User</h1>
                        <div class="mt-4">
                            <form wire:submit.prevent="addUser">
                                @csrf
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                                    <input id="name" type="text" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" wire:model.defer="name" required autocomplete="name">
                                    <!-- Input error message -->
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                                    <input id="email" type="email" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" wire:model.defer="email" required autocomplete="email">
                                    <!-- Input error message -->
                                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-white">Password</label>
                                    <input id="password" type="password" class="mt-1 block w-full rounded-md shadow-sm dark:bg-gray-700 dark:text-white" wire:model.defer="password" required autocomplete="new-password">
                                    <!-- Input error message -->
                                    @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-4">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox" wire:model.defer="isAdmin">
                                        <span class="ml-2 text-sm text-gray-700 dark:text-white">Is Admin</span>
                                    </label>
                                </div>

                                <button wire:navigate href="/users" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Back</button>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add User</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
