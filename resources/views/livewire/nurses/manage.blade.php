<x-theme-modal maxWidth="md" wire:model="show" wireAction="submit">
    <x-slot name="title">
        @if($this->editing)
            @lang('Edit Nurse')
        @else
            @lang('Create Nurse')
        @endif
    </x-slot>

    <div class="space-y-4 lg:space-y-6">
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <label class="mb-1 md:mb-0 md:py-2.5 flex-shrink-0 w-full md:w-40 lg:w-52 xl:w-56 xl:w-64">
                {{ __('Name') }}<span class="text-red-500">*</span>
            </label>
            <div class="w-full flex-grow md:pl-6 p-2">
                <x-jet-input type="text"
                             wire:model.defer="model.first_name"
                             placeholder="{{ __('Name') }}"
                             class="w-full"></x-jet-input>
                <x-jet-input-error for="model.first_name" class="mt-1"/>
            </div>

            <div class="w-full flex-grow md:pl-6 p-2">
                <x-jet-input type="text"
                             wire:model.defer="model.last_name"
                             placeholder="{{ __('1st last name') }}"
                             class="w-full"></x-jet-input>
                <x-jet-input-error for="model.last_name" class="mt-1"/>
            </div>

            <div class="w-full flex-grow md:pl-6 p-2">
                <x-jet-input type="text"
                             wire:model.defer="model.last_name2"
                             placeholder="{{ __('2nd last name') }}"
                             class="w-full"></x-jet-input>
                <x-jet-input-error for="model.last_name2" class="mt-1"/>
            </div>
        </div>
        <div class="flex flex-col md:flex-row items-center md:items-start">
            <label for="name"
                   class="mb-1 md:mb-0 md:py-2.5 flex-shrink-0 w-full md:w-40 lg:w-52 xl:w-56 xl:w-64">
                {{ __('Cel. Phone') }}<span class="text-red-500">*</span>
            </label>
            <div class="w-full flex-grow md:pl-6 xl:pl-0">
                <x-jet-input wire:model.defer="model.profile.country_code"
                             type="text"
                             placeholder="{{ __('Country Code') }}"
                             class="w-full">
                </x-jet-input>
                <x-jet-input-error for="model.profile.country_code" class="mt-1"/>
                <x-jet-input wire:model.defer="model.profile.phone"
                             type="text"
                             placeholder="{{ __('Phone') }}"
                             class="w-full">
                </x-jet-input>
                <x-jet-input-error for="model.profile.phone" class="mt-1"/>
            </div>
        </div>
    </div>

    <x-slot name="cancelbutton">
        {{ __('Cancel') }}
    </x-slot>
    <x-slot name="button">
        {{__('save')}}
    </x-slot>

</x-theme-modal>

