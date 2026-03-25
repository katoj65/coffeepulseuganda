<script setup>
import { Link } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    records: {
        type: Array,
        default: () => [],
    },
});
</script>

<template>
    <AppLayout title="Traceability Records">


        <div class="space-y-8">


            <section v-if="records.length" class="grid gap-6">
                <article
                    v-for="record in records"
                    :key="record.id"
                    class="rounded-[28px] bg-white p-8 shadow-sm"
                >
                    <div class="flex flex-col gap-6 xl:flex-row xl:items-start xl:justify-between">
                        <div class="space-y-5">
                            <div>
                                <p class="text-[11px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">Batch</p>
                                <h2 class="mt-2 font-headline text-3xl font-bold text-[#271310]">{{ record.batch }}</h2>
                                <p class="mt-2 text-sm text-[#655d5a]">Created {{ record.created_at }}</p>
                            </div>

                            <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                                <div class="rounded-2xl bg-[#faf9f5] p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Issuer</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.issuer }}</p>
                                </div>
                                <div class="rounded-2xl bg-[#faf9f5] p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Origin</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.origin }}</p>
                                </div>
                                <div class="rounded-2xl bg-[#faf9f5] p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Variety</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.variety }}</p>
                                </div>
                                <div class="rounded-2xl bg-[#faf9f5] p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Grade</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.score }} • {{ record.grade }}</p>
                                </div>
                            </div>

                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="rounded-2xl border border-[#d3c3c0]/30 p-4">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Producer</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.farmer_name }}</p>
                                    <p class="text-xs text-[#655d5a]">{{ record.farmer_role }}</p>
                                </div>
                                <div class="rounded-2xl border border-[#d3c3c0]/30 p-4 md:col-span-2">
                                    <p class="text-[10px] font-bold uppercase tracking-widest text-[#655d5a]/70">Content Blocks</p>
                                    <p class="mt-2 text-sm font-semibold text-[#271310]">{{ record.badges_count }} badges</p>
                                    <p class="text-xs text-[#655d5a]">{{ record.journey_steps_count }} journey steps</p>
                                </div>
                              
                            </div>
                        </div>

                        <div class="w-full max-w-sm rounded-[24px] bg-[#271310] p-6 text-white">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-white/60">Primary QR</p>
                                    <p class="mt-2 text-sm font-semibold">{{ record.primary_qr?.format?.toUpperCase() ?? 'SVG' }} • {{ record.primary_qr?.size ?? 192 }}px</p>
                                </div>
                                <div class="rounded-xl bg-white p-3">
                                    <img :src="record.qr_url" alt="Traceability QR code" class="h-20 w-20" />
                                </div>
                            </div>

                            <div class="mt-6 space-y-3 text-xs text-white/70">
                                <p class="truncate">{{ record.primary_qr?.payload ?? record.public_url }}</p>
                            </div>

                            <div class="mt-6 flex flex-wrap gap-3">
                                <Link
                                    :href="record.public_url"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 rounded-full bg-[#a3f69c] px-4 py-2 text-xs font-bold uppercase tracking-widest text-[#002204]"
                                >
                                    <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                                    View Public Page
                                </Link>
                                <a
                                    :href="record.qr_url"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 rounded-full border border-white/20 px-4 py-2 text-xs font-bold uppercase tracking-widest text-white"
                                >
                                    <span class="material-symbols-outlined text-[16px]">qr_code_2</span>
                                    Open QR
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <section v-else class="rounded-[28px] bg-white p-10 text-center shadow-sm">
                <div class="mx-auto max-w-xl">
                    <span class="material-symbols-outlined text-5xl text-[#3e2723]/30">inventory</span>
                    <h2 class="mt-4 font-headline text-3xl font-bold text-[#271310]">No traceability records yet</h2>
                    <p class="mt-4 text-base leading-7 text-[#655d5a]">
                        Submit the traceability form to create the first record. Once saved, the result will appear here in the authenticated layout.
                    </p>
                    <Link
                        :href="route('traceability.create')"
                        class="mt-6 inline-flex items-center gap-2 rounded-full bg-[#271310] px-6 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02]"
                    >
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        Create First Record
                    </Link>
                </div>
            </section>
        </div>
    </AppLayout>
</template>
