<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';
import arabicaImage from '../../images/coffee1.jpg';
import robustaImage from '../../images/coffee2.jpg';
import mapImage from '../../images/map.png';

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

const inventoryLots = [
    {
        name: 'Mount Elgon Sipi Falls',
        lotId: 'UG-24-001',
        origin: 'Kapchorwa Region',
        quality: '86.5 SCA',
        process: 'Fully Washed',
        status: 'Available',
        tone: 'available',
    },
    {
        name: 'Rwenzori Sun-Dried',
        lotId: 'UG-24-042',
        origin: 'Kasese Highlands',
        quality: '84.0 SCA',
        process: 'Natural',
        status: 'Sample Only',
        tone: 'sample',
    },
    {
        name: 'Zombo Erussi Plateau',
        lotId: 'UG-24-089',
        origin: 'West Nile',
        quality: '85.2 SCA',
        process: 'Honey Process',
        status: 'Available',
        tone: 'available',
    },
];
</script>

<template>
    <Head title="Available Inventory | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&family=Manrope:wght@300;400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-['Manrope'] text-[#271310]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('origins')" class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]">Origins</Link>
                <span class="text-sm font-semibold tracking-wider text-[#3e2723]">Inventory</span>
                <Link :href="route('blockchain')" class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]">Traceability</Link>
                <a class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]" href="#sustainability">Sustainability</a>
            </template>
            <template #actions>
                    <span class="material-symbols-outlined cursor-pointer rounded-md p-2 text-2xl transition-all hover:bg-[#eeeeea]">search</span>
                    <span class="material-symbols-outlined cursor-pointer rounded-md p-2 text-2xl transition-all hover:bg-[#eeeeea]">account_circle</span>
            </template>
        </PublicHeader>

        <main>
            <header class="pb-16 pt-20">
                <div class="mx-auto max-w-[1200px] px-12">
                    <div class="max-w-4xl">
                        <span class="mb-4 block text-sm uppercase tracking-[0.2em] text-[#504442]/70">Regional Collection 2024</span>
                        <h1 class="mb-8 font-['Noto_Serif'] text-5xl font-bold leading-tight tracking-tight text-[#271310] md:text-6xl">
                            Uganda's Finest: Current Coffee Inventory
                        </h1>
                        <p class="max-w-3xl text-xl font-light leading-relaxed text-[#504442] md:text-2xl">
                            Discover the rich diversity of Ugandan coffee. From the bold, sun-drenched Robusta of the Lake Victoria basin to the elegant,
                            high-altitude Arabica of Mount Elgon, our available lots represent the pinnacle of ethical sourcing and quality.
                        </p>
                    </div>
                </div>
            </header>

            <section class="mb-32">
                <div class="mx-auto max-w-[1200px] px-12">
                    <div class="grid grid-cols-1 items-stretch gap-8 md:grid-cols-12">
                        <div class="relative overflow-hidden bg-[#f4f4f0] p-10 md:col-span-7">
                            <div class="relative z-10 flex h-full flex-col justify-between">
                                <div>
                                    <div class="mb-6 inline-block bg-[#ece0dc] px-3 py-1">
                                        <span class="text-xs uppercase tracking-widest text-[#271310]">High-Altitude Variety</span>
                                    </div>
                                    <h2 class="mb-4 font-['Noto_Serif'] text-4xl font-bold">Ugandan Arabica</h2>
                                    <p class="mb-8 max-w-md text-lg text-[#504442]">
                                        High-altitude, smooth, and incredibly aromatic. Grown primarily in the foothills of Mt. Elgon and the Rwenzori Mountains.
                                    </p>
                                    <ul class="space-y-3 text-sm uppercase tracking-wide text-[#271310]/80">
                                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-[#003508]"></span> Citric Acidity</li>
                                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-[#003508]"></span> Floral Notes</li>
                                        <li class="flex items-center gap-2"><span class="h-1.5 w-1.5 rounded-full bg-[#003508]"></span> Complex Body</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="absolute -bottom-12 -right-12 h-80 w-80 rotate-12 opacity-20">
                                <img :src="arabicaImage" alt="Macro photo of green unroasted arabica coffee beans" class="h-full w-full object-cover" />
                            </div>
                        </div>

                        <div class="flex flex-col justify-between bg-[#eeeeea] p-10 md:col-span-5">
                            <div>
                                <div class="mb-6 inline-block bg-[#ece0dc] px-3 py-1">
                                    <span class="text-xs uppercase tracking-widest text-[#271310]">Indigenous Heritage</span>
                                </div>
                                <h2 class="mb-4 font-['Noto_Serif'] text-4xl font-bold">Fine Robusta</h2>
                                <p class="mb-8 text-lg text-[#504442]">
                                    Bold body, high caffeine, and a rich heritage. Our Fine Robusta is processed with the same care as specialty Arabica.
                                </p>
                            </div>

                            <div class="mt-auto">
                                <img :src="robustaImage" alt="Dark roasted coffee beans in a wooden scoop" class="mb-6 h-48 w-full object-cover" />
                                <p class="text-right text-sm uppercase tracking-wide text-[#271310]/60 italic">Lake Victoria Basin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-32">
                <div class="mx-auto max-w-[1200px] px-12">
                    <div class="mb-12 flex flex-col justify-between gap-6 md:flex-row md:items-end">
                        <div>
                            <h3 class="mb-2 font-['Noto_Serif'] text-3xl font-bold text-[#271310]">Live Inventory</h3>
                            <p class="text-[#504442]">Real-time availability of current lots ready for export.</p>
                        </div>

                        <div class="flex gap-4">
                            <div class="flex items-center gap-2 bg-[#e8e8e4] px-4 py-2">
                                <span class="material-symbols-outlined text-sm">filter_list</span>
                                <span class="text-sm uppercase tracking-wider">Filter Status</span>
                            </div>
                        </div>
                    </div>

                    <div class="no-scrollbar overflow-x-auto">
                        <table class="w-full border-collapse text-left">
                            <thead>
                                <tr class="bg-[#f4f4f0] text-xs uppercase tracking-[0.15em] text-[#504442]">
                                    <th class="px-6 py-5 font-semibold">Lot Name</th>
                                    <th class="px-6 py-5 font-semibold">Origin</th>
                                    <th class="px-6 py-5 font-semibold">Quality</th>
                                    <th class="px-6 py-5 font-semibold">Process</th>
                                    <th class="px-6 py-5 font-semibold">Status</th>
                                    <th class="px-6 py-5 text-right font-semibold">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-[#d3c3c0]/10">
                                <tr
                                    v-for="(lot, index) in inventoryLots"
                                    :key="lot.lotId"
                                    class="transition-colors"
                                    :class="index === 1 ? 'bg-[#f4f4f0]/30 hover:bg-[#f4f4f0]' : 'bg-white hover:bg-[#f4f4f0]'"
                                >
                                    <td class="px-6 py-8">
                                        <span class="block font-['Noto_Serif'] text-lg font-bold">{{ lot.name }}</span>
                                        <span class="text-xs uppercase tracking-tighter text-[#504442]/70">Lot ID: {{ lot.lotId }}</span>
                                    </td>
                                    <td class="px-6 py-8 text-[#504442]">{{ lot.origin }}</td>
                                    <td class="px-6 py-8">
                                        <div class="inline-flex min-w-[122px] flex-col rounded-sm border border-[#003508]/15 bg-[#003508]/6 px-4 py-3">
                                            <span class="text-base font-bold leading-none text-[#003508]">{{ lot.quality }}</span>
                                            <span class="mt-2 text-[10px] uppercase tracking-[0.2em] text-[#504442]">Specialty Grade</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-8 text-[#504442]">{{ lot.process }}</td>
                                    <td class="px-6 py-8">
                                        <div class="flex items-center gap-2">
                                            <span class="h-2 w-2 rounded-full" :class="lot.tone === 'available' ? 'bg-[#a3f69c]' : 'bg-[#655d5a]'"></span>
                                            <span class="text-xs uppercase tracking-widest" :class="lot.tone === 'available' ? 'text-[#271310]' : 'text-[#504442]'">
                                                {{ lot.status }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-8 text-right">
                                        <div class="flex justify-end gap-3">
                                            <Link
                                                :href="route('blockchain')"
                                                class="px-4 py-2 text-xs uppercase tracking-widest text-[#271310] transition-all hover:bg-[#e8e8e4]"
                                            >
                                                Passport
                                            </Link>
                                            <Link
                                                :href="route('sample.index')"
                                                class="bg-[#271310] px-4 py-2 text-xs uppercase tracking-widest text-white transition-transform hover:scale-[1.02]"
                                            >
                                                Request Sample
                                            </Link>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="sustainability" class="mb-32">
                <div class="mx-auto max-w-[1200px] px-12">
                    <div class="grid grid-cols-1 gap-16 lg:grid-cols-2">
                        <div class="group relative flex min-h-[500px] items-center justify-center overflow-hidden rounded-sm bg-[#eeeeea]">
                            <div class="absolute inset-0 opacity-40 grayscale transition-all duration-700 group-hover:grayscale-0">
                                <img :src="mapImage" alt="Topographic abstract map of a mountainous region" class="h-full w-full object-cover" />
                            </div>
                            <div class="relative z-10 mx-auto max-w-sm bg-white/80 p-10 text-center shadow-sm backdrop-blur-md">
                                <span class="material-symbols-outlined mb-4 text-4xl text-[#001d03]">location_on</span>
                                <h3 class="mb-4 font-['Noto_Serif'] text-2xl font-bold">Origin Mapping</h3>
                                <p class="mb-6 text-[#504442]">Explore the precise micro-climates where our beans are nurtured.</p>
                                <Link :href="route('origins')" class="border-b border-[#271310] pb-1 text-xs uppercase tracking-widest text-[#271310]">
                                    Open Interactive Atlas
                                </Link>
                            </div>
                            <div class="hidden" data-location="Uganda"></div>
                        </div>

                        <div class="flex flex-col justify-center">
                            <div class="relative flex h-full flex-col justify-center overflow-hidden bg-[#003508] p-12 text-[#88d982]">
                                <div class="relative z-10">
                                    <div class="mb-8 flex items-center gap-4">
                                        <span class="material-symbols-outlined text-5xl" style="font-variation-settings: 'FILL' 1">eco</span>
                                        <h3 class="font-['Noto_Serif'] text-3xl font-bold">The Root of Change</h3>
                                    </div>
                                    <p class="mb-8 text-lg leading-relaxed opacity-90">
                                        Our sustainability badge is not just a label. It is a commitment. We ensure every lot in our inventory meets rigorous
                                        ethical trade standards, with 95% of the export value returning to the farming cooperatives.
                                    </p>
                                    <div class="grid grid-cols-2 gap-6 border-t border-white/20 pt-8">
                                        <div>
                                            <span class="block font-['Noto_Serif'] text-2xl font-bold">Direct-Trade</span>
                                            <span class="text-xs uppercase tracking-widest opacity-60">Transparency Verified</span>
                                        </div>
                                        <div>
                                            <span class="block font-['Noto_Serif'] text-2xl font-bold">Rainforest+</span>
                                            <span class="text-xs uppercase tracking-widest opacity-60">Certified Organic</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="absolute right-0 top-0 p-8 opacity-10">
                                    <span class="material-symbols-outlined text-[120px]">verified</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <PublicFooter class="mt-20" />
    </div>
</template>

<style scoped>
.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}

.no-scrollbar::-webkit-scrollbar {
    display: none;
}

.no-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
