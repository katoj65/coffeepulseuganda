<script setup>
import { Link } from '@inertiajs/vue3';
import headerLogo from '../../images/logo.png';
</script>

<template>
    <nav class="sticky top-0 z-50 border-b border-gray-100 bg-white py-4">
        <div class="bs-container flex items-center justify-between gap-6">
            <Link :href="route('home')" class="flex items-center gap-3 font-headline text-2xl font-bold tracking-tight text-[#3e2723]">
                <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-10 w-10 rounded-full object-contain" />
                <span>Coffee Pulse Uganda</span>
            </Link>

            <div class="hidden items-center space-x-8 md:flex">
                <Link :href="route('home')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Home</Link>
                <slot name="nav" />
            </div>

            <div class="flex items-center gap-4">
                <slot name="actions" />
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
</style>
