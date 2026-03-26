<script setup>
import { ElNotification } from 'element-plus';
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const form = useForm({
    lot_name: '',
    origin: '',
    quality: '',
    process: '',
    quantity: '',
    notes: '',
});

const submit = () => {
    form.post(route('inventory.records.store'), {
        preserveScroll: true,
        onSuccess: () => {
            ElNotification({
                title: 'Inventory saved',
                message: 'The inventory lot was added successfully.',
                type: 'success',
                position: 'top-right',
            });

            form.reset('lot_name', 'origin', 'quality', 'process', 'quantity', 'notes');
        },
    });
};
</script>

<template>
    <AppLayout title="Add Inventory">
        <template #header>
            Add Inventory
        </template>

        <div class="grid gap-6 xl:grid-cols-[1.05fr_0.95fr]">
            <section class="rounded-[28px] bg-white p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#ece0dc] px-3 py-1 text-[11px] font-bold uppercase tracking-[0.22em] text-[#3e2723]">
                    Inventory Intake
                </span>
                <h1 class="mt-4 font-headline text-4xl font-bold leading-tight text-[#271310]">
                    Add a new inventory lot for sourcing and export tracking.
                </h1>
                <p class="mt-4 max-w-2xl text-base leading-7 text-[#655d5a]">
                    Capture the core details your team needs to manage live stock visibility, sample requests, and origin presentation inside the platform.
                </p>

                <div class="mt-8 grid gap-4 md:grid-cols-2">
                    <div class="rounded-2xl bg-[#faf9f5] p-5">
                        <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">Recommended details</p>
                        <p class="mt-3 text-sm leading-6 text-[#655d5a]">Use the export-facing lot name, origin area, process, quality score, and current quantity.</p>
                    </div>
                    <div class="rounded-2xl bg-[#faf9f5] p-5">
                        <p class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#655d5a]/70">Why it matters</p>
                        <p class="mt-3 text-sm leading-6 text-[#655d5a]">A clear intake form helps the team keep inventory, buyer communication, and sample fulfillment aligned.</p>
                    </div>
                </div>
            </section>

            <section class="rounded-[28px] bg-white p-8 shadow-sm">
                <form class="space-y-6" @submit.prevent="submit">
                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Lot Name</label>
                        <input
                            v-model="form.lot_name"
                            type="text"
                            placeholder="Mount Elgon Sipi Falls"
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        />
                        <p v-if="form.errors.lot_name" class="text-sm font-medium text-red-700">{{ form.errors.lot_name }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Origin</label>
                        <input
                            v-model="form.origin"
                            type="text"
                            placeholder="Kapchorwa Region"
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        />
                        <p v-if="form.errors.origin" class="text-sm font-medium text-red-700">{{ form.errors.origin }}</p>
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Quality</label>
                            <input
                                v-model="form.quality"
                                type="text"
                                placeholder="86.5 SCA"
                                class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                            />
                            <p v-if="form.errors.quality" class="text-sm font-medium text-red-700">{{ form.errors.quality }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Process</label>
                            <input
                                v-model="form.process"
                                type="text"
                                placeholder="Fully Washed"
                                class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                            />
                            <p v-if="form.errors.process" class="text-sm font-medium text-red-700">{{ form.errors.process }}</p>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Quantity</label>
                        <input
                            v-model="form.quantity"
                            type="text"
                            placeholder="12.5 Metric Tons"
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        />
                        <p v-if="form.errors.quantity" class="text-sm font-medium text-red-700">{{ form.errors.quantity }}</p>
                    </div>

                    <div class="space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Notes</label>
                        <textarea
                            v-model="form.notes"
                            rows="5"
                            placeholder="Internal notes for export readiness, cupping profile, or buyer matching..."
                            class="w-full rounded-2xl border border-[#b9aeac] bg-white px-4 py-4 text-sm text-[#271310] placeholder:text-[#655d5a]/45 focus:border-[#271310] focus:bg-white focus:ring-0"
                        ></textarea>
                        <p v-if="form.errors.notes" class="text-sm font-medium text-red-700">{{ form.errors.notes }}</p>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                        <p class="text-sm text-[#655d5a]">
                            Each saved lot becomes part of the inventory registry for the operations team.
                        </p>

                        <button
                            type="submit"
                            :disabled="form.processing"
                            class="inline-flex items-center gap-2 rounded-full bg-[#271310] px-6 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-70"
                        >
                            {{ form.processing ? 'Saving...' : 'Save Inventory' }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </AppLayout>
</template>
