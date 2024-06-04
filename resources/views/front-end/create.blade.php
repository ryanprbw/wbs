<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengaduan Baru</title>
</head>
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
    <form action="{{ route('dashboards.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"><br><br>
        <label for="nomor_hp">Nomor HP:</label><br>
        <input type="text" id="nomor_hp" name="nomor_hp" value="{{ old('nomor_hp') }}"><br><br>
        <label for="perihal">Perihal:</label><br>
        <textarea id="perihal" name="perihal">{{ old('perihal') }}"></textarea><br><br>

        <!-- Tambahkan captcha -->
        {!!getCaptchaBox()!!}
        {{-- @dd($getCaptchaBox) --}}
        <br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
