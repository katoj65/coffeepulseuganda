<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

const metrics = [
    { value: '15,000+', label: 'Farmers Empowered' },
    { value: '1.2M', label: 'Trees Planted' },
    { value: '40%', label: 'Higher Direct Margins' },
    { value: '100%', label: 'Traceability Rate' },
];

const carbonBenefits = [
    { icon: 'token', label: 'Real-time sequestration auditing' },
    { icon: 'verified_user', label: 'Immutable farmer payout logs' },
    { icon: 'public', label: 'Global compliance standards' },
];

const ethicalCards = [
    {
        icon: 'handshake',
        title: 'Direct Partnerships',
        description: 'We bypass traditional auction houses to sign long-term, fixed-price contracts directly with Ugandan cooperatives.',
    },
    {
        icon: 'payments',
        title: 'Living Wages',
        description: 'Our pricing model is based on the Cost of Sustainable Production (CoSP), ensuring a 40% margin above market rates.',
    },
    {
        icon: 'diversity_3',
        title: 'Equity Programs',
        description: 'Investment in local infrastructure, including washing stations and education centers, owned by the farmers themselves.',
    },
];

const stewardshipItems = [
    {
        icon: 'park',
        title: 'Agroforestry Systems',
        description: 'Intercropping coffee with shade trees and fruit species to enhance biodiversity and soil nitrogen levels naturally.',
    },
    {
        icon: 'water_drop',
        title: 'Closed-Loop Water Management',
        description: 'Recycling 85% of water used in wet-mill processing and implementing gravity-fed irrigation to minimize energy consumption.',
    },
    {
        icon: 'compost',
        title: 'Organic Fertilizer Production',
        description: 'Converting coffee pulp and parchment husks into nutrient-rich compost, reducing reliance on chemical inputs.',
    },
];

const galleryImages = [
    {
        alt: 'Organic Farming',
        src: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJDLqDTGHO04NS_gs-iwiN4wv3p3pMfmkSoDSRSN8r6CkUOt3Cxw3911ZksR41x7k4z5TpUDpoWLZCfrfcfniMtchZTcdsxUp9A1aG11w-y3keI5drF1Zs_nS19bko7usurY0zN8xqYhPhUI_SO7Y4ixcfiWj6NvmGI2OJ5YFpkgQKUwZpGIVFTQrthKInuxwhxSMAZavFr9dpEsWmrwj3k2f05xZyAv7l8Mxp3hDUZm3ZFRiB3WjMuFgCsDmAP_O95GWGupfuMeU',
        classes: 'h-64',
    },
    {
        alt: 'Soil Health',
        src: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDZcE5pHLpMI1mEWRFlkvYs5uyxtWWa5hHAVzMTST-FPZq51fBXg_lcw4FvMUNhflepGVVvioeO76VMls1vIxfcIap_ZxESWyXaqg9qaaR_3qS9ghsQmhSnISnzIcJAqYZGTtGvHelFtfSBmDwV0SF8UP2qZF0PKo-pZXzzrnN2LxLYQtH69Y5kBaq1RLc3IXPoRwwk6ZenyJ_ww8a5qDOHhE4pEJ-nx1ZuvHWyOJBknusHETKXGuwGVJWBasz2cCd9ccyngLzTOz4',
        classes: 'mt-8 h-80',
    },
    {
        alt: 'Agroforestry',
        src: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAHDj4di_JWoc02xHvw12v68xds0ePoFa0SIyiHNnOLr2Ri93P08rba3S78rCE7llVCjvhnywWO9ExHRN-BHenz8Oyo3Vp37bcwXTYYvqO_jE0NkpZHUDNS2RpGHTN-kTOe_cEpTCXWCP53Lt2CkSuEDbOR57J9R7E8nxk-xNtsW2z2OPwKVSN9LD_DvMkHzUGBpauuHtU9P_ZHiETqiKZheAD5vApNd66uCg5V-f4i2c3s6O69tEzIY8MxmOR3hDMjnyc7y1EYeKw',
        classes: '-mt-16 h-64',
    },
    {
        alt: 'Water Management',
        src: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBXot0GBsz1tRO26XMhRBCrwpI32kUOaMrOE-QfR_4YPQ53hlxg5dMn0-ApCfU8o9X7n-ZuFA8D8ycW5AU2Vy_fNMyXnC4YtRLoLnPxDsFxzkMxEsxtzWPYkYhFNidgOhbQr0W8TFIVhJYT_FnZuB1L5Af1d0Oku4zjd9hoP9HJIBO6Q1R0zqtg7W2XTf1ov6BLqBfxMRnN1wGseFa6kFpfx6VBYk-KBcvDv3mQEZPoXGBjZIxu96xAdJfmCznzWdunVckr3q2R8wQ',
        classes: 'h-64',
    },
];
</script>

<template>
    <Head title="Sustainability | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] text-[#1a1c1a] antialiased selection:bg-[#a3f69c] selection:text-[#002204]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <Link :href="`${route('home')}#global-scale`" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</Link>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main>
            <section class="relative overflow-hidden bg-[#faf9f5] py-24 md:py-32">
                <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-8 md:grid-cols-12">
                    <div class="z-10 md:col-span-7">
                        <span class="mb-6 inline-block rounded-full bg-[#ece0dc] px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-[#6b6360]">
                            Our Commitment
                        </span>
                        <h1 class="mb-8 font-headline text-5xl leading-tight text-[#271310] md:text-7xl">
                            Cultivating a Sustainable Future from the Soil Up
                        </h1>
                        <p class="mb-10 max-w-xl text-lg font-light leading-relaxed text-[#504442] md:text-xl">
                            Redefining the Uganda coffee trade through radical transparency, regenerative agriculture, and direct-to-farm equity.
                        </p>
                    </div>

                    <div class="relative md:col-span-5">
                        <div class="aspect-[4/5] overflow-hidden rounded-xl bg-[#f4f4f0] grayscale transition-all duration-700 hover:grayscale-0">
                            <img
                                alt="Uganda Coffee Farm Landscape"
                                class="h-full w-full object-cover"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuAsBMBIv6076cE1FDNHvg3tL-W8WQs77d29tquOmw04t8s8nMiMs1OR6lre4kLBFuTPBwh6A4KUKzDyAXqpcj1z1pyOTcc3teKZYI_fRIP6f3Zcy7WXETFrM2MCxpK0Y8g5uvtyBVhAD8_KleMW3eKTJ9_DDdO7yCubQlylUykUwPAnW5SZLXOtoderK1nh7dP1MdJHL7YPLV-BfKZxTDoyFXRq2Po4SctYtcb_LB6p35jLR3jaktZieg3F0aIr9Nn2Lws4xeus6CI"
                            />
                        </div>
                        <div class="absolute -bottom-8 -left-8 hidden max-w-[240px] border-l-4 border-[#003508] bg-white p-8 md:block">
                            <p class="font-headline text-lg italic text-[#271310]">"Quality is found in the respect we show the earth."</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#271310] py-20">
                <div class="mx-auto max-w-7xl px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
                        <div v-for="metric in metrics" :key="metric.label" class="border-l border-[#d3c3c0]/20 pl-6 text-center md:text-left">
                            <h3 class="mb-2 font-headline text-4xl text-white">{{ metric.value }}</h3>
                            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#ae8d87]">{{ metric.label }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#f4f4f0] py-24">
                <div class="mx-auto max-w-7xl px-8">
                    <div class="grid grid-cols-1 items-center gap-20 md:grid-cols-2">
                        <div class="order-2 md:order-1">
                            <div class="group relative">
                                <div class="absolute inset-0 rounded-xl bg-[#001d03] opacity-10 transition-opacity duration-500 group-hover:opacity-0"></div>
                                <img
                                    alt="Blockchain Integration"
                                    class="h-[500px] w-full rounded-xl object-cover"
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuA_MO4siwLa_SJYfCaRQ-_lEld76DjDzc5ZDQ_SQsmZtvDvreZwRySp3J7IHhM9oH-RJvqBzTgGUnu3jUF_dBMiJNyzrE4NE22sv9DsTuaSgYbSzJA-op8dVJhDsD7eOMpkaoNrjS3N840xptNgPlznVATxsFpJKuiyoJdgT0fTioHT8jYKOR6olEgky9LwWL8ibGcM8m3g23qAGaGi3Ve161aqDvyyE_uygaI36BPjAe8YHHe-l5o9nbGq0VcJu_sKsQ7VtbmL-34"
                                />
                            </div>
                        </div>

                        <div class="order-1 md:order-2">
                            <span class="mb-4 block text-[10px] font-bold uppercase tracking-[0.2em] text-[#56a554]">Tech-Enabled Ecology</span>
                            <h2 class="mb-6 font-headline text-4xl text-[#271310]">Blockchain Carbon Verification</h2>
                            <p class="mb-8 text-lg font-light leading-relaxed text-[#504442]">
                                We utilize decentralized ledger technology to track carbon sequestration efforts across Uganda's Mt. Elgon region. Every regenerative practice—from mulching to shade-tree planting—is verified and tokenized, providing farmers with secondary income streams directly through carbon credits.
                            </p>
                            <ul class="space-y-4">
                                <li v-for="item in carbonBenefits" :key="item.label" class="flex items-center gap-4 font-medium text-[#271310]">
                                    <span class="material-symbols-outlined text-[#56a554]">{{ item.icon }}</span>
                                    <span>{{ item.label }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#faf9f5] py-24">
                <div class="mx-auto mb-16 max-w-7xl px-8 text-center">
                    <h2 class="mb-4 font-headline text-4xl text-[#271310]">The Ethical Nexus</h2>
                    <p class="mx-auto max-w-2xl font-light text-[#504442]">
                        Eliminating the middlemen to ensure the soul of the coffee trade—the smallholder—is the primary beneficiary of every cup.
                    </p>
                </div>
                <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 px-8 md:grid-cols-3">
                    <div v-for="card in ethicalCards" :key="card.title" class="rounded-xl bg-white p-10 transition-transform hover:-translate-y-2">
                        <span class="material-symbols-outlined mb-6 text-4xl text-[#271310]">{{ card.icon }}</span>
                        <h3 class="mb-4 font-headline text-xl text-[#271310]">{{ card.title }}</h3>
                        <p class="text-sm leading-relaxed text-[#504442]">{{ card.description }}</p>
                    </div>
                </div>
            </section>

            <section class="bg-[#e8e8e4] py-24">
                <div class="mx-auto max-w-7xl px-8">
                    <div class="grid grid-cols-1 items-start gap-16 md:grid-cols-2">
                        <div>
                            <h2 class="mb-8 font-headline text-4xl text-[#271310]">Regenerative Stewardship</h2>
                            <div class="space-y-12">
                                <div v-for="item in stewardshipItems" :key="item.title" class="flex gap-6">
                                    <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-[#003508]">
                                        <span class="material-symbols-outlined text-[#a3f69c]">{{ item.icon }}</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-2 font-bold text-[#271310]">{{ item.title }}</h4>
                                        <p class="text-sm leading-relaxed text-[#504442]">{{ item.description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <img
                                v-for="image in galleryImages"
                                :key="image.alt"
                                :alt="image.alt"
                                :src="image.src"
                                class="w-full rounded-lg object-cover"
                                :class="image.classes"
                            />
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-[#faf9f5] py-24">
                <div class="relative mx-auto max-w-4xl overflow-hidden rounded-2xl bg-[#271310] p-16 text-center">
                    <div class="absolute inset-0 opacity-5" style="background-image: url('https://www.transparenttextures.com/patterns/coffee-beans.png');"></div>
                    <h2 class="relative z-10 mb-6 font-headline text-4xl text-white">Sustain the Legacy</h2>
                    <p class="relative z-10 mb-10 text-lg text-[#ae8d87]">
                        Partner with us in securing the future of Ugandan coffee through a sustainable, transparent trade agreement.
                    </p>
                    <div class="relative z-10 flex flex-col justify-center gap-4 sm:flex-row">
                        <Link :href="route('contact')" class="rounded bg-[#a3f69c] px-10 py-4 text-sm font-bold uppercase tracking-widest text-[#002204] transition-transform hover:scale-[1.02]">
                            Inquire for Bulk Trade
                        </Link>
                        <Link :href="route('roadmap')" class="rounded border border-[#d3c3c0]/50 px-10 py-4 text-sm font-bold uppercase tracking-widest text-white transition-colors hover:bg-white/10">
                            Download Roadmap
                        </Link>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter />
    </div>
</template>

<style scoped>
.font-headline {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
