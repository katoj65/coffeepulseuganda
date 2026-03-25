<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    terms: false,
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="space-y-8">
            <div class="space-y-4">
                <span class="inline-flex rounded-full bg-[#f8f2ec] px-3 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#3e2723]">
                    Create Account
                </span>
                <div>
                    <h2 class="font-headline text-3xl font-bold leading-tight text-[#271310] sm:text-4xl">
                        Join the Coffee Pulse operations platform.
                    </h2>
                    <p class="mt-3 text-base leading-7 text-[#655d5a]">
                        Set up your account to access sourcing tools, inventory insights, sample coordination, and trade-ready traceability workflows.
                    </p>
                </div>
            </div>

            <form class="space-y-6" @submit.prevent="submit">
                <div class="space-y-2">
                    <InputLabel for="name" value="Full Name" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Your full name"
                    />
                    <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.name" />
                </div>

                <div class="space-y-2">
                    <InputLabel for="email" value="Business Email" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                        required
                        autocomplete="username"
                        placeholder="name@company.com"
                    />
                    <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.email" />
                </div>

                <div class="grid gap-6 sm:grid-cols-2">
                    <div class="space-y-2">
                        <InputLabel for="password" value="Password" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                        <TextInput
                            id="password"
                            v-model="form.password"
                            type="password"
                            class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                            required
                            autocomplete="new-password"
                            placeholder="Create password"
                        />
                        <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.password" />
                    </div>

                    <div class="space-y-2">
                        <InputLabel for="password_confirmation" value="Confirm Password" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                        <TextInput
                            id="password_confirmation"
                            v-model="form.password_confirmation"
                            type="password"
                            class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                            required
                            autocomplete="new-password"
                            placeholder="Repeat password"
                        />
                        <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.password_confirmation" />
                    </div>
                </div>

                <div v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature" class="rounded-[1.25rem] bg-[#faf5ef] p-4">
                    <InputLabel for="terms">
                        <div class="flex items-start gap-3">
                            <Checkbox
                                id="terms"
                                v-model:checked="form.terms"
                                name="terms"
                                required
                                class="mt-1 rounded border-[#827472] text-[#271310] shadow-none focus:ring-0"
                            />

                            <div class="text-sm leading-6 text-[#655d5a]">
                                I agree to the
                                <Link target="_blank" :href="route('terms.show')" class="font-semibold text-[#271310] underline decoration-[#d8c6ba] underline-offset-4">Terms of Service</Link>
                                and
                                <Link target="_blank" :href="route('policy.show')" class="font-semibold text-[#271310] underline decoration-[#d8c6ba] underline-offset-4">Privacy Policy</Link>.
                            </div>
                        </div>
                        <InputError class="mt-3 text-sm font-medium text-red-700" :message="form.errors.terms" />
                    </InputLabel>
                </div>

                <div class="flex flex-col gap-4 border-t border-[#d8c6ba]/50 pt-4 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-[#655d5a]">
                        Already have an account?
                        <Link :href="route('login')" class="font-semibold text-[#271310] underline decoration-[#d8c6ba] underline-offset-4">
                            Log in
                        </Link>
                    </p>

                    <PrimaryButton
                        class="inline-flex items-center justify-center rounded-[1.25rem] bg-[#271310] px-6 py-3 text-sm font-bold tracking-[0.08em] text-white shadow-none transition-colors hover:bg-[#3e2723] focus:bg-[#3e2723] focus:ring-0 active:bg-[#1e0f0d]"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticationCard>
</template>

<style scoped>
.font-headline {
    font-family: 'Noto Serif', serif;
}
</style>
