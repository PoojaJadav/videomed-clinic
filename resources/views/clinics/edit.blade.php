<x-app-layout>
    <!-- Page title & actions -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clinic info') }}
        </h2>
    </x-slot>

    <div class="px-4 py-4 sm:px-6">
        <livewire:clinics.manage :model="$clinic"/>
    </div>
</x-app-layout>
