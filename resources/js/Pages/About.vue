<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
});

const stats = [
    {
        headline: '1.7 Million',
        title: 'Smallholder Farmers',
        copy: 'Connecting local heritage to global demand through a unified platform.',
    },
    {
        headline: 'Direct Access',
        title: 'Fair Value Exchange',
        copy: 'Removing unnecessary intermediaries to ensure value flows back to the growers.',
    },
    {
        headline: 'Ethical Standard',
        title: 'Quality Benchmark',
        copy: 'Setting the highest bar for quality and transparency in the East African corridor.',
    },
];

const lifecycleSteps = [
    {
        icon: 'eco',
        title: '01. SOURCING',
        copy: 'Direct collection from verified smallholder cooperatives across Uganda\'s prime growing regions.',
    },
    {
        icon: 'verified',
        title: '02. VERIFICATION',
        copy: 'Rigorous grading and cupping protocols to ensure international export standards are consistently met.',
    },
    {
        icon: 'toll',
        title: '03. TOKENIZATION',
        copy: 'Assigning every lot a digital identity on our ledger for absolute ownership and origin tracking.',
    },
    {
        icon: 'public',
        title: '04. GLOBAL EXPORT',
        copy: 'Seamless logistics and financial settlement for roasters and traders worldwide.',
    },
];

const trustTags = ['Immutable Ledger', 'Real-time Tracking', 'Smart Contracts'];

const impactPoints = [
    {
        title: 'Digital Payments',
        copy: 'Zero-fee digital wallets for instant payments to farmers.',
    },
    {
        title: 'Farmer Training',
        copy: 'Agricultural training programs for over 400 cooperatives.',
    },
    {
        title: 'Global Transparency',
        copy: '100% transparency in the global price-to-farmgate ratio.',
    },
];
</script>

<template>
    <Head title="About | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@300;400;500;600;700&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#1a1c1a] antialiased">
        <PublicHeader>
            <template #nav>
                <Link :href="route('home')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#655d5a]">Home</Link>
                <Link :href="route('about')" class="text-sm font-bold uppercase tracking-wider text-[#271310]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#655d5a]">Contact</Link>
            </template>
            <template #actions>
                <template v-if="$page.props.auth.user">
                    <Link :href="route('dashboard')" class="btn-header">Secure Lot</Link>
                </template>
                <template v-else-if="canRegister">
                    <Link :href="route('register')" class="btn-header">Secure Lot</Link>
                </template>
                <template v-else-if="canLogin">
                    <Link :href="route('login')" class="btn-header">Secure Lot</Link>
                </template>
                <Link v-else :href="route('inventory.index')" class="btn-header">Secure Lot</Link>
            </template>
        </PublicHeader>

        <main>
            <section class="bg-[#faf9f5] py-20">
                <div class="container-bs">
                    <div class="flex flex-col items-center gap-12 lg:flex-row lg:gap-24">
                        <div class="lg:w-1/2">
                            <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#271310]/60">Established Heritage</p>
                            <h1 class="mb-8 font-headline text-5xl font-bold leading-tight text-[#271310] md:text-6xl">
                                Empowering the <span class="font-normal italic">Source</span>.
                            </h1>
                            <div class="mb-8 h-1 w-16 bg-[#271310]"></div>
                            <p class="mb-6 text-lg leading-relaxed text-[#655d5a]">
                                At Coffee Pulse Uganda, we bridge the gap between tradition and technology. Our mission is to digitize the Ugandan coffee supply chain, ensuring every smallholder farmer finds a place in the global market through ethical, transparent trade.
                            </p>
                            <p class="text-lg leading-relaxed text-[#655d5a]">
                                We believe that by preserving the integrity of the bean—from soil to the digital exchange—we can uplift entire communities and redefine the value of Ugandan coffee for the modern world.
                            </p>
                        </div>

                        <div class="lg:w-1/2">
                            <div class="relative">
                                <img
                                    alt="Ugandan coffee farmer drying beans"
                                    class="aspect-[4/5] w-full object-cover grayscale transition-all duration-700 hover:grayscale-0"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4SubS2RmxdPnaFgyFmSQnHTJOmEkE2sYctu7Qjc9nW_-qZ9aICGgA-lRVajW4et5EsXiJC75IDhwqbyYjOoq5U1K8gEBnLFFhgW27S2gBegSjjTiT7_mX9f5BYH99374_aOgyKWwGD5pwx1NSw503bEQooz4xuA1aMvMFsdEMcVP_y7gVBSdUVtO5LrP3Bhnoz5no2l1Ei5D-xd3wB0sizzlqhdGc9tyWmHphKEuBkWIoMmVbK8ThoxU31FnWVzdqSa4cOzCA0jI"
                                />
                                <div class="absolute -bottom-6 -left-6 hidden max-w-xs border border-[#d3c3c0]/30 bg-white p-6 md:block">
                                    <p class="font-headline text-base italic leading-snug text-[#271310]">
                                        "Honoring the hands that harvest, ensuring the value returns to the roots."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-y border-[#d3c3c0]/20 bg-[#f4f4f0] py-20">
                <div class="container-bs">
                    <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                        <div v-for="stat in stats" :key="stat.title" class="md:border-l md:border-[#d3c3c0]/50 md:pl-8">
                            <h3 class="mb-3 font-headline text-4xl font-bold text-[#271310]">{{ stat.headline }}</h3>
                            <p class="text-sm font-medium uppercase tracking-wide text-[#655d5a]">{{ stat.title }}</p>
                            <p class="mt-4 text-sm leading-relaxed text-[#655d5a]/70">{{ stat.copy }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#faf9f5] py-20">
                <div class="container-bs">
                    <div class="mb-20 text-center">
                        <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#271310]/60">Process Architecture</p>
                        <h2 class="font-headline text-4xl font-bold text-[#271310]">The Trade Lifecycle</h2>
                        <div class="mx-auto mt-6 h-0.5 w-24 bg-[#d3c3c0]/50"></div>
                    </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
                        <div
                            v-for="step in lifecycleSteps"
                            :key="step.title"
                            class="border border-[#d3c3c0]/30 bg-white p-8 transition-colors hover:border-[#271310]"
                        >
                            <div class="mb-6 text-[#271310]">
                                <span class="material-symbols-outlined text-4xl">{{ step.icon }}</span>
                            </div>
                            <h4 class="mb-3 text-sm font-bold tracking-widest text-[#271310]">{{ step.title }}</h4>
                            <p class="text-sm leading-relaxed text-[#655d5a]">{{ step.copy }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="border-y border-[#3e2723] bg-[#271310] py-20 text-white">
                <div class="container-bs">
                    <div class="flex flex-col items-center gap-16 lg:flex-row">
                        <div class="lg:w-2/3">
                            <span class="material-symbols-outlined mb-8 text-5xl text-[#56a554]">security</span>
                            <h2 class="mb-8 font-headline text-4xl italic md:text-5xl">Blockchain-Backed Integrity</h2>
                            <p class="mb-10 max-w-2xl text-lg leading-relaxed text-[#ae8d87]">
                                Technology should be invisible but indestructible. Our platform uses distributed ledger technology to record every transaction, cupping score, and movement of coffee. This ensures that when you buy Coffee Pulse Uganda coffee, you aren't just buying beans—you're buying proof of origin.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <div v-for="tag in trustTags" :key="tag" class="border border-[#ae8d87]/30 px-5 py-2 text-xs font-bold uppercase tracking-widest">
                                    {{ tag }}
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-center lg:w-1/3">
                            <div class="flex aspect-square w-full items-center justify-center border-2 border-[#ae8d87]/20 p-8 opacity-40">
                                <span class="material-symbols-outlined text-[120px]">hub</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#faf9f5] py-20">
                <div class="container-bs">
                    <div class="flex flex-col items-center gap-16 lg:flex-row lg:gap-24">
                        <div class="order-2 lg:w-1/2 lg:order-1">
                            <div class="grid grid-cols-2 gap-4">
                                <img
                                    alt="Coffee cupping"
                                    class="h-64 w-full object-cover grayscale"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAw83hqqGec7nsZU_PVNiOd5PMdzTgK5ojEo3XeMVNvqBWOn7P6FwzadkaROR-19FWdikBwT-ypFGUTfD0pbLEhMJ9lYI3FCr7HOtWepsfeqxUoJuX0tLdvs1aM-EQBHQq9bFZyw-IIz5K-DOTm0N06l96SRcZAuWbioJFtwfh_LwLKtuX3Rzo0xTW89byAaYRvqBxmr9xTAUBlq4a_a0un2o4L2mnjuAa0-o6mOm6zGL7o8DQ_bvacivcEfcRa8EEIjTmtde1Iq8"
                                />
                                <img
                                    alt="Coffee harvest"
                                    class="mt-12 h-64 w-full object-cover grayscale"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAExGo0qchHLJhQ1Y6pwER8pFU9VtBx17o58XYBhUkI42fvfO_2vMaVyEy_36DriDoc7qHFWfGya3kN1IhFBQIOimE3v18QOeIqjWvrSYziR2AHdrTbgqsvDYV_ZInvu2355KhkX8OcWoFib3SWbETlRlZewi_hh7iR-quPmlG7mbumYeWXEFL1INeIVFBhR2VElIuN0ufWOrhmkEbXa0LqCKt8L-6E-i1C4rNwy-x9PM-rRdx-HlS_CVXKED0CTU50jRZ7an7VJOA"
                                />
                            </div>
                        </div>

                        <div class="order-1 lg:w-1/2 lg:order-2">
                            <p class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-[#271310]/60">Beyond the Bean</p>
                            <h2 class="mb-8 font-headline text-4xl font-bold leading-tight text-[#271310]">Economic &amp; Social Empowerment</h2>
                            <p class="mb-8 text-lg leading-relaxed text-[#655d5a]">
                                We believe direct trade is the only sustainable future. By bypassing complex middleman networks, Coffee Pulse Uganda increases the average farmer's take-home pay by up to 40%.
                            </p>
                            <ul class="space-y-6">
                                <li v-for="point in impactPoints" :key="point.title" class="flex items-start gap-4">
                                    <span class="material-symbols-outlined font-bold text-[#271310]">check</span>
                                    <div>
                                        <h5 class="mb-1 text-sm font-bold uppercase tracking-wide text-[#271310]">{{ point.title }}</h5>
                                        <p class="text-sm text-[#655d5a]">{{ point.copy }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>

<style scoped>
.font-headline {
    font-family: 'Noto Serif', serif;
}

.font-body {
    font-family: 'Manrope', sans-serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}

.container-bs {
    max-width: 1140px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1rem;
    padding-right: 1rem;
}

.btn-header {
    border: 2px solid #271310;
    color: #271310;
    padding: 0.5rem 1.25rem;
    font-size: 0.875rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    transition: all 0.2s ease;
}

.btn-header:hover {
    background-color: #271310;
    color: #ffffff;
}
</style>
