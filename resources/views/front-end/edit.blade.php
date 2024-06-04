<x-app-layout>

<body>
    <h2>Edit Pengaduan</h2>
    <form action="{{ route('dashboards.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $pengaduan->nama }}">
        <br>
        <label for="nomor_hp">Nomor HP:</label>
        <input type="text" name="nomor_hp" value="{{ $pengaduan->nomor_hp }}">
        <br>
        <label for="perihal">Perihal:</label>
        <textarea name="perihal">{{ $pengaduan->perihal }}</textarea>
        <br>
        <label for="status">Status:</label>
        <select name="status">
            <option value="0" {{ !$pengaduan->status ? 'selected' : '' }}>Belum Terverifikasi</option>
            <option value="1" {{ $pengaduan->status ? 'selected' : '' }}>Terverifikasi</option>
        </select>
        <br>
        <button type="submit">Perbarui</button>
    </form>
</body>
</x-app-layout>
