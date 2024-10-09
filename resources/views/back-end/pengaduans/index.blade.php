<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Pengaduan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        {{-- <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th> --}}
                                        <th scope="col" class="px-6 py-3">
                                            Nomor HP
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Perihal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Ditanggapi dalam
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Laporan Masuk Tanggal
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengaduans as $pengaduan)
                                    <tr>
                                        {{-- <td class="px-6 py-4">{{ $pengaduan->user->name }}</td> --}}
                                        
                                        <td class="px-6 py-4">{{ $pengaduan->nomor_hp }}</td>
                                        <td class="px-6 py-4">{{ $pengaduan->perihal }}</td>
                                        <td class="px-6 py-4">{{ $pengaduan->days_difference }} Hari</td>
                                        <td class="px-6 py-4">{{ $pengaduan->created_at }} </td>
                                        
                                        <td class="px-6 py-4">
                                            @if($pengaduan->status)
                                                <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300">
                                                    <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                                    Terverifikasi
                                                </span>
                                            @else
                                                <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                                                    <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                                                    Belum Terverifikasi
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('pengaduans.edit', $pengaduan->id) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Verifikasi</a>
                                            {{-- <form action="{{ route('pengaduans.destroy', $pengaduan->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-500 hover:underline">Hapus</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
