<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <body>
                    <h2>Buat Pengaduan Baru</h2>
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
                    <form action="{{ route('pengaduans.store') }}" method="POST">
                        @csrf
                        <label for="nama">Nama:</label><br>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"><br><br>
                        <label for="nomor_hp">Nomor HP:</label><br>
                        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}"><br><br>
                        <label for="perihal">Perihal:</label><br>
                        <textarea id="perihal" name="perihal">{{ old('perihal') }}</textarea><br><br>

                        <!-- Tambahkan captcha -->
                        {!! getCaptchaBox() !!}
                        {{-- @dd($getCaptchaBox) --}}
                        <br>

                        <button type="submit">Submit</button>
                    </form>
                </body>

            </div>
        </div>
    </div>
</x-app-layout>
