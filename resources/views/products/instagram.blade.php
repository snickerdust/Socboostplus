<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Buy Instagram Services | SocBoost+</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "ig-purple": "#833AB4",
                        "ig-pink": "#FD1D1D",
                        "ig-orange": "#F56040",
                        "ig-yellow": "#FCAF45",
                        "primary": "#FD1D1D",
                        "background-light": "#fdfaf9",
                        "background-dark": "#120d0b",
                    },
                    backgroundImage: {
                        'ig-gradient': 'linear-gradient(45deg, #833AB4, #FD1D1D, #FCAF45)',
                        'ig-gradient-text': 'linear-gradient(to right, #833AB4, #FD1D1D, #F56040)',
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .tactile-container {
            background: #ffffff;
            box-shadow: 
                inset 0 4px 8px rgba(0,0,0,0.05), 
                0 1px 0 rgba(255,255,255,0.05);
            border: 1px solid #e1e1e1;
        }
        .dark .tactile-container {
            background: #1a1a1a;
            border-color: #2a2a2a;
        }
        .tactile-segment {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .tactile-segment.active {
            background: linear-gradient(45deg, #833AB4, #FD1D1D, #FCAF45);
            box-shadow: 
                0 0 20px rgba(253, 29, 29, 0.3),
                inset 0 2px 2px rgba(255,255,255,0.2);
            color: white;
            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
        }
        .tactile-segment:not(.active):hover {
            background: #f5f5f5;
            color: black;
        }
        .dark .tactile-segment:not(.active):hover {
             background: #252525;
             color: white;
        }
        .gradient-text {
            background: linear-gradient(45deg, #833AB4, #FD1D1D, #FCAF45);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        details > summary {
            list-style: none;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark font-display text-[#181311] dark:text-white transition-colors duration-300">

<x-custom-navbar />

<main class="max-w-[1200px] mx-auto px-4 pb-12 pt-32 md:pt-40" x-data="{ activeTab: 'followers', quality: 'standard', selectedProduct: null }">
    <section class="mb-16">
        <div class="@container">
            <div class="flex flex-col gap-10 items-center text-center">
                
                <!-- FOLLOWERS HERO -->
                <div x-show="activeTab === 'followers'" class="contents">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-ig-pink/10 text-ig-pink text-xs font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm font-bold">verified</span>
                        Top Choice: 8.4K+ Influencers Grew This Week
                    </div>
                    <div class="max-w-[850px] space-y-6">
                        <h1 class="text-5xl md:text-7xl font-black leading-[1.1] tracking-tight text-zinc-900 dark:text-white">
                            Buy Instagram Followers That <span class="gradient-text">Build Authority</span>
                        </h1>
                        <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 font-medium leading-relaxed max-w-[750px] mx-auto">
                            SocBoost+’s Instagram followers give you the social proof needed to secure brand deals and grow your community organically.
                        </p>
                    </div>
                </div>

                <!-- LIKES HERO -->
                <div x-show="activeTab === 'likes'" class="contents" style="display: none;">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-ig-pink/10 text-ig-pink text-xs font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm font-bold">favorite</span>
                        Viral potential active: 1.2M+ daily likes delivered
                    </div>
                    <div class="max-w-[850px] space-y-6">
                        <h1 class="text-5xl md:text-7xl font-black leading-[1.1] tracking-tight text-zinc-900 dark:text-white">
                            Buy Instagram Likes That <span class="gradient-text">Spark Engagement</span>
                        </h1>
                        <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 font-medium leading-relaxed max-w-[750px] mx-auto">
                            Boost post credibility instantly. High like counts encourage real users to engage with your content.
                        </p>
                    </div>
                </div>

                <!-- REELS HERO -->
                <div x-show="activeTab === 'reels'" class="contents" style="display: none;">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-ig-pink/10 text-ig-pink text-xs font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm font-bold">play_circle</span>
                        Trending Now: 5M+ Reels Views Delivered Today
                    </div>
                    <div class="max-w-[850px] space-y-6">
                        <h1 class="text-5xl md:text-7xl font-black leading-[1.1] tracking-tight text-zinc-900 dark:text-white">
                            Buy Reels Views To <span class="gradient-text">Go Viral</span>
                        </h1>
                        <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 font-medium leading-relaxed max-w-[750px] mx-auto">
                            Push your Reels to the Explore page. High view counts trigger the algorithm to show your content to millions.
                        </p>
                    </div>
                </div>

                <!-- STORY HERO -->
                <div x-show="activeTab === 'story'" class="contents" style="display: none;">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-ig-pink/10 text-ig-pink text-xs font-black uppercase tracking-widest">
                        <span class="material-symbols-outlined text-sm font-bold">visibility</span>
                        Engagement Boost: 24h Delivery Guarantee
                    </div>
                    <div class="max-w-[850px] space-y-6">
                        <h1 class="text-5xl md:text-7xl font-black leading-[1.1] tracking-tight text-zinc-900 dark:text-white">
                            Buy Story Views For <span class="gradient-text">Active Visibility</span>
                        </h1>
                        <p class="text-lg md:text-xl text-zinc-600 dark:text-zinc-400 font-medium leading-relaxed max-w-[750px] mx-auto">
                            Increase your story retention and look popular to sponsors. High story views prove an active, engaged audience.
                        </p>
                    </div>
                </div>

                <div class="flex flex-col items-center gap-2">
                    <div class="flex text-ig-yellow">
                        <span class="material-symbols-outlined fill-1">star</span>
                        <span class="material-symbols-outlined fill-1">star</span>
                        <span class="material-symbols-outlined fill-1">star</span>
                        <span class="material-symbols-outlined fill-1">star</span>
                        <span class="material-symbols-outlined fill-1">star</span>
                    </div>
                    <h2 class="text-sm md:text-base font-bold text-zinc-500">
                        4.9/5 Rating for Engagement Quality
                    </h2>
                </div>

                <!-- TABS -->
                <div class="tactile-container p-1.5 rounded-2xl flex flex-wrap sm:flex-nowrap items-center gap-1.5 shadow-2xl overflow-x-auto sm:overflow-visible">
                    <button @click="activeTab = 'followers'; selectedProduct = null" :class="{ 'active': activeTab === 'followers' }" class="tactile-segment px-8 py-4 rounded-xl text-zinc-400 font-black text-sm md:text-base tracking-tight whitespace-nowrap min-w-[140px]">
                        Followers
                    </button>
                    <button @click="activeTab = 'likes'; selectedProduct = null" :class="{ 'active': activeTab === 'likes' }" class="tactile-segment px-8 py-4 rounded-xl text-zinc-400 font-black text-sm md:text-base tracking-tight whitespace-nowrap min-w-[140px]">
                        Likes
                    </button>
                    <button @click="activeTab = 'reels'; selectedProduct = null" :class="{ 'active': activeTab === 'reels' }" class="tactile-segment px-8 py-4 rounded-xl text-zinc-400 font-black text-sm md:text-base tracking-tight whitespace-nowrap min-w-[140px]">
                        Reels Views
                    </button>
                    <button @click="activeTab = 'story'; selectedProduct = null" :class="{ 'active': activeTab === 'story' }" class="tactile-segment px-8 py-4 rounded-xl text-zinc-400 font-black text-sm md:text-base tracking-tight whitespace-nowrap min-w-[140px]">
                        Story Views
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- FOLLOWERS CONTENT -->
    <section class="mb-24" x-show="activeTab === 'followers'">
        <div class="mt-10 flex flex-col items-center">
             <!-- Quality Toggle -->
            <div class="bg-white dark:bg-zinc-900 p-1.5 rounded-xl shadow-sm border border-zinc-100 dark:border-zinc-800 flex gap-2 w-full max-w-md mb-10">
                <button @click="quality = 'standard'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'standard', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'standard' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">
                    High Quality
                </button>
                <button @click="quality = 'premium'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'premium', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'premium' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">
                    Premium
                </button>
            </div>
        </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full">
                 <template x-if="quality === 'standard'">
                    <div class="contents">
                        @forelse($products['followers']['high_quality'] ?? [] as $index => $product)
                        <div 
                            @click="selectedProduct = { id: 'instagram-followers-high_quality-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                            :class="{ 'ring-4 ring-ig-purple ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-followers-high_quality-{{ $index }}' }"
                            class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-ig-purple/20 group relative"
                        >
                            <div class="mb-4">
                                @if($loop->first)
                                    <span class="text-xs font-bold uppercase tracking-wider text-ig-purple bg-ig-purple/10 px-2 py-1 rounded">STARTER</span>
                                @elseif($loop->iteration == 2)
                                     <span class="text-xs font-bold uppercase tracking-wider text-ig-purple bg-ig-purple/10 px-2 py-1 rounded">POPULAR</span>
                                @elseif($loop->last)
                                     <span class="text-xs font-bold uppercase tracking-wider text-ig-purple bg-ig-purple/10 px-2 py-1 rounded">ULTIMATE</span>
                                @else
                                     <span class="text-xs font-bold uppercase tracking-wider text-ig-purple bg-ig-purple/10 px-2 py-1 rounded">VALUE</span>
                                @endif
                            </div>
                             <!-- Selection Checkmark -->
                             <div x-show="selectedProduct?.id === 'instagram-followers-{{ $index }}'" class="absolute top-4 right-4 bg-ig-purple text-white rounded-full p-1 shadow-lg" style="display: none;">
                                <span class="material-symbols-outlined text-sm font-bold">check</span>
                            </div>

                            <div class="aspect-square w-full bg-zinc-50 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-ig-purple/40 group-hover:scale-110 transition-transform">person_add</span>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Followers</h3>
                            <div class="flex items-baseline gap-2 mb-2">
                                <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-green-600 font-bold mb-4">High Quality</p>
                            @endif
                            <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-purple text-sm font-bold">check_circle</span> Instant Start</li>
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-purple text-sm font-bold">check_circle</span> Privacy Protected</li>
                            </ul>
                        </div>
                        @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No followers packages available.</div>
                        @endforelse
                    </div>
                </template>
                 <!-- Premium Placeholder -->
                 <template x-if="quality === 'premium'">
                     <div class="contents">
                          @forelse($products['followers']['premium'] ?? [] as $index => $product)
                           <div 
                                @click="selectedProduct = { id: 'instagram-followers-premium-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                                :class="{ 'ring-4 ring-yellow-500 ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-followers-premium-{{ $index }}' }"
                                class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-yellow-500/20 group relative"
                            >
                             <div class="mb-4">
                                @if($loop->first)
                                    <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">STARTER</span>
                                @elseif($loop->iteration == 2)
                                     <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">POPULAR</span>
                                @elseif($loop->last)
                                     <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">ULTIMATE</span>
                                @else
                                     <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">VALUE</span>
                                @endif
                            </div>
                             <!-- Selection Checkmark -->
                             <div x-show="selectedProduct?.id === 'instagram-followers-premium-{{ $index }}'" class="absolute top-4 right-4 bg-yellow-500 text-white rounded-full p-1 shadow-lg" style="display: none;">
                                <span class="material-symbols-outlined text-sm font-bold">check</span>
                            </div>
                            <div class="aspect-square w-full bg-yellow-500/10 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-yellow-500/60 group-hover:scale-110 transition-transform">workspace_premium</span>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Followers</h3>
                             <div class="flex items-baseline gap-2 mb-2">
                                <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-yellow-600 font-bold mb-4">Premium Quality</p>
                            @endif
                            <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Real Active Profiles</li>
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Non-Drop Guarantee</li>
                            </ul>
                        </div>
                        @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No premium followers packages available.</div>
                        @endforelse
                    </div>
                 </template>
            </div>
            <!-- Sticky Buy Button (Shared) -->
        <div class="mt-12 max-w-4xl mx-auto sticky bottom-6 z-50">
            <a 
                x-show="selectedProduct"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                :href="'{{ route('checkout') }}?id=' + selectedProduct?.id" 
                class="w-full flex items-center justify-center gap-4 rounded-2xl h-14 bg-gradient-to-r from-ig-purple via-ig-pink to-ig-orange text-white text-lg font-black shadow-xl shadow-ig-pink/40 hover:scale-[1.02] active:scale-95 transition-all"
            >
                <span>BUY NOW</span>
                <span class="opacity-50 text-sm font-medium">|</span>
                <span x-text="'SAVE $' + selectedProduct?.savings"></span>
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <div x-show="!selectedProduct" class="w-full flex items-center justify-center gap-2 h-14 text-zinc-400 font-bold bg-zinc-100 dark:bg-zinc-800/50 rounded-2xl border border-zinc-200 dark:border-zinc-800 border-dashed">
                Select a package above to continue
            </div>
        </div>
    </section>

    <!-- LIKES CONTENT -->
    <section class="mb-24" x-show="activeTab === 'likes'" style="display:none;">
        <div class="mt-10 flex flex-col items-center">
             <div class="bg-white dark:bg-zinc-900 p-1.5 rounded-xl shadow-sm border border-zinc-100 dark:border-zinc-800 flex gap-2 w-full max-w-md mb-10">
                <button @click="quality = 'standard'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'standard', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'standard' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">High Quality</button>
                <button @click="quality = 'premium'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'premium', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'premium' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">Premium</button>
            </div>
        </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full">
                <template x-if="quality === 'standard'">
                    <div class="contents">
                        @forelse($products['likes']['high_quality'] ?? [] as $index => $product)
                        <div 
                             @click="selectedProduct = { id: 'instagram-likes-high_quality-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                            :class="{ 'ring-4 ring-ig-pink ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-likes-high_quality-{{ $index }}' }"
                            class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-ig-pink/20 group relative">
                            <div class="mb-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-ig-pink bg-ig-pink/10 px-2 py-1 rounded">LIKES</span>
                            </div>
                             <!-- Selection Checkmark -->
                             <div x-show="selectedProduct?.id === 'instagram-likes-{{ $index }}'" class="absolute top-4 right-4 bg-ig-pink text-white rounded-full p-1 shadow-lg" style="display: none;">
                                <span class="material-symbols-outlined text-sm font-bold">check</span>
                            </div>
                            <div class="aspect-square w-full bg-zinc-50 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-ig-pink/40 group-hover:scale-110 transition-transform">favorite</span>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Likes</h3>
                            <div class="flex items-baseline gap-2 mb-2">
                                <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-green-600 font-bold mb-4">Instant Delivery</p>
                            @endif
                            <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-pink text-sm font-bold">check_circle</span> Reach Boost</li>
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-pink text-sm font-bold">check_circle</span> Real Accounts</li>
                            </ul>
                        </div>
                        @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No likes packages available at the moment.</div>
                        @endforelse
                    </div>
                </template>
                 <template x-if="quality === 'premium'">
                      <div class="contents">
                          @forelse($products['likes']['premium'] ?? [] as $index => $product)
                             <div 
                                 @click="selectedProduct = { id: 'instagram-likes-premium-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                                 :class="{ 'ring-4 ring-yellow-500 ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-likes-premium-{{ $index }}' }"
                                 class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-yellow-500/20 group relative">
                                  <div class="mb-4">
                                    @if($loop->first)
                                        <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">STARTER</span>
                                    @elseif($loop->iteration == 2)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">POPULAR</span>
                                    @elseif($loop->last)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">ULTIMATE</span>
                                    @else
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">VALUE</span>
                                    @endif
                                </div>
                                 <!-- Selection Checkmark -->
                                 <div x-show="selectedProduct?.id === 'instagram-likes-premium-{{ $index }}'" class="absolute top-4 right-4 bg-yellow-500 text-white rounded-full p-1 shadow-lg" style="display: none;">
                                     <span class="material-symbols-outlined text-sm font-bold">check</span>
                                 </div>
                                 <div class="aspect-square w-full bg-yellow-500/10 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                     <span class="material-symbols-outlined text-5xl text-yellow-500/60 group-hover:scale-110 transition-transform">workspace_premium</span>
                                 </div>
                                 <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Likes</h3>
                                  <div class="flex items-baseline gap-2 mb-2">
                                    <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                    @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                        <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                    @endif
                                  </div>
                                  @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                  <p class="text-sm text-green-600 font-bold mb-4">
                                      Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                                  </p>
                                  @else
                                      <p class="text-sm text-yellow-600 font-bold mb-4">Premium Quality</p>
                                  @endif
                                  <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                      <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Reach Boost</li>
                                      <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Real Accounts</li>
                                  </ul>
                            </div>
                          @empty
                             <div class="col-span-full text-center py-10 text-zinc-500">No premium likes packages available.</div>
                         @endforelse
                      </div>
                 </template>
            </div>
             <!-- Sticky Buy Button (Shared) -->
        <div class="mt-12 max-w-4xl mx-auto sticky bottom-6 z-50">
            <a 
                x-show="selectedProduct"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                :href="'{{ route('checkout') }}?id=' + selectedProduct?.id" 
                class="w-full flex items-center justify-center gap-4 rounded-2xl h-14 bg-gradient-to-r from-ig-purple via-ig-pink to-ig-orange text-white text-lg font-black shadow-xl shadow-ig-pink/40 hover:scale-[1.02] active:scale-95 transition-all"
            >
                <span>BUY NOW</span>
                <span class="opacity-50 text-sm font-medium">|</span>
                <span x-text="'SAVE $' + selectedProduct?.savings"></span>
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <div x-show="!selectedProduct" class="w-full flex items-center justify-center gap-2 h-14 text-zinc-400 font-bold bg-zinc-100 dark:bg-zinc-800/50 rounded-2xl border border-zinc-200 dark:border-zinc-800 border-dashed">
                Select a package above to continue
            </div>
        </div>
    </section>
    
    <!-- REELS CONTENT -->
    <section class="mb-24" x-show="activeTab === 'reels'" style="display:none;">
        <div class="mt-10 flex flex-col items-center">
             <div class="bg-white dark:bg-zinc-900 p-1.5 rounded-xl shadow-sm border border-zinc-100 dark:border-zinc-800 flex gap-2 w-full max-w-md mb-10">
                <button @click="quality = 'standard'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'standard', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'standard' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">High Quality</button>
                <button @click="quality = 'premium'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'premium', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'premium' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">Premium</button>
            </div>
        </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full">
                <template x-if="quality === 'standard'">
                    <div class="contents">
                        @forelse($products['reels_views']['high_quality'] ?? [] as $index => $product)
                        <div 
                             @click="selectedProduct = { id: 'instagram-reels_views-high_quality-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                            :class="{ 'ring-4 ring-ig-orange ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-reels_views-high_quality-{{ $index }}' }"
                            class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-ig-orange/20 group relative">
                            <div class="mb-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-ig-orange bg-ig-orange/10 px-2 py-1 rounded">VIEWS</span>
                            </div>
                             <!-- Selection Checkmark -->
                             <div x-show="selectedProduct?.id === 'instagram-reels_views-{{ $index }}'" class="absolute top-4 right-4 bg-ig-orange text-white rounded-full p-1 shadow-lg" style="display: none;">
                                <span class="material-symbols-outlined text-sm font-bold">check</span>
                            </div>
                            <div class="aspect-square w-full bg-zinc-50 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-ig-orange/40 group-hover:scale-110 transition-transform">movie</span>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Views</h3>
                            <div class="flex items-baseline gap-2 mb-2">
                                <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-green-600 font-bold mb-4">Instant Delivery</p>
                            @endif
                            <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-orange text-sm font-bold">check_circle</span> Global Reach</li>
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-orange text-sm font-bold">check_circle</span> Safe Delivery</li>
                            </ul>
                        </div>
                        @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No reels packages available.</div>
                        @endforelse
                    </div>
                </template>
                <template x-if="quality === 'premium'">
                     <div class="contents">
                          @forelse($products['reels_views']['premium'] ?? [] as $index => $product)
                             <div 
                                 @click="selectedProduct = { id: 'instagram-reels_views-premium-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                                 :class="{ 'ring-4 ring-yellow-500 ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-reels_views-premium-{{ $index }}' }"
                                class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-yellow-500/20 group relative">
                                <div class="mb-4">
                                    @if($loop->first)
                                        <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">STARTER</span>
                                    @elseif($loop->iteration == 2)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">POPULAR</span>
                                    @elseif($loop->last)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">ULTIMATE</span>
                                    @else
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">VALUE</span>
                                    @endif
                                </div>
                                <!-- Selection Checkmark -->
                                <div x-show="selectedProduct?.id === 'instagram-reels_views-premium-{{ $index }}'" class="absolute top-4 right-4 bg-yellow-500 text-white rounded-full p-1 shadow-lg" style="display: none;">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <div class="aspect-square w-full bg-yellow-500/10 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-5xl text-yellow-500/60 group-hover:scale-110 transition-transform">workspace_premium</span>
                                </div>
                                <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Views</h3>
                                <div class="flex items-baseline gap-2 mb-2">
                                    <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                    @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                        <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                    @endif
                                </div>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                <p class="text-sm text-green-600 font-bold mb-4">
                                    Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                                </p>
                                @else
                                    <p class="text-sm text-yellow-600 font-bold mb-4">Premium Quality</p>
                                @endif
                                <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Global Reach</li>
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Safe Delivery</li>
                                </ul>
                           </div>
                         @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No premium reels packages available.</div>
                        @endforelse
                     </div>
                 </template>
            </div>
             <!-- Sticky Buy Button (Shared) -->
        <div class="mt-12 max-w-4xl mx-auto sticky bottom-6 z-50">
            <a 
                x-show="selectedProduct"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                :href="'{{ route('checkout') }}?id=' + selectedProduct?.id" 
                class="w-full flex items-center justify-center gap-4 rounded-2xl h-14 bg-gradient-to-r from-ig-purple via-ig-pink to-ig-orange text-white text-lg font-black shadow-xl shadow-ig-pink/40 hover:scale-[1.02] active:scale-95 transition-all"
            >
                <span>BUY NOW</span>
                <span class="opacity-50 text-sm font-medium">|</span>
                <span x-text="'SAVE $' + selectedProduct?.savings"></span>
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <div x-show="!selectedProduct" class="w-full flex items-center justify-center gap-2 h-14 text-zinc-400 font-bold bg-zinc-100 dark:bg-zinc-800/50 rounded-2xl border border-zinc-200 dark:border-zinc-800 border-dashed">
                Select a package above to continue
            </div>
        </div>
    </section>
    
    <!-- STORY CONTENT -->
    <section class="mb-24" x-show="activeTab === 'story'" style="display:none;">
        <div class="mt-10 flex flex-col items-center">
             <div class="bg-white dark:bg-zinc-900 p-1.5 rounded-xl shadow-sm border border-zinc-100 dark:border-zinc-800 flex gap-2 w-full max-w-md mb-10">
                <button @click="quality = 'standard'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'standard', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'standard' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">High Quality</button>
                <button @click="quality = 'premium'; selectedProduct = null" :class="{ 'bg-ig-gradient text-white shadow-lg': quality === 'premium', 'text-zinc-500 hover:bg-zinc-50 dark:hover:bg-zinc-800': quality !== 'premium' }" class="flex-1 py-3 px-6 rounded-lg text-sm font-bold transition-all uppercase tracking-wider">Premium</button>
            </div>
        </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 w-full">
                <template x-if="quality === 'standard'">
                    <div class="contents">
                        @forelse($products['story_views']['high_quality'] ?? [] as $index => $product)
                        <div 
                             @click="selectedProduct = { id: 'instagram-story_views-high_quality-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                            :class="{ 'ring-4 ring-ig-yellow ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-story_views-high_quality-{{ $index }}' }"
                            class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-ig-yellow/20 group relative">
                            <div class="mb-4">
                                <span class="text-xs font-bold uppercase tracking-wider text-ig-yellow bg-ig-yellow/10 px-2 py-1 rounded">STORY</span>
                            </div>
                             <!-- Selection Checkmark -->
                             <div x-show="selectedProduct?.id === 'instagram-story_views-{{ $index }}'" class="absolute top-4 right-4 bg-ig-yellow text-white rounded-full p-1 shadow-lg" style="display: none;">
                                <span class="material-symbols-outlined text-sm font-bold">check</span>
                            </div>
                            <div class="aspect-square w-full bg-zinc-50 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                <span class="material-symbols-outlined text-5xl text-ig-yellow/40 group-hover:scale-110 transition-transform">history_toggle_off</span>
                            </div>
                            <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Views</h3>
                            <div class="flex items-baseline gap-2 mb-2">
                                <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-green-600 font-bold mb-4">24h Active</p>
                            @endif
                            <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-yellow text-sm font-bold">check_circle</span> See Who Viewed</li>
                                <li class="flex items-center gap-2"><span class="material-symbols-outlined text-ig-yellow text-sm font-bold">check_circle</span> Instant Delivery</li>
                            </ul>
                        </div>
                        @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No story views packages available.</div>
                        @endforelse
                    </div>
                </template>
                 <template x-if="quality === 'premium'">
                     <div class="contents">
                          @forelse($products['story_views']['premium'] ?? [] as $index => $product)
                             <div 
                                 @click="selectedProduct = { id: 'instagram-story_views-premium-{{ $index }}', price: {{ $product['price'] }}, savings: {{ isset($product['original_price']) ? number_format((float)$product['original_price'] - (float)$product['price'], 2) : 0 }} }"
                                 :class="{ 'ring-4 ring-yellow-500 ring-offset-2 ring-offset-white dark:ring-offset-zinc-950 scale-[1.02] shadow-2xl': selectedProduct?.id === 'instagram-story_views-premium-{{ $index }}' }"
                                class="cursor-pointer bg-white dark:bg-zinc-900 p-6 rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-sm hover:shadow-xl transition-all border-b-4 border-b-yellow-500/20 group relative">
                                <div class="mb-4">
                                    @if($loop->first)
                                        <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">STARTER</span>
                                    @elseif($loop->iteration == 2)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">POPULAR</span>
                                    @elseif($loop->last)
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">ULTIMATE</span>
                                    @else
                                         <span class="text-xs font-bold uppercase tracking-wider text-yellow-600 bg-yellow-100 px-2 py-1 rounded">VALUE</span>
                                    @endif
                                </div>
                                <!-- Selection Checkmark -->
                                <div x-show="selectedProduct?.id === 'instagram-story_views-premium-{{ $index }}'" class="absolute top-4 right-4 bg-yellow-500 text-white rounded-full p-1 shadow-lg" style="display: none;">
                                    <span class="material-symbols-outlined text-sm font-bold">check</span>
                                </div>
                                <div class="aspect-square w-full bg-yellow-500/10 dark:bg-zinc-800 rounded-xl mb-4 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-5xl text-yellow-500/60 group-hover:scale-110 transition-transform">workspace_premium</span>
                                </div>
                                <h3 class="text-xl font-bold mb-1">{{ number_format($product['quantity']) }} Views</h3>
                                <div class="flex items-baseline gap-2 mb-2">
                                    <span class="text-2xl font-black">${{ $product['price'] }}</span>
                                @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                                    <span class="text-sm font-bold text-zinc-400 line-through decoration-red-500/30">${{ $product['original_price'] }}</span>
                                @endif
                            </div>
                            @if(isset($product['original_price']) && $product['original_price'] > $product['price'])
                            <p class="text-sm text-green-600 font-bold mb-4">
                                Save {{ round((($product['original_price'] - $product['price']) / $product['original_price']) * 100) }}% OFF
                            </p>
                            @else
                                <p class="text-sm text-yellow-600 font-bold mb-4">Premium Quality</p>
                            @endif
                                <ul class="text-sm text-zinc-500 space-y-2 mb-6">
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> See Who Viewed</li>
                                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-yellow-500 text-sm font-bold">check_circle</span> Instant Delivery</li>
                                </ul>
                           </div>
                         @empty
                            <div class="col-span-full text-center py-10 text-zinc-500">No premium story views packages available.</div>
                        @endforelse
                     </div>
                 </template>
            </div>
             <!-- Sticky Buy Button (Shared) -->
        <div class="mt-12 max-w-4xl mx-auto sticky bottom-6 z-50">
            <a 
                x-show="selectedProduct"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-10"
                x-transition:enter-end="opacity-100 translate-y-0"
                :href="'{{ route('checkout') }}?id=' + selectedProduct?.id" 
                class="w-full flex items-center justify-center gap-4 rounded-2xl h-14 bg-gradient-to-r from-ig-purple via-ig-pink to-ig-orange text-white text-lg font-black shadow-xl shadow-ig-pink/40 hover:scale-[1.02] active:scale-95 transition-all"
            >
                <span>BUY NOW</span>
                <span class="opacity-50 text-sm font-medium">|</span>
                <span x-text="'SAVE $' + selectedProduct?.savings"></span>
                <span class="material-symbols-outlined">shopping_cart</span>
            </a>
            <div x-show="!selectedProduct" class="w-full flex items-center justify-center gap-2 h-14 text-zinc-400 font-bold bg-zinc-100 dark:bg-zinc-800/50 rounded-2xl border border-zinc-200 dark:border-zinc-800 border-dashed">
                Select a package above to continue
            </div>
        </div>
    </section>

    <!-- FEATURES & FAQ & STEPS (Added) -->
    
    <section class="mb-24 py-12 border-y border-zinc-100 dark:border-zinc-800 grid grid-cols-2 md:grid-cols-4 gap-8">
        <div class="flex flex-col items-center gap-2 text-center">
            <span class="material-symbols-outlined text-ig-purple text-3xl font-bold">verified_user</span>
            <span class="font-black text-sm uppercase tracking-wider">High Quality</span>
            <p class="text-xs text-zinc-500">Stable & Reliable</p>
        </div>
        <div class="flex flex-col items-center gap-2 text-center">
            <span class="material-symbols-outlined text-ig-pink text-3xl font-bold">lock</span>
            <span class="font-black text-sm uppercase tracking-wider">Safe &amp; Secure</span>
            <p class="text-xs text-zinc-500">No login or password required</p>
        </div>
        <div class="flex flex-col items-center gap-2 text-center">
            <span class="material-symbols-outlined text-ig-orange text-3xl font-bold">schedule</span>
            <span class="font-black text-sm uppercase tracking-wider">Quick Delivery</span>
            <p class="text-xs text-zinc-500">Starts within minutes of order</p>
        </div>
        <div class="flex flex-col items-center gap-2 text-center">
            <span class="material-symbols-outlined text-ig-yellow text-3xl font-bold">support_agent</span>
            <span class="font-black text-sm uppercase tracking-wider">24/7 Support</span>
            <p class="text-xs text-zinc-500">Always here to help</p>
        </div>
    </section>

    <section class="mb-24" id="comparison">
        <h2 class="text-4xl font-black text-center mb-12">Standard vs. <span class="gradient-text">Premium</span></h2>
        <div class="max-w-4xl mx-auto overflow-hidden rounded-2xl border border-zinc-100 dark:border-zinc-800 shadow-xl bg-white dark:bg-zinc-900">
            <div class="grid grid-cols-3 bg-zinc-50 dark:bg-zinc-800/50 p-6 font-bold border-b border-zinc-100 dark:border-zinc-800">
                <div>Features</div>
                <div class="text-center">Standard</div>
                <div class="text-center text-ig-purple">Premium</div>
            </div>
            <div class="divide-y divide-zinc-100 dark:divide-zinc-800">
                <div class="grid grid-cols-3 p-6 text-sm">
                    <div class="font-bold">Quality</div>
                    <div class="text-center text-zinc-400">Basic Accounts</div>
                    <div class="text-center font-black text-zinc-800 dark:text-zinc-200">High-Authority Profiles</div>
                </div>
                <div class="grid grid-cols-3 p-6 text-sm">
                    <div class="font-bold">Drop Rate</div>
                    <div class="text-center text-zinc-400">Standard</div>
                    <div class="text-center text-ig-purple font-bold flex items-center justify-center gap-1"><span class="material-symbols-outlined text-sm">verified</span> Lifetime Guarantee</div>
                </div>
                <div class="grid grid-cols-3 p-6 text-sm">
                    <div class="font-bold">Delivery Speed</div>
                    <div class="text-center text-zinc-400">Regular</div>
                    <div class="text-center text-ig-purple font-bold flex items-center justify-center gap-1"><span class="material-symbols-outlined text-sm">bolt</span> Instant-Start Drip</div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-24 py-16 bg-gradient-to-br from-ig-purple/5 to-ig-orange/5 dark:bg-zinc-800/20 rounded-[2.5rem] px-8 border border-ig-purple/10" id="how-it-works">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-5xl font-black mb-4">Simple <span class="gradient-text">4-Step</span> Boost</h2>
            <p class="text-zinc-500 font-medium">Elevate your Instagram presence in under 2 minutes.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
            <div class="hidden md:block absolute top-12 left-0 w-full h-0.5 bg-ig-purple opacity-10 -z-0"></div>
            <div class="relative z-10 flex flex-col items-center text-center">
                <div class="size-20 rounded-2xl bg-white dark:bg-zinc-800 shadow-xl border border-zinc-100 dark:border-zinc-700 flex items-center justify-center text-ig-purple mb-6 group hover:bg-ig-gradient hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">inventory_2</span>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-ig-purple mb-2">Step 1</span>
                <h4 class="font-bold text-lg mb-2">Select Package</h4>
                <p class="text-sm text-zinc-500">Pick the service count that fits your goal.</p>
            </div>
            <div class="relative z-10 flex flex-col items-center text-center">
                <div class="size-20 rounded-2xl bg-white dark:bg-zinc-800 shadow-xl border border-zinc-100 dark:border-zinc-700 flex items-center justify-center text-ig-purple mb-6 group hover:bg-ig-gradient hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">link</span>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-ig-purple mb-2">Step 2</span>
                <h4 class="font-bold text-lg mb-2">Paste Link</h4>
                <p class="text-sm text-zinc-500">Paste your Instagram URL.</p>
            </div>
            <div class="relative z-10 flex flex-col items-center text-center">
                <div class="size-20 rounded-2xl bg-white dark:bg-zinc-800 shadow-xl border border-zinc-100 dark:border-zinc-700 flex items-center justify-center text-ig-purple mb-6 group hover:bg-ig-gradient hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">credit_card</span>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-ig-purple mb-2">Step 3</span>
                <h4 class="font-bold text-lg mb-2">Secure Pay</h4>
                <p class="text-sm text-zinc-500">Safe checkout with encrypted payment options.</p>
            </div>
            <div class="relative z-10 flex flex-col items-center text-center">
                <div class="size-20 rounded-2xl bg-white dark:bg-zinc-800 shadow-xl border border-zinc-100 dark:border-zinc-700 flex items-center justify-center text-ig-purple mb-6 group hover:bg-ig-gradient hover:text-white transition-all">
                    <span class="material-symbols-outlined text-4xl">rocket_launch</span>
                </div>
                <span class="text-[10px] font-black uppercase tracking-widest text-ig-purple mb-2">Step 4</span>
                <h4 class="font-bold text-lg mb-2">Viral Reach</h4>
                <p class="text-sm text-zinc-500">Watch your stats grow naturally.</p>
            </div>
        </div>
    </section>

    <section class="mb-24" id="faq">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-5xl font-black mb-4">Questions About <span class="gradient-text">Instagram Services</span></h2>
            <p class="text-zinc-500 font-medium">Everything you need to know about building your authority.</p>
        </div>
        <div class="max-w-3xl mx-auto space-y-4">
            <details class="group bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-100 dark:border-zinc-800 overflow-hidden" open="">
                <summary class="flex items-center justify-between p-6 cursor-pointer font-bold text-lg select-none">
                    Is this service safe?
                    <span class="material-symbols-outlined transition-transform group-open:rotate-180 text-ig-purple">expand_more</span>
                </summary>
                <div class="px-6 pb-6 text-zinc-500 leading-relaxed border-t border-zinc-50 dark:border-zinc-800/50 pt-4">
                    Absolutely. SocBoost+ uses proprietary, risk-free delivery methods that comply with Instagram's safety standards. We have helped thousands of businesses grow their pages without any security issues or penalties. We never ask for your login credentials.
                </div>
            </details>
            <details class="group bg-white dark:bg-zinc-900 rounded-2xl border border-zinc-100 dark:border-zinc-800 overflow-hidden">
                <summary class="flex items-center justify-between p-6 cursor-pointer font-bold text-lg select-none">
                    How long does it take?
                    <span class="material-symbols-outlined transition-transform group-open:rotate-180 text-ig-purple">expand_more</span>
                </summary>
                <div class="px-6 pb-6 text-zinc-500 leading-relaxed border-t border-zinc-50 dark:border-zinc-800/50 pt-4">
                    Delivery typically begins within 15-30 minutes of placing your order. To maintain a natural growth pattern, we deliver them at a steady pace that matches your current page activity and package size.
                </div>
            </details>
        </div>
    </section>

</main>

<footer class="bg-white dark:bg-zinc-900 py-16 px-4 border-t border-zinc-100 dark:border-zinc-800">
    <div class="max-w-[1200px] mx-auto grid grid-cols-1 md:grid-cols-4 gap-12">
        <div class="col-span-1 md:col-span-2">
            <div class="flex items-center gap-2 mb-6">
                <span class="material-symbols-outlined text-3xl font-black bg-ig-gradient text-white p-1 rounded-lg">rocket_launch</span>
                <h2 class="text-[#1C1E21] dark:text-white text-xl font-black leading-tight tracking-tight">SocBoost<span class="text-ig-purple">+</span></h2>
            </div>
            <p class="text-sm text-zinc-500 max-w-md mb-8 leading-relaxed font-medium">
                Elevating social presence since 2018. We specialize in high-impact social growth services that help brands unlock organic potential through strategic social proof and engagement.
            </p>
        </div>
         <div class="col-span-1">
            <h3 class="font-bold text-lg mb-4">Quick Links</h3>
            <ul class="space-y-3 text-sm text-zinc-500">
                <li><a href="#" class="hover:text-ig-purple transition-colors">Home</a></li>
                <li><a href="#how-it-works" class="hover:text-ig-purple transition-colors">How it Works</a></li>
                <li><a href="#faq" class="hover:text-ig-purple transition-colors">FAQ</a></li>
            </ul>
        </div>
        <div class="col-span-1">
            <h3 class="font-bold text-lg mb-4">Legal</h3>
            <ul class="space-y-3 text-sm text-zinc-500">
                <li><a href="#" class="hover:text-ig-purple transition-colors">Privacy Policy</a></li>
                <li><a href="#" class="hover:text-ig-purple transition-colors">Terms of Service</a></li>
            </ul>
        </div>
    </div>
</footer>

</body></html>
