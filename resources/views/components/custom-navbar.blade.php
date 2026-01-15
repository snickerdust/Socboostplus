<nav class="fixed top-0 left-0 right-0 z-50 backdrop-blur-xl border-b border-slate-200/50 bg-white/70">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <a href="{{ route('landing') }}" class="text-xl font-bold tracking-tighter text-black">SocBoost<span class="text-accent-pink">+</span></a>
        </div>
        <div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.facebook') }}">Facebook</a>
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.instagram') }}">Instagram</a>
            <a class="hover:text-primary transition-colors cursor-pointer" href="{{ route('products.tiktok') }}">Tiktok</a>
        </div>
        <div class="flex items-center gap-4">
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
    </div>
</nav>
