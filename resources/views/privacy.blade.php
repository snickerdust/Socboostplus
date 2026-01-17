<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Privacy Policy | SocBoost+</title>
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
            .legal-sidebar-link {
                @apply block py-2 text-sm text-gray-500 hover:text-charcoal transition-colors border-l-2 border-transparent pl-4;
            }
            .legal-sidebar-link.active {
                @apply text-charcoal border-charcoal font-semibold;
            }
            html {
                scroll-behavior: smooth;
            }
        }
    </style>
</head>
<body class="bg-background-light font-display text-charcoal transition-colors duration-300">

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

<main class="max-w-[1200px] mx-auto px-6 py-20 mt-16">
<div class="mb-20">
<h1 class="text-5xl md:text-6xl font-black tracking-tight mb-4">Privacy Policy</h1>
<p class="text-sm font-bold uppercase tracking-widest text-gray-400">Last Updated: January 2025</p>
</div>
<div class="flex flex-col md:flex-row gap-16">
<aside class="w-full md:w-64 flex-shrink-0 sticky top-32 h-fit hidden md:block">
<nav class="space-y-1">
<a class="legal-sidebar-link active" href="#the-basics">The Basics</a>
<a class="legal-sidebar-link" href="#info-collect">Information We Collect</a>
<a class="legal-sidebar-link" href="#use-of-info">Use of Information</a>
<a class="legal-sidebar-link" href="#disclosure">Disclosure</a>
<a class="legal-sidebar-link" href="#security">Security</a>
<a class="legal-sidebar-link" href="#data-retention">Data Retention</a>
<a class="legal-sidebar-link" href="#your-rights">Your Rights</a>
<a class="legal-sidebar-link" href="#cookies">Cookies</a>
<a class="legal-sidebar-link" href="#compliance">Legal Compliance</a>
</nav>
</aside>
<div class="flex-1 max-w-3xl">
<section class="mb-16" id="the-basics">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">1. The Basics</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>At SocBoost+, we prioritize the privacy and security of our clients above all else. This Privacy Policy describes how we collect, use, and handle your information when you use our infrastructure services.</p>
<p>Our commitment is clear: <strong>SocBoost+ does not sell, rent, or redistribute your personal information to third parties.</strong> Your data is used exclusively to facilitate our delivery protocols and ensure the integrity of your growth metrics.</p>
</div>
</section>
<section class="mb-16" id="info-collect">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">2. Information We Collect</h2>
<div class="space-y-6 text-gray-600 leading-relaxed text-[17px]">
<p>We only collect the minimum amount of information required to provide professional-grade social proof infrastructure.</p>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
<div class="p-6 rounded-2xl bg-gray-50 border border-gray-100">
<h3 class="text-xs font-black uppercase tracking-widest text-charcoal mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-black text-sm">person</span>
                                Personal Information
                            </h3>
<ul class="text-sm space-y-2 font-medium">
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-black rounded-full"></span> Email Address</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-black rounded-full"></span> Platform Username</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-black rounded-full"></span> Order History</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-black rounded-full"></span> IP Address (Security Logging)</li>
</ul>
</div>
<div class="p-6 rounded-2xl bg-gray-50 border border-gray-100">
<h3 class="text-xs font-black uppercase tracking-widest text-tiktok-red mb-4 flex items-center gap-2">
<span class="material-symbols-outlined text-sm">no_accounts</span>
                                What We Do NOT Collect
                            </h3>
<ul class="text-sm space-y-2 font-medium">
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-tiktok-red rounded-full"></span> Platform Passwords</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-tiktok-red rounded-full"></span> 2FA Recovery Codes</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-tiktok-red rounded-full"></span> Private Direct Messages</li>
<li class="flex items-center gap-2"><span class="w-1 h-1 bg-tiktok-red rounded-full"></span> Credit Card Numbers</li>
</ul>
</div>
</div>
</div>
</section>
<section class="mb-16" id="use-of-info">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">3. Use of Information</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>Your information is processed for the following specific purposes:</p>
<ul class="list-disc pl-5 space-y-2">
<li>Provisioning and maintaining our delivery infrastructure.</li>
<li>Notifying you about the status of your orders.</li>
<li>Protecting against fraud and unauthorized access.</li>
<li>Improving our proprietary growth algorithms based on anonymized performance data.</li>
</ul>
</div>
</section>
<section class="mb-16" id="disclosure">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">4. Disclosure</h2>
<div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 mb-6">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-tiktok-purple mt-1">policy</span>
<div class="space-y-3">
<p class="font-bold text-charcoal text-lg">Strict Non-Disclosure Guarantee</p>
<p class="text-sm text-gray-600 leading-relaxed">SocBoost+ maintains a zero-sharing policy. We do not sell user data to marketing firms, analytics providers, or any other entities. Data is only shared when required by law or to protect our legal rights.</p>
</div>
</div>
</div>
</section>
<section class="mb-16" id="security">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">5. Security</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>We implement enterprise-grade security protocols to protect your information:</p>
<ul class="list-disc pl-5 space-y-2">
<li>End-to-end encryption for all API transmissions.</li>
<li>Regular automated security audits of our delivery nodes.</li>
<li>Strict internal access controls ensuring only necessary personnel interact with account identifiers.</li>
</ul>
</div>
</section>
<section class="mb-16" id="data-retention">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">6. Data Retention</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>We retain your personal information only for as long as necessary to provide our services and comply with legal obligations. Completed order data is archived after 365 days and subsequently anonymized for internal reporting.</p>
</div>
</section>
<section class="mb-16" id="your-rights">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">7. Your Rights</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>Regardless of your location, we provide the following rights to all our users:</p>
<ul class="list-disc pl-5 space-y-2">
<li><strong>Right to Access:</strong> Request a copy of the data we hold on you.</li>
<li><strong>Right to Rectification:</strong> Correct any inaccurate information.</li>
<li><strong>Right to Erasure:</strong> Request the deletion of your account and associated data.</li>
<li><strong>Right to Object:</strong> Object to the processing of your data for specific purposes.</li>
</ul>
</div>
</section>
<section class="mb-16" id="cookies">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">8. Cookies</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>We use essential cookies to maintain your session and ensure the dashboard functions correctly. We do not use third-party tracking or advertising cookies.</p>
</div>
</section>
<section class="mb-16" id="compliance">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">9. Legal Compliance</h2>
<div class="space-y-8">
<div class="border-t border-gray-100 pt-8" id="gdpr">
<h3 class="text-lg font-black mb-4 text-charcoal uppercase tracking-tight">GDPR Compliance</h3>
<p class="text-gray-600 leading-relaxed text-[17px]">For users in the European Economic Area (EEA), we process data in accordance with the General Data Protection Regulation (GDPR). Our lawful basis for processing includes contract fulfillment and legitimate interest in providing secure infrastructure services.</p>
</div>
<div class="border-t border-gray-100 pt-8" id="ccpa">
<h3 class="text-lg font-black mb-4 text-charcoal uppercase tracking-tight">CCPA Compliance</h3>
<p class="text-gray-600 leading-relaxed text-[17px]">For California residents, the California Consumer Privacy Act (CCPA) provides specific rights regarding personal information. SocBoost+ confirms that we do not sell your personal information as defined by the CCPA.</p>
</div>
</div>
</section>
</div>
</div>
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
    window.addEventListener('scroll', () => {
        const sections = document.querySelectorAll('section');
        const navLinks = document.querySelectorAll('.legal-sidebar-link');
        let current = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.pageYOffset >= sectionTop - 150) {
                current = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current)) {
                link.classList.add('active');
            }
        });
    });
</script>

</body></html>
