<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kosan</title>
</head>

<style>
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-family: Arial, sans-serif;
}

.table thead {
    background-color: #4CAF50;
    color: white;
}

.table th, 
.table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
    transition: 0.2s;
}

.table th {
    font-weight: bold;
}

.table td {
    font-size: 14px;
}
</style>

<body>
<div class="container">
    <h1>Data Kosan</h1>

    <a href="{{ route('bangunan.create') }}" class="btn btn-primary">+ Tambah Data</a>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Alamat</th>
                <th>Luas</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($bangunans as $item)
            <tr>
                <!-- FIX nomor urut pagination -->
                <td>{{ $bangunans->firstItem() + $loop->index }}</td>

                <td>{{ $item->alamat }}</td>
                <td>{{ $item->luas_kamar }} m²</td>
                <td>{{ ucfirst($item->jenis_kamar) }}</td>

                <td>
                    @if($item->is_full == 0)
                        <span class="badge available">Tersedia</span>
                    @else
                        <span class="badge full">Penuh</span>
                    @endif
                </td>

                <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>

                <td>
                    <a href="{{ route('bangunan.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('bangunan.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7">Data belum ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- FIX pagination -->
    <div style="margin-top:15px;">
        {{ $bangunans->links() }}
    </div>
</div>
</body>
</html>