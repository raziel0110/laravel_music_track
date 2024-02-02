<x-app-layout>
    <div class="py-12 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('songs.partials.upload-songs-form')
                </div>
            </div>
        </div>
    </div>

    <div class="py-3 h-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <p>Song List</p>
                    @foreach ($songs as $song )
                        <div>
                            {{ $song->name }}
                            {{-- {{ url(asset('/songs/'.$song->name))}} --}}
                            <audio controls>
                                <source src="{{asset('/songs/'.$song->name)}}" type="audio/mpeg">
                            </audio>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
