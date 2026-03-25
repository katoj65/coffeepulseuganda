<script setup>
import { Link } from '@inertiajs/vue3';
import headerLogo from '../../images/logo.png';
</script>

<template>
    <footer class="border-t border-white/10 bg-espresso py-24 text-cream">
        <div class="container mx-auto px-6 md:px-12">
            <div class="mb-20 grid grid-cols-1 gap-16 md:grid-cols-2 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <div class="mb-8 flex items-center gap-3 text-2xl font-bold text-cream">
                        <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-10 w-10 rounded-full object-contain" />
                        <span class="serif">Coffee Pulse Uganda</span>
                    </div>
                    <p class="max-w-md text-xl font-normal leading-relaxed text-cream/90">
                        Connecting the world to Uganda's finest coffee through radical transparency and ethical trade. Empowering smallholders through digital trust.
                    </p>
                </div>

                <div class="lg:col-span-3">
                    <h5 class="mb-8 text-xs font-black uppercase tracking-[0.3em] text-white">Contact Us</h5>
                    <div class="space-y-6 text-base text-cream/95">
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-xl text-white">location_on</span>
                            <p>Munyonyo, Ggaba road Kampala Uganda</p>
                        </div>
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-xl text-white">travel_explore</span>
                            <div class="space-y-2">
                                <Link :href="route('origins')" class="block font-medium transition-colors hover:text-white">Explore Origins</Link>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4">
                    <h5 class="mb-8 text-xs font-black uppercase tracking-[0.3em] text-white">Follow Our Journey</h5>
                    <div class="flex flex-wrap gap-5 sm:flex-nowrap">
                        <a
                            aria-label="Instagram"
                            class="flex h-14 w-14 items-center justify-center rounded-md border border-white text-cream transition-all hover:text-white"
                            href="https://www.instagram.com/coffeepulse2026/" target="new"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-7 w-7 fill-current">
                                <path
                                    d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.5A4.25 4.25 0 0 0 3.5 7.75v8.5a4.25 4.25 0 0 0 4.25 4.25h8.5a4.25 4.25 0 0 0 4.25-4.25v-8.5a4.25 4.25 0 0 0-4.25-4.25h-8.5ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.5A3.5 3.5 0 1 0 12 15.5 3.5 3.5 0 0 0 12 8.5Zm5.25-2a1.25 1.25 0 1 1 0 2.5 1.25 1.25 0 0 1 0-2.5Z"
                                />
                            </svg>
                        </a>
                        <a
                            aria-label="LinkedIn"
                            class="flex h-14 w-14 items-center justify-center rounded-md border border-white text-cream transition-all hover:text-white"
                            href="https://www.linkedin.com/in/coffee-pulse-uganda-5656853b8/" target="new"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-7 w-7 fill-current">
                                <path
                                    d="M6.94 8.5A1.56 1.56 0 1 1 6.94 5.38a1.56 1.56 0 0 1 0 3.12ZM5.5 9.75h2.88V18.5H5.5V9.75Zm4.69 0h2.76v1.2H13a3 3 0 0 1 2.73-1.5c2.92 0 3.46 1.92 3.46 4.42v4.63h-2.87v-4.1c0-.98-.02-2.24-1.37-2.24s-1.58 1.06-1.58 2.17v4.17h-2.88V9.75Z"
                                />
                            </svg>
                        </a>
                        <a
                            aria-label="Twitter/X"
                            class="flex h-14 w-14 items-center justify-center rounded-md border border-white text-cream transition-all hover:text-white"
                            href="https://x.com/CoffePulse97290"
                            target="new"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-7 w-7 fill-current">
                                <path
                                    d="M18.9 3H21l-4.58 5.24L21.8 21h-4.22l-3.31-4.74L10.1 21H8l4.89-5.59L7.8 3h4.28l2.99 4.29L18.9 3Zm-1.48 16.5h1.16L11.45 4.42h-1.24l7.21 15.08Z"
                                />
                            </svg>
                        </a>
                        <a
                            aria-label="Facebook"
                            class="flex h-14 w-14 items-center justify-center rounded-md border border-white text-cream transition-all hover:text-white"
                            href="https://www.facebook.com/profile.php?id=61576400781946"
                            target="new"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-7 w-7 fill-current">
                                <path
                                    d="M13.5 21v-7.13H16l.38-2.95H13.5V9.03c0-.86.24-1.44 1.46-1.44h1.56V4.95c-.27-.04-1.18-.11-2.25-.11-2.23 0-3.76 1.36-3.76 3.87v2.21H8v2.95h2.51V21h2.99Z"
                                />
                            </svg>
                        </a>
                        <a
                            aria-label="TikTok"
                            class="flex h-14 w-14 items-center justify-center rounded-md border border-white text-cream transition-all hover:text-white"
                            href="https://www.tiktok.com/@coffeepulseuganda"
                            target="new"
                        >
                            <svg viewBox="0 0 24 24" aria-hidden="true" class="h-7 w-7 fill-current">
                                <path
                                    d="M14.94 3c.19 1.67 1.12 3.3 2.53 4.29a6.16 6.16 0 0 0 3.58 1.13v3.05a9.08 9.08 0 0 1-3.27-.62v5.66c0 3.86-3.13 6.99-6.99 6.99a7 7 0 0 1 0-13.99c.29 0 .58.02.87.06v3.16a3.88 3.88 0 0 0-.87-.1 3.87 3.87 0 1 0 3.87 3.88V3h3.28Z"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center justify-between gap-6 border-t border-white/5 pt-12 md:flex-row">
                <div class="flex flex-wrap items-center justify-center gap-5 text-xs font-bold uppercase tracking-[0.25em] text-cream/75 md:justify-start">
                    <Link :href="route('policy.show')" class="transition-colors hover:text-white">Privacy Policy</Link>
                    <Link :href="route('contact')" class="transition-colors hover:text-white">Contact</Link>
                </div>
                <p class="text-sm font-bold uppercase tracking-wider text-cream/80">© 2026 Coffee Pulse Uganda. All rights reserved.</p>
            </div>
        </div>
    </footer>
</template>

<style scoped>
.serif {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
}

.bg-espresso {
    background-color: #3e2723;
}

.text-cream {
    color: #fdfbf7;
}
</style>
