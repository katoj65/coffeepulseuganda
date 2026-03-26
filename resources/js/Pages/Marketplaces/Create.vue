<script setup>
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    defaults: {
        type: Object,
        required: true,
    },
});

const form = useForm({ ...props.defaults });

const updateImage = (event) => {
    const [file] = event.target.files || [];
    form.image = file ?? null;
};

const submit = () => {
    form
        .transform((data) => ({
            ...data,
            is_active: Boolean(data.is_active),
            is_featured: Boolean(data.is_featured),
            sort_order: data.sort_order === '' || data.sort_order === null ? 0 : Number(data.sort_order),
        }))
        .post(route('marketplace.store'), {
            forceFormData: true,
            preserveScroll: true,
        });
};
</script>

<template>
    <AppLayout title="Create Market Place">
        <template #header>
            Create Market Place
        </template>

        <div class="space-y-6">
        

            <form class="space-y-6" @submit.prevent="submit">
                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Lot Details</h2>

                    <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <div class="space-y-2 md:col-span-2 xl:col-span-3">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Title</label>
                            <input v-model="form.title" type="text" placeholder="Rwenzori Natural Arabica" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.title" class="text-sm font-medium text-red-700">{{ form.errors.title }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Region</label>
                            <input v-model="form.region" type="text" placeholder="Rwenzori Mountains" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.region" class="text-sm font-medium text-red-700">{{ form.errors.region }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Variety</label>
                            <input v-model="form.variety" type="text" placeholder="SL14, SL28" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.variety" class="text-sm font-medium text-red-700">{{ form.errors.variety }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">SCA Score</label>
                            <input v-model="form.score" type="number" step="0.1" min="0" max="100" placeholder="87.5" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.score" class="text-sm font-medium text-red-700">{{ form.errors.score }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Altitude</label>
                            <input v-model="form.altitude" type="text" placeholder="1,850 - 2,100 masl" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.altitude" class="text-sm font-medium text-red-700">{{ form.errors.altitude }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Status</label>
                            <input v-model="form.status" type="text" placeholder="Open for requests" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.status" class="text-sm font-medium text-red-700">{{ form.errors.status }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Process</label>
                            <input v-model="form.process" type="text" placeholder="Natural" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.process" class="text-sm font-medium text-red-700">{{ form.errors.process }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Price</label>
                            <input v-model="form.price" type="number" step="0.01" min="0" placeholder="4.85" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:ring-0" />
                            <p v-if="form.errors.price" class="text-sm font-medium text-red-700">{{ form.errors.price }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Image Upload</label>
                            <input type="file" accept="image/*" class="w-full rounded-2xl border border-[#b9aeac] px-4 py-4 text-sm text-[#271310] file:mr-4 file:rounded-full file:border-0 file:bg-[#271310] file:px-4 file:py-2 file:text-sm file:font-bold file:text-white focus:border-[#271310] focus:ring-0" @change="updateImage" />
                            <p class="text-sm text-[#655d5a]">Upload a product image up to 5MB.</p>
                            <p v-if="form.errors.image" class="text-sm font-medium text-red-700">{{ form.errors.image }}</p>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Visibility</h2>

                    <div class="mt-6 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                        <label class="flex items-start gap-3 rounded-2xl bg-[#faf9f5] p-5">
                            <input v-model="form.is_active" type="checkbox" class="mt-1 h-4 w-4 rounded border-[#b9aeac] text-[#271310] focus:ring-[#271310]" />
                            <span>
                                <span class="block text-sm font-bold text-[#271310]">Publish on market place</span>
                                <span class="mt-1 block text-sm text-[#655d5a]">Show this lot on the public market place page immediately.</span>
                            </span>
                        </label>

                        <label class="flex items-start gap-3 rounded-2xl bg-[#faf9f5] p-5">
                            <input v-model="form.is_featured" type="checkbox" class="mt-1 h-4 w-4 rounded border-[#b9aeac] text-[#271310] focus:ring-[#271310]" />
                            <span>
                                <span class="block text-sm font-bold text-[#271310]">Feature this lot</span>
                                <span class="mt-1 block text-sm text-[#655d5a]">Place this lot higher in the public market place ordering.</span>
                            </span>
                        </label>

                    </div>
                </section>

                <div class="flex flex-wrap items-center justify-end gap-3">
                    <button
                        type="submit"
                        class="inline-flex items-center rounded-full bg-[#271310] px-6 py-3 text-sm font-bold text-white transition-opacity hover:opacity-90 disabled:cursor-not-allowed disabled:opacity-60"
                        :disabled="form.processing"
                    >
                        {{ form.processing ? 'Saving...' : 'Save market place lot' }}
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
