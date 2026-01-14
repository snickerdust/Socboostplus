<x-landing-layout>

    {{-- CUSTOM STYLES --}}
    <style>
        .tab-btn.active {
            background-color: #4f46e5;
            color: white;
            border-color: #4f46e5;
        }
        .product-section {
            display: none;
            animation: fadeIn 0.5s;
        }
        .product-section.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        [x-cloak] { display: none !important; }
    </style>

    {{-- NAVBAR --}}
    <nav class="fixed w-full z-50 transition-all duration-300 bg-gray-900/80 backdrop-blur-md border-b border-gray-800">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img src="/img/logo.png" alt="SocBoost Logo" class="h-10 w-auto">
                {{-- <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-pink-600">SocBoost</span> --}}
            </div>

            <div class="hidden md:flex items-center gap-8 text-gray-300 font-medium">
                <a href="#" class="hover:text-white transition">Home</a>
                <a href="#features" class="hover:text-white transition">Why Us</a>
                <a href="#pricing" class="hover:text-white transition">Pricing</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="relative z-50 px-5 py-2.5 rounded-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-medium">Log in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 rounded-full bg-white text-gray-900 hover:bg-gray-100 font-bold transition">
                        Sign up
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- HERO --}}
    <section class="relative bg-gray-900 text-white overflow-hidden pt-20">
        <div class="absolute inset-0 bg-gradient-to-br from-purple-900/50 to-indigo-900/50 opacity-80"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        
        <div class="relative max-w-7xl mx-auto px-6 py-32 grid md:grid-cols-2 gap-12 items-center">
            <div>
                <span class="inline-block py-1 px-3 rounded-full bg-purple-500/20 border border-purple-400/30 text-purple-300 text-sm font-semibold mb-6">
                    🚀 #1 Social Media Growth Service
                </span>
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight tracking-tight">
                    Skyrocket Your <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-pink-400 to-purple-400">Social Presence</span>
                </h1>
                <p class="mt-6 text-xl text-gray-300 leading-relaxed max-w-lg">
                    Real followers, genuine likes, and instant views. Verified expansion for your Instagram, TikTok, and Facebook.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#pricing"
                       class="inline-flex items-center px-8 py-4 rounded-full bg-white text-indigo-900 font-bold hover:bg-gray-100 transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Get Started
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                    <a href="#features" class="inline-flex items-center px-8 py-4 rounded-full border border-gray-500 hover:bg-gray-800 text-white font-medium transition">
                        How it works
                    </a>
                </div>
            </div>

            <div class="hidden md:block relative">
                <div class="absolute top-0 right-0 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
                <div class="absolute bottom-0 left-0 w-72 h-72 bg-pink-500 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
                
                {{-- Mockup --}}
                <div class="relative z-10 bg-gray-800/80 backdrop-blur-xl border border-gray-700/50 rounded-3xl p-6 shadow-2xl transform rotate-3 hover:rotate-0 transition duration-500">
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-pink-500 to-orange-400"></div>
                            <div class="space-y-2">
                                <div class="h-4 w-32 bg-gray-600 rounded"></div>
                                <div class="h-3 w-20 bg-gray-700 rounded"></div>
                            </div>
                        </div>
                        <div class="h-32 bg-gray-700/50 rounded-xl"></div>
                        <div class="flex gap-4">
                            <div class="h-8 w-20 bg-gray-700/50 rounded-lg"></div>
                            <div class="h-8 w-20 bg-gray-700/50 rounded-lg"></div>
                        </div>
                    </div>
                    
                    {{-- Floating Stats --}}
                    <div class="absolute -right-8 top-10 bg-white text-gray-900 p-4 rounded-xl shadow-xl animate-bounce">
                        <div class="text-xs font-bold text-gray-500">New Followers</div>
                        <div class="text-2xl font-bold text-green-600">+1,240 🚀</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURES / UPSELL INFO --}}
    <section id="features" class="py-24 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-gray-900 dark:text-white mb-16">Why Premium Matters</h2>
            
            <div class="grid md:grid-cols-3 gap-8">
                {{-- Quality --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900 rounded-lg text-indigo-600 dark:text-indigo-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Quality</h3>
                    </div>
                    
                    <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 h-40">
                        <h4 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">Essential</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Standard mix. Good for casual use. Normal retention.</p>
                    </div>

                    <div class="relative bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 p-6 rounded-2xl border border-indigo-200 dark:border-indigo-700/50 h-40">
                        <div class="absolute -top-3 -right-3 bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">RECOMMENDED</div>
                        <h4 class="font-bold text-lg mb-2 text-indigo-700 dark:text-indigo-300">Pro (+$15)</h4>
                        <p class="text-sm text-gray-700 dark:text-gray-300">High retention, real-looking profiles. Best for brands.</p>
                    </div>
                </div>

                {{-- Speed --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-pink-100 dark:bg-pink-900 rounded-lg text-pink-600 dark:text-pink-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Speed</h3>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl border border-gray-100 dark:border-gray-700 h-40">
                        <h4 class="font-bold text-lg mb-2 text-gray-800 dark:text-gray-200">Standard</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Starts in 1-72 hours. Normal queue.</p>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl border border-pink-200 dark:border-pink-700/50 h-40">
                        <h4 class="font-bold text-lg mb-2 text-pink-700 dark:text-pink-400">Priority (+$10)</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Starts in 1-3 hours. Instant handling.</p>
                    </div>
                </div>

                {{-- Protection --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg text-green-600 dark:text-green-400">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Protection</h3>
                    </div>

                    <div class="h-full bg-gray-50 dark:bg-gray-700/50 p-6 rounded-2xl border border-green-200 dark:border-green-700/50 flex flex-col justify-center">
                        <h4 class="font-bold text-lg mb-2 text-green-700 dark:text-green-400">30-Day Refill (+$5)</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Auto-refill if any followers drop within 30 days.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- PRICING SECTION --}}
    <section id="pricing" class="py-24 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">Choose Your Growth Package</h2>
                <p class="text-gray-600 dark:text-gray-400">Instant delivery. No password required. 24/7 Support.</p>
            </div>

            {{-- Platform Tabs --}}
            <div class="flex justify-center mb-12 gap-4 flex-wrap">
                @foreach($products as $platform => $categories)
                    <button onclick="switchTab('{{ $platform }}')" 
                            id="btn-{{ $platform }}"
                            class="tab-btn px-8 py-3 rounded-full border border-gray-200 dark:border-gray-700 font-semibold text-gray-600 dark:text-gray-300 hover:bg-indigo-50 dark:hover:bg-gray-800 transition capitalize flex items-center gap-2 {{ $loop->first ? 'active' : '' }}">
                        @if($platform == 'instagram')
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @elseif($platform == 'tiktok')
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.14c0 3.48-2.81 6.31-6.29 6.31-3.47 0-6.29-2.83-6.29-6.31 0-3.48 2.82-6.31 6.29-6.31 1.28 0 2.5.4 3.53 1.12v4.2c-.44-.24-.93-.37-1.43-.37-1.76 0-3.19 1.44-3.19 3.21s1.43 3.2 3.19 3.2c1.76 0 3.19-1.44 3.19-3.21v-16.2c-1.02.04-2.03.04-3.05.04z"/></svg>
                        @elseif($platform == 'facebook')
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                        @endif
                        {{ ucfirst($platform) }}
                    </button>
                @endforeach
            </div>

            {{-- Product Sections --}}
            @foreach($products as $platform => $categories)
                <div id="content-{{ $platform }}" class="product-section {{ $loop->first ? 'active' : '' }}">
                    @foreach($categories as $categoryType => $items)
                        <div class="mb-16" x-data="{ tier: 'high-quality' }">
                            <div class="flex flex-col md:flex-row items-center justify-between mb-8 border-l-4 border-indigo-500 pl-4">
                                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-200 capitalize">
                                    {{ str_replace('_', ' ', $categoryType) }}
                                </h3>
                                
                                {{-- Twicsy-Style Tier Tabs --}}
                                <div class="bg-gray-100 dark:bg-gray-700 p-1 rounded-lg flex items-center gap-1 mt-4 md:mt-0">
                                    <button @click="tier = 'high-quality'" 
                                            :class="{'bg-white dark:bg-gray-800 shadow text-indigo-600 dark:text-white': tier === 'high-quality', 'text-gray-500 dark:text-gray-400 hover:text-gray-700': tier !== 'high-quality'}"
                                            class="px-4 py-2 rounded-md text-sm font-bold transition flex items-center gap-2">
                                        <span>High Quality</span>
                                    </button>
                                    <button @click="tier = 'premium'" 
                                            :class="{'bg-white dark:bg-gray-800 shadow text-indigo-600 dark:text-white': tier === 'premium', 'text-gray-500 dark:text-gray-400 hover:text-gray-700': tier !== 'premium'}"
                                            class="px-4 py-2 rounded-md text-sm font-bold transition flex items-center gap-2">
                                        <span>Premium</span>
                                        <span class="bg-indigo-100 text-indigo-700 text-[10px] px-1.5 py-0.5 rounded-full uppercase tracking-wider">Start</span>
                                    </button>
                                </div>
                            </div>

                            <p class="text-gray-500 dark:text-gray-400 mb-6" x-show="tier === 'high-quality'">
                                <span class="font-bold text-indigo-500">High Quality:</span> Real profiles, standard retention. Great for boosting numbers.
                            </p>
                            <p class="text-gray-500 dark:text-gray-400 mb-6" x-show="tier === 'premium'" style="display: none;">
                                <span class="font-bold text-indigo-500">Premium:</span> Active users, zero drop rate, 30-day refill. Best for growth.
                            </p>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                                @foreach($items as $item)
                                    <div x-data="{ 
                                            // Dynamic price based on parent tier
                                            get currentPrice() {
                                                let base = {{ $item['price'] }};
                                                return this.tier === 'premium' ? (base + 15).toFixed(2) : base.toFixed(2);
                                            },
                                            get discountPrice() {
                                                let p = parseFloat(this.currentPrice);
                                                return (p * 1.4).toFixed(2); // Fake 40% markup for strikethrough
                                            }
                                         }" 
                                         class="group relative bg-white dark:bg-gray-800 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col">
                                        
                                        <div class="absolute top-0 right-0 bg-gradient-to-l from-indigo-500 to-purple-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg z-10 shadow-md">
                                            BEST VAL
                                        </div>

                                        <div class="p-6 flex-grow text-center">
                                            <div class="w-12 h-12 mx-auto bg-indigo-50 dark:bg-indigo-900/30 rounded-full flex items-center justify-center text-indigo-600 dark:text-indigo-400 mb-4 transition group-hover:scale-110 duration-300">
                                                @if(Str::contains($platform, 'instagram')) 📸 
                                                @elseif(Str::contains($platform, 'tiktok')) 🎵 
                                                @else 📘 @endif
                                            </div>
                                            
                                            <h4 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-1 tracking-tight">
                                                {{ number_format($item['quantity']) }}
                                            </h4>
                                            <p class="text-gray-500 dark:text-gray-400 font-medium capitalize text-sm mb-4">
                                                {{ str_replace('_', ' ', $categoryType) }}
                                            </p>
                                        </div>

                                        <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700/50 border-t border-gray-100 dark:border-gray-700">
                                            <div class="flex items-center justify-center gap-3 mb-4">
                                                <span class="text-3xl font-bold text-gray-900 dark:text-white" x-text="'$' + currentPrice"></span>
                                                <span class="text-sm text-gray-400 line-through" x-text="'$' + discountPrice"></span>
                                            </div>
                                            
                                            <a :href="'{{ route('checkout', ['id' => $platform.'-'.$categoryType.'-'.$loop->index]) }}' + '?upsell_quality=' + (tier === 'premium' ? 'pro' : 'essential')" 
                                               class="block w-full text-center py-3 px-4 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-bold transition duration-200 shadow-md hover:shadow-lg transform active:scale-95">
                                                Buy Now ⚡
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    {{-- SCRIPTS --}}
    <script>
        function switchTab(platform) {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.getElementById('btn-' + platform).classList.add('active');
            
            document.querySelectorAll('.product-section').forEach(section => section.classList.remove('active'));
            document.getElementById('content-' + platform).classList.add('active');
        }
    </script>

</x-landing-layout>
