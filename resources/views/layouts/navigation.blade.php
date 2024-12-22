<nav x-data="{ open: false }" class="bg-black dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="">
                    <p class="text-2xl font-bold text-white">LENS CLOSET</p>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="shrink-0 flex items-center space-x-4 ml-auto">
                @if(Auth::check())
                    <a href="{{ route('mylens') }}" class="text-white bg-black px-2 py-2 rounded-full hover:text-gray-500 hidden sm:inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-1">
                        <path d="M11.25 4.533A9.707 9.707 0 0 0 6 3a9.735 9.735 0 0 0-3.25.555.75.75 0 0 0-.5.707v14.25a.75.75 0 0 0 1 .707A8.237 8.237 0 0 1 6 18.75c1.995 0 3.823.707 5.25 1.886V4.533ZM12.75 20.636A8.214 8.214 0 0 1 18 18.75c.966 0 1.89.166 2.75.47a.75.75 0 0 0 1-.708V4.262a.75.75 0 0 0-.5-.707A9.735 9.735 0 0 0 18 3a9.707 9.707 0 0 0-5.25 1.533v16.103Z" />
                        </svg>
                        マイリスト
                    </a>
                    <a href="{{ route('repeat') }}" class="text-white bg-black px-2 py-2 rounded-full hover:text-gray-500 hidden sm:inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-1">
                            <path d="m11.645 20.91-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z" />
                        </svg>
                        お気に入り
                        </a>
                    <a href="{{ route('create') }}" class="text-white bg-black px-2 py-2 rounded-full hover:text-gray-500 hidden sm:inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5 mr-1">
                            <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                        </svg>
                        登録
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-black text-white px-2 py-2 hover:text-gray-500 mr-4">{{ __('ログイン') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-black text-white px-2 py-2 hover:text-gray-500 space-x-4">{{ __('会員登録') }}</a>
                    @endif
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 ml-auto">
                @if(Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            {{-- ログインユーザー名のボタン --}}
                            <button class="inline-flex items-center px-2 py-2 border border-transparent leading-4 text-white dark:text-gray-400 bg-black dark:bg-gray-800 hover:text-gray-500 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                                {{-- ログインユーザー名右横のマーク --}}
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        {{-- プルダウン内のメニュー --}}
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                @if(Auth::check())
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400  dark:hover:bg-gray-900  dark:focus:bg-gray-900  dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            {{-- ハンバーガーアイコン --}}
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            {{-- 閉じるアイコン --}}
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    @if(Auth::check())
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('mylens')" :active="request()->routeIs('mylens')">
                    {{ __('MyLens') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-white dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1 border-t border-gray-200 dark:border-gray-600">
                    <x-responsive-nav-link :href="route('mylens')" class="font-medium text-sm text-white">
                        {{ __('マイリスト') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('repeat')" class="font-medium text-sm text-white">
                        {{ __('お気に入り') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('create')" class="font-medium text-sm text-white">
                        {{ __('登録') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('profile.edit')" class="font-medium text-sm text-white">
                        {{ __('プロフィール') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" class="font-medium text-sm text-white"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('ログアウト') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    @endif
</nav>
