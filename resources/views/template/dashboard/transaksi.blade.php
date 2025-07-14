@extends('template.dashboard.header')

@section('title', 'Login')

@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <di class="container-full">
                <!-- Main content -->
                <section class="content">
                    <div class="row align-items-end">
                        <div class="col-xl-12 col-12">
                            <div class="box bg-primary-light pull-up">
                                <div class="box-body p-xl-0">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-3"><img src="{{asset('template/images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
                                        <div class="col-12 col-lg-9">
                                            <h2>Hello, Welcome Back!</h2>
                                            <p class="text-dark mb-0 fs-16">
                                                Your course Overcoming the fear of public speaking was completed by 11 New users this week!
                                            </p>
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
                                        data-bs-target="#modal-center">
                                        Tambah Transaksi
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-center" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Tambah Data Transaksi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                             <form class="form" method="POST" action="{{ route('dashboard.store') }}">
                                    @csrf
                                    <div class="box-body">
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Informasi Barang</h4>
                                        <hr class="my-15">
                                            <div class="form-group mb-3">
                                                <label for="barangSelect" class="form-label">Pilih Barang</label>
                                                <select name="barang_id" id="barangSelect" class="js-example-basic-single" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    
                                                </select>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="qtyInput" class="form-label">Qty</label>
                                                        <input type="number" class="form-control" min="1" value="1" id="qtyInput" name="quantity" placeholder="Masukkan jumlah" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="harga" class="form-label">Harga</label>
                                                        <input type="text" class="form-control" id="harga" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-uniform">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary float-end">Tambah</button>
                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                                   
                                                    <th>Kode Barang</th>
                                                    <th>Quantity</th>
                                                    <th>Harga</th>
                                                    <th>Total harga</th>
                                                     <th>Tanggal Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($transaksis as $item)
<tr>
    <td>{{ $item->barang->nama }}</td>
    <td>{{ $item->quantity }}</td>
    <td>{{ number_format($item->harga_satuan, 2) }}</td>
    <td>{{ number_format($item->total, 2) }}</td>
    <td>{{ $item->tanggal }}</td>
    <td>
        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}">
            Edit
        </button>
        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $item->id }}">
            Delete
        </button>

        <!-- Modal Delete -->
        <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" aria-labelledby="modal-delete-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-delete-label">Konfirmasi Hapus Transaksi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus transaksi untuk barang <strong>{{ $item->barang->nama }}</strong> pada tanggal <strong>{{ $item->tanggal }}</strong>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </td>
</tr>
@endforeach

                                       
                                    </tbody>
                                            <tfoot>
                                                <tr>
                                                     <th>Kode Barang</th>
                                                    <th>Quantity</th>
                                                    <th>Harga</th>
                                                    <th>Total harga</th>
                                                     <th>Tanggal Transaksi</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                   @foreach ($transaksis as $t)
<div class="modal fade" id="modal-edit-{{ $t->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form" method="POST" action="{{ route('transaksi.update', $t->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Edit Transaksi Barang: {{ $t->barang->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="barang_id">Barang</label>
                        <select name="barang_id" class="form-control" disabled>
                            @foreach ($barangs as $b)
                                <option value="{{ $b->id }}" {{ $t->barang_id == $b->id ? 'selected' : '' }}>
                                    {{ $b->nama }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Barang tidak dapat diubah.</small>
                    </div>
                    <div class="form-group mb-2">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{ $t->quantity }}" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Harga Satuan</label>
                        <input type="text" class="form-control" value="{{ number_format($t->harga_transaksi, 0) }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Total</label>
                        <input type="text" class="form-control" value="{{ number_format($t->total, 0) }}" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

                    <div class="col-xl-12 col-12">
                        <div class="box">
                            <div class="box-body">
                                <p class="text-fade">Grafik Laporan Transaksi</p>
                                <h3 class="mt-0 mb-20">Bulan <?= date('F'); ?></h3>
                                <canvas id="grafikTransaksi"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
        {{-- sampe sini --}}
@endsection
