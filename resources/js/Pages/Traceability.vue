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

const pickDetail = (items, labels, fallback = 'Not provided') => {
    const match = (items || []).find((item) => labels.includes(item.label));

    return match?.value || fallback;
};

const shortenHash = (value) => {
    if (!value) {
        return 'Pending';
    }

    if (value.length <= 16) {
        return value;
    }

    return `${value.slice(0, 6)}...${value.slice(-4)}`;
};

const estateImage = computed(() => props.traceability.estate?.farmerImage || props.traceability.image);
const badges = computed(() => props.traceability.badges || []);
const impactCards = computed(() => props.traceability.impactCards || []);
const processDetails = computed(() => props.traceability.process?.details || []);

const heroFacts = computed(() => [
    { label: 'SCA Score', value: props.traceability.coffee?.score || 'N/A' },
    { label: 'Grade', value: props.traceability.coffee?.grade || 'N/A' },
    { label: 'Varietal', value: props.traceability.coffee?.variety || 'N/A' },
    { label: 'Altitude', value: pickDetail(props.traceability.estate?.details, ['Altitude']) },
]);

const primaryNotes = computed(() => {
    const notes = (props.traceability.process?.sensoryProfile || [])
        .slice(0, 3)
        .map((item) => item.label)
        .filter(Boolean);

    return notes.length ? notes : ['Traceable', 'Verified', 'Specialty'];
});

const ledgerRows = computed(() =>
    (props.traceability.journeySteps || []).map((step, index) => ({
        event: step.title,
        participant: index === 0
            ? props.traceability.estate?.title || props.traceability.estate?.farmerName || props.traceability.issuer
            : index === props.traceability.journeySteps.length - 1
                ? props.traceability.issuer
                : 'OriginTrace Protocol',
        timestamp: step.value,
        hash: shortenHash(props.traceability.blockchain?.hash),
    })),
);

const printCertificate = () => {
    if (typeof window !== 'undefined') {
        window.print();
    }
};
</script>

<template>
    <Head :title="`Traceability | ${traceability.batch}`">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;600;700;900&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#1a1c1a] selection:bg-[#003508] selection:text-[#a3f69c]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <Link :href="route('marketplace')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main class="px-6 pb-20 pt-20 lg:px-0">
            <section class="mx-auto mb-20 max-w-5xl text-center">
                <div class="mb-6 inline-flex items-center gap-2 rounded-full bg-[#003508] px-4 py-1.5 text-[#a3f69c]">
                    <span class="material-symbols-outlined text-sm" style="font-variation-settings: 'FILL' 1">verified</span>
                    <span class="text-xs font-bold uppercase tracking-widest">Verified Batch</span>
                </div>

                <h1 class="font-headline text-5xl font-black tracking-tight text-[#271310] md:text-7xl">
                    #{{ traceability.batch }}
                </h1>
                <p class="mb-12 mt-6 font-headline text-2xl italic text-[#504442]">
                    {{ traceability.coffee?.grade }} • {{ traceability.coffee?.origin }}
                </p>

                <div v-if="badges.length" class="mb-8 flex flex-wrap justify-center gap-3">
                    <div
                        v-for="badge in badges"
                        :key="badge.label"
                        class="inline-flex items-center gap-2 rounded-full px-4 py-2 text-xs font-bold uppercase tracking-widest"
                        :class="badge.classes || 'border border-[#d3c3c0]/30 bg-[#e8e8e4] text-[#271310]/70'"
                    >
                        <span class="material-symbols-outlined text-sm">{{ badge.icon }}</span>
                        <span>{{ badge.label }}</span>
                    </div>
                </div>

                <div class="mx-auto grid max-w-4xl grid-cols-2 gap-4 md:grid-cols-4">
                    <div
                        v-for="fact in heroFacts"
                        :key="fact.label"
                        class="rounded-xl bg-[#f4f4f0] p-8"
                    >
                        <span class="mb-2 block text-xs font-bold uppercase tracking-widest text-[#6b6360]">{{ fact.label }}</span>
                        <span class="font-headline text-2xl font-bold text-[#271310] md:text-3xl">{{ fact.value }}</span>
                    </div>
                </div>
            </section>

            <section v-if="impactCards.length" class="mx-auto mb-20 max-w-6xl">
                <div class="grid gap-4 md:grid-cols-3">
                    <div
                        v-for="card in impactCards"
                        :key="card.title"
                        class="rounded-2xl bg-[#f4f4f0] p-6"
                    >
                        <div class="flex items-start justify-between gap-4">
                            <div>
                                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">{{ card.title }}</p>
                                <p class="mt-3 font-headline text-2xl font-bold text-[#271310]">{{ card.value }}</p>
                            </div>
                            <span class="material-symbols-outlined text-2xl text-[#745853]">{{ card.icon }}</span>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto mb-20 max-w-6xl">
                <div class="mb-12 flex flex-col justify-between gap-4 md:flex-row md:items-center">
                    <h2 class="font-headline text-3xl font-bold text-[#271310]">The Journey</h2>
                    <div class="flex items-center gap-2 rounded-lg bg-[#003508]/10 px-4 py-2 text-[#005312]">
                        <span class="material-symbols-outlined text-lg">account_balance_wallet</span>
                        <span class="text-sm font-bold">On-Chain Verified</span>
                    </div>
                </div>

                <div class="relative py-12">
                    <div class="absolute left-0 top-1/2 hidden h-px w-full -translate-y-1/2 bg-[#d3c3c0]/40 md:block"></div>

                    <div class="relative grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div
                            v-for="(step, index) in traceability.journeySteps"
                            :key="`${step.title}-${index}`"
                            class="rounded-xl bg-[#f4f4f0] p-6 md:bg-transparent md:p-0"
                        >
                            <div class="relative z-10 mb-6 flex h-12 w-12 items-center justify-center rounded-full bg-[#271310] text-white md:mx-auto">
                                <span class="material-symbols-outlined">{{ step.icon }}</span>
                            </div>
                            <div class="md:text-center">
                                <h3 class="font-headline text-xl font-bold text-[#271310]">{{ step.title }}</h3>
                                <p class="mb-4 mt-1 text-sm text-[#504442]">{{ step.value }}</p>
                                <code class="rounded bg-[#e8e8e4] px-2 py-1 text-[10px] text-[#504442]">
                                    {{ shortenHash(traceability.blockchain?.hash) }}
                                </code>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto mb-20 grid max-w-6xl grid-cols-1 gap-12 lg:grid-cols-2">
                <div class="rounded-[1.5rem] bg-[#eeeeea] p-10">
                    <h3 class="mb-8 flex items-center gap-3 font-headline text-2xl font-bold text-[#271310]">
                        <span class="material-symbols-outlined text-[#745853]">filter_vintage</span>
                        Sensory Analysis
                    </h3>

                    <div class="space-y-8">
                        <div class="flex flex-col gap-4 border-b border-[#d3c3c0]/30 pb-4">
                            <span class="text-xs font-bold uppercase tracking-widest text-[#504442]">Primary Notes</span>
                            <div class="flex flex-wrap gap-2">
                                <span
                                    v-for="note in primaryNotes"
                                    :key="note"
                                    class="rounded bg-[#ece0dc] px-3 py-1 text-xs font-bold text-[#271310]"
                                >
                                    {{ note }}
                                </span>
                            </div>
                        </div>

                        <div
                            v-for="item in traceability.process?.sensoryProfile || []"
                            :key="item.label"
                            class="flex items-center justify-between border-b border-[#d3c3c0]/30 pb-4"
                        >
                            <span class="text-xs font-bold uppercase tracking-widest text-[#504442]">{{ item.label }}</span>
                            <div class="flex items-center gap-1">
                                <span
                                    v-for="dot in 5"
                                    :key="dot"
                                    :class="dot <= Number(item.filled || 0) ? 'bg-[#271310]' : 'bg-[#d3c3c0]'"
                                    class="h-2.5 w-2.5 rounded-full"
                                ></span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 rounded-xl bg-white p-6">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">Process Note</p>
                        <p class="text-sm italic leading-relaxed text-[#504442]">
                            {{ traceability.process?.note }}
                        </p>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-[1.5rem]">
                    <img
                        :src="estateImage"
                        :alt="traceability.estate?.title || traceability.estate?.farmerName"
                        class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-[#271310] via-[#271310]/50 to-transparent"></div>

                    <div class="relative flex h-full flex-col justify-end p-10 text-white">
                        <span class="mb-4 inline-block w-fit rounded bg-[#a3f69c] px-3 py-1 text-[10px] font-bold uppercase tracking-widest text-[#002204]">
                            {{ traceability.estate?.eyebrow }}
                        </span>

                        <p class="mb-2 text-sm font-semibold uppercase tracking-[0.18em] text-white/70">
                            {{ traceability.estate?.title }}
                        </p>

                        <div class="mb-4 flex items-center gap-4">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-white/10 backdrop-blur">
                                <span class="material-symbols-outlined text-3xl text-[#a3f69c]">person</span>
                            </div>
                            <div>
                                <h3 class="font-headline text-3xl font-black">{{ traceability.estate?.farmerName }}</h3>
                                <p class="text-xs font-bold uppercase tracking-widest text-white/70">{{ traceability.estate?.farmerRole }}</p>
                            </div>
                        </div>

                        <p class="mb-6 text-sm leading-relaxed text-white/80">
                            {{ traceability.estate?.description }}
                        </p>

                        <div class="flex flex-wrap gap-3">
                            <div
                                v-for="detail in traceability.estate?.details || []"
                                :key="detail.label"
                                class="rounded-lg border border-white/10 bg-white/10 px-3 py-1.5 text-xs backdrop-blur"
                            >
                                <span class="font-bold">{{ detail.label }}:</span>
                                {{ detail.value }}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section v-if="processDetails.length" class="mx-auto mb-20 max-w-6xl">
                <div class="rounded-[2rem] bg-white p-8 shadow-sm">
                    <div class="mb-8">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-[#655d5a]/70">{{ traceability.process?.eyebrow }}</p>
                        <h2 class="mt-3 font-headline text-3xl font-bold text-[#271310]">{{ traceability.process?.title }}</h2>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-4">
                        <div
                            v-for="detail in processDetails"
                            :key="detail.label"
                            class="rounded-2xl bg-[#f4f4f0] p-5"
                        >
                            <p class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">{{ detail.label }}</p>
                            <p class="mt-3 text-sm font-semibold text-[#271310]">{{ detail.value }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mx-auto mb-20 max-w-6xl">
                <div class="rounded-[2rem] bg-[#e8e8e4] p-8 lg:p-12">
                    <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="mb-2 font-headline text-3xl font-bold text-[#271310]">Immutable Record</h2>
                            <p class="text-sm text-[#504442]">Verified digital deed of origin and transaction ledger from {{ traceability.issuer }}.</p>
                        </div>

                        <button
                            type="button"
                            class="inline-flex items-center gap-2 rounded-md bg-[#271310] px-8 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02]"
                            @click="printCertificate"
                        >
                            <span class="material-symbols-outlined text-lg">download</span>
                            Export Certificate
                        </button>
                    </div>

                    <div class="overflow-hidden rounded-xl bg-white">
                        <table class="w-full text-left text-sm">
                            <thead>
                                <tr class="bg-[#eeeeea] text-[10px] font-bold uppercase tracking-widest text-[#504442]">
                                    <th class="px-6 py-4">Event</th>
                                    <th class="px-6 py-4">Participant</th>
                                    <th class="px-6 py-4">Timestamp</th>
                                    <th class="px-6 py-4">Transaction Hash</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#d3c3c0]/20">
                                <tr
                                    v-for="(row, index) in ledgerRows"
                                    :key="`${row.event}-${index}`"
                                    :class="index % 2 === 1 ? 'bg-[#f4f4f0]/40' : 'bg-white'"
                                    class="transition-colors hover:bg-[#f4f4f0]"
                                >
                                    <td class="px-6 py-5 font-bold text-[#271310]">{{ row.event }}</td>
                                    <td class="px-6 py-5">{{ row.participant }}</td>
                                    <td class="px-6 py-5 text-[#504442]">{{ row.timestamp }}</td>
                                    <td class="px-6 py-5">
                                        <code class="text-[10px] text-[#005312]">{{ row.hash }}</code>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-8 rounded-xl bg-[#f4f4f0] p-6">
                        <p class="text-xs font-bold uppercase tracking-widest text-[#504442]">Blockchain Hash</p>
                        <p class="mt-2 font-mono text-sm text-[#271310]">{{ traceability.blockchain?.hash }}</p>
                        <p class="mt-4 text-sm leading-relaxed text-[#504442]">{{ traceability.blockchain?.description }}</p>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>
