<x-guest-layout>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <!--
      This example requires updating your template:

      ```
      <html class="h-full">
      <body class="h-full">
      ```
    -->
    <main class="min-h-full bg-cover bg-top sm:bg-top" style="background-image: url('/images/bg.jpeg')">
        <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-48">
            <div class="flex-1 flex flex-col justify-center lg:justify-start py-10 px-4 sm:px-6 lg:flex-none lg:px-16">
                <div class="mx-auto w-full max-w-sm md:w-80 xl:w-96">
                    <div>
                        <img class="h-16 w-auto" src="/images/logo-outer.png" alt="Workflow" loading="lazy">
                    </div>

                    <x-jet-validation-errors class="mb-4"/>

                    <div class="my-2">
                        <form method="POST" action="{{ route('login') }}"
                              class="space-y-5">
                            @csrf
                            <div>
                                <label for="email" class="block text-sm font-normal text-white">
                                    {{ __('Email') }}
                                </label>
                                <div class="mt-2">
                                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                 :value="old('email','formatos@videomed.org')" required autofocus/>
                                </div>
                            </div>

                            <div class="space-y-1">
                                <label for="password" class="block text-sm font-normal text-white">
                                    {{ __('Password') }}
                                </label>
                                <div class="mt-2">
                                    <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                                 value="Formatos@"
                                                 name="password" required autocomplete="current-password"/>
                                </div>
                            </div>

                            <div>
                                <x-jet-button type="submit"
                                              class="w-full flex justify-center">
                                    {{ __('Login') }}
                                </x-jet-button>
                            </div>
                            <div class="text-sm">
                                @if (Route::has('password.request'))
                                    <a
                                        href="{{ route('password.request') }}"
                                        class="font-normal text-white hover:text-primary">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-guest-layout>
