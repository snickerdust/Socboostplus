<x-app-layout>
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- WELCOME HEADER --}}
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                        Hello, {{ auth()->user()->name }}! 👋
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400 mt-1">Track your orders and manage your account.</p>
                </div>
                <a href="{{ route('landing') }}" class="group flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg shadow-indigo-200 dark:shadow-none transition transform hover:-translate-y-1">
                    <span>New Order</span>
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            {{-- ORDER HISTORY CARD --}}
            <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Recent Activity</h3>
                    
                    @if(count($orders) > 0)
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700/30 border-b border-gray-100 dark:border-gray-700">
                                    <tr>
                                        <th class="text-left py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Date</th>
                                        <th class="text-left py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Service</th>
                                        <th class="text-left py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                                        <th class="text-right py-4 px-6 text-xs font-bold text-gray-400 uppercase tracking-wider">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                    @foreach($orders as $order)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/30 transition">
                                            <td class="py-4 px-6 text-sm text-gray-500 font-medium">
                                                {{ \Carbon\Carbon::parse($order['created_at'] ?? now())->format('d M, Y') }}
                                            </td>
                                            <td class="py-4 px-6">
                                                <div class="flex flex-col">
                                                    <span class="text-sm font-bold text-gray-900 dark:text-white">
                                                        {{ str_replace('-', ' ', $order['product_id']) }}
                                                    </span>
                                                    <span class="text-xs text-indigo-500 font-medium">{{ $order['target_username'] }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 px-6">
                                                <span class="inline-flex items-center gap-1.5 py-1 px-3 rounded-full text-xs font-bold
                                                    {{ ($order['status']??'') == 'completed' ? 'bg-green-100 text-green-700' : 
                                                       (($order['status']??'') == 'processing' ? 'bg-blue-100 text-blue-700' : 
                                                       (($order['status']??'') == 'paid' ? 'bg-purple-100 text-purple-700' : 
                                                       'bg-yellow-100 text-yellow-700')) }}">
                                                        <span class="w-1.5 h-1.5 rounded-full {{ ($order['status']??'') == 'completed' ? 'bg-green-500' : 
                                                            (($order['status']??'') == 'processing' ? 'bg-blue-500' : 
                                                            (($order['status']??'') == 'paid' ? 'bg-purple-500' : 
                                                            'bg-yellow-500')) }}"></span>
                                                        {{ ucfirst(str_replace('_', ' ', $order['status'] ?? 'Pending')) }}
                                                </span>
                                            </td>
                                            <td class="py-4 px-6 text-right font-bold text-gray-900 dark:text-white">
                                                ${{ number_format($order['total_price_usd'] ?? $order['total_price'] ?? 0, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            </div>
                            <p class="text-gray-500 font-medium">You haven't placed any orders yet.</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {{-- FLOATING CHAT WIDGET (SHOPEE STYLE) --}}
    <div x-data="chatWidget()" x-init="initWidget()" class="fixed bottom-6 right-6 z-50 flex flex-col items-end gap-4 font-sans text-left">
        
        {{-- Chat Window --}}
        <div x-show="open" 
             style="display: none;"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="bg-white dark:bg-gray-800 w-80 md:w-96 rounded-2xl shadow-2xl border border-gray-100 dark:border-gray-700 overflow-hidden flex flex-col h-[500px]">
            
            {{-- Header --}}
            <div class="bg-indigo-600 p-4 flex justify-between items-center text-white flex-shrink-0">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center font-bold text-lg">SB</div>
                    <div>
                        <h4 class="font-bold text-sm">SocBoost Support</h4>
                        <p class="text-[10px] text-indigo-100 opacity-90">Usually replies in minutes</p>
                    </div>
                </div>
                <button @click="toggleChat()" class="hover:bg-white/20 p-1 rounded transition"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg></button>
            </div>

            {{-- Body --}}
            <div class="flex-1 bg-gray-50 dark:bg-gray-900/50 p-4 overflow-y-auto space-y-4" id="chat-messages">
                
                {{-- Initial Greeting (Only show if no history) --}}
                <div class="flex gap-3" x-show="messages.length === 0">
                    <div class="w-8 h-8 bg-indigo-100 rounded-full flex-shrink-0 flex items-center justify-center text-xs font-bold text-indigo-600">A</div>
                    <div class="space-y-2 max-w-[85%]">
                        <div class="bg-white dark:bg-gray-800 p-3 rounded-2xl rounded-tl-none shadow-sm text-sm text-gray-700 dark:text-gray-300">
                            Hi {{ auth()->user()->name }}! 👋 How can we help you today?
                        </div>
                        
                        {{-- Quick Menu --}}
                        <div class="flex flex-col gap-2" x-show="mode === 'menu'">
                            <button @click="selectOption('order')" class="text-left px-4 py-2 bg-white dark:bg-gray-800 hover:bg-gray-100 border border-indigo-100 rounded-xl text-xs font-bold text-indigo-600 transition shadow-sm">
                                📦 Check Order Status
                            </button>
                            <button @click="selectOption('payment')" class="text-left px-4 py-2 bg-white dark:bg-gray-800 hover:bg-gray-100 border border-indigo-100 rounded-xl text-xs font-bold text-indigo-600 transition shadow-sm">
                                💳 Payment Issue
                            </button>
                            <button @click="startChat()" class="text-left px-4 py-2 bg-indigo-50 hover:bg-indigo-100 border border-indigo-100 rounded-xl text-xs font-bold text-indigo-700 transition shadow-sm">
                                💬 Chat with Admin
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Dynamic Conversation --}}
                <template x-for="msg in messages" :key="msg.timestamp">
                    <div class="flex gap-3" :class="msg.role !== 'admin' ? 'flex-row-reverse' : ''">
                        <template x-if="msg.role === 'admin'">
                             <div class="w-8 h-8 bg-indigo-100 rounded-full flex-shrink-0 flex items-center justify-center text-xs font-bold text-indigo-600">A</div>
                        </template>
                        <div class="p-3 rounded-2xl shadow-sm text-sm max-w-[85%]" 
                             :class="msg.role !== 'admin' ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-tl-none'">
                            <p x-text="msg.message"></p>
                            <span class="text-[9px] opacity-70 block mt-1" x-text="formatTime(msg.timestamp)"></span>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Input Area --}}
            <div class="p-4 bg-white dark:bg-gray-800 border-t border-gray-100 dark:border-gray-700 flex-shrink-0" x-show="mode === 'chat'">
                 <form @submit.prevent="sendMessage" class="flex items-center gap-2">
                    <input type="text" x-model="inputText" placeholder="Type a message..." class="flex-1 bg-gray-50 border-none rounded-full px-4 py-2 text-sm focus:ring-2 focus:ring-indigo-500 outline-none">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white p-2 rounded-full transition shadow-md disabled:opacity-50" :disabled="!inputText.trim()">
                        <svg class="w-5 h-5 translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                 </form>
            </div>
            
            <div class="p-4 bg-gray-50 text-center border-t border-gray-100 flex-shrink-0" x-show="mode === 'menu'">
                <p class="text-[10px] text-gray-400 uppercase font-bold tracking-widest">Select an option above</p>
            </div>

        </div>

        {{-- Toggle Button --}}
        <button @click="toggleChat()" 
                class="w-14 h-14 bg-indigo-600 hover:bg-indigo-700 text-white rounded-full shadow-lg flex items-center justify-center transition transform hover:scale-110 active:scale-95 relative">
            <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
            <svg x-show="open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            
            {{-- Notification Badge --}}
            <span x-show="hasUnread" class="absolute top-0 right-0 -mt-1 -mr-1 w-4 h-4 bg-red-500 rounded-full border-2 border-white animate-pulse"></span>
        </button>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('chatWidget', () => ({
                open: false,
                mode: 'menu', // menu, chat
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

                    // Initial fetch
                    this.fetchMessages();

                    // Poll every 5 seconds (Slower to reduce load)
                    this.pollingCtx = setInterval(() => {
                        this.fetchMessages();
                    }, 5000);
                },

                toggleChat() {
                    this.open = !this.open;
                    this.hasUnread = false;
                    localStorage.setItem('socboost_chat_open', this.open);
                    if(this.open) {
                        this.scrollToBottom();
                    }
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
                            
                            // Check ID not just length to be safe
                            if (newMessages.length !== this.messages.length) {
                                this.messages = newMessages;
                                
                                // SMART MODE: If we have history, switch to chat automatically
                                if(this.messages.length > 0 && this.mode === 'menu') {
                                    this.mode = 'chat';
                                    localStorage.setItem('socboost_chat_mode', 'chat');
                                }

                                if(this.open) {
                                    this.scrollToBottom();
                                } else {
                                    // Make sure it's not our own message triggering badge
                                    const lastMsg = this.messages[this.messages.length - 1];
                                    if(lastMsg.role === 'admin') {
                                        this.hasUnread = true;
                                    }
                                }
                            }
                        }
                    } catch (e) {
                         // Silent fail
                    }
                },

                selectOption(option) {
                    if (option === 'order') {
                        this.messages.push({ role: 'admin', message: "You can check your order status in the 'Recent Activity' table on your dashboard.", timestamp: Date.now()/1000 });
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

                    // Optimistic update
                    this.messages.push({ role: 'user', message: text, timestamp: Date.now()/1000 });
                    this.inputText = '';
                    this.scrollToBottom();
                    
                    // Switch to chat mode if not already (safeguard)
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
                        // Fetch loop will sync
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
</x-app-layout>
