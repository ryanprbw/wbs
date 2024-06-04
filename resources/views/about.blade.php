<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="p-4 flex justify-center items-center min-h-screen"> <!-- Updated div -->
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">


            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                    <div class="flex flex-col justify-center">
                         {{-- <img src="{{ Storage::url('img/wbs.png') }}" class="h-32 m-8" alt="WBS Logo"> --}}
                        <h1 class="mb-4 text-xl font-extrabold tracking-tight leading-none text-gray-900 md:text-xl lg:text-xl dark:text-white">Laporkan segala
                            kegiatan yang berindikasi pelanggaran di lingkungan Dinas Kependudukan dan Catatan Sipil.
                            Bentuk materi pelanggaran yang dilaporkan:</h1>
                        <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">  1.Pelanggaran Disiplin Pegawai <br>
                            2.Penyalahgunaan Wewenang, Mal Administrasi dan Pemerasan/Penganiayaan <br>
                            3.Perilaku Amoral/Perselingkuhan dan Kekerasan dalam Rumah Tangga<br>
                            4.Korupsi<br>
                            5.Pengadaan Barang dan Jasa/BAMA<br>
                            6.Pungutan Liar, Percaloan, dan Pengurusan Dokumen<br>
                            7.Narkoba<br>
                            8.Pelayanan Publik<br>
                            9.Laporan dan Klarifikasi<br></p>
                        <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                            <a href="{{url('/')}}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                                Lapor 
                                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                            {{-- <a href="#" class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Learn more
                            </a>   --}}
                        </div>
                    </div>
                    <div>
                        <iframe class="mx-auto w-full lg:max-w-xl h-64 rounded-lg sm:h-96 shadow-xl" src="https://www.youtube.com/embed/3AjWUdcuPuk?si=mYDmIWHtI9ybhp9u" title="YouTube video player" frameborder="0" allow="; autoplay; clipboard-write; gyroscope; " allowfullscreen></iframe>
                    </div>
                </div>
            </section>
            

            
        </div>
    </div>
</x-dashboard-layout>
