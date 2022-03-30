<x-app-layout>
    <!-- Page title & actions -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nurses Personnel') }}
        </h2>
    </x-slot>

    <livewire:nurses.index/>
</x-app-layout>
