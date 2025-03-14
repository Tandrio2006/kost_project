@extends('layout.main')

@section('title', 'Proyek')

@section('main')
    <style>
        .error-circle {
            display: inline-block;
            width: 20px;
            height: 20px;
            line-height: 18px;
            text-align: center;
            border-radius: 50%;
            border: solid 2px red;
            font-size: 14px;
            font-weight: bold;
            margin-right: 3px;
        }
    </style>
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Proyek</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Proyek</li>
            </ol>
        </div>

        <div class="modal fade" id="modalTambahProyek" tabindex="-1" role="dialog" aria-labelledby="modalTambahProyekTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header" style="background-color: #45a9ea; color: white;">
                        <h5 class="modal-title" id="modalTambahProyekTitle">Tambah Proyek</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formTambahProyek">
                            <div class="form-group">
                                <label class="font-weight-bold">Proyek Name:</label>
                                <input type="text" id="proyekName" class="form-control" placeholder="Input Proyek Name"
                                    required>
                                <div id="proyekNameError" class="text-danger mt-1 d-none">
                                    <span class="error-circle"><i class="fas fa-times" style="color: #ff0000;"></i></span>
                                    Proyek Name tidak boleh kosong!
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description:</label>
                                <input type="text" id="description" class="form-control"
                                    placeholder="Input Proyek Description">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveProyek" class="btn text-white"
                            style="background-color: #45a9ea;">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalEditProyek" tabindex="-1" role="dialog" aria-labelledby="modalEditProyekTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content shadow-lg border-0">
                    <div class="modal-header" style="background-color: #45a9ea; color: white;">
                        <h5 class="modal-title" id="modalEditProyekTitle">Edit Proyek</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-bold">Proyek Name:</label>
                            <input type="text" id="editProyekName" class="form-control" placeholder="Input Proyek Name"
                                required>
                            <div id="proyekNameEditError" class="text-danger mt-1 d-none">
                                <span class="error-circle"><i class="fas fa-times" style="color: #ff0000;"></i></span>
                                Proyek Name tidak boleh kosong!
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Description:</label>
                            <input type="text" id="editDescription" class="form-control"
                                placeholder="Input Proyek Description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="editProyek" class="btn text-white"
                            style="background-color: #45a9ea;">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow-lg border-0 mb-4">
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
                                <button class="btn btn-danger" id="btnExportInvoice">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                                <button type="button" class="btn btn-primary ml-1" data-toggle="modal"
                                    data-target="#modalTambahProyek">
                                    <span class="pr-2"><i class="fas fa-plus"></i></span>Add Proyek
                                </button>
                            </div>
                        </div>

                        <div id="containerProyek" class="table-responsive">
                            <!-- <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                                                        id="tableInvoice">
                                                                        <thead style="background-color: #45a9ea; color: white;" width="100%">
                                                                            <tr>
                                                                                <th style="text-align:left;" width="70%">Proyek Name</th>
                                                                                <th style="text-align:left;" width="30%">Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                        </tbody>
                                                                    </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            const loadSpin = `
                                            <div class="d-flex justify-content-center align-items-center mt-5">
                                                <div class="spinner-grow text-primary" role="status"></div>
                                                <div class="spinner-grow text-primary" role="status"></div>
                                                <div class="spinner-grow text-primary" role="status"></div>
                                                <div class="spinner-grow text-primary" role="status"></div>
                                                <div class="spinner-grow text-primary" role="status"></div>
                                            </div>
                                        `;

            const getlistProyek = () => {
                const txtSearch = $('#txSearch').val();

                $.ajax({
                    url: "{{ route('getlistProyek') }}",
                    method: "GET",
                    data: {
                        txSearch: txtSearch
                    },
                    beforeSend: () => {
                        $('#containerProyek').html(loadSpin)
                    }
                })
                    .done(res => {
                        $('#containerProyek').html(res)
                        $('#tableProyek').DataTable({
                            searching: false,
                            lengthChange: false,
                            "bSort": true,
                            "aaSorting": [],
                            pageLength: 7,
                            "lengthChange": false,
                            responsive: true,
                            language: {
                                search: ""
                            }
                        });
                    })
            }

            getlistProyek();

            $('#saveProyek').on('click', function () {
                let proyekName = $('#proyekName').val();
                let description = $('#description').val();

                let isValid = true;

                if (proyekName === '') {
                    $('#proyekNameError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#proyekNameError').addClass('d-none');
                }
                if (isValid) {
                    $.ajax({
                        url: "{{ route('store') }}",
                        method: "POST",
                        data: {
                            name: proyekName,
                            description: description,
                            _token: "{{ csrf_token() }}"
                        },

                        success: function (response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Proyek berhasil ditambahkan!',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(() => {
                                $('#modalTambahProyek').modal('hide');
                                getlistProyek();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Terjadi kesalahan, coba lagi!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    });
                }
            });
            $('#modalTambahProyek').on('hidden.bs.modal', function () {
                $('#proyekName,#description').val('');
                if (!$('#proyekNameError').hasClass('d-none')) {
                    $('#proyekNameError').addClass('d-none');
                }
            });
            $('#modalEditProyek').on('hidden.bs.modal', function () {
                $('#editProyekName, #editDescription').val('');
                if (!$('#proyekNameEditError').hasClass('d-none')) {
                    $('#proyekNameEditError').addClass('d-none');

                }
            });

            $(document).on('click', '.btnUpdateProyek', function (e) {
                var proyekid = $(this).data('id');
                $.ajax({
                    url: '/proyek/' + proyekid,
                    method: 'GET',
                    success: function (response) {
                        $('#editProyekName').val(response.name);
                        $('#editDescription').val(response.description);
                        $('#modalEditProyek').modal('show');
                        $('#editProyek').data('id', proyekid);
                    },
                    error: function () {
                        showMessage("error", "Terjadi kesalahan saat mengambil data");
                    }
                });
            });

            $('#editProyek').on('click', function () {
                var proyekid = $(this).data('id');
                var editProyekName = $('#editProyekName').val();
                var editDescription = $('#editDescription').val();

                let isValid = true;

                if (editProyekName === '') {
                    $('#proyekNameEditError').removeClass('d-none');
                    isValid = false;
                } else {
                    $('#proyekNameEditError').addClass('d-none');
                }


                if (isValid) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        }
                    });
                    $.ajax({
                        url: '/proyek/update/' + proyekid,
                        method: 'PUT',
                        data: {
                            name: editProyekName,
                            description: editDescription,
                        },
                        success: function (response) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: 'Proyek berhasil diupdate!',
                                showConfirmButton: false,
                                timer: 1000
                            }).then(() => {
                                $('#modalEditProyek').modal('hide');
                                getlistProyek();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                title: 'Terjadi kesalahan, coba lagi!',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        }
                    });
                }
            });
            $(document).on('click', '.btnDestroyProyek', function (e) {
                let id = $(this).data('id');

                        $.ajax({
                            type: "DELETE",
                            url: '/proyek/delete/' + id,
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                id: id,
                            },
                            success: function (response) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Proyek berhasil diHapus!',
                                    showConfirmButton: false,
                                    timer: 1000
                                }).then(() => {
                                    getlistProyek();
                                });
                            },
                            error: function (xhr) {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'error',
                                    title: 'Terjadi kesalahan, coba lagi!',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            }
                        });
            });
        });
    </script>
@endsection