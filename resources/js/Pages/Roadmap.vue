<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicHeader from '../Components/PublicHeader.vue';
import PublicFooter from '../Components/PublicFooter.vue';

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

const phases = [
    {
        year: '2022-2023',
        phase: 'Phase 1',
        title: 'Foundation & Origin',
        description:
            'Establishing cooperative networks and baseline traceability. We began at the source, partnering with local Ugandan estates to digitize harvesting records.',
        icon: 'coffee',
        markerClass: 'bg-white text-[#003508]',
        cardClass: 'bg-[#f4f4f0]',
        reverse: false,
        items: ['Digital Farmer IDs for 5,000+ Growers', 'IoT-enabled Moisture Tracking'],
    },
    {
        year: '2024',
        phase: 'Phase 2',
        title: 'Blockchain Integration',
        description:
            'Launching the immutable ledger and batch tokenization. Every shipment now carries a cryptographic proof of origin and quality certificates.',
        icon: 'hub',
        markerClass: 'bg-white text-[#003508]',
        cardClass: 'bg-[#e8e8e4]',
        reverse: true,
        items: ['On-chain Batch Tokenization (ERC-1155)', 'Smart Contract-based Quality Escrow'],
    },
    {
        year: '2025',
        phase: 'Phase 3',
        title: 'Global Exchange Launch',
        description:
            'Opening the B2B marketplace for international roasters. Disintermediating the supply chain to provide direct value back to the estate.',
        icon: 'language',
        markerClass: 'bg-[#271310] text-white',
        cardClass: 'bg-[#ece0dc]',
        reverse: false,
        items: ['Live Auction Mechanism for Micro-lots', 'Roaster-to-Farmer Direct Payments'],
    },
    {
        year: '2026+',
        phase: 'Phase 4',
        title: 'Financial Inclusion',
        description:
            'Integrating carbon credits and instant farmer payments. Scaling the model to new commodities and emerging global markets.',
        icon: 'eco',
        markerClass: 'bg-[#003508] text-[#a3f69c]',
        cardClass: 'bg-[#f4f4f0]',
        reverse: true,
        items: ['Regenerative Farming Carbon Credit Minting', 'Decentralized Credit Scoring for Co-ops'],
    },
];
</script>

<template>
    <Head title="Roadmap | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700;900&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#1a1c1a] antialiased">
        <PublicHeader>
            <template #nav>
                <Link :href="route('home')" class="nav-link text-sm font-bold uppercase tracking-wide text-[#3e2723]/70">Home</Link>
                <span class="border-b-2 border-[#271310] pb-1 text-sm font-bold uppercase tracking-wide text-[#271310]">Roadmap</span>
                <Link :href="route('about')" class="nav-link text-sm font-bold uppercase tracking-wide text-[#3e2723]/70">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-bold uppercase tracking-wide text-[#3e2723]/70">Contact</Link>
            </template>
        </PublicHeader>

        <main class="mx-auto max-w-[1320px] px-4 md:px-8">
            <section class="mx-auto max-w-4xl pb-20 pt-24 text-center">
                <span class="mb-6 inline-block bg-[#a3f69c] px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] text-[#56a554]">Vision &amp; Strategy</span>
                <h1 class="mb-8 font-headline text-5xl font-black leading-tight tracking-tight text-[#271310] md:text-7xl">
                    Our Roadmap: Scaling Global Coffee Trust
                </h1>
                <p class="text-xl font-light leading-relaxed text-[#504442]">
                    From establishing the foundation of Ugandan coffee traceability to building the future of decentralized commodity exchange.
                </p>
            </section>

            <section class="relative py-20">
                <div class="roadmap-line absolute bottom-0 left-1/2 top-0 hidden -translate-x-1/2 opacity-30 lg:block"></div>

                <div class="space-y-24">
                    <div
                        v-for="entry in phases"
                        :key="entry.phase"
                        class="flex flex-col items-center gap-12 lg:gap-0"
                        :class="entry.reverse ? 'lg:flex-row-reverse' : 'lg:flex-row'"
                    >
                        <div class="w-full lg:w-1/2" :class="entry.reverse ? 'lg:pl-24' : 'lg:pr-24 lg:text-right'">
                            <div class="mb-4 inline-flex items-center gap-3" :class="entry.reverse ? '' : 'lg:flex-row-reverse'">
                                <span class="text-sm font-bold text-[#271310] opacity-40">{{ entry.year }}</span>
                                <div class="h-px w-12 bg-[#d3c3c0] opacity-30"></div>
                                <span class="text-xs font-bold uppercase tracking-widest text-[#655d5a]">{{ entry.phase }}</span>
                            </div>
                            <h3 class="mb-4 font-headline text-3xl font-bold text-[#271310]">{{ entry.title }}</h3>
                            <p class="max-w-md leading-relaxed text-[#504442]" :class="entry.reverse ? '' : 'lg:ml-auto'">
                                {{ entry.description }}
                            </p>
                        </div>

                        <div class="z-10 hidden h-12 w-12 items-center justify-center rounded-full outline outline-4 outline-[#faf9f5] shadow-sm lg:flex" :class="entry.markerClass">
                            <span class="material-symbols-outlined">{{ entry.icon }}</span>
                        </div>

                        <div class="w-full lg:w-1/2" :class="entry.reverse ? 'lg:pr-24 lg:text-right' : 'lg:pl-24'">
                            <div class="rounded-lg p-8" :class="entry.cardClass">
                                <ul class="space-y-4">
                                    <li
                                        v-for="item in entry.items"
                                        :key="item"
                                        class="flex items-start gap-3"
                                        :class="entry.reverse ? 'lg:flex-row-reverse' : ''"
                                    >
                                        <span
                                            class="material-symbols-outlined mt-1 text-sm"
                                            :class="entry.reverse ? 'text-[#005312]' : 'text-[#001d03]'"
                                            style="font-variation-settings: 'FILL' 1, 'wght' 300, 'GRAD' 0, 'opsz' 24;"
                                        >
                                            check_circle
                                        </span>
                                        <span class="text-sm font-medium">{{ item }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-32">
                <div class="relative overflow-hidden rounded-xl bg-[#3e2723] p-12 text-center md:p-20">
                    <div class="absolute -right-32 -top-32 h-64 w-64 rounded-full bg-[#001d03]/10 blur-3xl"></div>
                    <div class="absolute -bottom-32 -left-32 h-64 w-64 rounded-full bg-[#655d5a]/10 blur-3xl"></div>

                    <h2 class="relative z-10 mb-6 font-headline text-4xl font-bold text-white md:text-5xl">Join the Journey</h2>
                    <p class="relative z-10 mx-auto mb-10 max-w-2xl text-lg font-light text-[#ae8d87]">
                        Be a part of the most transparent coffee ecosystem ever built. We are connecting conscientious roasters with master growers.
                    </p>
                    <div class="relative z-10 flex flex-col justify-center gap-4 sm:flex-row">
                        <Link :href="route('contact')" class="bg-[#271310] px-10 py-4 text-sm font-bold uppercase tracking-widest text-white transition-all hover:bg-black">
                            Partner With Us
                        </Link>
                        <Link :href="route('inventory.index')" class="bg-[#003508] px-10 py-4 text-sm font-bold uppercase tracking-widest text-[#a3f69c] transition-all hover:opacity-90">
                            View Marketplace
                        </Link>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>

<style scoped>
.font-body {
    font-family: 'Manrope', sans-serif;
}

.font-headline {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
    vertical-align: middle;
}

.roadmap-line {
    background: linear-gradient(180deg, transparent 0%, #d3c3c0 15%, #d3c3c0 85%, transparent 100%);
    width: 1px;
}
</style>
