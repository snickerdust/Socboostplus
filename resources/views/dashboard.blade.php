<!DOCTYPE html>
<html class="scroll-smooth" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SocBoost+ | Dashboard</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="selection:bg-accent-pink/20 flex min-h-screen bg-light-bg font-sans"
      x-data="{ tab: 'orders' }">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-sidebar text-white flex flex-col fixed inset-y-0 left-0 z-50">
        <div class="p-6 border-b border-white/10">
            <span class="text-xl font-bold tracking-tighter">SocBoost<span class="text-accent-pink">+</span></span>
        </div>
        <nav class="flex-1 p-4 space-y-1">
            <a href="#" @click.prevent="tab = 'orders'" 
               :class="tab === 'orders' ? 'bg-white/10 text-white' : 'text-white/60 hover:text-white hover:bg-white/5'"
               class="flex items-center gap-3 px-4 py-3 rounded-lg font-medium transition-all group">
                <span class="material-symbols-outlined text-xl">list_alt</span>
                My Orders
            </a>
            <a href="{{ route('landing') }}" 
               class="text-white/60 hover:text-white hover:bg-white/5 flex items-center gap-3 px-4 py-3 rounded-lg transition-all group">
                <span class="material-symbols-outlined text-xl">add_circle</span>
                New Order
            </a>
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
            <h1 class="text-sm font-bold text-text-charcoal uppercase tracking-widest">Dashboard</h1>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 text-text-muted">
                    <span class="material-symbols-outlined text-lg">schedule</span>
                    <span class="text-xs font-semibold">{{ now()->format('M d, H:i A') }}</span>
                </div>
            </div>
        </header>

        <div class="p-8 space-y-8 flex-1">
            
            <div x-show="tab === 'orders'" class="space-y-6">
                <!-- Welcome Section -->
                <div class="flex justify-between items-end mb-6">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight text-text-charcoal">Hello, {{ auth()->user()->name }}! 👋</h2>
                        <p class="text-text-muted mt-1">Track your active orders and history.</p>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-xl shadow-gray-200/50 overflow-hidden">
                    @if(count($orders) > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead>
                                    <tr class="bg-section-bg border-b border-gray-100">
                                        <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Date</th>
                                        <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Service</th>
                                        <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest">Status</th>
                                        <th class="px-6 py-4 text-[10px] font-black text-text-muted uppercase tracking-widest text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-section-bg/50 transition-colors">
                                            <td class="px-6 py-5 text-xs text-text-muted font-medium">
                                                {{ \Carbon\Carbon::parse($order['created_at'] ?? now())->format('d M, Y') }}
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="flex flex-col">
                                                    <span class="text-xs font-bold text-text-charcoal capitalize">{{ str_replace('-', ' ', $order['product_id']) }}</span>
                                                    <span class="text-[10px] text-accent-purple font-medium">{{ $order['target_username'] }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5">
                                                <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-full 
                                                    {{ ($order['status']??'') == 'completed' ? 'bg-green-50 border border-green-100 text-green-600' : 
                                                       (($order['status']??'') == 'processing' ? 'bg-blue-50 border border-blue-100 text-blue-600' : 
                                                       (($order['status']??'') == 'paid' ? 'bg-purple-50 border border-purple-100 text-purple-600' : 
                                                       'bg-orange-50 border border-orange-100 text-orange-600')) }}">
                                                    @if(($order['status']??'') != 'completed')
                                                        <span class="pulse-dot">
                                                            <span class="pulse-dot-inner {{ ($order['status']??'')=='processing' ? 'bg-blue-400' : (($order['status']??'')=='paid' ? 'bg-purple-400' : 'bg-orange-400') }}"></span>
                                                            <span class="pulse-dot-core {{ ($order['status']??'')=='processing' ? 'bg-blue-500' : (($order['status']??'')=='paid' ? 'bg-purple-500' : 'bg-orange-500') }}"></span>
                                                        </span>
                                                    @endif
                                                    <span class="text-[10px] font-bold uppercase">{{ ucfirst(str_replace('_', ' ', $order['status'] ?? 'Pending')) }}</span>
                                                </div>
                                            </td>
                                            <td class="px-6 py-5 text-right font-bold text-xs text-text-charcoal">
                                                ${{ number_format($order['total_price_usd'] ?? $order['total_price'] ?? 0, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-section-bg rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                                <span class="material-symbols-outlined text-3xl">shopping_basket</span>
                            </div>
                            <p class="text-text-muted font-medium text-sm">You haven't placed any orders yet.</p>
                            <a href="{{ route('landing') }}" class="mt-4 inline-block px-6 py-2 bg-accent-purple text-white rounded-lg text-xs font-bold hover:bg-accent-purple/90 transition">Start New Order</a>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </main>

    {{-- FLOATING CHAT WIDGET (Preserved) --}}
    <div x-data="chatWidget()" x-init="initWidget()" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-4 font-sans text-left">
        <!-- Chat Body -->
        <div x-show="open" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="bg-white w-80 md:w-96 rounded-2xl shadow-2xl border border-gray-100 overflow-hidden flex flex-col h-[500px]">
            
            <div class="bg-sidebar p-4 flex justify-between items-center text-white flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center font-bold text-lg">SB</div>
                    <div>
                        <h4 class="font-bold text-sm">SocBoost Support</h4>
                        <p class="text-[10px] text-gray-300 opacity-90">Usually replies in minutes</p>
                    </div>
                </div>
                <button @click="toggleChat()" class="hover:bg-white/20 p-1 rounded transition"><span class="material-symbols-outlined text-lg">close</span></button>
            </div>

            <div class="flex-1 bg-section-bg p-4 overflow-y-auto space-y-4" id="chat-messages">
                <div class="flex gap-3" x-show="messages.length === 0">
                    <div class="w-8 h-8 bg-sidebar rounded-full flex-shrink-0 flex items-center justify-center text-xs font-bold text-white">A</div>
                    <div class="space-y-2 max-w-[85%]">
                        <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow-sm text-sm text-text-charcoal">
                            Hi {{ auth()->user()->name }}! 👋 How can we help you today?
                        </div>
                        <div class="flex flex-col gap-2" x-show="mode === 'menu'">
                            <button @click="selectOption('order')" class="text-left px-4 py-2 bg-white hover:bg-gray-50 border border-gray-100 rounded-xl text-xs font-bold text-accent-purple transition shadow-sm">
                                📦 Check Order Status
                            </button>
                            <button @click="selectOption('payment')" class="text-left px-4 py-2 bg-white hover:bg-gray-50 border border-gray-100 rounded-xl text-xs font-bold text-accent-purple transition shadow-sm">
                                💳 Payment Issue
                            </button>
                            <button @click="startChat()" class="text-left px-4 py-2 bg-indigo-50 hover:bg-indigo-100 border border-indigo-100 rounded-xl text-xs font-bold text-indigo-700 transition shadow-sm">
                                💬 Chat with Admin
                            </button>
                        </div>
                    </div>
                </div>
                <template x-for="msg in messages" :key="msg.timestamp">
                    <div class="flex gap-3" :class="msg.role !== 'admin' ? 'flex-row-reverse' : ''">
                        <template x-if="msg.role === 'admin'">
                             <div class="w-8 h-8 bg-sidebar rounded-full flex-shrink-0 flex items-center justify-center text-xs font-bold text-white">A</div>
                        </template>
                        <div class="p-3 rounded-2xl shadow-sm text-sm max-w-[85%]" 
                             :class="msg.role !== 'admin' ? 'bg-accent-purple text-white rounded-tr-none' : 'bg-white text-text-charcoal rounded-tl-none'">
                            <p x-text="msg.message"></p>
                            <span class="text-[9px] opacity-70 block mt-1" x-text="formatTime(msg.timestamp)"></span>
                        </div>
                    </div>
                </template>
            </div>

            <div class="p-4 bg-white border-t border-gray-100 flex-shrink-0" x-show="mode === 'chat'">
                 <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                    <input type="text" x-model="inputText" placeholder="Type a message..." class="flex-1 bg-section-bg border-none rounded-full px-4 py-2 text-sm focus:ring-2 focus:ring-accent-purple outline-none">
                    <button type="submit" class="bg-accent-purple hover:bg-accent-purple/90 text-white p-2 rounded-full transition shadow-md disabled:opacity-50" :disabled="!inputText.trim()">
                        <span class="material-symbols-outlined text-sm pt-1">send</span>
                    </button>
                 </form>
            </div>
            
            <div class="p-4 bg-section-bg text-center border-t border-gray-100 flex-shrink-0" x-show="mode === 'menu'">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest">Select an option above</p>
            </div>
        </div>

        <button @click="toggleChat()" 
                class="w-14 h-14 bg-accent-purple hover:bg-accent-purple/90 text-white rounded-full shadow-lg flex items-center justify-center transition transform hover:scale-110 active:scale-95 relative">
            <span x-show="!open" class="material-symbols-outlined">chat_bubble</span>
            <span x-show="open" class="material-symbols-outlined">close</span>
            <span x-show="hasUnread" class="absolute top-0 right-0 -mt-1 -mr-1 w-4 h-4 bg-accent-pink rounded-full border-2 border-white animate-pulse"></span>
        </button>
    </div>

    <!-- Layout Scripts -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chatWidget', () => ({
                open: false,
                mode: 'menu',
                inputText: '',
                messages: [],
                hasUnread: false,
                pollingCtx: null,

                initWidget() {
                    if(localStorage.getItem('socboost_chat_open') === 'true') {
                        this.open = true;
                    }
                    if(localStorage.getItem('socboost_chat_mode')) {
                        this.mode = localStorage.getItem('socboost_chat_mode');
                    }
                    this.fetchMessages();
                    this.pollingCtx = setInterval(() => { this.fetchMessages(); }, 5000);
                },

                toggleChat() {
                    this.open = !this.open;
                    this.hasUnread = false;
                    localStorage.setItem('socboost_chat_open', this.open);
                    if(this.open) this.scrollToBottom();
                },

                formatTime(timestamp) {
                    if (!timestamp) return '';
                    return new Date(timestamp * 1000).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
                },

                async fetchMessages() {
                    try {
                        const response = await fetch('{{ route('chat.fetch') }}');
                        const data = await response.json();
                        if (data.status === 'success') {
                            const newMessages = data.messages || [];
                            if (newMessages.length !== this.messages.length) {
                                this.messages = newMessages;
                                if(this.messages.length > 0 && this.mode === 'menu') {
                                    this.mode = 'chat';
                                    localStorage.setItem('socboost_chat_mode', 'chat');
                                }
                                if(this.open) {
                                    this.scrollToBottom();
                                } else {
                                    const lastMsg = this.messages[this.messages.length - 1];
                                    if(lastMsg.role === 'admin') this.hasUnread = true;
                                }
                            }
                        }
                    } catch (e) {}
                },

                selectOption(option) {
                    if (option === 'order') {
                        this.messages.push({ role: 'admin', message: "You can check your order status in the 'My Orders' table on your dashboard.", timestamp: Date.now()/1000 });
                        this.scrollToBottom();
                    } else if (option === 'payment') {
                        this.messages.push({ role: 'admin', message: "If your payment failed, please try checking out again using a different method.", timestamp: Date.now()/1000 });
                         this.scrollToBottom();
                    }
                },

                startChat() {
                    this.mode = 'chat';
                    localStorage.setItem('socboost_chat_mode', 'chat');
                    this.scrollToBottom();
                },

                async sendMessage() {
                    const text = this.inputText.trim();
                    if (!text) return;
                    this.messages.push({ role: 'user', message: text, timestamp: Date.now()/1000 });
                    this.inputText = '';
                    this.scrollToBottom();
                    if(this.mode !== 'chat') {
                        this.mode = 'chat';
                        localStorage.setItem('socboost_chat_mode', 'chat');
                    }
                    try {
                        const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                        await fetch('{{ route('chat.send') }}', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrf },
                            body: JSON.stringify({ message: text })
                        });
                    } catch(e) { console.error(e); }
                },

                scrollToBottom() {
                    this.$nextTick(() => {
                        const container = document.getElementById('chat-messages');
                        container.scrollTop = container.scrollHeight;
                    });
                }
            }))
        })
    </script>
</body>
</html>
