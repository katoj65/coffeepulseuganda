<script setup>
import { computed } from 'vue';
import { ElNotification } from 'element-plus';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PublicHeader from '../Components/PublicHeader.vue';
import arabicaImage from '../../images/coffee1.jpg';
import communityImage from '../../images/community.jpg';
import featuredLotOne from '../../images/image1.jpg';
import featuredLotThree from '../../images/image3.jpg';
import featuredLotFour from '../../images/image4.jpg';
import robustaImage from '../../images/coffee2.jpg';
import headerLogo from '../../images/logo.png';
import regionalMap from '../../images/map.png';
import PublicFooter from '@/Components/PublicFooter.vue';

const props = defineProps({
    canLogin: {
        type: Boolean,
        default: false,
    },
    canRegister: {
        type: Boolean,
        default: false,
    },
    featuredLots: {
        type: Array,
        default: () => [],
    },
});

const fallbackFeaturedLots = [
    {
        id: 'fallback-1',
        title: 'Mt. Elgon High Peaks',
        description: 'Highland Arabica, honey processed with distinct notes of wild honey and white nectarine.',
        amount: '12.5 Metric Tons',
        image: featuredLotOne,
    },
    {
        id: 'fallback-2',
        title: 'Lake Victoria Reserve',
        description: 'Fine Robusta, Screen 18. Massive syrupy body with a heavy dark cocoa and walnut finish.',
        amount: '45.0 Metric Tons',
        image: featuredLotThree,
    },
    {
        id: 'fallback-3',
        title: 'Mountains of the Moon',
        description: 'Wild natural process Arabica. Notes of explosive forest berries and jasmine tea.',
        amount: '5.8 Metric Tons',
        image: featuredLotFour,
    },
];

const displayedFeaturedLots = computed(() => (
    props.featuredLots.length
        ? props.featuredLots.map((lot, index) => ({
            ...lot,
            image: lot.image || fallbackFeaturedLots[index % fallbackFeaturedLots.length].image,
        }))
        : fallbackFeaturedLots
));

const inquiryForm = useForm({
    names: '',
    company: '',
    email: '',
    phone: '',
    description: '',
});

const submitInquiry = () => {
    inquiryForm.post(route('inquiries.store'), {
        preserveScroll: true,
        onSuccess: () => {
            ElNotification({
                title: 'Inquiry sent',
                message: 'Your inquiry has been sent successfully. We will get back to you soon.',
                type: 'success',
                position: 'top-right',
            });

            inquiryForm.reset('names', 'company', 'email', 'phone', 'description');
        },
    });
};
</script>

<template>
    <Head title="Bean Origin | Premium Ugandan Coffee Trade">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="landing-page bg-cream text-espresso selection:bg-sage/20">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <Link :href="route('marketplace')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <section class="relative flex min-h-[70vh] items-center overflow-hidden bg-cream pb-20 pt-24">
            <div class="absolute inset-0 z-0">
                <img
                    alt="Ugandan Highlands"
                    class="h-full w-full object-cover opacity-20 mix-blend-multiply"
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_Fkj_AVCPHmKmSMc6FMbWh8xZipsrSIgEr5H6ZGwH82fIUosB8aPXHvUJ1J5mgddnO5C5Ko02SBtt2xCaEFH_PYheBEHAfhp0aXBysv2dmd5jbk6eV3nqpwpCSSAMkQfoZHvDolbs7nsplZpCU8EVv3RmBR7lOiOcJo00jCz8yTbnAx7YI4JZrjyprKHMiVOaLD79vB83R-Pp4MZu69R7uJyIoUD9RKWCqiQSH6GIR1zQS6KZBYq6WrE18Y_RQma0L7FbaC9JorI"
                />
                <div class="absolute inset-0 bg-gradient-to-r from-cream via-cream/80 to-transparent"></div>
            </div>

            <div class="container relative z-10 mx-auto px-6 md:px-12">
                <div class="max-w-4xl">
                    <div class="mb-8 inline-flex items-center gap-2 rounded-sm border border-sage/20 bg-sage/10 px-4 py-2">
                        <span class="h-2.5 w-2.5 rounded-full bg-sage"></span>
                        <span class="text-xs font-black uppercase tracking-[0.2em] text-espresso/70">Verified Ugandan Origin</span>
                    </div>

                    <h1 class="serif text-balance mb-8 text-4xl font-medium leading-[1.08] tracking-tight text-espresso md:text-6xl lg:text-7xl" id="heading">
                        From Farm to Cup, <br />
                        <span class="text-sage">Transparently.</span>
                    </h1>

                    <p class="mb-10 max-w-2xl text-base font-light leading-relaxed text-on-surface-variant md:text-lg">
                        The premier digital gateway to Uganda's finest coffee. Direct trade, blockchain-verified, and ethically sourced for global roasters.
                    </p>

                    <div class="flex flex-wrap gap-5">
                        <template v-if="$page.props.auth.user">
                            <Link
                                :href="route('dashboard')"
                                class="rounded-sm border border-espresso bg-espresso px-10 py-4 text-base font-bold text-cream transition-all duration-300 hover:bg-transparent hover:text-espresso"
                            >
                                Buy Coffee
                            </Link>
                        </template>
                        <template v-else-if="canRegister">
                            <Link
                                :href="route('register')"
                                class="rounded-sm border border-espresso bg-espresso px-10 py-4 text-base font-bold text-cream transition-all duration-300 hover:bg-transparent hover:text-espresso"
                            >
                                Buy Coffee
                            </Link>
                        </template>
                        <template v-else-if="canLogin">
                            <Link
                                :href="route('login')"
                                class="rounded-sm border border-espresso bg-espresso px-10 py-4 text-base font-bold text-cream transition-all duration-300 hover:bg-transparent hover:text-espresso"
                            >
                                Buy Coffee
                            </Link>
                        </template>
                        <a
                            v-else
                            href="#inquiry"
                            class="rounded-sm border border-espresso bg-espresso px-10 py-4 text-base font-bold text-cream transition-all duration-300 hover:bg-transparent hover:text-espresso"
                        >
                            Buy Coffee
                        </a>

                        <Link
                            :href="route('origins')"
                            class="rounded-sm border border-espresso bg-transparent px-10 py-4 text-base font-bold text-espresso transition-all duration-300 hover:bg-espresso hover:text-cream"
                        >
                            Explore Origins
                        </Link>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-12 right-12 hidden xl:block">
                <div class="max-w-sm rounded-sm border border-espresso/5 bg-white p-8">
                    <div class="mb-4 flex items-center gap-4">
                        <span class="material-symbols-outlined text-4xl text-sage">qr_code_scanner</span>
                        <span class="text-xs font-black uppercase tracking-widest text-espresso">Batch Verification</span>
                    </div>
                    <p class="text-[15px] leading-relaxed text-on-surface-variant">
                        Scan any sack to view full harvest data, farmer demographics, and real-time shipping logs.
                    </p>
                </div>
            </div>
        </section>

        <section id="global-scale" class="border-espresso/10 bg-white py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="mb-16 max-w-3xl">
                    <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Infrastructure</span>
                    <h2 class="serif text-5xl font-bold leading-tight text-espresso md:text-6xl">Global Scale. Digital precision for modern roasters.</h2>
                </div>

                <div class="grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
                    <div class="space-y-6">
                        <div class="flex h-14 w-14 items-center justify-center bg-surface-container-low border border-espresso/5">
                            <span class="material-symbols-outlined text-3xl text-espresso">hub</span>
                        </div>
                        <h4 class="serif text-2xl font-bold">Export Visibility</h4>
                        <p class="text-base leading-relaxed text-on-surface-variant">
                            Making it easier for international buyers to discover, evaluate, and source directly from origin</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex h-14 w-14 items-center justify-center bg-surface-container-low border border-espresso/5">
                            <span class="material-symbols-outlined text-3xl text-espresso">verified_user</span>
                        </div>
                        <h4 class="serif text-2xl font-bold">Origin Assurance</h4>
                        <p class="text-base leading-relaxed text-on-surface-variant">Every transaction is digitally signed for tamper-proof tracking and source integrity.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex h-14 w-14 items-center justify-center bg-surface-container-low border border-espresso/5">
                            <span class="material-symbols-outlined text-3xl text-espresso">currency_exchange</span>
                        </div>
                        <h4 class="serif text-2xl font-bold">Secure Trade</h4>
                        <p class="text-base leading-relaxed text-on-surface-variant">From farmer to export, each coffee batch is documented and traceable, reducing risks such as fraud, misrepresentation, or quality uncertainty.</p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex h-14 w-14 items-center justify-center bg-surface-container-low border border-espresso/5">
                            <span class="material-symbols-outlined text-3xl text-espresso">local_shipping</span>
                        </div>
                        <h4 class="serif text-2xl font-bold">Real-time Logistics</h4>
                        <p class="text-base leading-relaxed text-on-surface-variant">Track shipments from the mill to your warehouse with precision telemetry.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="regional-powerhouse" class="bg-cream py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="grid grid-cols-1 items-center gap-20 lg:grid-cols-12">
                    <div class="lg:col-span-6">
                        <div class="relative rounded-sm bg-white p-6 shadow-[0_18px_40px_-24px_rgba(62,39,35,0.28)] md:p-8">
                            <img :src="regionalMap" alt="Map of Uganda coffee-growing regions" class="mx-auto h-auto w-full max-w-none scale-[1.08]" />
                            <div class="absolute left-12 top-12 rounded-sm bg-espresso px-6 py-4 text-cream shadow-[0_16px_30px_-22px_rgba(62,39,35,0.6)]">
                                <span class="mb-1 block text-xs font-black uppercase tracking-tighter text-white/50">Annual Export</span>
                                <span class="text-3xl font-bold">6.2M Bags</span>
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-6 lg:pl-12">
                        <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Regional Powerhouse</span>
                        <h2 class="serif mb-10 text-5xl font-bold leading-tight text-espresso md:text-6xl">The Heart of African Coffee</h2>

                        <div class="space-y-10">
                            <div class="flex gap-8">
                                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-sm bg-espresso text-cream">
                                    <span class="material-symbols-outlined text-3xl">volcano</span>
                                </div>
                                <div>
                                    <h4 class="mb-3 text-2xl font-bold text-espresso">Rich Volcanic Terroir</h4>
                                    <p class="text-lg leading-relaxed text-on-surface-variant">Uganda's unique altitude and nutrient-dense soil produce beans with unmatched complexity.</p>
                                </div>
                            </div>

                            <div class="flex gap-8">
                                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-sm bg-espresso text-cream">
                                    <span class="material-symbols-outlined text-3xl">public</span>
                                </div>
                                <div>
                                    <h4 class="mb-3 text-2xl font-bold text-espresso">Dual Season Harvest</h4>
                                    <p class="text-lg leading-relaxed text-on-surface-variant">Located on the equator, Uganda benefits from two annual harvest cycles, ensuring consistent supply.</p>
                                </div>
                            </div>

                            <div class="flex gap-8">
                                <div class="flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-sm bg-espresso text-cream">
                                    <span class="material-symbols-outlined text-3xl">groups_3</span>
                                </div>
                                <div>
                                    <h4 class="mb-3 text-2xl font-bold text-espresso">1.7M Smallholders</h4>
                                    <p class="text-lg leading-relaxed text-on-surface-variant">Coffee is the lifeblood of Uganda, managed by dedicated families committed to excellence.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="marketplace" class="border-espresso/10 bg-white py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="mx-auto mb-20 max-w-2xl text-center">
                    <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Varietal Excellence</span>
                    <h2 class="serif mb-6 text-5xl font-bold text-espresso md:text-6xl">Exceptional Quality</h2>
                    <p class="text-xl text-on-surface-variant">Defined by altitude and meticulously graded to meet international specialty standards.</p>
                </div>

                <div class="overflow-hidden rounded-sm border border-espresso/5">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="flex flex-col border-b border-espresso/10 md:border-b-0 md:border-r lg:flex-row">
                            <div class="h-80 lg:h-auto lg:w-1/2">
                                <img
                                    alt="Ugandan Arabica"
                                    class="h-full w-full object-cover"
                                    :src="arabicaImage"
                                />
                            </div>
                            <div class="flex flex-col justify-center bg-white p-12 lg:w-1/2 lg:p-14">
                                <span class="mb-4 text-xs font-black uppercase tracking-widest text-sage">Highland Specialty</span>
                                <h3 class="serif mb-8 text-4xl font-bold text-espresso">Arabica</h3>
                                <div class="space-y-5">
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">location_on</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">Mt. Elgon, Rwenzori</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">landscape</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">1,300 - 2,300m</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">palette</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">Fruity &amp; Floral</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col lg:flex-row">
                            <div class="order-1 h-80 lg:order-2 lg:h-auto lg:w-1/2">
                                <img
                                    alt="Ugandan Robusta"
                                    class="h-full w-full object-cover"
                                    :src="robustaImage"
                                />
                            </div>
                            <div class="order-2 flex flex-col justify-center bg-surface-container-low/40 p-12 lg:order-1 lg:w-1/2 lg:p-14">
                                <span class="mb-4 text-xs font-black uppercase tracking-widest text-espresso/50">Native Powerhouse</span>
                                <h3 class="serif mb-8 text-4xl font-bold text-espresso">Robusta</h3>
                                <div class="space-y-5">
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">location_on</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">Central Basin</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">landscape</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">900 - 1,500m</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="material-symbols-outlined text-2xl text-espresso/40">bolt</span>
                                        <span class="text-[13px] font-bold uppercase tracking-wider text-espresso">Bold &amp; Chocolatey</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="traceability" class="overflow-hidden bg-cream py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="mx-auto mb-20 max-w-3xl text-center">
                    <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Immutable Trust</span>
                    <h2 class="serif mb-8 text-5xl font-bold text-espresso md:text-6xl">Full Traceability</h2>
                    <p class="text-xl text-on-surface-variant">Real-time blockchain verification at every stage of the journey.</p>
                </div>

                <div class="relative mb-24">
                    <div class="absolute left-0 top-1/2 hidden h-px w-full -translate-y-1/2 bg-espresso/10 lg:block"></div>

                    <div class="relative z-10 grid grid-cols-1 gap-12 md:grid-cols-2 lg:grid-cols-4">
                        <div class="flex flex-col items-center bg-cream px-4 text-center">
                            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full border border-espresso/5 bg-white transition-all hover:border-sage">
                                <span class="material-symbols-outlined text-3xl text-sage">agriculture</span>
                            </div>
                            <span class="mb-2 text-[11px] font-black uppercase tracking-widest text-espresso/40">01. Farming</span>
                            <h4 class="serif mb-3 text-2xl font-bold">GPS Tagged</h4>
                            <p class="text-[15px] leading-relaxed text-on-surface-variant">Individual farm mapping for 100% origin verification.</p>
                        </div>

                        <div class="flex flex-col items-center bg-cream px-4 text-center">
                            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full border border-espresso/5 bg-white">
                                <span class="material-symbols-outlined text-3xl text-sage">precision_manufacturing</span>
                            </div>
                            <span class="mb-2 text-[11px] font-black uppercase tracking-widest text-espresso/40">02. Harvesting</span>
                            <h4 class="serif mb-3 text-2xl font-bold">Digital Entry</h4>
                            <p class="text-[15px] leading-relaxed text-on-surface-variant">Live batch weight logging at collection gates.</p>
                        </div>

                        <div class="flex flex-col items-center bg-cream px-4 text-center">
                            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full border border-espresso/5 bg-white">
                                <span class="material-symbols-outlined text-3xl text-sage">lab_research</span>
                            </div>
                            <span class="mb-2 text-[11px] font-black uppercase tracking-widest text-espresso/40">03. Processing</span>
                            <h4 class="serif mb-3 text-2xl font-bold">Quality Audit</h4>
                            <p class="text-[15px] leading-relaxed text-on-surface-variant">Q-Graded cupping scores secured via smart contracts.</p>
                        </div>

                        <div class="flex flex-col items-center bg-cream px-4 text-center">
                            <div class="mb-6 flex h-20 w-20 items-center justify-center rounded-full border border-espresso bg-espresso">
                                <span class="material-symbols-outlined text-3xl text-sage">rocket_launch</span>
                            </div>
                            <span class="mb-2 text-[11px] font-black uppercase tracking-widest text-espresso/40">04. Export</span>
                            <h4 class="serif mb-3 text-2xl font-bold">Global Delivery</h4>
                            <p class="text-[15px] leading-relaxed text-on-surface-variant">Final seal verification and shipping telemetry.</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-sm border-espresso/10 bg-white p-10 md:p-16">
                    <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                        <div>
                            <div class="mb-6 inline-flex items-center gap-2 border border-sage/20 bg-sage/10 px-4 py-1.5 text-[11px] font-black uppercase tracking-widest text-sage">
                                <span class="material-symbols-outlined text-sm">verified</span>
                                Blockchain Secured
                            </div>
                            <h3 class="serif mb-8 text-5xl font-bold leading-tight text-espresso">Scan. Verify. Trust.</h3>
                            <p class="mb-10 text-xl leading-relaxed text-on-surface-variant">
                                "Our decentralized ledger ensures that smallholders receive fair compensation while global roasters get guaranteed quality without intermediaries."
                            </p>
                        </div>

                        <div class="flex justify-center lg:justify-end">
                            <div class="relative w-full max-w-sm overflow-hidden rounded-sm border border-white/5 bg-espresso p-10 text-cream">
                                <div class="absolute -right-8 -top-8 h-32 w-32 rounded-full bg-sage opacity-10 blur-3xl"></div>
                                <div class="mb-10 flex items-start justify-between">
                                    <div>
                                        <p class="mb-2 text-[10px] font-black uppercase text-white/70">Blockchain Hash</p>
                                        <p class="font-mono text-xs tracking-tight text-sage">0x88...D982_UG_24</p>
                                    </div>
                                    <Link :href="route('traceability.show', { batch: 'UG-ARA-8842' })" class="rounded-sm bg-white p-3 transition-transform hover:scale-105">
                                        <img
                                            alt="Verification QR Code"
                                            class="h-16 w-16"
                                            :src="route('qr.traceability', { batch: 'UG-ARA-8842', size: 192 })"
                                        />
                                    </Link>
                                </div>

                                <div class="space-y-6">
                                    <div class="flex items-center justify-between border-b border-white/10 pb-4 text-xs uppercase tracking-wider text-white/75">
                                        <span>Identity Status</span>
                                        <span class="font-black text-sage">100% Verified</span>
                                    </div>
                                    <div class="flex items-center justify-between border-b border-white/10 pb-4 text-xs uppercase tracking-wider text-white/75">
                                        <span>Farmer Equity</span>
                                        <span class="font-black text-sage">94.2% Distributed</span>
                                    </div>
                                    <div class="flex items-center justify-between text-xs uppercase tracking-wider text-white/75">
                                        <span>Harvest Year</span>
                                        <span class="font-black text-white">2024 Reserve</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="impact" class="bg-white py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="grid grid-cols-1 items-center gap-20 lg:grid-cols-2">
                    <div class="order-2 lg:order-1">
                        <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Our Commitment</span>
                        <h2 class="serif mb-8 text-5xl font-bold leading-tight text-espresso md:text-6xl">Humanity Behind Every Bean</h2>
                        <p class="mb-12 text-2xl leading-relaxed text-on-surface-variant">
                            We're redefining the value chain by returning the majority of export value back to the farm gate. Sustainable coffee starts with sustainable lives.
                        </p>

                        <div class="grid grid-cols-2 gap-12">
                            <div class="border-l-2 border-sage pl-8">
                                <span class="mb-3 block text-5xl font-bold text-espresso">94%</span>
                                <p class="text-xs font-black uppercase tracking-widest text-espresso/40">Farmer Revenue Share</p>
                            </div>
                            <div class="border-l-2 border-sage pl-8">
                                <span class="mb-3 block text-5xl font-bold text-espresso">250+</span>
                                <p class="text-xs font-black uppercase tracking-widest text-espresso/40">Active Cooperatives</p>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        <div class="relative">
                            <img
                                alt="Ugandan Coffee Farmer"
                                class="aspect-[4/3] w-full rounded-sm object-cover"
                                :src="communityImage"
                            />
                            <div class="absolute -bottom-8 -left-8 hidden max-w-[320px] rounded-sm border border-espresso/5 bg-cream p-10 md:block">
                                <h5 class="mb-3 text-lg font-bold text-espresso">Impact Certified</h5>
                                <p class="text-[13px] uppercase tracking-wider text-on-surface-variant">
                                    Social impact metrics tracked across all cooperatives with annual transparency reports.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-surface-container-low/30 py-24">
            <div class="container mx-auto px-6 md:px-12">
                <div class="mb-16 flex flex-col items-end justify-between gap-8 md:flex-row">
                    <div>
                        <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Direct Stock</span>
                        <h2 class="serif text-5xl font-bold text-espresso">Featured Lots</h2>
                    </div>
                    <Link
                        :href="route('inventory.index')"
                        class="inline-flex items-center gap-3 border-none text-xs font-black uppercase tracking-widest text-espresso transition-colors hover:text-sage"
                    >
                        View All Inventory
                        <span class="material-symbols-outlined text-base">arrow_forward</span>
                    </Link>
                </div>

                <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="lot in displayedFeaturedLots"
                        :key="lot.id"
                        class="flex flex-col overflow-hidden rounded-sm bg-white shadow-[0_16px_32px_-18px_rgba(62,39,35,0.2)] transition-transform hover:-translate-y-1" style="box-shadow: 2px 2px 2px silver"
                    >
                        <div class="h-72 overflow-hidden">
                            <img :src="lot.image" :alt="lot.title" class="h-full w-full object-cover" />
                        </div>
                        <div class="flex-grow p-10">
                            <h3 class="serif mb-5 text-3xl font-bold text-espresso">{{ lot.title }}</h3>
                            <p class="mb-10 line-clamp-3 text-base text-on-surface-variant">{{ lot.description }}</p>
                            <div class="flex items-center justify-between pt-8">
                                <div>
                                    <span class="mb-1 block text-[10px] font-black uppercase tracking-widest text-espresso/40">Available</span>
                                    <span class="text-lg font-bold text-espresso">{{ lot.amount }}</span>
                                </div>
                                <Link
                                    :href="typeof lot.id === 'number' ? route('sample.show', lot.id) : route('sample.index')"
                                    class="rounded-sm bg-espresso px-8 py-3 text-xs font-black uppercase tracking-widest text-cream transition-all hover:bg-[#2a1916]"
                                >
                                    Sample
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="inquiry" class=" border-espresso/10 bg-cream py-24">
            <div class="container mx-auto max-w-4xl px-6 md:px-12">
                <div class="mb-20 text-center">
                    <span class="mb-4 block text-xs font-black uppercase tracking-[0.3em] text-sage">Get Started</span>
                    <h2 class="serif mb-8 text-5xl font-bold text-espresso md:text-6xl">Direct Sourcing Inquiry</h2>
                    <p class="text-xl text-on-surface-variant">Tell us your requirements and we'll connect you with the right origins.</p>
                </div>

                <div class="rounded-sm bg-white p-10 md:p-16">
                    <form class="space-y-10" @submit.prevent="submitInquiry">
                        <div class="grid grid-cols-1 gap-10 md:grid-cols-2">
                            <div class="space-y-3">
                                <label class="ml-1 text-[11px] font-black uppercase tracking-widest text-espresso/40" for="full-name">Full Name</label>
                                <input
                                    id="full-name"
                                    type="text"
                                    v-model="inquiryForm.names"
                                    placeholder="E.g. Alexander Walker"
                                    class="w-full rounded-sm border border-espresso/5 bg-surface-container-low px-6 py-5 text-base font-medium text-espresso outline-none transition-all placeholder:text-espresso/30 focus:border-sage focus:ring-1 focus:ring-sage"
                                />
                                <p v-if="inquiryForm.errors.names" class="text-sm font-medium text-red-700">{{ inquiryForm.errors.names }}</p>
                            </div>

                            <div class="space-y-3">
                                <label class="ml-1 text-[11px] font-black uppercase tracking-widest text-espresso/40" for="company-name">Company Name</label>
                                <input
                                    id="company-name"
                                    type="text"
                                    v-model="inquiryForm.company"
                                    placeholder="E.g. Nordic Roasters"
                                    class="w-full rounded-sm border border-espresso/5 bg-surface-container-low px-6 py-5 text-base font-medium text-espresso outline-none transition-all placeholder:text-espresso/30 focus:border-sage focus:ring-1 focus:ring-sage"
                                />
                                <p v-if="inquiryForm.errors.company" class="text-sm font-medium text-red-700">{{ inquiryForm.errors.company }}</p>
                            </div>

                            <div class="space-y-3">
                                <label class="ml-1 text-[11px] font-black uppercase tracking-widest text-espresso/40" for="email-address">Email Address</label>
                                <input
                                    id="email-address"
                                    type="email"
                                    v-model="inquiryForm.email"
                                    placeholder="E.g. sourcing@roastery.com"
                                    class="w-full rounded-sm border border-espresso/5 bg-surface-container-low px-6 py-5 text-base font-medium text-espresso outline-none transition-all placeholder:text-espresso/30 focus:border-sage focus:ring-1 focus:ring-sage"
                                />
                                <p v-if="inquiryForm.errors.email" class="text-sm font-medium text-red-700">{{ inquiryForm.errors.email }}</p>
                            </div>

                            <div class="space-y-3">
                                <label class="ml-1 text-[11px] font-black uppercase tracking-widest text-espresso/40" for="telephone">Telephone</label>
                                <input
                                    id="telephone"
                                    type="tel"
                                    v-model="inquiryForm.phone"
                                    placeholder="E.g. +256 700 123456"
                                    class="w-full rounded-sm border border-espresso/5 bg-surface-container-low px-6 py-5 text-base font-medium text-espresso outline-none transition-all placeholder:text-espresso/30 focus:border-sage focus:ring-1 focus:ring-sage"
                                />
                                <p v-if="inquiryForm.errors.phone" class="text-sm font-medium text-red-700">{{ inquiryForm.errors.phone }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label class="ml-1 text-[11px] font-black uppercase tracking-widest text-espresso/40" for="message">Sourcing Requirements</label>
                            <textarea
                                id="message"
                                v-model="inquiryForm.description"
                                placeholder="Describe variety, volume, and destination port..."
                                class="h-40 w-full rounded-sm border border-espresso/5 bg-surface-container-low px-6 py-5 text-base font-medium text-espresso outline-none transition-all placeholder:text-espresso/30 focus:border-sage focus:ring-1 focus:ring-sage"
                            ></textarea>
                            <p v-if="inquiryForm.errors.description" class="text-sm font-medium text-red-700">{{ inquiryForm.errors.description }}</p>
                        </div>

                        <button
                            type="submit"
                            :disabled="inquiryForm.processing"
                            class="w-full rounded-sm border border-espresso bg-espresso py-6 text-lg font-bold uppercase tracking-widest text-cream transition-all duration-300 hover:bg-transparent hover:text-espresso"
                        >
                            {{ inquiryForm.processing ? 'Sending Inquiry...' : 'Send Inquiry' }}
                        </button>
                    </form>
                </div>
            </div>
        </section>


<PublicFooter/>


    </div>
</template>

<style scoped>
.landing-page {
    --outline-variant: #d3c3c0;
    --surface-container-low: #f4f4f0;
    --surface-container-high: #e8e8e4;
    --on-surface-variant: #504442;
    --sage: #496640;
    --espresso: #3e2723;
    --cream: #fdfbf7;
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
    letter-spacing: -0.01em;
    font-size: 18px;
    line-height: 1.6;
}

.serif {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.text-balance {
    text-wrap: balance;
}

.grid-mesh {
    background-image: radial-gradient(circle at 1px 1px, #d3c3c0 1px, transparent 0);
    background-size: 40px 40px;
}

.border-subtle {
    border: 1px solid rgba(62, 39, 35, 0.1);
}

.glass-nav {
    background: rgba(253, 251, 247, 0.98);
}

.bg-cream {
    background-color: var(--cream);
}

.bg-surface-container-low {
    background-color: var(--surface-container-low);
}

.text-espresso {
    color: var(--espresso);
}

.text-on-surface-variant {
    color: var(--on-surface-variant);
}

.text-cream {
    color: var(--cream);
}

.text-sage {
    color: var(--sage);
}

.bg-espresso {
    background-color: var(--espresso);
}

.bg-sage {
    background-color: var(--sage);
}

.border-outline-variant {
    border-color: var(--outline-variant);
}

:deep(*) {
    box-shadow: none !important;
}
</style>
