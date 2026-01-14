<x-app-layout>
    {{-- Main Container - Dark Theme --}}
    <div class="py-12 bg-gray-900 min-h-screen font-sans" 
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
                        // Revert on failure
                        this.messages.pop(); 
                        this.replyMessage = currentMsg;
                        alert('Failed to send. Please try again.');
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
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- HEADER & TABS --}}
            <div class="mb-8">
                <div class="flex justify-between items-end mb-6">
                    <h2 class="text-3xl font-black text-white tracking-tight">Admin Dashboard</h2>
                </div>
                
                <div class="flex space-x-2 border-b border-gray-700 overflow-x-auto">
                    <button @click="tab = 'orders'" :class="tab === 'orders' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" class="whitespace-nowrap py-4 px-6 border-b-2 font-bold text-sm transition">
                        Order Management
                    </button>
                    <button @click="tab = 'products'" :class="tab === 'products' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" class="whitespace-nowrap py-4 px-6 border-b-2 font-bold text-sm transition">
                        Products
                    </button>
                    <button @click="tab = 'offers'" :class="tab === 'offers' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" class="whitespace-nowrap py-4 px-6 border-b-2 font-bold text-sm transition">
                        Exclusive Offers
                    </button>
                    <button @click="tab = 'chat'" :class="tab === 'chat' ? 'border-indigo-500 text-indigo-400' : 'border-transparent text-gray-400 hover:text-gray-300'" class="whitespace-nowrap py-4 px-6 border-b-2 font-bold text-sm transition">
                        Support Chat
                    </button>
                </div>
            </div>

            {{-- 1. ORDER MANAGEMENT --}}
            <div x-show="tab === 'orders'" class="space-y-6">
                <div class="bg-gray-800 rounded-2xl shadow-xl border border-gray-700 p-6">
                    <h3 class="text-xl font-bold mb-4 text-white">Recent Orders</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-700">
                            <thead>
                                <tr class="text-left text-xs font-bold text-gray-400 uppercase tracking-wider">
                                    <th class="px-4 py-3">Order ID</th>
                                    <th class="px-4 py-3">User</th>
                                    <th class="px-4 py-3">Target</th>
                                    <th class="px-4 py-3">Payment</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-700">
                                @forelse($orders as $id => $order)
                                    <tr class="hover:bg-gray-700/50 transition">
                                        <td class="px-4 py-3 text-xs font-mono text-gray-400">{{ substr($id, 0, 8) }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-300">{{ $order['email'] ?? 'Guest' }}</td>
                                        <td class="px-4 py-3 text-sm text-indigo-400 font-bold">{{ $order['target_username'] ?? '-' }}</td>
                                        <td class="px-4 py-3 text-sm font-bold text-white">${{ number_format($order['total_price_usd'] ?? 0, 2) }}</td>
                                        <td class="px-4 py-3">
                                            <span class="px-2 py-1 text-xs rounded-full font-bold
                                                {{ ($order['status']??'')=='completed' ? 'bg-green-900/30 text-green-400 border border-green-800' : 
                                                   (($order['status']??'')=='processing' ? 'bg-blue-900/30 text-blue-400 border border-blue-800' : 
                                                   (($order['status']??'')=='paid' ? 'bg-purple-900/30 text-purple-400 border border-purple-800' : 
                                                   'bg-yellow-900/30 text-yellow-400 border border-yellow-800')) }}">
                                                {{ ucfirst($order['status'] ?? 'pending') }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 flex gap-2">
                                            @if(($order['status']??'') == 'paid' || ($order['status']??'') == 'pending_payment')
                                                <form action="{{ route('admin.orders.status', $id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="status" value="processing">
                                                    <button class="p-1 hover:bg-blue-900/50 rounded text-blue-400 transition" title="Start Processing">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"></path></svg>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.orders.status', $id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <input type="hidden" name="status" value="completed">
                                                <button class="p-1 hover:bg-green-900/50 rounded text-green-400 transition" title="Mark Complete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center py-8 text-gray-500">No orders logged yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- 2. PRODUCT MANAGEMENT --}}
            <div x-show="tab === 'products'" class="space-y-6">
                <div class="bg-indigo-900/20 border border-indigo-500/30 rounded-xl p-6">
                    <h3 class="font-bold text-indigo-300 mb-4">Add New Product</h3>
                    <form action="{{ route('admin.products.store') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-end">
                        @csrf
                        <div class="w-full"><label class="text-xs font-bold text-gray-400">Platform</label><input type="text" name="platform" placeholder="instagram" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-indigo-500 focus:ring-indigo-500"></div>
                        <div class="w-full"><label class="text-xs font-bold text-gray-400">Category</label><input type="text" name="category" placeholder="followers" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-indigo-500 focus:ring-indigo-500"></div>
                        <div class="w-full"><label class="text-xs font-bold text-gray-400">Qty</label><input type="number" name="quantity" placeholder="500" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-indigo-500 focus:ring-indigo-500"></div>
                        <div class="w-full"><label class="text-xs font-bold text-gray-400">Price ($)</label><input type="text" name="price" placeholder="9.99" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-indigo-500 focus:ring-indigo-500"></div>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-500 text-white px-6 py-2.5 rounded-lg font-bold text-sm transition shadow-lg shadow-indigo-500/20">Add</button>
                    </form>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($products ?? [] as $plat => $cats)
                        @foreach($cats as $cat => $items)
                            <div class="bg-gray-800 rounded-xl shadow-sm border border-gray-700 p-6">
                                <h4 class="font-bold text-lg mb-4 capitalize flex items-center gap-2 text-white">
                                    <span class="bg-gray-700 px-2 py-1 rounded text-xs text-gray-300">{{ $plat }}</span>
                                    {{ str_replace('_', ' ', $cat) }}
                                </h4>
                                <ul class="space-y-3">
                                    @foreach($items as $index => $item)
                                        <li class="flex items-center justify-between group p-2 hover:bg-gray-700/50 rounded-lg transition">
                                            <form action="{{ route('admin.products.update', $plat.'-'.$cat.'-'.$index) }}" method="POST" class="flex items-center gap-2 flex-1">
                                                @csrf @method('PUT')
                                                <input type="number" name="quantity" value="{{ $item['quantity'] }}" class="w-20 text-sm font-bold text-white bg-gray-900 border border-gray-700 rounded p-1">
                                                <span class="text-gray-500 text-sm">for</span>
                                                <span class="text-gray-400 font-bold">$</span>
                                                <input type="text" name="price" value="{{ $item['price'] }}" class="w-20 text-sm font-bold text-indigo-400 bg-gray-900 border border-indigo-900/50 rounded p-1">
                                                <button type="submit" class="text-xs text-indigo-400 hover:text-indigo-300 opacity-0 group-hover:opacity-100 transition ml-2">Save</button>
                                            </form>
                                            <form action="{{ route('admin.products.destroy', $plat.'-'.$cat.'-'.$index) }}" method="POST" onsubmit="return confirm('Delete?')">
                                                @csrf @method('DELETE')
                                                <button class="text-gray-600 hover:text-red-500 transition"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg></button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            {{-- 3. EXCLUSIVE OFFERS --}}
            <div x-show="tab === 'offers'" class="space-y-6">
                <div class="bg-purple-900/20 border border-purple-500/30 rounded-xl p-6">
                    <h3 class="font-bold text-purple-300 mb-4">Create Contextual Offer</h3>
                    <form action="{{ route('admin.offers.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4 items-end">
                        @csrf
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-400">Offer Name</label>
                            <input type="text" name="name" placeholder="e.g. 500 Extra Likes" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-400">Platform</label>
                            <input type="text" name="platform" placeholder="instagram" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-purple-500 focus:ring-purple-500">
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label class="text-xs font-bold text-gray-400">Price ($)</label>
                                <input type="text" name="price" placeholder="4.99" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-purple-500 focus:ring-purple-500">
                            </div>
                            <div>
                                <label class="text-xs font-bold text-gray-400">Orig ($)</label>
                                <input type="text" name="original_price" placeholder="9.99" class="w-full text-sm rounded-lg border-gray-700 bg-gray-800 text-white focus:border-purple-500 focus:ring-purple-500">
                            </div>
                        </div>
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-purple-500 transition shadow-lg shadow-purple-500/20 w-full">Create</button>
                    </form>
                </div>

                <div class="bg-gray-800 rounded-xl shadow-xl border border-gray-700 p-6">
                    <h4 class="font-bold text-white mb-4">Active Offers</h4>
                    <div class="space-y-4">
                        @forelse($offers ?? [] as $key => $offer)
                            <div class="flex items-center justify-between p-4 bg-gray-900 rounded-lg border border-gray-700">
                                <div>
                                    <span class="bg-gray-700 text-gray-300 text-[10px] font-bold px-2 py-1 rounded uppercase mr-2">{{ $offer['platform'] ?? 'All' }}</span>
                                    <span class="font-bold text-white">{{ $offer['name'] }}</span>
                                    <span class="ml-2 text-sm text-green-400 font-bold">${{ $offer['price'] }}</span>
                                    @if(isset($offer['original_price']))
                                        <span class="ml-1 text-xs text-gray-500 line-through">${{ $offer['original_price'] }}</span>
                                    @endif
                                </div>
                                <form action="{{ route('admin.offers.destroy', $key) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:text-red-400 text-sm font-bold">Remove</button>
                                </form>
                            </div>
                        @empty
                            <p class="text-gray-500 italic">No custom offers active.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- 4. CHAT INBOX --}}
            <div x-show="tab === 'chat'" class="grid grid-cols-1 md:grid-cols-3 gap-6 h-[600px]">
                
                {{-- Thread List --}}
                <div class="bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden flex flex-col">
                    <div class="p-4 border-b border-gray-700 bg-gray-800/50">
                        <h3 class="font-bold text-gray-200">Active Conversations</h3>
                    </div>
                    <div class="flex-1 overflow-y-auto">
                        <template x-for="(thread, userId) in allChats" :key="userId">
                             <div class="p-4 border-b border-gray-700 hover:bg-indigo-900/20 cursor-pointer transition group"
                                  :class="activeChat === userId ? 'bg-indigo-900/30' : ''"
                                  @click="selectChat(userId)">
                                 <div class="flex justify-between items-start mb-1">
                                     <span class="font-bold text-sm text-white group-hover:text-indigo-300 transition" x-text="thread.meta?.user_name || 'User'"></span>
                                 </div>
                                 <p class="text-xs text-gray-400 truncate" x-text="thread.meta?.last_message || 'No messages'"></p>
                                 <template x-if="thread.meta?.unread_admin">
                                     <span class="inline-block mt-2 w-2 h-2 bg-red-500 rounded-full animate-pulse"></span>
                                 </template>
                             </div>
                        </template>
                    </div>
                </div>

                {{-- Chat Window --}}
                <div class="md:col-span-2 bg-gray-800 rounded-2xl border border-gray-700 overflow-hidden flex flex-col">
                    
                    {{-- Chat Header --}}
                    <div class="p-4 border-b border-gray-700 flex justify-between items-center bg-gray-800/50 h-16">
                        <template x-if="activeChat">
                            <div>
                                <h3 class="font-bold text-white" x-text="chatUser"></h3>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-1.5 h-1.5 bg-green-500 rounded-full"></span>
                                    <p class="text-xs text-green-400">Online</p>
                                </div>
                            </div>
                        </template>
                        <template x-if="!activeChat">
                            <h3 class="text-gray-500 italic">Select a conversation</h3>
                        </template>
                    </div>

                    {{-- Messages Area --}}
                    <div id="messages-container" class="flex-1 bg-gray-900/50 p-6 overflow-y-auto space-y-4">
                        <template x-if="activeChat">
                            <template x-for="msg in messages" :key="msg.timestamp">
                                <div class="flex gap-3" :class="msg.role === 'admin' ? 'flex-row-reverse' : ''">
                                    <div class="p-3 rounded-2xl shadow-sm text-sm max-w-[70%]"
                                         :class="msg.role === 'admin' ? 'bg-indigo-600 text-white rounded-tr-none' : 'bg-gray-700 text-gray-200 rounded-tl-none'">
                                        <p x-text="msg.message"></p>
                                        <p class="text-[9px] opacity-60 mt-1" x-text="new Date(msg.timestamp * 1000).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})"></p>
                                    </div>
                                </div>
                            </template>
                        </template>
                    </div>

                    {{-- Reply Input --}}
                    <div class="p-4 border-t border-gray-700 bg-gray-800" x-show="activeChat">
                        <form @submit.prevent="sendReply" class="flex gap-3">
                            <input type="text" x-model="replyMessage" 
                                   class="flex-1 rounded-lg border-gray-600 bg-gray-900 text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-500" 
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
    </div>
</x-app-layout>
