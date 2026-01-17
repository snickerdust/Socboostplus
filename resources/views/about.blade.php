<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>About Us | SocBoost+</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#000000",
                        "tiktok-red": "#FE2C55",
                        "tiktok-purple": "#A259FF",
                        "tiktok-cyan": "#25F4EE",
                        "background-light": "#ffffff",
                        "background-dark": "#0a0a0a",
                        accent: {
                            pink: "#FE2C55",
                            cyan: "#25F4EE",
                            purple: "#A259FF"
                        }
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "2xl": "1rem", "3xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
<style type="text/tailwindcss">
        @layer utilities {
            .glass-nav {
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
            }
            .mesh-gradient-thick {
                background-color: #ffffff;
                background-image: 
                    radial-gradient(at 0% 0%, rgba(254, 44, 85, 0.15) 0px, transparent 50%),
                    radial-gradient(at 100% 0%, rgba(37, 244, 238, 0.15) 0px, transparent 50%),
                    radial-gradient(at 50% 100%, rgba(162, 89, 255, 0.15) 0px, transparent 50%);
            }
            .tiktok-glow {
                box-shadow: 0 0 20px -5px rgba(254, 44, 85, 0.3), 0 0 20px -5px rgba(37, 244, 238, 0.3);
            }
            .section-divider {
                height: 1px;
                background: linear-gradient(90deg, transparent, #FE2C55, #A259FF, #25F4EE, transparent);
            }
        }
    </style>
</head>
<body class="bg-background-light font-display text-[#0c1c1d] transition-colors duration-300">

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

<section class="mesh-gradient-thick relative overflow-hidden py-32 px-6">
<div class="absolute top-[-100px] left-[-100px] w-96 h-96 bg-tiktok-red/10 blur-[120px] rounded-full"></div>
<div class="absolute bottom-[-100px] right-[-100px] w-96 h-96 bg-tiktok-cyan/10 blur-[120px] rounded-full"></div>
<div class="max-w-[1000px] mx-auto text-center relative z-10">
<div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full border border-gray-200 bg-white/50 backdrop-blur-sm text-xs font-bold uppercase tracking-[0.2em] mb-8">
<span class="size-2 rounded-full bg-tiktok-red animate-pulse"></span>
            Social Proof for Professionals
        </div>
<h1 class="text-6xl md:text-8xl font-black text-[#0c1c1d] leading-[0.95] tracking-[-0.05em] mb-10">
            Social proof for people building real businesses.
        </h1>
<p class="text-lg md:text-2xl text-gray-600 max-w-[800px] mx-auto leading-relaxed font-medium">
            SocBoost+ provides followers and views for Instagram and TikTok accounts. We work with businesses, brands, creators, and agencies that need their social presence to look credible while they build real audiences and generate actual revenue.
        </p>
</div>
</section>
<div class="section-divider"></div>
<section class="py-24 px-6 bg-white">
<div class="max-w-[1100px] mx-auto">
<div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
<div>
<h2 class="text-4xl font-black tracking-tight mb-6 leading-tight">We don't ask for passwords.<br/><span class="text-tiktok-purple">We don't promise miracles.</span></h2>
<div class="space-y-6 text-lg text-gray-600 font-medium">
<p>Our operation is built on username-only delivery. We never touch your private data because we don't need to. We focus on providing the appearance of scale so you can focus on the reality of your product.</p>
<p>Everything we do is gradual. No sudden spikes that trigger red flags. We use a controlled, documentation-led approach to infrastructure that mimics steady growth patterns.</p>
</div>
</div>
<div class="grid grid-cols-2 gap-4">
<div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
<div class="text-3xl font-black text-tiktok-red mb-2">0</div>
<div class="text-sm font-bold uppercase tracking-widest text-gray-400">Passwords Req.</div>
</div>
<div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
<div class="text-3xl font-black text-tiktok-cyan mb-2">100%</div>
<div class="text-sm font-bold uppercase tracking-widest text-gray-400">Username Only</div>
</div>
<div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
<div class="text-3xl font-black text-tiktok-purple mb-2">24h</div>
<div class="text-sm font-bold uppercase tracking-widest text-gray-400">Human Support</div>
</div>
<div class="p-8 rounded-3xl bg-gray-50 border border-gray-100">
<div class="text-3xl font-black text-[#0c1c1d] mb-2">Refill</div>
<div class="text-sm font-bold uppercase tracking-widest text-gray-400">Protection</div>
</div>
</div>
</div>
</div>
</section>
<section class="py-20 px-6 bg-white">
<div class="max-w-[800px] mx-auto p-12 rounded-[2.5rem] bg-[#0c1c1d] text-white relative overflow-hidden">
<div class="absolute top-0 right-0 w-64 h-64 bg-tiktok-red/20 blur-[80px]"></div>
<div class="relative z-10">
<h2 class="text-3xl font-black mb-6">All growth methods carry risk. We reduce it where we can.</h2>
<div class="space-y-4 text-gray-300 font-medium leading-relaxed">
<p>We are honest about the platform realities: social networks are designed to detect and remove artificial signals. Any service claiming 100% permanence or zero risk is lying to you.</p>
<p>We focus on reducing avoidable risk through gradual delivery, high-quality profile markers, and staying strictly within the public-facing boundaries of your account. We treat your credibility as a long-term asset.</p>
</div>
</div>
</div>
</section>
<section class="py-24 px-6 bg-white">
<div class="max-w-[1100px] mx-auto">
<div class="text-center mb-16">
<h2 class="text-sm font-black uppercase tracking-[0.3em] text-tiktok-purple mb-4">The Logic</h2>
<h3 class="text-4xl font-black tracking-tight">Why businesses use us</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-4 gap-8">
<div class="space-y-4">
<div class="font-black text-lg flex items-center gap-2"><span class="text-tiktok-red">01</span> Launch</div>
<p class="text-gray-500 text-sm leading-relaxed">Eliminate the 'empty room' effect for new brands and products entering the market.</p>
</div>
<div class="space-y-4">
<div class="font-black text-lg flex items-center gap-2"><span class="text-tiktok-cyan">02</span> Ads</div>
<p class="text-gray-500 text-sm leading-relaxed">Higher ad conversion rates when landing pages lead to accounts with established authority.</p>
</div>
<div class="space-y-4">
<div class="font-black text-lg flex items-center gap-2"><span class="text-tiktok-purple">03</span> Agencies</div>
<p class="text-gray-500 text-sm leading-relaxed">Wholesale social proof infrastructure for managers handling multi-brand portfolios.</p>
</div>
<div class="space-y-4">
<div class="font-black text-lg flex items-center gap-2"><span>04</span> Infrastructure</div>
<p class="text-gray-500 text-sm leading-relaxed">A dependable partner that doesn't disappear when platforms update their algorithms.</p>
</div>
</div>
</div>
</section>
<section class="py-24 px-6 bg-gray-50">
<div class="max-w-[1200px] mx-auto">
<h2 class="text-center text-3xl font-black mb-16 tracking-tight">Trusted by building professionals</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"Finally, a service that doesn't feel like a scam. They are upfront about the process and the results are consistent."</p>
<div class="font-black text-sm uppercase tracking-widest text-tiktok-red">Marcus T.</div>
<div class="text-xs text-gray-400 font-bold">Brand Strategist</div>
</div>
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"The gradual delivery is what sold me. It looks much more natural for my clients than the overnight spikes others offer."</p>
<div class="font-black text-sm uppercase tracking-widest text-tiktok-cyan">Sarah K.</div>
<div class="text-xs text-gray-400 font-bold">Agency Founder</div>
</div>
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"Security was my main concern. No password requirement means zero risk to my main business assets."</p>
<div class="font-black text-sm uppercase tracking-widest text-tiktok-purple">James P.</div>
<div class="text-xs text-gray-400 font-bold">E-commerce Director</div>
</div>
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"We use SocBoost+ as a baseline before we start our major ad spends. It significantly improves our CPC."</p>
<div class="font-black text-sm uppercase tracking-widest">Andrea L.</div>
<div class="text-xs text-gray-400 font-bold">Growth Lead</div>
</div>
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"The human support team is actually helpful. No scripted bots wasting your time when you have a question."</p>
<div class="font-black text-sm uppercase tracking-widest text-tiktok-red">Dev R.</div>
<div class="text-xs text-gray-400 font-bold">Creator</div>
</div>
<div class="p-8 bg-white rounded-3xl border border-gray-100 shadow-sm">
<p class="italic text-gray-600 mb-6 font-medium">"Solid infrastructure. We've been through platform updates where other services died, but SocBoost+ kept delivering."</p>
<div class="font-black text-sm uppercase tracking-widest text-tiktok-cyan">Michelle H.</div>
<div class="text-xs text-gray-400 font-bold">Marketing Agency</div>
</div>
</div>
</div>
</section>
<section class="py-24 px-6 bg-white">
<div class="max-w-[1000px] mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
<div class="p-10 rounded-3xl border border-gray-100 bg-gray-50">
<h3 class="text-xl font-black mb-8 border-b border-gray-200 pb-4">Who we work with</h3>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-500 text-xl font-bold">check</span>
<span class="text-gray-700 font-bold">Real Businesses &amp; Brands</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-500 text-xl font-bold">check</span>
<span class="text-gray-700 font-bold">Agencies managing client growth</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-500 text-xl font-bold">check</span>
<span class="text-gray-700 font-bold">Professional Creators</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-emerald-500 text-xl font-bold">check</span>
<span class="text-gray-700 font-bold">Long-term strategic thinkers</span>
</li>
</ul>
</div>
<div class="p-10 rounded-3xl bg-[#0c1c1d] text-white">
<h3 class="text-xl font-black mb-8 border-b border-white/10 pb-4">Who we don't work with</h3>
<ul class="space-y-4">
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-tiktok-red text-xl font-bold">close</span>
<span class="text-gray-300 font-bold">Users expecting instant "virality"</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-tiktok-red text-xl font-bold">close</span>
<span class="text-gray-300 font-bold">Engagement manipulation seekers</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-tiktok-red text-xl font-bold">close</span>
<span class="text-gray-300 font-bold">Accounts under 24 hours old</span>
</li>
<li class="flex items-start gap-3">
<span class="material-symbols-outlined text-tiktok-red text-xl font-bold">close</span>
<span class="text-gray-300 font-bold">People who don't read safety protocols</span>
</li>
</ul>
</div>
</div>
</section>
<section class="py-24 px-6 bg-white relative">
<div class="max-w-[1100px] mx-auto text-center">
<div class="section-divider mb-16"></div>
<h2 class="text-5xl font-black mb-6 tracking-tight">24-hour human support.<br/><span class="text-transparent bg-clip-text bg-gradient-to-r from-tiktok-red via-tiktok-purple to-tiktok-cyan">No bots. No scripts.</span></h2>
<p class="text-xl text-gray-500 max-w-2xl mx-auto mb-12 font-medium">When you have a question about your account infrastructure, you talk to a person who understands the platform logic, not an automated chat loop.</p>
<button class="bg-[#0c1c1d] text-white px-10 py-5 rounded-2xl text-lg font-black tiktok-glow hover:scale-105 transition-all">
            Contact Support Team
        </button>
</div>
</section>
<footer class="border-t border-gray-100 py-16 px-6 bg-white">
<div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-start gap-12">
<div class="max-w-xs">
<div class="flex items-center gap-3 mb-6">
<div class="text-[#0c1c1d]">
<svg class="size-6" fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
<path d="M13.8261 30.5736C16.7203 29.8826 20.2244 29.4783 24 29.4783C27.7756 29.4783 31.2797 29.8826 34.1739 30.5736C36.9144 31.2278 39.9967 32.7669 41.3563 33.8352L24.8486 7.36089C24.4571 6.73303 23.5429 6.73303 23.1514 7.36089L6.64374 33.8352C8.00331 32.7669 11.0856 31.2278 13.8261 30.5736Z" fill="currentColor"></path>
</svg>
</div>
<span class="text-xl font-black uppercase tracking-tight">SocBoost+</span>
</div>
<p class="text-sm text-gray-500 leading-relaxed font-medium">
                The disciplined infrastructure for social proof. Built for brands that value account safety and professional standards.
            </p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-12">
<div>
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-[#0c1c1d]">Core</h5>
<ul class="space-y-2 text-sm text-gray-400 font-bold">
<li><a class="hover:text-tiktok-red transition-colors" href="{{ route('about') }}">About Us</a></li>
<li><a class="hover:text-tiktok-red transition-colors" href="#">System Status</a></li>
<li><a class="hover:text-tiktok-purple transition-colors" href="#">Ethics Code</a></li>
<li><a class="hover:text-tiktok-cyan transition-colors" href="#">Risk Disclosure</a></li>
</ul>
</div>
<div>
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-[#0c1c1d]">Help</h5>
<ul class="space-y-2 text-sm text-gray-400 font-bold">
<li><a class="hover:text-[#0c1c1d] transition-colors" href="{{ route('contact') }}">Contact Us</a></li>
<li><a class="hover:text-[#0c1c1d] transition-colors" href="{{ route('refund-policy') }}">Refund Policy</a></li>
<li><a class="hover:text-[#0c1c1d] transition-colors" href="#">FAQ</a></li>
<li><a class="hover:text-[#0c1c1d] transition-colors" href="{{ route('terms') }}">Terms of Service</a></li>
<li><a class="hover:text-[#0c1c1d] transition-colors" href="{{ route('privacy') }}">Privacy Policy</a></li>
</ul>
</div>
<div class="col-span-2 md:col-span-1">
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-[#0c1c1d]">Protocol</h5>
<div class="flex gap-2">
<input class="bg-gray-50 border-gray-100 rounded-xl text-sm focus:ring-1 focus:ring-tiktok-purple w-full font-medium" placeholder="Alerts email" type="email"/>
<button class="bg-[#0c1c1d] text-white p-3 rounded-xl hover:bg-tiktok-red transition-colors">
<span class="material-symbols-outlined text-sm">notifications</span>
</button>
</div>
</div>
</div>
</div>
<div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-gray-100 text-center text-[10px] text-gray-400 font-bold uppercase tracking-widest">
        © 2024 SocBoost+ Infrastructure Group. Independently operated. Not affiliated with TikTok or Meta.
    </div>
</footer>

</body></html>
