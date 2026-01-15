<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>SocBoost+ | Secure Checkout</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Instrument+Serif:ital@0;1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#000000",
                        "light-bg": "#FFFFFF",
                        "section-bg": "#F8F9FB",
                        "text-charcoal": "#1A1A1E",
                        "text-muted": "#64748B",
                        accent: {
                            pink: "#FE2C55",
                            cyan: "#25F4EE",
                            purple: "#A259FF"
                        }
                    },
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        display: ["Instrument Serif", "serif"],
                    },
                },
            },
        };
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body {
                @apply bg-light-bg text-text-charcoal antialiased;
            }
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .vibrant-gradient {
            background: linear-gradient(135deg, #FE2C55 0%, #A259FF 50%, #25F4EE 100%);
        }
        .selected-gradient-border {
            position: relative;
            background: #FFFFFF;
            border-radius: 12px;
        }
        .selected-gradient-border::before {
            content: '';
            position: absolute;
            inset: -2px;
            z-index: -1;
            background: linear-gradient(135deg, #FE2C55, #A259FF, #25F4EE);
            border-radius: 14px;
        }
    </style>
</head>
<body class="selection:bg-accent-pink/20"
      x-data="checkoutApp({
          initialId: '{{ $id }}',
          initialPlatform: '{{ $platform }}',
          initialCategory: '{{ $category }}',
          initialQuality: '{{ $initialQuality }}',
          allProducts: {{ json_encode($allProducts) }},
          offers: {{ json_encode($offers) }}
      })">

<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
        <div class="flex items-center space-x-2">
            <span class="text-xl font-bold tracking-tighter text-text-charcoal">SocBoost<span class="text-accent-pink">+</span></span>
        </div>
        <div>
            <a class="text-text-muted hover:text-text-charcoal transition-colors flex items-center gap-2 text-sm font-medium" href="{{ route('landing') }}">
                <span class="material-symbols-outlined text-base">arrow_back</span>
                Back to Home
            </a>
        </div>
    </div>
</nav>

<main class="pt-32 pb-24 px-6 bg-light-bg">
    <div class="max-w-6xl mx-auto">
        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3 animate-fade-in-down">
                <span class="material-symbols-outlined text-green-600">check_circle</span>
                <p class="text-green-800 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl animate-fade-in-down">
                <div class="flex items-center gap-3 mb-2">
                    <span class="material-symbols-outlined text-red-600">error</span>
                    <h3 class="text-red-800 font-bold">Please correct the following errors:</h3>
                </div>
                <ul class="list-disc list-inside text-red-700 text-sm space-y-1 ml-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('checkout.pay') }}" class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            @csrf
            
            {{-- Hidden Inputs for Form Submission --}}
            <input type="hidden" name="product_id" :value="activeId">
            <input type="hidden" name="total_price" :value="totalPrice">
            <input type="hidden" name="upsell_quality" :value="quality">
            <input type="hidden" name="upsell_protection" :value="protection ? '1' : '0'">
            <input type="hidden" name="exclusive_offers" :value="JSON.stringify(offers.filter(o => o.selected).map(o => o.id))">

            <div class="lg:col-span-7 space-y-8">
                {{-- Step 1: Account Information --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-xl shadow-gray-200/50">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-8 h-8 rounded-full bg-accent-purple/10 flex items-center justify-center text-accent-purple font-bold text-sm">1</div>
                        <h2 class="text-xl font-bold text-text-charcoal tracking-tight">Account Information</h2>
                    </div>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-text-charcoal mb-2">Email Address</label>
                            <input class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-text-charcoal placeholder:text-gray-400 focus:outline-none focus:ring-4 focus:ring-accent-cyan/10 focus:border-accent-cyan transition-all shadow-sm"
                                   type="email" name="email" required placeholder="your@email.com"
                                   value="{{ old('email', auth()->user()->email ?? '') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-text-charcoal mb-2" x-text="usernameLabel"></label>
                            <div class="relative">
                                <input class="w-full bg-white border border-gray-200 rounded-xl px-4 py-3 text-text-charcoal placeholder:text-gray-400 focus:outline-none focus:ring-4 focus:ring-accent-cyan/10 focus:border-accent-cyan transition-all shadow-sm"
                                       type="text" name="username" required :placeholder="usernamePlaceholder"
                                       value="{{ old('username') }}">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 material-symbols-outlined text-gray-400 text-lg">public</span>
                            </div>
                            <p class="mt-2 text-[11px] text-text-muted font-medium">Make sure your account is Public. No password required.</p>
                        </div>
                    </div>
                </div>

                {{-- Step 2: Customize Order --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-xl shadow-gray-200/50">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-8 h-8 rounded-full bg-accent-purple/10 flex items-center justify-center text-accent-purple font-bold text-sm">2</div>
                        <h2 class="text-xl font-bold text-text-charcoal tracking-tight">Customize Your Order</h2>
                    </div>
                    <div class="mb-8">
                        <h3 class="text-xs font-black uppercase tracking-widest text-text-muted mb-4">Quality</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- High Quality (Standard) -->
                            <button type="button" 
                                    @click="quality = 'high'"
                                    :class="quality === 'high' ? 'selected-gradient-border shadow-lg' : 'border border-gray-200 bg-white hover:border-gray-300 shadow-sm'"
                                    class="group relative p-4 rounded-xl text-left transition-all">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="font-bold text-text-charcoal">High Quality</span>
                                    <span class="text-[10px] font-bold bg-gray-100 px-2 py-0.5 rounded text-text-muted">Standard</span>
                                </div>
                                <p class="text-xs text-text-muted">Good retention & real looking profiles.</p>
                            </button>

                            <!-- Premium Quality (Upgrade) -->
                            <button type="button" 
                                    @click="quality = 'premium'"
                                    :class="quality === 'premium' ? 'selected-gradient-border shadow-lg' : 'border border-gray-200 bg-white hover:border-gray-300 shadow-sm'"
                                    class="group relative p-4 rounded-xl text-left transition-all">
                                <div class="flex justify-between items-start mb-2">
                                    <span class="font-bold text-text-charcoal">Premium Quality</span>
                                    <span class="text-[10px] font-bold bg-accent-cyan/10 px-2 py-0.5 rounded text-accent-cyan">Best Choice</span>
                                </div>
                                <p class="text-xs text-text-muted">Top tier retention, active profiles & priority support.</p>
                            </button>
                        </div>
                    </div>

                    <div class="bg-section-bg rounded-xl p-4 flex items-center justify-between border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-emerald-50 flex items-center justify-center">
                                <span class="material-symbols-outlined text-emerald-600">verified_user</span>
                            </div>
                            <div>
                                <p class="font-bold text-text-charcoal text-sm">Add 30-Day Refill Protection</p>
                                <p class="text-xs text-text-muted">Auto-refill if any followers drop.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="text-sm font-bold text-emerald-600">+$5.00</span>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" x-model="protection"/>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-accent-purple"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-5 relative">
                <div class="sticky top-24 space-y-8">
                    {{-- Order Summary --}}
                    <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-xl shadow-gray-200/50">
                    <h2 class="text-xl font-bold text-text-charcoal tracking-tight mb-8">Order Summary</h2>
                    <div class="space-y-6">

                        {{-- Category Dropdown --}}
                        <div>
                            <label class="block text-xs font-bold text-text-muted uppercase tracking-wider mb-2">Platform & Category</label>
                            <select x-model="selectedCategoryKey"
                                    class="w-full bg-section-bg border border-gray-200 rounded-xl px-4 py-3 text-text-charcoal font-bold focus:outline-none focus:ring-2 focus:ring-accent-purple/20 transition-all text-sm">
                                <template x-for="catKey in categoryKeys" :key="catKey">
                                    <option :value="catKey" x-text="formatCategoryName(catKey)"></option>
                                </template>
                            </select>
                        </div>

                        {{-- Package Dropdown --}}
                        <div>
                            <label class="block text-xs font-bold text-text-muted uppercase tracking-wider mb-2">Package Size</label>
                            <select x-model="selectedProductIndex"
                                    class="w-full bg-section-bg border border-gray-200 rounded-xl px-4 py-3 text-text-charcoal font-bold focus:outline-none focus:ring-2 focus:ring-accent-purple/20 transition-all text-sm">
                                <template x-for="(prod, index) in currentCategoryProducts" :key="index">
                                    <option :value="index" x-text="formatProductName(prod)"></option>
                                </template>
                            </select>
                        </div>

                        <div class="pt-4 border-t border-gray-100 space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-text-muted">Base Price</span>
                                <span class="text-text-charcoal font-semibold" x-text="'$' + formatPrice(basePrice)"></span>
                            </div>
                            <template x-if="quality === 'premium'">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-text-muted">Premium Quality</span>
                                    <span class="text-accent-cyan font-semibold">+$15.00</span>
                                </div>
                            </template>
                             <template x-if="protection">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-text-muted">Refill Protection</span>
                                    <span class="text-emerald-600 font-semibold">+$5.00</span>
                                </div>
                            </template>
                            
                             {{-- Selected Offers --}}
                            <template x-for="offer in offers.filter(o => o.selected)" :key="offer.id">
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-text-muted" x-text="offer.name"></span>
                                    <span class="text-text-charcoal font-semibold" x-text="'+$' + formatPrice(offer.price)"></span>
                                </div>
                            </template>
                        </div>

                        <div class="pt-6 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-lg font-bold text-text-charcoal">Total</span>
                            <span class="text-3xl font-black text-text-charcoal" x-text="'$' + totalPrice"></span>
                        </div>
                        
                        <button type="submit"  class="w-full py-4 rounded-xl vibrant-gradient text-white font-bold text-lg hover:brightness-105 active:scale-[0.98] transition-all shadow-xl shadow-accent-pink/25 flex items-center justify-center gap-3 mt-4">
                            <span class="material-symbols-outlined">currency_bitcoin</span>
                            Pay Securely with Crypto
                        </button>
                        
                        <div class="flex items-center justify-center gap-2 text-text-muted text-[10px] uppercase tracking-widest font-bold">
                            <span class="material-symbols-outlined text-xs">lock</span>
                            SSL Secured Checkout
                        </div>
                    </div>
                </div>

                {{-- Exclusive Offers --}}
                <div class="bg-white rounded-2xl p-8 border border-gray-100 shadow-xl shadow-gray-200/50">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-accent-pink text-lg">local_fire_department</span>
                            <h3 class="font-bold text-text-charcoal">Exclusive Offers</h3>
                        </div>
                        <span class="bg-accent-pink text-white text-[10px] font-black px-2 py-0.5 rounded uppercase">Limited</span>
                    </div>
                    <div class="space-y-4">
                         <template x-for="offer in offers" :key="offer.id">
                            <div class="bg-section-bg rounded-xl p-4 border border-transparent hover:border-accent-purple/30 transition-colors flex items-center justify-between group shadow-sm">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-accent-purple/10 flex items-center justify-center text-accent-purple">
                                        <span class="material-symbols-outlined text-xl">favorite</span>
                                    </div>
                                    <div>
                                        <div class="flex items-center gap-2">
                                            <p class="font-bold text-text-charcoal text-sm" x-text="offer.name"></p>
                                            <span class="text-[9px] font-black bg-emerald-100 text-emerald-700 px-1.5 py-0.5 rounded">SAVE</span>
                                        </div>
                                        <p class="text-xs text-text-muted">
                                            <span x-text="'$' + formatPrice(offer.price)"></span> 
                                            <span class="line-through opacity-40 ml-1" x-show="offer.original_price" x-text="'$' + formatPrice(offer.original_price)"></span>
                                        </p>
                                    </div>
                                </div>
                                <button type="button" @click="offer.selected = !offer.selected" 
                                        :class="offer.selected ? 'bg-red-500 text-white' : 'bg-accent-purple text-white'"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center hover:scale-110 transition-transform shadow-md">
                                    <span class="material-symbols-outlined text-xl" x-text="offer.selected ? 'close' : 'add'"></span>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
                </div>
            </div>
        </form>
    </div>
</main>

<section class="py-24 bg-section-bg border-t border-gray-100">
    <div class="max-w-4xl mx-auto px-6">
        <div class="flex flex-col md:flex-row items-center gap-16">
            <div class="flex-1">
                <h2 class="text-xs font-black uppercase tracking-[0.3em] text-text-muted mb-6">Security Transparency</h2>
                <h3 class="text-4xl font-bold tracking-tight mb-8 text-text-charcoal">WHY CRYPTO PAYMENT ONLY</h3>
                <div class="space-y-6 text-text-muted leading-relaxed font-medium">
                    <p class="text-lg text-text-charcoal font-semibold italic">"The short version: Social proof services have high chargeback rates from users testing 'temporary' boosts then asking for money back."</p>
                    <p>Crypto protects us from fraudulent disputes, allowing us to keep our prices 40% lower and our network quality 100% stable.</p>
                    <p>We've been running since 2023 without the chaos that credit card chargebacks create. Your transaction is instant, private, and final.</p>
                </div>
                <div class="mt-10 flex items-center gap-8">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-emerald-600">verified</span>
                        <span class="text-xs font-bold uppercase text-text-muted">Zero Chargebacks</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-accent-cyan">lock</span>
                        <span class="text-xs font-bold uppercase text-text-muted">100% Privacy</span>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-[320px] shrink-0">
                <div class="bg-white p-8 rounded-[40px] border border-gray-100 shadow-2xl shadow-gray-200/50 relative">
                    <div class="absolute -top-4 -right-4 bg-accent-pink text-white p-4 rounded-3xl shadow-xl">
                        <span class="material-symbols-outlined text-3xl">currency_bitcoin</span>
                    </div>
                    <div class="space-y-6">
                        <div class="h-1 bg-gray-100 rounded-full w-full"></div>
                        <div class="space-y-2">
                            <div class="h-4 bg-gray-50 rounded-md w-3/4"></div>
                            <div class="h-4 bg-gray-50 rounded-md w-1/2"></div>
                        </div>
                        <div class="p-4 bg-section-bg rounded-2xl border border-gray-100 text-center">
                            <span class="text-[10px] font-black uppercase tracking-widest text-text-muted block mb-2">Network Uptime</span>
                            <span class="text-2xl font-black text-emerald-600">99.9%</span>
                        </div>
                        <div class="h-1 bg-gray-100 rounded-full w-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-white border-t border-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest">© 2024 SOCBOOST+ INTERNATIONAL. BUILT FOR ACCOUNT INTEGRITY.</p>
    </div>
</footer>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('checkoutApp', (config) => ({
            allProducts: config.allProducts || {},
            offers: config.offers || [],
            
            // State
            quality: config.initialQuality || 'standard', // 'standard' or 'premium'
            protection: false,
            email: '',

            selectedPlatform: config.initialPlatform,
            selectedCategory: config.initialCategory,
            selectedProductIndex: parseInt(config.initialId.split('-')[2]) || 0, // Points to the index within the specific category array

            init() {
                // No specific init logic needed here as state is initialized directly from config
            },

            // Computed property for generating keys for the first dropdown (Platform + Category)
            get categoryKeys() {
                let keys = [];
                for (const [platform, categories] of Object.entries(this.allProducts)) {
                    for (const category of Object.keys(categories)) {
                        keys.push(`${platform}|${category}`);
                    }
                }
                return keys;
            },

            // The currently selected key (getter/setter to split back into platform/category)
            get selectedCategoryKey() {
                return `${this.selectedPlatform}|${this.selectedCategory}`;
            },
            set selectedCategoryKey(value) {
                const [plat, cat] = value.split('|');
                this.selectedPlatform = plat;
                this.selectedCategory = cat;
                this.selectedProductIndex = 0; // Reset to first product when category changes
            },

            get currentCategoryProducts() {
                if (this.allProducts[this.selectedPlatform] && this.allProducts[this.selectedPlatform][this.selectedCategory]) {
                    return this.allProducts[this.selectedPlatform][this.selectedCategory];
                }
                return [];
            },

            get activeProduct() {
                const products = this.currentCategoryProducts;
                if (products[this.selectedProductIndex]) {
                    return products[this.selectedProductIndex];
                }
                return null;
            },
            
            get activeId() {
                // Reconstruct ID for backend: platform-category-index
                return `${this.selectedPlatform}-${this.selectedCategory}-${this.selectedProductIndex}`;
            },

            get basePrice() {
                return this.activeProduct ? parseFloat(this.activeProduct.price) : 0;
            },

            get totalPrice() {
                let total = this.basePrice;

                // Add Premium Quality cost (High Quality is base/free assumption based on design, Premium is upgrade)
                // Let's assume Premium adds $15.00 like in the previous design
                if (this.quality === 'premium') {
                    total += 15.00;
                }

                if (this.protection) {
                    total += 5.00;
                }

                // Add selected offers
                this.offers.forEach(offer => {
                    if (offer.selected) {
                        total += parseFloat(offer.price || 0);
                    }
                });

                return total.toFixed(2);
            },

            get usernameLabel() {
                 const cat = this.selectedCategory.toLowerCase();
                 if (cat.includes('followers') || cat.includes('page_followers')) {
                     return 'Username / Link';
                 }
                 return 'Post / Video Link';
            },

            get usernamePlaceholder() {
                 const cat = this.selectedCategory.toLowerCase();
                 if (cat.includes('followers')) {
                     return '@username or profile link';
                 }
                 return 'https://...';
            },

            formatCategoryName(key) {
                const [plat, cat] = key.split('|');
                const platFormatted = plat.charAt(0).toUpperCase() + plat.slice(1);
                const catFormatted = cat.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());
                return `${platFormatted} ${catFormatted}`;
            },

            formatProductName(prod) {
                const quantity = new Intl.NumberFormat().format(prod.quantity);
                return `${quantity} ${this.formatCategoryName(this.selectedCategoryKey).split(' ').slice(1).join(' ')} - $${prod.price}`;
            },

            formatPrice(price) {
                return parseFloat(price).toFixed(2);
            }
        }));
    });
</script>
</body>
</html>
