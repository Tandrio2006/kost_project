@extends('layout.main')

@section('title', 'Property | Invoice')

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

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Invoice</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Property</li>
                <li class="breadcrumb-item active font-weight-bold" style="color: #45a9ea;" aria-current="page">Invoice</li>
            </ol>
        </div>

        <!-- Filter Modal -->
        <!-- <div class="modal fade" id="modalFilterTanggal" tabindex="-1" role="dialog" aria-labelledby="modalFilterTanggalTitle" aria-hidden="true">
                                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                                <div class="modal-content shadow-lg border-0">
                                                                                    <div class="modal-header" style="background-color: #45a9ea; color: white;">
                                                                                        <h5 class="modal-title" id="modalFilterTanggalTitle">Filter Data</h5>
                                                                                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Customer:</label>
                                                                                            <select class="form-control select2" id="customer">
                                                                                                <option value="" selected disabled>Pilih Customer</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="font-weight-bold">Pilih Tanggal:</label>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <input type="date" id="startDate" class="form-control rounded-lg" style="width: 200px;">
                                                                                                <span class="mx-2 text-muted">sampai</span>
                                                                                                <input type="date" id="endDate" class="form-control rounded-lg" style="width: 200px;">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" id="saveFilterTanggal" class="btn text-white" style="background-color: #45a9ea;">Save</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> -->

        <!-- Table Section -->
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
                                <button class="btn btn-danger" id="btnExportInvoice">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                                <a class="btn btn-primary" href="{{ route('indexaddinvoice') }}" id=""><span class="pr-2"><i
                                            class="fas fa-plus"></i></span>Buat Invoice</a>

                            </div>
                        </div>

                        <div id="containerInvoice" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tableInvoice">
                                <!-- <thead>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </thead> -->
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr>
                                        <th>No Invoice</th>
                                        <th>Properti</th>
                                        <th>Proyek</th>
                                        <th>Blok</th>
                                        <th>No</th>
                                        <th>LB</th>
                                        <th>LT</th>
                                        <th>Harga Pricelist</th>
                                        <th>Harga Terjual</th>
                                        <th>Tanggal Pembukuan</th>
                                        <th>Tanggal Buat</th>
                                        <th>Status</th>
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
        // $(document).ready(function () {
        //     var table = $('#tableInvoice').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         ajax: {
        //             url: "",
        //             type: "GET"
        //         },
        //         columns: [{
        //             data: 'no_invoice',
        //             name: 'no_invoice'
        //         },
        //         {
        //             data: 'name',
        //             name: 'name'
        //         },
        //         {
        //             data: 'name',
        //             name: 'name'
        //         },
        //         {
        //             data: 'blok',
        //             name: 'blok'
        //         },
        //         {
        //             data: 'no',
        //             name: 'no'
        //         },
        //         {
        //             data: 'lb',
        //             name: 'lb'
        //         },
        //         {
        //             data: 'lt',
        //             name: 'lt'
        //         },
        //         {
        //             data: 'harga_pricelist',
        //             name: 'harga_pricelist'
        //         },
        //         {
        //             data: 'harga_terjual',
        //             name: 'harga_terjual'
        //         },
        //         {
        //             data: 'tanggal_pembukuan',
        //             name: 'tanggal_pembukuan'
        //         },
        //         {
        //             data: 'tanggal_buat',
        //             name: 'tanggal_buat'
        //         },
        //         {
        //             data: 'status_pembayaran',
        //             name: 'status_pembayaran'
        //         },
        //         {
        //             data: 'action',
        //             name: 'action',
        //             orderable: false,
        //             searchable: false
        //         }
        //         ],
        //         order: [],
        //         lengthChange: false,
        //         pageLength: 10,
        //         language: {
        //             processing: '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>', // Custom spinner saat processing
        //             info: "_START_ to _END_ of _TOTAL_ entries",
        //             infoEmpty: "Showing 0 to 0 of 0 entries",
        //             emptyTable: "No data available in table",
        //             loadingRecords: "Loading...",
        //             zeroRecords: "No matching records found"
        //         },
                // columnDefs: [{
                //     targets: '_all',
                //     className: 'text-center'
                // }]
        //     });
        // });
    </script>
@endsection