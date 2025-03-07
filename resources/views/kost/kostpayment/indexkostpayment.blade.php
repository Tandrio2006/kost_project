@extends('layout.main')

@section('title', 'Payment')

@section('main')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Payment</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Payment</li>
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
                                        class="pr-2"><i class="fas fa-plus"></i></span>Tambah Payment</button>
                            </div>
                        </div>

                        <div id="containerInvoice" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tableInvoice">
                                <thead>
                                    <th>Total :</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>2.900.000,00</th>
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
                                </thead>
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr>
                                        <th>Cabang</th>
                                        <th>Tipe Kamar</th>
                                        <th>Nomor Kamar</th>
                                        <th>Luas Kamar</th>
                                        <th>Tenant</th>
                                        <th>Keterangan</th>
                                        <th>Invoice No.</th>
                                        <th>Invoice</th>
                                        <th>VA No.</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Card Issued</th>
                                        <th>Latest Notif</th>
                                        <th>Notif Date</th>
                                        <th>No. Ref Bukti Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Newton</td>
                                        <td>Standard</td>
                                        <td>103</td>
                                        <td>12</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td style="background-color: red; color: white;">Card issued wo payment</td>
                                        <td>✓</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Newton</td>
                                        <td>Standard</td>
                                        <td>201</td>
                                        <td>12</td>
                                        <td>Bambang</td>
                                        <td>Booking fee</td>
                                        <td>1234</td>
                                        <td>Rp500.000,00</td>
                                        <td>103985769</td>
                                        <td>19-Feb-25</td>
                                        <td>1-Mar-25</td>
                                        <td>-</td>
                                        <td style="background-color: orange; color: white;">Due</td>
                                        <td>✓</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Newton</td>
                                        <td>Deluxe</td>
                                        <td>202</td>
                                        <td>15</td>
                                        <td>Bambang</td>
                                        <td>Uang jaminan</td>
                                        <td>B-1240</td>
                                        <td>Rp1.000.000,00</td>
                                        <td>103985770</td>
                                        <td>28-Feb-25</td>
                                        <td>10-Mar-25</td>
                                        <td>-</td>
                                        <td style="background-color: brown; color: white;">Overdue</td>
                                        <td>✓</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>Newton</td>
                                        <td>Premiere</td>
                                        <td>203</td>
                                        <td>18</td>
                                        <td>Bambang</td>
                                        <td>Uang sewa 1 Mar 24-1Apr 24</td>
                                        <td>B-1240</td>
                                        <td>Rp1.200.000,00</td>
                                        <td>103985771</td>
                                        <td>28-Feb-25</td>
                                        <td>10-Mar-25</td>
                                        <td>-</td>
                                        <td style="background-color: gray; color: white;">Canceled</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>82371893</td>
                                    </tr>
                                    <tr>
                                        <td>Pilar 12</td>
                                        <td>Standard</td>
                                        <td>301</td>
                                        <td>12</td>
                                        <td>Bambang</td>
                                        <td>Denda kehilangan kartu kamar</td>
                                        <td>1680</td>
                                        <td>Rp200.000,00</td>
                                        <td>103985772</td>
                                        <td>10-Mar-25</td>
                                        <td>20-Mar-25</td>
                                        <td>2-Mar-25</td>
                                        <td style="background-color: lightblue; color: black;">Paid</td>
                                        <td>✓</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>323291837</td>
                                    </tr>
                                    <tr>
                                        <td>Pilar 12</td>
                                        <td>Studio</td>
                                        <td>302</td>
                                        <td>14</td>
                                        <td>Bambang</td>
                                        <td>Uang sewa 1 Mar 24-1Apr 24</td>
                                        <td>1800</td>
                                        <td>Rp1.200.000,00</td>
                                        <td>103985773</td>
                                        <td>20-Mar-25</td>
                                        <td>30-Mar-25</td>
                                        <td>3-Mar-25</td>
                                        <td style="background-color: lightblue; color: black;">Paid</td>
                                        <td>✓</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>27382739</td>
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