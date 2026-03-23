<script setup>
import { Link } from '@inertiajs/vue3';
import headerLogo from '../../images/logo.png';
</script>

<template>
    <Link :href="route('home')" class="inline-flex items-center gap-4 text-left">
        <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-14 w-14 rounded-full object-contain" />
        <div>
            <p class="font-headline text-2xl font-bold tracking-tight text-inherit">Coffee Pulse Uganda</p>
            <p class="text-[11px] font-bold uppercase tracking-[0.24em] text-inherit opacity-70">Sourcing Operations</p>
        </div>
    </Link>
</template>

<style scoped>
.font-headline {
    font-family: 'Noto Serif', serif;
}
</style>
