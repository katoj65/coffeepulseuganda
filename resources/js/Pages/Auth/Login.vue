<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform((data) => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div class="space-y-8">
            <div class="space-y-4">
                <span class="inline-flex rounded-full bg-[#f8f2ec] px-3 py-2 text-[11px] font-bold uppercase tracking-[0.18em] text-[#3e2723]">
                    Welcome Back
                </span>
                <div>
                    <h2 class="font-headline text-3xl font-bold leading-tight text-[#271310] sm:text-4xl">
                        Log in to your trading workspace.
                    </h2>
                    <p class="mt-3 text-base leading-7 text-[#655d5a]">
                        Review inventory, manage sample workflows, and monitor traceability records from one branded operations hub.
                    </p>
                </div>
            </div>

            <div v-if="status" class="rounded-[1.25rem] bg-[#56a554]/10 px-4 py-3 text-sm font-medium text-[#271310]">
                {{ status }}
            </div>

            <form class="space-y-6" @submit.prevent="submit">
                <div class="space-y-2">
                    <InputLabel for="email" value="Business Email" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                        required
                        autofocus
                        autocomplete="username"
                        placeholder="sourcing@company.com"
                    />
                    <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.email" />
                </div>

                <div class="space-y-2">
                    <InputLabel for="password" value="Password" class="text-[11px] font-bold uppercase tracking-[0.18em] text-[#271310]" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="block w-full rounded-[1.25rem] border-transparent bg-[#fcfaf7] px-4 py-3.5 text-sm text-[#271310] shadow-none placeholder:text-[#655d5a]/45 focus:border-transparent focus:bg-white focus:ring-0"
                        required
                        autocomplete="current-password"
                        placeholder="Enter your password"
                    />
                    <InputError class="mt-2 text-sm font-medium text-red-700" :message="form.errors.password" />
                </div>

                <div class="flex flex-col gap-4 border-t border-[#d8c6ba]/50 pt-4 sm:flex-row sm:items-center sm:justify-between">
                    <label class="flex items-center gap-3">
                        <Checkbox
                            v-model:checked="form.remember"
                            name="remember"
                            class="rounded border-[#b9aeac] text-[#271310] shadow-none focus:ring-0"
                        />
                        <span class="text-sm text-[#655d5a]">Keep me signed in on this device</span>
                    </label>

                    <Link
                        v-if="canResetPassword"
                        :href="route('password.request')"
                        class="text-sm font-semibold text-[#3e2723] underline decoration-[#d8c6ba] underline-offset-4 transition-colors hover:text-[#271310]"
                    >
                        Forgot your password?
                    </Link>
                </div>

                <div class="flex flex-col gap-4 pt-2 sm:flex-row sm:items-center sm:justify-between">
                    <p class="text-sm text-[#655d5a]">
                        Need a new account?
                        <Link :href="route('register')" class="font-semibold text-[#271310] underline decoration-[#d8c6ba] underline-offset-4">
                            Register here
                        </Link>
                    </p>

                    <PrimaryButton
                        class="inline-flex items-center justify-center rounded-[1.25rem] bg-[#271310] px-6 py-3 text-sm font-bold tracking-[0.08em] text-white shadow-none transition-colors hover:bg-[#3e2723] focus:bg-[#3e2723] focus:ring-0 active:bg-[#1e0f0d]"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
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
