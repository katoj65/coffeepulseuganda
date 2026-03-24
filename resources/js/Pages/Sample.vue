<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';
import sampleImage from '../../images/image1.jpg';

const props = defineProps({
    sample: {
        type: Object,
        default: null,
    },
});

const sampleDetails = computed(() => ({
    title: props.sample?.item || 'Mount Elgon Sipi Falls Arabica',
    description: props.sample?.description || 'Precision in sampling is the bedrock of global coffee trade. Experience our meticulous terroir expression before securing your seasonal lot. Quality assurance, verified at origin.',
    image: props.sample?.image || sampleImage,
    amount: props.sample?.amount || 'Available on request',
    notes: props.sample?.notes || 'This lot is ready for buyer review, origin presentation, and sample dispatch coordination.',
    createdAt: props.sample?.created_at || 'Current Season',
    score: '87.5',
}));

const sampleForm = useForm({
    full_name: '',
    company: '',
    email: '',
    shipping_address: '',
    sample_type: 'Green Beans (200g)',
    special_requirements: '',
});

const submitSampleRequest = () => {
    sampleForm.post(route('sample.store'), {
        preserveScroll: true,
        onSuccess: () => sampleForm.reset('full_name', 'company', 'email', 'shipping_address', 'special_requirements'),
    });
};
</script>

<template>
    <Head title="Request a Sample | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Manrope:wght@400;500;600;700;800&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="sample-page bg-[#faf9f5] text-[#271310]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">About</Link>
                <Link :href="route('contact')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Contact</Link>
                <a :href="`${route('home')}#global-scale`" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Marketplace</a>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main class="pt-32">
            <section class="mx-auto mb-20 max-w-7xl px-8 text-center">
                <h1 class="mb-6 font-headline text-5xl font-bold tracking-tighter text-[#271310] md:text-7xl">
                    {{ sampleDetails.title }} <span class="font-normal italic">Sample</span>
                </h1>
                <p class="mx-auto max-w-2xl text-lg leading-relaxed text-[#655d5a] md:text-xl">
                    {{ sampleDetails.description }}
                </p>
            </section>

            <div class="mx-auto max-w-5xl px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
                    <div class="space-y-8 lg:col-span-5">
                        <div class="relative rounded bg-white p-8 shadow-[0_10px_40px_-15px_rgba(39,19,16,0.06)]">
                            <div class="absolute -right-4 -top-4 rounded bg-[#003508] px-4 py-2 text-xs font-bold uppercase tracking-widest text-[#a3f69c]">
                                SCA Score: {{ sampleDetails.score }}
                            </div>

                            <div class="mb-8 aspect-square w-full overflow-hidden rounded">
                                <img :src="sampleDetails.image" :alt="sampleDetails.title" class="h-full w-full object-cover" />
                            </div>

                            <div class="space-y-4">
                                <span class="rounded-full bg-[#ece0dc] px-3 py-1 text-[10px] font-bold uppercase tracking-[0.2em] text-[#271310]">
                                    Uganda • Sample Lot
                                </span>
                                <h2 class="font-headline text-2xl font-bold">{{ sampleDetails.title }}</h2>

                                <div class="grid grid-cols-2 gap-4 border-t border-[#d3c3c0]/20 py-4">
                                    <div>
                                        <p class="mb-1 text-[10px] uppercase tracking-widest text-[#655d5a]/60">Availability</p>
                                        <p class="text-sm font-semibold">{{ sampleDetails.amount }}</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-[10px] uppercase tracking-widest text-[#655d5a]/60">Available Lot</p>
                                        <p class="text-sm font-semibold">{{ sampleDetails.title }}</p>
                                    </div>
                                    <div>
                                        <p class="mb-1 text-[10px] uppercase tracking-widest text-[#655d5a]/60">Added</p>
                                        <p class="text-sm font-semibold">{{ sampleDetails.createdAt }}</p>
                                    </div>
                                </div>

                                <div class="rounded bg-[#faf9f5] p-4">
                                    <p class="mb-2 text-[10px] uppercase tracking-widest text-[#655d5a]/60">Lot Notes</p>
                                    <p class="text-sm leading-relaxed text-[#655d5a]">{{ sampleDetails.notes }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6 pt-4">
                            <div class="flex items-start gap-4 rounded-lg bg-[#f4f4f0] p-4 transition-transform hover:scale-[1.01]">
                                <span class="material-symbols-outlined text-2xl text-[#271310]">public</span>
                                <div>
                                    <h4 class="mb-1 text-sm font-bold uppercase tracking-wider">Global Shipping</h4>
                                    <p class="text-xs leading-relaxed text-[#655d5a]">Express logistics to Europe, North America, and Asia within 5-7 business days.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-lg bg-[#f4f4f0] p-4 transition-transform hover:scale-[1.01]">
                                <span class="material-symbols-outlined text-2xl text-[#271310]">verified</span>
                                <div>
                                    <h4 class="mb-1 text-sm font-bold uppercase tracking-wider">SCA Certified Quality</h4>
                                    <p class="text-xs leading-relaxed text-[#655d5a]">Every sample is graded by Q-Graders to ensure adherence to professional standards.</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-4 rounded-lg bg-[#f4f4f0] p-4 transition-transform hover:scale-[1.01]">
                                <span class="material-symbols-outlined text-2xl text-[#271310]">database</span>
                                <div>
                                    <h4 class="mb-1 text-sm font-bold uppercase tracking-wider">Blockchain Verified</h4>
                                    <p class="text-xs leading-relaxed text-[#655d5a]">Immutable transparency from the washing station to your cupping table.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sample-request" class="rounded bg-[#eeeeea] p-8 md:p-12 lg:col-span-7">
                        <form class="space-y-8" @submit.prevent="submitSampleRequest">
                            <div
                                v-if="sampleForm.recentlySuccessful"
                                class="rounded border border-[#56a554]/20 bg-[#56a554]/10 px-6 py-4 text-sm font-medium text-[#271310]"
                            >
                                Your sample request has been submitted successfully. Our team will review it shortly.
                            </div>

                            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Full Name</label>
                                    <input
                                        type="text"
                                        v-model="sampleForm.full_name"
                                        placeholder="John Doe"
                                        class="w-full rounded bg-white p-4 text-sm transition-all placeholder:text-[#655d5a]/30 focus:border-none focus:bg-white focus:ring-0"
                                    />
                                    <p v-if="sampleForm.errors.full_name" class="text-sm font-medium text-red-700">{{ sampleForm.errors.full_name }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Company</label>
                                    <input
                                        type="text"
                                        v-model="sampleForm.company"
                                        placeholder="Equatorial Roastery"
                                        class="w-full rounded bg-white p-4 text-sm transition-all placeholder:text-[#655d5a]/30 focus:border-none focus:bg-white focus:ring-0"
                                    />
                                    <p v-if="sampleForm.errors.company" class="text-sm font-medium text-red-700">{{ sampleForm.errors.company }}</p>
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Business Email</label>
                                <input
                                    type="email"
                                    v-model="sampleForm.email"
                                    placeholder="sourcing@company.com"
                                    class="w-full rounded bg-white p-4 text-sm transition-all placeholder:text-[#655d5a]/30 focus:border-none focus:bg-white focus:ring-0"
                                />
                                <p v-if="sampleForm.errors.email" class="text-sm font-medium text-red-700">{{ sampleForm.errors.email }}</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Shipping Address</label>
                                <textarea
                                    rows="3"
                                    v-model="sampleForm.shipping_address"
                                    placeholder="Street, City, ZIP, Country"
                                    class="w-full rounded bg-white p-4 text-sm transition-all placeholder:text-[#655d5a]/30 focus:border-none focus:bg-white focus:ring-0"
                                ></textarea>
                                <p v-if="sampleForm.errors.shipping_address" class="text-sm font-medium text-red-700">{{ sampleForm.errors.shipping_address }}</p>
                            </div>

                            <div class="space-y-4">
                                <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Sample Type</label>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="group relative flex cursor-pointer items-center gap-3 rounded bg-white p-4">
                                        <input
                                            v-model="sampleForm.sample_type"
                                            type="radio"
                                            name="sample_type"
                                            value="Green Beans (200g)"
                                            class="border-none bg-white text-[#001d03] focus:ring-0"
                                        />
                                        <span class="text-sm font-semibold text-[#271310]">Green Beans (200g)</span>
                                    </label>
                                    <label class="group relative flex cursor-pointer items-center gap-3 rounded bg-white p-4">
                                        <input
                                            v-model="sampleForm.sample_type"
                                            type="radio"
                                            name="sample_type"
                                            value="Roasted (100g)"
                                            class="border-none bg-white text-[#001d03] focus:ring-0"
                                        />
                                        <span class="text-sm font-semibold text-[#271310]">Roasted (100g)</span>
                                    </label>
                                </div>
                                <p v-if="sampleForm.errors.sample_type" class="text-sm font-medium text-red-700">{{ sampleForm.errors.sample_type }}</p>
                            </div>

                            <div class="space-y-2">
                                <label class="block text-[10px] font-extrabold uppercase tracking-[0.15em] text-[#271310]">Special Requirements</label>
                                <textarea
                                    rows="4"
                                    v-model="sampleForm.special_requirements"
                                    placeholder="Desired roast profile or specific cupping notes interest..."
                                    class="w-full rounded bg-white p-4 text-sm transition-all placeholder:text-[#655d5a]/30 focus:border-none focus:bg-white focus:ring-0"
                                ></textarea>
                                <p v-if="sampleForm.errors.special_requirements" class="text-sm font-medium text-red-700">{{ sampleForm.errors.special_requirements }}</p>
                                <div class="mt-1 h-[2px] w-full bg-[#003508]/10"></div>
                            </div>

                            <div class="pt-4">
                                <button
                                    type="submit"
                                    :disabled="sampleForm.processing"
                                    class="flex w-full items-center justify-center gap-3 bg-[#271310] py-5 text-xs font-bold uppercase tracking-[0.2em] text-white transition-all hover:scale-[1.01]"
                                >
                                    {{ sampleForm.processing ? 'Submitting Request...' : 'Submit Sample Request' }}
                                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </button>
                                <p class="mt-4 text-center text-[10px] uppercase tracking-widest italic text-[#655d5a]/50">
                                    Our logistics team will review and confirm your request within 24 hours.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <PublicFooter class="mt-40" />
    </div>
</template>

<style scoped>
.sample-page {
    font-family: 'Manrope', sans-serif;
}

.font-headline,
.font-serif {
    font-family: 'Noto Serif', serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
