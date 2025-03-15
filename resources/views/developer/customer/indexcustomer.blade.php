@extends('layout.main')

@section('title', 'Customer')

@section('main')

    <style>
        .dataTables_length,
        .dataTables_filter {
            display: none;
        }

        #tableCustomer {
            width: 100% !important;
        }
    </style>


    <!-- Modal Large untuk Tambah Customer -->
    <div class="modal fade" id="addCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCustomerModalLabel">Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="customerForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company_name" required>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <label>Nama KTP</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>No. KTP</label>
                                    <input type="text" class="form-control" name="no_ktp">
                                </div>
                                <div class="form-group">
                                    <label>Nama Alias</label>
                                    <input type="text" class="form-control" name="alias">
                                </div>
                                <div class="form-group">
                                    <label>No. HP 1</label>
                                    <input type="text" class="form-control" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP 2</label>
                                    <input type="text" class="form-control" name="no_hp2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Tipe Customer</label>
                                    <select class="form-control" name="customer_type_id">
                                        <option value="">-- Pilih Tipe --</option>
                                        @foreach ($listtype as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unit Pembelian</label>
                                    <input type="text" class="form-control" name="unit">
                                </div>
                                <div class="form-group">
                                    <label>Salesperson</label>
                                    <select class="form-control" name="salesperson_id">
                                        <option value="">-- Pilih Salesperson --</option>
                                        @foreach ($salespersons as $sales)
                                            <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keyword</label>
                                    <input type="text" class="form-control" name="keywords">
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="saveCustomer">Simpan</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Customer</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Customer</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow-lg border-0  mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex">
                                <div class="input-group" style="width: 250px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white" style="background-color: #45a9ea;">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <input id="txSearch" type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="button" class="btn btn-outline-danger ml-2" id="btnResetDefault"
                                    onclick="window.location.reload()">
                                    Reset
                                </button>
                            </div>
                            <div>
                                <button class="btn text-white mr-1 bg-success" id="exportBtn">
                                    <i class="fas fa-file-excel"></i> Export Excel
                                </button>
                                <button class="btn btn-danger" id="btnExportCustomer">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                                <button class="btn btn-primary ml-1" data-toggle="modal" data-target="#addCustomerModal">
                                    <span class="pr-2"><i class="fas fa-plus"></i></span>Add Customer
                                </button>
                            </div>
                        </div>

                        <div id="containerCustomer" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tableCustomer">
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr>
                                        <th>Nama Perusahaan</th>
                                        <th>Title</th>
                                        <th>Nama KTP</th>
                                        <th>No. KTP</th>
                                        <th>Nama Alias</th>
                                        <th>No. HP 1</th>
                                        <th>No. HP 2</th>
                                        <th>Email</th>
                                        <th>Tipe</th>
                                        <th>Unit Pembelian</th>
                                        <th>Salesperson</th>
                                        <th>Keyword</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@section('script')
    <script>
        $(document).ready(function() {
            var table = $('#tableCustomer').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('customer.list') }}",
                    type: "GET"
                },
                columns: [{
                        data: 'company_name',
                        name: 'company_name'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'no_ktp',
                        name: 'no_ktp'
                    },
                    {
                        data: 'alias',
                        name: 'alias'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'no_hp2',
                        name: 'no_hp2'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'customer_type',
                        name: 'customerType.name'
                    },
                    {
                        data: 'unit',
                        name: 'unit'
                    },
                    {
                        data: 'salesperson',
                        name: 'salesperson.name'
                    },
                    {
                        data: 'keywords',
                        name: 'keywords'
                    },
                    {
                        data: 'notes',
                        name: 'notes'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [],
                lengthChange: false,
                pageLength: 10,
                language: {
                    processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>', // Custom spinner saat processing
                    info: "_START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    emptyTable: "No data available in table",
                    loadingRecords: "Loading...",
                    zeroRecords: "No matching records found"
                },
                columnDefs: [{
                    targets: '_all',
                    className: 'text-center'
                }]
            });


            $('#saveCustomer').click(function() {
                var formData = $('#customerForm').serialize();

                // Tampilkan loading SweetAlert
                Swal.fire({
                    title: 'Menyimpan...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ route('customers.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: 'Customer berhasil ditambahkan!',
                                showConfirmButton: false,
                                timer: 2000 // Modal otomatis tertutup setelah 2 detik
                            });

                            $('#addCustomerModal').modal('hide'); // Tutup modal
                            $('#customerForm')[0].reset(); // Reset form
                            $('#tableCustomer').DataTable().ajax.reload(); // Reload tabel
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = "Terjadi kesalahan!";
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }

                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: errorMessage,
                            confirmButtonColor: '#d33'
                        });
                    }
                });
            });

        });
    </script>

@endsection
