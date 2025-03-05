@extends('layout.main')

@section('title', 'Property | Data Property')

@section('main')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Data Property</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Property</li>
                <li class="breadcrumb-item active font-weight-bold" style="color: #45a9ea;" aria-current="page">Data
                    Property</li>
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
                                <button class="btn btn-danger" id="btnExportProperty">
                                    <i class="fas fa-file-pdf"></i> Export PDF
                                </button>
                                <button type="button" class="btn btn-primary ml-1" id="modalTambahCost"><span
                                        class="pr-2"><i class="fas fa-plus"></i></span>Tambah Property</button>
                            </div>
                        </div>
                        <div id="containerProperty" class="table-responsive">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                    id="tableProperty">
                                    <thead>
                                        <tr>
                                            <th>Total :</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th>Rp5.100.000.000,00</th>
                                            <th>Rp3.070.000.000,00</th>
                                            <th></th>
                                            <th></th>
                                            <th>Rp885.000.000,00</th>
                                            <th>28,83%</th>
                                        </tr>
                                    </thead>
                                    <thead style="background-color: #45a9ea; color: white;">
                                        <tr>
                                            <th>Properti</th>
                                            <th>Proyek</th>
                                            <th>Blok</th>
                                            <th>No</th>
                                            <th>LB</th>
                                            <th>LT</th>
                                            <th>Status</th>
                                            <th>Tanggal Terjual</th>
                                            <th>Pembeli</th>
                                            <th>Salesperson</th>
                                            <th>Harga Pricelist</th>
                                            <th>Harga Jual</th>
                                            <th>Invoice Bundle</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Jumlah Terbayar</th>
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
                                            <td>Available</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>Rp2.000.000.000,00</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>Ruko 2 lantai</td>
                                            <td>Pilar 12</td>
                                            <td>B</td>
                                            <td>2</td>
                                            <td>200</td>
                                            <td>120</td>
                                            <td>Booked</td>
                                            <td>02-Jan-25</td>
                                            <td>Bambang</td>
                                            <td>Siti</td>
                                            <td>Rp1.000.000.000,00</td>
                                            <td>Rp990.000.000,00</td>
                                            <td>P12B2&C3</td>
                                            <td>Cash keras</td>
                                            <td>Rp5.000.000,00</td>
                                            <td>0,51%</td>
                                        </tr>
                                        <tr>
                                            <td>Ruko 2 lantai</td>
                                            <td>Pilar 12</td>
                                            <td>C</td>
                                            <td>3</td>
                                            <td>200</td>
                                            <td>120</td>
                                            <td>On installment</td>
                                            <td>03-Jan-25</td>
                                            <td>Bambang</td>
                                            <td>Siti</td>
                                            <td>Rp1.000.000.000,00</td>
                                            <td>Rp1.000.000.000,00</td>
                                            <td>P12B2&C3</td>
                                            <td>Cash bertahap 24x</td>
                                            <td>Rp300.000.000,00</td>
                                            <td>30,00%</td>
                                        </tr>
                                        <tr>
                                            <td>Rumah 2 lantai</td>
                                            <td>Victory</td>
                                            <td>D</td>
                                            <td>4</td>
                                            <td>140</td>
                                            <td>100</td>
                                            <td>Overdue</td>
                                            <td>04-Jan-25</td>
                                            <td>Bambang</td>
                                            <td>Siti</td>
                                            <td>Rp800.000.000,00</td>
                                            <td>Rp800.000.000,00</td>
                                            <td>P12B2&C</td>
                                            <td>KPR DP 10%</td>
                                            <td>Rp300.000.000,00</td>
                                            <td>37,50%</td>
                                        </tr>
                                        <tr>
                                            <td>Rumah 1 lantai</td>
                                            <td>Padjajaran</td>
                                            <td>E</td>
                                            <td>5</td>
                                            <td>30</td>
                                            <td>60</td>
                                            <td>Closed</td>
                                            <td>05-Jan-25</td>
                                            <td>Bambang</td>
                                            <td>Siti</td>
                                            <td>Rp300.000.000,00</td>
                                            <td>Rp280.000.000,00</td>
                                            <td>P12B2&C</td>
                                            <td>Sewa beli</td>
                                            <td>Rp280.000.000,00</td>
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