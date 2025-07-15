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
                                <div class="col-12 col-lg-3"><img src="{{asset('template/images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
                                <div class="col-12 col-lg-9">
                                    <h2>Mother Aps - Inkoasku</h2>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form" method="POST" action="{{ route('dashboard.store') }}">
                                    @csrf
                                    <div class="box-body">
                                        <h4 class="box-title text-info mb-0 mt-20"><i class="ti-save me-15"></i> Informasi Barang</h4>
                                        <hr class="my-15">
                                        <div class="form-group">
                                            <label class="form-label">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama barang">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Kode</label>
                                                    <input type="text" name="kode" id="kode" class="form-control" placeholder="Kode barang">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Harga</label>
                                                    <input type="number" step="0.01" min="0.01" name="harga" id="harga" class="form-control" placeholder="Harga barang" name="harga">
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
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
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
                                            <td>{{$item->nama}}</td>
                                            <td>{{$item->kode}}</td>
                                            <td>{{$item->harga}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td>
                                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modal-edit-{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $item->id }}">
                                                        Delete
                                                    </button>
                                                    <div class="modal fade" id="modal-delete-{{ $item->id }}" tabindex="-1" aria-labelledby="modal-delete-label" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modal-delete-label">Konfirmasi Hapus Barang</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus barang <strong>{{ $item['nama'] }}</strong>?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('dashboard.destroy', $item->id) }}" method="POST" style="display:inline;">
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
                            <div  id="myGrid" style="height: 500px"></div>
                        </div>
                    </div>
                </div>
            @foreach ($barangs as $b)
                    <div class="modal fade" id="modal-edit-{{ $b->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form class="form" method="POST" action="{{ route('dashboard.update', $b->id) }}">
                                    @csrf
                                     @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Barang: {{ $b->nama }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" value="{{ $b->nama }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode</label>
                                            <input type="text" name="kode" value="{{ $b->kode }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input type="number" step="0.01" name="harga" value="{{ $b->harga }}" class="form-control">
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
            </div>
        </section>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Row Data Interface

    // Grid API: Access to Grid API methods
    let gridApi;

    // Grid Options: Contains all of the grid configurations
    const gridOptions = {
      // Data to be displayed
      rowData: [
        { make: "Nissan", model: "Elantra", price: 15829, electric: false },
        { make: "Toyota", model: "Model S", price: 61523, electric: true },
        { make: "Mercedes", model: "Elantra", price: 30632, electric: true },
        { make: "Kia", model: "F-Series", price: 32339, electric: false },
        { make: "Honda", model: "Model S", price: 15915, electric: true },
        { make: "Honda", model: "Model S", price: 47607, electric: false },
        { make: "Toyota", model: "Corolla", price: 22529, electric: true },
        { make: "Honda", model: "Model 3", price: 31681, electric: true },
        { make: "Kia", model: "Elantra", price: 33101, electric: false },
        { make: "BMW", model: "Model 3", price: 26770, electric: true },
        { make: "Toyota", model: "Corolla", price: 44820, electric: true },
        { make: "Toyota", model: "Model 3", price: 17407, electric: true },
        { make: "Kia", model: "Model S", price: 34786, electric: false },
        { make: "Toyota", model: "Corolla", price: 51634, electric: true },
        { make: "Fiat", model: "Model 3", price: 37040, electric: false },
        { make: "Kia", model: "500", price: 33256, electric: true },
        { make: "Toyota", model: "Soul", price: 46944, electric: true },
        { make: "Kia", model: "F-Series", price: 63720, electric: true },
        { make: "BMW", model: "Model S", price: 36478, electric: true },
        { make: "Hyundai", model: "500", price: 66738, electric: true },
        { make: "BMW", model: "500", price: 44842, electric: false },
        { make: "Hyundai", model: "500", price: 36808, electric: true },
        { make: "Hyundai", model: "Soul", price: 25939, electric: true },
        { make: "Kia", model: "Soul", price: 68377, electric: true },
        { make: "Toyota", model: "F-Series", price: 27078, electric: false },
        { make: "Toyota", model: "500", price: 48800, electric: false },
        { make: "Mercedes", model: "Civic", price: 32421, electric: true },
        { make: "Honda", model: "500", price: 63487, electric: false },
        { make: "Kia", model: "Model S", price: 28933, electric: false },
        { make: "Toyota", model: "500", price: 26612, electric: true },
        { make: "Hyundai", model: "Model S", price: 16294, electric: true },
        { make: "Honda", model: "500", price: 61668, electric: true },
        { make: "BMW", model: "Civic", price: 20925, electric: false },
        { make: "Fiat", model: "500", price: 21890, electric: true },
        { make: "Ford", model: "F-Series", price: 29610, electric: true },
        { make: "Hyundai", model: "500", price: 56428, electric: false },
        { make: "Nissan", model: "Civic", price: 18064, electric: false },
        { make: "Mercedes", model: "Civic", price: 28373, electric: false },
        { make: "Honda", model: "500", price: 54732, electric: false },
        { make: "Fiat", model: "Model S", price: 22038, electric: false },
        { make: "Honda", model: "Soul", price: 40445, electric: true },
        { make: "BMW", model: "Model S", price: 65469, electric: false },
        { make: "Fiat", model: "500", price: 62665, electric: false },
        { make: "Nissan", model: "500", price: 40895, electric: false },
        { make: "Nissan", model: "Civic", price: 50838, electric: false },
        { make: "Nissan", model: "F-Series", price: 61928, electric: true },
        { make: "Fiat", model: "500", price: 53062, electric: true },
        { make: "Honda", model: "Civic", price: 55959, electric: false },
        { make: "Mercedes", model: "Model 3", price: 58277, electric: true },
        { make: "Honda", model: "500", price: 26455, electric: true },
        { make: "Mercedes", model: "Soul", price: 27406, electric: false },
        { make: "Fiat", model: "Soul", price: 54538, electric: true },
        { make: "BMW", model: "Soul", price: 18058, electric: false },
        { make: "Mercedes", model: "Civic", price: 36030, electric: false },
        { make: "Fiat", model: "500", price: 67250, electric: false },
        { make: "BMW", model: "Elantra", price: 65707, electric: false },
        { make: "Nissan", model: "500", price: 61279, electric: false },
        { make: "BMW", model: "Civic", price: 58220, electric: false },
        { make: "Mercedes", model: "Elantra", price: 37813, electric: true },
        { make: "Toyota", model: "500", price: 46680, electric: false },
        { make: "Honda", model: "500", price: 58264, electric: false },
        { make: "Fiat", model: "Soul", price: 58067, electric: true },
        { make: "Fiat", model: "500", price: 29644, electric: false },
        { make: "Mercedes", model: "Soul", price: 41725, electric: true },
        { make: "BMW", model: "Model 3", price: 33063, electric: false },
        { make: "Hyundai", model: "500", price: 32125, electric: false },
        { make: "Fiat", model: "Model 3", price: 24064, electric: false },
        { make: "Honda", model: "Soul", price: 49904, electric: true },
        { make: "Toyota", model: "Model 3", price: 16461, electric: true },
        { make: "Toyota", model: "500", price: 16848, electric: false },
        { make: "Toyota", model: "Civic", price: 62664, electric: false },
        { make: "Hyundai", model: "Soul", price: 19612, electric: true },
        { make: "Kia", model: "Model S", price: 47067, electric: true },
        { make: "Ford", model: "500", price: 27837, electric: true },
        { make: "Fiat", model: "Soul", price: 32525, electric: true },
        { make: "Hyundai", model: "Soul", price: 65547, electric: false },
        { make: "Kia", model: "Model 3", price: 44288, electric: false },
        { make: "Toyota", model: "Soul", price: 64034, electric: true },
        { make: "Fiat", model: "Elantra", price: 57455, electric: false },
        { make: "BMW", model: "Model 3", price: 23735, electric: false },
        { make: "Fiat", model: "F-Series", price: 20198, electric: false },
        { make: "Hyundai", model: "500", price: 51670, electric: true },
        { make: "Fiat", model: "Soul", price: 34393, electric: true },
        { make: "Kia", model: "Soul", price: 27586, electric: false },
        { make: "BMW", model: "Model S", price: 58935, electric: true },
        { make: "Fiat", model: "Model S", price: 61700, electric: true },
        { make: "Hyundai", model: "Model S", price: 21323, electric: false },
        { make: "Mercedes", model: "Soul", price: 44138, electric: false },
        { make: "Ford", model: "500", price: 65698, electric: false },
        { make: "Mercedes", model: "Model S", price: 67288, electric: false },
        { make: "Kia", model: "F-Series", price: 35677, electric: false },
        { make: "Ford", model: "Soul", price: 40214, electric: false },
        { make: "Kia", model: "Model 3", price: 41965, electric: false },
        { make: "Nissan", model: "Elantra", price: 26815, electric: true },
        { make: "Ford", model: "Soul", price: 32104, electric: false },
        { make: "Toyota", model: "Soul", price: 16481, electric: true },
        { make: "BMW", model: "Civic", price: 22818, electric: true },
      ],
      // Columns to be displayed (Should match rowData properties)
      columnDefs: [
        {
          field: "make",
          cellEditor: "agSelectCellEditor",
          cellEditorParams: {
            values: ["Tesla", "Ford", "Toyota", "Mercedes", "Fiat", "Nissan"],
          },
          checkboxSelection: true,
        },
        {
          field: "model",
          headerName: "Model Pake Header",
          valueGetter: (p) => p.data.model.toUpperCase(),
        },
        { field: "price" },
        { field: "electric" },
      ],
      defaultColDef: {
        flex: 1,
        filter: true,
        floatingFilter: true,
        editable: true,
      },
      rowSelection: "multiple",
      pagination: true,
      paginationPageSize: 10,
      paginationPageSizeSelector: [10, 20, 50],

    };
    // Create Grid: Create new grid within the #myGrid div, using the Grid Options object
    gridApi = agGrid.createGrid(document.querySelector("#myGrid"), gridOptions);
  </script>
@endpush