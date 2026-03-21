<script setup>
import { Head, Link } from '@inertiajs/vue3';
import headerLogo from '../../images/logo.png';
</script>

<template>
    <Head title="Our Protocol: The Foundation of Trust | Origin Protocol">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;500;700&family=Manrope:wght@300;400;500;600;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="protocol-page bg-[#faf9f5] text-[#271310] selection:bg-[#003508] selection:text-[#a3f69c]">
        <nav class="fixed top-0 z-50 w-full border-b border-[#eeeeea] bg-[#faf9f5]/80 backdrop-blur-md">
            <div class="container-custom flex items-center justify-between py-4">
                <Link :href="route('home')" class="flex items-center gap-3 text-xl font-bold uppercase tracking-widest text-[#271310]">
                    <img :src="headerLogo" alt="Coffee Pulse Uganda logo" class="h-10 w-10 rounded-full object-contain" />
                    <span class="serif">Origin Protocol</span>
                </Link>

                <div class="hidden items-center gap-8 font-medium tracking-tight md:flex">
                    <a class="border-b-2 border-[#271310] pb-1 text-[#271310]" href="#traceability">Traceability</a>
                    <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#quality">Quality</a>
                    <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#ethics">Ethics</a>
                    <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#governance">Governance</a>
                </div>

                <div class="flex items-center gap-4">
                    <button class="bg-[#271310] px-6 py-2 text-sm uppercase tracking-widest text-white transition-all hover:bg-opacity-90">
                        Connect Wallet
                    </button>
                    <Link :href="route('home')" class="hidden text-xs font-bold uppercase tracking-widest text-[#271310]/70 transition-colors hover:text-[#271310] md:block">
                        Back
                    </Link>
                </div>
            </div>
        </nav>

        <header class="pb-20 pt-40">
            <div class="container-custom">
                <div class="grid grid-cols-1 items-center gap-12 md:grid-cols-12">
                    <div class="md:col-span-7">
                        <p class="mb-6 text-xs uppercase tracking-[0.2em] text-[#6b6360]">Foundational Architecture</p>
                        <h1 class="serif mb-8 text-5xl font-bold leading-tight tracking-tight text-[#271310] md:text-6xl lg:text-7xl">
                            Our Protocol: <br />
                            The Foundation of Trust
                        </h1>
                        <p class="max-w-2xl text-xl font-light leading-relaxed text-[#655d5a]">
                            Bean Origin leverages decentralized ledger technology and rigorous ethical frameworks to redefine the global coffee trade. We transform the supply chain into a transparent, verifiable ecosystem.
                        </p>
                    </div>

                    <div class="md:col-span-5">
                        <div class="flex aspect-square flex-col justify-end border border-[#d3c3c0]/30 bg-[#f4f4f0] p-12">
                            <span class="material-symbols-outlined mb-6 text-5xl text-[#271310]">hub</span>
                            <h3 class="serif mb-3 text-2xl font-bold">Immutable</h3>
                            <p class="leading-relaxed text-[#655d5a]">Every bean, every transaction, locked in time. A permanent record for a sustainable future.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <section id="traceability" class="bg-[#f4f4f0] py-24">
            <div class="container-custom">
                <div class="mb-16 flex flex-col gap-4 md:flex-row md:items-baseline md:justify-between">
                    <h2 class="serif text-4xl font-bold text-[#271310]">Blockchain Verification</h2>
                    <span class="border-b border-[#56a554]/20 pb-1 text-sm uppercase tracking-widest text-[#56a554]">The Immutable Ledger</span>
                </div>

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                    <div class="flex flex-col justify-between border border-[#d3c3c0]/20 bg-white p-10 lg:col-span-2">
                        <div>
                            <div class="mb-10 flex gap-2">
                                <div class="h-2.5 w-2.5 rounded-full bg-[#001d03]"></div>
                                <div class="h-2.5 w-2.5 rounded-full bg-[#d3c3c0]/30"></div>
                                <div class="h-2.5 w-2.5 rounded-full bg-[#d3c3c0]/30"></div>
                            </div>
                            <h3 class="serif mb-6 text-3xl font-bold">Real-Time Integrity Verification</h3>
                            <p class="mb-12 max-w-2xl text-lg font-light leading-relaxed text-[#655d5a]">
                                Our private blockchain acts as a digital twin for physical shipments. From the moment a cherry is harvested to its arrival, every movement creates a cryptographic proof that cannot be altered.
                            </p>
                        </div>

                        <div class="grid grid-cols-3 gap-8 border-t border-[#eeeeea] pt-8">
                            <div>
                                <p class="mb-2 text-xs uppercase tracking-tighter text-[#6b6360]">Latency</p>
                                <p class="serif text-2xl font-bold">0.4s</p>
                            </div>
                            <div>
                                <p class="mb-2 text-xs uppercase tracking-tighter text-[#6b6360]">Nodes</p>
                                <p class="serif text-2xl font-bold">1,240+</p>
                            </div>
                            <div>
                                <p class="mb-2 text-xs uppercase tracking-tighter text-[#6b6360]">Hashing</p>
                                <p class="serif text-2xl font-bold">SHA-256</p>
                            </div>
                        </div>
                    </div>

                    <div class="relative flex flex-col justify-center overflow-hidden bg-[#271310] p-10 text-white">
                        <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 32px 32px;"></div>
                        <span class="material-symbols-outlined relative z-10 mb-8 text-6xl">verified</span>
                        <h3 class="serif relative z-10 mb-4 text-2xl font-bold">Origin Integrity</h3>
                        <p class="relative z-10 font-light leading-relaxed text-white/80">
                            Eliminating fraud in geographical indications through decentralized validator clusters at the farmgate, ensuring 100% provenance accuracy.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="quality" class="py-32">
            <div class="container-custom">
                <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-12">
                    <div class="relative lg:col-span-5">
                        <img
                            class="aspect-[4/5] w-full object-cover grayscale contrast-125"
                            alt="Close up of professional coffee cupping and grading session"
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuChW1oge2ONPjtzdumWI_z-bUzYba8F825T4de2HQQ8_pqmGpfwVv0PvAvIaTOztaRzCE4m3acydPSP6LLYvgFbnLW2yStfRYRrP66NjRNCLeebuzKOCNmDBGLtlQSPjuq0neoDgR2M34N6XLU4cvWWucmhycIhnBax0mJFg-DHXOYgZo55VHxJ5-wI2b_NNWgcschDNE_wDs3wmUV5-lJbT_m_tsZ_Fmx23ceDjpSGUEfKh-MUtMsp5AGDCToaSRVRFbuWdP9qTZM"
                        />
                        <div class="absolute bottom-0 right-0 translate-x-[-2rem] translate-y-8 bg-[#ece0dc] p-8">
                            <p class="serif text-4xl font-bold text-[#201a18]">87+</p>
                            <p class="text-xs uppercase tracking-widest text-[#6b6360]">SCA Protocol Threshold</p>
                        </div>
                    </div>

                    <div class="lg:col-span-7">
                        <h2 class="serif mb-8 text-5xl font-bold text-[#271310]">Quality &amp; Grading Protocol</h2>
                        <p class="mb-12 text-xl font-light leading-relaxed text-[#655d5a]">
                            We strictly adhere to Specialty Coffee Association (SCA) standards. Every batch processed through our protocol undergoes a rigorous dual-verification process.
                        </p>

                        <div class="grid gap-10">
                            <div class="flex items-start gap-8">
                                <span class="serif border-b-2 border-[#3e2723]/20 text-2xl font-bold text-[#3e2723]">01</span>
                                <div>
                                    <h4 class="mb-2 text-lg font-bold">Q-Grader Certification</h4>
                                    <p class="leading-relaxed text-[#655d5a]">Licensed Q-Graders analyze samples for defects, fragrance, and acidity before any digital batch is minted on-chain.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-8">
                                <span class="serif border-b-2 border-[#3e2723]/20 text-2xl font-bold text-[#3e2723]">02</span>
                                <div>
                                    <h4 class="mb-2 text-lg font-bold">Species-Specific Standards</h4>
                                    <p class="leading-relaxed text-[#655d5a]">Distinct sensory evaluation protocols tailored to Arabica and Robusta, ensuring fair market positioning for all producers.</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-8">
                                <span class="serif border-b-2 border-[#3e2723]/20 text-2xl font-bold text-[#3e2723]">03</span>
                                <div>
                                    <h4 class="mb-2 text-lg font-bold">Batch Verification</h4>
                                    <p class="leading-relaxed text-[#655d5a]">Final verification post-processing. Moisture content, screen size, and density analysis are permanently logged.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="ethics" class="bg-[#3e2723] py-24 text-white">
            <div class="container-custom">
                <div class="grid grid-cols-1 items-center gap-20 lg:grid-cols-2">
                    <div>
                        <h2 class="serif mb-8 text-4xl font-bold">Ethical Sourcing Framework</h2>
                        <p class="mb-12 text-lg font-light leading-relaxed text-white/80">
                            Our protocol mandates a 'Direct-to-Farmer' pricing model. By removing intermediaries, we ensure a minimum of 40% above market value goes directly to local cooperatives.
                        </p>

                        <div class="border border-[#88d982]/10 bg-[#003508] p-10">
                            <h4 class="mb-6 text-xs font-bold uppercase tracking-widest text-[#a3f69c]">Impact Report 2023</h4>
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <p class="serif mb-1 text-4xl font-bold text-[#a3f69c]">$3.42</p>
                                    <p class="text-[10px] uppercase tracking-widest text-[#a3f69c]/60">Avg. Price/lb to Farmer</p>
                                </div>
                                <div>
                                    <p class="serif mb-1 text-4xl font-bold text-[#a3f69c]">+22%</p>
                                    <p class="text-[10px] uppercase tracking-widest text-[#a3f69c]/60">Cooperative Growth</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="flex aspect-square items-center justify-center border border-white/5 bg-white/5 p-16">
                            <span class="material-symbols-outlined text-[10rem] text-[#88d982]/10">eco</span>
                            <div class="absolute inset-0 flex flex-col items-center justify-center p-12 text-center">
                                <h3 class="serif mb-6 text-4xl font-bold italic leading-snug">"Profitability follows transparency."</h3>
                                <div class="mb-6 h-px w-12 bg-[#88d982]/40"></div>
                                <p class="text-xs uppercase tracking-[0.3em] text-white/60">Sustainable Trade Mandate</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="governance" class="py-32">
            <div class="container-custom">
                <div class="mb-24 text-center">
                    <h2 class="serif mb-4 text-4xl font-bold text-[#271310]">Traceability in Action</h2>
                    <p class="mx-auto max-w-xl font-light text-[#3e2723]">The lifecycle of a Digital Batch from farmgate to final export clearance.</p>
                </div>

                <div class="relative">
                    <div class="absolute left-0 top-[2.5rem] z-0 hidden h-px w-full bg-[#e8e8e4] lg:block"></div>
                    <div class="relative z-10 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
                        <div class="border-x border-b border-[#e8e8e4] border-t-4 border-[#271310] bg-[#faf9f5] p-10 text-center">
                            <span class="material-symbols-outlined mb-6 text-4xl text-[#271310]">agriculture</span>
                            <h5 class="mb-3 text-lg font-bold">Harvest Registration</h5>
                            <p class="text-sm font-normal leading-relaxed text-[#3e2723]">Farm coordinates and cherry weight logged at collection point.</p>
                        </div>
                        <div class="border-x border-b border-[#e8e8e4] border-t-4 border-[#271310] bg-[#faf9f5] p-10 text-center">
                            <span class="material-symbols-outlined mb-6 text-4xl text-[#271310]">conveyor_belt</span>
                            <h5 class="mb-3 text-lg font-bold">Processing Proof</h5>
                            <p class="text-sm font-normal leading-relaxed text-[#3e2723]">Milling method (Washed/Natural) and moisture logs verified.</p>
                        </div>
                        <div class="border-x border-b border-[#e8e8e4] border-t-4 border-[#271310] bg-[#faf9f5] p-10 text-center">
                            <span class="material-symbols-outlined mb-6 text-4xl text-[#271310]">contract</span>
                            <h5 class="mb-3 text-lg font-bold">Smart Contract Mint</h5>
                            <p class="text-sm font-normal leading-relaxed text-[#3e2723]">Physical batch becomes a Digital Asset with SCA score attached.</p>
                        </div>
                        <div class="border-x border-b border-[#e8e8e4] border-t-4 border-[#271310] bg-[#faf9f5] p-10 text-center">
                            <span class="material-symbols-outlined mb-6 text-4xl text-[#271310]">fluid</span>
                            <h5 class="mb-3 text-lg font-bold">Export Clearance</h5>
                            <p class="text-sm font-normal leading-relaxed text-[#3e2723]">Shipping manifest and regulatory docs anchored to the ledger.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#e8e8e4] py-16">
            <div class="container-custom flex flex-col items-center gap-12 md:flex-row">
                <div class="md:w-1/3">
                    <h3 class="serif text-2xl font-bold text-[#271310]">Global Compliance Standards</h3>
                </div>
                <div class="grid w-full grid-cols-2 gap-8 md:w-2/3 lg:grid-cols-3">
                    <div class="group flex items-center gap-4">
                        <span class="material-symbols-outlined text-2xl text-[#001d03]">gavel</span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#655d5a]">EUDR Compliant</span>
                    </div>
                    <div class="group flex items-center gap-4">
                        <span class="material-symbols-outlined text-2xl text-[#001d03]">policy</span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#655d5a]">US C-TPAT</span>
                    </div>
                    <div class="group flex items-center gap-4">
                        <span class="material-symbols-outlined text-2xl text-[#001d03]">verified_user</span>
                        <span class="text-xs font-bold uppercase tracking-widest text-[#655d5a]">ISO 22000</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-[#faf9f5] py-32 text-center">
            <div class="container-custom">
                <div class="mx-auto max-w-3xl">
                    <h2 class="serif mb-10 text-5xl font-bold text-[#271310] md:text-6xl">Ready to transform your supply chain?</h2>
                    <div class="flex flex-col justify-center gap-6 sm:flex-row">
                        <Link :href="route('home')" class="bg-[#003508] px-12 py-5 text-xs font-bold uppercase tracking-widest text-white transition-colors hover:bg-[#88d982] hover:text-[#002204]">
                            Join the Exchange
                        </Link>
                        <button class="border-2 border-[#271310] px-12 py-5 text-xs font-bold uppercase tracking-widest text-[#271310] transition-colors hover:bg-[#271310] hover:text-white">
                            Whitepaper
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <footer class="border-t border-[#d3c3c0]/20 bg-[#e2e3df] py-16">
            <div class="container-custom">
                <div class="flex flex-col items-start justify-between gap-10 md:flex-row md:items-center">
                    <div class="flex flex-col gap-3">
                        <span class="text-xl font-black uppercase tracking-tighter text-[#271310]">Origin Protocol</span>
                        <p class="text-xs uppercase tracking-widest text-[#655d5a]">© 2024 Bean Origin Protocol. Built on Heritage &amp; Transparency.</p>
                    </div>

                    <div class="flex flex-wrap gap-x-10 gap-y-4 text-xs font-bold uppercase tracking-widest">
                        <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#traceability">Blockchain Explorer</a>
                        <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#quality">Smart Contracts</a>
                        <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#ethics">Impact Report</a>
                        <a class="text-[#271310]/60 transition-colors hover:text-[#271310]" href="#governance">Privacy</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
.protocol-page {
    font-family: 'Manrope', sans-serif;
    -webkit-font-smoothing: antialiased;
}

.serif {
    font-family: 'Noto Serif', serif;
}

.container-custom {
    max-width: 1320px;
    margin-left: auto;
    margin-right: auto;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
    vertical-align: middle;
}
</style>
