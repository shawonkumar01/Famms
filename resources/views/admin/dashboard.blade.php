<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium mb-4">Admin Controls</h3>
                    <div class="space-y-4">
                        <div class="p-4 bg-blue-50 rounded-lg">
                            <h4 class="font-medium text-blue-800">User Management</h4>
                            <p class="text-sm text-blue-600 mt-1">Manage all registered users</p>
                        </div>
                        <div class="p-4 bg-green-50 rounded-lg">
                            <h4 class="font-medium text-green-800">System Settings</h4>
                            <p class="text-sm text-green-600 mt-1">Configure application settings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>