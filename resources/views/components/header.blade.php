<header class="bg-white">
    <div class="mx-auto max-w-screen-2xl py-2">

        <div class="flex items-center justify-between h-16 px-4">
            <div>
                <a href="/" class="flex items-center gap-x-2">
                    <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    <i class="ti ti-brand-laravel text-4xl text-indigo-600"></i>
                    <span class="text-2xl font-black leading-none text-gray-900 select-none logo">Yappr<span
                            class="text-indigo-600">.</span></span>
                </a>
            </div>

            @guest
                <div class="space-x-4">
                    <x-button variant="secondary" :link="true" href="{{ route('login') }}">Log In</x-button>
                    <x-button variant="primary" :link="true" href="{{ route('register') }}">Sign Up</x-button>
                </div>
            @endguest

            @auth
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="64">
                        <x-slot:trigger>
                            <div class="flex px-3 items-center gap-x-4">
                                <img src="{{ asset(auth()->user()->avatar) }}" class="w-10 h-10 rounded-full" />
                                <p>{{ auth()->user()->name }}</p>
                                <i class="ti ti-chevron-down"></i>
                            </div>
                        </x-slot:trigger>

                        <x-slot:content>
                            <x-dropdown-link href="/profile/edit">
                                <i class="ti ti-user"></i>
                                User
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                @method('DELETE')

                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    <i class="ti ti-logout"></i>
                                    Log Out
                                </x-dropdown-link>
                            </form>
                        </x-slot:content>
                    </x-dropdown>
                </div>
                <button id="menu-toggle" class="inline-flex items-center px-3 py-2 cursor-pointer gap-x-2 sm:hidden">
                    <i id="icon-bars" class="ti ti-menu-2 text-3xl p-1 rounded sm:hidden"></i>
                    <i id="icon-close" class="ti ti-x text-3xl hidden bg-gray-100 p-1 rounded sm:block"></i>
                </button>
            @endauth
        </div>

        @auth
            <div id="menu" class="px-4 hidden sm:hidden">
                <div class="flex py-3 items-center gap-x-2 border-y border-gray-100">
                    <img src="{{ asset(auth()->user()->avatar) }}" class="w-12 h-12 rounded-full" />
                    <div>
                        <p>{{ auth()->user()->name }}</p>
                        <p class="text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div>
                    <a href="{{ route('profile') }}">Profile</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="cursor-pointer">Logout</button>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</header>

@pushOnce('scripts')
    <script>
        const toggleBtn = document.getElementById("menu-toggle");
        const menu = document.getElementById("menu");
        const iconBars = document.getElementById("icon-bars");
        const iconClose = document.getElementById("icon-close");

        toggleBtn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
            iconBars.classList.toggle("hidden");
            iconClose.classList.toggle("hidden");
        });
    </script>
@endpushOnce
