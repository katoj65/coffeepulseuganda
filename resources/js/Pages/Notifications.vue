<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

const summaryCards = [
    {
        label: 'Unread',
        value: '12',
        detail: 'Need attention today',
        icon: 'notifications_active',
    },
    {
        label: 'Sample Requests',
        value: '4',
        detail: 'Awaiting response',
        icon: 'package_2',
    },
    {
        label: 'Inventory Alerts',
        value: '3',
        detail: 'Low stock or dispatch',
        icon: 'inventory_2',
    },
    {
        label: 'Protocol Updates',
        value: '2',
        detail: 'Traceability events',
        icon: 'verified',
    },
];

const notifications = [
    {
        title: 'New sample request from Berlin roaster',
        category: 'Sample Desk',
        description: 'A buyer requested washed Mount Elgon and Rwenzori natural samples for April evaluation.',
        time: '5 minutes ago',
        tone: 'primary',
    },
    {
        title: 'Lake Basin Fine Robusta stock threshold reached',
        category: 'Inventory Alert',
        description: 'Available export-ready quantity is nearing the contract reserve threshold in Kampala.',
        time: '28 minutes ago',
        tone: 'warning',
    },
    {
        title: 'Traceability passport verified for INV-24031',
        category: 'Protocol',
        description: 'Warehouse record, source note, and compliance documents are synced for the Mount Elgon AA lot.',
        time: '1 hour ago',
        tone: 'success',
    },
    {
        title: 'Dispatch documents pending for Mbale shipment',
        category: 'Logistics',
        description: 'Commercial invoice and export checklist still need approval before tomorrow pickup window.',
        time: 'Today, 08:10',
        tone: 'warning',
    },
    {
        title: 'Cooperative intake report uploaded',
        category: 'Sourcing',
        description: 'New field notes from Kasese and Zombo are ready for review in the sourcing workflow.',
        time: 'Yesterday',
        tone: 'neutral',
    },
];

const quickFilters = [
    'All Notifications',
    'Unread',
    'Inventory',
    'Samples',
    'Protocol',
];
</script>

<template>
    <AppLayout title="Notifications">
        <template #header>
            Notifications
        </template>

        <div class="space-y-10">
            <section class="grid gap-6 xl:grid-cols-[1.4fr_0.9fr]">
                <div class="rounded-[28px] bg-white p-8 shadow-sm">
                    <span class="inline-flex rounded-full bg-[#ece0dc] px-3 py-1 text-[11px] font-bold uppercase tracking-[0.22em] text-[#3e2723]">
                        Operations Inbox
                    </span>
                    <h1 class="mt-4 font-headline text-4xl font-bold leading-tight text-[#271310]">
                        Keep track of inventory, sample, and traceability activity in one place.
                    </h1>
                    <p class="mt-4 max-w-2xl text-base leading-7 text-[#655d5a]">
                        Review what needs attention across sourcing, export readiness, and buyer follow-up without leaving the app workspace.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <button
                            v-for="filter in quickFilters"
                            :key="filter"
                            type="button"
                            class="rounded-full border border-[#d3c3c0]/40 bg-[#faf9f5] px-4 py-2 text-xs font-bold uppercase tracking-[0.18em] text-[#271310] transition-colors hover:bg-[#eeeeea]"
                        >
                            {{ filter }}
                        </button>
                    </div>
                </div>

                <div class="rounded-[28px] bg-[#003508] p-8 text-[#a3f69c] shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#88d982]/80">Live Feed</p>
                            <h2 class="mt-2 font-headline text-3xl font-bold text-white">Team Activity</h2>
                        </div>
                        <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1">campaign</span>
                    </div>

                    <div class="mt-8 space-y-4">
                        <div class="rounded-2xl bg-white/8 p-5 backdrop-blur-sm">
                            <p class="text-[11px] uppercase tracking-[0.2em] text-[#88d982]/80">Latest escalation</p>
                            <p class="mt-2 text-lg font-bold text-white">Inventory alerts need response within 2 hours.</p>
                        </div>
                        <div class="rounded-2xl bg-white/8 p-5 backdrop-blur-sm">
                            <p class="text-[11px] uppercase tracking-[0.2em] text-[#88d982]/80">Next review</p>
                            <p class="mt-2 text-lg font-bold text-white">Daily operations check-in at 16:30 EAT.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="grid gap-6 xl:grid-cols-[1.45fr_0.85fr]">
                <div class="rounded-[28px] bg-white shadow-sm">
                    <div class="border-b border-[#d3c3c0]/20 px-8 py-6">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Recent Notifications</h2>
                        <p class="mt-2 text-sm text-[#655d5a]">Operational updates routed to the logged-in user.</p>
                    </div>

                    <div class="divide-y divide-[#d3c3c0]/15">
                        <article
                            v-for="item in notifications"
                            :key="`${item.category}-${item.title}`"
                            class="flex flex-col gap-4 px-8 py-6 md:flex-row md:items-start md:justify-between"
                        >
                            <div class="flex gap-4">
                                <div
                                    class="mt-1 h-3 w-3 rounded-full"
                                    :class="{
                                        'bg-[#271310]': item.tone === 'primary',
                                        'bg-[#c77b30]': item.tone === 'warning',
                                        'bg-[#56a554]': item.tone === 'success',
                                        'bg-[#827472]': item.tone === 'neutral',
                                    }"
                                ></div>
                                <div class="max-w-2xl">
                                    <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#655d5a]/70">{{ item.category }}</p>
                                    <h3 class="mt-2 text-lg font-bold text-[#271310]">{{ item.title }}</h3>
                                    <p class="mt-2 text-sm leading-6 text-[#655d5a]">{{ item.description }}</p>
                                </div>
                            </div>

                            <div class="text-sm font-semibold text-[#655d5a] md:pl-6">
                                {{ item.time }}
                            </div>
                        </article>
                    </div>
                </div>

                <div class="space-y-6">
                    <section class="rounded-[28px] bg-white p-8 shadow-sm">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Overview</h2>
                        <div class="mt-6 grid gap-4">
                            <article
                                v-for="card in summaryCards"
                                :key="card.label"
                                class="rounded-2xl border border-[#d3c3c0]/25 bg-[#faf9f5] p-5"
                            >
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">{{ card.label }}</p>
                                        <p class="mt-3 font-headline text-3xl font-bold text-[#271310]">{{ card.value }}</p>
                                    </div>
                                    <span class="material-symbols-outlined rounded-full bg-white p-3 text-[#3e2723] shadow-sm">{{ card.icon }}</span>
                                </div>
                                <p class="mt-4 text-sm leading-6 text-[#655d5a]">{{ card.detail }}</p>
                            </article>
                        </div>
                    </section>

                    <section class="rounded-[28px] bg-white p-8 shadow-sm">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Recommended Actions</h2>
                        <div class="mt-6 space-y-4 text-sm leading-6 text-[#655d5a]">
                            <div class="rounded-2xl bg-[#faf9f5] p-5">
                                Prioritize unread sample notifications first so buyers get same-day responses.
                            </div>
                            <div class="rounded-2xl bg-[#faf9f5] p-5">
                                Review inventory warnings before dispatch windows close or lots fall below reserve threshold.
                            </div>
                            <div class="rounded-2xl bg-[#faf9f5] p-5">
                                Use protocol updates to confirm traceability records before export approvals.
                            </div>
                        </div>
                    </section>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
