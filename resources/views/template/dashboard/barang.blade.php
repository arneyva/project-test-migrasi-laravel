@extends('template.dashboard.header')
@push('head')
    <!-- Includes all JS & CSS for the JavaScript Data Grid -->
    <script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>
@endpush

@section('title', 'Dashboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row align-items-end">
                    <div class="col-xl-12 col-12">
                        <div class="box bg-primary-light pull-up">
                            <div class="box-body p-xl-0">
                                <div class="row align-items-center">
                                    <div class="col-12 col-lg-3"><img
                                            src="{{ asset('template/images/svg-icon/color-svg/custom-14.svg') }}"
                                            alt=""></div>
                                    <div class="col-12 col-lg-9">
                                        <h2>Mother Aps - Inkoasku</h2>
                                        <p class="text-dark mb-0 fs-16">
                                            Your course Overcoming the fear of public speaking was completed by 11 New users
                                            this week!
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
                                <h3 class="box-title">Barang</h3>
                                <button type="button" class="btn btn-primary-light pull-right" data-bs-toggle="modal"
                                    data-bs-target="#modal-center">
                                    Tambah Barang
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal center-modal fade" id="modal-center" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Data Barang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form" method="POST" action="{{ route('dashboard.store') }}">
                                        @csrf
                                        <div class="box-body">
                                            <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i>
                                                Informasi Barang</h4>
                                            <hr class="my-15">
                                            <div class="form-group">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    placeholder="Nama barang">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Kode</label>
                                                        <input type="text" name="kode" id="kode"
                                                            class="form-control" placeholder="Kode barang">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-label">Harga</label>
                                                        <input type="number" step="0.01" min="0.01" name="harga"
                                                            id="harga" class="form-control" placeholder="Harga barang"
                                                            name="harga">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer modal-footer-uniform">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" class="btn btn-primary float-end">Tambah</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">List Data Barang</h4>
                            </div>
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="complex_header" class="table table-striped table-bordered display"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Tanggal Di input</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($barangs as $item)
                                                <tr>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->kode }}</td>
                                                    <td>{{ $item->harga }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-edit-{{ $item->id }}">
                                                            Edit
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-{{ $item->id }}">
                                                            Delete
                                                        </button>
                                                        <div class="modal fade" id="modal-delete-{{ $item->id }}"
                                                            tabindex="-1" aria-labelledby="modal-delete-label"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modal-delete-label">
                                                                            Konfirmasi Hapus Barang</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Apakah Anda yakin ingin menghapus barang
                                                                        <strong>{{ $item['nama'] }}</strong>?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <form
                                                                            action="{{ route('dashboard.destroy', $item->id) }}"
                                                                            method="POST" style="display:inline;">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Hapus</button>
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
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Tanggal Di input</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title">List Data Barang ~ AG Grid</h4>
                            </div>
                            <div class="box-body">
                                <div id="myGrid" style="height: 500px"></div>
                            </div>
                        </div>
                    </div>
                    @foreach ($barangs as $b)
                        <div class="modal fade" id="modal-edit-{{ $b->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form" method="POST"
                                        action="{{ route('dashboard.update', $b->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Barang: {{ $b->nama }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Tutup"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" value="{{ $b->nama }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode</label>
                                                <input type="text" name="kode" value="{{ $b->kode }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" step="0.01" name="harga"
                                                    value="{{ $b->harga }}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let gridApi;

        const gridOptions = {
            columnDefs: [{
                    field: "nama",
                    headerName: "Nama",
                    editable: true
                },
                {
                    field: "kode",
                    headerName: "Kode"
                },
                {
                    field: "harga",
                    headerName: "Harga",
                    filter: "agNumberColumnFilter"
                },
                {
                    field: "created_at",
                    headerName: "Tanggal di Input",
                    sortable: true,
                    valueFormatter: (params) => {
                        if (!params.value) return "";
                        const date = new Date(params.value);
                        return date.toLocaleDateString("id-ID", {
                            year: "numeric",
                            month: "long",
                            day: "numeric"
                        });
                    }
                },
            ],
            defaultColDef: {
                flex: 1,
                filter: true,
                floatingFilter: true,
                editable: true,
                sortable: true,
            },
            pagination: true,
            paginationPageSize: 10,
            rowSelection: "multiple",
        };

        // Ambil data dari API Laravel
        fetch('/dashboard/barangs')
            .then((response) => response.json())
            .then((result) => {
                if (result.success) {
                    gridOptions.rowData = result.data;
                    // Render Grid
                    gridApi = agGrid.createGrid(document.querySelector("#myGrid"), gridOptions);
                } else {
                    alert("Gagal memuat data dari server");
                }
            })
            .catch((error) => {
                console.error("Error saat fetch data:", error);
            });
    </script>
@endpush
