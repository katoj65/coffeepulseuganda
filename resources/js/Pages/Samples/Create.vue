<script setup>
import { onBeforeUnmount, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { ElNotification } from 'element-plus';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
    item: '',
    description: '',
    amount: '',
    notes: '',
    image: null,
});

const imageInput = ref(null);
const imagePreviewUrl = ref(null);

const setImagePreview = (file) => {
    if (imagePreviewUrl.value) {
        URL.revokeObjectURL(imagePreviewUrl.value);
    }

    imagePreviewUrl.value = file ? URL.createObjectURL(file) : null;
};

const handleImageChange = (event) => {
    const file = event.target.files?.[0] ?? null;

    form.image = file;
    setImagePreview(file);
};

const submit = () => {
    form.post(route('samples.records.store'), {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            ElNotification({
                title: 'Sample saved',
                message: 'The sample was added successfully.',
                type: 'success',
                position: 'top-right',
            });

            form.reset('item', 'description', 'amount', 'notes', 'image');
            setImagePreview(null);

            if (imageInput.value) {
                imageInput.value.value = '';
            }
        },
    });
};

onBeforeUnmount(() => {
    if (imagePreviewUrl.value) {
        URL.revokeObjectURL(imagePreviewUrl.value);
    }
});
</script>

<template>
    <AppLayout title="Add Sample">
        <template #header>
            Add Sample
        </template>

        <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
            <section class="rounded-[28px] bg-white p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#ece0dc] px-3 py-1 text-[11px] font-bold uppercase tracking-[0.22em] text-[#3e2723]">
                    Sample Registry
                </span>
                <h1 class="mt-4 font-headline text-4xl font-bold leading-tight text-[#271310]">
                    Add a new sample lot for the team to track and share.
                </h1>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#655d5a]">
                    Register a new sample in the database so inventory, logistics, and buyer follow-up can reference the same record inside the app.
                </p>

                <div class="mt-8 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl bg-[#faf9f5] p-5">
                        <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">What to include</p>
                        <p class="mt-3 text-sm leading-6 text-[#655d5a]">Use the lot or sample name buyers will recognize, plus a concise description and current status.</p>
                    </div>
                    <div class="rounded-2xl bg-[#faf9f5] p-5">
                        <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">How it helps</p>
                        <p class="mt-3 text-sm leading-6 text-[#655d5a]">This record gives the operations team a single source of truth for sample availability and tracking.</p>
                    </div>
                </div>
            </section>

            <section class="rounded-[28px] bg-white p-8 shadow-sm">
                <form class="space-y-6" @submit.prevent="submit">
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Sample Item</label>
                        <input
                            v-model="form.item"
                            type="text"
                            placeholder="Mount Elgon AA Micro Lot"
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        />
                        <p v-if="form.errors.item" class="text-sm font-medium text-red-700">{{ form.errors.item }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Description</label>
                        <input
                            v-model="form.description"
                            type="text"
                            placeholder="Washed Arabica from Kapchorwa, 86.5 SCA"
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        />
                        <p v-if="form.errors.description" class="text-sm font-medium text-red-700">{{ form.errors.description }}</p>
                    </div>

                    <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Amount</label>
                            <input
                                v-model="form.amount"
                                type="text"
                                placeholder="24 bags / 200g kits"
                                class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                            />
                            <p v-if="form.errors.amount" class="text-sm font-medium text-red-700">{{ form.errors.amount }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Image</label>
                        <div class="rounded-2xl border border-dashed border-[#b9aeac] bg-white p-4">
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm font-semibold text-[#271310]">
                                        {{ form.image?.name ?? 'No image selected' }}
                                    </p>
                                    <p class="mt-1 text-xs text-[#655d5a]">Required. Upload JPG, PNG, GIF, SVG, or WebP up to 5 MB.</p>
                                </div>
                                <label class="inline-flex cursor-pointer items-center gap-2 rounded-full bg-[#271310] px-5 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02]">
                                    <span class="material-symbols-outlined text-[18px]">upload</span>
                                    Upload Image
                                    <input
                                        ref="imageInput"
                                        type="file"
                                        accept="image/*"
                                        class="hidden"
                                        @change="handleImageChange"
                                    />
                                </label>
                            </div>

                            <div v-if="imagePreviewUrl" class="mt-4 overflow-hidden rounded-2xl border border-[#b9aeac] bg-white">
                                <img :src="imagePreviewUrl" alt="Selected sample preview" class="h-48 w-full object-cover" />
                            </div>
                        </div>
                        <p v-if="form.errors.image" class="text-sm font-medium text-red-700">{{ form.errors.image }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Notes</label>
                        <textarea
                            v-model="form.notes"
                            rows="5"
                            placeholder="Required internal notes for storage, dispatch, or buyer matching..."
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        ></textarea>
                        <p v-if="form.errors.notes" class="text-sm font-medium text-red-700">{{ form.errors.notes }}</p>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center gap-2 rounded-full bg-[#271310] px-6 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-70"
                        >
                            <span class="material-symbols-outlined text-[18px]">save</span>
                            {{ form.processing ? 'Saving...' : 'Save Sample' }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </AppLayout>
</template>
