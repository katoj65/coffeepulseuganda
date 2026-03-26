<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import headerLogo from '../../images/logo.png';

const isMenuOpen = ref(false);
</script>

<template>
    <nav class="sticky top-0 z-50 border-gray-100 bg-white py-4">
        <div class="bs-container">
            <div class="flex items-center justify-between gap-6">
                <Link :href="route('home')" class="flex items-center gap-3 font-headline text-2xl font-bold tracking-tight text-[#3e2723]">
                    <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-10 w-10 rounded-full object-contain" />
                    <span class="hidden sm:inline">Coffee Pulse Uganda</span>
                    <span class="sm:hidden">Coffee Pulse</span>
                </Link>

                <div class="hidden items-center space-x-8 md:flex">
                    <Link :href="route('home')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Home</Link>
                    <slot name="nav" />
                </div>

                <div class="hidden items-center gap-4 md:flex">
                    <slot name="actions" />
                </div>

                <button
                    type="button"
                    class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#271310] px-4 py-2.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-sm transition-opacity hover:opacity-90 md:hidden"
                    :aria-expanded="isMenuOpen ? 'true' : 'false'"
                    aria-label="Toggle navigation menu"
                    @click="isMenuOpen = !isMenuOpen"
                >
                    <span class="flex h-4 w-4 items-center justify-center">
                        <span
                            v-if="!isMenuOpen"
                            class="relative block h-[10px] w-4"
                        >
                            <span class="absolute left-0 top-0 block h-[2px] w-4 rounded-full bg-white"></span>
                            <span class="absolute left-0 top-1/2 block h-[2px] w-4 -translate-y-1/2 rounded-full bg-white"></span>
                            <span class="absolute bottom-0 left-0 block h-[2px] w-4 rounded-full bg-white"></span>
                        </span>
                        <span v-else class="relative block h-4 w-4">
                            <span class="absolute left-1/2 top-1/2 block h-[2px] w-4 -translate-x-1/2 -translate-y-1/2 rotate-45 rounded-full bg-white"></span>
                            <span class="absolute left-1/2 top-1/2 block h-[2px] w-4 -translate-x-1/2 -translate-y-1/2 -rotate-45 rounded-full bg-white"></span>
                        </span>
                    </span>
                    <span>{{ isMenuOpen ? 'Close' : 'Menu' }}</span>
                </button>
            </div>

            <div
                v-if="isMenuOpen"
                class="mt-4 rounded-[1.5rem] border border-[#d3c3c0]/40 bg-[#faf9f5] p-5 shadow-sm md:hidden"
            >
                <div class="flex flex-col gap-3" @click="isMenuOpen = false">
                    <Link :href="route('home')" class="rounded-2xl bg-white px-4 py-3 text-sm font-semibold uppercase tracking-wider text-[#271310]">
                        Home
                    </Link>

                    <div class="mobile-nav flex flex-col gap-3">
                        <slot name="nav" />
                    </div>

                    <div class="mobile-actions flex flex-col gap-3 pt-2">
                        <slot name="actions" />
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<style scoped>
.bs-container {
    width: 100%;
    max-width: 1140px;
    margin-right: auto;
    margin-left: auto;
    padding-right: 1.5rem;
    padding-left: 1.5rem;
}

.font-headline {
    font-family: 'Noto Serif', serif;
}

.nav-link {
    transition: color 0.2s ease-in-out;
}

.nav-link:hover {
    color: #56a554;
}

.mobile-nav :deep(a),
.mobile-actions :deep(a),
.mobile-actions :deep(button) {
    width: 100%;
    justify-content: center;
    border-radius: 1rem;
}
</style>
