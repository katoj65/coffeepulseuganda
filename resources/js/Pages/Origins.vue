<script setup>
import { Head, Link } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';
import coffee1 from '../../images/coffee1.jpg';
import coffee2 from '../../images/coffee2.jpg';
import coffee3 from '../../images/coffee3.jpg';
import coffee4 from '../../images/coffee4.jpg';
import mapImage from '../../images/map.png';
import harvestImage from '../../images/community.jpg';

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
</script>

<template>
    <Head title="Explore Origins | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;700&family=Manrope:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="origins-page bg-[#faf9f5] text-[#1a1c1a] selection:bg-[#3e2723] selection:text-white">
        <PublicHeader>
            <template #nav>
                <Link :href="route('home')" class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]">Home</Link>
                <a class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]" href="#regional-overview">Our Coffee</a>
                <Link :href="route('blockchain')" class="nav-link text-sm font-semibold tracking-wider text-[#6b6360]">Traceability</Link>
                <a class="text-sm font-semibold tracking-wider text-[#3e2723]" href="#origins-grid">Origins</a>
            </template>
            <template #actions>
                    <template v-if="$page.props.auth.user">
                        <Link
                            :href="route('dashboard')"
                            class="rounded-sm bg-[#3e2723] px-6 py-2.5 text-xs font-bold uppercase tracking-widest text-white transition-colors hover:bg-black"
                        >
                            Source Coffee
                        </Link>
                    </template>
                    <template v-else-if="canRegister">
                        <Link
                            :href="route('register')"
                            class="rounded-sm bg-[#3e2723] px-6 py-2.5 text-xs font-bold uppercase tracking-widest text-white transition-colors hover:bg-black"
                        >
                            Source Coffee
                        </Link>
                    </template>
                    <template v-else-if="canLogin">
                        <Link
                            :href="route('login')"
                            class="rounded-sm bg-[#3e2723] px-6 py-2.5 text-xs font-bold uppercase tracking-widest text-white transition-colors hover:bg-black"
                        >
                            Source Coffee
                        </Link>
                    </template>
            </template>
        </PublicHeader>

        <main>
            <section class="py-20 md:py-32">
                <div class="container-custom">
                    <div class="mx-auto max-w-4xl text-center">
                        <span class="mb-6 inline-block text-xs font-bold uppercase tracking-[0.3em] text-[#504442]">Discovery &amp; Heritage</span>
                        <h1 class="serif mb-8 text-5xl font-bold leading-[1.1] tracking-tight text-[#271310] md:text-7xl">
                            Explore Uganda's<br />
                            <span class="font-normal italic text-[#745853]">Coffee Origins</span>
                        </h1>
                        <p class="mx-auto max-w-2xl text-xl leading-relaxed text-[#504442]">
                            Deep in the heart of East Africa, a unique terroir shaped by volcanic highlands, lake basins, and equatorial seasons produces extraordinary coffee.
                        </p>
                    </div>
                </div>
            </section>

            <section id="regional-overview" class="border-y border-[#eeeeea] bg-[#f4f4f0] py-20">
                <div class="container-custom">
                    <div class="flex flex-col items-center gap-12 lg:flex-row lg:gap-24">
                        <div class="w-full lg:w-7/12">
                            <div class="relative aspect-[16/10] overflow-hidden border border-[#d3c3c0] bg-white">
                                <img :src="mapImage" alt="Map of Uganda highlighting coffee-growing regions" class="h-full w-full object-cover opacity-95" />

                                <div class="absolute right-[15%] top-[35%]">
                                    <div class="h-4 w-4 rounded-full bg-[#271310] ring-4 ring-[#271310]/20"></div>
                                    <span class="absolute left-1/2 top-6 -translate-x-1/2 whitespace-nowrap bg-[#271310] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-white">
                                        Mount Elgon
                                    </span>
                                </div>

                                <div class="absolute left-[10%] top-[50%]">
                                    <div class="h-4 w-4 rounded-full bg-[#271310] ring-4 ring-[#271310]/20"></div>
                                    <span class="absolute left-1/2 top-6 -translate-x-1/2 whitespace-nowrap bg-[#271310] px-3 py-1 text-[10px] font-bold uppercase tracking-wider text-white">
                                        Rwenzori
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="w-full lg:w-5/12">
                            <h2 class="serif mb-6 text-4xl font-bold leading-tight text-[#271310]">A Tapestry of Terroir</h2>
                            <p class="mb-10 text-lg leading-relaxed text-[#504442]">
                                Uganda's geography is defined by mountain ranges, fertile volcanic slopes, and the Lake Victoria basin. These diverse landscapes allow us to produce both high-altitude specialty Arabica and bold indigenous Robusta.
                            </p>

                            <div class="space-y-8">
                                <div class="group flex items-start gap-6">
                                    <div class="border border-[#d3c3c0] bg-white p-3 text-[#271310] transition-colors group-hover:bg-[#271310] group-hover:text-white">
                                        <span class="material-symbols-outlined text-2xl">mountain_flag</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 text-xl font-bold text-[#271310]">Volcanic Altitudes</h4>
                                        <p class="text-sm text-[#504442]">Elevations exceeding 2,000 meters on the slopes of Mount Elgon and the Rwenzori highlands.</p>
                                    </div>
                                </div>

                                <div class="group flex items-start gap-6">
                                    <div class="border border-[#d3c3c0] bg-white p-3 text-[#271310] transition-colors group-hover:bg-[#271310] group-hover:text-white">
                                        <span class="material-symbols-outlined text-2xl">water_drop</span>
                                    </div>
                                    <div>
                                        <h4 class="mb-1 text-xl font-bold text-[#271310]">Lake Basin Humidity</h4>
                                        <p class="text-sm text-[#504442]">Consistent warmth and moisture create the right conditions for rich, full-bodied Robusta.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="origins-grid" class="py-24">
                <div class="container-custom">
                    <div class="mb-16 text-center">
                        <h2 class="serif text-3xl font-bold text-[#271310]">Discover the Regions</h2>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                        <article class="flex flex-col border border-[#d3c3c0] bg-white transition-colors duration-300 hover:border-[#271310]">
                            <div class="aspect-square overflow-hidden border-b border-[#d3c3c0]">
                                <img :src="coffee1" alt="Coffee plantations on the slopes of Mount Elgon" class="h-full w-full object-cover" />
                            </div>
                            <div class="flex flex-grow flex-col p-6">
                                <div class="mb-3 flex items-center gap-2">
                                    <span class="bg-[#ece0dc] px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-widest text-[#6b6360]">Arabica</span>
                                </div>
                                <h3 class="mb-3 text-2xl font-bold text-[#271310]">Mount Elgon</h3>
                                <p class="mb-8 flex-grow text-sm leading-relaxed text-[#504442]">
                                    High altitude, volcanic soil, smooth aromatics, and layered acidity with notes of citrus and wild berries.
                                </p>
                                <div class="origin-cta">
                                    <template v-if="$page.props.auth.user">
                                        <Link :href="route('dashboard')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canRegister">
                                        <Link :href="route('register')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canLogin">
                                        <Link :href="route('login')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </article>

                        <article class="flex flex-col border border-[#d3c3c0] bg-white transition-colors duration-300 hover:border-[#271310]">
                            <div class="aspect-square overflow-hidden border-b border-[#d3c3c0]">
                                <img :src="coffee2" alt="Coffee farms in the Rwenzori ranges" class="h-full w-full object-cover" />
                            </div>
                            <div class="flex flex-grow flex-col p-6">
                                <div class="mb-3 flex items-center gap-2">
                                    <span class="bg-[#ece0dc] px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-widest text-[#6b6360]">Arabica</span>
                                </div>
                                <h3 class="mb-3 text-2xl font-bold text-[#271310]">Rwenzori Ranges</h3>
                                <p class="mb-8 flex-grow text-sm leading-relaxed text-[#504442]">
                                    Distinct microclimates produce high-altitude specialty lots with floral aromatics, bright citrus, and crisp structure.
                                </p>
                                <div class="origin-cta">
                                    <template v-if="$page.props.auth.user">
                                        <Link :href="route('dashboard')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canRegister">
                                        <Link :href="route('register')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canLogin">
                                        <Link :href="route('login')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </article>

                        <article class="flex flex-col border border-[#d3c3c0] bg-white transition-colors duration-300 hover:border-[#271310]">
                            <div class="aspect-square overflow-hidden border-b border-[#d3c3c0]">
                                <img :src="coffee3" alt="Coffee drying and handling around Lake Victoria" class="h-full w-full object-cover" />
                            </div>
                            <div class="flex flex-grow flex-col p-6">
                                <div class="mb-3 flex items-center gap-2">
                                    <span class="bg-[#001d03] px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-widest text-white">Robusta</span>
                                </div>
                                <h3 class="mb-3 text-2xl font-bold text-[#271310]">Lake Victoria</h3>
                                <p class="mb-8 flex-grow text-sm leading-relaxed text-[#504442]">
                                    Bold body, higher caffeine, and a classic Ugandan cup profile suited to espresso blends and darker roasting curves.
                                </p>
                                <div class="origin-cta">
                                    <template v-if="$page.props.auth.user">
                                        <Link :href="route('dashboard')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canRegister">
                                        <Link :href="route('register')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canLogin">
                                        <Link :href="route('login')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </article>

                        <article class="flex flex-col border border-[#d3c3c0] bg-white transition-colors duration-300 hover:border-[#271310]">
                            <div class="aspect-square overflow-hidden border-b border-[#d3c3c0]">
                                <img :src="coffee4" alt="Coffee gardens in the central lowlands of Uganda" class="h-full w-full object-cover" />
                            </div>
                            <div class="flex flex-grow flex-col p-6">
                                <div class="mb-3 flex items-center gap-2">
                                    <span class="bg-[#001d03] px-2 py-0.5 text-[10px] font-extrabold uppercase tracking-widest text-white">Robusta</span>
                                </div>
                                <h3 class="mb-3 text-2xl font-bold text-[#271310]">Central Lowlands</h3>
                                <p class="mb-8 flex-grow text-sm leading-relaxed text-[#504442]">
                                    Fertile soils and experienced growers define Uganda's robust export heritage with dependable quality and volume.
                                </p>
                                <div class="origin-cta">
                                    <template v-if="$page.props.auth.user">
                                        <Link :href="route('dashboard')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canRegister">
                                        <Link :href="route('register')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                    <template v-else-if="canLogin">
                                        <Link :href="route('login')" class="block w-full border border-[#271310] py-4 text-center text-[11px] font-bold uppercase tracking-widest text-[#271310] transition-all hover:bg-[#271310] hover:text-white">
                                            Source Coffee
                                        </Link>
                                    </template>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="bg-[#271310] py-24 text-white">
                <div class="container-custom">
                    <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                        <div>
                            <h2 class="serif mb-8 text-5xl font-bold leading-tight">Heritage in Every Harvest</h2>
                            <p class="mb-12 max-w-lg text-lg leading-relaxed text-[#d3c3c0]">
                                Uganda's unique advantage lies in its dual harvest seasons. While most coffee nations harvest once, our equatorial climate allows for two distinct picking periods and a more resilient supply rhythm.
                            </p>

                            <div class="grid grid-cols-2 gap-6">
                                <div class="border border-white/10 p-8">
                                    <div class="mb-2 text-4xl font-bold text-white">3.5M+</div>
                                    <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#d3c3c0]">Smallholder Farmers</div>
                                </div>
                                <div class="border border-white/10 p-8">
                                    <div class="mb-2 text-4xl font-bold text-white">#1</div>
                                    <div class="text-[10px] font-bold uppercase tracking-[0.2em] text-[#d3c3c0]">African Exporter</div>
                                </div>
                            </div>
                        </div>

                        <div class="relative">
                            <div class="aspect-[4/5] overflow-hidden border border-white/10">
                                <img :src="harvestImage" alt="Ugandan coffee community and harvest activity" class="h-full w-full object-cover" />
                            </div>
                            <div class="absolute -bottom-6 -left-6 max-w-xs border border-white/10 bg-[#003508] p-10">
                                <span class="material-symbols-outlined mb-4 text-3xl text-[#a3f69c]">verified</span>
                                <p class="text-lg font-bold italic text-white">"The dual harvest seasons are our biological gift."</p>
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
.origins-page {
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
}

.serif {
    font-family: 'Noto Serif', serif;
}

.container-custom {
    width: 100%;
    max-width: 1320px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    display: inline-block;
    line-height: 1;
    vertical-align: middle;
}
</style>
