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

    <div class="modal fade" id="editCustomerModal" tabindex="-1" role="dialog" aria-labelledby="editCustomerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editCustomerForm">
                        @csrf
                        <input type="hidden" name="id" id="editCustomerId">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama Perusahaan</label>
                                    <input type="text" class="form-control" name="company_name" id="editCompanyName"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" id="editTitle">
                                </div>
                                <div class="form-group">
                                    <label>Nama KTP</label>
                                    <input type="text" class="form-control" name="name" id="editName" required>
                                </div>
                                <div class="form-group">
                                    <label>No. KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" id="editNoKtp">
                                </div>
                                <div class="form-group">
                                    <label>Nama Alias</label>
                                    <input type="text" class="form-control" name="alias" id="editAlias">
                                </div>
                                <div class="form-group">
                                    <label>No. HP 1</label>
                                    <input type="text" class="form-control" name="no_hp" id="editNoHp" required>
                                </div>
                                <div class="form-group">
                                    <label>No. HP 2</label>
                                    <input type="text" class="form-control" name="no_hp2" id="editNoHp2">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" id="editEmail">
                                </div>
                                <div class="form-group">
                                    <label>Tipe Customer</label>
                                    <select class="form-control" name="customer_type_id" id="editCustomerTypeId">
                                        <option value="">-- Pilih Tipe --</option>
                                        @foreach ($listtype as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Unit Pembelian</label>
                                    <input type="text" class="form-control" name="unit" id="editUnit">
                                </div>
                                <div class="form-group">
                                    <label>Salesperson</label>
                                    <select class="form-control" name="salesperson_id" id="editSalespersonId">
                                        <option value="">-- Pilih Salesperson --</option>
                                        @foreach ($salespersons as $sales)
                                            <option value="{{ $sales->id }}">{{ $sales->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keyword</label>
                                    <input type="text" class="form-control" name="keywords" id="editKeywords">
                                </div>
                                <div class="form-group">
                                    <label>Notes</label>
                                    <textarea class="form-control" name="notes" id="editNotes"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="updateCustomer">Simpan</button>
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
                        data: 'properties',
                        name: 'properties',
                        render: function(data, type, row) {
                            return data ? data.split(';').join('<br>') : '-';
                        }
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
                    processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>',
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
                    toast: true,
                    position: 'top-end',
                    title: 'Menyimpan...',
                    text: 'Mohon tunggu sebentar',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
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
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Customer berhasil ditambahkan!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(() => {
                                $('#addCustomerModal').modal('hide'); // Tutup modal
                                $('#customerForm')[0].reset(); // Reset form
                                $('#tableCustomer').DataTable().ajax
                                    .reload(); // Reload tabel
                            });


                        }
                    },
                    error: function(xhr) {
                        let errorMessage = "Terjadi kesalahan!";
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error;
                        }

                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: errorMessage,
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
            });



            $('#tableCustomer').on('click', '.edit-customer', function() {
                var customerId = $(this).data('id');

                $.ajax({
                    url: "{{ url('customers') }}/" + customerId + "/edit",
                    type: "GET",
                    success: function(response) {
                        if (response.success) {
                            var data = response.data;
                            $('#editCustomerForm input[name="id"]').val(data.id);
                            $('#editCustomerForm input[name="name"]').val(data.name);
                            $('#editCustomerForm input[name="company_name"]').val(data
                                .company_name);
                            $('#editCustomerForm input[name="title"]').val(data.title);
                            $('#editCustomerForm input[name="no_ktp"]').val(data.no_ktp);
                            $('#editCustomerForm input[name="alias"]').val(data.alias);
                            $('#editCustomerForm input[name="no_hp"]').val(data.no_hp);
                            $('#editCustomerForm input[name="no_hp2"]').val(data.no_hp2);
                            $('#editCustomerForm input[name="email"]').val(data.email);
                            $('#editCustomerForm select[name="customer_type_id"]').val(data
                                .customer_type_id);
                            $('#editCustomerForm select[name="salesperson_id"]').val(data
                                .salesperson_id);
                            $('#editCustomerForm input[name="keywords"]').val(data.keywords);
                            $('#editCustomerForm textarea[name="notes"]').val(data.notes);
                            $('#editCustomerId').val(data.id);

                            $('#editCustomerModal').modal('show');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'error',
                            title: 'Gagal mengambil data customer!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    }
                });
            });

            $('#updateCustomer').click(function(event) {
                event.preventDefault();
                var customerId = $('#editCustomerId').val();
                var formData = $('#editCustomerForm').serialize();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    title: 'Menyimpan perubahan...',
                    text: 'Mohon tunggu sebentar',
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: "{{ url('customers') }}/" + customerId,
                    type: "PUT",
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Customer berhasil diperbarui!',
                                showConfirmButton: false,
                                timer: 3000
                            }).then(() => {
                                $('#editCustomerModal').modal('hide');
                                $('#editCustomerForm')[0].reset();
                                $('#tableCustomer').DataTable().ajax.reload();
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan!',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });
            });


            $('#tableCustomer').on('click', '.delete-customer', function() {
                var customerId = $(this).data('id');

                Swal.fire({
                    title: "Apakah Anda yakin?",
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ url('customers') }}/" + customerId,
                            type: "DELETE",
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Berhasil!",
                                        text: "Customer berhasil dihapus.",
                                        showConfirmButton: false,
                                        timer: 2000
                                    });
                                    $('#tableCustomer').DataTable().ajax.reload();
                                }
                            },
                            error: function(xhr) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Gagal!",
                                    text: "Terjadi kesalahan saat menghapus data.",
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });
                    }
                });
            });


        });
    </script>

@endsection
