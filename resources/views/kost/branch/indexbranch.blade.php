@extends('layout.main')

@section('title', 'Branch')

@section('main')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Branch</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Branch</li>
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
                                <button type="button" class="btn btn-primary ml-1" id="modalTambahCost"><span
                                        class="pr-2"><i class="fas fa-plus"></i></span>Tambah Branch</button>
                            </div>
                        </div>

                        <div id="containerInvoice" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tableInvoice">
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr>
                                        <th>Cabang</th>
                                        <th>Listed Date</th>
                                        <th>Jumlah Kamar</th>
                                        <th>Nama Admin</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Period</th>
                                        <th>Avg Lease Rate</th>
                                        <th>Avg Income</th>
                                        <th>Avg Tenant Turnover Rate</th>
                                        <th>Avg Occupancy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Newton</td>
                                        <td>01-Mar-24</td>
                                        <td>26</td>
                                        <td>Lisa</td>
                                        <td>6282161110002</td>
                                        <td>newton@suite21.com</td>
                                        <td>1 Mar 24 - 1 Dec 24</td>
                                        <td>Rp2.000.000,00</td>
                                        <td>Rp52.000.000,00</td>
                                        <td>20,00%</td>
                                        <td>85,00%</td>
                                    </tr>
                                    <tr>
                                        <td>Pilar 12</td>
                                        <td>01-Mar-25</td>
                                        <td>62</td>
                                        <td>Andi</td>
                                        <td>6282161110003</td>
                                        <td>pilar12@suite21.com</td>
                                        <td>5 Mar 24 - 1 Dec 24</td>
                                        <td>Rp2.000.004,00</td>
                                        <td>Rp124.000.000,00</td>
                                        <td>20,00%</td>
                                        <td>85,00%</td>
                                    </tr>
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

    </script>
@endsection