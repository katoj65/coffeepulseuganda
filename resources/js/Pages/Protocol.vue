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

const ledgerPoints = [
    {
        icon: 'task_alt',
        title: 'Cryptographic Proof',
        description: 'Each lot is assigned a unique digital fingerprint (hash) at the point of harvest.',
    },
    {
        icon: 'sync_alt',
        title: 'Real-time Reconciliation',
        description: 'Automated smart contracts verify volume flow to prevent coffee washing or diluting premium lots.',
    },
];

const gradingCards = [
    {
        icon: 'cognition',
        label: 'Arabica',
        title: 'SCA Standards',
        description: 'Evaluation of fragrance, flavor, aftertaste, acidity, body, and balance. Minimum score of 80 required for specialty status.',
    },
    {
        icon: 'assignment_turned_in',
        label: 'Robusta',
        title: 'Fine Robusta Protocol',
        description: 'Utilizing CQI standards for Fine Robusta to identify high-quality, sustainable alternatives to traditional varietals.',
    },
    {
        icon: 'badge',
        label: 'Staff',
        title: 'Q-Grader Verification',
        description: 'All sensory reports are digitally signed by a licensed Q-Grader to ensure professional objectivity.',
    },
];

const sourcingPillars = [
    {
        title: 'Transparency',
        description: 'Farmers can view the final sale price of their coffee in real-time on our public gateway.',
    },
    {
        title: 'Infrastructure',
        description: '5% of every transaction fee is reinvested into local washing stations and drying beds.',
    },
];

const traceabilitySteps = [
    {
        number: '1',
        icon: 'agriculture',
        title: 'Harvest Registration',
        description: 'IoT scales record weight and geolocate the farm lot.',
    },
    {
        number: '2',
        icon: 'waves',
        title: 'Processing Update',
        description: 'Status change to Washed, Honey, or Natural process on-chain.',
    },
    {
        number: '3',
        icon: 'fact_check',
        title: 'Quality Cupping',
        description: 'Certified score entry and lot grading certification.',
    },
    {
        number: '4',
        icon: 'sailing',
        title: 'Export Clearance',
        description: 'Final bill of lading issued with cryptographic verification.',
    },
];

const complianceTags = [
    { icon: 'eco', label: 'EUDR Deforestation' },
    { icon: 'security', label: 'US C-TPAT' },
    { icon: 'workspace_premium', label: 'ISO 22000' },
];
</script>

<template>
    <Head title="Protocol | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Manrope:wght@300;400;600;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#fdfbf7] font-body text-[#1a1c1a] selection:bg-[#a3f69c] selection:text-[#002204]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('origins')" class="nav-link text-xs font-semibold uppercase tracking-[0.1em] text-[#271310]/60">Origins</Link>
                <Link :href="route('contact')" class="nav-link text-xs font-semibold uppercase tracking-[0.1em] text-[#271310]/60">Contact</Link>
            </template>
            <template #actions>
                <template v-if="$page.props.auth.user">
                    <Link :href="route('dashboard')" class="rounded-lg bg-[#271310] px-7 py-3 text-xs font-bold uppercase tracking-widest text-white transition-all hover:bg-[#3e2723]">
                        Source Ugandan Coffee
                    </Link>
                </template>
                <template v-else-if="canRegister">
                    <Link :href="route('register')" class="rounded-lg bg-[#271310] px-7 py-3 text-xs font-bold uppercase tracking-widest text-white transition-all hover:bg-[#3e2723]">
                        Source Ugandan Coffee
                    </Link>
                </template>
                <template v-else-if="canLogin">
                    <Link :href="route('login')" class="rounded-lg bg-[#271310] px-7 py-3 text-xs font-bold uppercase tracking-widest text-white transition-all hover:bg-[#3e2723]">
                        Source Ugandan Coffee
                    </Link>
                </template>
                <Link v-else :href="route('inventory.index')" class="rounded-lg bg-[#271310] px-7 py-3 text-xs font-bold uppercase tracking-widest text-white transition-all hover:bg-[#3e2723]">
                    Source Ugandan Coffee
                </Link>
            </template>
        </PublicHeader>

        <main>
            <section class="bg-[#fdfbf7] pb-20 pt-40 md:pb-32 md:pt-48">
                <div class="container-lg">
                    <div class="hero-gradient relative overflow-hidden rounded-[1.5rem] p-16 text-center text-white lg:p-28">
                        <div class="relative z-10 mx-auto max-w-3xl">
                            <span class="mb-10 inline-block rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-[10px] uppercase tracking-[0.2em]">
                                The Bean Origin Protocol
                            </span>
                            <h1 class="mb-10 font-headline text-5xl font-bold leading-[1.1] md:text-7xl">The Trust Protocol</h1>
                            <p class="mx-auto mb-14 max-w-2xl text-lg font-light leading-relaxed opacity-70 md:text-2xl">
                                A robust framework for a transparent coffee exchange, bridging the gap between historical heritage and digital immutability.
                            </p>
                            <div class="flex flex-col justify-center gap-6 sm:flex-row">
                                <a href="#ledger" class="rounded-xl bg-[#a3f69c] px-12 py-5 text-xs font-bold uppercase tracking-widest text-[#002204] transition-all hover:brightness-105">
                                    Explore Ledger
                                </a>
                                <a href="#governance" class="rounded-xl bg-white/5 px-12 py-5 text-xs font-bold uppercase tracking-widest text-white transition-all hover:bg-white/10">
                                    Download Whitepaper
                                </a>
                            </div>
                        </div>
                        <div class="absolute bottom-0 right-0 -mb-32 -mr-32 h-64 w-64 rounded-full bg-[#a3f69c]/5 blur-3xl"></div>
                    </div>
                </div>
            </section>

            <section id="ledger" class="bg-[#f4f4f0] py-24 md:py-40">
                <div class="container-lg">
                    <div class="grid grid-cols-1 items-center gap-20 lg:grid-cols-2">
                        <div class="rounded-[1.5rem] bg-white p-12 md:p-16">
                            <div class="grid grid-cols-3 gap-8">
                                <div class="flex flex-col items-center justify-center rounded-2xl bg-[#e8e8e4] p-8 transition-transform hover:-translate-y-1">
                                    <span class="material-symbols-outlined mb-4 text-3xl text-[#271310]">block</span>
                                    <div class="h-0.5 w-8 rounded-full bg-[#271310]/20"></div>
                                </div>
                                <div class="flex translate-y-8 flex-col items-center justify-center rounded-2xl bg-[#e8e8e4] p-8 transition-transform hover:-translate-y-1">
                                    <span class="material-symbols-outlined mb-4 text-3xl text-[#003508]">link</span>
                                    <div class="h-0.5 w-8 rounded-full bg-[#003508]/20"></div>
                                </div>
                                <div class="flex flex-col items-center justify-center rounded-2xl bg-[#e8e8e4] p-8 transition-transform hover:-translate-y-1">
                                    <span class="material-symbols-outlined mb-4 text-3xl text-[#271310]">verified_user</span>
                                    <div class="h-0.5 w-8 rounded-full bg-[#271310]/20"></div>
                                </div>
                                <div class="col-span-2 mt-8 rounded-2xl bg-[#271310] p-8 text-white">
                                    <span class="mb-3 block text-[10px] font-bold uppercase tracking-[0.2em] opacity-50">Hash Verification</span>
                                    <code class="break-all font-mono text-sm tracking-wider opacity-80">0x4F7e29A1C394...d92F</code>
                                </div>
                                <div class="mt-8 flex items-center justify-center rounded-2xl bg-[#a3f69c] p-8 text-[#002204]">
                                    <span class="material-symbols-outlined text-3xl">hub</span>
                                </div>
                            </div>
                        </div>

                        <div class="lg:pl-10">
                            <h2 class="mb-10 font-headline text-4xl font-bold leading-tight text-[#271310] md:text-5xl">Immutable Ledger</h2>
                            <p class="mb-12 text-lg font-light leading-relaxed text-[#504442] md:text-xl">
                                The EspressoChain Protocol records every single transaction, shipment, and cupping score on an immutable blockchain ledger. This ensures total origin integrity that cannot be altered, forged, or hidden.
                            </p>
                            <div class="space-y-12">
                                <div v-for="point in ledgerPoints" :key="point.title" class="flex gap-8">
                                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#e2e3df]">
                                        <span class="material-symbols-outlined text-2xl text-[#271310]">{{ point.icon }}</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-2 text-xl font-bold text-[#271310]">{{ point.title }}</h4>
                                        <p class="text-base font-light leading-relaxed text-[#504442]">{{ point.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#fdfbf7] py-24 md:py-40">
                <div class="container-lg">
                    <div class="mb-24 max-w-2xl">
                        <h2 class="mb-8 font-headline text-4xl font-bold leading-tight text-[#271310] md:text-5xl">Quality &amp; Grading Protocol</h2>
                        <p class="text-lg font-light leading-relaxed text-[#504442] md:text-xl">
                            We adhere to the highest industry standards. Every batch undergoes a rigorous evaluation by certified Q-Graders using the Specialty Coffee Association (SCA) cupping protocol.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                        <div v-for="card in gradingCards" :key="card.title" class="group rounded-[1.5rem] bg-[#f4f4f0] p-12 transition-colors hover:bg-[#eeeeea]">
                            <div class="mb-10 flex items-start justify-between">
                                <span class="material-symbols-outlined text-5xl text-[#271310] opacity-80 transition-opacity group-hover:opacity-100">{{ card.icon }}</span>
                                <span class="rounded-full bg-[#ece0dc] px-4 py-1.5 text-[10px] font-bold uppercase tracking-widest text-[#201a18]">{{ card.label }}</span>
                            </div>
                            <h3 class="mb-5 text-2xl font-bold text-[#271310]">{{ card.title }}</h3>
                            <p class="text-base font-light leading-relaxed text-[#504442]">{{ card.description }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#e8e8e4] py-24 md:py-40">
                <div class="container-lg">
                    <div class="grid grid-cols-1 items-stretch overflow-hidden rounded-[2.5rem] bg-[#271310] text-white lg:grid-cols-5">
                        <div class="relative min-h-[500px] lg:col-span-2">
                            <img
                                alt="Coffee farmer"
                                class="absolute inset-0 h-full w-full object-cover opacity-30 mix-blend-luminosity grayscale"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDCrMbzlxfkYkokX47BKW4h7sIFSaJ2fr084cw-5tM7YNnexKZiwBKbXDnHyc781AwOYSmo8UhZ98GPfxXd7PzMnFXgEfkyOil5Q9n6wTDLBYHQFIj4JpmCF10WM57j7CTzK22d53ZxRJM32rq8Rypnw9kWWfTb8rf0xLntx9hiYhp4aYXPqL9Dz3hAVTvV2Fa0gGBkfdlp_1_pwCm9UhKP7rG7QIaIkqDA0Rim70FcM2Z26k4jiDsi8uaCdGlI7p5h5bEpIC8-SfQ"
                            />
                            <div class="absolute inset-0 flex items-center justify-center p-8">
                                <div class="rounded-[2rem] border border-white/10 bg-white/5 p-12 text-center backdrop-blur-xl">
                                    <span class="mb-4 block text-6xl font-bold text-[#a3f69c]">+28%</span>
                                    <span class="text-[10px] font-bold uppercase tracking-[0.3em] opacity-80">Avg. Margin Increase</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col justify-center p-16 lg:col-span-3 lg:p-24">
                            <h2 class="mb-10 font-headline text-4xl font-bold leading-tight md:text-5xl">Ethical Sourcing Framework</h2>
                            <p class="mb-16 max-w-xl text-xl font-light leading-relaxed opacity-70">
                                Our Direct-to-Farmer pricing model removes predatory intermediaries. By utilizing EspressoChain, local cooperatives receive payments directly, ensuring they capture more of the retail value.
                            </p>
                            <div class="grid grid-cols-1 gap-12 sm:grid-cols-2">
                                <div v-for="pillar in sourcingPillars" :key="pillar.title">
                                    <h5 class="mb-6 text-[11px] font-bold uppercase tracking-[0.2em] text-[#a3f69c]">{{ pillar.title }}</h5>
                                    <p class="text-base font-light leading-relaxed opacity-60">{{ pillar.description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#fdfbf7] py-24 md:py-40">
                <div class="container-lg text-center">
                    <div class="mx-auto mb-24 max-w-2xl">
                        <h2 class="mb-8 font-headline text-4xl font-bold leading-tight text-[#271310] md:text-5xl">Traceability in Action</h2>
                        <p class="text-lg font-light text-[#504442] md:text-xl">A seamless journey from the mountain soil to the global export terminal.</p>
                    </div>

                    <div class="grid grid-cols-1 gap-12 sm:grid-cols-2 lg:grid-cols-4">
                        <div v-for="step in traceabilitySteps" :key="step.number" class="group flex flex-col items-center">
                            <div class="mb-10 flex h-16 w-16 items-center justify-center rounded-2xl bg-[#f4f4f0] text-xl font-bold text-[#271310] transition-all duration-500 group-hover:bg-[#271310] group-hover:text-white">
                                {{ step.number }}
                            </div>
                            <span class="material-symbols-outlined mb-8 text-5xl text-[#271310]/40 transition-colors duration-500 group-hover:text-[#271310]">{{ step.icon }}</span>
                            <h4 class="mb-4 text-xl font-bold text-[#271310]">{{ step.title }}</h4>
                            <p class="max-w-[200px] text-sm font-light leading-relaxed text-[#504442]">{{ step.description }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="governance" class="bg-[#f4f4f0] py-24 md:py-40">
                <div class="container-lg">
                    <div class="grid grid-cols-1 items-center gap-24 lg:grid-cols-2">
                        <div>
                            <h2 class="mb-10 font-headline text-4xl font-bold leading-tight text-[#271310] md:text-5xl">Global Compliance</h2>
                            <p class="mb-16 max-w-xl text-lg font-light leading-relaxed text-[#504442] md:text-xl">
                                EspressoChain is engineered to meet and exceed global regulatory requirements for commodity trading and environmental stewardship.
                            </p>
                            <div class="flex flex-wrap gap-5">
                                <div
                                    v-for="tag in complianceTags"
                                    :key="tag.label"
                                    class="group flex items-center gap-4 rounded-2xl bg-[#fdfbf7] px-7 py-4 transition-all duration-300 hover:bg-[#271310] hover:text-white"
                                >
                                    <span class="material-symbols-outlined text-[#271310] transition-colors group-hover:text-white">{{ tag.icon }}</span>
                                    <span class="text-[11px] font-bold uppercase tracking-[0.15em]">{{ tag.label }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="absolute inset-0 translate-x-6 translate-y-6 rounded-[2.5rem] bg-[#271310]/5"></div>
                            <div class="relative overflow-hidden rounded-[2.5rem]">
                                <img
                                    alt="Coffee beans"
                                    class="h-auto w-full scale-105 grayscale transition-all duration-1000 hover:scale-100 hover:grayscale-0"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDEGX5Wmhx-nO6Z27r2q8cXBZFyChzfMQlYWIyxxYkXykwtvetvX7QYQ9YcNYasV1zapEJ3jQa_xORTBGpHzHRwHhVcib755-t76JMOTUXIu1AZ9exMbovHyAJPU2nRCC069LdhWXkP3Omrl5FFTFczFaBmgJg5T0hqZOpK964o0iz-ifAsepwv9-jqg8GCMck6ozBG37S1CX760x3q-BQMUXM50DpP2zmj_jaSyFDu0CPe1ceaZyHmXk7D4UkvDQCObGV8sRSTJrE"
                                />
                            </div>
                        </div>
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

.container-lg {
    max-width: 1320px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 2rem;
    padding-right: 2rem;
}

.hero-gradient {
    background: #271310;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}

* {
    box-shadow: none !important;
}
</style>
