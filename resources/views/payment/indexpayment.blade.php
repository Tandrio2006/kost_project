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
                                <button class="btn btn-danger" id="btnExportPayment">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                                <button type="button" class="btn btn-primary ml-1" id="modalTambahCost"><span
                                        class="pr-2"><i class="fas fa-plus"></i></span>Tambah Payment</button>
                            </div>
                        </div>

                        <div id="containerPayment" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tablePayment">
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr>
                                        <th>Properti</th>
                                        <th>Proyek</th>
                                        <th>Blok</th>
                                        <th>No</th>
                                        <th>LB</th>
                                        <th>LT</th>
                                        <th>Pembeli</th>
                                        <th>Salesperson</th>
                                        <th>Harga Jual</th>
                                        <th>Keterangan</th>
                                        <th>Invoice</th>
                                        <th>Invoice No.</th>
                                        <th>Issue Date</th>
                                        <th>Due Date</th>
                                        <th>Payment Date</th>
                                        <th>Status</th>
                                        <th>Latest Notif</th>
                                        <th>Notif Date</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Keterangan</th>
                                        <th>No. Ref Bukti Bayar</th>
                                        <th>% Terbayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ruko 3 lantai</td>
                                        <td>Pilar 12</td>
                                        <td>A</td>
                                        <td>1</td>
                                        <td>300</td>
                                        <td>120</td>
                                        <td>Bambang</td>
                                        <td>Siti</td>
                                        <td>Rp2.000.000.000,00</td>
                                        <td>Booking fee</td>
                                        <td>Rp5.000.000,00</td>
                                        <td>1234</td>
                                        <td>19-Feb-25</td>
                                        <td>1-Mar-25</td>
                                        <td>-</td>
                                        <td>Due</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>0,25%</td>
                                    </tr>
                                    <tr>
                                        <td>Ruko 2 lantai</td>
                                        <td>Pilar 12</td>
                                        <td>B</td>
                                        <td>2</td>
                                        <td>200</td>
                                        <td>120</td>
                                        <td>Bambang</td>
                                        <td>Siti</td>
                                        <td>Rp990.000.000,00</td>
                                        <td>DP</td>
                                        <td>Rp200.000.000,00</td>
                                        <td>B-1240</td>
                                        <td>28-Feb-25</td>
                                        <td>10-Mar-25</td>
                                        <td>-</td>
                                        <td>Overdue SP2</td>
                                        <td>SP2</td>
                                        <td>11-Mar-25</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>20,20%</td>
                                    </tr>
                                    <tr>
                                        <td>Ruko 2 lantai</td>
                                        <td>Pilar 12</td>
                                        <td>C</td>
                                        <td>3</td>
                                        <td>200</td>
                                        <td>120</td>
                                        <td>Bambang</td>
                                        <td>Siti</td>
                                        <td>Rp1.000.000.000,00</td>
                                        <td>Cicilan DP 20% 1/24</td>
                                        <td>Rp8.333.000,00</td>
                                        <td>B-1240</td>
                                        <td>28-Feb-25</td>
                                        <td>10-Mar-25</td>
                                        <td>1-Mar-25</td>
                                        <td>Overdue SP2</td>
                                        <td>SP2</td>
                                        <td>11-Mar-25</td>
                                        <td>Cash</td>
                                        <td>-</td>
                                        <td>82371893</td>
                                        <td>0,83%</td>
                                    </tr>
                                    <tr>
                                        <td>Rumah 2 lantai</td>
                                        <td>Victory</td>
                                        <td>D</td>
                                        <td>4</td>
                                        <td>140</td>
                                        <td>100</td>
                                        <td>Bambang</td>
                                        <td>Siti</td>
                                        <td>Rp800.000.000,00</td>
                                        <td>Cicilan Cash bertahap 1/4</td>
                                        <td>Rp200.000.000,00</td>
                                        <td>1680</td>
                                        <td>10-Mar-25</td>
                                        <td>20-Mar-25</td>
                                        <td>2-Mar-25</td>
                                        <td>Paid</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>Cek</td>
                                        <td>-</td>
                                        <td>323291837</td>
                                        <td>25,00%</td>
                                    </tr>
                                    <tr>
                                        <td>Rumah 1 lantai</td>
                                        <td>Padjajaran</td>
                                        <td>E</td>
                                        <td>5</td>
                                        <td>30</td>
                                        <td>60</td>
                                        <td>Bambang</td>
                                        <td>Siti</td>
                                        <td>Rp280.000.000,00</td>
                                        <td>Cash keras</td>
                                        <td>Rp280.000.000,00</td>
                                        <td>1800</td>
                                        <td>20-Mar-25</td>
                                        <td>30-Mar-25</td>
                                        <td>3-Mar-25</td>
                                        <td>Paid</td>
                                        <td>M-1 Close</td>
                                        <td>3-Mar-25</td>
                                        <td>Transfer</td>
                                        <td>BRI a/n Bambang Budiono</td>
                                        <td>27382739</td>
                                        <td>100,00%</td>
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