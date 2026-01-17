<!DOCTYPE html>
<html class="light" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Terms of Service | SocBoost+</title>
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
<div class="mb-12">
<div class="mb-12 p-1 border-2 border-tiktok-red/20 rounded-2xl bg-tiktok-red/[0.02]">
<div class="p-8 rounded-xl bg-white border border-tiktok-red/10 flex flex-col md:flex-row gap-6 items-start">
<div class="bg-tiktok-red/10 p-4 rounded-xl">
<span class="material-symbols-outlined text-tiktok-red text-3xl">gavel</span>
</div>
<div>
<h3 class="text-xl font-black text-tiktok-red uppercase tracking-tight mb-2">ASSUMPTION OF RISK - READ CAREFULLY</h3>
<p class="text-gray-600 leading-relaxed font-medium">
                        BY ACCESSING THIS PLATFORM, YOU VOLUNTARILY ASSUME ALL RISKS RELATED TO SOCIAL MEDIA ACCOUNT INTEGRITY. SOCBOOST+ OPERATES AS AN INFRASTRUCTURE PROVIDER; WE ARE NOT RESPONSIBLE FOR THE ENFORCEMENT ACTIONS OF THIRD-PARTY NETWORKS. CONTINUED USE CONSTITUTES AN IRREVOCABLE WAIVER OF LIABILITY.
                    </p>
</div>
</div>
</div>
<h1 class="text-5xl md:text-6xl font-black tracking-tight mb-4">Terms of Service</h1>
<p class="text-sm font-bold uppercase tracking-widest text-gray-400">Last Updated: January 2025</p>
</div>
<div class="flex flex-col md:flex-row gap-16">
<aside class="w-full md:w-64 flex-shrink-0 sticky top-32 h-fit hidden md:block">
<nav class="space-y-1">
<a class="legal-sidebar-link active" href="#acceptance">1. Acceptance</a>
<a class="legal-sidebar-link" href="#platform-acknowledgment">2. Platform Policy</a>
<a class="legal-sidebar-link" href="#service-description">3. Service Description</a>
<a class="legal-sidebar-link" href="#use-license">4. Use License</a>
<a class="legal-sidebar-link" href="#warranty-disclaimer">5. Warranty Disclaimer</a>
<a class="legal-sidebar-link" href="#liability">6. Liability &amp; Risk</a>
<a class="legal-sidebar-link" href="#indemnification">7. Indemnification</a>
<a class="legal-sidebar-link" href="#arbitration">8. Arbitration &amp; Waiver</a>
<a class="legal-sidebar-link" href="#evidence-claims">9. Evidence &amp; Time Limits</a>
<a class="legal-sidebar-link" href="#refund-policy">10. Refund Policy</a>
<a class="legal-sidebar-link" href="#governing-law">11. Governing Law</a>
<a class="legal-sidebar-link" href="#service-affiliation">12. Service Affiliation</a>
</nav>
</aside>
<div class="flex-1 max-w-3xl">
<section class="mb-16" id="acceptance">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">1. Acceptance of Terms</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>By accessing and using the services provided by SocBoost+ ("the Service"), you agree to be bound by these Terms of Service. If you do not agree to all of these terms, you are prohibited from using the Service.</p>
<p>We reserve the right to modify these terms at any time. Your continued use of the Service following any changes constitutes your acceptance of the new terms.</p>
</div>
</section>
<section class="mb-16" id="platform-acknowledgment">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">2. PLATFORM POLICY ACKNOWLEDGMENT</h2>
<div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 mb-6">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-tiktok-red mt-1">security</span>
<div class="space-y-3">
<p class="font-bold text-charcoal uppercase tracking-tight">ENFORCEMENT RISK AWARENESS</p>
<p class="text-sm text-gray-600 leading-relaxed">User acknowledges that social media platforms (the "Target Platforms") prohibit artificial manipulation of metrics. User confirms they are aware that use of SocBoost+ may violate the Terms of Service of Target Platforms, potentially resulting in account suspension, content removal, or permanent bans. User accepts full responsibility for such outcomes.</p>
</div>
</div>
</div>
</section>
<section class="mb-16" id="service-description">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">3. Service Description</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>SocBoost+ provides infrastructure for social proof, including but not limited to views and follower growth metrics. Our services are intended for professional brands, creators, and agencies looking to establish initial credibility.</p>
<ul class="list-disc pl-5 space-y-2">
<li>Username-only delivery protocol.</li>
<li>Gradual, non-linear growth patterns.</li>
<li>High-quality profile markers for social signals.</li>
</ul>
</div>
</section>
<section class="mb-16" id="use-license">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">4. Use License</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>Permission is granted to temporarily use the materials and services on SocBoost+ for personal or commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license, you may not:</p>
<ul class="list-disc pl-5 space-y-2">
<li>Attempt to decompile or reverse engineer any software contained on the Service;</li>
<li>Remove any copyright or other proprietary notations;</li>
<li>Use the service for any illegal or unauthorized purpose;</li>
<li>Violate any laws in your jurisdiction.</li>
</ul>
</div>
</section>
<section class="mb-16" id="warranty-disclaimer">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">5. WARRANTY DISCLAIMER</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px] font-bold">
<p class="uppercase">THE SERVICE IS PROVIDED "AS IS" AND "AS AVAILABLE." SOCBOOST+ MAKES NO WARRANTIES, EXPRESSED OR IMPLIED, AND HEREBY DISCLAIMS AND NEGATES ALL OTHER WARRANTIES INCLUDING, WITHOUT LIMITATION, IMPLIED WARRANTIES OR CONDITIONS OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, OR NON-INFRINGEMENT OF INTELLECTUAL PROPERTY OR OTHER VIOLATION OF RIGHTS.</p>
<p class="uppercase">WE DO NOT WARRANT THAT THE RESULTS OBTAINED FROM THE USE OF THE SERVICE WILL BE ACCURATE, RELIABLE, OR PERMANENT.</p>
</div>
</section>
<section class="mb-16" id="liability">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">6. USER'S ASSUMPTION OF RISK &amp; ZERO LIABILITY</h2>
<div class="space-y-6 text-gray-600 leading-relaxed text-[17px]">
<div class="bg-charcoal text-white p-8 rounded-xl border-l-4 border-tiktok-red">
<div class="flex items-center gap-3 mb-4">
<span class="material-symbols-outlined text-tiktok-red">warning</span>
<p class="text-sm font-bold uppercase tracking-widest opacity-80">Voluntary Informed Usage</p>
</div>
<p class="text-lg font-bold leading-snug mb-4">BY PURCHASING OR USING ANY SERVICE, THE USER ACKNOWLEDGES THEY ARE FULLY AWARE OF ALL PLATFORM RISKS AND VOLUNTARILY CHOOSES TO PROCEED AT THEIR OWN DISCRETION.</p>
<p class="text-base opacity-90 leading-relaxed italic border-t border-white/10 pt-4">
                            SocBoost+ shall have <span class="text-tiktok-red font-black uppercase">ZERO liability</span> for any platform-side consequences—including but not limited to account bans, metric drops, reach reduction, shadow-bans, or content removal. The user acknowledges that they have made an informed decision to use a third-party service and assumes 100% of the associated risk. No damages, compensation, or restorative actions will be provided for third-party enforcement actions.
                        </p>
</div>
<div class="border-t border-gray-100 pt-6" id="crypto-protection">
<h3 class="text-lg font-black mb-4 uppercase flex items-center gap-2">
<span class="material-symbols-outlined text-primary">currency_bitcoin</span>
                            CRYPTOCURRENCY-SPECIFIC PROTECTION
                        </h3>
<p>User acknowledges the inherent nature of blockchain technology. All cryptocurrency transactions are <strong>final and irreversible</strong>. SocBoost+ is not responsible for losses due to user error, including but not limited to:</p>
<ul class="list-disc pl-5 mt-3 space-y-2 text-sm">
<li>Sending funds to incorrect wallet addresses.</li>
<li>Using unsupported blockchain networks.</li>
<li>Insufficient network (gas) fees resulting in stuck transactions.</li>
<li>Market volatility occurring between invoice generation and payment confirmation.</li>
</ul>
</div>
</div>
</section>
<section class="mb-16" id="indemnification">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">7. ENHANCED INDEMNIFICATION AND LEGAL DEFENSE</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>You agree to indemnify, defend, and hold harmless SocBoost+, its officers, directors, and employees, from and against all claims, losses, expenses, damages and costs, including reasonable attorneys' fees, resulting from (a) any violation of these terms, (b) your use of the Service, or (c) any activity related to your account (including negligent or wrongful conduct) by you or any other person accessing the Service using your account.</p>
<p class="font-bold">You specifically agree to cover all costs for legal defense should SocBoost+ be named as a third party in any litigation brought against you by a social media platform.</p>
</div>
</section>
<section class="mb-16" id="arbitration">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">8. BINDING ARBITRATION AND CLASS ACTION WAIVER</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>All disputes arising out of or relating to these Terms shall be resolved through binding confidential arbitration. You waive your right to a trial by jury.</p>
<div class="bg-tiktok-red text-white p-6 rounded-xl font-black uppercase tracking-tight">
                        CLASS ACTION WAIVER: YOU AGREE THAT ANY PROCEEDINGS TO RESOLVE DISPUTES WILL BE CONDUCTED SOLELY ON AN INDIVIDUAL BASIS AND NOT IN A CLASS, CONSOLIDATED, OR REPRESENTATIVE ACTION.
                    </div>
</div>
</section>
<section class="mb-16" id="evidence-claims">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">9. EVIDENCE &amp; TIME LIMITS</h2>
<div class="grid md:grid-cols-2 gap-8">
<div class="space-y-4">
<h3 class="font-bold uppercase text-sm tracking-widest text-gray-400">AGREEMENT TO EVIDENCE</h3>
<p class="text-sm text-gray-600">You agree that SocBoost+ server logs, delivery receipts, and internal database records constitute conclusive evidence of service delivery. You waive the right to challenge these records in any dispute or arbitration proceeding.</p>
</div>
<div class="space-y-4">
<h3 class="font-bold uppercase text-sm tracking-widest text-gray-400">TIME LIMIT FOR CLAIMS</h3>
<p class="text-sm text-gray-600 bg-gray-50 p-4 border border-gray-100 rounded-lg">YOU AGREE THAT ANY CAUSE OF ACTION ARISING OUT OF OR RELATED TO THE SERVICES MUST COMMENCE WITHIN <strong>SIX (6) MONTHS</strong> AFTER THE CAUSE OF ACTION ACCRUES. OTHERWISE, SUCH CAUSE OF ACTION IS PERMANENTLY BARRED.</p>
</div>
</div>
</section>
<section class="mb-16" id="refund-policy">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">10. Refund Policy</h2>
<div class="p-8 rounded-2xl bg-gray-50 border border-gray-100 mb-6">
<div class="flex items-start gap-4">
<span class="material-symbols-outlined text-tiktok-purple mt-1">payments</span>
<div class="space-y-3">
<p class="font-bold text-charcoal">Refund Process &amp; Eligibility</p>
<p class="text-sm text-gray-600 leading-relaxed">Refunds are issued solely at the discretion of SocBoost+. Due to the digital nature of the infrastructure provided, we generally do not offer refunds once delivery has commenced. If a delivery fails to reach the specified amount within 72 hours of the estimated timeframe, a refill or partial refund may be requested.</p>
</div>
</div>
</div>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>Refunds will not be granted for accounts that are private, deleted, or have changed usernames during the delivery period. All refund requests must be submitted through our human support channel within 14 days of purchase.</p>
</div>
</section>
<section class="mb-16" id="governing-law">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">11. Governing Law</h2>
<div class="space-y-4 text-gray-600 leading-relaxed text-[17px]">
<p>These terms and conditions are governed by and construed in accordance with the laws of the jurisdiction in which the SocBoost+ Infrastructure Group operates and you irrevocably submit to the exclusive jurisdiction of the courts in that location.</p>
</div>
</section>
<section class="mb-16" id="service-affiliation">
<h2 class="text-2xl font-black mb-6 text-charcoal uppercase tracking-tight">12. SERVICE AFFILIATION AND CONDITIONS</h2>
<div class="space-y-6 text-gray-600 leading-relaxed text-[17px]">
<div class="p-6 border-2 border-charcoal/5 rounded-2xl bg-gray-50/50">
<p class="font-bold text-charcoal mb-4">A. NON-AFFILIATION DISCLAIMER</p>
<p class="text-sm mb-4">SocBoost+ is an independent infrastructure provider. We are <strong>not affiliated with, associated, authorized, endorsed by, or in any way officially connected with</strong> Instagram, TikTok, Facebook, Meta, ByteDance, or any of their subsidiaries or affiliates.</p>
</div>
<div class="space-y-4">
<div class="flex gap-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">noise_control_off</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Compliance &amp; Risk</p>
<p class="text-sm">The user is solely responsible for compliance with any rules or terms of service of the social media platforms they utilize. Usage of SocBoost+ is strictly at the user's "own risk."</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">no_accounts</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Liability for Penalties</p>
<p class="text-sm">SocBoost+ disclaims all liability for any account bans, shadow-bans, restrictions, content removals, or permanent deletions imposed by third-party platforms.</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">vpn_key</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Privacy &amp; Credentials</p>
<p class="text-sm">We strictly operate on a username-only requirement. We will never ask for your account password. Keeping your account credentials secure is your sole responsibility.</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">analytics</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Operational Guarantees</p>
<p class="text-sm">We provide no guarantee of specific follower, like, or view counts being maintained permanently. Furthermore, we do not guarantee that the service will be uninterrupted or error-free at all times.</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">public</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Account Accessibility</p>
<p class="text-sm">It is the customer's responsibility to keep accounts "public" during the delivery window. Making an account private during delivery voids any refill or support obligations.</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">report_problem</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Dispute Integrity</p>
<p class="text-sm">By using our services, you agree not to file fraudulent disputes or chargebacks. Any such action will result in permanent blacklisting from our infrastructure.</p>
</div>
</div>
<div class="flex gap-4 border-t border-gray-100 pt-4">
<span class="material-symbols-outlined text-charcoal/40 text-sm mt-1">edit_notifications</span>
<div>
<p class="font-bold text-charcoal text-sm uppercase">Modifications</p>
<p class="text-sm">SocBoost+ reserves the right to modify, suspend, or withdraw any part of the service without prior notice. It is the user's responsibility to monitor this page for changes to these terms.</p>
</div>
</div>
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
