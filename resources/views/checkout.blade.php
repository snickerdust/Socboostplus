<x-layouts.app>

    {{-- Error Handling Display --}}
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 fixed top-20 right-4 z-50 shadow-lg" role="alert">
            <p class="font-bold">Please fix the following errors:</p>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12" 
         x-data="checkoutApp({
            initialId: '{{ $id }}',
            products: {{ json_encode($flatProducts) }},
            offers: {{ json_encode($offers) }}
         })">
        
        <div class="max-w-7xl mx-auto px-6">
            {{-- Breadcrumbs or Back Link --}}
            <a href="{{ route('landing') }}" class="inline-flex items-center text-gray-500 hover:text-indigo-600 mb-8 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Home
            </a>

            <form method="POST" action="{{ route('checkout.pay') }}" class="grid lg:grid-cols-12 gap-8 lg:gap-12 items-start">
                @csrf
                <input type="hidden" name="product_id" :value="activeId">
                <input type="hidden" name="total_price" :value="totalPrice">
                <input type="hidden" name="exclusive_offers" :value="JSON.stringify(offers.filter(o => o.selected).map(o => o.id))">

                {{-- LEFT COLUMN: INPUTS & UPSELLS --}}
                <div class="lg:col-span-7 space-y-8">
                    
                    {{-- 1. Account Details --}}
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-8">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                            <span class="bg-indigo-100 text-indigo-700 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">1</span>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Account Information</h2>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Address</label>
                                <input type="email" name="email" required value="{{ old('email', auth()->user()->email ?? '') }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 focus:ring-2 focus:ring-indigo-500 outline-none transition"
                                       placeholder="For order confirmation">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    {{ Str::contains($category, ['followers', 'page_followers']) ? 'Username / Link' : 'Post / Video Link' }}
                                </label>
                                <input type="text" name="username" required value="{{ old('username') }}"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 focus:ring-2 focus:ring-indigo-500 outline-none transition"
                                       placeholder="{{ Str::contains($category, 'followers') ? '@username or profile link' : 'https://...' }}">
                                <p class="text-xs text-gray-400 mt-2">
                                    Make sure your account is <strong>Public</strong>. No password required.
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Customize (Upsells) --}}
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-700 p-8">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 dark:border-gray-700 pb-4">
                            <span class="bg-indigo-100 text-indigo-700 w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">2</span>
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Customize Your Order</h2>
                        </div>

                        <div class="space-y-6">
                            {{-- Quality Upsell --}}
                            <div>
                                <label class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wide mb-3 block">Quality</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="upsell_quality" value="essential" x-model="quality" class="peer sr-only">
                                        <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 transition hover:border-gray-300">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-gray-800 dark:text-gray-200">Essential</span>
                                                <span class="text-xs font-bold bg-gray-200 text-gray-600 px-2 py-1 rounded">Free</span>
                                            </div>
                                            <p class="text-xs text-gray-500">Standard quality for regular growth.</p>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="upsell_quality" value="pro" x-model="quality" class="peer sr-only">
                                        <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 peer-checked:border-indigo-500 peer-checked:bg-indigo-50 dark:peer-checked:bg-indigo-900/30 transition hover:border-gray-300">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-gray-800 dark:text-gray-200">High Quality</span>
                                                <span class="text-xs font-bold bg-indigo-100 text-indigo-600 px-2 py-1 rounded">+$15.00</span>
                                            </div>
                                            <p class="text-xs text-gray-500">Better retention & real looking profiles.</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Speed Upsell --}}
                            <div>
                                <label class="text-sm font-bold text-gray-900 dark:text-white uppercase tracking-wide mb-3 block">Delivery Speed</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="upsell_speed" value="standard" x-model="speed" class="peer sr-only">
                                        <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 peer-checked:border-pink-500 peer-checked:bg-pink-50 dark:peer-checked:bg-pink-900/30 transition hover:border-gray-300">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-gray-800 dark:text-gray-200">Standard</span>
                                                <span class="text-xs font-bold bg-gray-200 text-gray-600 px-2 py-1 rounded">Free</span>
                                            </div>
                                            <p class="text-xs text-gray-500">Starts within 24 hours.</p>
                                        </div>
                                    </label>
                                    <label class="cursor-pointer relative">
                                        <input type="radio" name="upsell_speed" value="priority" x-model="speed" class="peer sr-only">
                                        <div class="p-4 rounded-xl border-2 border-gray-200 dark:border-gray-700 peer-checked:border-pink-500 peer-checked:bg-pink-50 dark:peer-checked:bg-pink-900/30 transition hover:border-gray-300">
                                            <div class="flex justify-between items-center mb-1">
                                                <span class="font-bold text-gray-800 dark:text-gray-200">Priority</span>
                                                <span class="text-xs font-bold bg-pink-100 text-pink-600 px-2 py-1 rounded">+$10.00</span>
                                            </div>
                                            <p class="text-xs text-gray-500">Skip the queue. Instant start.</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            {{-- Protection Upsell --}}
                            <div>
                                <label class="flex items-center p-4 rounded-xl border-2 border-green-100 dark:border-green-900/50 bg-green-50 dark:bg-green-900/20 cursor-pointer transition hover:border-green-300">
                                    <input type="checkbox" name="upsell_protection" x-model="protection" class="w-5 h-5 text-green-600 rounded focus:ring-green-500 border-gray-300">
                                    <div class="ml-4 flex-grow">
                                        <div class="flex justify-between items-center">
                                            <span class="font-bold text-gray-900 dark:text-white">Add 30-Day Refill Protection</span>
                                            <span class="font-bold text-green-600">+$5.00</span>
                                        </div>
                                        <p class="text-xs text-gray-500 mt-1">Auto-refill if any followers drop within 30 days.</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- RIGHT COLUMN: SUMMARY & EXCLUSIVE OFFERS --}}
                <div class="lg:col-span-5 relative">
                    {{-- Sticky Container --}}
                    <div class="sticky top-8 space-y-8">
                        {{-- ORDER SUMMARY --}}
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg border border-gray-100 dark:border-gray-700 p-8">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Order Summary</h3>

                            {{-- PACKAGE SELECTOR (CLIENT SIDE) --}}
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Selected Package</label>
                                <select x-model="activeId" 
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 focus:ring-2 focus:ring-indigo-500 outline-none font-bold text-gray-900 dark:text-white text-sm">
                                    
                                    @if(isset($allPlatformProducts))
                                        @foreach($allPlatformProducts as $catName => $products)
                                            <optgroup label="{{ str_replace('_', ' ', $catName) }}">
                                                @foreach($products as $prod)
                                                    @php $prodId = $platform.'-'.$catName.'-'.$loop->index; @endphp
                                                    <option value="{{ $prodId }}">
                                                        {{ number_format($prod['quantity']) }} {{ str_replace('_', ' ', $catName) }} - ${{ $prod['price'] }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @endif

                                </select>
                            </div>

                            <div class="space-y-3 mb-6 text-sm">
                                <div class="flex justify-between text-gray-600 dark:text-gray-400">
                                    <span>Base Price</span>
                                    <span class="font-medium text-gray-900 dark:text-white" x-text="'$' + activeProduct.price"></span>
                                </div>
                                
                                <div class="flex justify-between text-indigo-600" x-show="quality === 'pro'" style="display: none;">
                                    <span>High Quality Upgrade</span>
                                    <span>+$15.00</span>
                                </div>

                                <div class="flex justify-between text-pink-600" x-show="speed === 'priority'" style="display: none;">
                                    <span>Priority Speed</span>
                                    <span>+$10.00</span>
                                </div>

                                <div class="flex justify-between text-green-600" x-show="protection" style="display: none;">
                                    <span>Refill Protection</span>
                                    <span>+$5.00</span>
                                </div>

                                {{-- Summary for Exclusive Offers --}}
                                <template x-for="offer in filteredOffers" :key="offer.id">
                                    <div class="flex justify-between text-purple-600" x-show="offer.selected">
                                        <span x-text="offer.name"></span>
                                        <span x-text="'+$' + offer.price"></span>
                                    </div>
                                </template>
                            </div>

                            <div class="border-t border-gray-100 dark:border-gray-700 pt-6 mb-8">
                                <div class="flex justify-between items-center text-xl font-bold text-gray-900 dark:text-white">
                                    <span>Total</span>
                                    <span x-text="'$' + totalPrice"></span>
                                </div>
                            </div>

                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                <span>Pay Securely with</span>
                                <span class="font-bold flex items-center gap-1">
                                    <svg class="w-6 h-6" fill="currentcolor" viewBox="0 0 24 24"><path d="M13.5 10c0-2-2.5-2.5-2.5-2.5V6c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v6c0 1.1.9 2 2 2h1v4.5l3.5-3.5 1.5 1.5L9 20h9c1.1 0 2-.9 2-2v-6c0-1.1-.9-2-2-2h-4.5z"/></svg>
                                    Xendit
                                </span>
                            </button>

                            <div class="mt-6 flex justify-center gap-4 opacity-50 grayscale hover:grayscale-0 transition">
                                <div class="flex items-center text-xs text-gray-500 gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                    SSL Secured Checkout
                                </div>
                            </div>
                        </div>

                        {{-- 3. Exclusive Offers --}}
                        <div class="bg-indigo-50 dark:bg-indigo-900/10 rounded-2xl shadow-sm border border-indigo-100 dark:border-indigo-800/30 p-6">
                            <div class="flex items-center gap-2 mb-4">
                                <h3 class="font-bold text-indigo-900 dark:text-indigo-300">🎉 Exclusive Offers</h3>
                                <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase">Limited</span>
                            </div>
                            
                            <div class="space-y-3">
                                <template x-for="offer in filteredOffers" :key="offer.id">
                                    <div class="flex items-center justify-between p-3 rounded-xl border bg-white dark:bg-gray-800 transition shadow-sm"
                                         :class="offer.selected ? 'border-indigo-500 ring-1 ring-indigo-500' : 'border-gray-100 dark:border-gray-700'">
                                        
                                        <div class="flex items-center gap-3">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-sm">
                                                <svg x-show="!offer.selected" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                                                <svg x-show="offer.selected" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            </div>
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <h4 class="font-bold text-gray-900 dark:text-white text-sm" x-text="offer.name"></h4>
                                                    <template x-if="calculateSave(offer) > 0">
                                                        <span class="bg-red-100 text-red-600 text-[10px] font-bold px-1.5 py-0.5 rounded" x-text="'SAVE ' + calculateSave(offer) + '%'"></span>
                                                    </template>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <p class="text-xs text-indigo-600 font-bold" x-text="'$' + offer.price"></p>
                                                    <template x-if="offer.original_price">
                                                        <p class="text-[10px] text-gray-400 line-through" x-text="'$' + offer.original_price"></p>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" @click="offer.selected = !offer.selected"
                                                class="px-3 py-1.5 rounded-lg text-xs font-bold transition"
                                                :class="offer.selected ? 'bg-red-100 text-red-600 hover:bg-red-200' : 'bg-indigo-600 text-white hover:bg-indigo-700'">
                                            <span x-text="offer.selected ? 'Remove' : 'Add'"></span>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('checkoutApp', ({ initialId, products, offers }) => ({
                activeId: initialId,
                products: products || {},
                quality: '{{ request('upsell_quality', 'essential') }}',
                speed: '{{ request('upsell_speed', 'standard') }}',
                protection: false,
                offers: offers || [],

                get activeProduct() {
                    // Safety check
                    if (!this.products || !this.activeId) return { price: 0 };
                    return this.products[this.activeId] || { price: 0 };
                },

                get currentPlatform() {
                    if(!this.activeId || typeof this.activeId !== 'string') return '';
                    return this.activeId.split('-')[0].toLowerCase();
                },

                get filteredOffers() {
                    if(!this.offers) return [];
                    const current = this.currentPlatform;
                    
                    return this.offers.filter(offer => {
                        // Global offers (no platform set)
                        if (!offer.platform) return true; 

                        // String checks
                        const offerPlat = (typeof offer.platform === 'string') 
                            ? offer.platform.toLowerCase() 
                            : '';

                        if (offerPlat === 'all') return true;
                        if (offerPlat === current) return true;

                        return false;
                    });
                },

                get totalPrice() {
                    let total = parseFloat(this.activeProduct.price || 0);
                    
                    if (this.quality === 'pro') total += 15;
                    if (this.speed === 'priority') total += 10;
                    if (this.protection) total += 5;
                    
                    // Add selected offers using defensive coding
                    this.filteredOffers.forEach(offer => {
                        if(offer.selected) {
                            total += parseFloat(offer.price || 0);
                        }
                    });

                    return total.toFixed(2);
                },

                calculateSave(offer) {
                    const price = parseFloat(offer.price || 0);
                    const orig = parseFloat(offer.original_price || 0);

                    if(orig > price) {
                        const savings = ((orig - price) / orig) * 100;
                        return Math.round(savings);
                    }
                    return 0;
                }
            }))
        })
    </script>
</x-layouts.app>
