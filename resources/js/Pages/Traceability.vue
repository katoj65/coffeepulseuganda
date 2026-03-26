<script setup>
import { computed } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

const props = defineProps({
    traceability: {
        type: Object,
        required: true,
    },
});

const traceability = computed(() => props.traceability);

const fallbackBadgeClasses = 'border border-[#d3c3c0]/40 bg-white/70 text-[#271310]/80';

const badgeClasses = (badge) => badge?.classes || fallbackBadgeClasses;

const publicUrl = computed(() => route('traceability.show', { batch: props.traceability.batch }));
const qrUrl = computed(() => route('qr.traceability', { batch: props.traceability.batch, size: 220 }));

const badges = computed(() => props.traceability.badges ?? []);
const impactCards = computed(() => props.traceability.impactCards ?? []);
const journeySteps = computed(() => props.traceability.journeySteps ?? []);
const estateDetails = computed(() => props.traceability.estate?.details ?? []);
const processDetails = computed(() => props.traceability.process?.details ?? []);
const sensoryProfile = computed(() => props.traceability.process?.sensoryProfile ?? []);
</script>

<template>
    <Head title="Traceability | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#f7f4ef] font-body text-[#271310] selection:bg-[#ece0dc] selection:text-[#271310]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('sample.index')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Our Lots</Link>
                <Link :href="route('marketplace')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
                <Link :href="route('origins')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Origins</Link>
                <Link :href="route('traceability.show', { batch: traceability.batch })" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">Traceability</Link>
            </template>
            <template #actions>
                <Link :href="route('contact')" class="rounded-lg border border-[#271310] px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#271310] transition-colors hover:bg-[#271310] hover:text-white">
                    Contact
                </Link>
            </template>
        </PublicHeader>

        <main class="mx-auto max-w-7xl space-y-8 px-6 pb-24 pt-24 md:px-10 md:pt-32">
            <section class="grid gap-8 xl:grid-cols-[1.45fr_0.85fr]">
                <div class="relative overflow-hidden rounded-[32px] bg-[#271310] p-8 text-white md:p-10">
                    <div class="absolute inset-0 opacity-20">
                        <img
                            :src="traceability.image"
                            alt="Traceability batch visual"
                            class="h-full w-full object-cover"
                        />
                    </div>
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(163,246,156,0.22),_transparent_40%),linear-gradient(135deg,_rgba(39,19,16,0.3),_rgba(39,19,16,0.92))]"></div>

                    <div class="relative z-10">
                        <div class="flex flex-wrap items-center gap-3">
                            <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.24em] text-white/75">
                                Batch Passport
                            </span>
                            <span class="inline-flex rounded-full border border-[#a3f69c]/30 bg-[#a3f69c]/15 px-3 py-1 text-[10px] font-bold uppercase tracking-[0.24em] text-[#caffc4]">
                                Issued by {{ traceability.issuer }}
                            </span>
                        </div>

                        <div class="mt-6 flex flex-wrap gap-3">
                            <div
                                v-for="badge in badges"
                                :key="badge.label"
                                class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-[11px] font-bold uppercase tracking-widest"
                                :class="badgeClasses(badge)"
                            >
                                <span class="material-symbols-outlined text-sm" :style="badge.icon === 'verified' ? `font-variation-settings: 'FILL' 1` : ''">{{ badge.icon }}</span>
                                {{ badge.label }}
                            </div>
                        </div>

                        <div class="mt-8 max-w-3xl">
                            <p class="text-xs font-bold uppercase tracking-[0.3em] text-white/50">Traceability Record</p>
                            <h1 class="mt-4 font-headline text-4xl font-bold leading-tight tracking-tight text-white md:text-6xl">
                                {{ traceability.batch }}
                            </h1>
                            <p class="mt-6 max-w-2xl text-base leading-7 text-white/72 md:text-lg">
                                A verified origin passport for this lot, bringing together source identity, production milestones, estate context, and blockchain-backed verification in one page.
                            </p>
                        </div>

                        <div class="mt-10 grid gap-4 sm:grid-cols-3">
                            <div class="rounded-2xl border border-white/10 bg-white/6 p-5 backdrop-blur-sm">
                                <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/45">Origin</p>
                                <p class="mt-3 text-lg font-semibold text-white">{{ traceability.coffee.origin }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/6 p-5 backdrop-blur-sm">
                                <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/45">Variety</p>
                                <p class="mt-3 text-lg font-semibold text-white">{{ traceability.coffee.variety }}</p>
                            </div>
                            <div class="rounded-2xl border border-white/10 bg-white/6 p-5 backdrop-blur-sm">
                                <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/45">Grade</p>
                                <p class="mt-3 text-lg font-semibold text-[#caffc4]">{{ traceability.coffee.grade }}</p>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-wrap gap-3">
                            <Link
                                :href="route('blockchain')"
                                class="inline-flex items-center gap-2 rounded-full bg-[#a3f69c] px-6 py-3 text-xs font-bold uppercase tracking-[0.2em] text-[#002204] transition-transform hover:scale-[1.02]"
                            >
                                <span class="material-symbols-outlined text-[16px]">hub</span>
                                View Ledger
                            </Link>
                            <Link
                                :href="route('contact')"
                                class="inline-flex items-center gap-2 rounded-full border border-white/20 px-6 py-3 text-xs font-bold uppercase tracking-[0.2em] text-white transition-colors hover:bg-white/10"
                            >
                                <span class="material-symbols-outlined text-[16px]">mail</span>
                                Contact Trade Desk
                            </Link>
                        </div>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="rounded-[32px] bg-white p-6 shadow-sm ring-1 ring-[#d3c3c0]/20 md:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">Lot Score</p>
                                <div class="mt-4 flex items-end gap-3">
                                    <span class="font-headline text-6xl font-bold leading-none text-[#271310]">{{ traceability.coffee.score }}</span>
                                    <span class="pb-2 text-sm font-bold uppercase tracking-[0.18em] text-[#003508]">SCA</span>
                                </div>
                            </div>
                            <div class="rounded-2xl bg-[#f4f0e9] p-3 text-[#271310]">
                                <span class="material-symbols-outlined text-3xl" style="font-variation-settings: 'FILL' 1">workspace_premium</span>
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3">
                            <div class="rounded-2xl bg-[#faf9f5] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#655d5a]/60">Record Type</p>
                                <p class="mt-2 text-sm font-semibold text-[#271310]">Origin Passport</p>
                            </div>
                            <div class="rounded-2xl bg-[#faf9f5] p-4">
                                <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#655d5a]/60">Issuer</p>
                                <p class="mt-2 text-sm font-semibold text-[#271310]">{{ traceability.issuer }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[32px] bg-[#efe7dc] p-6 shadow-sm ring-1 ring-[#d3c3c0]/20 md:p-8">
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">Scan & Verify</p>
                                <h2 class="mt-3 font-headline text-3xl font-bold text-[#271310]">Digital Batch Link</h2>
                                <p class="mt-3 text-sm leading-6 text-[#655d5a]">
                                    This QR points to the public passport for the batch and can be shared with buyers, exporters, and audit teams.
                                </p>
                            </div>
                            <div class="rounded-2xl bg-white p-4 shadow-sm">
                                <img :src="qrUrl" alt="Traceability QR code" class="h-28 w-28" />
                            </div>
                        </div>

                        <div class="mt-6 rounded-2xl bg-white/70 p-4">
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#655d5a]/60">Public URL</p>
                            <p class="mt-2 break-all text-sm text-[#271310]">{{ publicUrl }}</p>
                        </div>
                    </div>
                </aside>
            </section>

            <section class="grid gap-6 md:grid-cols-3">
                <article
                    v-for="card in impactCards"
                    :key="card.title"
                    class="rounded-[28px] bg-white p-6 shadow-sm ring-1 ring-[#d3c3c0]/20"
                >
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#f4f0e9] text-[#271310]">
                        <span class="material-symbols-outlined">{{ card.icon }}</span>
                    </div>
                    <p class="mt-6 text-[10px] font-bold uppercase tracking-[0.24em] text-[#655d5a]/65">{{ card.title }}</p>
                    <h3 class="mt-3 font-headline text-2xl font-bold text-[#271310]">{{ card.value }}</h3>
                </article>
            </section>

            <section class="rounded-[32px] bg-white p-8 shadow-sm ring-1 ring-[#d3c3c0]/20 md:p-10">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#655d5a]/70">Chain Of Custody</p>
                        <h2 class="mt-3 font-headline text-3xl font-bold text-[#271310] md:text-4xl">The Journey Of This Lot</h2>
                    </div>
                    <p class="max-w-xl text-sm leading-6 text-[#655d5a]">
                        Every milestone below reflects the documented path from farm-level production through post-harvest handling and export readiness.
                    </p>
                </div>

                <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <article
                        v-for="(step, index) in journeySteps"
                        :key="step.title"
                        class="relative overflow-hidden rounded-[28px] bg-[#f7f4ef] p-6"
                    >
                        <div class="absolute right-4 top-4 text-5xl font-black leading-none text-[#271310]/6">
                            {{ index + 1 }}
                        </div>
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#271310] text-white">
                            <span class="material-symbols-outlined">{{ step.icon }}</span>
                        </div>
                        <p class="mt-6 text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/65">{{ step.title }}</p>
                        <h3 class="mt-3 text-lg font-semibold text-[#271310]">{{ step.value }}</h3>
                    </article>
                </div>
            </section>

            <section class="grid gap-8 xl:grid-cols-[1fr_1fr]">
                <article class="overflow-hidden rounded-[32px] bg-[#dde5d9] shadow-sm ring-1 ring-[#cbd6c8]/70">
                    <div class="grid gap-0 lg:grid-cols-[1.2fr_0.8fr]">
                        <div class="p-8 md:p-10">
                            <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#3f4b3b]/65">{{ traceability.estate.eyebrow }}</p>
                            <h2 class="mt-4 font-headline text-3xl font-bold text-[#1d271c] md:text-4xl">{{ traceability.estate.title }}</h2>
                            <p class="mt-6 text-base leading-7 text-[#334033]">{{ traceability.estate.description }}</p>

                            <div class="mt-8 grid gap-4 sm:grid-cols-2">
                                <div
                                    v-for="detail in estateDetails"
                                    :key="detail.label"
                                    class="rounded-2xl bg-white/60 p-4"
                                >
                                    <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#3f4b3b]/55">{{ detail.label }}</p>
                                    <p class="mt-2 text-base font-semibold text-[#1d271c]">{{ detail.value }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between border-t border-[#b8c7b5]/60 bg-white/40 p-8 lg:border-l lg:border-t-0">
                            <div class="overflow-hidden rounded-[28px] bg-white/70">
                                <img
                                    :src="traceability.estate.farmerImage"
                                    alt="Portrait of the producer"
                                    class="aspect-[4/5] w-full object-cover"
                                />
                            </div>
                            <div class="mt-6">
                                <p class="font-headline text-2xl font-bold text-[#1d271c]">{{ traceability.estate.farmerName }}</p>
                                <p class="mt-2 text-sm leading-6 text-[#3f4b3b]">{{ traceability.estate.farmerRole }}</p>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="rounded-[32px] bg-[#f0ece4] p-8 shadow-sm ring-1 ring-[#d3c3c0]/20 md:p-10">
                    <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-[#655d5a]/70">{{ traceability.process.eyebrow }}</p>
                    <h2 class="mt-4 font-headline text-3xl font-bold text-[#271310] md:text-4xl">{{ traceability.process.title }}</h2>

                    <div class="mt-8 space-y-4">
                        <div
                            v-for="detail in processDetails"
                            :key="detail.label"
                            class="flex items-center justify-between gap-4 rounded-2xl bg-white/70 px-5 py-4"
                        >
                            <span class="text-sm font-medium uppercase tracking-[0.16em] text-[#655d5a]">{{ detail.label }}</span>
                            <span class="text-sm font-bold text-[#271310]">{{ detail.value }}</span>
                        </div>
                    </div>

                    <div class="mt-10 rounded-[28px] bg-[#271310] p-6 text-white">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/55">Sensory Profile</p>
                                <p class="mt-2 text-sm text-white/65">Expected cup character from the documented production profile.</p>
                            </div>
                            <span class="material-symbols-outlined text-3xl text-white/70">local_cafe</span>
                        </div>

                        <div class="mt-6 space-y-4">
                            <div
                                v-for="item in sensoryProfile"
                                :key="item.label"
                                class="flex items-center justify-between gap-4 rounded-2xl bg-white/6 px-4 py-3"
                            >
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-white/70">{{ item.icon }}</span>
                                    <span class="text-sm font-semibold text-white">{{ item.label }}</span>
                                </div>
                                <div class="flex gap-1">
                                    <div
                                        v-for="level in 5"
                                        :key="level"
                                        class="h-1.5 w-6 rounded-full"
                                        :class="level <= item.filled ? 'bg-[#a3f69c]' : 'bg-white/15'"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 rounded-2xl border border-[#d3c3c0]/60 bg-white/60 p-5">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-[#271310]">info</span>
                            <p class="text-sm leading-6 text-[#655d5a]">{{ traceability.process.note }}</p>
                        </div>
                    </div>
                </article>
            </section>

            <section class="relative overflow-hidden rounded-[32px] bg-[#271310] p-8 text-white shadow-sm md:p-10">
                <div class="absolute -right-12 -top-10 h-48 w-48 rounded-full bg-[#a3f69c]/10 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 h-40 w-40 rounded-full bg-white/5 blur-3xl"></div>

                <div class="relative z-10 grid gap-8 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-white/55">Blockchain Verification</p>
                        <h2 class="mt-4 font-headline text-3xl font-bold md:text-4xl">Immutable Record Integrity</h2>
                        <p class="mt-5 max-w-2xl text-sm leading-7 text-white/70">
                            {{ traceability.blockchain.description }}
                        </p>

                        <div class="mt-8 rounded-2xl bg-white/6 p-5">
                            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-white/55">Hash Sequence</p>
                            <code class="mt-3 block break-all font-mono text-sm text-white/85">{{ traceability.blockchain.hash }}</code>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 lg:items-end">
                        <Link
                            :href="route('blockchain')"
                            class="inline-flex items-center gap-2 rounded-full bg-[#a3f69c] px-6 py-3 text-xs font-bold uppercase tracking-[0.2em] text-[#002204] transition-transform hover:scale-[1.02]"
                        >
                            <span class="material-symbols-outlined text-[16px]">open_in_new</span>
                            View On Ledger
                        </Link>
                        <a
                            :href="qrUrl"
                            target="_blank"
                            class="inline-flex items-center gap-2 rounded-full border border-white/15 px-6 py-3 text-xs font-bold uppercase tracking-[0.2em] text-white transition-colors hover:bg-white/10"
                        >
                            <span class="material-symbols-outlined text-[16px]">qr_code_2</span>
                            Open QR
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>
