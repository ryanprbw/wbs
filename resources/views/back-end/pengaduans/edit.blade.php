<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Verifikasi') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <body>
                    <form action="{{ route('pengaduans.update', $pengaduan->id) }}" method="POST" class="max-w-sm mx-auto"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <label for="perihal"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perihal</label>
                        <label for="perihal"
                            class="mb-8 block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $pengaduan->perihal }}</label>

                        <!-- Tampilkan foto jika ada -->
                        @if($pengaduan->photo)
                        <h3 class="text-lg font-semibold">Foto Pengaduan:</h3>
                        <div class="grid grid-cols-2 gap-4">
                            @foreach (json_decode($pengaduan->photo) ?? [] as $photo)  {{-- Gunakan ?? [] untuk menghindari kesalahan jika null --}}
                                <img src="{{ asset('storage/' . $photo) }}" alt="Foto Pengaduan" class="w-full h-auto rounded-lg">
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada foto yang diunggah.</p> {{-- Tampilkan pesan jika tidak ada foto --}}
                    @endif


                        <label for="status"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status:</label>
                        <select name="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option class="w-2 h-2 me-1 bg-red-500 rounded-full" value="0"
                                {{ !$pengaduan->status ? 'selected' : '' }}>Belum Terverifikasi
                            </option>
                            <option class="w-2 h-2 me-1 bg-green-500 rounded-full" value="1"
                                {{ $pengaduan->status ? 'selected' : '' }}>Terverifikasi</option>
                        </select>

                        <br>
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                            type="submit">Perbarui</button>
                    </form>
                </body>
            </div>
        </div>
    </div>
</x-app-layout>
