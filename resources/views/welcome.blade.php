<x-dashboard-layout>
    <form action="{{ route('dashboards.store') }}" method="POST">
        @csrf

        <div class="p-4 ">
            <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

                <body>
                   
                    <div class="p-4 ">
                        <div
                            class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 bg-gray-200 mt-16">
                            @if ($errors->any())
                                <div>
                                    <strong>Whoops!</strong> Ada masalah dengan inputan Anda.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>
                            @endif
                            @if (session('success'))
                                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-medium">Terima Kasih</span> {{ session('success') }}
                                    </div>
                                </div>
                            @endif
                            <form action="{{ route('dashboards.store') }}" method="POST">
                                @csrf
                                <div class="grid gap-6 mb-6 md:grid-cols-2">
                                    <div>
                                        <label for="nama"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama:
                                            <span class="animate-pulse text-red-700">(boleh diisi dengan anonym /
                                                dikosongkan)</span></label>
                                        <input type="text" id="nama" name="nama"
                                            value="{{ old('nama', '-') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div>
                                        <label for="nomor_hp"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                            HP: <span class="animate-pulse text-red-700">(boleh diisi /
                                                dikosongkan)</label>
                                        <input type="text" id="nomor_hp" name="nomor_hp"
                                            value="{{ old('nomor_hp', '-') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="perihal"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal:</label>
                                        <textarea id="perihal" name="perihal"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required>{{ old('perihal') }}</textarea>
                                    </div>
                                    <div class="col-span-2">
                                        <!-- Anda mungkin ingin menambahkan kembali kode captcha di sini -->
                                        {!! getCaptchaBox() !!}
                                    </div>

                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </body>
            </div>
        </div>
    </form>
</x-dashboard-layout>
