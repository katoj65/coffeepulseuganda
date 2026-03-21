<script setup>
import { computed, ref } from 'vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const props = defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
});

const page = usePage();
const mobileMenuOpen = ref(false);

const isAuthenticated = computed(() => Boolean(page.props.auth?.user));
const guestEntryRoute = computed(() => (props.canRegister ? 'register' : 'login'));

const navLinks = [
    { label: 'Marketplace', href: '#marketplace' },
    { label: 'Traceability', href: '#traceability' },
    { label: 'Logistics', href: '#logistics' },
    { label: 'Impact', href: '#impact' },
];

const heroMetrics = [
    { value: '6.2M', label: 'bags of annual export capacity' },
    { value: '94%', label: 'farmer value distribution tracked' },
    { value: '48h', label: 'average lot verification turnaround' },
];

const signalCards = [
    {
        title: 'Harvest Window',
        value: 'Live',
        detail: 'Dual-season sourcing from Mount Elgon, Rwenzori, and Lake Victoria belts.',
        icon: 'event_available',
    },
    {
        title: 'Trace Layer',
        value: 'On-chain',
        detail: 'Every lot linked to farm origin, processing data, and shipment events.',
        icon: 'encrypted',
    },
];

const tradeAdvantages = [
    {
        eyebrow: 'Visibility',
        title: 'See lots before the market moves',
        description: 'Monitor inventories, quality scores, and harvest timing before contracts become competitive.',
        icon: 'monitoring',
    },
    {
        eyebrow: 'Precision',
        title: 'Buy on cup profile, not guesswork',
        description: 'Compare varietal, altitude, process, moisture, and logistics readiness in one place.',
        icon: 'tune',
    },
    {
        eyebrow: 'Trust',
        title: 'Verify every step of the chain',
        description: 'Batch records, payout transparency, and shipping checkpoints stay visible from farm to port.',
        icon: 'verified',
    },
];

const regionalHighlights = [
    {
        icon: 'volcano',
        title: 'Volcanic highland terroir',
        description: "Uganda's elevation and mineral-rich soils drive floral aromatics, layered sweetness, and sturdy structure.",
    },
    {
        icon: 'public',
        title: 'Two harvest cycles each year',
        description: 'Equatorial growing zones reduce sourcing dead zones and keep availability steadier across the calendar.',
    },
    {
        icon: 'groups_3',
        title: '1.7M producer households',
        description: 'A deeply distributed smallholder network gives buyers range, resilience, and long-term partnership potential.',
    },
];

const qualityProfiles = [
    {
        name: 'Arabica',
        badge: 'Highland micro-lots',
        title: 'Structured sweetness with floral lift',
        regions: 'Mount Elgon, Rwenzori Mountains',
        altitude: '1,300 to 2,300m',
        process: 'Washed, honey, natural',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA56dDq0NCAuQrILGfOkNO3elQjey6k289V37PFspGfVjdMV_XY5Fk72hBb9kwAcc5Bq9Sb6T08Hv1v-h8RRU1vD4tGL2dgfUDPukgXiwzr8QBZkc0ksPC4wNc9FmgQD8ded1kD2F36IRmtUNv-_xZeMWJXOpqdIqnIqlyrIwXrcItCDRJzgQ5GIwePmgtogRENiezi10Mmi4PtJxuhpULKRXNuJNKQdqfOzcsjqo6TEKbcneI5uXDbh17I2hplp_mN6rPWQWoBPhQ',
        alt: 'Ugandan Arabica coffee cherries and beans',
        notes: ['Jasmine', 'Stone fruit', 'Brown sugar'],
    },
    {
        name: 'Robusta',
        badge: 'Native powerhouse',
        title: 'Deep body with bold cocoa energy',
        regions: 'Central Basin, Western Lowlands',
        altitude: '900 to 1,500m',
        process: 'Natural, sun-dried, screen 18+',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBC655FgLNC1Qo9KbsjljFL32jP9jDS_Rnn3AFs3rIlQX0GwAbhPuqYjriacFwEBc1xCFHMWBzvZe3fAPULN3n4uN0KkNoh_vsY6-kPw8Q2SQLTEYS1kEQtK8a-_nIp8L9HdynGm8Uw5S0BwkWq5OQ68ebnsxBj_etN4xaFindHNXp048WGTe1JuKIQrkH3MCBMv_QtEZwIHjsLCQLH7IGobkTyhTeZxXByfZDv-IxlmQ7CC2PhC-hQIHkqvz0AW40FmSiVGMlAq0k',
        alt: 'Ugandan Robusta coffee harvest',
        notes: ['Dark cacao', 'Toffee', 'Dense crema'],
    },
];

const traceabilitySteps = [
    {
        step: '01',
        title: 'Farm identity',
        description: 'Producer, co-op, GPS plot, and agronomy history are attached at source.',
        icon: 'pin_drop',
    },
    {
        step: '02',
        title: 'Harvest log',
        description: 'Cherry timing, moisture, density, and lot separation are recorded at collection.',
        icon: 'agriculture',
    },
    {
        step: '03',
        title: 'Processing proof',
        description: 'Milling, grading, cupping scores, and export prep become part of the immutable lot record.',
        icon: 'factory',
    },
    {
        step: '04',
        title: 'Freight visibility',
        description: 'Container events, seal references, and delivery milestones remain visible after contract execution.',
        icon: 'local_shipping',
    },
];

const logisticsCards = [
    {
        icon: 'hub',
        title: 'Export hub coverage',
        description: 'Coordinate from Kampala through regional collection centers with live contract visibility.',
    },
    {
        icon: 'shield_lock',
        title: 'Origin assurance',
        description: 'Signed origin records, team approvals, and shipment handoff logs stay linked to each lot.',
    },
    {
        icon: 'payments',
        title: 'Secure trade flow',
        description: 'Align payment releases with verified milestones instead of relying on email threads and PDFs.',
    },
    {
        icon: 'route',
        title: 'Shipment tracking',
        description: 'Follow production readiness, export prep, and downstream fulfillment from one operational view.',
    },
];

const impactFigures = [
    { value: '94%', label: 'producer value returned to origin communities' },
    { value: '450+', label: 'active co-operatives and collection partners' },
    { value: '12', label: 'major export touchpoints integrated into the flow' },
    { value: '24/7', label: 'lot visibility for international buying teams' },
];

const featuredLots = [
    {
        title: 'Mount Elgon High Peaks',
        badge: 'Honey process',
        volume: '12.5 Tons',
        harvest: 'August release',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBIkU25APwKtHRPH16ebxCtKBV00FUlXXopwK1QrDK3YTsqgfbpIvcqHeyATN-yp1_oDKYgd0RQtb6psW8w3Z3jD6Awv4uMRimif0YjuzNOqulXh3OofuKGMy3Qokdkg7XZ0VgCs8FrDJQ-ZoCuCS1kjsZ-svjk4DdqUyaVXtfktaC0voSwothnHGF73sUudPJj5Bu-saCv3YHAR7ClVC7PYc4yCL3Gs8jGnzVp5GuSLVtCFGpqrzHOfGxUQQUXS3qxAlClJNcpwOM',
        alt: 'Mount Elgon high altitude coffee lot',
        notes: ['Nectarine', 'Cane sugar', 'Silky finish'],
    },
    {
        title: 'Lake Victoria Reserve',
        badge: 'Screen 18 Robusta',
        volume: '45.0 Tons',
        harvest: 'Ready to contract',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDawoRPyhpWtIJI-WRZ0jMds2oFpLFKB1izAX0KvJC2uZ4K0QptLxoZxl7mMA8zOn7HRBZvOGquQslGPpMO57ku9I4jax2RephP1SxpJDja2-xgf_jZxtXDk5zdKU-i6-f2Q09tbdg1Hhc1euz1j3ec5HAxgh_tQIb4WrNhGTDA9_ABGItrKbBzrAU4hZblJRZL1Kje47rsjnQ-7UmsRuqT9PHrq4ykyh1_dQJnXdvNTCDtJpjmFGJkYJnr7t6SibVc9lxhCFSSnhU',
        alt: 'Lake Victoria reserve coffee lot',
        notes: ['Cocoa nib', 'Molasses', 'Dense body'],
    },
    {
        title: 'Mountains of the Moon',
        badge: 'Natural Arabica',
        volume: '5.8 Tons',
        harvest: 'Micro-lot release',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA56dDq0NCAuQrILGfOkNO3elQjey6k289V37PFspGfVjdMV_XY5Fk72hBb9kwAcc5Bq9Sb6T08Hv1v-h8RRU1vD4tGL2dgfUDPukgXiwzr8QBZkc0ksPC4wNc9FmgQD8ded1kD2F36IRmtUNv-_xZeMWJXOpqdIqnIqlyrIwXrcItCDRJzgQ5GIwePmgtogRENiezi10Mmi4PtJxuhpULKRXNuJNKQdqfOzcsjqo6TEKbcneI5uXDbh17I2hplp_mN6rPWQWoBPhQ',
        alt: 'Mountains of the Moon natural process lot',
        notes: ['Berry jam', 'Jasmine', 'Tea-like finish'],
    },
];

const inquiryFields = [
    { id: 'full-name', label: 'Full Name', placeholder: 'John Doe', type: 'text' },
    { id: 'company-name', label: 'Company Name', placeholder: 'Acme Roasters', type: 'text' },
    { id: 'email-address', label: 'Email Address', placeholder: 'greenbuyer@company.com', type: 'email' },
    { id: 'annual-volume', label: 'Annual Volume Need', placeholder: '20 tons+', type: 'text' },
];
</script>

<template>
    <Head title="Bean Origin">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&family=Manrope:wght@300;400;500;600;700;800&family=Noto+Serif:wght@400;600;700&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="landing-page bg-[#f7f3ea] text-[#201311]">
        <nav class="glass-nav fixed inset-x-0 top-0 z-[100] border-b border-[#2e1b16]/10 backdrop-blur-xl">
            <div class="mx-auto flex max-w-[1480px] items-center justify-between px-5 py-4 md:px-8 lg:px-12">
                <a href="#" class="flex items-center gap-3">
                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-[#201311] text-sm font-bold text-[#f7f3ea]">BO</span>
                    <div>
                        <p class="serif text-xl font-bold leading-none text-[#201311]">Bean Origin</p>
                        <p class="text-[10px] font-semibold uppercase tracking-[0.28em] text-[#201311]/45">Ugandan Coffee Trade</p>
                    </div>
                </a>

                <div class="hidden items-center gap-8 lg:flex">
                    <a
                        v-for="item in navLinks"
                        :key="item.label"
                        :href="item.href"
                        class="text-sm font-semibold tracking-wide text-[#201311]/65 transition-colors hover:text-[#201311]"
                    >
                        {{ item.label }}
                    </a>
                </div>

                <div class="hidden items-center gap-3 lg:flex">
                    <Link
                        v-if="isAuthenticated"
                        :href="route('dashboard')"
                        class="rounded-full border border-[#201311]/10 px-5 py-2.5 text-sm font-semibold text-[#201311] transition hover:bg-[#201311]/5"
                    >
                        Dashboard
                    </Link>

                    <Link
                        v-else-if="canLogin"
                        :href="route('login')"
                        class="rounded-full border border-[#201311]/10 px-5 py-2.5 text-sm font-semibold text-[#201311] transition hover:bg-[#201311]/5"
                    >
                        Log in
                    </Link>

                    <Link
                        v-if="isAuthenticated"
                        :href="route('dashboard')"
                        class="rounded-full bg-[#201311] px-6 py-2.5 text-sm font-bold text-[#f7f3ea] transition hover:bg-[#201311]/90"
                    >
                        Start Sourcing
                    </Link>

                    <Link
                        v-else-if="canLogin || canRegister"
                        :href="route(guestEntryRoute)"
                        class="rounded-full bg-[#201311] px-6 py-2.5 text-sm font-bold text-[#f7f3ea] transition hover:bg-[#201311]/90"
                    >
                        Start Sourcing
                    </Link>

                    <a
                        v-else
                        href="#inquiry"
                        class="rounded-full bg-[#201311] px-6 py-2.5 text-sm font-bold text-[#f7f3ea] transition hover:bg-[#201311]/90"
                    >
                        Start Sourcing
                    </a>
                </div>

                <button
                    type="button"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-[#201311]/10 text-[#201311] lg:hidden"
                    @click="mobileMenuOpen = !mobileMenuOpen"
                >
                    <span class="material-symbols-outlined">{{ mobileMenuOpen ? 'close' : 'menu' }}</span>
                </button>
            </div>

            <div
                v-if="mobileMenuOpen"
                class="border-t border-[#2e1b16]/10 bg-[#f7f3ea]/95 px-5 py-5 lg:hidden"
            >
                <div class="flex flex-col gap-4">
                    <a
                        v-for="item in navLinks"
                        :key="`${item.label}-mobile`"
                        :href="item.href"
                        class="text-sm font-semibold tracking-wide text-[#201311]/75"
                        @click="mobileMenuOpen = false"
                    >
                        {{ item.label }}
                    </a>

                    <Link
                        v-if="isAuthenticated"
                        :href="route('dashboard')"
                        class="inline-flex w-full items-center justify-center rounded-full border border-[#201311]/10 px-5 py-3 text-sm font-semibold text-[#201311]"
                        @click="mobileMenuOpen = false"
                    >
                        Dashboard
                    </Link>

                    <Link
                        v-else-if="canLogin || canRegister"
                        :href="route(isAuthenticated ? 'dashboard' : guestEntryRoute)"
                        class="inline-flex w-full items-center justify-center rounded-full bg-[#201311] px-5 py-3 text-sm font-bold text-[#f7f3ea]"
                        @click="mobileMenuOpen = false"
                    >
                        Start Sourcing
                    </Link>
                </div>
            </div>
        </nav>

        <section class="relative overflow-hidden px-5 pb-16 pt-28 md:px-8 md:pt-32 lg:px-12 lg:pb-20">
            <div class="hero-orb hero-orb-left"></div>
            <div class="hero-orb hero-orb-right"></div>
            <div class="grain-mask absolute inset-0 opacity-60"></div>

            <div class="relative mx-auto grid max-w-[1480px] gap-12 lg:grid-cols-[1.1fr_0.9fr] lg:items-center">
                <div class="max-w-3xl">
                    <div class="mb-6 inline-flex items-center gap-3 rounded-full border border-[#201311]/10 bg-white/70 px-4 py-2 backdrop-blur">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#7bcf80]"></span>
                        <span class="text-[11px] font-black uppercase tracking-[0.28em] text-[#201311]/70">Verified Ugandan Origin</span>
                    </div>

                    <h1 class="serif text-balance max-w-4xl text-5xl font-bold leading-[0.92] tracking-[-0.04em] text-[#201311] sm:text-6xl lg:text-[6.25rem]">
                        Premium Ugandan coffee, traded with
                        <span class="italic text-[#5c8f46]">clarity and control</span>
                    </h1>

                    <p class="mt-7 max-w-2xl text-lg leading-8 text-[#5b4b45] md:text-xl">
                        Bean Origin connects global buyers directly to Uganda's standout lots with live contract visibility, full traceability, and a sourcing story you can actually prove.
                    </p>

                    <div class="mt-10 flex flex-col gap-4 sm:flex-row">
                        <Link
                            v-if="isAuthenticated"
                            :href="route('dashboard')"
                            class="inline-flex items-center justify-center rounded-full bg-[#201311] px-9 py-4 text-base font-bold text-[#f7f3ea] transition hover:-translate-y-0.5 hover:bg-[#201311]/92"
                        >
                            Explore Live Lots
                        </Link>
                        <Link
                            v-else-if="canLogin || canRegister"
                            :href="route(guestEntryRoute)"
                            class="inline-flex items-center justify-center rounded-full bg-[#201311] px-9 py-4 text-base font-bold text-[#f7f3ea] transition hover:-translate-y-0.5 hover:bg-[#201311]/92"
                        >
                            Explore Live Lots
                        </Link>
                        <a
                            v-else
                            href="#marketplace"
                            class="inline-flex items-center justify-center rounded-full bg-[#201311] px-9 py-4 text-base font-bold text-[#f7f3ea] transition hover:-translate-y-0.5 hover:bg-[#201311]/92"
                        >
                            Explore Live Lots
                        </a>

                        <a
                            href="#inquiry"
                            class="inline-flex items-center justify-center rounded-full border border-[#201311]/15 bg-white/70 px-9 py-4 text-base font-bold text-[#201311] transition hover:-translate-y-0.5 hover:bg-white"
                        >
                            Request a Sourcing Call
                        </a>
                    </div>

                    <div class="mt-12 grid gap-4 sm:grid-cols-3">
                        <div
                            v-for="metric in heroMetrics"
                            :key="metric.label"
                            class="soft-panel rounded-[1.75rem] px-5 py-5"
                        >
                            <div class="text-3xl font-extrabold tracking-[-0.04em] text-[#201311]">{{ metric.value }}</div>
                            <div class="mt-2 text-sm leading-6 text-[#5b4b45]">{{ metric.label }}</div>
                        </div>
                    </div>
                </div>

                <div class="relative lg:pl-8">
                    <div class="hero-visual overflow-hidden rounded-[2rem] border border-white/40 bg-[#e9e0d2] p-3 shadow-[0_40px_90px_rgba(32,19,17,0.12)]">
                        <div class="relative overflow-hidden rounded-[1.5rem]">
                            <img
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_Fkj_AVCPHmKmSMc6FMbWh8xZipsrSIgEr5H6ZGwH82fIUosB8aPXHvUJ1J5mgddnO5C5Ko02SBtt2xCaEFH_PYheBEHAfhp0aXBysv2dmd5jbk6eV3nqpwpCSSAMkQfoZHvDolbs7nsplZpCU8EVv3RmBR7lOiOcJo00jCz8yTbnAx7YI4JZrjyprKHMiVOaLD79vB83R-Pp4MZu69R7uJyIoUD9RKWCqiQSH6GIR1zQS6KZBYq6WrE18Y_RQma0L7FbaC9JorI"
                                alt="Ugandan coffee highlands"
                                class="h-[520px] w-full object-cover object-center"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-[#201311]/45 via-transparent to-transparent"></div>

                            <div class="absolute bottom-5 left-5 right-5">
                                <div class="rounded-[1.5rem] border border-white/15 bg-[#201311]/72 p-5 backdrop-blur-xl">
                                    <div class="flex items-center justify-between gap-3">
                                        <div>
                                            <p class="text-[11px] font-black uppercase tracking-[0.28em] text-[#f7f3ea]/45">Origin Ledger</p>
                                            <h3 class="mt-2 text-2xl font-bold tracking-[-0.03em] text-[#f7f3ea]">Batch verification in one scan</h3>
                                        </div>
                                        <div class="hidden rounded-2xl bg-white p-2 sm:block">
                                            <img
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ1cw6GFzJWeZDC7rp5Q67bhIpexr_wROyzEW15dHnRs6mJmUJ2lwmbP9ssEzzGahhvIJHZLJV__T1GVxcivw3vikpsxGPUxzYAqQrCm3k6T1ZWQzuskbemjfpSoB6IBpiqjHaZz-WhaKTnHRPmjqC0HzYcFUO-BpSw20hBwoISebRPpsNv2Gpa7Cf5JSJnKA3w7gGWBH-IKcHgjH-u7ekWRGt1UZzYZZBgudgWt7Wi0g8tOGj86OYz1tMfhCvB7zNkmepwakp8s"
                                                alt="Traceability QR code"
                                                class="h-16 w-16"
                                            />
                                        </div>
                                    </div>
                                    <div class="mt-4 grid gap-3 text-sm text-[#f7f3ea]/70 sm:grid-cols-2">
                                        <div class="rounded-2xl border border-white/10 bg-white/5 p-3">
                                            <div class="text-[10px] font-black uppercase tracking-[0.2em] text-[#f7f3ea]/45">Status</div>
                                            <div class="mt-2 font-semibold text-[#87d881]">Verified Origin</div>
                                        </div>
                                        <div class="rounded-2xl border border-white/10 bg-white/5 p-3">
                                            <div class="text-[10px] font-black uppercase tracking-[0.2em] text-[#f7f3ea]/45">Payout Layer</div>
                                            <div class="mt-2 font-semibold text-[#87d881]">94% to producers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 grid gap-4 sm:grid-cols-2">
                        <div
                            v-for="card in signalCards"
                            :key="card.title"
                            class="soft-panel float-card rounded-[1.75rem] p-5"
                        >
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="text-[11px] font-black uppercase tracking-[0.22em] text-[#201311]/45">{{ card.title }}</p>
                                    <p class="mt-2 text-2xl font-bold tracking-[-0.03em] text-[#201311]">{{ card.value }}</p>
                                </div>
                                <span class="material-symbols-outlined rounded-full bg-[#201311]/6 p-2 text-[#201311]">{{ card.icon }}</span>
                            </div>
                            <p class="mt-3 text-sm leading-6 text-[#5b4b45]">{{ card.detail }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="px-5 pb-8 md:px-8 lg:px-12">
            <div class="mx-auto grid max-w-[1480px] gap-4 md:grid-cols-3">
                <div
                    v-for="item in tradeAdvantages"
                    :key="item.title"
                    class="soft-panel rounded-[1.8rem] p-7"
                >
                    <div class="flex items-center justify-between gap-4">
                        <span class="text-[11px] font-black uppercase tracking-[0.22em] text-[#5c8f46]">{{ item.eyebrow }}</span>
                        <span class="material-symbols-outlined text-[#201311]/45">{{ item.icon }}</span>
                    </div>
                    <h3 class="mt-4 text-2xl font-bold tracking-[-0.03em] text-[#201311]">{{ item.title }}</h3>
                    <p class="mt-3 text-sm leading-7 text-[#5b4b45]">{{ item.description }}</p>
                </div>
            </div>
        </section>

        <section class="px-5 py-24 md:px-8 lg:px-12">
            <div class="mx-auto grid max-w-[1480px] gap-14 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
                <div class="relative">
                    <div class="overflow-hidden rounded-[2rem] border border-[#201311]/10 bg-white p-4 shadow-[0_30px_80px_rgba(32,19,17,0.08)]">
                        <div class="relative overflow-hidden rounded-[1.5rem] bg-[#f2ece3] p-8">
                            <img
                                alt="Detailed map of Uganda coffee growing regions"
                                class="mx-auto w-full max-w-xl object-contain"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuD9VBp1lYAC_auhTL9zlojnra-vG7DvBjGBQIp-hWCmJWx_xueaP35XVeQSPuyJQMca0tb-_RgX9LSDzqg4ItEmOPE3Nu5tRVgVdDIrggrw81aSc1GBV8hMjMjehC2HXsFyrKbw_KGTvw0pzgqAns4ME23YMD5nb3fxW0wbdXoeaVV-KihCt5A_ONypD-jrk-_LEqnuDdNgrCk8CONR_xqv9-Xk3q8Oil4N07bukPGZk4wkrSOhj27YWkE0ajnq1xSomFZbtuvEOnw"
                            />

                            <div class="absolute left-6 top-6 rounded-2xl bg-[#201311] px-4 py-3 text-[#f7f3ea]">
                                <div class="text-[10px] font-black uppercase tracking-[0.24em] text-white/45">Production</div>
                                <div class="mt-2 text-2xl font-bold">6.2M Bags</div>
                            </div>

                            <div class="absolute bottom-6 right-6 rounded-2xl border border-[#201311]/10 bg-white/90 p-4 backdrop-blur">
                                <div class="text-[10px] font-black uppercase tracking-[0.24em] text-[#201311]/45">Region mix</div>
                                <div class="mt-3 space-y-2 text-sm font-semibold text-[#201311]">
                                    <div class="flex items-center gap-2">
                                        <span class="h-2.5 w-2.5 rounded-full bg-[#7bcf80]"></span>
                                        Robusta lowlands
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="h-2.5 w-2.5 rotate-45 bg-[#201311]/55"></span>
                                        Highland arabica
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="section-kicker">Regional Powerhouse</span>
                    <h2 class="serif mt-5 text-4xl font-bold leading-tight tracking-[-0.04em] text-[#201311] md:text-6xl">
                        The heart of East African coffee supply
                    </h2>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5b4b45]">
                        Uganda combines native Robusta strength with increasingly sophisticated Arabica programs, making it one of the most versatile sourcing origins on the continent.
                    </p>

                    <div class="mt-10 space-y-7">
                        <div
                            v-for="item in regionalHighlights"
                            :key="item.title"
                            class="flex gap-5 rounded-[1.6rem] border border-[#201311]/8 bg-white/65 p-5"
                        >
                            <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-[#201311] text-[#f7f3ea]">
                                <span class="material-symbols-outlined text-2xl">{{ item.icon }}</span>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold tracking-[-0.02em] text-[#201311]">{{ item.title }}</h3>
                                <p class="mt-2 text-sm leading-7 text-[#5b4b45]">{{ item.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="marketplace" class="bg-white px-5 py-24 md:px-8 lg:px-12">
            <div class="mx-auto max-w-[1480px]">
                <div class="mx-auto max-w-3xl text-center">
                    <span class="section-kicker justify-center">World-Class Varieties</span>
                    <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] text-[#201311] md:text-6xl">
                        A tighter cup profile, not a generic origin pitch
                    </h2>
                    <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-[#5b4b45]">
                        Each profile is merchandised around altitude, process, and buyer use case so roasters can move faster from shortlist to sample request.
                    </p>
                </div>

                <div class="mt-16 grid gap-8 lg:grid-cols-2">
                    <article
                        v-for="profile in qualityProfiles"
                        :key="profile.name"
                        class="overflow-hidden rounded-[2rem] border border-[#201311]/10 bg-[#f9f6f0]"
                    >
                        <div class="grid gap-0 md:grid-cols-[0.95fr_1.05fr]">
                            <div class="h-[320px] overflow-hidden md:h-full">
                                <img :src="profile.image" :alt="profile.alt" class="h-full w-full object-cover" />
                            </div>
                            <div class="p-8 md:p-10">
                                <div class="inline-flex rounded-full bg-[#5c8f46]/12 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-[#5c8f46]">
                                    {{ profile.badge }}
                                </div>
                                <h3 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] text-[#201311]">{{ profile.name }}</h3>
                                <p class="mt-3 text-lg leading-8 text-[#5b4b45]">{{ profile.title }}</p>

                                <div class="mt-8 grid gap-4 sm:grid-cols-3">
                                    <div class="rounded-2xl border border-[#201311]/8 bg-white/80 p-4">
                                        <div class="text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]/40">Regions</div>
                                        <div class="mt-2 text-sm font-semibold text-[#201311]">{{ profile.regions }}</div>
                                    </div>
                                    <div class="rounded-2xl border border-[#201311]/8 bg-white/80 p-4">
                                        <div class="text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]/40">Altitude</div>
                                        <div class="mt-2 text-sm font-semibold text-[#201311]">{{ profile.altitude }}</div>
                                    </div>
                                    <div class="rounded-2xl border border-[#201311]/8 bg-white/80 p-4">
                                        <div class="text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]/40">Process</div>
                                        <div class="mt-2 text-sm font-semibold text-[#201311]">{{ profile.process }}</div>
                                    </div>
                                </div>

                                <div class="mt-8">
                                    <div class="text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]/40">Cup notes</div>
                                    <div class="mt-3 flex flex-wrap gap-2">
                                        <span
                                            v-for="note in profile.notes"
                                            :key="note"
                                            class="rounded-full border border-[#201311]/8 bg-white/85 px-3 py-2 text-xs font-semibold text-[#201311]"
                                        >
                                            {{ note }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="traceability" class="px-5 py-24 md:px-8 lg:px-12">
            <div class="mx-auto grid max-w-[1480px] gap-10 lg:grid-cols-[0.9fr_1.1fr]">
                <div class="rounded-[2rem] bg-[#201311] p-8 text-[#f7f3ea] md:p-10">
                    <span class="section-kicker text-[#87d881] before:bg-[#87d881]">Traceability</span>
                    <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] md:text-5xl">A sourcing record your team can defend</h2>
                    <p class="mt-6 text-base leading-8 text-white/65">
                        Instead of scattered spreadsheets and post-hoc paperwork, every lot carries an auditable record from farm identity through export preparation.
                    </p>

                    <div class="ledger-panel mt-8 rounded-[1.7rem] p-5">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-[10px] font-black uppercase tracking-[0.25em] text-white/35">Origin Ledger</div>
                                <div class="mt-2 text-lg font-bold">Lot UG-RWZ-24-018</div>
                            </div>
                            <span class="rounded-full bg-[#87d881]/15 px-3 py-1 text-[10px] font-black uppercase tracking-[0.2em] text-[#87d881]">
                                Ready to verify
                            </span>
                        </div>

                        <div class="mt-5 space-y-3">
                            <div class="flex items-center justify-between rounded-2xl border border-white/8 bg-white/5 px-4 py-3 text-sm">
                                <span class="text-white/60">Farmer payout layer</span>
                                <span class="font-semibold text-[#87d881]">Distributed</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/8 bg-white/5 px-4 py-3 text-sm">
                                <span class="text-white/60">Moisture compliance</span>
                                <span class="font-semibold text-[#87d881]">11.2%</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl border border-white/8 bg-white/5 px-4 py-3 text-sm">
                                <span class="text-white/60">Shipment seal</span>
                                <span class="font-semibold text-[#87d881]">Locked</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4">
                    <article
                        v-for="item in traceabilitySteps"
                        :key="item.step"
                        class="soft-panel flex gap-5 rounded-[1.7rem] p-6"
                    >
                        <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-[#201311] text-[#f7f3ea]">
                            <span class="material-symbols-outlined text-2xl">{{ item.icon }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="text-[10px] font-black uppercase tracking-[0.25em] text-[#5c8f46]">{{ item.step }}</div>
                            <h3 class="mt-2 text-2xl font-bold tracking-[-0.03em] text-[#201311]">{{ item.title }}</h3>
                            <p class="mt-2 text-sm leading-7 text-[#5b4b45]">{{ item.description }}</p>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section id="logistics" class="overflow-hidden bg-[#201311] px-5 py-24 text-[#f7f3ea] md:px-8 lg:px-12">
            <div class="mx-auto max-w-[1480px]">
                <div class="max-w-3xl">
                    <span class="section-kicker text-[#87d881] before:bg-[#87d881]">Global Scale</span>
                    <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] md:text-6xl">Built for modern buying desks, not static brochures</h2>
                    <p class="mt-6 text-lg leading-8 text-white/55">
                        Logistics, quality control, and trade operations are surfaced in one language so sourcing, roasting, and finance teams can work off the same view.
                    </p>
                </div>

                <div class="mt-14 grid gap-px overflow-hidden rounded-[2rem] border border-white/10 bg-white/10 md:grid-cols-2 xl:grid-cols-4">
                    <div
                        v-for="item in logisticsCards"
                        :key="item.title"
                        class="bg-[#201311] p-8 transition-colors hover:bg-white/5"
                    >
                        <span class="material-symbols-outlined mb-8 text-4xl text-[#87d881]">{{ item.icon }}</span>
                        <h3 class="text-2xl font-bold tracking-[-0.03em]">{{ item.title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-white/55">{{ item.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="impact" class="bg-white px-5 py-24 md:px-8 lg:px-12">
            <div class="mx-auto grid max-w-[1480px] gap-12 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
                <div>
                    <span class="section-kicker">Our Commitment</span>
                    <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] text-[#201311] md:text-6xl">
                        Humanity behind every shipment
                    </h2>
                    <p class="mt-6 max-w-2xl text-lg leading-8 text-[#5b4b45]">
                        We designed the platform so transparency is not a marketing afterthought. It is the operating model, from producer payouts to export readiness.
                    </p>

                    <div class="mt-10 grid gap-4 sm:grid-cols-2">
                        <div
                            v-for="item in impactFigures"
                            :key="item.label"
                            class="rounded-[1.6rem] border border-[#201311]/8 bg-[#faf6ee] p-6"
                        >
                            <div class="text-4xl font-extrabold tracking-[-0.05em] text-[#201311]">{{ item.value }}</div>
                            <p class="mt-3 text-sm leading-7 text-[#5b4b45]">{{ item.label }}</p>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="overflow-hidden rounded-[2.2rem] border border-[#201311]/10 bg-[#ede4d7] p-3 shadow-[0_30px_80px_rgba(32,19,17,0.08)]">
                        <img
                            class="aspect-[4/3] w-full rounded-[1.7rem] object-cover"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDXvSttPduffZIREinpq-_orDOj8bpUOfVGxyUWCsA0DbWDyR2MhWJTneD1tv6c6xF9--uieNa29gdVXUmJrQ1MDLUrfeu_TOcnJUbPrzXgMb-bejXM99uXl5T4Bg01huLIp6byp2PpvNWUxlNcIgrHdUpFJWjXqdLQn7KMYnSq_D3rm5LTotxyaWZ4z8mwqLhcYN-BtXRVlQgDhaC9y2CfPfDQa88wRB2MoAkmVa36c1ZWrXaWgeo-pYhVf6MVfSKPUOjE3l2P8fU"
                            alt="Ugandan coffee farmer portrait"
                        />
                    </div>
                    <div class="absolute bottom-5 left-5 max-w-xs rounded-[1.5rem] border border-white/30 bg-white/82 p-5 backdrop-blur">
                        <div class="text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]/45">Impact Certified</div>
                        <p class="mt-3 text-sm leading-7 text-[#5b4b45]">
                            Community metrics, team governance, and farm-gate returns remain visible beyond the first sale.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#f7f3ea] px-5 py-24 md:px-8 lg:px-12">
            <div class="mx-auto max-w-[1480px]">
                <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                    <div>
                        <span class="section-kicker">Featured Lots</span>
                        <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] text-[#201311] md:text-5xl">A sharper shortlist for buyers</h2>
                    </div>
                    <a href="#inquiry" class="inline-flex items-center gap-2 text-sm font-bold text-[#201311]">
                        Talk to origin team
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </a>
                </div>

                <div class="mt-14 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                    <article
                        v-for="lot in featuredLots"
                        :key="lot.title"
                        class="overflow-hidden rounded-[2rem] border border-[#201311]/10 bg-white shadow-[0_18px_60px_rgba(32,19,17,0.05)]"
                    >
                        <div class="relative h-72 overflow-hidden">
                            <img :src="lot.image" :alt="lot.alt" class="h-full w-full object-cover transition duration-700 hover:scale-105" />
                            <div class="absolute inset-x-0 top-0 flex items-center justify-between p-5">
                                <span class="rounded-full bg-white/85 px-3 py-1 text-[10px] font-black uppercase tracking-[0.22em] text-[#201311]">
                                    {{ lot.badge }}
                                </span>
                                <span class="rounded-full bg-[#201311]/70 px-3 py-1 text-[10px] font-black uppercase tracking-[0.2em] text-[#f7f3ea]">
                                    {{ lot.harvest }}
                                </span>
                            </div>
                        </div>

                        <div class="p-7">
                            <div class="flex items-end justify-between gap-4">
                                <h3 class="serif text-3xl font-bold tracking-[-0.04em] text-[#201311]">{{ lot.title }}</h3>
                                <span class="text-sm font-bold text-[#5c8f46]">{{ lot.volume }}</span>
                            </div>

                            <div class="mt-5 flex flex-wrap gap-2">
                                <span
                                    v-for="note in lot.notes"
                                    :key="note"
                                    class="rounded-full border border-[#201311]/8 bg-[#faf6ee] px-3 py-2 text-xs font-semibold text-[#201311]"
                                >
                                    {{ note }}
                                </span>
                            </div>

                            <a
                                href="#inquiry"
                                class="mt-8 inline-flex items-center justify-center rounded-full bg-[#201311] px-5 py-3 text-sm font-bold text-[#f7f3ea] transition hover:bg-[#201311]/92"
                            >
                                Request sample
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden bg-[#201311] px-5 py-24 text-[#f7f3ea] md:px-8 lg:px-12">
            <div class="grain-mask absolute inset-0 opacity-35"></div>
            <div class="hero-orb cta-orb"></div>

            <div class="relative mx-auto grid max-w-[1480px] gap-10 lg:grid-cols-[0.84fr_1.16fr] lg:items-center">
                <div class="max-w-xl">
                    <span class="section-kicker text-[#87d881] before:bg-[#87d881]">Direct Sourcing Inquiry</span>
                    <h2 class="serif mt-5 text-4xl font-bold tracking-[-0.04em] md:text-6xl">
                        Tell us what you need and we will match the right origin program
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-white/60">
                        Whether you need a spot micro-lot, a season-long Robusta contract, or a traceable private-label program, the first conversation should be fast and specific.
                    </p>

                    <div class="mt-8 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-white/70">
                            <span class="material-symbols-outlined text-[#87d881]">check_circle</span>
                            Verified lot recommendations matched to your buying profile
                        </div>
                        <div class="flex items-center gap-3 text-sm text-white/70">
                            <span class="material-symbols-outlined text-[#87d881]">check_circle</span>
                            Export-readiness guidance before samples move
                        </div>
                        <div class="flex items-center gap-3 text-sm text-white/70">
                            <span class="material-symbols-outlined text-[#87d881]">check_circle</span>
                            A cleaner handoff between sourcing, logistics, and finance
                        </div>
                    </div>
                </div>

                <div id="inquiry" class="rounded-[2rem] border border-white/12 bg-white/8 p-6 backdrop-blur-xl md:p-8">
                    <form class="grid gap-5 md:grid-cols-2" @submit.prevent>
                        <div
                            v-for="field in inquiryFields"
                            :key="field.id"
                            class="space-y-2"
                        >
                            <label :for="field.id" class="text-[10px] font-black uppercase tracking-[0.22em] text-white/45">
                                {{ field.label }}
                            </label>
                            <input
                                :id="field.id"
                                :type="field.type"
                                :placeholder="field.placeholder"
                                class="w-full rounded-[1rem] border border-white/10 bg-white/6 px-5 py-4 text-sm text-[#f7f3ea] placeholder:text-white/30 focus:border-[#87d881]/70 focus:outline-none"
                            />
                        </div>

                        <div class="space-y-2">
                            <label for="coffee-interest" class="text-[10px] font-black uppercase tracking-[0.22em] text-white/45">
                                Coffee Interest
                            </label>
                            <select
                                id="coffee-interest"
                                class="w-full rounded-[1rem] border border-white/10 bg-white/6 px-5 py-4 text-sm text-[#f7f3ea] focus:border-[#87d881]/70 focus:outline-none"
                            >
                                <option value="" selected disabled>Choose a focus</option>
                                <option>Arabica micro-lots</option>
                                <option>Robusta contracts</option>
                                <option>Mixed sourcing program</option>
                            </select>
                        </div>

                        <div class="space-y-2">
                            <label for="target-market" class="text-[10px] font-black uppercase tracking-[0.22em] text-white/45">
                                Target Market
                            </label>
                            <input
                                id="target-market"
                                type="text"
                                placeholder="Specialty retail, espresso blend, private label"
                                class="w-full rounded-[1rem] border border-white/10 bg-white/6 px-5 py-4 text-sm text-[#f7f3ea] placeholder:text-white/30 focus:border-[#87d881]/70 focus:outline-none"
                            />
                        </div>

                        <div class="space-y-2 md:col-span-2">
                            <label for="project-brief" class="text-[10px] font-black uppercase tracking-[0.22em] text-white/45">
                                Project Brief
                            </label>
                            <textarea
                                id="project-brief"
                                rows="5"
                                placeholder="Share roast style, timing, volume expectations, target cup profile, or anything your sourcing team needs us to know."
                                class="w-full rounded-[1.2rem] border border-white/10 bg-white/6 px-5 py-4 text-sm text-[#f7f3ea] placeholder:text-white/30 focus:border-[#87d881]/70 focus:outline-none"
                            ></textarea>
                        </div>

                        <div class="md:col-span-2 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <p class="max-w-md text-sm leading-7 text-white/50">
                                This form is currently a landing page mock flow. The next step can be wiring it to a Laravel endpoint.
                            </p>
                            <button
                                type="submit"
                                class="inline-flex items-center justify-center rounded-full bg-[#87d881] px-8 py-4 text-sm font-black uppercase tracking-[0.16em] text-[#201311] transition hover:bg-[#87d881]/90"
                            >
                                Send inquiry
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</template>

<style scoped>
.landing-page {
    --cream: #f7f3ea;
    --ink: #201311;
    --moss: #5c8f46;
    --sage: #87d881;
    --muted: #5b4b45;
    font-family: 'Manrope', sans-serif;
    letter-spacing: -0.01em;
    -webkit-font-smoothing: antialiased;
}

.serif {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}

.glass-nav {
    background: rgba(247, 243, 234, 0.78);
}

.soft-panel {
    background:
        linear-gradient(180deg, rgba(255, 255, 255, 0.86), rgba(255, 255, 255, 0.68)),
        radial-gradient(circle at top left, rgba(135, 216, 129, 0.12), transparent 42%);
    border: 1px solid rgba(32, 19, 17, 0.08);
    box-shadow: 0 20px 60px rgba(32, 19, 17, 0.05);
}

.hero-visual {
    background:
        radial-gradient(circle at top left, rgba(135, 216, 129, 0.15), transparent 36%),
        linear-gradient(180deg, rgba(255, 255, 255, 0.82), rgba(255, 255, 255, 0.35));
}

.ledger-panel {
    background:
        linear-gradient(180deg, rgba(255, 255, 255, 0.06), rgba(255, 255, 255, 0.02)),
        radial-gradient(circle at top left, rgba(135, 216, 129, 0.12), transparent 34%);
    border: 1px solid rgba(255, 255, 255, 0.08);
}

.section-kicker {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.72rem;
    font-weight: 900;
    letter-spacing: 0.28em;
    text-transform: uppercase;
    color: var(--moss);
}

.section-kicker::before {
    content: '';
    width: 2.25rem;
    height: 1px;
    background: currentColor;
}

.hero-orb {
    position: absolute;
    border-radius: 9999px;
    filter: blur(80px);
    opacity: 0.7;
    pointer-events: none;
}

.hero-orb-left {
    left: -6rem;
    top: 5rem;
    height: 18rem;
    width: 18rem;
    background: rgba(135, 216, 129, 0.18);
}

.hero-orb-right {
    right: 4%;
    top: 8rem;
    height: 20rem;
    width: 20rem;
    background: rgba(92, 143, 70, 0.12);
}

.cta-orb {
    right: 6%;
    top: 18%;
    height: 16rem;
    width: 16rem;
    background: rgba(135, 216, 129, 0.16);
}

.grain-mask {
    background-image:
        linear-gradient(rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.03)),
        radial-gradient(circle at 20% 20%, rgba(32, 19, 17, 0.045) 0 1px, transparent 1px);
    background-size: auto, 24px 24px;
    pointer-events: none;
}

.text-balance {
    text-wrap: balance;
}

.float-card {
    animation: float-card 7s ease-in-out infinite;
}

.float-card:nth-child(2) {
    animation-delay: 0.8s;
}

@keyframes float-card {
    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-6px);
    }
}
</style>
