@extends('layout.main')

@section('title', 'Proyek')

@section('main')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Proyek</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Proyek</li>
            </ol>
        </div>

        <!-- Modal for Adding Proyek -->
        <div class="modal fade" id="modalTambahProyek" tabindex="-1" role="dialog" aria-labelledby="modalTambahProyekTitle" aria-hidden="true">
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
                                <input type="text" id="proyekName" class="form-control" placeholder="Input Proyek Name" required>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description:</label>
                                <input type="text" id="description" class="form-control" placeholder="Input Proyek Description">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="saveProyek" class="btn text-white" style="background-color: #45a9ea;">Save</button>
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
                                <button type="button" class="btn btn-outline-danger ml-2" id="btnResetDefault" onclick="window.location.reload()">
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
                                <button type="button" class="btn btn-primary ml-1" data-toggle="modal" data-target="#modalTambahProyek">
                                    <span class="pr-2"><i class="fas fa-plus"></i></span>Add Proyek
                                </button>
                            </div>
                        </div>
                        
                        <div id="containerInvoice" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm" id="tableInvoice">
                                <thead style="background-color: #45a9ea; color: white;" width="100%">
                                    <tr>
                                        <th style="text-align:left;" width="70%">Proyek Name</th>
                                        <th style="text-align:left;" width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proyek as $proyek)
                                        <tr>
                                            <td style="text-align:left;">{{$proyek->name}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
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
    $(document).ready(function () {
        $('#saveProyek').on('click', function () {
            let proyekName = $('#proyekName').val();
            let description = $('#description').val();
            
            if (proyekName.trim() === '') {
                alert('Nama proyek tidak boleh kosong!');
                return;
            }

            $.ajax({
                url: "{{ route('store') }}",
                method: "POST",
                data: {
                    name: proyekName,
                    description: description,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    alert('Proyek Successfully Added');
                    location.reload();
                },
                error: function (xhr) {
                    alert('Something Went Wrong, Please Try Again');
                }
            });
        });
    });
</script>
@endsection
