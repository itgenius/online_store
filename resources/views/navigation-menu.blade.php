<nav x-data="{ open: false }" class="bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- Mobile menu button -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>

            <!-- Logo -->
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0">
                    <a href="{{ route('home') }}" class="text-white text-2xl font-semibold">MyStore</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden sm:block sm:ml-6">
                    <div class="flex space-x-4">
                        <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            Accueil
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                            Produits
                        </x-responsive-nav-link>

                        <x-responsive-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">
                            Contact
                        </x-responsive-nav-link>

                        @auth
                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ auth()->user()->name }}
                            </x-responsive-nav-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Déconnexion
                                </x-responsive-nav-link>
                            </form>
                        @else
                            <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                                Connexion
                            </x-responsive-nav-link>
                            <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                                Inscription
                            </x-responsive-nav-link>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="sm:hidden" x-show="open" @click.away="open = false">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                Accueil
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                Produits
            </x-responsive-nav-link>

            <x-responsive-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">
                Contact
            </x-responsive-nav-link>

            @auth
                <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ auth()->user()->name }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        Déconnexion
                    </x-responsive-nav-link>
                </form>
            @else
                <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                    Connexion
                </x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Inscription
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>
