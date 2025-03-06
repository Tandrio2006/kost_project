@extends('layout.main')

@section('title', 'Calendar')

@section('main')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Calendar</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Calendar</li>
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
                                        class="pr-2"><i class="fas fa-plus"></i></span>Tambah Calendar</button>
                            </div>
                        </div>

                        <div id="containerCalendar" class="table-responsive">
                            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm"
                                id="tableCalendar">
                                <thead style="background-color: #45a9ea; color: white;">
                                    <tr id="headerRow">
                                        <th>Cabang</th>
                                        <th>Tipe Kamar</th>
                                        <th>Nomer Kamar</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr>
                                        <td>Newton</td>
                                        <td>Standard</td>
                                        <td>201</td>
                                    </tr>
                                    <tr>
                                        <td>Pilar 12</td>
                                        <td>Standard</td>
                                        <td>301</td>
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
        $(document).ready(function() {
            let today = new Date();
            let year = today.getFullYear();
            let month = today.getMonth();
            let daysInMonth = new Date(year, month + 1, 0).getDate();

            let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            let monthName = monthNames[month];

            let $headerRow = $("#headerRow");
            let $tableBody = $("#tableBody");

            for (let day = 1; day <= daysInMonth; day++) {
                let formattedDate = `${day}-${monthName}-${year}`;
                $headerRow.append(`<th>${formattedDate}</th>`);
            }

            $tableBody.find("tr").each(function() {
                for (let day = 1; day <= daysInMonth; day++) {
                    $(this).append("<td></td>");
                }
            });
        });
    </script>
@endsection
