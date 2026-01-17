<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-text-charcoal">
            {{ __('Delete Account') }}
        </h2>
        <p class="mt-1 text-sm text-text-muted">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-50 text-accent-pink px-4 py-2 rounded-lg font-bold text-sm border border-red-100 hover:bg-red-100 transition"
    >{{ __('Delete Account') }}</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-text-charcoal">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-text-muted">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Password') }}</label>

                <input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 text-sm rounded-lg border-gray-200 bg-section-bg focus:border-accent-pink focus:ring-accent-pink text-text-charcoal"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="bg-white text-gray-700 px-4 py-2 rounded-lg font-bold text-sm border border-gray-200 hover:bg-gray-50 transition">
                    {{ __('Cancel') }}
                </button>

                <button type="submit" class="bg-accent-pink text-white px-4 py-2 rounded-lg font-bold text-sm hover:bg-accent-pink/90 transition shadow-lg shadow-pink-500/20">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
