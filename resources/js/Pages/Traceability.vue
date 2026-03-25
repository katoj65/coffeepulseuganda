<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

defineProps({
    traceability: {
        type: Object,
        required: true,
    },
});
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

    <div class="bg-[#faf9f5] font-body text-[#271310] selection:bg-[#ece0dc]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('sample.index')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Our Lots</Link>
                <Link :href="`${route('home')}#global-scale`" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
                <Link :href="route('origins')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Origins</Link>
                <Link :href="route('traceability.show', { batch: traceability.batch })" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">Traceability</Link>
            </template>
            <template #actions>
                <Link :href="route('contact')" class="rounded-lg border border-[#271310] px-5 py-2 text-xs font-bold uppercase tracking-widest text-[#271310] transition-colors hover:bg-[#271310] hover:text-white">
                    Contact
                </Link>
            </template>
        </PublicHeader>

        <main class="mx-auto max-w-5xl space-y-16 px-6 pb-24 pt-24 md:px-12 md:pt-32">
            <header class="space-y-4 text-center">
                <div class="flex flex-wrap justify-center gap-3">
                    <div
                        v-for="badge in traceability.badges"
                        :key="badge.label"
                        class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-bold uppercase tracking-widest"
                        :class="badge.classes"
                    >
                        <span class="material-symbols-outlined text-sm" :style="badge.icon === 'verified' ? `font-variation-settings: 'FILL' 1` : ''">{{ badge.icon }}</span>
                        {{ badge.label }}
                    </div>
                </div>
                <h1 class="font-headline text-4xl font-bold tracking-tight text-[#271310] md:text-5xl lg:text-6xl">Batch Passport: #{{ traceability.batch }}</h1>
                <p class="font-body text-sm uppercase tracking-widest text-[#271310]/60">Issued by {{ traceability.issuer }}</p>
            </header>

            <section class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                <div class="aspect-[4/3] overflow-hidden rounded-xl bg-[#f4f4f0] lg:col-span-7">
                    <img
                        :src="traceability.image"
                        alt="Premium coffee beans"
                        class="h-full w-full object-cover grayscale-[0.2] transition-all duration-700 hover:grayscale-0"
                    />
                </div>

                <div class="space-y-8 lg:col-span-5">
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#271310]/40">Variety</span>
                        <h2 class="font-headline text-3xl font-bold">{{ traceability.coffee.variety }}</h2>
                    </div>
                    <div class="space-y-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-[#271310]/40">Origin</span>
                        <p class="text-2xl font-medium">{{ traceability.coffee.origin }}</p>
                    </div>
                    <div class="flex items-baseline gap-4">
                        <div class="rounded-xl bg-[#271310] px-6 py-4 text-center text-white">
                            <span class="mb-1 block text-xs uppercase tracking-widest opacity-70">SCA Score</span>
                            <span class="font-headline text-4xl font-bold tracking-tighter">{{ traceability.coffee.score }}</span>
                        </div>
                        <div class="font-medium text-[#003508]">{{ traceability.coffee.grade }}</div>
                    </div>
                </div>
            </section>

            <section class="grid grid-cols-1 gap-6 border-y border-[#d3c3c0]/20 py-8 md:grid-cols-3">
                <div v-for="card in traceability.impactCards" :key="card.title" class="flex flex-col items-center space-y-2 text-center">
                    <span class="material-symbols-outlined text-3xl text-[#271310]/40">{{ card.icon }}</span>
                    <h4 class="text-xs font-bold uppercase tracking-widest">{{ card.title }}</h4>
                    <p class="text-sm text-[#271310]/60">{{ card.value }}</p>
                </div>
            </section>

            <section class="rounded-xl bg-[#f4f4f0] p-8 md:p-12">
                <h3 class="mb-12 text-center font-headline text-2xl font-bold">The Journey</h3>
                <div class="relative grid grid-cols-1 gap-8 md:grid-cols-4">
                    <div v-for="step in traceability.journeySteps" :key="step.title" class="relative z-10 space-y-4">
                        <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-[#271310] text-white">
                            <span class="material-symbols-outlined">{{ step.icon }}</span>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-1 text-sm font-bold uppercase tracking-widest">{{ step.title }}</h4>
                            <p class="text-sm text-[#271310]/70">{{ step.value }}</p>
                        </div>
                    </div>
                    <div class="absolute left-12 right-12 top-6 hidden h-[2px] bg-[#271310]/10 md:block"></div>
                </div>
            </section>

            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <section class="flex flex-col justify-between rounded-xl bg-[#e2e3df] p-8 md:p-10">
                    <div>
                        <span class="mb-4 block text-xs font-bold uppercase tracking-widest text-[#271310]/40">{{ traceability.estate.eyebrow }}</span>
                        <h3 class="mb-6 font-headline text-3xl font-bold">{{ traceability.estate.title }}</h3>
                        <p class="mb-8 leading-relaxed text-[#271310]/80">{{ traceability.estate.description }}</p>
                        <div class="mb-8 grid grid-cols-2 gap-y-4">
                            <div v-for="detail in traceability.estate.details" :key="detail.label">
                                <span class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]/40">{{ detail.label }}</span>
                                <p class="font-bold text-[#271310]">{{ detail.value }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="h-16 w-16 overflow-hidden rounded-full">
                            <img
                                :src="traceability.estate.farmerImage"
                                alt="Portrait of a coffee farmer"
                                class="h-full w-full object-cover"
                            />
                        </div>
                        <div>
                            <p class="font-bold text-[#271310]">{{ traceability.estate.farmerName }}</p>
                            <p class="text-sm text-[#271310]/60">{{ traceability.estate.farmerRole }}</p>
                        </div>
                    </div>
                </section>

                <section class="rounded-xl bg-[#eeeeea] p-8 md:p-10">
                    <span class="mb-4 block text-xs font-bold uppercase tracking-widest text-[#271310]/40">{{ traceability.process.eyebrow }}</span>
                    <h3 class="mb-8 font-headline text-3xl font-bold">{{ traceability.process.title }}</h3>
                    <div class="space-y-6">
                        <div v-for="detail in traceability.process.details" :key="detail.label" class="flex items-center justify-between border-b border-[#d3c3c0]/30 pb-3">
                            <span class="font-medium text-[#271310]/60">{{ detail.label }}</span>
                            <span class="font-bold text-[#271310]">{{ detail.value }}</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <span class="mb-4 block text-xs font-bold uppercase tracking-widest text-[#271310]/40">Sensory Profile</span>
                        <div class="grid grid-cols-1 gap-4">
                            <div v-for="item in traceability.process.sensoryProfile" :key="item.label" class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-[#271310]/40">{{ item.icon }}</span>
                                    <span class="font-bold">{{ item.label }}</span>
                                </div>
                                <div class="flex gap-1">
                                    <div
                                        v-for="level in 5"
                                        :key="level"
                                        class="h-1 w-6"
                                        :class="level <= item.filled ? 'bg-[#271310]' : 'bg-[#271310]/10'"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center gap-4 rounded-lg border border-[#d3c3c0]/20 p-4">
                        <span class="material-symbols-outlined text-[#271310]">info</span>
                        <p class="text-xs italic leading-snug text-[#271310]/60">{{ traceability.process.note }}</p>
                    </div>
                </section>
            </div>

            <section class="relative overflow-hidden rounded-xl bg-[#271310] p-8 text-white md:p-12">
                <div class="absolute right-0 top-0 p-8 opacity-10">
                    <span class="material-symbols-outlined text-[120px]">hub</span>
                </div>
                <div class="relative z-10 flex flex-col items-start justify-between gap-8 md:flex-row md:items-center">
                    <div class="space-y-4">
                        <h3 class="font-headline text-2xl font-bold">Blockchain Verification</h3>
                        <div class="space-y-2">
                            <p class="text-xs font-bold uppercase tracking-widest text-white/60">Hash Sequence</p>
                            <code class="block break-all rounded-lg bg-white/5 px-4 py-2 font-mono text-sm text-white/80 md:inline-block">{{ traceability.blockchain.hash }}</code>
                        </div>
                        <p class="max-w-md text-sm text-white/60">{{ traceability.blockchain.description }}</p>
                    </div>

                    <Link
                        :href="route('blockchain')"
                        class="flex items-center gap-2 rounded-md bg-[#a3f69c] px-8 py-4 text-sm font-bold uppercase tracking-widest text-[#002204] transition-transform duration-200 ease-out hover:scale-[1.02]"
                    >
                        <span class="material-symbols-outlined text-sm">open_in_new</span>
                        View on Ledger
                    </Link>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>
