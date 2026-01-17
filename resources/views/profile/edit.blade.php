<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocBoost+ | Profile</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="selection:bg-accent-pink/20 flex min-h-screen bg-light-bg font-sans">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-sidebar text-white flex flex-col fixed inset-y-0 left-0 z-50">
        <div class="p-6 border-b border-white/10">
            @if(auth()->user()->role === 'admin')
                <span class="text-xl font-bold tracking-tighter">SocBoost<span class="text-accent-pink">+</span> <span class="text-[10px] font-medium opacity-50 ml-1">ADMIN</span></span>
            @else
                <span class="text-xl font-bold tracking-tighter">SocBoost<span class="text-accent-pink">+</span></span>
            @endif
        </div>
        <nav class="flex-1 p-4 space-y-1">
            @if(auth()->user()->role === 'admin')
                {{-- Admin Navigation --}}
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all group">
                    <span class="material-symbols-outlined text-xl">inventory_2</span>
                    Order Management
                </a>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all group">
                    <span class="material-symbols-outlined text-xl">category</span>
                    Product Management
                </a>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all group">
                    <span class="material-symbols-outlined text-xl">local_offer</span>
                    Exclusive Offers
                </a>
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium text-white/60 hover:text-white hover:bg-white/5 transition-all group">
                    <span class="material-symbols-outlined text-xl">chat</span>
                    Support Chat
                </a>
            @else
                {{-- User Navigation --}}
                <a href="{{ route('dashboard') }}" 
                   class="text-white/60 hover:text-white hover:bg-white/5 flex items-center gap-3 px-4 py-3 rounded-lg transition-all group">
                    <span class="material-symbols-outlined text-xl">list_alt</span>
                    My Orders
                </a>
                <a href="{{ route('landing') }}" 
                   class="text-white/60 hover:text-white hover:bg-white/5 flex items-center gap-3 px-4 py-3 rounded-lg transition-all group">
                    <span class="material-symbols-outlined text-xl">add_circle</span>
                    New Order
                </a>
            @endif
        </nav>
        <div class="p-4 border-t border-white/10" x-data="{ open: false }">
            <div class="relative">
                <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-3 px-4 py-3 w-full text-left rounded-lg hover:bg-white/5 transition-all group">
                    <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-xs font-bold text-white">{{ substr(auth()->user()->name, 0, 2) }}</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate text-white">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] text-white/40 truncate">{{ auth()->user()->email }}</p>
                    </div>
                    <span class="material-symbols-outlined text-white/40 text-sm group-hover:text-white transition-colors" :class="{'rotate-180': open}">expand_less</span>
                </button>

                <!-- Dropdown -->
                <div x-show="open" 
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 translate-y-2"
                     class="absolute bottom-full left-0 mb-2 w-full bg-gray-900 border border-gray-700 rounded-xl shadow-xl overflow-hidden z-20"
                     style="display: none;">
                    
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-3 text-sm text-gray-300 hover:bg-white/5 hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-lg">person_edit</span>
                        Edit Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center gap-3 px-4 py-3 w-full text-left text-sm text-red-400 hover:bg-white/5 hover:text-red-300 transition-colors">
                            <span class="material-symbols-outlined text-lg">logout</span>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 ml-64 min-h-screen flex flex-col">
        <header class="h-16 border-b border-gray-100 flex items-center justify-between px-8 bg-white sticky top-0 z-40">
            <h1 class="text-sm font-bold text-text-charcoal uppercase tracking-widest">Profile Settings</h1>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-text-muted">
                    <span class="material-symbols-outlined text-lg">schedule</span>
                    <span class="text-xs font-semibold">{{ now()->format('M d, H:i A') }}</span>
                </div>
            </div>
        </header>

        <div class="p-8 space-y-8 flex-1">
            <div class="max-w-7xl mx-auto space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border border-gray-100">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border border-gray-100">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg border border-gray-100">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>
