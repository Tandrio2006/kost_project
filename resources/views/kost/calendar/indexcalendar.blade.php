@extends('layout.main')

@section('title', 'Calendar')

@section('main')
    <style>
        .status-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
            border: 1px solid black;
        }

        .icon {
            margin-right: 10px;
            margin-bottom: 5px;
        }

        .available {
            background-color: white;
        }

        .reserved {
            background-color: #FFB433;
        }

        .confirmed {
            background-color: #45a9ea;
        }

        .unavailable {
            background-color: grey;
        }
    </style>

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Calendar</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Calendar</li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow-lg border-0  mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="input-group w-auto" style="max-width: 300px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-white px-3" style="background-color: #45a9ea;">
                                            <i class="fas fa-search"></i>
                                        </span>
                                    </div>
                                    <input id="txSearch" type="text" class="form-control" placeholder="Search">
                                </div>

                                <button id="monthEvent" class="btn btn-light border mr-2 ml-2" style="min-width: 170px;">
                                    <span id="calendarTitle" class="fs-3"></span>
                                </button>

                                <button type="button" class="btn btn-outline-danger" id="btnResetDefault"
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
                        <div class="d-flex gap-3 ">
                            <div class="d-flex align-items-center icon">
                                <span class="status-indicator available"></span>
                                <span>Available</span>
                            </div>
                            <div class="d-flex align-items-center icon">
                                <span class="status-indicator reserved"></span>
                                <span>Reserved</span>
                            </div>
                            <div class="d-flex align-items-center icon">
                                <span class="status-indicator confirmed"></span>
                                <span>Confirmed</span>
                            </div>
                            <div class="d-flex align-items-center icon">
                                <span class="status-indicator unavailable"></span>
                                <span>Unavailable</span>
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
                                        <td>Stpandard</td>
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
        // function getCurrentMonth() {
        //     const months = [
        //         'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
        //         'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        //     ];

        //     const currentDate = new Date();
        //     const currentMonth = months[currentDate.getMonth()];
        //     const currentYear = currentDate.getFullYear();

        //     return `${currentMonth} ${currentYear}`;
        // }

        // let selectedMonth = '';

        // $(document).ready(function () {
        //     $('#calendarTitle').text(getCurrentMonth());

        //     const monthFilterInput = $('#monthEvent');

        //     const flatpickrInstance = flatpickr(monthFilterInput[0], {
        //         plugins: [
        //             new monthSelectPlugin({
        //                 shorthand: true,
        //                 dateFormat: "M Y",
        //                 altFormat: "M Y",
        //                 theme: "light"
        //             })
        //         ],
        //         onChange: function (selectedDates, dateStr, instance) {
        //             const selectedDate = selectedDates[0];
        //             selectedMonth = instance.formatDate(selectedDate, "M Y");
        //             $('#calendarTitle').text(selectedMonth);
        //             getDataDashboard();
        //         }
        //     });

        //     function triggerChange() {
        //         const today = new Date();
        //         flatpickrInstance.setDate(today, true);
        //     }

        //     triggerChange();
        // });
        // $(document).ready(function () {
        //     let today = new Date();
        //     let year = today.getFullYear();
        //     let month = today.getMonth();
        //     let daysInMonth = new Date(year, month + 1, 0).getDate();

        //     let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        //     let monthName = monthNames[month];

        //     let $headerRow = $("#headerRow");
        //     let $tableBody = $("#tableBody");

        //     for (let day = 1; day <= daysInMonth; day++) {
        //         let formattedDate = `${day}-${monthName}-${year}`;
        //         $headerRow.append(`<th>${formattedDate}</th>`);
        //     }

        //     $tableBody.find("tr").each(function () {
        //         for (let day = 1; day <= daysInMonth; day++) {
        //             $(this).append("<td></td>");
        //         }
        //     });
        // });

        function getCurrentMonth() {
        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const currentDate = new Date();
        const currentMonth = months[currentDate.getMonth()];
        const currentYear = currentDate.getFullYear();
        return `${currentMonth} ${currentYear}`;
    }

    function updateTableForMonth(year, month) {
        let daysInMonth = new Date(year, month + 1, 0).getDate();
        let monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        let monthName = monthNames[month];

        let $headerRow = $("#headerRow");
        let $tableBody = $("#tableBody");

        // Hapus tanggal lama
        $headerRow.find("th:gt(2)").remove();
        $tableBody.find("tr").each(function () {
            $(this).find("td:gt(2)").remove();
        });

        // Tambahkan tanggal baru
        for (let day = 1; day <= daysInMonth; day++) {
            let formattedDate = `${day}-${monthName}-${year}`;
            $headerRow.append(`<th>${formattedDate}</th>`);
        }

        // Tambahkan sel kosong untuk setiap tanggal dalam bulan
        $tableBody.find("tr").each(function () {
            for (let day = 1; day <= daysInMonth; day++) {
                $(this).append("<td></td>");
            }
        });
    }

    $(document).ready(function () {
        $('#calendarTitle').text(getCurrentMonth());

        const monthFilterInput = $('#monthEvent');

        const flatpickrInstance = flatpickr(monthFilterInput[0], {
            plugins: [
                new monthSelectPlugin({
                    shorthand: true,
                    dateFormat: "M Y",
                    altFormat: "M Y",
                    theme: "light"
                })
            ],
            onChange: function (selectedDates, dateStr, instance) {
                const selectedDate = selectedDates[0];
                const selectedMonth = selectedDate.getMonth();
                const selectedYear = selectedDate.getFullYear();

                $('#calendarTitle').text(dateStr);
                updateTableForMonth(selectedYear, selectedMonth);
            }
        });

        // Inisialisasi tabel dengan bulan saat ini
        let today = new Date();
        updateTableForMonth(today.getFullYear(), today.getMonth());
    });

    </script>
@endsection