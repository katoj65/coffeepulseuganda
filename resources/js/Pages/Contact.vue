<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ElNotification } from 'element-plus';
import PublicFooter from '../Components/PublicFooter.vue';
import PublicHeader from '../Components/PublicHeader.vue';

const contactCards = [
    {
        icon: 'payments',
        title: 'Global Trading',
        description: 'Expertise in B2B procurement, bulk green bean sourcing, and futures contracting for artisanal and commercial scales.',
    },
    {
        icon: 'local_shipping',
        title: 'Logistics & Export',
        description: 'Navigating international shipping, phytosanitary documentation, and origin-to-port supply chain transparency.',
    },
    {
        icon: 'handshake',
        title: 'Partnerships',
        description: 'Dedicated to co-op development and sustainability initiatives. Join our network of ethical heritage producers.',
    },
];

const officeAddress = 'Munyonyo, Ggaba road Kampala Uganda';

const phoneContacts = [
    {
        label: 'First Line',
        note: 'For general trade and sourcing conversations',
        value: '+256 788693298',
        href: 'tel:+256788693298',
    },
    {
        label: 'Second Line',
        note: 'For quick coordination and urgent follow-up',
        value: '+256 743618873',
        href: 'tel:+256743618873',
    },
];

const emailContacts = [
    {
        label: 'Email Address',
        note: 'For inquiries, logistics coordination, and general communication',
        value: 'info@coffeepulseuganda.com',
        href: 'mailto:info@coffeepulseuganda.com',
    },
];

const form = useForm({
    names: '',
    company: '',
    email: '',
    primary_interest: 'Mount Elgon (Arabica)',
    message: '',
});

const submitContact = () => {
    form.post(route('contact.store'), {
        preserveScroll: true,
        onSuccess: () => {
            ElNotification({
                title: 'Inquiry sent',
                message: 'Your message has been sent successfully.',
                type: 'success',
            });

            form.reset();
            form.primary_interest = 'Mount Elgon (Arabica)';
        },
    });
};
</script>

<template>
    <Head title="Contact | Coffee Pulse Uganda">
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="anonymous" />
        <link
            href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Noto+Serif:ital,wght@0,400;0,700;1,400&family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
            rel="stylesheet"
        />
    </Head>

    <div class="bg-[#faf9f5] font-body text-[#1a1c1a] selection:bg-[#ece0dc] selection:text-[#271310]">
        <PublicHeader>
            <template #nav>
                <Link :href="route('about')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">About</Link>
                <Link :href="route('contact')" class="text-sm font-semibold uppercase tracking-wider text-[#3e2723]">Contact</Link>
                <a class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]" href="#global-scale">Marketplace</a>
                <Link :href="route('sustainability')" class="nav-link text-sm font-semibold uppercase tracking-wider text-[#6b6360]">Sustainability</Link>
            </template>
        </PublicHeader>

        <main class="mx-auto max-w-7xl px-6 lg:px-12">
            <section class="hero-pattern flex flex-col items-center py-20 text-center lg:py-32">
                <span class="mb-6 font-label text-xs uppercase tracking-[0.3em] text-[#504442]">Connect With Us</span>
                <h1 class="mb-8 max-w-4xl font-headline text-4xl leading-tight text-[#271310] md:text-6xl">
                    Contact Our <span class="italic">Global Trade Desk</span>
                </h1>
                <p class="max-w-2xl text-lg leading-relaxed text-[#655d5a]">
                    Facilitating direct channels between Uganda's finest estates and the world’s most discerning roasters. Our logistics and trade experts are ready to assist your procurement needs.
                </p>
            </section>

            <section class="pb-24">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                    <div
                        v-for="card in contactCards"
                        :key="card.title"
                        class="flex flex-col items-start bg-[#f4f4f0] p-10 transition-all hover:-translate-y-1"
                    >
                        <div class="mb-8 flex h-12 w-12 items-center justify-center rounded-full bg-[#ece0dc]">
                            <span class="material-symbols-outlined text-[#271310]">{{ card.icon }}</span>
                        </div>
                        <h3 class="mb-4 font-headline text-xl text-[#271310]">{{ card.title }}</h3>
                        <p class="mb-6 leading-relaxed text-[#655d5a]">{{ card.description }}</p>

                    </div>
                </div>
            </section>

            <section class="pb-24">
                <div class="mx-auto max-w-6xl">
                    <div class="mb-10 max-w-2xl">
                        <p class="font-label text-xs font-bold uppercase tracking-[0.22em] text-[#655d5a]">Contact Details</p>
                        <h2 class="mt-3 font-headline text-3xl font-bold leading-tight text-[#271310] md:text-[2.2rem]">Get in touch with our team.</h2>
                        <p class="mt-3 text-sm leading-7 text-[#655d5a] md:text-base">
                            Reach our team for trade inquiries, logistics coordination, and office visits through the contact details below.
                        </p>
                    </div>

                    <div class="grid gap-5 md:grid-cols-3">
                        <div class="rounded-3xl bg-white px-6 py-7 shadow-sm shadow-[#271310]/[0.05]">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4f1ec] text-[#271310]">
                                    <span class="material-symbols-outlined text-[22px]">call</span>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-[#271310]">Phone</p>
                                    <p class="text-sm text-[#655d5a]">Call or message our team directly.</p>
                                </div>
                            </div>
                            <div class="mt-6 space-y-4">
                                <a
                                    v-for="phone in phoneContacts"
                                    :key="phone.label"
                                    :href="phone.href"
                                    class="block rounded-2xl bg-[#faf9f5] px-4 py-4 transition-colors hover:bg-[#f4f1ec]"
                                >
                                    <p class="text-sm font-bold text-[#655d5a]">{{ phone.label }}</p>
                                    <p class="mt-2 text-lg font-semibold leading-7 text-[#271310]">{{ phone.value }}</p>
                                    <p class="mt-2 text-sm leading-6 text-[#655d5a]">{{ phone.note }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="rounded-3xl bg-white px-6 py-7 shadow-sm shadow-[#271310]/[0.05]">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#f4f1ec] text-[#271310]">
                                    <span class="material-symbols-outlined text-[22px]">mail</span>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-[#271310]">Email</p>
                                    <p class="text-sm text-[#655d5a]">Send detailed requests and documents.</p>
                                </div>
                            </div>
                            <div class="mt-6 space-y-4">
                                <a
                                    v-for="emailContact in emailContacts"
                                    :key="emailContact.label"
                                    :href="emailContact.href"
                                    class="block rounded-2xl bg-[#faf9f5] px-4 py-4 transition-colors hover:bg-[#f4f1ec]"
                                >
                                    <p class="text-sm font-bold text-[#655d5a]">{{ emailContact.label }}</p>
                                    <p class="mt-2 break-all text-base font-semibold leading-7 text-[#271310]">{{ emailContact.value }}</p>
                                    <p class="mt-2 text-sm leading-6 text-[#655d5a]">{{ emailContact.note }}</p>
                                </a>
                            </div>
                        </div>

                        <div class="rounded-3xl bg-[#f4f1ec] px-6 py-7 shadow-sm shadow-[#271310]/[0.04]">
                            <div class="flex items-center gap-3">
                                <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-white text-[#271310]">
                                    <span class="material-symbols-outlined text-[22px]">location_on</span>
                                </div>
                                <div>
                                    <p class="text-lg font-bold text-[#271310]">Address</p>
                                    <p class="text-sm text-[#655d5a]">Visit our Kampala office.</p>
                                </div>
                            </div>
                            <div class="mt-6 rounded-2xl bg-white/75 px-4 py-4">
                                <p class="text-lg font-bold leading-7 text-[#271310]">Coffee Pulse Uganda</p>
                                <p class="mt-3 text-base leading-7 text-[#271310]">{{ officeAddress }}</p>
                            </div>
                            <div class="mt-4 rounded-2xl bg-white/55 px-4 py-4">
                                <p class="text-sm font-bold text-[#655d5a]">Office Hours</p>
                                <p class="mt-2 text-sm leading-6 text-[#271310]">Monday to Friday, 8:00 AM to 6:00 PM EAT</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-5 mb-16 border-y border-[#d3c3c0]/10 bg-white py-24">
                <div class="mx-auto max-w-3xl">
                    <div class="mb-16 text-center">
                        <h2 class="mb-4 font-headline text-3xl text-[#271310]">Direct Inquiry</h2>
                        <p class="text-[#655d5a]">Please fill out the form below and a trade representative will respond within 24 business hours.</p>
                    </div>

                    <form class="space-y-8" @submit.prevent="submitContact">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <div class="space-y-2">
                                <label class="font-label text-xs uppercase tracking-widest text-[#504442]">Full Name</label>
                                <input
                                    v-model="form.names"
                                    type="text"
                                    placeholder="Alexander Thorne"
                                    class="w-full border-none bg-[#e8e8e4] p-4 text-[#271310] focus:ring-2 focus:ring-[#001d03]/20"
                                />
                                <p v-if="form.errors.names" class="text-sm text-[#93000a]">{{ form.errors.names }}</p>
                            </div>

                            <div class="space-y-2">
                                <label class="font-label text-xs uppercase tracking-widest text-[#504442]">Company / Roastery</label>
                                <input
                                    v-model="form.company"
                                    type="text"
                                    placeholder="Heritage Brews Co."
                                    class="w-full border-none bg-[#e8e8e4] p-4 text-[#271310] focus:ring-2 focus:ring-[#001d03]/20"
                                />
                                <p v-if="form.errors.company" class="text-sm text-[#93000a]">{{ form.errors.company }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="font-label text-xs uppercase tracking-widest text-[#504442]">Email Address</label>
                            <input
                                v-model="form.email"
                                type="email"
                                placeholder="trade@example.com"
                                class="w-full border-none bg-[#e8e8e4] p-4 text-[#271310] focus:ring-2 focus:ring-[#001d03]/20"
                            />
                            <p v-if="form.errors.email" class="text-sm text-[#93000a]">{{ form.errors.email }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="font-label text-xs uppercase tracking-widest text-[#504442]">Sourcing Region Interest</label>
                            <select
                                v-model="form.primary_interest"
                                class="w-full appearance-none border-none bg-[#e8e8e4] p-4 text-[#271310] focus:ring-2 focus:ring-[#001d03]/20"
                            >
                                <option>Mount Elgon (Arabica)</option>
                                <option>Rwenzori Mountains (Highland Arabica)</option>
                                <option>Greater Masaka (Robusta Heritage)</option>
                                <option>West Nile Region</option>
                                <option>General Portfolio Inquiry</option>
                            </select>
                            <p v-if="form.errors.primary_interest" class="text-sm text-[#93000a]">{{ form.errors.primary_interest }}</p>
                        </div>







                        <div class="space-y-2">
                            <label class="font-label text-xs uppercase tracking-widest text-[#504442]">Your Message</label>
                            <textarea
                                v-model="form.message"
                                rows="5"
                                placeholder="Detail your sourcing requirements..."
                                class="w-full border-none bg-[#e8e8e4] p-4 text-[#271310] focus:ring-2 focus:ring-[#001d03]/20"
                            ></textarea>
                            <p v-if="form.errors.message" class="text-sm text-[#93000a]">{{ form.errors.message }}</p>
                        </div>

                        <div class="pt-4">
                            <button
                                type="submit"
                                :disabled="form.processing"
                                class="w-full bg-[#271310] py-5 text-on-primary font-bold uppercase tracking-widest text-white shadow-lg shadow-[#271310]/5 transition-colors hover:bg-[#3e2723] disabled:cursor-not-allowed disabled:opacity-70"
                            >
                                {{ form.processing ? 'Submitting Inquiry...' : 'Submit Trade Inquiry' }}
                            </button>
                        </div>
                    </form>
                </div>
            </section>

        </main>

        <PublicFooter />
    </div>
</template>

<style scoped>
.hero-pattern {
    background-color: #faf9f5;
    background-image: radial-gradient(#ece0dc 0.5px, transparent 0.5px);
    background-size: 24px 24px;
}

.font-body {
    font-family: 'Manrope', sans-serif;
}

.font-headline {
    font-family: 'Noto Serif', serif;
}

.font-label {
    font-family: 'Manrope', sans-serif;
}

.material-symbols-outlined {
    font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
}
</style>
