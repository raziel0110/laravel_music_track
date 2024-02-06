<x-app-layout>
    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-between items-center">
                <div class="max-w-xl">
                    @include('playlists.partials.playlists')
                </div>
                <div>
                    <x-primary-button x-data="" @click.prevent="$dispatch('open-modal', 'create-playlist')">{{__('New Playlist')}}</x-primary-button>
                    <x-modal name="create-playlist" focusable>

                        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                            @csrf

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Create new playlist.') }}
                            </h2>

                            <div class="mt-3">
                                <x-input-label for="playlist-name" :value="__('Name')" />
                                <x-text-input id="playlist-name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </form>


                        <div class="mt-6 mb-6 px-6 flex justify-end">
                            <x-secondary-button x-on:click="$dispatch('close')">
                                {{ __('Cancel') }}
                            </x-secondary-button>

                            <x-primary-button class="ms-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </x-modal>
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-3">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl" >

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
