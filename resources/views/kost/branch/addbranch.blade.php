@extends('layout.main')

@section('title', 'Branch | Add Branch')

@section('main')


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
                <div class="card mb-4" style="border-color: #45a9ea;">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="branchCabang" class="form-label fw-bold">Cabang</label>
                                    <select class="form-control col-8" name="" id="branchCabang"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Branch</option>
                                        <option value="newton">Newton</option>
                                        <option value="Newnewton">Newnewton</option>
                                    </select>
                                    <!-- <div id="currencyInvoiceError" class="text-danger mt-1 d-none">Silahkan Pilih Currency
                                        terlebih dahulu</div> -->
                                </div>
                                <div class="mt-3">
                                    <label for="tanggal" class="form-label fw-bold">Tanggal
                                        Buat</label>
                                    <input type="text" class="form-control col-8" id="tanggalBuat" value=""
                                        placeholder="Pilih tanggal" disabled style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="currencyInvoice" class="form-label fw-bold">Currency</label>
                                    <select class="form-control col-8" name="" id="currencyInvoice"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Currency</option>
                                    </select>
                                    <div id="currencyInvoiceError" class="text-danger mt-1 d-none">Silahkan Pilih Currency
                                        terlebih dahulu</div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">


                            </div>
                            <div class="col-6">

                            </div>
                        </div>
                        <div class="form-group row">

                        </div>

                        <div class="form-group row mt-3">

                        </div>

                        <div class="form-grup row mt-3">

                        </div>

                        <!-- Tabel Input Berat dan Dimensi -->
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Resi</th>
                                    <th>Berat/Dimensi</th>
                                    <th>Hitungan</th>
                                    <th>Harga</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="barang-list">
                            </tbody>
                        </table>

                        <div class="row">

                        </div>
                        <div class="col-12 mt-4">
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