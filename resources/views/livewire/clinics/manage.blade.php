<form wire:submit.prevent="submit">

    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
               wire:model="photo"
               x-ref="photo"
               x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            "/>

        <x-jet-label for="photo" value="{{ __('Logo') }}"/>

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                 class="rounded-full h-20 w-20 object-cover">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview" style="display: none;">
            <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                  x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>

        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
            {{ __('Select A New Photo') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
        @endif

        <x-jet-input-error for="photo" class="mt-2"/>
    </div>

    <div class="grid gap-4">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="institution_name" value="{{ __('Institution Name') }}"/>
            <x-jet-input id="institution_name" type="text" class="mt-1 block w-full"
                         placeholder="{{ __('Institution Name') }}"
                         wire:model.defer="model.institution_name"/>
            <x-jet-input-error for="model.institution_name" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}"/>
            <x-jet-input id="address" type="text" class="mt-1 block w-full" placeholder="{{ __('Address') }}"
                         wire:model.defer="model.address"/>
            <x-jet-input-error for="model.address" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}"/>
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="model.email"
                         placeholder="{{ __('Email') }}"/>
            <x-jet-input-error for="model.email" class="mt-2"/>
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="department" value="{{ __('Department') }}"/>
            <x-jet-input id="department" type="text" class="mt-1 block w-full" wire:model.defer="model.department"
                         placeholder="{{ __('Department') }}"/>
            <x-jet-input-error for="model.department" class="mt-2"/>
        </div>
    </div>

    <div class="mt-4 flex items-center">
        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>

        <x-jet-action-message class="ml-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>
    </div>
</form>
