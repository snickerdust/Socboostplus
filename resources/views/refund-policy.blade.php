<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Refund &amp; Delivery Policy | SocBoost+</title>
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
            .legal-content h2 {
                @apply text-2xl font-black text-charcoal mt-12 mb-6 uppercase tracking-tight;
            }
            .legal-content h3 {
                @apply text-lg font-bold text-charcoal mt-8 mb-4 uppercase tracking-wide;
            }
            .legal-content p {
                @apply text-gray-600 leading-relaxed mb-6 font-medium;
            }
            .legal-content ul {
                @apply list-disc list-outside ml-5 mb-6 space-y-3 text-gray-600 font-medium;
            }
            .sidebar-link {
                @apply block py-2 text-sm font-bold text-gray-400 hover:text-charcoal transition-colors border-l-2 border-transparent pl-4;
            }
            .sidebar-link.active {
                @apply text-charcoal border-tiktok-cyan;
            }
            html {
                scroll-behavior: smooth;
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
<section class="pt-24 pb-12 text-center border-b border-gray-100">
<div class="max-w-[1200px] mx-auto px-6">
<p class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 mb-4">Legal Framework</p>
<h1 class="text-4xl md:text-6xl font-black tracking-tight text-charcoal mb-4">Refund &amp; Delivery Policy</h1>
<p class="text-sm font-bold text-gray-400 uppercase tracking-widest">Last Updated: January 2025</p>
</div>
</section>
<section class="max-w-[1200px] mx-auto px-6 py-20 flex flex-col md:flex-row gap-16">
<aside class="w-full md:w-64 flex-shrink-0">
<div class="sticky top-24">
<nav class="space-y-1">
<a class="sidebar-link active" href="#delivery-policy">Delivery Policy</a>
<a class="sidebar-link" href="#follower-drops">Follower Drops</a>
<a class="sidebar-link" href="#refund-eligibility">Refund Eligibility</a>
<a class="sidebar-link" href="#refund-exclusions">Refund Exclusions</a>
<a class="sidebar-link" href="#refund-process">Refund Process</a>
<a class="sidebar-link" href="#refill-policy">Refill Policy Details</a>
<a class="sidebar-link" href="#crypto-policy">Cryptocurrency Terms</a>
</nav>
</div>
</aside>
<article class="flex-1 legal-content">
<div id="delivery-policy">
<h2>1. Delivery Policy</h2>
<p>SocBoost+ utilizes a distributed infrastructure network to deliver social proof services. Once an order is confirmed, our system begins routing resources to your profile. Delivery timelines vary based on order size and network traffic.</p>
<ul>
<li><strong>Initial Start:</strong> Most orders begin within 0-6 hours.</li>
<li><strong>Completion Rate:</strong> Delivery speed is optimized to mimic organic growth and ensure account safety.</li>
<li><strong>Destination Locking:</strong> Once an order is processed, the destination link cannot be changed.</li>
</ul>
</div>
<div id="follower-drops">
<h2>2. Follower Drops</h2>
<p>Due to the nature of social media platforms, occasional "drops" in followers or engagement may occur as platforms perform routine database cleanups.</p>
<div class="bg-gray-50 border border-gray-100 p-8 rounded-2xl my-8">
<h4 class="text-xs font-black uppercase tracking-[0.2em] text-charcoal mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">analytics</span>
                        Normal Drop Range (5-15%)
                    </h4>
<p class="text-sm mb-0">Our infrastructure accounts for a natural variance. We typically over-deliver by 10% to compensate for immediate network fluctuations.</p>
</div>
</div>
<div id="refund-eligibility">
<h2>3. Refund Eligibility</h2>
<p>SocBoost+ offers refunds strictly in the event of a complete infrastructure failure. We prioritize service stability, but we recognize technical limitations.</p>
<ul>
<li>Order was not started within 72 hours of the purchase timestamp.</li>
<li>The system remains unable to fulfill the quantity ordered after 7 days of troubleshooting.</li>
<li>Double-payment due to gateway processing errors.</li>
</ul>
</div>
<div id="refund-exclusions">
<h2>4. Refund Exclusions</h2>
<p>Refunds will not be granted under the following circumstances:</p>
<ul>
<li><strong>Username Changes:</strong> Changing your handle while an order is active breaks the link and terminates delivery.</li>
<li><strong>Private Accounts:</strong> Setting your account to "Private" prevents our nodes from delivering content.</li>
<li><strong>Concurrent Orders:</strong> Ordering from multiple providers simultaneously makes it impossible to track our delivery.</li>
<li><strong>Order Satisfaction:</strong> Dissatisfaction with the "look" of accounts (we provide infrastructure, not curated persona management).</li>
</ul>
</div>
<div id="refund-process">
<h2>5. Refund Process</h2>
<p>To request a refund, follow these disciplined steps to ensure our support team can verify the logs.</p>
<div class="bg-gray-50 border border-gray-100 p-8 rounded-2xl my-8 space-y-6">
<div class="flex gap-4">
<span class="font-black text-tiktok-red">STEP 01</span>
<div>
<p class="text-sm font-bold text-charcoal mb-1">Verify Account Status</p>
<p class="text-xs text-gray-500 mb-0 leading-relaxed">Ensure your profile is public and the username matches your order confirmation email.</p>
</div>
</div>
<div class="flex gap-4">
<span class="font-black text-tiktok-purple">STEP 02</span>
<div>
<p class="text-sm font-bold text-charcoal mb-1">Email Support</p>
<p class="text-xs text-gray-500 mb-0 leading-relaxed">Send your Order ID and a screenshot of your current analytics to socboostplus@gmail.com.</p>
</div>
</div>
<div class="flex gap-4">
<span class="font-black text-tiktok-cyan">STEP 03</span>
<div>
<p class="text-sm font-bold text-charcoal mb-1">Verification Period</p>
<p class="text-xs text-gray-500 mb-0 leading-relaxed">Our technical team will audit the node logs. This process takes 24-72 hours.</p>
</div>
</div>
</div>
</div>
<div id="refill-policy">
<h2>6. Refill Policy Details</h2>
<p>Many of our premium services include a "Refill Guarantee." This is our commitment to maintaining your social proof levels.</p>
<ul>
<li><strong>Guarantee Period:</strong> 30 days from the date of purchase unless otherwise stated.</li>
<li><strong>Minimum Drop:</strong> Refills can be triggered once the count drops below the initial start count + ordered amount.</li>
<li><strong>Manual Request:</strong> Refills are not always automatic. Email support with your Order ID to trigger a refill cycle.</li>
</ul>
</div>
<div id="crypto-policy">
<h2 class="text-tiktok-purple">7. Cryptocurrency &amp; Digital Assets</h2>
<p>SocBoost+ accepts various cryptocurrencies. Due to the decentralized nature of these assets, specific terms apply:</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-8">
<div class="p-6 border border-gray-100 rounded-xl">
<h4 class="text-xs font-black uppercase tracking-widest mb-2 flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-tiktok-red">link_off</span>
                            Irreversibility
                        </h4>
<p class="text-xs text-gray-500 mb-0">Crypto transactions are irreversible on the blockchain. We cannot "void" or "chargeback" a crypto payment once confirmed.</p>
</div>
<div class="p-6 border border-gray-100 rounded-xl">
<h4 class="text-xs font-black uppercase tracking-widest mb-2 flex items-center gap-2">
<span class="material-symbols-outlined text-sm text-tiktok-cyan">trending_down</span>
                            Volatility
                        </h4>
<p class="text-xs text-gray-500 mb-0">Refunds for crypto payments are issued at the USD value at the time of purchase, not the coin amount. Volatility risk is held by the customer.</p>
</div>
</div>
<p>Any network fees (gas fees) associated with sending cryptocurrency are the responsibility of the customer and are non-refundable.</p>
</div>
<div class="mt-20 pt-12 border-t border-gray-100">
<h3 class="text-sm font-black uppercase tracking-widest mb-4">Contact Legal Dept</h3>
<p class="text-sm">For formal inquiries regarding these policies, please reach out to <a class="text-charcoal underline font-bold" href="mailto:socboostplus@gmail.com">socboostplus@gmail.com</a> with the subject line "LEGAL INQUIRY".</p>
</div>
</article>
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
<script>
    // Simple intersection observer to update active link in sidebar
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                document.querySelectorAll('.sidebar-link').forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${entry.target.id}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }, observerOptions);
    document.querySelectorAll('.legal-content > div').forEach(section => {
        observer.observe(section);
    });
</script>

</body></html>
