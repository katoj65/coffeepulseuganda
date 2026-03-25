<script setup>
import { Link } from '@inertiajs/vue3';
import PublicHeader from '../Components/PublicHeader.vue';
import PublicFooter from '../Components/PublicFooter.vue';
import headerLogo from '../../images/logo.png';
import everistImage from '../../images/everist.png';
import joshuaImage from '../../images/joshua.png';
</script>

<template>
<div>
<PublicHeader>
<template #nav>
<Link :href="route('about')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">About</Link>
<Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
<Link :href="`${route('home')}#global-scale`" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
<Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
</template>
</PublicHeader>
<main>
<!-- Section 0: Redesigned Company Profile Hero (Asymmetrical Grid) -->
<section class="bg-surface relative overflow-hidden">
<div class="container-bs">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-center">
<!-- Left Column (Asymmetrical Logo Container) -->
<div class="lg:col-span-5 order-2 lg:order-1">
<div class="relative">
<!-- Modern Geometric Shape Backdrop -->
<div class="absolute -top-12 -left-12 w-64 h-64 bg-tertiary/5 rounded-full blur-3xl"></div>
<div class="relative z-10 p-12 lg:p-16 bg-white backdrop-blur-sm rounded-[2rem] lg:rounded-[4rem] flex flex-col items-center lg:items-start transition-all duration-500">
<img :src="headerLogo" alt="Coffee Pulse Uganda Logo" class="w-80 h-80 rounded-2xl mb-8 object-contain" />
</div>
<!-- Decorative element -->
<div class="absolute -bottom-6 -right-6 w-32 h-32 border-r border-b border-tertiary/10 rounded-br-[3rem] hidden lg:block"></div>
</div>
</div>




<!-- Right Column (Modern Typographic Hierarchy) -->
<div class="lg:col-span-7 order-1 lg:order-2">
<div class="max-w-2xl">
<div class="flex items-center gap-4 mb-8">
<div class="h-[1px] w-8 bg-tertiary"></div>
<span class="text-tertiary text-[11px] font-bold uppercase tracking-[0.4em]">Company Profile</span>
</div>
<h1 class="font-headline text-5xl md:text-7xl font-bold text-primary mb-10 leading-[1.1] tracking-tight">
                            Bridging Tradition <br/>
<span class="flex items-center gap-6">
<span class="italic font-normal text-tertiary">&amp;</span>
<span>Technology</span>
</span>
</h1>
<div class="space-y-8">
<p class="text-primary text-2xl leading-snug font-medium tracking-tight">
                                Coffee Pulse Uganda is a dedicated Coffee Trading Company focused on Ethical Sourcing, committed to digitizing the Ugandan coffee supply chain.
                            </p>
<p class="text-secondary text-lg leading-relaxed font-light border-l-2 border-surface-container-highest pl-8">
                                We preserve the ancestral heritage of East African growers while ensuring they receive fair, transparent value through a direct, blockchain-verified global network. We aim to transform the industry from the roots up, ensuring every cup tells a story of integrity and innovation.
                            </p>
</div>
<div class="mt-12 flex flex-wrap items-center gap-8 py-6 border-y border-subtle">
<div class="flex items-center gap-3">
<span class="w-2 h-2 bg-tertiary/40 rounded-full"></span>
<span class="text-primary/60 text-[10px] font-bold uppercase tracking-[0.2em]">Established Heritage</span>
</div>
<div class="flex items-center gap-3">
<span class="w-2 h-2 bg-tertiary/40 rounded-full"></span>
<span class="text-primary/60 text-[10px] font-bold uppercase tracking-[0.2em]">East African Corridor</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section 1: 3-Column Mission, Vision, Objectives -->
<section class="bg-surface-container-low">
<div class="container-bs">
<div class="grid grid-cols-1 md:grid-cols-3 gap-12 lg:gap-16">
<!-- Mission -->
<div class="p-8 bg-surface border border-subtle transition-all duration-300 hover:border-tertiary/30">
<div class="mb-6 text-tertiary">
<span class="material-symbols-outlined text-4xl">flag</span>
</div>
<h3 class="font-headline text-lg font-bold text-primary mb-4 uppercase tracking-widest">Mission</h3>
<p class="text-secondary text-sm leading-relaxed">
                        To empower Ugandan coffee farmers by providing a transparent and ethical global marketplace for their premium harvests.
                    </p>
</div>
<!-- Vision -->
<div class="p-8 bg-surface border border-subtle transition-all duration-300 hover:border-tertiary/30">
<div class="mb-6 text-tertiary">
<span class="material-symbols-outlined text-4xl">visibility</span>
</div>
<h3 class="font-headline text-lg font-bold text-primary mb-4 uppercase tracking-widest">Vision</h3>
<p class="text-secondary text-sm leading-relaxed">
                        To be the world's most trusted partner for sustainably sourced, fully traceable Ugandan coffee.
                    </p>
</div>
<!-- Objectives -->
<div class="p-8 bg-surface border border-subtle transition-all duration-300 hover:border-tertiary/30">
<div class="mb-6 text-tertiary">
<span class="material-symbols-outlined text-4xl">task_alt</span>
</div>
<h3 class="font-headline text-lg font-bold text-primary mb-4 uppercase tracking-widest">Objectives</h3>
<p class="text-secondary text-sm leading-relaxed">
                        Ensure fair pricing, promote climate-smart agriculture, and provide 100% transparency from farm to export.
                    </p>
</div>
</div>
</div>
</section>
<!-- Section 2: Our Story (Refined Corporate Layout) -->
<section class="bg-surface">
<div class="container-bs">
<div class="flex flex-col lg:flex-row items-center gap-16">
<div class="lg:w-1/2">
<p class="text-tertiary text-[11px] font-bold uppercase tracking-[0.3em] mb-4">Our Origin Story</p>
<h2 class="font-headline text-4xl md:text-5xl font-bold text-primary mb-8 leading-tight">Empowering the <span class="italic font-normal">Source</span>.</h2>
<div class="space-y-6">
<p class="text-secondary text-lg leading-relaxed font-light">
                            At Coffee Pulse Uganda, we bridge the gap between tradition and technology. Our mission is to digitize the Ugandan coffee supply chain, ensuring every smallholder farmer finds a place in the global market through ethical, transparent trade.
                        </p>
<p class="text-secondary text-base leading-relaxed font-light italic border-l-2 border-tertiary/20 pl-6">
                            "We believe that by preserving the integrity of the bean—from soil to the digital marketplace—we can uplift entire communities and redefine the value of Ugandan coffee for the modern world."
                        </p>
</div>
</div>
<div class="lg:w-1/2">
<div class="relative bg-surface-container p-4">
<img alt="Ugandan coffee farmer drying beans" class="w-full aspect-[4/3] object-cover grayscale" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4SubS2RmxdPnaFgyFmSQnHTJOmEkE2sYctu7Qjc9nW_-qZ9aICGgA-lRVajW4et5EsXiJC75IDhwqbyYjOoq5U1K8gEBnLFFhgW27S2gBegSjjTiT7_mX9f5BYH99374_aOgyKWwGD5pwx1NSw503bEQooz4xuA1aMvMFsdEMcVP_y7gVBSdUVtO5LrP3Bhnoz5no2l1Ei5D-xd3wB0sizzlqhdGc9tyWmHphKEuBkWIoMmVbK8ThoxU31FnWVzdqSa4cOzCA0jI"/>
<div class="absolute -bottom-4 -left-4 bg-white text-primary p-6 max-w-xs hidden md:block rounded-lg shadow-lg">
<p class="text-sm font-light italic leading-relaxed">"Honoring the hands that harvest, ensuring the value returns to the roots."</p>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section 3: Professional Stats Grid -->
<section class="bg-surface-container-low border-y border-subtle">
<div class="container-bs">
<div class="grid grid-cols-1 md:grid-cols-3 divide-y md:divide-y-0 md:divide-x divide-subtle">
<div class="py-8 md:px-8 text-center">
<h3 class="font-headline text-4xl font-bold text-primary mb-2">1.7 Million</h3>
<p class="text-tertiary text-[11px] font-bold uppercase tracking-widest mb-4">Smallholder Farmers</p>
<p class="text-secondary text-sm leading-relaxed max-w-xs mx-auto">Connecting local heritage to global demand through Ethical Sourcing.</p>
</div>
<div class="py-8 md:px-8 text-center">
<h3 class="font-headline text-4xl font-bold text-primary mb-2">Direct Access</h3>
<p class="text-tertiary text-[11px] font-bold uppercase tracking-widest mb-4">Fair Value Exchange</p>
<p class="text-secondary text-sm leading-relaxed max-w-xs mx-auto">Removing unnecessary intermediaries to ensure value flows back to the growers.</p>
</div>
<div class="py-8 md:px-8 text-center">
<h3 class="font-headline text-4xl font-bold text-primary mb-2">Ethical Standard</h3>
<p class="text-tertiary text-[11px] font-bold uppercase tracking-widest mb-4">Quality Benchmark</p>
<p class="text-secondary text-sm leading-relaxed max-w-xs mx-auto">Setting the highest bar for quality and transparency in the East African corridor.</p>
</div>
</div>
</div>
</section>
<!-- Section 4: Leadership (Classy & Organized) -->
<section class="bg-surface">
<div class="container-bs">
<div class="text-center mb-16">
<p class="text-tertiary text-[11px] font-bold uppercase tracking-[0.3em] mb-4">Our Visionaries</p>
<h2 class="font-headline text-4xl font-bold text-primary">Our Leadership</h2>
<div class="w-12 h-0.5 bg-tertiary/30 mx-auto mt-6"></div>
</div>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
<!-- David Ssebunya Profile -->
<div class="flex flex-col md:flex-row gap-8 items-start">
<div class="w-full md:w-48 shrink-0">
<img alt="Everist Asiimwe" class="w-full aspect-[4/5] object-cover grayscale border border-subtle" :src="everistImage" />
</div>
<div class="flex-1">
<h3 class="font-headline text-xl font-bold text-primary mb-1">Evarist Asiimwe</h3>
<p class="text-tertiary text-[10px] font-bold uppercase tracking-widest mb-4">Chief Executive Officer</p>
<p class="text-secondary text-sm leading-relaxed mb-6 font-light">
                           A businessman with over 20 years of experience, Everist specializes in coffee trade and agriculture. He holds a Diploma in Business Administration from St. Lawrence University, a BBA from Avance International University, and a background in Industrial Art and Design from Kyambogo University, driving growth through strategy, innovation, and trusted partnerships.
                        </p>
<div class="space-y-3 pt-4 border-t border-subtle">
<a class="flex items-center gap-3 text-xs text-secondary hover:text-primary transition-colors" href="mailto:david.s@beanorigin.co.ug">
<span class="material-symbols-outlined text-sm">mail</span> evarist@coffeepulseuganda.com
                            </a>
<a class="flex items-center gap-3 text-xs text-secondary hover:text-primary transition-colors" href="tel:+256700000001">
<span class="material-symbols-outlined text-sm">call</span> +256 788693298
                            </a>
</div>
<div class="flex gap-4 mt-6">
<a class="text-primary/60 hover:text-primary transition-colors" href="#">
<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
</a>
<a class="text-primary/60 hover:text-primary transition-colors" href="#">
<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932 6.064-6.932zm-1.292 19.49h2.039L6.486 3.24H4.298l13.311 17.403z"></path></svg>
</a>
</div>
</div>
</div>
<!-- Grace Namatovu Profile -->
<div class="flex flex-col md:flex-row gap-8 items-start">
<div class="w-full md:w-48 shrink-0">
<img alt="Joshua Kato" class="w-full aspect-[4/5] object-cover grayscale border border-subtle" :src="joshuaImage" />
</div>
<div class="flex-1">
<h3 class="font-headline text-xl font-bold text-primary mb-1">Joshua Kato</h3>
<p class="text-tertiary text-[10px] font-bold uppercase tracking-widest mb-4">Chief Technology Officer</p>
<p class="text-secondary text-sm leading-relaxed mb-6 font-light">
                            A software engineer and entrepreneur, co-founder of Afrodjango Initiative and Bean Origin, a blockchain trading platform, and ambassador of the Python Software Foundation. Works at the intersection of AI, blockchain, and digital trade to advance ethical sourcing and commodity exchange, focused on empowering farmers and building transparent, scalable systems.
                        </p>
<div class="space-y-3 pt-4 border-t border-subtle">
<a class="flex items-center gap-3 text-xs text-secondary hover:text-primary transition-colors" href="mailto:joshua@coffeepulseuganda.com">
<span class="material-symbols-outlined text-sm">mail</span> joshua@coffeepulseuganda.com
                            </a>
<a class="flex items-center gap-3 text-xs text-secondary hover:text-primary transition-colors" href="tel:+256752567534">
<span class="material-symbols-outlined text-sm">call</span> +256 752 567 534
                            </a>
</div>
<div class="flex gap-4 mt-6">
<a class="text-primary/60 hover:text-primary transition-colors" href="#">
<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg>
</a>
<a class="text-primary/60 hover:text-primary transition-colors" href="#">
<svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932 6.064-6.932zm-1.292 19.49h2.039L6.486 3.24H4.298l13.311 17.403z"></path></svg>
</a>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- Section 5: Tech Trust (Subtle Design) -->
<section class="bg-surface-container border-y border-subtle">
<div class="container-bs">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
<div>
<span class="material-symbols-outlined text-4xl mb-6 text-tertiary">security</span>
<h2 class="font-headline text-3xl font-bold text-primary mb-6">Blockchain-Backed Integrity</h2>
<p class="text-secondary text-base leading-relaxed font-light mb-8">
                        Our platform uses distributed ledger technology to record every transaction, cupping score, and movement of coffee. This ensures that when you buy Coffee Pulse Uganda coffee, you aren't just buying beans, you're buying proof of origin.
                    </p>
<div class="flex flex-wrap gap-3">
<span class="bg-surface px-4 py-2 text-[10px] font-bold tracking-widest uppercase border border-subtle">Immutable Ledger</span>
<span class="bg-surface px-4 py-2 text-[10px] font-bold tracking-widest uppercase border border-subtle">Real-time Tracking</span>
<span class="bg-surface px-4 py-2 text-[10px] font-bold tracking-widest uppercase border border-subtle">Smart Contracts</span>
</div>
</div>
<div class="flex justify-center">
<div class="w-64 h-64 bg-surface border border-subtle flex items-center justify-center opacity-40">
<span class="material-symbols-outlined text-8xl text-primary">hub</span>
</div>
</div>
</div>
</div>
</section>
</main>
<PublicFooter />
</div>
</template>

<style>
body { font-family: 'Manrope', sans-serif; background-color: #faf9f5; color: #1a1c1a; -webkit-font-smoothing: antialiased; }
.font-serif { font-family: 'Noto Serif', serif; }
.material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24; }
/* Bootstrap 5 Inspired Container (max-width: 1320px for xxl) */
.container-bs { max-width: 1320px; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; }
@media (min-width: 576px) { .container-bs { max-width: 540px; } }
@media (min-width: 768px) { .container-bs { max-width: 720px; } }
@media (min-width: 992px) { .container-bs { max-width: 960px; } }
@media (min-width: 1200px) { .container-bs { max-width: 1140px; } }
@media (min-width: 1400px) { .container-bs { max-width: 1320px; } }

section { padding-top: 5rem; padding-bottom: 5rem; }
.lead { font-size: 1.25rem; font-weight: 300; }
.no-shadow { box-shadow: none !important; }
.border-subtle { border-color: rgba(0,0,0,0.05); }
</style>
