@extends('layout.main')

@section('title', 'Branch | Add Branch')

@section('main')


    <style>
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #cccccc;
        }

        .divider::before {
            margin-right: .25em;
        }

        .divider::after {
            margin-left: .25em;
        }

        .divider span {
            padding: 0 10px;
            font-weight: bold;
            color: #555555;
        }
    </style>


    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Buat Branch</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Branch</li>
                <li class="breadcrumb-item text-secondary">Buat Branch</li>
            </ol>
        </div>

        <a class="btn btn-primary mb-3" href="{{ route('branch') }}"
            style="background-color: #45a9ea; border-color: #45a9ea;">
            <i class="fas fa-arrow-left"></i>
            Back
        </a>

        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="branchCabang" class="form-label fw-bold">Cabang</label>
                                    <select class="form-control col-8" name="" id="branchCabang"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Cabang</option>
                                        <option value="newton">Newton</option>
                                        <option value="Newnewton">Newnewton</option>
                                    </select>
                                    <!-- <div id="currencyInvoiceError" class="text-danger mt-1 d-none">Silahkan Pilih Currency
                                                                        terlebih dahulu</div> -->
                                </div>
                                <div class="mt-3">
                                    <label for="jumlahKamar" class="form-label fw-bold">Jumlah Kamar</label>
                                    <input type="text" class="form-control col-8" id="jumlahKamar" value=""
                                        placeholder="Masukkan Jumlah Kamar" style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="listedDate" class="form-label fw-bold">Listed Date</label>
                                    <input type="text" class="form-control col-8" id="listedDate" value=""
                                        placeholder="Pilih tanggal" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="periodeBranch" class="form-label fw-bold">Periode</label>
                                    <input type="text" class="form-control col-8" id="periodeBranch" value=""
                                        placeholder="Pilih tanggal" style="border-color: #45a9ea;">
                                </div>

                            </div>
                        </div>
                        <div class="divider mt-4">
                            <span>Admin</span>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="namaAdmin" class="form-label fw-bold">Nama Admin</label>
                                    <select class="form-control col-8" name="" id="namaAdmin"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Admin</option>
                                        <option value="Lisa">Lisa</option>
                                        <option value="Ilham">Ilham</option>
                                    </select>
                                    <!-- <div id="currencyInvoiceError" class="text-danger mt-1 d-none">Silahkan Pilih Currency
                                                                        terlebih dahulu</div> -->
                                </div>
                                <div class="mt-3">
                                    <label for="emailBranch" class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control col-8" id="emailBranch" value=""
                                        placeholder="Masukkan Email" style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="noHpBranch" class="form-label fw-bold">No Hp</label>
                                    <input type="text" class="form-control col-8" id="noHpBranch" value=""
                                        placeholder="Masukkan No Hp" style="border-color: #45a9ea;">
                                </div>
                            </div>
                        </div>
                        <div class="divider mt-4">
                            <span>AVG</span>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="avgLeastRate" class="form-label fw-bold">Avg Least Rate</label>
                                    <input type="text" class="form-control col-8" id="avgLeastRate" value=""
                                        placeholder="Masukkan Jumlah Rate" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="avgTenantTurnoverRate" class="form-label fw-bold">Avg Tenant Turnover
                                        Rate</label>
                                    <input type="text" class="form-control col-8" id="avgTenantTurnoverRate" value=""
                                        placeholder="Masukkan Jumlah Rate" style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="avgIncome" class="form-label fw-bold">Avg Income</label>
                                    <input type="text" class="form-control col-8" id="avgIncome" value=""
                                        placeholder="Masukkan Jumlah Rate" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="avgOccupancy" class="form-label fw-bold">Avg Occupancy</label>
                                    <input type="text" class="form-control col-8" id="avgOccupancy" value=""
                                        placeholder="Masukkan Jumlah Rate" style="border-color: #45a9ea;">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="col-4 float-right">
                                <p class="mb-0">Total Harga</p>
                                <div class="box bg-light text-dark p-3 mt-2"
                                    style="border: 1px solid #45a9ea; border-radius: 8px; font-size: 1.5rem;">
                                    <span id="total-harga" style="font-weight: bold;">Rp. 0</span>
                                </div>
                                <input type="hidden" name="" id="totalHargaValue">
                                <button id="buatInvoice" class="btn btn-primary p-3 float-right mt-3"
                                    style="width: 100%; background-color: #45a9ea; border-color: #45a9ea;">Buat
                                    Branch</button>
                            </div>
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