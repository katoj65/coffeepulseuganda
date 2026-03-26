<script setup>
import { Link, Head } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

defineProps({
    summary: {
        type: Object,
        required: true,
    },
    lots: {
        type: Array,
        default: () => [],
    },
});

const exchangeLinks = [
    { label: 'Contact Desk', icon: 'support_agent', href: route('contact'), inertia: true },
];
</script>

<template>
    <Head title="Market Place | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#271310] selection:bg-[#003508] selection:text-[#a3f69c]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <Link :href="route('marketplace')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">Market Place</Link>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main class="mx-auto mb-16 max-w-7xl">
            <section class="mb-10 flex flex-col gap-5 border-b border-[#d3c3c0]/30 pb-8 lg:flex-row lg:items-end lg:justify-between mt-5">
                <div>
                    <h1 class="mt-4 font-headline text-4xl font-bold leading-tight text-[#271310] md:text-6xl">Active Coffee Lots</h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#655d5a]">
                        A buyer-facing coffee trading page for active Ugandan lots with verified quality data, live benchmarks, and direct access to origin-led sourcing.
                    </p>
                    <div class="mt-5 flex flex-wrap items-center gap-3">
                        <span class="inline-flex rounded-full bg-white px-4 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">
                            {{ summary.market_status }}
                        </span>
                        <span class="inline-flex rounded-full bg-[#f4f4f0] px-4 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]">
                            {{ summary.available_lots }} active lots
                        </span>
                        <span class="inline-flex rounded-full bg-[#f4f4f0] px-4 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]">
                            {{ summary.featured_lots }} featured
                        </span>
                    </div>
                </div>
            </section>

            <div class="grid gap-8 lg:grid-cols-[280px_minmax(0,1fr)]">
                <aside class="space-y-8">
                    <section class="rounded-[28px] bg-white p-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/60">Exchange Navigation</p>
                        <nav class="mt-5 space-y-2">
                            <component
                                v-for="item in exchangeLinks"
                                :key="item.label"
                                :is="item.inertia ? Link : 'a'"
                                :href="item.href"
                                class="flex items-center gap-3 rounded-2xl px-4 py-3 text-xs font-bold uppercase tracking-[0.18em] transition-colors"
                                :class="item.active ? 'bg-[#271310] text-white' : 'text-[#655d5a] hover:bg-[#f4f4f0] hover:text-[#271310]'"
                            >
                                <span class="material-symbols-outlined text-[18px]">{{ item.icon }}</span>
                                <span>{{ item.label }}</span>
                            </component>
                        </nav>
                    </section>

                </aside>

                <section id="exchange">
                    <div class="mb-8">
                        <div id="benchmarks">
                            <h2 class="font-headline text-3xl font-bold text-[#271310]">Ugandan Exchange Board</h2>
                            <p class="mt-2 text-sm leading-6 text-[#655d5a]">Screened by score, origin, process, and available export volume.</p>
                        </div>
                    </div>

                    <div v-if="lots.length" class="grid gap-8 xl:grid-cols-3">
                        <article
                            v-for="lot in lots"
                            :key="lot.id ?? lot.title"
                            class="group overflow-hidden rounded-[20px] bg-white"
                        >
                            <div class="relative h-64 overflow-hidden">
                                <img :src="lot.image" :alt="lot.title" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-105" />
                                <div class="absolute right-4 top-4 rounded-2xl bg-white px-3 py-2">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[14px] text-[#005312]" style="font-variation-settings: 'FILL' 1">star</span>
                                        <span class="text-sm font-bold text-[#271310]">{{ lot.score }} <span class="ml-1 text-[9px] uppercase tracking-widest text-[#655d5a]/50">SCA</span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="flex h-full flex-col p-6">
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#655d5a]/65">{{ lot.region }} | {{ lot.variety }}</p>
                                <h3 class="mt-3 font-headline text-lg font-bold leading-snug text-[#271310]">{{ lot.title }}</h3>

                                <div class="mt-6 grid grid-cols-2 gap-3 rounded-2xl bg-[#faf9f5] px-3 py-4 text-center">
                                    <div class="px-2">
                                        <p class="text-[9px] uppercase tracking-[0.18em] text-[#655d5a]/45">Altitude</p>
                                        <p class="mt-1 text-xs font-bold text-[#271310]">{{ lot.altitude }}</p>
                                    </div>
                                    <div class="px-2">
                                        <p class="text-[9px] uppercase tracking-[0.18em] text-[#655d5a]/45">Process</p>
                                        <p class="mt-1 text-xs font-bold text-[#271310]">{{ lot.process }}</p>
                                    </div>
                                </div>

                                <div class="mt-6 flex gap-2">
                                    <Link :href="route('sample.index')" class="flex-1 whitespace-nowrap rounded-full bg-[#f4f4f0] px-4 py-2 text-center text-[10px] font-bold text-[#271310] transition-colors hover:bg-[#ece9e1]">
                                        Request sample
                                    </Link>
                                    <Link :href="route('contact')" class="flex-1 whitespace-nowrap rounded-full bg-[#271310] px-4 py-2 text-center text-[10px] font-bold text-white transition-opacity hover:opacity-90">
                                        Secure lot
                                    </Link>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div v-else class="rounded-[28px] bg-white p-10 text-center">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/60">Market Place</p>
                        <h3 class="mt-4 font-headline text-2xl font-bold text-[#271310]">No active marketplace lots yet</h3>
                        <p class="mx-auto mt-3 max-w-2xl text-sm leading-6 text-[#655d5a]">
                            This page now reads directly from the marketplace database table. Once active lots are created from the dashboard, they will appear here automatically.
                        </p>
                        <div class="mt-6 flex justify-center">
                            <Link :href="route('contact')" class="rounded-full bg-[#271310] px-5 py-3 text-sm font-bold text-white transition-opacity hover:opacity-90">
                                Contact desk
                            </Link>
                        </div>
                    </div>
                </section>
            </div>
        </main>

        <PublicFooter />
    </div>
</template>
