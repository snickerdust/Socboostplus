<nav x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 z-50 backdrop-blur-xl border-b border-slate-200/50 bg-white/70">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="{{ route('landing') }}" class="text-xl font-bold tracking-tighter text-black">SocBoost<span class="text-accent-pink">+</span></a>
        </div>
        
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.facebook') }}">Facebook</a>
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.instagram') }}">Instagram</a>
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.tiktok') }}">Tiktok</a>
        </div>

        <!-- Desktop Auth -->
        <div class="hidden md:flex items-center gap-4">
            @auth
                <a href="{{ route('dashboard') }}" class="bg-primary text-white px-5 py-2 rounded-full text-sm font-semibold hover:opacity-90 transition-opacity">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-slate-600 hover:text-primary font-medium">Log in</a>
                <a href="{{ route('register') }}" class="bg-primary text-white px-5 py-2 rounded-full text-sm font-semibold hover:opacity-90 transition-opacity">
                    Sign up
                </a>
            @endauth
        </div>

        <!-- Mobile Menu Button -->
        <div class="md:hidden flex items-center">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-600 hover:text-primary focus:outline-none transition-colors">
                <span class="material-symbols-outlined text-3xl" x-show="!mobileMenuOpen">menu</span>
                <span class="material-symbols-outlined text-3xl" x-show="mobileMenuOpen" style="display: none;">close</span>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Dropdown -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.away="mobileMenuOpen = false"
         class="md:hidden absolute top-16 left-0 right-0 bg-white/95 backdrop-blur-xl border-b border-slate-200/50 shadow-lg"
         style="display: none;">
        <div class="flex flex-col p-6 gap-4">
            <a class="text-base font-medium text-slate-600 hover:text-primary transition-colors py-2 border-b border-slate-100" href="{{ route('products.facebook') }}">Facebook</a>
            <a class="text-base font-medium text-slate-600 hover:text-primary transition-colors py-2 border-b border-slate-100" href="{{ route('products.instagram') }}">Instagram</a>
            <a class="text-base font-medium text-slate-600 hover:text-primary transition-colors py-2 border-b border-slate-100" href="{{ route('products.tiktok') }}">Tiktok</a>
            
            <div class="flex flex-col gap-3 mt-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-white px-5 py-3 rounded-xl text-center text-sm font-bold hover:opacity-90 transition-opacity">
                        Go to Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 hover:text-primary font-medium text-center py-2">Log in</a>
                    <a href="{{ route('register') }}" class="bg-primary text-white px-5 py-3 rounded-xl text-center text-sm font-bold hover:opacity-90 transition-opacity">
                        Sign up
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
