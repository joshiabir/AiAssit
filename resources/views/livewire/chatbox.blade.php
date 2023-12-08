<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col h-screen sm:h-[88vh]">
    <div
        class="flex sm:items-center justify-between py-3 px-4 sm:px-0 fixed w-screen sm:relative dark:bg-stone-800 dark:text-white text-gray-700 sm:w-auto">
        <div class="relative flex items-center space-x-4">
            <div class="relative">

                <div class="w-10 sm:w-16 h-10 sm:h-16 rounded-full"
                    style="background-image:url('https://pbs.twimg.com/profile_images/1350646854296477701/oJ09MBbD_400x400.jpg');
                background-size: contain;background-repeat: no-repeat;background-position-x: center;background-position-y: center;">
                </div>

            </div>
            <div class="flex flex-col leading-tight">
                <div class="text-lg sm:text-2xl mt-1 flex items-center">
                    <span class="text-gray-700 mr-3 dark:text-white">Donna Paulsen</span>
                </div>
                <span class="text-sm text-gray-600 dark:text-white">Goddess of Assistance</span>
            </div>
        </div>
        <div class="flex">

        </div>
        <div class="flex items-center space-x-2">
            <div class="hidden sm:flex sm:items-center sm:ms-6 ">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-gray-300 dark:bg-stone-600 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>

                                    <!-- Team Settings -->
                                    <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-dropdown-link>
                                    @endcan

                                    <!-- Team Switcher -->
                                    @if (Auth::user()->allTeams()->count() > 1)
                                        <div class="border-t border-gray-200"></div>

                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Switch Teams') }}
                                        </div>

                                        @foreach (Auth::user()->allTeams() as $team)
                                            <x-switchable-team :team="$team" />
                                        @endforeach
                                    @endif
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="ms-3 relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-md leading-4 font-medium rounded-md text-gray-500 bg-gray-300 dark:bg-stone-600 dark:text-gray-100 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-dropdown-link>
                            @endif

                            <div class="border-t border-gray-200"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
            <button id="theme-toggle" type="button"
                class="bg-gray-300 dark:bg-stone-600 text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div id="messages"
        class="flex flex-col space-y-4 p-3 overflow-y-scroll scrollbar-thumb-blue scrollbar-thumb-rounded scrollbar-track-blue-lighter scrollbar-w-2 scrolling-touch mt-24 sm:mt-0">
        @if ($datas != '')
            @foreach ($datas as $data)
                @if ($data->role == 'assistant')
                    @foreach ($data->content as $content)
                        <div class="chat-message">
                            <div class="flex items-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-lg mx-2 order-2 items-start">
                                    <div><span
                                            class="px-4 py-2 rounded-xl inline-block rounded-full bg-stone-300 text-gray-800 dark:bg-stone-900 dark:text-white text-lg sm:text-lg">{{ $content->text->value }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach ($data->content as $content)
                        <div class="chat-message">
                            <div class="flex items-end justify-end">
                                <div class="flex flex-col space-y-2 text-xs max-w-lg mx-2 order-1 items-end">
                                    <div><span
                                            class="px-4 py-2 rounded-xl inline-block rounded-br-none bg-blue-600 text-white text-lg sm:text-lg">
                                            {{ $content->text->value }}</span></div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @endif
        <div class="py-4 mt-2 mb-2">
            <div class="chat-message" wire:loading>
                <div class="flex items-end">
                    <div class="flex items-center space-y-2 text-xs max-w-lg mx-2 order-2">
                        <div role="status">
                            <svg aria-hidden="true"
                                class="w-4 h-4 me-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="text-gray-800 dark:text-white text-lg">Typing...</div>
                    </div>
                </div>
            </div>
            @if ($status != 'completed' && $status != '')

                <div class="chat-message">
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-2 text-xs max-w-lg mx-2 order-2 items-start">
                            <div class="text-gray-800 dark:text-white text-lg">Typing...</div>
                        </div>
                    </div>
                </div>
                <button type="button" wire:click="$commit" id="status_update"></button>
                @script
                    <script>
                        setTimeout(function() {
                            document.getElementById('status_update').click();
                        }, 100);
                        console.log('did this');
                    </script>
                @endscript
            @endif
        </div>
        <div class="py-8">

        </div>

    </div>
    <div class="fixed bottom-8 left-4 w-[90vw] sm:static sm:w-full">
        <form wire:submit.prevent="send" class="flex">
            <input type="text" placeholder="Talk to Donna..."
                class="w-full border-0 shadow-xl   text-gray-600 placeholder-gray-600 dark:placeholder-gray-50 pl-4 bg-gray-200 dark:bg-stone-600 dark:text-white rounded-full py-3"
                wire:loading.class="disabled" wire:model="message">
            <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                <button type="submit"
                    class="hidden inline-flex items-center justify-center rounded-full px-4 py-3 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none"
                    wire:loading.class="opacity-50" wire:submit="send">
                    <span class="font-bold" wire:loading.remove>Send</span>
                    <span class="font-bold" wire:loading>
                        Sent
                    </span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="h-6 w-6 ml-2 transform rotate-90">
                        <path
                            d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z">
                        </path>
                    </svg>
                </button>
            </div>

    </div>
    </form>
</div>
@script
    <script>
        const el = document.getElementById('messages')
        el.scrollTop = el.scrollHeight
    </script>
@endscript
</div>
