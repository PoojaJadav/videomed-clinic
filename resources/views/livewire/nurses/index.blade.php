<div>
    <div class="px-3">
        <div class="mt-4 ml-2">
            <div class="text-right">
                <x-jet-button wire:click="$emit('Nurses.Manage.create')"
                              class="md:px-6">
                    {{ __('Add Stuff') }}
                </x-jet-button>
            </div>
            <livewire:nurses.manage/>
        </div>
        @include('nurses.filters')

    </div>

    <div class="mt-8 py-6 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                <tr class="border-t border-gray-200">
                    <th wire:click="sortBy('first_name')"
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 tracking-wider flex">
                        <span class="lg:pl-2">{{ __('Name') }}</span>
                        <x-icons.sort/>
                    </th>
                    <th class="px-6 py-3 bg-gray-50 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium tracking-wider text-gray-500">
                        <span class="lg:pl-2">{{ __('Phone') }}</span>
                        <x-icons.sort/>
                    </th>
                    <th wire:click="sortBy('updated_at')"
                        class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 tracking-wider">
                        Last updated
                    </th>
                    <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 tracking-wider"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach($nurses as $nurse)
                    <tr>
                        <td class="px-6 py-3 max-w-0 w-2/4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="flex items-center space-x-3 lg:pl-2">
                                <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600"
                                     aria-hidden="true"></div>
                                <a href="{{ route('nurses.show', $nurse) }}" class="truncate hover:text-gray-600">
                                    {{ $nurse->name }}
                                </a>
                            </div>
                        </td>
                        <td class="px-6 py-3 max-w-0 w-2/4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <div class="flex items-center space-x-3 lg:pl-2">
                                {{ $nurse->profile->phoneNumber }}
                            </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                            {{ $nurse->updated_at->format('F d, Y') }}
                        </td>
                        <td class="px-6 py-3 whitespace-nowrap text-right text-sm font-medium">
                            <x-jet-button wire:click="$emit('Nurses.Manage.edit',{{ $nurse->id }})">
                                {{__('Edit')}}
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-8">
            {!! $nurses->links() !!}
        </div>
    </div>

</div>
