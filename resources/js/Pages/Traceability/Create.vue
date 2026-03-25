<script setup>
import { ElNotification } from 'element-plus';
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue';

const props = defineProps({
    defaults: {
        type: Object,
        required: true,
    },
});

const cloneDefaults = () => JSON.parse(JSON.stringify(props.defaults));

const form = useForm(cloneDefaults());

const getError = (path) => form.errors[path];

const addItem = (field, item) => {
    form[field].push(item);
};

const removeItem = (field, index) => {
    if (form[field].length > 1) {
        form[field].splice(index, 1);
    }
};

const newBadge = () => ({ icon: '', label: '', classes: '' });
const newImpactCard = () => ({ icon: '', title: '', value: '' });
const newJourneyStep = () => ({ icon: '', title: '', value: '' });
const newEstateDetail = () => ({ label: '', value: '' });
const newProcessDetail = () => ({ label: '', value: '' });
const newSensoryProfile = () => ({ icon: '', label: '', filled: 3 });

const submit = () => {
    form.post(route('traceability.store'), {
        preserveScroll: true,
        onSuccess: () => {
            ElNotification({
                title: 'Traceability created',
                message: 'The traceability record was created successfully.',
                type: 'success',
                position: 'top-right',
            });
        },
    });
};
</script>

<template>
    <AppLayout title="Create Traceability">
        <template #header>
            Create Traceability
        </template>

        <div class="space-y-6">
            <section class="rounded-[28px] bg-white p-8 shadow-sm">
                <span class="inline-flex rounded-full bg-[#ece0dc] px-3 py-1 text-[11px] font-bold uppercase tracking-[0.22em] text-[#3e2723]">
                    Traceability Authoring
                </span>
                <h1 class="mt-4 font-headline text-4xl font-bold leading-tight text-[#271310]">
                    Build the full batch passport record.
                </h1>
                <p class="mt-4 max-w-3xl text-base leading-7 text-[#655d5a]">
                    This form now covers every field in the traceability table, including badges, impact cards, journey steps, estate details, process details, sensory profile, and blockchain metadata.
                </p>
            </section>

            <form class="space-y-6" @submit.prevent="submit">
                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Core Identity</h2>
                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Batch Code</label>
                            <input v-model="form.batch" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm uppercase tracking-[0.12em] text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('batch')" class="text-sm font-medium text-red-700">{{ getError('batch') }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Issuer</label>
                            <input v-model="form.issuer" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('issuer')" class="text-sm font-medium text-red-700">{{ getError('issuer') }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Variety</label>
                            <input v-model="form.variety" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('variety')" class="text-sm font-medium text-red-700">{{ getError('variety') }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Origin</label>
                            <input v-model="form.origin" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('origin')" class="text-sm font-medium text-red-700">{{ getError('origin') }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">SCA Score</label>
                            <input v-model="form.score" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('score')" class="text-sm font-medium text-red-700">{{ getError('score') }}</p>
                        </div>

                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Grade</label>
                            <input v-model="form.grade" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm text-[#271310] focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('grade')" class="text-sm font-medium text-red-700">{{ getError('grade') }}</p>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Badges</h2>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('badges', newBadge())">Add Badge</button>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div v-for="(badge, index) in form.badges" :key="`badge-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Badge {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('badges', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Icon</label>
                                    <input v-model="badge.icon" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`badges.${index}.icon`)" class="text-sm font-medium text-red-700">{{ getError(`badges.${index}.icon`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Label</label>
                                    <input v-model="badge.label" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`badges.${index}.label`)" class="text-sm font-medium text-red-700">{{ getError(`badges.${index}.label`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">CSS Classes</label>
                                    <input v-model="badge.classes" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`badges.${index}.classes`)" class="text-sm font-medium text-red-700">{{ getError(`badges.${index}.classes`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Impact Cards</h2>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('impact_cards', newImpactCard())">Add Impact Card</button>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div v-for="(card, index) in form.impact_cards" :key="`impact-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Impact Card {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('impact_cards', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Icon</label>
                                    <input v-model="card.icon" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`impact_cards.${index}.icon`)" class="text-sm font-medium text-red-700">{{ getError(`impact_cards.${index}.icon`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Title</label>
                                    <input v-model="card.title" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`impact_cards.${index}.title`)" class="text-sm font-medium text-red-700">{{ getError(`impact_cards.${index}.title`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Value</label>
                                    <input v-model="card.value" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`impact_cards.${index}.value`)" class="text-sm font-medium text-red-700">{{ getError(`impact_cards.${index}.value`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="font-headline text-2xl font-bold text-[#271310]">Journey Steps</h2>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('journey_steps', newJourneyStep())">Add Step</button>
                    </div>
                    <div class="mt-6 space-y-4">
                        <div v-for="(step, index) in form.journey_steps" :key="`step-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Journey Step {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('journey_steps', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Icon</label>
                                    <input v-model="step.icon" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`journey_steps.${index}.icon`)" class="text-sm font-medium text-red-700">{{ getError(`journey_steps.${index}.icon`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Title</label>
                                    <input v-model="step.title" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`journey_steps.${index}.title`)" class="text-sm font-medium text-red-700">{{ getError(`journey_steps.${index}.title`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Value</label>
                                    <input v-model="step.value" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`journey_steps.${index}.value`)" class="text-sm font-medium text-red-700">{{ getError(`journey_steps.${index}.value`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Estate Profile</h2>
                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Eyebrow</label>
                            <input v-model="form.estate_eyebrow" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('estate_eyebrow')" class="text-sm font-medium text-red-700">{{ getError('estate_eyebrow') }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Estate Title</label>
                            <input v-model="form.estate_title" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('estate_title')" class="text-sm font-medium text-red-700">{{ getError('estate_title') }}</p>
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Estate Description</label>
                            <textarea v-model="form.estate_description" rows="5" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0"></textarea>
                            <p v-if="getError('estate_description')" class="text-sm font-medium text-red-700">{{ getError('estate_description') }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Farmer Image URL</label>
                            <input v-model="form.farmer_image" type="url" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('farmer_image')" class="text-sm font-medium text-red-700">{{ getError('farmer_image') }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Farmer Name</label>
                            <input v-model="form.farmer_name" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('farmer_name')" class="text-sm font-medium text-red-700">{{ getError('farmer_name') }}</p>
                        </div>
                        <div class="space-y-2 md:col-span-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Farmer Role</label>
                            <input v-model="form.farmer_role" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('farmer_role')" class="text-sm font-medium text-red-700">{{ getError('farmer_role') }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between gap-4">
                        <h3 class="font-headline text-xl font-bold text-[#271310]">Estate Details</h3>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('estate_details', newEstateDetail())">Add Detail</button>
                    </div>
                    <div class="mt-4 space-y-4">
                        <div v-for="(detail, index) in form.estate_details" :key="`estate-detail-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Estate Detail {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('estate_details', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Label</label>
                                    <input v-model="detail.label" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`estate_details.${index}.label`)" class="text-sm font-medium text-red-700">{{ getError(`estate_details.${index}.label`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Value</label>
                                    <input v-model="detail.value" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`estate_details.${index}.value`)" class="text-sm font-medium text-red-700">{{ getError(`estate_details.${index}.value`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Process Architecture</h2>
                    <div class="mt-6 grid gap-6 md:grid-cols-2">
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Eyebrow</label>
                            <input v-model="form.process_eyebrow" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('process_eyebrow')" class="text-sm font-medium text-red-700">{{ getError('process_eyebrow') }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Process Title</label>
                            <input v-model="form.process_title" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('process_title')" class="text-sm font-medium text-red-700">{{ getError('process_title') }}</p>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between gap-4">
                        <h3 class="font-headline text-xl font-bold text-[#271310]">Process Details</h3>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('process_details', newProcessDetail())">Add Process Detail</button>
                    </div>
                    <div class="mt-4 space-y-4">
                        <div v-for="(detail, index) in form.process_details" :key="`process-detail-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Process Detail {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('process_details', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-2">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Label</label>
                                    <input v-model="detail.label" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`process_details.${index}.label`)" class="text-sm font-medium text-red-700">{{ getError(`process_details.${index}.label`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Value</label>
                                    <input v-model="detail.value" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`process_details.${index}.value`)" class="text-sm font-medium text-red-700">{{ getError(`process_details.${index}.value`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex items-center justify-between gap-4">
                        <h3 class="font-headline text-xl font-bold text-[#271310]">Sensory Profile</h3>
                        <button type="button" class="rounded-full bg-[#271310] px-4 py-2 text-xs font-bold text-white" @click="addItem('sensory_profile', newSensoryProfile())">Add Sensory Item</button>
                    </div>
                    <div class="mt-4 space-y-4">
                        <div v-for="(item, index) in form.sensory_profile" :key="`sensory-${index}`" class="rounded-2xl bg-[#faf9f5] p-5">
                            <div class="mb-4 flex items-center justify-between">
                                <p class="text-sm font-bold text-[#271310]">Sensory Item {{ index + 1 }}</p>
                                <button type="button" class="text-xs font-bold text-[#93000a]" @click="removeItem('sensory_profile', index)">Remove</button>
                            </div>
                            <div class="grid gap-4 md:grid-cols-3">
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Icon</label>
                                    <input v-model="item.icon" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`sensory_profile.${index}.icon`)" class="text-sm font-medium text-red-700">{{ getError(`sensory_profile.${index}.icon`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Label</label>
                                    <input v-model="item.label" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`sensory_profile.${index}.label`)" class="text-sm font-medium text-red-700">{{ getError(`sensory_profile.${index}.label`) }}</p>
                                </div>
                                <div class="space-y-2">
                                    <label class="block text-[10px] font-bold uppercase tracking-widest text-[#271310]">Filled Level</label>
                                    <input v-model.number="item.filled" type="number" min="1" max="5" class="w-full rounded-2xl border border-[#827472] px-4 py-3 text-sm focus:border-[#271310] focus:ring-0" />
                                    <p v-if="getError(`sensory_profile.${index}.filled`)" class="text-sm font-medium text-red-700">{{ getError(`sensory_profile.${index}.filled`) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 space-y-2">
                        <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Process Note</label>
                        <textarea v-model="form.process_note" rows="4" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0"></textarea>
                        <p v-if="getError('process_note')" class="text-sm font-medium text-red-700">{{ getError('process_note') }}</p>
                    </div>
                </section>

                <section class="rounded-[28px] bg-white p-8 shadow-sm">
                    <h2 class="font-headline text-2xl font-bold text-[#271310]">Blockchain</h2>
                    <div class="mt-6 grid gap-6">
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Hash</label>
                            <input v-model="form.blockchain_hash" type="text" class="w-full rounded-2xl border border-[#827472] px-4 py-4 font-mono text-sm focus:border-[#271310] focus:ring-0" />
                            <p v-if="getError('blockchain_hash')" class="text-sm font-medium text-red-700">{{ getError('blockchain_hash') }}</p>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]">Description</label>
                            <textarea v-model="form.blockchain_description" rows="5" class="w-full rounded-2xl border border-[#827472] px-4 py-4 text-sm focus:border-[#271310] focus:ring-0"></textarea>
                            <p v-if="getError('blockchain_description')" class="text-sm font-medium text-red-700">{{ getError('blockchain_description') }}</p>
                        </div>
                    </div>
                </section>

                <div class="flex flex-wrap items-center justify-between gap-4 rounded-[28px] bg-white p-8 shadow-sm">
                    <p class="max-w-2xl text-sm leading-6 text-[#655d5a]">
                        Validation now matches the full traceability schema. Every required array section must have at least one complete item before the record can be stored.
                    </p>

                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="inline-flex items-center gap-2 rounded-full bg-[#271310] px-6 py-3 text-sm font-bold text-white transition-transform hover:scale-[1.02] disabled:cursor-not-allowed disabled:opacity-70"
                    >
                        <span class="material-symbols-outlined text-[18px]">save</span>
                        {{ form.processing ? 'Saving...' : 'Create Traceability' }}
                    </button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
