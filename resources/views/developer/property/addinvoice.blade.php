@extends('layout.main')

@section('title', 'Property | Add Invoice')

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
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Buat Invoice</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Property</li>
                <li class="breadcrumb-item text-secondary">Invoice</li>
                <li class="breadcrumb-item text-secondary">Buat Property</li>
            </ol>
        </div>

        <a class="btn btn-primary mb-3" href="{{ route('invoice') }}"
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
                                    <label for="noInvoice" class="form-label fw-bold">No Invoice</label>
                                    <input type="text" class="form-control col-8" id="noInvoice" value=""
                                        placeholder="Masukkan No Invoice" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="propertiInvoice" class="form-label fw-bold">Properti</label>
                                    <select class="form-control col-8" name="" id="propertiInvoice"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Properti</option>
                                        <option value="pilar12">Pilar 12</option>
                                        <option value="victory">Victory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="proyekInvoice" class="form-label fw-bold">Proyek</label>
                                    <select class="form-control col-8" name="" id="proyekInvoice"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Proyek</option>
                                        <option value="pilar12">Pilar 12</option>
                                        <option value="victory">Victory</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="blokInvoice" class="form-label fw-bold">Blok</label>
                                    <select class="form-control col-8" name="" id="blokInvoice"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Blok</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="invoiceNo" class="form-label fw-bold">No</label>
                                    <select class="form-control col-8" name="" id="invoiceNo"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih No</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="invoiceNo" class="form-label fw-bold">LB</label>
                                    <select class="form-control col-8" name="" id="invoiceNo"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Lb</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="divider mt-4">
                            <span>Harga</span>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="hargaPricelist" class="form-label fw-bold">Harga Pricelist</label>
                                    <input type="text" class="form-control col-8" id="hargaPricelist" value=""
                                        placeholder="Masukkan Harga" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="jumlahTerbayar" class="form-label fw-bold">Jumlah Terbayar</label>
                                    <input type="text" class="form-control col-8" id="jumlahTerbayar" value=""
                                        placeholder="Masukkan Harga" disabled style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="persenTerbayar" class="form-label fw-bold">% Terbayar</label>
                                    <input type="text" class="form-control col-8" id="persenTerbayar" value=""
                                        placeholder="Masukkan Harga" disabled style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="tanggalTerjual" class="form-label fw-bold">Harga Jual</label>
                                    <input type="text" class="form-control col-8" id="tanggalTerjual" value=""
                                        placeholder="Masukkan Harga" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="jenisPembayaran" class="form-label fw-bold">Jenis Pembayaran</label>
                                    <select class="form-control col-8" name="" id="jenisPembayaran"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Jenis Pembayaran</option>
                                        <option value="cashkeras">Cash Keras</option>
                                        <option value="cashbertahap">Cash Bertahap x24</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class="col-4 float-right">
                                <p class="mb-0">Jumlah Terbayar</p>
                                <div class="box bg-light text-dark p-3 mt-2"
                                    style="border: 1px solid #45a9ea; border-radius: 8px; font-size: 1.5rem;">
                                    <span id="jumlah-terbayar" style="font-weight: bold;">Rp. 0</span>
                                </div>
                                <button id="buatInvoice" class="btn btn-primary p-3 float-right mt-3"
                                    style="width: 100%; background-color: #45a9ea; border-color: #45a9ea;">Buat
                                    Invoice</button>
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