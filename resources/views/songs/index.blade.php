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
                        <div class="mt-1 flex">
                            <p>{{ $song->name }}</p>
                            <button @click="handlePlayClick" x-data="{isPlaying:false}" class="text-center">
                                <template x-if="!isPlaying">
                                    <x-heroicon-s-play-circle class="w-6 h-6"/>
                                </template>
                                <template x-if="isPlaying">
                                    <x-heroicon-s-pause-circle class="w-6 h-6"/>
                                </template>
                                <audio x-ref="sing">
                                    <source src="{{asset('/songs/'.$song->name)}}" type="audio/mpeg">
                                </audio>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function handlePlayClick(e){
        const song = this.$refs.sing
        if (this.isPlaying) {
            song.pause();
            this.isPlaying = false;
        } else {
            song.play();
            this.isPlaying = true;
        }

    }
</script>
