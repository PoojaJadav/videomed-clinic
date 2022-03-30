<div>
    <div class="py-6 px-3 sm:block">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 mb-3">
                <div>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
                             aria-hidden="true">
                            <x-icons.search class="mr-3"/>
                        </div>
                        <input type="text" wire:model="search" name="search" id="search"
                               class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-9 sm:text-sm border-gray-300 rounded-md"
                               placeholder="{{ __('Search') }}">
                    </div>
                </div>
                <div class="mt-4 ml-2">
                    <div class="text-right">
                        <x-jet-button wire:click="$emit('Nurses.Manage.create')"
                                      class="md:px-6">
                            + {{ __('Add Staff') }}
                        </x-jet-button>
                    </div>
                    <livewire:nurses.manage/>
                </div>
            </div>

            <div class="flex flex-col mt-2">
                <div class="align-middle min-w-full overflow-x-auto shadow overflow-hidden sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr class="border-t border-gray-200">
                            <th wire:click="sortBy('first_name')"
                                class="px-6 py-3 bg-gray-50 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium tracking-wider text-gray-500">
                                <span class="lg:pl-2">{{ __('Name') }}</span>
                                <x-icons.sort/>
                            </th>
                            <th wire:click="sortBy('email')"
                                class="px-6 py-3 bg-gray-50 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium tracking-wider text-gray-500">
                                <span class="lg:pl-2">{{__('Email')}}/{{ __('Cel. Phone') }}</span>
                                <x-icons.sort/>
                            </th>
                            <th wire:click="sortBy('updated_at')"
                                class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 tracking-wider">
                                {{ __('Last updated') }}
                                <x-icons.sort/>
                            </th>
                            <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 tracking-wider"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                        @foreach($nurses as $nurse)
                            <tr>
                                <td class="px-6 py-3 max-w-0 w-2/4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="flex items-center space-x-3 lg:pl-2">
                                        <a href="{{ route('nurses.show', $nurse) }}"
                                           class="truncate hover:text-gray-600">
                                            {{ $nurse->name }}
                                        </a>
                                    </div>
                                </td>
                                <td class="px-6 py-3 max-w-0 w-2/4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <div class="text-gray-900">{{ $nurse->email }}</div>
                                    <div class="text-gray-500">{{ optional($nurse->profile)->phoneNumber }}</div>
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
            </div>
            <div class="mt-4">
                {!! $nurses->links() !!}
            </div>
        </div>
    </div>
</div>
