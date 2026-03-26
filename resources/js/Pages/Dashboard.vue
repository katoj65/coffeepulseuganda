<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const quickActions = [
    {
        label: 'Mint New Batch',
        icon: 'add_box',
        href: route('inventory.index'),
        primary: true,
    },
    {
        label: 'Create Traceability',
        icon: 'verified_user',
        href: route('traceability.create'),
        primary: false,
    },
    {
        label: 'Review Export Inquiry',
        icon: 'mail',
        href: `${route('home')}#inquiry`,
        primary: false,
    },
    {
        label: 'Create Sample',
        icon: 'science',
        href: route('samples.create'),
        primary: false,
    },
];

const overviewCards = [
    {
        eyebrow: 'Total Trade Volume',
        icon: 'trending_up',
        value: '$12.4M',
        detail: '+14.2% from last month',
        accent: true,
    },
    {
        eyebrow: 'Active Cooperatives',
        icon: 'groups',
        value: '42',
        detail: 'Direct Trade Partners',
    },
    {
        eyebrow: 'Coffee Batches',
        icon: 'category',
        value: '842',
        detail: 'On-chain Tracked Lots',
    },
    {
        eyebrow: 'Sustainability',
        icon: 'verified',
        value: '94/100',
        detail: 'Certified Regenerative',
        featured: true,
    },
];

const regionalInventory = [
    {
        region: 'Mount Elgon',
        variety: 'Arabica • SL14/SL28',
        stock: '4,250 Bags',
        stockWidth: '75%',
        quality: '87.5 Avg',
        status: 'HEALTHY',
        dotClass: 'bg-[#3e2723]',
        barClass: 'bg-[#3e2723]',
        statusClass: 'bg-[#a3f69c]/30 text-[#005312]',
        rowClass: 'hover:bg-[#f4f4f0]',
    },
    {
        region: 'Rwenzori Mountains',
        variety: 'Arabica • Natural Process',
        stock: '2,810 Bags',
        stockWidth: '50%',
        quality: '86.2 Avg',
        status: 'HEALTHY',
        dotClass: 'bg-[#001d03]',
        barClass: 'bg-[#3e2723]',
        statusClass: 'bg-[#a3f69c]/30 text-[#005312]',
        rowClass: 'bg-[#f4f4f0]/40 hover:bg-[#f4f4f0]',
    },
    {
        region: 'Lake Victoria Basin',
        variety: 'Robusta • Screen 18',
        stock: '12,400 Bags',
        stockWidth: '100%',
        quality: '82.0 Avg',
        status: 'HIGH STOCK',
        dotClass: 'bg-[#827472]',
        barClass: 'bg-[#003508]',
        statusClass: 'bg-[#ffdad6]/40 text-[#93000a]',
        rowClass: 'hover:bg-[#f4f4f0]',
    },
];

const blockchainLedger = [
    {
        title: 'Batch #BO-842 Minted',
        hash: '0x72a...f492b9',
        detail: 'Mt. Elgon Cooperative • 500 Bags',
        time: '2 mins ago',
        icon: 'token',
        borderClass: 'border-[#003508]',
    },
    {
        title: 'Trade Settled: LOT-192',
        hash: '0x12c...e11d04',
        detail: 'Settlement: $42,500 USDC',
        time: '14 mins ago',
        icon: 'handshake',
        borderClass: 'border-[#3e2723]',
    },
    {
        title: 'Export Clearance Verified',
        hash: '0x99a...c03ff8',
        detail: 'UCDA Digital Cert #8821',
        time: '45 mins ago',
        icon: 'assignment_turned_in',
        borderClass: 'border-[#827472]',
        faded: true,
    },
];
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            Dashboard Overview
        </template>

        <div class="space-y-12">
         

            <section class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
                <article
                    v-for="card in overviewCards"
                    :key="card.eyebrow"
                    class="relative flex h-48 flex-col justify-between overflow-hidden rounded-xl p-8 transition-transform hover:scale-[1.01]"
                    :class="card.featured ? 'bg-[#001d03] text-[#a3f69c]' : 'bg-white text-[#271310]'"
                >
                    <div v-if="card.featured" class="pointer-events-none absolute -bottom-4 -right-4 opacity-10">
                        <span class="material-symbols-outlined text-9xl">eco</span>
                    </div>

                    <div class="flex items-start justify-between">
                        <span
                            class="text-xs font-bold uppercase tracking-widest"
                            :class="card.featured ? 'text-[#a3f69c]/70' : 'text-[#655d5a]/60'"
                        >
                            {{ card.eyebrow }}
                        </span>
                        <span
                            class="material-symbols-outlined"
                            :class="card.featured ? 'text-[#a3f69c]' : 'text-[#3e2723]'"
                        >
                            {{ card.icon }}
                        </span>
                    </div>

                    <div>
                        <h3
                            class="font-headline font-bold"
                            :class="card.featured ? 'text-4xl' : 'text-3xl'"
                        >
                            {{ card.value }}
                        </h3>
                        <p
                            class="mt-1 text-xs font-medium"
                            :class="card.featured ? 'uppercase tracking-tight text-[#88d982]' : card.accent ? 'flex items-center gap-1 text-[#56a554]' : 'text-[#655d5a]/70'"
                        >
                            <span v-if="card.accent" class="material-symbols-outlined text-[14px]">arrow_upward</span>
                            {{ card.detail }}
                        </p>
                    </div>
                </article>
            </section>

            <section class="grid grid-cols-1 gap-10 xl:grid-cols-12">
                <div class="space-y-6 xl:col-span-7">
                    <div class="flex flex-wrap items-end justify-between gap-4">
                        <div>
                            <h3 class="font-headline text-xl font-bold text-[#271310]">Regional Inventory</h3>
                            <p class="text-sm text-[#655d5a]">Stock levels and quality metrics by Ugandan coffee terroir.</p>
                        </div>
                        <Link :href="route('inventory.index')" class="text-xs font-bold text-[#3e2723] underline underline-offset-4">
                            Export Inventory Report
                        </Link>
                    </div>

                    <div class="overflow-hidden rounded-xl bg-white shadow-[0_1px_2px_rgba(39,19,16,0.05)]">
                        <table class="w-full border-collapse text-left">
                            <thead>
                                <tr class="bg-[#f4f4f0]">
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Region &amp; Variety</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Stock Level</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">SCA Quality</th>
                                    <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="lot in regionalInventory"
                                    :key="lot.region"
                                    class="transition-colors"
                                    :class="lot.rowClass"
                                >
                                    <td class="px-6 py-6">
                                        <div class="flex items-center gap-3">
                                            <div class="h-2 w-2 rounded-full" :class="lot.dotClass"></div>
                                            <div>
                                                <p class="text-sm font-bold text-[#271310]">{{ lot.region }}</p>
                                                <p class="text-[10px] text-[#655d5a]">{{ lot.variety }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6">
                                        <p class="text-sm font-medium text-[#271310]">{{ lot.stock }}</p>
                                        <div class="mt-2 h-1 w-full rounded-full bg-[#eeeeea]">
                                            <div class="h-full rounded-full" :class="lot.barClass" :style="{ width: lot.stockWidth }"></div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6">
                                        <span class="inline-flex items-center rounded bg-[#ece0dc] px-2 py-1 text-[11px] font-bold text-[#271310]">
                                            {{ lot.quality }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-6">
                                        <span class="rounded px-2 py-1 text-[10px] font-bold" :class="lot.statusClass">
                                            {{ lot.status }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="space-y-6 xl:col-span-5">
                    <div class="flex flex-wrap items-end justify-between gap-4">
                        <div>
                            <h3 class="font-headline text-xl font-bold text-[#271310]">Blockchain Ledger</h3>
                            <p class="text-sm text-[#655d5a]">Verified on-chain transactions.</p>
                        </div>
                        <div class="flex items-center gap-1 text-[10px] font-bold uppercase text-[#56a554]">
                            <span class="relative flex h-2 w-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#56a554] opacity-75"></span>
                                <span class="relative inline-flex h-2 w-2 rounded-full bg-[#56a554]"></span>
                            </span>
                            Live Updates
                        </div>
                    </div>

                    <div class="space-y-4">
                        <article
                            v-for="entry in blockchainLedger"
                            :key="entry.title"
                            class="flex items-start justify-between rounded-xl border-l-4 bg-[#f4f4f0] p-5"
                            :class="[entry.borderClass, entry.faded ? 'opacity-80' : '']"
                        >
                            <div class="flex gap-4">
                                <div class="rounded-lg bg-white p-2">
                                    <span class="material-symbols-outlined text-[#271310]">{{ entry.icon }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-[#271310]">{{ entry.title }}</p>
                                    <p class="w-40 truncate font-mono text-[10px] text-[#655d5a]">{{ entry.hash }}</p>
                                    <p class="mt-1 text-[11px] text-[#655d5a]">{{ entry.detail }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-medium text-[#655d5a]">{{ entry.time }}</span>
                        </article>

                        <Link
                            :href="route('blockchain')"
                            class="block w-full rounded-xl border border-dashed border-[#d3c3c0] py-4 text-center text-xs font-bold text-[#271310] transition-colors hover:bg-[#e8e8e4]"
                        >
                            View Full Blockchain Explorer
                        </Link>
                    </div>
                </div>
            </section>

            <footer class="flex flex-col gap-4 border-t border-[#d3c3c0]/20 pt-8 text-[11px] font-medium text-[#655d5a]/70 md:flex-row md:items-center md:justify-between">
                <div class="flex flex-wrap gap-6">
                    <p>© 2024 Coffee Pulse Uganda</p>
                </div>
                <div class="flex items-center gap-2">
                    <div class="h-2 w-2 rounded-full bg-[#56a554]"></div>
                    <p>Blockchain Mainnet Synced: Block #19,842,012</p>
                </div>
            </footer>
        </div>
    </AppLayout>
</template>
