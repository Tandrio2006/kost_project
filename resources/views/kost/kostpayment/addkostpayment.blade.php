@extends('layout.main')

@section('title', 'Payment | Add Payment')

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
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Buat Payment</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Payment</li>
                <li class="breadcrumb-item text-secondary">Buat Payment</li>
            </ol>
        </div>

        <a class="btn btn-primary mb-3" href="{{ route('kostpayment') }}"
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
                                    <label for="paymentCabang" class="form-label fw-bold">Cabang</label>
                                    <select class="form-control col-8" name="" id="paymentCabang"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Cabang</option>
                                        <option value="newton">Newton</option>
                                        <option value="Newnewton">Newnewton</option>
                                    </select>
                                    <!-- <div id="currencyInvoiceError" class="text-danger mt-1 d-none">Silahkan Pilih Currency
                                                                                        terlebih dahulu</div> -->
                                </div>
                                <div class="mt-3">
                                    <label for="tipeKamarPayment" class="form-label fw-bold">Tipe Kamar</label>
                                    <select class="form-control col-8" name="" id="tipeKamarPayment"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Tipe</option>
                                        <option value="standart">Standart</option>
                                        <option value="deluxe">Deluxe</option>
                                        <option value="premiere">Premiere</option>
                                        <option value="studio">Studio</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="nomorKamarPayment" class="form-label fw-bold">Nomor Kamar</label>
                                    <select class="form-control col-8" name="" id="nomorKamarPayment"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Kamar</option>
                                        <option value="101">101</option>
                                        <option value="102">102</option>
                                        <option value="103">103</option>
                                        <option value="104">104</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="tenantPayment" class="form-label fw-bold">Tenant</label>
                                    <select class="form-control col-8" name="" id="tenantPayment"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Tenant</option>
                                        <option value="Bambang">Bambang</option>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="luasKamarPayment" class="form-label fw-bold">Luas Kamar</label>
                                    <select class="form-control col-8" name="" id="luasKamarPayment"
                                        style="border-color: #45a9ea;">
                                        <option value="" selected disabled>Pilih Luas</option>
                                        <option value="12">12</option>
                                        <option value="16">16</option>
                                        <option value="18">18</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="divider mt-4">
                            <span>Invoice</span>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="noInvoice" class="form-label fw-bold">No Invoice</label>
                                    <input type="text" class="form-control col-8" id="noInvoice" value=""
                                        placeholder="Masukkan No Invoice" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="noVaPayment" class="form-label fw-bold">No Va</label>
                                    <input type="text" class="form-control col-8" id="noVaPayment" value=""
                                        placeholder="Masukkan Nomor Va" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="dueDatePayment" class="form-label fw-bold">Due Date</label>
                                    <input type="text" class="form-control col-8" id="dueDatePayment" value=""
                                        placeholder="Pilih tanggal" style="border-color: #45a9ea;">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mt-3">
                                    <label for="invoicePayment" class="form-label fw-bold">Invoice</label>
                                    <input type="text" class="form-control col-8" id="invoicePayment" value=""
                                        placeholder="Masukkan Invoice" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="issueDatePayment" class="form-label fw-bold">Issue Date</label>
                                    <input type="text" class="form-control col-8" id="issueDatePayment" value=""
                                        placeholder="Pilih tanggal" style="border-color: #45a9ea;">
                                </div>
                                <div class="mt-3">
                                    <label for="datePayment" class="form-label fw-bold">Payment Date</label>
                                    <input type="text" class="form-control col-8" id="datePayment" value=""
                                        placeholder="Pilih tanggal" style="border-color: #45a9ea;">
                                </div>
                            </div>
                        </div>
                        <div class="divider mt-4">
                            <span>Keterangan</span>
                        </div>
                        <div class="d-flex">
                            <div class="col-6">
                                <div class="input-group mt-3">
                                    <label for="keteranganPayment" class="form-label fw-bold p-1">Keterangan</label>
                                </div>
                                <textarea id="keteranganPayment" class="form-control" aria-label="With textarea" placeholder="Masukkan keterangan"
                                rows="4"></textarea>
                            </div>
                            <div class="col-6">

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
                                <button id="buatPayment" class="btn btn-primary p-3 float-right mt-3"
                                    style="width: 100%; background-color: #45a9ea; border-color: #45a9ea;">Buat
                                    Payment</button>
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