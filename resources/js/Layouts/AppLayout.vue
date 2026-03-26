<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import headerLogo from '../../images/logo.png';

defineProps({
    title: String,
});

const logout = () => {
    router.post(route('logout'));
};

const isFabOpen = ref(false);

const fabActions = [
    {
        label: 'Add Market Place',
        icon: 'storefront',
        href: route('marketplace.create'),
    },
    {
        label: 'Traceability Form',
        icon: 'fact_check',
        href: route('traceability.create'),
    },
    {
        label: 'Add Sample',
        icon: 'package_2',
        href: route('samples.create'),
    },
    {
        label: 'Add Inventory',
        icon: 'inventory_2',
        href: route('inventory.create'),
    },
];
</script>

<template>
    <div class="dashboard-shell min-h-screen bg-[#faf9f5] text-[#1a1c1a] selection:bg-[#003508] selection:text-[#a3f69c]">
        <Head :title="title" />

        <Banner />

        <div class="lg:flex">
            <aside class="hidden h-screen w-72 shrink-0 border-r border-[#d3c3c0]/20 bg-[#faf9f5] px-6 py-6 lg:fixed lg:left-0 lg:top-0 lg:flex lg:flex-col">
                <div class="mb-10 flex items-center gap-3">
                    <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-11 w-11 rounded-xl object-contain" />
                    <div>
                        <h1 class="font-headline text-lg font-black tracking-tight text-[#271310]">Coffee Pulse Uganda</h1>
                        <p class="text-[10px] uppercase tracking-[0.16em] text-[#655d5a]/70">Trade Operations</p>
                    </div>
                </div>

                <nav class="flex-1 space-y-2">
                    <Link
                        :href="route('dashboard')"
                        :class="route().current('dashboard') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">space_dashboard</span>
                        <span class="text-sm">Dashboard</span>
                    </Link>

                    <Link
                        :href="route('inventory.index')"
                        :class="route().current('inventory.index') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">inventory_2</span>
                        <span class="text-sm">Inventory</span>
                    </Link>

                    <Link
                        :href="route('marketplace')"
                        :class="route().current('marketplace') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">storefront</span>
                        <span class="text-sm">Market Place</span>
                    </Link>

                    <Link
                        :href="route('origins')"
                        :class="route().current('origins') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">public</span>
                        <span class="text-sm">Origins</span>
                    </Link>

                    <Link
                        :href="route('protocol')"
                        :class="route().current('protocol') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">verified</span>
                        <span class="text-sm">Protocol</span>
                    </Link>

                    <Link
                        :href="route('notifications.index')"
                        :class="route().current('notifications.index') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">notifications</span>
                        <span class="text-sm">Notifications</span>
                    </Link>

                    <Link
                        :href="route('traceability.index')"
                        :class="route().current('traceability.index') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">fact_check</span>
                        <span class="text-sm">Traceability</span>
                    </Link>

                    <Link
                        :href="route('profile.show')"
                        :class="route().current('profile.show') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">person</span>
                        <span class="text-sm">Profile</span>
                    </Link>

                    <Link
                        v-if="$page.props.jetstream.hasApiFeatures"
                        :href="route('api-tokens.index')"
                        :class="route().current('api-tokens.index') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">key</span>
                        <span class="text-sm">API Tokens</span>
                    </Link>

                    <Link
                        v-if="$page.props.jetstream.hasTeamFeatures"
                        :href="route('teams.show', $page.props.auth.user.current_team)"
                        :class="route().current('teams.show') ? 'bg-white font-semibold text-[#271310] shadow-sm' : 'text-[#3e2723]/80 hover:bg-[#eeeeea] hover:text-[#271310]'"
                        class="flex items-center gap-3 rounded-lg px-4 py-3 transition-colors"
                    >
                        <span class="material-symbols-outlined">groups</span>
                        <span class="text-sm">Team Settings</span>
                    </Link>
                </nav>

                <div class="border-t border-[#d3c3c0]/20 pt-6">
                    <button
                        type="button"
                        class="flex w-full items-center justify-center gap-2 rounded-lg bg-[#271310] px-4 py-3 font-bold text-white transition-transform hover:scale-[1.02]"
                        @click="logout"
                    >
                        <span class="material-symbols-outlined text-sm">logout</span>
                        Log Out
                    </button>
                </div>
            </aside>

            <div class="min-h-screen flex-1 lg:ml-72">
                <header class="sticky top-0 z-40 flex h-20 items-center justify-between border-b border-[#d3c3c0]/10 bg-[#faf9f5]/95 px-6 backdrop-blur-md md:px-8">
                    <div class="flex min-w-0 items-center gap-6">
                        <Link :href="route('dashboard')" class="flex items-center gap-3 lg:hidden">
                            <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-10 w-10 rounded-xl object-contain" />
                            <span class="font-headline text-lg font-bold text-[#271310]">Coffee Pulse Uganda</span>
                        </Link>

                        <div class="hidden min-w-0 md:block">
                            <div v-if="$slots.header" class="font-headline text-2xl font-bold text-[#271310]">
                                <slot name="header" />
                            </div>
                            <h2 v-else class="font-headline text-2xl font-bold text-[#271310]">
                                {{ title }}
                            </h2>
                        </div>

                        <div class="hidden items-center rounded-full bg-[#e8e8e4] px-4 py-2 md:flex md:w-80 xl:w-96">
                            <span class="material-symbols-outlined text-sm text-[#827472]">search</span>
                            <input
                                type="text"
                                placeholder="Search lots, users, or records..."
                                class="w-full border-none bg-transparent px-3 text-sm text-[#271310] placeholder:text-[#827472]/70 focus:ring-0"
                            />
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <Link
                            :href="route('home')"
                            class="hidden rounded-full bg-[#eeeeea] px-4 py-2 text-xs font-bold uppercase tracking-widest text-[#271310] transition-colors hover:bg-[#e8e8e4] sm:inline-flex"
                        >
                            View Site
                        </Link>

                        <Link
                            :href="route('notifications.index')"
                            class="flex h-10 w-10 items-center justify-center rounded-full text-[#271310]/70 transition-all hover:bg-[#e8e8e4]"
                        >
                            <span class="material-symbols-outlined">notifications</span>
                        </Link>

                        <div class="hidden h-6 w-px bg-[#d3c3c0]/30 sm:block"></div>

                        <div class="flex items-center gap-3">
                            <div class="hidden text-right sm:block">
                                <p class="text-xs font-bold text-[#271310]">{{ $page.props.auth.user.name }}</p>
                                <p class="text-[10px] text-[#655d5a]">{{ $page.props.auth.user.email }}</p>
                            </div>
                            <img
                                class="h-10 w-10 rounded-full object-cover"
                                :src="$page.props.auth.user.profile_photo_url"
                                :alt="$page.props.auth.user.name"
                            />
                        </div>
                    </div>
                </header>

                <main class="px-6 py-8 md:px-8">
                    <div v-if="$slots.header" class="mb-8 md:hidden">
                        <div class="font-headline text-2xl font-bold text-[#271310]">
                            <slot name="header" />
                        </div>
                    </div>

                    <slot />
                </main>
            </div>
        </div>

        <div class="pointer-events-none fixed bottom-8 right-8 z-50 flex flex-col items-end gap-3">
            <div
                v-if="isFabOpen"
                class="pointer-events-auto flex flex-col items-end gap-3"
            >
                <Link
                    v-for="action in fabActions"
                    :key="action.label"
                    :href="action.href"
                    class="inline-flex items-center gap-3 rounded-full border border-[#d3c3c0]/60 bg-white px-4 py-3 text-sm font-semibold text-[#271310] shadow-lg transition-transform hover:scale-[1.02]"
                    @click="isFabOpen = false"
                >
                    <span class="material-symbols-outlined text-[20px]">{{ action.icon }}</span>
                    <span>{{ action.label }}</span>
                </Link>
            </div>

            <button
                type="button"
                class="pointer-events-auto flex h-14 w-14 items-center justify-center rounded-full bg-[#271310] text-white shadow-xl transition-transform hover:scale-[1.04]"
                :aria-expanded="isFabOpen ? 'true' : 'false'"
                aria-label="Open quick actions"
                @click="isFabOpen = !isFabOpen"
            >
                <span class="material-symbols-outlined text-[28px]">
                    {{ isFabOpen ? 'close' : 'add' }}
                </span>
            </button>
        </div>
    </div>
</template>

<style scoped>
.dashboard-shell {
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
}

.font-headline {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-family: 'Material Symbols Outlined';
    font-weight: normal;
    font-style: normal;
    font-size: 24px;
    line-height: 1;
    letter-spacing: normal;
    text-transform: none;
    display: inline-block;
    white-space: nowrap;
    word-wrap: normal;
    direction: ltr;
    -webkit-font-feature-settings: 'liga';
    -webkit-font-smoothing: antialiased;
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    vertical-align: middle;
}
</style>
