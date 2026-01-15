<html class="scroll-smooth" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Socboostplus</title>
<link rel="icon" href="{{ asset('img/logo.png') }}" type="image/png">
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Instrument+Serif:ital@0;1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#000000",
                        "background-light": "#ffffff",
                        "background-dark": "#0a0a0a",
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
        .glass-nav {
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
        }
        .mesh-gradient {
            background: 
                radial-gradient(at 0% 0%, rgba(254, 44, 85, 0.4) 0px, transparent 50%),
                radial-gradient(at 50% 0%, rgba(162, 89, 255, 0.4) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(37, 244, 238, 0.4) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(254, 44, 85, 0.3) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(37, 244, 238, 0.2) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(162, 89, 255, 0.3) 0px, transparent 50%);
            background-color: #ffffff;
        }
        .dense-gradient-orb {
            background: radial-gradient(circle, rgba(254, 44, 85, 0.8) 0%, rgba(162, 89, 255, 0.8) 50%, rgba(37, 244, 238, 0.8) 100%);
            filter: blur(80px);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 1, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .vibrant-gradient {
            background: linear-gradient(135deg, #FE2C55 0%, #A259FF 50%, #25F4EE 100%);
        }
        .push-button-shadow {
            box-shadow: 0 6px 0 0 rgba(0,0,0,0.05), 0 10px 20px -5px rgba(0,0,0,0.1);
            transition: all 0.1s ease;
        }
        .push-button-shadow:active {
            box-shadow: 0 2px 0 0 rgba(0,0,0,0.05);
            transform: translateY(4px);
        }
    </style>
</head>
<body class="bg-background-light text-slate-900 font-sans selection:bg-accent-pink/30">

<nav class="fixed top-0 left-0 right-0 z-50 glass-nav border-b border-slate-200/50 bg-white/70">
<div class="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between">
<div class="flex items-center space-x-2">
<span class="text-xl font-bold tracking-tighter text-black">SocBoost<span class="text-accent-pink">+</span></span>
</div>
<div class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-600">
                <a class="hover:text-primary transition-colors" href="{{ route('products.facebook') }}">Facebook</a>
                <a class="hover:text-primary transition-colors" href="{{ route('products.instagram') }}">Instagram</a>
                <a class="hover:text-primary transition-colors" href="{{ route('products.tiktok') }}">Tiktok</a>
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
<section class="relative pt-32 pb-16 md:pt-48 md:pb-24 overflow-hidden mesh-gradient">
<div class="max-w-4xl mx-auto px-6 text-center relative z-10">
<h1 class="text-3xl md:text-5xl font-bold tracking-tight mb-6 leading-tight text-slate-950 max-w-3xl mx-auto">
                Get the Credibility of 10,000+ Followers <br/>
<span class="font-display italic font-normal">Without Risking a Shadowban.</span>
</h1>
<p class="text-base md:text-lg text-slate-700 mb-8 max-w-2xl mx-auto leading-relaxed font-medium">
                For creators and brands who need an established profile now. Professional-grade followers delivered at a natural pace. No password, no automation spikes, and zero bans reported.
            </p>
<div class="flex flex-col items-center gap-8">
<a class="w-full sm:w-auto px-8 py-4 bg-black text-white rounded-full font-bold text-base hover:scale-[1.02] transition-all shadow-xl flex items-center justify-center" href="#services">
                    Secure Your Account Credibility
                    <span class="material-symbols-outlined ml-2 text-xl">shield_with_heart</span>
</a>
<div class="bg-white/40 backdrop-blur-md border border-white/40 px-5 py-2.5 rounded-2xl flex flex-wrap justify-center gap-5 text-xs font-semibold text-slate-700 shadow-sm">
<div class="flex items-center gap-2"><span class="material-symbols-outlined text-slate-900 text-base">person</span> Username only</div>
<div class="flex items-center gap-2"><span class="material-symbols-outlined text-blue-600 text-base">speed</span> Natural pacing starts in 24h</div>
<div class="flex items-center gap-2"><span class="material-symbols-outlined text-green-600 text-base">verified_user</span> You stay in 100% control</div>
</div>
</div>
</div>
</section>

<section class="py-24 bg-white border-t border-slate-100" id="audience">
<div class="max-w-7xl mx-auto px-6">
<div class="text-center mb-16">
<h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-6 text-slate-900 leading-tight">Built for Accounts That Value Safety Over Speed</h2>
<p class="text-lg text-slate-600 max-w-2xl mx-auto font-medium">We specialize in long-term credibility, not overnight vanity metrics that get you flagged.</p>
</div>
<div class="max-w-3xl mx-auto mb-20 bg-slate-50 border border-slate-200 rounded-3xl p-8 md:p-12 relative shadow-sm">
<div class="absolute -top-4 left-8 bg-white border border-slate-200 px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-widest text-slate-500">Exclusion Criteria</div>
<h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-3">
<span class="material-symbols-outlined text-accent-pink">cancel</span>
                    This is NOT for you if:
                </h3>
<ul class="space-y-4">
<li class="flex items-start gap-4 text-slate-600">
<span class="material-symbols-outlined text-slate-400 text-sm mt-1">remove</span>
<p><strong>Unrealistic Expectations:</strong> You expect 1 million followers in 24 hours. Our pacing is deliberate to mimic organic growth and protect your account.</p>
</li>
<li class="flex items-start gap-4 text-slate-600">
<span class="material-symbols-outlined text-slate-400 text-sm mt-1">remove</span>
<p><strong>Lack of Consistency:</strong> You plan to use this as a substitute for content. Followers provide credibility; your content provides the value that keeps them there.</p>
</li>
<li class="flex items-start gap-4 text-slate-600">
<span class="material-symbols-outlined text-slate-400 text-sm mt-1">remove</span>
<p><strong>Disregard for Safety:</strong> You prefer the cheapest "instant" bots found on dark-market forums over our high-trust, managed infrastructure.</p>
</li>
</ul>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
<div class="p-6 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 transition-all shadow-sm">
<span class="material-symbols-outlined text-2xl mb-4 text-accent-pink">rocket_launch</span>
<h4 class="font-bold mb-2 text-slate-900 leading-tight">New Brand Launches</h4>
<p class="text-xs text-slate-500 leading-relaxed">Bridge the "Zero-Follower Gap." Establish authority so customers trust your ads from Day 1.</p>
</div>
<div class="p-6 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 transition-all shadow-sm">
<span class="material-symbols-outlined text-2xl mb-4 text-accent-purple">verified</span>
<h4 class="font-bold mb-2 text-slate-900 leading-tight">Business Credibility</h4>
<p class="text-xs text-slate-500 leading-relaxed">For B2B providers where a low follower count signals "out of business."</p>
</div>
<div class="p-6 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 transition-all shadow-sm">
<span class="material-symbols-outlined text-2xl mb-4 text-accent-cyan">star</span>
<h4 class="font-bold mb-2 text-slate-900 leading-tight">Creator Validation</h4>
<p class="text-xs text-slate-500 leading-relaxed">Land better brand deals. Agencies look at thresholds before opening your media kit.</p>
</div>
<div class="p-6 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 transition-all shadow-sm">
<span class="material-symbols-outlined text-2xl mb-4 text-blue-500">groups</span>
<h4 class="font-bold mb-2 text-slate-900 leading-tight">Agencies Managing Clients</h4>
<p class="text-xs text-slate-500 leading-relaxed">Whitelist-ready growth. Manage reputation with a partner that won't jeopardize assets.</p>
</div>
<div class="p-6 rounded-2xl border border-slate-100 bg-white hover:border-slate-300 transition-all shadow-sm">
<span class="material-symbols-outlined text-2xl mb-4 text-emerald-500">autorenew</span>
<h4 class="font-bold mb-2 text-slate-900 leading-tight">Rebrands &amp; Pivots</h4>
<p class="text-xs text-slate-500 leading-relaxed">Maintain the appearance of scale during critical brand transitions.</p>
</div>
</div>
</div>
</section>
<section class="py-24 bg-slate-50" id="services">
<div class="max-w-6xl mx-auto px-6">
<div class="text-center mb-16">
<h2 class="text-4xl font-bold tracking-tight mb-4">Select Your Platform</h2>
<p class="text-slate-500">Professional infrastructure for every social asset.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">

<!-- Instagram Card -->
<div id="instagram" class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-100 flex flex-col h-full relative">
<div class="mb-6">
<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" fill="#000"></path>
</svg>
</div>
<div class="mb-4">
<h3 class="text-xl font-bold text-black mb-1">Instagram</h3>
<div class="flex items-center gap-2 mb-2">
<div class="flex">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400/50 text-sm">star_half</span>
</div>
<span class="text-sm font-bold text-slate-900">4.5</span>
<span class="text-xs text-slate-400 font-medium">100+ active campaigns</span>
</div>
<p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">4.9/5 (152 REVIEWS)</p>
</div>
<div class="mt-auto pt-8 flex justify-end">
<button class="bg-black text-white px-6 py-3 rounded-full text-sm font-bold hover:scale-105 transition-transform shadow-lg">
                            Start Building Credibility Safely
                        </button>
</div>
</div>

<!-- TikTok Card -->
<div id="tiktok" class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-100 flex flex-col h-full">
<div class="mb-6">
<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.245V2h-3.445v13.672a2.896 2.896 0 0 1-5.201 1.743l-.002-.001.002.001a2.895 2.895 0 0 1 3.183-4.51v-3.5a6.329 6.329 0 0 0-5.232 10.192 6.33 6.33 0 0 0 10.596-4.414V7.906a8.213 8.213 0 0 0 3.869 1.25V5.726a4.75 4.75 0 0 1-1.001-.29l.001.25z" fill="#000"></path>
</svg>
</div>
<div class="mb-4">
<h3 class="text-xl font-bold text-black mb-1">TikTok</h3>
<div class="flex items-center gap-2 mb-2">
<div class="flex">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400/50 text-sm">star_half</span>
</div>
<span class="text-sm font-bold text-slate-900">4.5</span>
<span class="text-xs text-slate-400 font-medium">100+ active campaigns</span>
</div>
<p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">4.9/5 (152 REVIEWS)</p>
</div>
<div class="mt-auto pt-8 flex justify-end">
<button class="bg-black text-white px-8 py-3 rounded-full text-sm font-bold hover:scale-105 transition-transform shadow-lg">
                            View Packages
                        </button>
</div>
</div>

<!-- Facebook Card -->
<div id="facebook" class="bg-white p-8 rounded-[32px] shadow-sm border border-slate-100 flex flex-col h-full">
<div class="mb-6">
<svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" fill="#000"></path>
</svg>
</div>
<div class="mb-4">
<h3 class="text-xl font-bold text-black mb-1">Facebook</h3>
<div class="flex items-center gap-2 mb-2">
<div class="flex">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400/50 text-sm">star_half</span>
</div>
<span class="text-sm font-bold text-slate-900">4.5</span>
<span class="text-xs text-slate-400 font-medium">100+ active campaigns</span>
</div>
<p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">4.9/5 (152 REVIEWS)</p>
</div>
<div class="mt-auto pt-8 flex justify-end">
<button class="bg-black text-white px-8 py-3 rounded-full text-sm font-bold hover:scale-105 transition-transform shadow-lg">
                            View Packages
                        </button>
</div>
</div>
</div>
</div>
</section>
<section class="py-24 bg-white border-y border-slate-100 overflow-hidden">
<div class="max-w-4xl mx-auto px-6">
<div class="flex flex-col md:flex-row items-center gap-16">
<div class="flex-1">
<h2 class="text-xs font-black uppercase tracking-[0.3em] text-slate-400 mb-6">Security Transparency</h2>
<h3 class="text-4xl font-bold tracking-tight mb-8">WHY CRYPTO PAYMENT ONLY</h3>
<div class="space-y-6 text-slate-600 leading-relaxed font-medium">
<p class="text-lg text-slate-900 font-bold">The short version: Social proof services have high chargeback rates from users testing "temporary" boosts then asking for money back.</p>
<p>Crypto protects us from fraudulent disputes, allowing us to keep our prices 40% lower and our network quality 100% stable.</p>
<p>We've been running since 2023 without the chaos that credit card chargebacks create. Your transaction is instant, private, and final.</p>
</div>
<div class="mt-10 flex items-center gap-8">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-emerald-500">verified</span>
<span class="text-xs font-bold uppercase text-slate-500">Zero Chargebacks</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-blue-500">lock</span>
<span class="text-xs font-bold uppercase text-slate-500">100% Privacy</span>
</div>
</div>
</div>
<div class="w-full md:w-[320px] shrink-0">
<div class="bg-slate-50 p-8 rounded-[40px] border border-slate-200 shadow-inner relative">
<div class="absolute -top-4 -right-4 bg-black text-white p-4 rounded-3xl shadow-xl">
<span class="material-symbols-outlined text-3xl">currency_bitcoin</span>
</div>
<div class="space-y-6">
<div class="h-1 bg-slate-200 rounded-full w-full"></div>
<div class="space-y-2">
<div class="h-4 bg-slate-200 rounded-md w-3/4"></div>
<div class="h-4 bg-slate-200 rounded-md w-1/2"></div>
</div>
<div class="p-4 bg-white rounded-2xl border border-slate-100 shadow-sm text-center">
<span class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Network Uptime</span>
<span class="text-2xl font-black text-emerald-500">99.9%</span>
</div>
<div class="h-1 bg-slate-200 rounded-full w-full"></div>
</div>
</div>
</div>
</div>
</section>
<section class="py-24 bg-white" id="proof">
<div class="max-w-[1200px] mx-auto px-6">
<div class="text-center mb-16 max-w-3xl mx-auto">
<h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-6 text-slate-900 leading-tight">Real Results From Real Customers</h2>
<p class="text-lg text-slate-600 leading-relaxed font-medium">
                    We don't feature viral success stories or overnight fame. We feature people who bought followers, had zero issues, and came back because it worked.
                </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-20 bg-slate-50 p-10 rounded-3xl border border-slate-100">
<div class="text-center px-4">
<div class="text-4xl font-black text-black mb-2">900,000+</div>
<div class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400">Followers Delivered</div>
</div>
<div class="text-center px-4 border-x border-slate-200">
<div class="text-4xl font-black text-black mb-2">120+</div>
<div class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400">Happy Customers</div>
</div>
<div class="text-center px-4">
<div class="text-4xl font-black text-black mb-2">99.9%</div>
<div class="text-xs font-bold uppercase tracking-[0.2em] text-slate-400">Rare Account Issues</div>
</div>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-20">
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col h-full hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-xl font-bold text-accent-pink">MK</div>
<div>
<h4 class="font-bold text-slate-900 leading-none">Mia K.</h4>
<p class="text-xs text-slate-500 mt-1">Skincare Brand</p>
</div>
</div>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
</div>
<p class="text-sm text-slate-600 mb-6 flex-grow italic">"The pacing was key. We needed to look established before our product launch without any flags."</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col h-full hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-xl font-bold text-accent-purple">DR</div>
<div>
<h4 class="font-bold text-slate-900 leading-none">Devon R.</h4>
<p class="text-xs text-slate-500 mt-1">Fitness Creator</p>
</div>
</div>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
</div>
<p class="text-sm text-slate-600 mb-6 flex-grow italic">"Absolute peace of mind. I've tried other services that got my account locked. SocBoost is actually safe."</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col h-full hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-xl font-bold text-accent-cyan">TM</div>
<div>
<h4 class="font-bold text-slate-900 leading-none">Taylor M.</h4>
<p class="text-xs text-slate-500 mt-1">Social Media Agency</p>
</div>
</div>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
</div>
<p class="text-sm text-slate-600 mb-6 flex-grow italic">"We use SocBoost for all our new client accounts to bridge the gap until organic kicks in."</p>
</div>
<div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col h-full hover:shadow-md transition-shadow">
<div class="flex items-center gap-3 mb-4">
<div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center text-xl font-bold text-slate-900">CL</div>
<div>
<h4 class="font-bold text-slate-900 leading-none">Chris L.</h4>
<p class="text-xs text-slate-500 mt-1">Content Creator</p>
</div>
</div>
<div class="flex items-center gap-1 mb-4">
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
<span class="material-symbols-outlined text-yellow-400 text-sm">star</span>
</div>
<p class="text-sm text-slate-600 mb-6 flex-grow italic">"The automatic refill is a lifesaver. Keeps the count consistent without me even checking."</p>
</div>
</div>
</div>
</section>
<section class="py-24 bg-slate-50" id="safety">
<div class="max-w-7xl mx-auto px-6">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
<div>
<h2 class="text-4xl font-bold mb-8 tracking-tight">Security-First Infrastructure.</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
<div class="space-y-3">
<span class="material-symbols-outlined text-primary font-bold">no_encryption</span>
<h4 class="font-bold">Eliminate Login Risk</h4>
<p class="text-sm text-slate-500 leading-relaxed">Since we never touch your password, there is zero chance of account lockouts or third-party access flags.</p>
</div>
<div class="space-y-3">
<span class="material-symbols-outlined text-primary font-bold">pace</span>
<h4 class="font-bold">Algorithmic Safety Pacing</h4>
<p class="text-sm text-slate-500 leading-relaxed">We deliver followers over days, not seconds, to mirror the organic velocity platforms expect.</p>
</div>
<div class="space-y-3">
<span class="material-symbols-outlined text-primary font-bold">published_with_changes</span>
<h4 class="font-bold">Passive Count Maintenance</h4>
<p class="text-sm text-slate-500 leading-relaxed">Our system monitors your profile 24/7. If the platform purges accounts, we refill yours automatically.</p>
</div>
<div class="space-y-3">
<span class="material-symbols-outlined text-primary font-bold">verified</span>
<h4 class="font-bold">Aged Network Quality</h4>
<p class="text-sm text-slate-500 leading-relaxed">We utilize established profiles with history and activity, passing any manual 'sniff test'.</p>
</div>
</div>
</div>
<div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-xl shadow-slate-200/50">
<h3 class="text-lg font-bold mb-6">Transparency Report</h3>
<div class="space-y-4">
<div class="grid grid-cols-2 pb-4 border-b border-slate-100 text-sm">
<span class="text-slate-500">Metric</span>
<span class="text-right font-bold">SocBoost+ Standard</span>
</div>
<div class="grid grid-cols-2 py-2 text-sm">
<span class="text-slate-600">Account Safety Rate</span>
<span class="text-right font-bold text-emerald-600">100%</span>
</div>
<div class="grid grid-cols-2 py-2 text-sm">
<span class="text-slate-600">Password Required</span>
<span class="text-right font-bold text-slate-400">Never</span>
</div>
<div class="grid grid-cols-2 py-2 text-sm">
<span class="text-slate-600">Delivery Method</span>
<span class="text-right font-bold">Proprietary Pacing</span>
</div>
<div class="grid grid-cols-2 py-2 text-sm">
<span class="text-slate-600">Satisfaction Score</span>
<span class="text-right font-bold">4.9/5.0</span>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-24 bg-white" id="faq">
<div class="max-w-4xl mx-auto px-6">
<h2 class="text-3xl md:text-4xl font-bold mb-4 text-center tracking-tight">QUESTIONS YOU'RE PROBABLY ASKING</h2>
<p class="text-slate-500 text-center mb-16 font-medium">Straight answers about our growth systems and safety protocols.</p>
<div class="divide-y divide-slate-100 border-y border-slate-100">
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-accent-pink"></span>
                        Can accounts be banned?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        No. Our system operates entirely outside of your account. Because we don't require your password or use automated API tokens to perform actions *as* you, platforms cannot link our service to your account credentials. We have delivered over 900,000+ followers with zero reported bans.
                    </div>
</div>
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-accent-purple"></span>
                        What information do you need?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        We only need your public username or the link to the profile you want to grow. We will never ask for your password, your two-factor authentication codes, or your email login.
                    </div>
</div>
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-accent-cyan"></span>
                        What happens if followers drop?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        Social platforms occasionally perform purges. Our proprietary monitoring system checks your account balance every 24 hours. If your follower count dips, our "Refill Protocol" triggers automatically.
                    </div>
</div>
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-slate-900"></span>
                        Can I buy multiple times?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        Absolutely. Many of our agency clients use a "Stacking Strategy" where they purchase smaller increments weekly to simulate natural, steady growth over several months.
                    </div>
</div>
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Where do followers come from?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        We utilize a private network of aged, established profiles. Unlike "fresh" bots that get purged instantly, our network consists of accounts with history and activity.
                    </div>
</div>
<div class="py-8">
<h4 class="font-bold text-lg mb-4 text-slate-900 flex items-center gap-3">
<span class="w-1.5 h-1.5 rounded-full bg-orange-500"></span>
                        Why crypto only?
                    </h4>
<div class="pl-4.5 text-slate-600 text-sm leading-relaxed max-w-2xl">
                        To maintain absolute privacy for our high-profile clients and ensure payment stability. Crypto allows for instant confirmation, lower fees for you, and complete transaction discretion without the risk of fraudulent chargebacks.
                    </div>
</div>
</div>
</div>
</section>
<section class="py-32 relative overflow-hidden bg-slate-950">
<div class="absolute inset-0 z-0">
<div class="dense-gradient-orb w-[600px] h-[600px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-40"></div>
</div>
<div class="max-w-4xl mx-auto px-6 text-center relative z-10">
<h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-8 text-white">Build Your Foundation, <br/><span class="text-accent-pink italic font-display">Not a House of Cards.</span></h2>
<p class="text-lg text-slate-300 mb-10 max-w-xl mx-auto">The established look your brand deserves, managed by a team that understands platform risk.</p>
<a class="inline-block px-12 py-5 bg-white text-black rounded-full font-bold text-lg hover:scale-105 transition-transform shadow-2xl" href="#">
                Start Building Credibility Safely
            </a>
</div>
</section>
<footer class="bg-white border-t border-slate-100 pt-24 pb-48">
<div class="max-w-7xl mx-auto px-6">
<div class="grid grid-cols-2 md:grid-cols-5 gap-12 mb-24">
<div class="col-span-2 md:col-span-1">
<span class="text-xl font-bold tracking-tighter">SocBoost<span class="text-accent-pink">+</span></span>
<p class="mt-6 text-sm text-slate-500 leading-relaxed font-medium">
                        Professional-grade growth infrastructure for high-authority brands and creators.
                    </p>
</div>
<div>
<h5 class="font-bold mb-6 text-xs uppercase tracking-widest text-slate-400">Payment &amp; Security</h5>
<ul class="space-y-4 text-sm font-medium text-slate-600">
<li>Crypto (BTC/ETH/USDT)</li>
<li>SSL Secure</li>
</ul>
</div>
<div>
<h5 class="font-bold mb-6 text-xs uppercase tracking-widest text-slate-400">Support</h5>
<ul class="space-y-4 text-sm font-medium text-slate-600">
<li><a class="hover:text-primary transition-colors" href="#">24/7 Live Chat</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Help Center</a></li>
</ul>
</div>
<div>
<h5 class="font-bold mb-6 text-xs uppercase tracking-widest text-slate-400">Transparency</h5>
<ul class="space-y-4 text-sm font-medium text-slate-600">
<li><a class="hover:text-primary transition-colors" href="#">Refill Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Refund Terms</a></li>
</ul>
</div>
<div>
<h5 class="font-bold mb-6 text-xs uppercase tracking-widest text-slate-400">Company</h5>
<ul class="space-y-4 text-sm font-medium text-slate-600">
<li><a class="hover:text-primary transition-colors" href="#">About Us</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Legal Terms</a></li>
</ul>
</div>
</div>
<div class="pt-12 border-t border-slate-50 flex flex-col md:flex-row justify-between items-center text-xs font-bold text-slate-400 uppercase tracking-widest">
<p>© 2024 SOCBOOST+ INTERNATIONAL. BUILT FOR ACCOUNT INTEGRITY.</p>
</div>
</div>
</footer>
<div class="fixed bottom-6 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-2xl">
<div class="bg-white/90 backdrop-blur-xl border border-slate-200/50 p-2 rounded-full shadow-2xl flex items-center justify-between">
<div class="flex items-center ml-4">
<div class="flex -space-x-3 mr-4">
<div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden"><img alt="User 1" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAw1XyLkK_wwzbOFxBCp2az2rvoVaIS3WWM_67z9MW7e3Qy2MnG0l6leamzvYuxZpw1Ki_02GBwsf9529jJFvKyQBvwiOs5lGCsHBvNK_rPpcxSXaAV2ELPE7mHjJ3lPQlQ0X8qbcSorcc0J7PnxdlWvW03nU_eirqC2saCOOKBbfwmHpAaTug2OB3uT_3eudgKe4sjkA_CtTmYjz7199hL9oOKAfrIaGBkm8aFUrVBNjKx5gEvUjHFR6j-okzT3Qk_WDum0bQnaUo"/></div>
<div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden"><img alt="User 2" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAYnVbtJ8XWqEP9eB2Humwq29PLWkEJxmxZKAu-6N9BZ_kj05D9Doq-bBHDoNk4mRHc0dT4PwRbchZlXzH5iLi09uymjhQ4XAmkJDC--54EPJczBTeY4H0w9mS4xAeiRLhvB1UAvfM5M7-yUwguKoE6WijRSIQ22fWP4OCO0ZwUTJkVWAO8xb1qqp6qbQIAvliF4Zn0UQ7RnIW-f5trIIQOceZq7axr3_4TezEa_cX6Gh52avx44Z_QX_CuomsAXsvZy8yLXoNHTII"/></div>
<div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden"><img alt="User 3" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDDTsHg5N5Ks7IptnPesmy4DLSX-jPAFF142v9JIcVBrzJQM4zzQ6szB52jU9m_MOaXkZmmMpLAhGufY4gR5rM9y2SKapJM0btOsV29onby1eZP3xxLcstzyRTkEOdokJexLg13_6DVTfBc64ZRIzjfFcq9GJltOHIiUx-yHhEjmsUH6wr5LGsxFTLPHaN7CxaGF8E2LbqavpoqurXTo0evs9j0ppSVT6x28tn2y9d4Pi3J4c5cIdpuoO-htwTceAAB7KgdhIVFXYc"/></div>
</div>
<div class="hidden sm:block">
<div class="text-[10px] font-bold uppercase tracking-widest text-slate-400 leading-none mb-1">Live Social Proof</div>
<div class="text-xs font-bold text-slate-800">120+ active campaigns</div>
</div>
</div>
<a class="bg-black text-white text-sm font-bold px-8 py-3.5 rounded-full hover:bg-slate-800 transition-colors shadow-lg" href="#">
                Start Building Credibility Safely
            </a>
</div>
</div>

</body></html>
