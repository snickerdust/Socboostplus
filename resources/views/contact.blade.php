<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Contact Support | SocBoost+</title>
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
                        "charcoal": "#0c1c1d",
                        "background-light": "#ffffff",
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
            .tiktok-glow {
                box-shadow: 0 0 20px -5px rgba(254, 44, 85, 0.3), 0 0 20px -5px rgba(37, 244, 238, 0.3);
            }
            .support-card {
                @apply p-8 rounded-2xl bg-white border border-gray-100 hover:border-gray-200 transition-all duration-300 hover:shadow-xl hover:shadow-gray-100/50;
            }
            .gradient-accent {
                background: linear-gradient(90deg, #FE2C55 0%, #A259FF 50%, #25F4EE 100%);
            }
            details summary::-webkit-details-marker {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-background-light font-display text-charcoal selection:bg-tiktok-cyan/30">

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

<main class="mt-16">
<section class="max-w-[1200px] mx-auto px-6 pt-24 pb-16">
<h1 class="text-5xl md:text-7xl font-black tracking-tight mb-6">Contact Us</h1>
<p class="text-xl text-gray-500 max-w-2xl font-medium leading-relaxed">
            Get in touch with SocBoost+. Our infrastructure experts are here to assist with any technical or account-related inquiries.
        </p>
</section>
<section class="max-w-[1200px] mx-auto px-6 mb-24">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
<div class="support-card group">
<span class="material-symbols-outlined text-gray-400 group-hover:text-charcoal transition-colors mb-4 block">info</span>
<h3 class="font-black uppercase tracking-widest text-xs mb-2">General</h3>
<p class="text-sm text-gray-500 mb-6 font-medium">Platform questions and basic inquiries.</p>
<a class="text-sm font-bold border-b-2 border-tiktok-cyan" href="mailto:socboostplus@gmail.com">Contact Support</a>
</div>
<div class="support-card group">
<span class="material-symbols-outlined text-gray-400 group-hover:text-charcoal transition-colors mb-4 block">payments</span>
<h3 class="font-black uppercase tracking-widest text-xs mb-2">Billing</h3>
<p class="text-sm text-gray-500 mb-6 font-medium">Invoices, payments, and subscription management.</p>
<a class="text-sm font-bold border-b-2 border-tiktok-purple" href="mailto:socboostplus@gmail.com">Contact Support</a>
</div>
<div class="support-card group">
<span class="material-symbols-outlined text-gray-400 group-hover:text-charcoal transition-colors mb-4 block">package_2</span>
<h3 class="font-black uppercase tracking-widest text-xs mb-2">Order Issues</h3>
<p class="text-sm text-gray-500 mb-6 font-medium">Tracking, delivery delays, or refills.</p>
<a class="text-sm font-bold border-b-2 border-tiktok-red" href="mailto:socboostplus@gmail.com">Contact Support</a>
</div>
<div class="support-card group">
<span class="material-symbols-outlined text-gray-400 group-hover:text-charcoal transition-colors mb-4 block">gavel</span>
<h3 class="font-black uppercase tracking-widest text-xs mb-2">Legal</h3>
<p class="text-sm text-gray-500 mb-6 font-medium">Privacy policy and terms of service queries.</p>
<a class="text-sm font-bold border-b-2 border-charcoal" href="mailto:socboostplus@gmail.com">Contact Support</a>
</div>
</div>
</section>
<section class="bg-gray-50 py-24 border-y border-gray-100">
<div class="max-w-[1200px] mx-auto px-6">
<div class="mb-12">
<h2 class="text-3xl font-black mb-4 uppercase tracking-tight">Our Support Commitment</h2>
<div class="h-1 w-24 gradient-accent"></div>
</div>
<div class="grid md:grid-cols-2 gap-8">
<div class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-tiktok-red/5 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition-transform"></div>
<span class="material-symbols-outlined text-3xl mb-6 text-tiktok-red">diversity_3</span>
<h4 class="text-xl font-black mb-3">Human Support, Not Bots</h4>
<p class="text-gray-500 font-medium leading-relaxed">
                        Every ticket is handled by a real human specialist. We don't use automated AI responses for support, ensuring your unique needs are understood and met.
                    </p>
</div>
<div class="bg-white p-10 rounded-3xl border border-gray-100 shadow-sm relative overflow-hidden group">
<div class="absolute top-0 right-0 w-32 h-32 bg-tiktok-cyan/5 rounded-full -mr-16 -mt-16 group-hover:scale-110 transition-transform"></div>
<span class="material-symbols-outlined text-3xl mb-6 text-tiktok-cyan">schedule</span>
<h4 class="text-xl font-black mb-3">Response Time: 24-72 Hours</h4>
<p class="text-gray-500 font-medium leading-relaxed">
                        We maintain a strict protocol for response times. While most tickets are addressed within a day, we guarantee a thorough response within 72 hours.
                    </p>
</div>
</div>
</div>
</section>
<section class="max-w-[1200px] mx-auto px-6 py-24">
<div class="text-center mb-16">
<h2 class="text-3xl font-black mb-4 uppercase tracking-tight">Before You Contact Us</h2>
<p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Self-service verification checklist</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
<div class="p-6 bg-white border border-gray-100 rounded-2xl">
<div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4 font-black text-sm">01</div>
<h5 class="font-black text-sm mb-2 uppercase">Order Status</h5>
<p class="text-xs text-gray-500 font-medium leading-relaxed">Please wait 24-48 hours after ordering before reporting a delay. Most deliveries start instantly.</p>
</div>
<div class="p-6 bg-white border border-gray-100 rounded-2xl">
<div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4 font-black text-sm">02</div>
<h5 class="font-black text-sm mb-2 uppercase">Refills</h5>
<p class="text-xs text-gray-500 font-medium leading-relaxed">If you experience a drop, ensure your order is within the refill guarantee period before emailing.</p>
</div>
<div class="p-6 bg-white border border-gray-100 rounded-2xl">
<div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4 font-black text-sm">03</div>
<h5 class="font-black text-sm mb-2 uppercase">Refunds</h5>
<p class="text-xs text-gray-500 font-medium leading-relaxed">Refunds are only processed if the delivery protocol fails. Review our refund policy first.</p>
</div>
<div class="p-6 bg-white border border-gray-100 rounded-2xl">
<div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4 font-black text-sm">04</div>
<h5 class="font-black text-sm mb-2 uppercase">Public Account</h5>
<p class="text-xs text-gray-500 font-medium leading-relaxed">Verify that your account and video settings are set to "Public". Private accounts block delivery.</p>
</div>
</div>
</section>
<section class="max-w-[1200px] mx-auto px-6 mb-24">
<div class="bg-charcoal rounded-[2rem] p-8 md:p-16 text-white relative overflow-hidden tiktok-glow">
<div class="absolute top-0 left-0 w-full h-1 gradient-accent"></div>
<div class="grid lg:grid-cols-2 gap-12 items-center">
<div>
<h2 class="text-4xl font-black mb-6">How To Reach Us</h2>
<p class="text-gray-400 mb-8 font-medium">To expedite your request, please send an email with the required information to our primary support address.</p>
<div class="bg-white/10 p-6 rounded-2xl inline-block border border-white/10">
<p class="text-xs font-black uppercase tracking-[0.2em] text-tiktok-cyan mb-2">Support Email</p>
<a class="text-2xl font-black tracking-tight hover:text-tiktok-cyan transition-colors" href="mailto:socboostplus@gmail.com">socboostplus@gmail.com</a>
</div>
</div>
<div class="bg-white/5 p-8 rounded-3xl border border-white/10">
<h4 class="text-sm font-black uppercase tracking-widest mb-6 flex items-center gap-2">
<span class="material-symbols-outlined text-tiktok-red">checklist</span>
                        Required Information
                    </h4>
<ul class="space-y-4">
<li class="flex items-center gap-3">
<span class="size-5 rounded-full bg-tiktok-red flex items-center justify-center text-[10px] font-black">1</span>
<span class="text-sm font-bold">Your Order # (from confirmation email)</span>
</li>
<li class="flex items-center gap-3">
<span class="size-5 rounded-full bg-tiktok-purple flex items-center justify-center text-[10px] font-black">2</span>
<span class="text-sm font-bold">Platform Username or Video Link</span>
</li>
<li class="flex items-center gap-3">
<span class="size-5 rounded-full bg-tiktok-cyan flex items-center justify-center text-[10px] font-black">3</span>
<span class="text-sm font-bold">Detailed Description of the Issue</span>
</li>
</ul>
</div>
</div>
</div>
</section>
<section class="max-w-[1200px] mx-auto px-6 mb-24">
<div class="bg-gray-50 rounded-2xl p-8 border border-gray-100 flex flex-col md:flex-row items-center gap-8">
<div class="bg-tiktok-red/10 p-6 rounded-full">
<span class="material-symbols-outlined text-4xl text-tiktok-red leading-none">shield_person</span>
</div>
<div class="flex-1 text-center md:text-left">
<h3 class="text-xl font-black mb-2 uppercase tracking-tight">Important Safety Note</h3>
<p class="text-gray-600 font-medium">
                    SocBoost+ Support will <strong class="text-charcoal underline">NEVER</strong> ask for your platform password, 2FA codes, or login credentials. If you receive a request for these, do not respond and report it immediately.
                </p>
</div>
</div>
</section>
<section class="max-w-[800px] mx-auto px-6 mb-32">
<div class="text-center mb-16">
<h2 class="text-3xl font-black mb-4 uppercase tracking-tight">FAQ</h2>
<p class="text-gray-500 font-bold uppercase tracking-widest text-xs">Common support queries</p>
</div>
<div class="space-y-4">
<details class="group border-b border-gray-100">
<summary class="flex items-center justify-between py-6 cursor-pointer list-none">
<span class="font-black text-charcoal uppercase tracking-tight">Can I change my username after ordering?</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="pb-6 text-gray-500 font-medium leading-relaxed">
                    No, once an order is entered into our infrastructure nodes, the destination link is locked. Changing your username during delivery will cause the order to fail without refund eligibility.
                </div>
</details>
<details class="group border-b border-gray-100">
<summary class="flex items-center justify-between py-6 cursor-pointer list-none">
<span class="font-black text-charcoal uppercase tracking-tight">My order says completed but I don't see anything?</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="pb-6 text-gray-500 font-medium leading-relaxed">
                    Please refresh your profile or app. Sometimes there is a minor caching delay between our server confirmation and your local device's UI. If it doesn't appear after 1 hour, contact us.
                </div>
</details>
<details class="group border-b border-gray-100">
<summary class="flex items-center justify-between py-6 cursor-pointer list-none">
<span class="font-black text-charcoal uppercase tracking-tight">Do you offer custom bulk discounts?</span>
<span class="material-symbols-outlined transition-transform group-open:rotate-180">expand_more</span>
</summary>
<div class="pb-6 text-gray-500 font-medium leading-relaxed">
                    Yes, for agencies or high-volume creators requiring over 1M units per month, please email us with the subject "BULK INFRASTRUCTURE REQUEST".
                </div>
</details>
</div>
</section>
</main>

<footer class="border-t border-gray-100 py-16 px-6 bg-white">
<div class="max-w-[1200px] mx-auto flex flex-col md:flex-row justify-between items-start gap-12">
<div class="max-w-xs">
<div class="flex items-center gap-3 mb-6">
<div class="text-charcoal">
<span class="material-symbols-outlined text-3xl">verified_user</span>
</div>
<span class="text-xl font-black uppercase tracking-tight">SocBoost+</span>
</div>
<p class="text-sm text-gray-500 leading-relaxed font-medium">
                The disciplined infrastructure for social proof. Built for brands that value account safety and professional standards.
            </p>
</div>
<div class="grid grid-cols-2 md:grid-cols-3 gap-12">
<div>
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-charcoal">Core</h5>
<ul class="space-y-2 text-sm text-gray-400 font-bold">
<li><a class="hover:text-tiktok-red transition-colors" href="{{ route('about') }}">About Us</a></li>
<li><a class="hover:text-tiktok-red transition-colors" href="#">System Status</a></li>
<li><a class="hover:text-tiktok-purple transition-colors" href="#">Ethics Code</a></li>
<li><a class="hover:text-tiktok-cyan transition-colors" href="#">Risk Disclosure</a></li>
</ul>
</div>
<div>
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-charcoal">Help</h5>
<ul class="space-y-2 text-sm text-gray-400 font-bold">
<li><a class="hover:text-charcoal transition-colors" href="{{ route('contact') }}">Contact Us</a></li>
<li><a class="hover:text-charcoal transition-colors" href="{{ route('refund-policy') }}">Refund Policy</a></li>
<li><a class="hover:text-charcoal transition-colors" href="#">FAQ</a></li>
<li><a class="hover:text-charcoal transition-colors" href="{{ route('terms') }}">Terms of Service</a></li>
<li><a class="hover:text-charcoal transition-colors" href="{{ route('privacy') }}">Privacy Policy</a></li>
</ul>
</div>
<div class="col-span-2 md:col-span-1">
<h5 class="text-xs font-black mb-4 uppercase tracking-[0.2em] text-charcoal">Protocol</h5>
<div class="flex gap-2">
<input class="bg-gray-50 border-gray-100 rounded-xl text-sm focus:ring-1 focus:ring-tiktok-purple w-full font-medium" placeholder="Alerts email" type="email"/>
<button class="bg-charcoal text-white p-3 rounded-xl hover:bg-tiktok-red transition-colors">
<span class="material-symbols-outlined text-sm">notifications</span>
</button>
</div>
</div>
</div>
</div>
<div class="max-w-[1200px] mx-auto mt-16 pt-8 border-t border-gray-100 text-center text-[10px] text-gray-400 font-bold uppercase tracking-widest">
        © 2025 SocBoost+ Infrastructure Group. Independently operated. Not affiliated with any third-party social networks.
    </div>
</footer>

</body></html>
