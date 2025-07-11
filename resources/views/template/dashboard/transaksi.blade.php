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
                                        <div class="col-12 col-lg-3"><img src="{{asset('tamplate/images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
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
                                            <h5 class="modal-title" id="modalLabel">Tambah Data</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
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
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Total harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Tanggal Transaksi</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kode Barang</th>
                                                    <th>Harga</th>
                                                    <th>Quantity</th>
                                                    <th>Total harga</th>
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
 