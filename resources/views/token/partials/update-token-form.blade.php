<section>
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
        {{ __('Token For Mobile Application') }}
    </h2>

    @if ($user->token)
        <form method="post" action="{{ route('token.update') }}" class="mt-6 space-y-6">
            @csrf

            <div>
                <x-input-label for="Token" :value="__('Token')" />
                <x-text-input id="token" name="Token" type="text" disabled class="mt-1 block w-full" :value="old('token', $user->token)" required autofocus autocomplete="token" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{__('Generate Token')}}</x-primary-button>
                @if (session('status') === 'token-updated')
                    <p
                        x-data="{show: true}"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >
                    {{__('Token Generated')}}
                    </p>
                @endif
            </div>
        </form>
    @else
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{ __("The token needs to be generated!") }}
        </p>
        <div class="flex items-center gap-4 mt-3">
            <form method="post" action="{{route('token.update')}}">
                @csrf
                {{-- @method('PUT') --}}

                <x-primary-button>{{__('Generate Token')}}</x-primary-button>
                @if (session('status') === 'token-updated')
                    <p
                        x-data="{show: true}"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >
                    {{__('Token Generated')}}
                    </p>
                @endif
            </form>
        </div>
    @endif
</section>
