<x-layout-auth :title="$title = 'Registrasi'">
    @section('content')    
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nama Pengguna</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('name')
                <p class="text-xs text-red-500 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                        viewBox="0 0 512 512">
                        <path
                        d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                        data-original="#000000" />
                        <path
                        d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                        data-original="#000000" />
                    </svg>
                    {{ $errors->first('name') }}
                </p>
            @enderror
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Alamat Email</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('email')
                <p class="text-xs text-red-500 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                        viewBox="0 0 512 512">
                        <path
                        d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                        data-original="#000000" />
                        <path
                        d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                        data-original="#000000" />
                    </svg>
                    {{ $errors->first('email') }}
                </p>
            @enderror
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Kata Sandi</label>
                    {{-- <div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa kata sandi ?</a>
                    </div> --}}
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('password')
                <p class="text-xs text-red-500 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                        viewBox="0 0 512 512">
                        <path
                        d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                        data-original="#000000" />
                        <path
                        d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                        data-original="#000000" />
                    </svg>
                    {{ $errors->first('password') }}
                </p>
            @enderror
            <div>
                <div class="flex items-center justify-between">
                    <label for="passwordconf" class="block text-sm font-medium leading-6 text-gray-900">Konfirmasi Sandi</label>
                    {{-- <div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Lupa kata sandi ?</a>
                    </div> --}}
                </div>
                <div class="mt-2">
                    <input id="passwordconf" name="password_confirmation" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('password_confirmation')
                <p class="text-xs text-red-500 flex items-center mt-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14px" height="14px" fill="currentColor" class="mr-2"
                        viewBox="0 0 512 512">
                        <path
                        d="M256 0C114.833 0 0 114.833 0 256s114.833 256 256 256 256-114.853 256-256S397.167 0 256 0zm0 472.341c-119.275 0-216.341-97.046-216.341-216.341S136.725 39.659 256 39.659c119.295 0 216.341 97.046 216.341 216.341S375.275 472.341 256 472.341z"
                        data-original="#000000" />
                        <path
                        d="M373.451 166.965c-8.071-7.337-20.623-6.762-27.999 1.348L224.491 301.509 166.053 242.1c-7.714-7.813-20.246-7.932-28.039-.238-7.813 7.674-7.932 20.226-.238 28.039l73.151 74.361a19.804 19.804 0 0 0 14.138 5.929c.119 0 .258 0 .377.02a19.842 19.842 0 0 0 14.297-6.504l135.059-148.722c7.358-8.131 6.763-20.663-1.347-28.02z"
                        data-original="#000000" />
                    </svg>
                    {{ $errors->first('password_confirmation') }}
                </p>
            @enderror
            <div>
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
        </form>
        <p class="mt-10 text-center text-sm text-gray-500">
            Sudah mempunyai akun ?
            <a href="#" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500"> Login Disini </a>
        </p>
    </div>
    @endsection
</x-layout-auth>
