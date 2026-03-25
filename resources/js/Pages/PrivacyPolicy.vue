<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

const sections = [
    { id: 'tos', number: '01', title: 'Terms of Service' },
    { id: 'privacy', number: '02', title: 'Privacy Policy' },
    { id: 'ethical', number: '03', title: 'Ethical Trade' },
    { id: 'sustainability', number: '04', title: 'Sustainability Standards' },
    { id: 'cookies', number: '05', title: 'Cookie Policy' },
];

const sustainabilityCards = [
    {
        icon: 'water_drop',
        title: 'Water Management',
        description: 'Producers must utilize closed-loop wet milling systems to prevent wastewater runoff into local ecosystems. We fund the installation of biological filters for our partner farms.',
    },
    {
        icon: 'forest',
        title: 'Agroforestry',
        description: 'All beans sourced through our network must be shade-grown under a diverse canopy, promoting bird habitats and natural pest control without chemicals.',
    },
];
</script>

<template>
    <Head title="Privacy Policy | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;700&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#271310] selection:bg-[#a3f69c] selection:text-[#002204]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <Link :href="route('policy.show')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">Policy</Link>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main class="mx-auto max-w-[1320px] px-6 py-16 md:px-12 md:py-24">
            <section class="mb-20 text-center md:text-left">
                <div class="flex flex-col justify-between gap-8 md:flex-row md:items-end">
                    <div class="max-w-3xl">
                        <h6 class="mb-4 font-label text-sm uppercase tracking-[0.2em] text-[#005312]">Governance &amp; Trust</h6>
                        <h1 class="mb-8 font-headline text-5xl font-bold leading-tight md:text-6xl">
                            Our Policies &amp; <br />Ethical Framework
                        </h1>
                        <p class="max-w-2xl text-lg leading-relaxed text-[#655d5a] md:text-xl">
                            At Coffee Pulse Uganda, transparency is a working principle. Our sourcing, trade, and data practices are designed to protect producers, inform buyers, and maintain a verifiable standard across the supply chain.
                        </p>
                    </div>

                    <div class="hidden flex-col items-center gap-2 rounded-lg border border-[#e2e3df] bg-white p-6 md:flex">
                        <div class="flex h-32 w-32 items-center justify-center bg-[#271310] text-white">
                            <span class="material-symbols-outlined text-6xl" style="font-variation-settings: 'wght' 200">qr_code_2</span>
                        </div>
                        <span class="mt-2 font-label text-[10px] uppercase tracking-widest text-[#655d5a]">Verified Framework v2.4</span>
                    </div>
                </div>
            </section>

            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
                <aside class="hidden lg:col-span-3 lg:block">
                    <div class="sticky top-32 space-y-6">
                        <h4 class="border-b border-[#eeeeea] pb-4 font-headline text-xl font-bold">On this page</h4>
                        <ul class="space-y-4 font-label text-sm uppercase tracking-wider">
                            <li v-for="section in sections" :key="section.id">
                                <a
                                    :href="`#${section.id}`"
                                    class="flex items-center gap-2 transition-colors"
                                    :class="section.id === 'tos' ? 'text-[#271310] hover:text-[#005312]' : 'text-[#655d5a] hover:text-[#271310]'"
                                >
                                    <span v-if="section.id === 'tos'" class="h-1.5 w-1.5 rounded-full bg-[#271310]"></span>
                                    {{ section.title }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <div class="space-y-32 lg:col-span-9">
                    <section id="tos" class="scroll-mt-32">
                        <div class="mb-8 flex items-center gap-4">
                            <span class="font-headline text-3xl text-[#3e2723]/30">01</span>
                            <h2 class="font-headline text-3xl font-bold">Terms of Service</h2>
                        </div>
                        <div class="space-y-8 bg-white p-8 text-[18px] leading-relaxed text-[#655d5a] md:p-12">
                            <p>
                                These terms govern the sourcing, listing, and trade of green coffee lots across the Coffee Pulse Uganda network. By using our marketplace, you agree to origin verification, quality review, and documentation requirements intended to reduce fraud and preserve lot integrity.
                            </p>
                            <div class="grid gap-8 md:grid-cols-2">
                                <div class="space-y-4">
                                    <h3 class="font-headline text-lg font-bold text-[#271310]">Trade &amp; Settlement</h3>
                                    <p class="text-base">
                                        Transactions move forward only after quality data, moisture readings, and export documentation have been reviewed against the lot profile. Settlement terms are tied to verified delivery milestones.
                                    </p>
                                </div>
                                <div class="space-y-4">
                                    <h3 class="font-headline text-lg font-bold text-[#271310]">User Conduct</h3>
                                    <p class="text-base">
                                        Misrepresentation of farm origin, cooperative identity, or sensory data results in account suspension and removal from future trading opportunities within our network.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="privacy" class="scroll-mt-32">
                        <div class="mb-8 flex items-center gap-4">
                            <span class="font-headline text-3xl text-[#3e2723]/30">02</span>
                            <h2 class="font-headline text-3xl font-bold">Privacy Policy</h2>
                        </div>
                        <div class="space-y-8 bg-[#eeeeea] p-8 text-[18px] leading-relaxed text-[#655d5a] md:p-12">
                            <p>
                                We handle producer, buyer, and logistics data with the same care we apply to traceability. Sensitive business information stays protected while verified origin and trade records remain clear enough to support trust and accountability.
                            </p>
                            <div class="flex flex-col items-start gap-8 md:flex-row">
                                <div class="flex-1 space-y-4">
                                    <h3 class="font-headline text-lg font-bold text-[#271310]">Data Minimization &amp; Traceability</h3>
                                    <p class="text-base">
                                        We collect only the operational data needed for sourcing, compliance, and delivery. Traceability records are structured to confirm legitimacy without exposing personal details beyond what a transaction requires.
                                    </p>
                                </div>
                                <div class="max-w-xs rounded-lg border border-[#d3c3c0]/30 bg-white p-6">
                                    <div class="mb-3 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[#005312]">security</span>
                                        <span class="font-label text-xs font-bold uppercase tracking-widest text-[#005312]">Protected Records</span>
                                    </div>
                                    <p class="text-xs leading-tight text-[#655d5a]">
                                        Location, shipment, and cooperative records are stored with access controls that reduce misuse while preserving auditability.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="ethical" class="scroll-mt-32">
                        <div class="mb-8 flex items-center gap-4">
                            <span class="font-headline text-3xl text-[#3e2723]/30">03</span>
                            <h2 class="font-headline text-3xl font-bold">Ethical Trade Policy</h2>
                        </div>
                        <div class="group relative overflow-hidden">
                            <div class="pointer-events-none absolute inset-0 opacity-10">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCqa2wuGWsWTSc-hMwf3XoShcqUC5SpG92EDIHa2qFjQlitYXKm7-LjJXiBkH5UbG0qQOjoEnD3WMFHetZEdtkdvvfZnZugnYNu-LED_5XZgWdPLNP1_XxMmDKwMnd7Qa1ox3cKkpQjp0oC5hWQ1YEMadBkNoy-b2qVurYVjKk8zUBrA1XYQN-_jNxZZCHBchS7rRv5DlfapBoKJLeyxo2CLNGp3_OfUTYYTyDzHVr-7TBjPct1Na3xXQPjq0zmSjDHhXDF8ESKwHw"
                                    alt="Coffee producer holding green coffee beans"
                                    class="h-full w-full object-cover"
                                />
                            </div>
                            <div class="relative bg-[#003508] p-8 text-white md:p-12">
                                <div class="max-w-2xl space-y-6">
                                    <p class="text-xl font-light italic leading-relaxed">"Reducing opacity in trade is not just efficient. It is fairer for everyone involved."</p>
                                    <p class="text-[18px]">
                                        Our sourcing model prioritizes direct relationships, transparent pricing logic, and documented quality outcomes. We aim to make sure more value reaches producers while buyers receive dependable, well-documented lots.
                                    </p>
                                    <div class="flex flex-wrap gap-4">
                                        <span class="rounded-full bg-[#a3f69c] px-4 py-2 font-label text-xs font-bold uppercase tracking-widest text-[#003508]">Fair Pricing Focus</span>
                                        <span class="rounded-full bg-[#a3f69c] px-4 py-2 font-label text-xs font-bold uppercase tracking-widest text-[#003508]">Transparent Documentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="sustainability" class="scroll-mt-32">
                        <div class="mb-8 flex items-center gap-4">
                            <span class="font-headline text-3xl text-[#3e2723]/30">04</span>
                            <h2 class="font-headline text-3xl font-bold">Sustainability Standards</h2>
                        </div>
                        <div class="grid gap-8 md:grid-cols-2">
                            <div v-for="card in sustainabilityCards" :key="card.title" class="space-y-6 bg-[#e8e8e4] p-8">
                                <span class="material-symbols-outlined text-4xl text-[#005312]">{{ card.icon }}</span>
                                <h3 class="font-headline text-xl font-bold">{{ card.title }}</h3>
                                <p class="text-base text-[#655d5a]">{{ card.description }}</p>
                            </div>
                        </div>
                    </section>

                    <section id="cookies" class="scroll-mt-32 pb-20">
                        <div class="mb-8 flex items-center gap-4">
                            <span class="font-headline text-3xl text-[#3e2723]/30">05</span>
                            <h2 class="font-headline text-3xl font-bold">Cookie Policy</h2>
                        </div>
                        <div class="border border-[#eeeeea] p-8 text-[16px] leading-relaxed text-[#655d5a]">
                            <p>
                                We use essential cookies only. These support secure sessions, core navigation, and basic preference handling. We do not use third-party advertising cookies, and we do not treat visitor privacy as a resale asset.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </main>

        <PublicFooter />
    </div>
</template>
