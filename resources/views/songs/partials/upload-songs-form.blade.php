<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Upload Song') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Once your account is uploaded, all of its resources can be deleted later.') }}
        </p>
    </header>

    <form method="post" action="{{ route('song.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div>
            {{-- <x-input-label for="song" :value="__('Song')" />
            <x-text-input id="song" name="file" type="file" class="mt-1 block w-full" enctype required />
            <x-input-error class="mt-2" :messages="$errors->get('song')" /> --}}
            <input type="file" name="files[]" multiple />
        </div>
        <div class="flex items-center">
            <x-primary-button>{{__('Upload')}}</x-primary-button>
        </div>
    </form>
</section>
