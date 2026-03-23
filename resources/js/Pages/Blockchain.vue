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

const trustPillars = [
    {
        icon: 'account_tree',
        title: 'Decentralization',
        description: 'No single authority controls the data. A distributed network of producers, traders, and roasters validates every transaction.',
    },
    {
        icon: 'lock',
        title: 'Immutability',
        description: 'Once recorded, data cannot be altered. The history of your coffee lot is permanent, providing an audit trail that lasts forever.',
    },
    {
        icon: 'visibility',
        title: 'Transparency',
        description: 'Real-time visibility into the supply chain. Track batches from farmgate to warehouse with granular on-chain data points.',
    },
];

const journeySteps = [
    {
        number: '1',
        filled: true,
        title: 'Farmgate Registration',
        description: 'Creation of unique Digital ID at source, capturing metadata.',
    },
    {
        number: '2',
        filled: false,
        title: 'Quality Verification',
        description: 'Certified SCA scores and profiles are signed and uploaded.',
    },
    {
        number: '3',
        filled: false,
        title: 'Batch Tokenization',
        description: 'Physical lots converted into tradeable digital tokens.',
    },
    {
        number: '4',
        filled: false,
        title: 'Smart Execution',
        description: 'Instant payments triggered upon logistics milestones.',
    },
    {
        number: '5',
        filled: false,
        title: 'Export Clearance',
        description: 'Final immutable verification for global buyer compliance.',
    },
];

const ecosystemBenefits = [
    {
        title: 'Farmer Fair Pricing',
        description: 'Smart contracts ensure farmers receive direct, immediate payment without the drag of intermediaries.',
    },
    {
        title: 'Buyer Confidence',
        description: 'Absolute certainty on origin, SCA score, and ethical standards through cryptographic proof.',
    },
    {
        title: 'Institutional Security',
        description: 'Enterprise-grade data security protecting trade secrets while sharing vital batch intelligence.',
    },
    {
        title: 'Radical Traceability',
        description: 'A consumer can scan a bag and see the exact farmer and cupping score on-chain.',
    },
];
</script>

<template>
    <Head title="Blockchain | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700;900&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-white font-body text-[#212529]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('home')" class="nav-link text-sm">Home</Link>
                <Link :href="route('about')" class="nav-link text-sm">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm">Contact</Link>
            </template>
            <template #actions>
                <template v-if="$page.props.auth.user">
                    <Link :href="route('dashboard')" class="btn-primary text-sm font-semibold uppercase tracking-wider">Secure Lot</Link>
                </template>
                <template v-else-if="canRegister">
                    <Link :href="route('register')" class="btn-primary text-sm font-semibold uppercase tracking-wider">Secure Lot</Link>
                </template>
                <template v-else-if="canLogin">
                    <Link :href="route('login')" class="btn-primary text-sm font-semibold uppercase tracking-wider">Secure Lot</Link>
                </template>
                <Link v-else :href="route('inventory.index')" class="btn-primary text-sm font-semibold uppercase tracking-wider">Secure Lot</Link>
            </template>
        </PublicHeader>

        <main>
            <section class="section-padding border-bottom-light bg-[#f8f9fa]">
                <div class="max-w-container mx-auto px-4 lg:px-6">
                    <div class="-mx-4 flex flex-wrap items-center">
                        <div class="mb-12 w-full px-4 lg:mb-0 lg:w-1/2">
                            <span class="mb-3 inline-block rounded bg-[#271310] px-3 py-1 text-[11px] font-bold uppercase tracking-widest text-white">The Blockchain Foundation</span>
                            <h1 class="mb-4 font-headline text-5xl font-bold leading-tight text-[#271310] lg:text-6xl">
                                The Immutable <br />Ledger of Origin
                            </h1>
                            <p class="mb-8 max-w-lg text-lg leading-relaxed text-[#6c757d]">
                                Ensuring every bean's journey is recorded, verifiable, and permanent. We bridge the gap between physical terroir and digital absolute trust.
                            </p>
                            <div class="flex flex-wrap gap-3">
                                <a href="#technology" class="btn-primary">Explore the Ledger</a>
                                <a href="#passport" class="btn-outline-primary">View Sample Passport</a>
                            </div>
                        </div>
                        <div class="w-full px-4 lg:w-1/2">
                            <div class="card border-0">
                                <img
                                    class="h-auto w-full object-cover"
                                    alt="Microscopic view of high quality green coffee beans"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwo5vw93xwsBAc2bFUITbs_5uIn9ArUg9TM40rRRNh1pt8f-fIOVbElrQTPnIC6s-zwAniMPzWDrNOqbiLLf5VscHNNP9IECj-I9GVwTbmGKj_upiC26kVTAaPef_yzdNqgwxgKZoJnqQCVCv_zB902ba-hqKk4DUowEyjigdQUi5TNvnezB2k1N9v8BGhXR_w051U7xf7q4Fxn5na3OOZqB4xhPw9lE6w3VzWapx5NH4xZFBngbAeVviCvnEy4eUZbpKs2yxhk0Q"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="technology" class="section-padding bg-white">
                <div class="max-w-container mx-auto px-4 lg:px-6">
                    <div class="mb-16">
                        <h2 class="mb-3 font-headline text-4xl font-bold text-[#271310]">The Technology of Trust</h2>
                        <div class="h-1 w-20 bg-[#271310]"></div>
                    </div>
                    <div class="-mx-4 flex flex-wrap">
                        <div v-for="pillar in trustPillars" :key="pillar.title" class="mb-8 w-full px-4 md:mb-0 md:w-1/3">
                            <div class="p-4">
                                <span class="material-symbols-outlined mb-4 text-4xl text-[#271310]">{{ pillar.icon }}</span>
                                <h3 class="mb-3 font-headline text-2xl font-bold text-[#271310]">{{ pillar.title }}</h3>
                                <p class="text-[#6c757d]">{{ pillar.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-padding border-y border-[#dee2e6] bg-[#f8f9fa]">
                <div class="max-w-container mx-auto px-4 lg:px-6">
                    <div class="mb-16 text-center">
                        <h2 class="mb-3 font-headline text-4xl font-bold text-[#271310]">Our 5-Step Digital Journey</h2>
                        <p class="text-[#6c757d]">The lifecycle of a coffee batch, transformed into a permanent digital asset.</p>
                    </div>
                    <div class="-mx-4 flex flex-wrap">
                        <div v-for="(step, index) in journeySteps" :key="step.number" class="mb-8 w-full px-4 lg:mb-0 lg:w-1/5">
                            <div class="mb-4 flex items-center">
                                <div
                                    :class="step.filled ? 'bg-[#271310] text-white border-[#271310]' : 'border-[#271310] text-[#271310]'"
                                    class="flex h-10 w-10 items-center justify-center rounded-full border text-sm font-bold"
                                >
                                    {{ step.number }}
                                </div>
                                <div v-if="index < journeySteps.length - 1" class="ml-3 hidden h-px flex-grow bg-[#dee2e6] lg:block"></div>
                            </div>
                            <h5 class="mb-2 font-bold text-[#271310]">{{ step.title }}</h5>
                            <p class="text-sm text-[#6c757d]">{{ step.description }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="passport" class="section-padding bg-white">
                <div class="max-w-container mx-auto px-4 lg:px-6">
                    <div class="-mx-4 flex flex-wrap items-center">
                        <div class="mb-12 w-full px-4 lg:mb-0 lg:w-6/12">
                            <div class="card relative border border-[#dee2e6] p-8 shadow-none">
                                <div class="mb-10 flex items-start justify-between">
                                    <div>
                                        <h4 class="font-headline text-2xl font-bold text-[#271310]">Batch Token #BE-8821</h4>
                                        <p class="text-[10px] font-bold uppercase tracking-widest text-[#6c757d]">Official Digital Coffee Deed</p>
                                    </div>
                                    <span class="material-symbols-outlined text-4xl text-[#56a554]">verified</span>
                                </div>

                                <div class="mb-10 grid grid-cols-2 gap-x-12 gap-y-8">
                                    <div>
                                        <label class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-[#6c757d]">Origin</label>
                                        <p class="border-b border-[#f8f9fa] pb-1 font-bold text-[#271310]">Sidamo, Ethiopia</p>
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-[#6c757d]">SCA Score</label>
                                        <p class="border-b border-[#f8f9fa] pb-1 font-bold text-[#271310]">88.5 Points</p>
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-[#6c757d]">Moisture</label>
                                        <p class="border-b border-[#f8f9fa] pb-1 font-bold text-[#271310]">11.2%</p>
                                    </div>
                                    <div>
                                        <label class="mb-1 block text-[10px] font-bold uppercase tracking-wider text-[#6c757d]">Batch Weight</label>
                                        <p class="border-b border-[#f8f9fa] pb-1 font-bold text-[#271310]">450 KG</p>
                                    </div>
                                </div>

                                <div class="border-t border-[#f8f9fa] pt-6">
                                    <label class="mb-4 block text-[10px] font-bold uppercase tracking-wider text-[#6c757d]">Ownership Timeline</label>
                                    <div class="space-y-3">
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="font-semibold">Karsa Washing Station</span>
                                            <span class="text-xs italic text-[#6c757d]">May 2024</span>
                                        </div>
                                        <div class="flex items-center justify-between text-sm">
                                            <span class="font-semibold">Bean Origin Export Hub</span>
                                            <span class="text-xs font-bold text-[#198754]">In Transit</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-10 flex items-center justify-between border-t border-dashed border-[#dee2e6] pt-6">
                                    <div class="flex items-center gap-2">
                                        <span class="material-symbols-outlined text-[#6c757d]">qr_code_2</span>
                                        <span class="font-mono text-[9px] text-[#6c757d]">0x82f9...a1e9</span>
                                    </div>
                                    <span class="border border-[#dee2e6] bg-[#f8f9fa] px-2 py-1 text-[9px] font-bold uppercase tracking-widest">Verified On-Chain</span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full px-4 lg:ml-auto lg:w-5/12">
                            <h2 class="mb-6 font-headline text-4xl font-bold text-[#271310]">
                                Coffee as a <br />Digital Asset
                            </h2>
                            <p class="mb-8 text-lg leading-relaxed text-[#6c757d]">
                                We don't just trade bags; we trade verified data. Each coffee lot is assigned a Digital Deed that carries its entire genetic and logistical profile. This ensures that what you buy is exactly what arrives.
                            </p>
                            <ul class="space-y-4">
                                <li class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-[#198754]">check_circle</span>
                                    <span class="font-semibold text-[#271310]">Proof of Ownership</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-[#198754]">check_circle</span>
                                    <span class="font-semibold text-[#271310]">Instant Quality Verification</span>
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-[#198754]">check_circle</span>
                                    <span class="font-semibold text-[#271310]">Seamless Digital Liquidity</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-padding bg-[#f8f9fa]">
                <div class="max-w-container mx-auto px-4 lg:px-6">
                    <div class="mb-16 text-center">
                        <h2 class="mb-3 font-headline text-4xl font-bold text-[#271310]">Empowering the Ecosystem</h2>
                        <p class="mx-auto max-w-xl text-[#6c757d]">Why we chose a blockchain-first approach for modern global coffee trade.</p>
                    </div>
                    <div class="-mx-2 flex flex-wrap">
                        <div v-for="benefit in ecosystemBenefits" :key="benefit.title" class="mb-4 w-full px-2 md:w-1/2 lg:w-1/4">
                            <div class="card h-full border-0 p-6 shadow-sm">
                                <h4 class="mb-3 text-xl font-bold text-[#271310]">{{ benefit.title }}</h4>
                                <p class="text-sm leading-relaxed text-[#6c757d]">{{ benefit.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-padding bg-[#271310] text-center text-white">
                <div class="max-w-container mx-auto px-4">
                    <h2 class="mb-6 font-headline text-4xl font-bold lg:text-5xl">Source with Total Confidence</h2>
                    <p class="mx-auto mb-10 max-w-2xl text-lg opacity-75">
                        Join the future of transparent, efficient, and ethical coffee trading with the world's first immutable coffee ledger.
                    </p>
                    <Link :href="route('inventory.index')" class="inline-block rounded bg-white px-10 py-4 text-sm font-bold uppercase tracking-widest text-[#271310] transition-transform hover:scale-105">
                        Explore the Marketplace
                    </Link>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>

<style scoped>
body,
.font-body {
    font-family: 'Manrope', sans-serif;
}

h1,
h2,
h3,
h4,
h5,
.font-headline {
    font-family: 'Noto Serif', serif;
}

.btn-primary {
    background-color: #271310;
    color: #fff;
    border: 1px solid #271310;
    padding: 0.5rem 1.5rem;
    border-radius: 0.375rem;
    transition: all 0.2s;
}

.btn-primary:hover {
    background-color: #3e2723;
    border-color: #3e2723;
}

.btn-outline-primary {
    color: #271310;
    border: 1px solid #271310;
    padding: 0.5rem 1.5rem;
    border-radius: 0.375rem;
    transition: all 0.2s;
}

.btn-outline-primary:hover {
    background-color: #271310;
    color: #fff;
}

.nav-link {
    color: rgba(33, 37, 41, 0.7);
    font-weight: 500;
    transition: color 0.15s;
}

.nav-link:hover {
    color: #271310;
}

.card {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    background: #fff;
    overflow: hidden;
}

.section-padding {
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.border-bottom-light {
    border-bottom: 1px solid #dee2e6;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
