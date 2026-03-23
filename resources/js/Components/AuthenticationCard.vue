<template>
    <div class="auth-shell min-h-screen bg-[#f5efe8] text-[#271310]">
        <div class="mx-auto flex min-h-screen max-w-7xl items-center px-4 py-5 sm:px-6 lg:px-8">
            <div class="w-full overflow-hidden rounded-[2rem] bg-white">
                <div class="grid min-h-[720px] xl:grid-cols-[1fr_0.95fr]">
                    <section class="hidden bg-[#271310] p-5 text-[#f6f0ea] xl:flex xl:flex-col xl:justify-between xl:p-10">
                    <div class="space-y-8">
                        <slot name="logo" />

                        <div class="space-y-5">
                            <span class="inline-flex rounded-full bg-white/8 px-3 py-2 text-[11px] font-bold uppercase tracking-[0.22em] text-[#d9ead6]">
                                Coffee Trading Platform
                            </span>
                            <h1 class="font-headline text-4xl font-bold leading-tight xl:text-5xl">
                                Trade Ugandan coffee with clarity, confidence, and origin-level trust.
                            </h1>
                            <p class="max-w-xl text-base leading-8 text-[#e7d9cf]">
                                Access the sourcing dashboard, inventory workflows, sample operations, and traceability records that keep Coffee Pulse Uganda moving.
                            </p>
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-3">
                        <article class="rounded-[1.25rem] bg-white/8 p-4">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#d9ead6]/80">Origins</p>
                            <p class="mt-3 text-sm leading-6 text-[#f6f0ea]">Mt. Elgon, Rwenzori, West Nile, and the central robusta belt.</p>
                        </article>
                        <article class="rounded-[1.25rem] bg-white/8 p-4">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#d9ead6]/80">Protocol</p>
                            <p class="mt-3 text-sm leading-6 text-[#f6f0ea]">Traceability, export readiness, and buyer-facing confidence in one flow.</p>
                        </article>
                        <article class="rounded-[1.25rem] bg-white/8 p-4">
                            <p class="text-[11px] font-bold uppercase tracking-[0.2em] text-[#d9ead6]/80">Operations</p>
                            <p class="mt-3 text-sm leading-6 text-[#f6f0ea]">Samples, inventory, and notifications tuned for the daily trade cycle.</p>
                        </article>
                    </div>
                    </section>

                    <section class="flex items-center justify-center bg-[#fcfaf7] px-4 py-5 sm:px-6 lg:px-8">
                        <div class="w-full max-w-xl">
                        <div class="mb-8 xl:hidden">
                            <slot name="logo" />
                        </div>

                        <slot />
                    </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.auth-shell {
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
}

.font-headline {
    font-family: 'Noto Serif', serif;
}
</style>
