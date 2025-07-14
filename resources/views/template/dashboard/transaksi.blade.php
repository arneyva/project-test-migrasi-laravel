<!-- resources/views/transaksi.blade.php -->
@extends('template.dashboard.header')

@section('title', 'Transaksi')

@section('content')
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row align-items-end mb-3">
                    <div class="col-xl-12 col-12">
                        <div class="box bg-primary-light pull-up">
                            <div class="box-body p-xl-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-3">
                                        <img src="{{ asset('template/images/svg-icon/color-svg/custom-14.svg') }}"
                                            alt="">
                                    </div>
                                    <div class="col-12 col-lg-9">
                                        <h2>Selamat Datang Kembali!</h2>
                                        <p class="text-dark mb-0 fs-16">Pantau dan kelola transaksi barang Anda di halaman
                                            ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="box no-shadow mb-0 bg-transparent">
                            <div class="box-header no-border px-0">
                                <h3 class="box-title">Transaksi</h3>
                                <button type="button" class="btn btn-primary-light pull-right" data-bs-toggle="modal"
                                    data-bs-target="#modal-center">Tambah Transaksi</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Tambah Transaksi -->
                    <div class="modal fade" id="modal-center" tabindex="-1" aria-labelledby="modalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('transaksi.store') }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Tambah Data Transaksi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group mb-3">
                                            <label for="barangSelect" class="form-label">Pilih Barang</label>
                                            <select name="barang_id" id="barangSelect" class="form-control select2"
                                                style="width: 100%;" required>
                                                <option value="">-- Pilih Barang --</option>
                                                @foreach ($barangs as $barang)
                                                    <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="qtyInput" class="form-label">Qty</label>
                                                    <input type="number" min="1" value="1" class="form-control"
                                                        name="quantity" id="qtyInput" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="harga" class="form-label">Harga</label>
                                                    <input type="text" id="harga" name="harga" class="form-control"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Transaksi -->
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">Laporan Transaksi</h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                 <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                  
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksis as $t)
                                                <tr>
                                                    <td>{{ $t->barang->nama }}</td>
                                                    <td>{{ $t->quantity }}</td>
                                                    <td>{{ number_format($t->harga_satuan, 2) }}</td>
                                                    <td>{{ number_format($t->total, 2) }}</td>
                                                    <td>{{ $t->tanggal }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-{{ $t->id }}">Edit</button>
                                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-{{ $t->id }}">Hapus</button>
                                                    </td>
                                                </tr>

                                                <!-- Modal Edit Transaksi -->
                                                <div class="modal fade" id="modal-edit-{{ $t->id }}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form method="POST"
                                                                action="{{ route('transaksi.update', $t->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Transaksi Barang:
                                                                        {{ $t->barang->nama }}</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Tutup"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group mb-2">
                                                                        <label
                                                                            for="barang_id_{{ $t->id }}">Barang</label>
                                                                        <select name="barang_id"
                                                                            id="barang_id_{{ $t->id }}"
                                                                            class="form-control select2"
                                                                            style="width: 100%;" required>
                                                                            @foreach ($barangs as $b)
                                                                                <option value="{{ $b->id }}"
                                                                                    {{ $t->barang_id == $b->id ? 'selected' : '' }}>
                                                                                    {{ $b->nama }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <small class="text-muted">Cari barang berdasarkan
                                                                            nama</small>
                                                                    </div>

                                                                    <div class="form-group mb-2">
                                                                        <label>Qty</label>
                                                                        <input type="number" name="quantity"
                                                                            value="{{ $t->quantity }}"
                                                                            class="form-control" required>
                                                                    </div>
                                                                    <div class="form-group mb-2">
                                                                        <label>Harga Satuan</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ number_format($t->harga_satuan, 2) }}"
                                                                            readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Total</label>
                                                                        <input type="text" class="form-control"
                                                                            value="{{ number_format($t->total, 2) }}"
                                                                            readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal Delete Transaksi -->
                                                <div class="modal fade" id="modal-delete-{{ $t->id }}"
                                                    tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Konfirmasi Hapus Transaksi</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Yakin ingin menghapus transaksi
                                                                <strong>{{ $t->barang->nama }}</strong> pada
                                                                <strong>{{ $t->tanggal }}</strong>?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('transaksi.destroy', $t->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">Hapus</button>
                                                                </form>
                                                                <button class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Grafik -->
                    <div class="col-xl-12 col-12 mt-4">
                        <div class="box">
                            <div class="box-body">
                                <p class="text-fade">Grafik Laporan Transaksi</p>
                                <h3 class="mt-0 mb-20">Bulan {{ date('F') }}</h3>
                                <canvas id="grafikTransaksi"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Inisialisasi Select2 di modal
            $('#barangSelect').select2({
                dropdownParent: $('#modal-center'),
                width: '100%'
            });

            // Ketika select berubah
            $('#barangSelect').on('change', function() {
                const barangId = $(this).val();
                const hargaInput = document.getElementById('harga');

                if (barangId) {
                    fetch(`/transaksi/getHarga/${barangId}`)
                        .then(response => response.json())
                        .then(data => {
                            hargaInput.value = data.harga ?? 0;
                        })
                        .catch(error => {
                            console.error('Gagal mengambil harga:', error);
                            hargaInput.value = 0;
                        });
                } else {
                    hargaInput.value = '';
                }
            });
        });
    </script>
@endpush
