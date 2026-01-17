<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocBoost+ Admin | Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="selection:bg-accent-pink/20 flex min-h-screen bg-light-bg font-sans"
      x-data="{ 
            tab: 'orders', 
            activeChat: null, 
            messages: [], 
            chatUser: '',
            replyMessage: '',
            isSending: false,
            allChats: {{ json_encode($chats ?? (object)[]) }},
            pollInterval: null,

            init() {
                // Poll for sidebar list updates every 5 seconds
                setInterval(() => {
                    this.fetchChatList();
                }, 5000);

                // Poll for active conversation every 3 seconds
                setInterval(() => {
                    if(this.activeChat) {
                        this.fetchConversation(this.activeChat);
                    }
                }, 3000);
            },

            async fetchChatList() {
                try {
                    const res = await fetch('{{ route('admin.chat.list') }}');
                    const data = await res.json();
                    if(data.status === 'success' && data.chats) {
                        this.allChats = data.chats;
                    }
                } catch(e) { console.error(e); }
            },

            async fetchConversation(userId) {
                try {
                    const res = await fetch('{{ route('admin.chat.messages') }}?user_id=' + userId);
                    const data = await res.json();
                    if(data.status === 'success') {
                        // Only update if length changed to avoid jitter, or just replace
                        const newMsgs = data.messages || [];
                        if(newMsgs.length !== this.messages.length) {
                            this.messages = newMsgs;
                            this.scrollToBottom();
                        }
                    }
                } catch(e) { console.error(e); }
            },

            selectChat(userId) {
                if (this.allChats[userId]) {
                    this.activeChat = userId;
                    this.messages = this.allChats[userId].messages ? Object.values(this.allChats[userId].messages) : [];
                    this.chatUser = this.allChats[userId].meta?.user_name || 'User';
                    this.scrollToBottom();
                }
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const container = document.getElementById('messages-container');
                    if(container) container.scrollTop = container.scrollHeight;
                });
            },

            async sendReply() {
                if (!this.replyMessage.trim() || !this.activeChat || this.isSending) return;

                this.isSending = true;
                const payload = {
                    target_user_id: this.activeChat,
                    message: this.replyMessage
                };

                // Optimistic UI Update
                this.messages.push({
                    role: 'admin',
                    message: this.replyMessage,
                    timestamp: Date.now() / 1000
                });
                const currentMsg = this.replyMessage;
                this.replyMessage = '';
                this.scrollToBottom();

                try {
                    const response = await fetch('{{ route('chat.send') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(payload)
                    });

                    if (!response.ok) {
                        const errorData = await response.json().catch(() => ({}));
                        console.error('Send Error:', errorData); // Log for debugging
                        
                        // Revert on failure
                        this.messages.pop(); 
                        this.replyMessage = currentMsg;
                        
                        // Show specific message if available
                        const errMsg = errorData.message || 'Failed to send. Please try again.';
                        alert(errMsg);
                    } else {
                        // Force refresh immediately to sync timestamps/IDs
                        this.fetchConversation(this.activeChat);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    this.messages.pop();
                    this.replyMessage = currentMsg;
                } finally {
                    this.isSending = false;
                }
            }
         }">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-sidebar text-white flex flex-col fixed inset-y-0 left-0 z-50">
        <div class="p-6 border-b border-white/10">
            <span class="text-xl font-bold tracking-tighter">SocBoost<span class="text-accent-pink">+</span> <span class="text-[10px] font-medium opacity-50 ml-1">ADMIN</span></span>
        </div>
        <nav class="flex-1 p-4 space-y-1">
            <a href="#" @click.prevent="tab = 'orders'" 
               :class="tab === 'orders' ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5'"
               class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all group">
                <span class="material-symbols-outlined text-xl">inventory_2</span>
                Order Management
            </a>
            <a href="#" @click.prevent="tab = 'products'"
               :class="tab === 'products' ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5'"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all">
                <span class="material-symbols-outlined text-xl">shopping_bag</span>
                Products
            </a>
            <a href="#" @click.prevent="tab = 'offers'"
               :class="tab === 'offers' ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5'"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all">
                <span class="material-symbols-outlined text-xl">loyalty</span>
                Exclusive Offers
            </a>
            <a href="#" @click.prevent="tab = 'chat'"
               :class="tab === 'chat' ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5'"
               class="flex items-center gap-3 px-4 py-3 rounded-lg transition-all">
                <span class="material-symbols-outlined text-xl">chat_bubble</span>
                Support Chat
            </a>
        </nav>
        <div class="p-4 border-t border-white/10" x-data="{ open: false }">
            <div class="relative">
                <button @click="open = !open" @click.outside="open = false" class="flex items-center gap-3 px-4 py-3 w-full text-left rounded-lg hover:bg-white/5 transition-all group">
                    <div class="w-8 h-8 rounded-full bg-accent-purple flex items-center justify-center text-xs font-bold text-white">SA</div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold truncate text-white">Super Admin</p>
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
            <h1 class="text-sm font-bold text-text-charcoal uppercase tracking-widest" x-text="
                tab === 'orders' ? 'Order Management' : 
                (tab === 'products' ? 'Product Management' : 
                (tab === 'offers' ? 'Exclusive Offers' : 'Support Chat'))
            ">Admin Dashboard</h1>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-text-muted">
                    <span class="material-symbols-outlined text-lg">schedule</span>
                    <span class="text-xs font-semibold">{{ now()->format('M d, H:i A') }}</span>
                </div>
                <button class="relative w-8 h-8 flex items-center justify-center text-text-muted hover:text-text-charcoal transition-colors">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-accent-pink rounded-full border-2 border-white"></span>
                </button>
            </div>
        </header>

        <div class="p-8 space-y-8 flex-1">
            
            <!-- 1. ORDER MANAGEMENT -->
            <div x-show="tab === 'orders'" class="space-y-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <h2 class="text-2xl font-bold tracking-tight">Orders</h2>
                        <span class="px-2 py-0.5 rounded-full bg-orange-100 text-orange-600 text-[10px] font-black uppercase">{{ count($orders) }} Total</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="relative">
                            <input class="bg-section-bg border-gray-200 rounded-lg pl-9 pr-4 py-2 text-xs w-64 focus:ring-accent-purple focus:border-accent-purple transition-all outline-none" placeholder="Search Order ID or User..." type="text"/>
                            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">search</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="bg-section-bg border-b border-gray-100">
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Order ID</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">User</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Platform</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Service</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Target</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Payment</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Status</th>
                                    <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($orders as $id => $order)
                                    <tr class="hover:bg-section-bg/50 transition-colors">
                                        <td class="px-6 py-5 font-bold text-xs text-text-charcoal">{{ substr($id, 0, 8) }}</td>
                                        <td class="px-6 py-5 text-xs text-text-muted">{{ $order['email'] ?? 'Guest' }}</td>
                                        <td class="px-6 py-5">
                                            @php
                                                $prod = $order['product_id'] ?? '';
                                                $plat = str_contains($prod, 'instagram') ? 'Instagram' : (str_contains($prod, 'tiktok') ? 'TikTok' : (str_contains($prod, 'facebook') ? 'Facebook' : 'Other'));
                                                $color = $plat == 'Instagram' ? 'text-pink-600 bg-pink-50' : ($plat == 'TikTok' ? 'text-black bg-gray-100' : ($plat == 'Facebook' ? 'text-blue-600 bg-blue-50' : 'text-gray-600 bg-gray-50'));
                                            @endphp
                                            <div class="flex items-center gap-2">
                                                <span class="text-[10px] font-bold px-2 py-1 rounded {{ $color }}">{{ $plat }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5">
                                            <span class="text-xs font-semibold text-text-charcoal capitalize">{{ str_replace(['-', '_'], ' ', $prod) }}</span>
                                        </td>
                                        <td class="px-6 py-5">
                                            <a class="text-xs text-accent-purple hover:underline font-medium" href="#">{{ $order['target_username'] ?? '-' }}</a>
                                        </td>
                                        <td class="px-6 py-5 font-bold text-xs">${{ number_format($order['total_price_usd'] ?? 0, 2) }}</td>
                                        <td class="px-6 py-5">
                                            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full 
                                                {{ ($order['status']??'')=='completed' ? 'bg-green-50 border border-green-100 text-green-600' : 
                                                   (($order['status']??'')=='processing' ? 'bg-blue-50 border border-blue-100 text-blue-600' : 
                                                   (($order['status']??'')=='paid' ? 'bg-purple-50 border border-purple-100 text-purple-600' : 
                                                   'bg-orange-50 border border-orange-100 text-orange-600')) }}">
                                                @if(($order['status']??'') != 'completed')
                                                    <span class="pulse-dot">
                                                        <span class="pulse-dot-inner {{ ($order['status']??'')=='processing' ? 'bg-blue-400' : (($order['status']??'')=='paid' ? 'bg-purple-400' : 'bg-orange-400') }}"></span>
                                                        <span class="pulse-dot-core {{ ($order['status']??'')=='processing' ? 'bg-blue-500' : (($order['status']??'')=='paid' ? 'bg-purple-500' : 'bg-orange-500') }}"></span>
                                                    </span>
                                                @endif
                                                <span class="text-[10px] font-bold uppercase">{{ ucfirst($order['status'] ?? 'pending') }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-5 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                @if(($order['status']??'') == 'paid' || ($order['status']??'') == 'pending_payment')
                                                    <form action="{{ route('admin.orders.status', $id) }}" method="POST">
                                                        @csrf @method('PATCH')
                                                        <input type="hidden" name="status" value="processing">
                                                        <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-100 transition-colors" title="Start Processing">
                                                            <span class="material-symbols-outlined text-lg">autorenew</span>
                                                        </button>
                                                    </form>
                                                @endif
                                                
                                                <form action="{{ route('admin.orders.status', $id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="status" value="completed">
                                                    <button class="w-8 h-8 rounded-lg bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-100 transition-colors" title="Mark Complete">
                                                        <span class="material-symbols-outlined text-lg">check_circle</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="8" class="text-center py-8 text-text-muted">No orders found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- 2. PRODUCT MANAGEMENT -->
            <div x-show="tab === 'products'" class="space-y-6">
                <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    <h3 class="font-bold text-text-charcoal mb-4">Add New Product</h3>
                    <form action="{{ route('admin.products.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
                        @csrf
                        <div class="w-full"><label class="text-xs font-bold text-text-muted">Platform</label><input type="text" name="platform" placeholder="instagram" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple"></div>
                        <div class="w-full"><label class="text-xs font-bold text-text-muted">Category</label><input type="text" name="category" placeholder="followers" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple"></div>
                        <div class="w-full"><label class="text-xs font-bold text-text-muted">Qty</label><input type="number" name="quantity" placeholder="500" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple"></div>
                        <div class="w-full"><label class="text-xs font-bold text-text-muted">Price ($)</label><input type="text" name="price" placeholder="9.99" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-purple focus:ring-accent-purple"></div>
                        <button type="submit" class="bg-accent-purple hover:bg-accent-purple/90 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-lg shadow-purple-500/20">Add</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($products ?? [] as $plat => $cats)
                        @if(is_iterable($cats))
                            @foreach($cats as $cat => $items)
                                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                                    <h4 class="font-bold text-lg mb-4 capitalize flex items-center gap-2 text-text-charcoal">
                                        <span class="bg-section-bg px-2 py-1 rounded text-xs text-text-muted border border-gray-200">{{ $plat }}</span>
                                        {{ str_replace('_', ' ', $cat) }}
                                    </h4>
                                    <ul class="space-y-3">
                                        @if(is_iterable($items))
                                            @foreach($items as $index => $item)
                                                <li class="flex items-center justify-between group p-2 hover:bg-section-bg/50 rounded-lg transition">
                                                    <form action="{{ route('admin.products.update', $plat.'-'.$cat.'-'.$index) }}" method="POST" class="flex items-center gap-2 flex-1">
                                                        @csrf @method('PUT')
                                                        <input type="number" name="quantity" value="{{ $item['quantity'] ?? 0 }}" class="w-20 text-sm font-bold text-text-charcoal bg-white border border-gray-200 rounded p-1">
                                                        <span class="text-text-muted text-sm">for</span>
                                                        <span class="text-text-muted font-bold">$</span>
                                                        <input type="text" name="price" value="{{ $item['price'] ?? 0 }}" class="w-20 text-sm font-bold text-accent-purple bg-white border border-purple-100 rounded p-1">
                                                        <button type="submit" class="text-xs text-accent-cyan hover:text-accent-cyan/80 opacity-0 group-hover:opacity-100 transition ml-2 font-bold">Save</button>
                                                    </form>
                                                    <form action="{{ route('admin.products.destroy', $plat.'-'.$cat.'-'.$index) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                        @csrf @method('DELETE')
                                                        <button class="text-text-muted hover:text-accent-pink transition"><span class="material-symbols-outlined text-sm">delete</span></button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- 3. EXCLUSIVE OFFERS -->
            <div x-show="tab === 'offers'" class="space-y-6">
                <div class="bg-white border border-gray-100 rounded-xl p-6 shadow-sm">
                    <h3 class="font-bold text-text-charcoal mb-4">Create Contextual Offer</h3>
                    <form action="{{ route('admin.offers.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                        @csrf
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-text-muted">Offer Name</label>
                            <input type="text" name="name" placeholder="e.g. 500 Extra Likes" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-pink focus:ring-accent-pink">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-text-muted">Platform</label>
                            <input type="text" name="platform" placeholder="instagram" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-pink focus:ring-accent-pink">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-xs font-bold text-text-muted">Price ($)</label>
                                <input type="text" name="price" placeholder="4.99" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-pink focus:ring-accent-pink">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-text-muted">Orig ($)</label>
                                <input type="text" name="original_price" placeholder="9.99" class="w-full text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-pink focus:ring-accent-pink">
                            </div>
                        </div>
                        <button type="submit" class="bg-accent-pink text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-accent-pink/90 transition shadow-lg shadow-pink-500/20 w-full">Create</button>
                    </form>
                </div>

                <div class="bg-white rounded-xl shadow-xl border border-gray-100 p-6">
                    <h4 class="font-bold text-text-charcoal mb-4">Active Offers</h4>
                    <div class="space-y-4">
                        @forelse($offers ?? [] as $key => $offer)
                            <div class="flex items-center justify-between p-4 bg-section-bg rounded-lg border border-gray-200">
                                <div>
                                    <span class="bg-white text-text-muted text-[10px] font-bold px-2 py-1 rounded uppercase mr-2 border border-gray-100">{{ $offer['platform'] ?? 'All' }}</span>
                                    <span class="font-bold text-text-charcoal">{{ $offer['name'] }}</span>
                                    <span class="ml-2 text-sm text-green-600 font-bold">${{ $offer['price'] }}</span>
                                    @if(isset($offer['original_price']))
                                        <span class="ml-1 text-xs text-text-muted line-through">${{ $offer['original_price'] }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('admin.offers.destroy', $key) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-accent-pink hover:text-red-600 text-sm font-bold flex items-center gap-1">
                                        <span class="material-symbols-outlined text-sm">delete</span> Remove
                                    </button>
                                </form>
                            </div>
                        @empty
                            <p class="text-text-muted italic">No custom offers active.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- 4. CHAT INBOX -->
            <div x-show="tab === 'chat'" class="grid grid-cols-1 md:grid-cols-3 gap-6 h-[600px]">
                
                {{-- Thread List --}}
                <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col shadow-sm">
                    <div class="p-4 border-b border-gray-100 bg-section-bg">
                        <h3 class="font-bold text-text-charcoal">Active Conversations</h3>
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <template x-for="(thread, userId) in allChats" :key="userId">
                            <template x-if="thread">
                                <div class="p-4 border-b border-gray-100 hover:bg-gray-50 cursor-pointer transition group"
                                     :class="activeChat === userId ? 'bg-indigo-50 border-l-4 border-indigo-500' : ''"
                                     @click="selectChat(userId)">
                                     <div class="flex justify-between items-start mb-1">
                                         <span class="font-bold text-sm text-text-charcoal group-hover:text-indigo-600 transition" x-text="thread.meta?.user_name || 'User'"></span>
                                     </div>
                                     <p class="text-xs text-text-muted truncate" x-text="thread.meta?.last_message || 'No messages'"></p>
                                     <template x-if="thread.meta?.unread_admin">
                                         <span class="inline-block mt-2 w-2 h-2 bg-accent-pink rounded-full animate-pulse"></span>
                                     </template>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>

                {{-- Chat Window --}}
                <div class="md:col-span-2 bg-white rounded-2xl border border-gray-100 overflow-hidden flex flex-col shadow-sm">
                    
                    {{-- Chat Header --}}
                    <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-section-bg h-16">
                        <template x-if="activeChat">
                            <div>
                                <h3 class="font-bold text-text-charcoal" x-text="chatUser"></h3>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                    <p class="text-xs text-green-600">Online</p>
                                </div>
                            </div>
                        </template>
                        <template x-if="!activeChat">
                            <h3 class="text-text-muted italic">Select a conversation</h3>
                        </template>
                    </div>

                    {{-- Messages Area --}}
                    <div id="messages-container" class="flex-1 bg-white p-6 overflow-y-auto space-y-4">
                        <template x-if="activeChat">
                            <template x-for="msg in messages" :key="msg.timestamp">
                                <div class="flex gap-3" :class="msg.role === 'admin' ? 'flex-row-reverse' : ''">
                                    <div class="p-3 rounded-2xl shadow-sm text-sm max-w-[70%]"
                                         :class="msg.role === 'admin' ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-section-bg text-text-charcoal rounded-tl-none'">
                                        <p x-text="msg.message"></p>
                                        <p class="text-[9px] opacity-60 mt-1" x-text="new Date(msg.timestamp * 1000).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})"></p>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </div>

                    {{-- Reply Input --}}
                    <div class="p-4 border-t border-gray-100 bg-white" x-show="activeChat">
                        <form @submit.prevent="sendReply" class="flex gap-3">
                            <input type="text" x-model="replyMessage" 
                                   class="flex-1 rounded-lg border-gray-200 bg-section-bg text-text-charcoal focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-text-muted" 
                                   placeholder="Type your reply..."
                                   :disabled="isSending">
                            <button type="submit" 
                                    class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 rounded-lg font-bold shadow-lg shadow-indigo-500/30 transition transform active:scale-95 disabled:opacity-50"
                                    :disabled="isSending">
                                <span x-show="!isSending">Send</span>
                                <span x-show="isSending">...</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
    </main>

</body>
</html>
