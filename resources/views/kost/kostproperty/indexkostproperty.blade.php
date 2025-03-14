@extends('layout.main')

@section('title', 'Property')

@section('main')
    <style>
        .seat-container {
            display: grid;
            grid-template-columns: repeat(14, 50px);
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .seat {
            width: 35px;
            height: 35px;
            text-align: center;
            line-height: 35px;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #007bff;
            color: white;
            border: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .btn-circle:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }

        .available {
            background-color: white;
            border: solid 1px black;
        }

        .confirmed {
            background-color: #45a9ea;
            color: white;
        }

        .reserved {
            background-color: #FFB433;
            color: white;
        }

        .unavailable {
            background-color: gray;
            color: white;
        }
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

        .available-status {
            background-color: white;
        }

        .reserved-status {
            background-color: #FFB433;
        }

        .confirmed-status {
            background-color: #45a9ea;
        }

        .unavailable-status {
            background-color: grey;
        }
    </style>

    <div class="container-fluid mt-4">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800 px-4 font-weight-bold" style="color: #45a9ea;">Property</h1>
            <ol class="breadcrumb bg-light px-3 py-2 rounded shadow-sm">
                <li class="breadcrumb-item text-secondary">Property</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link nav-links active" aria-current="page" href="#" data-tab="newton">Newton</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-links" href="#" data-tab="newtonNew">Newton New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-links" href="#" data-tab="pilar12">Pilar 12</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="newton">
                        <div class="card shadow-lg border-0 mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 text-center">
                                        <img id="kostImage" src="img/kost1.jpeg" class="kost-image" alt="Kost Image"
                                            width="350px" height="250px">
                                        <div class="mt-3">
                                            <button class="btn btn-circle" onclick="prevImage()">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <button class="btn btn-circle" onclick="nextImage()">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <h3 class="text-primary font-weight-bold">Kost Newton</h3>
                                        <ul>
                                            <li><strong>Branch:</strong> Newton</li>
                                            <li>
                                                <strong>Tipe Kamar:</strong>
                                                <select id="roomType" class="form-select" onchange="changeRoomType()">
                                                    <option value="Standard" selected>Standard</option>
                                                    <option value="Deluxe">Deluxe</option>
                                                    <option value="Premiere">Premiere</option>
                                                    <option value="Studio">Studio</option>
                                                </select>
                                            </li>
                                            <li><strong>Luas Kamar:</strong> <span id="roomSize">12</span> m²</li>
                                            <li><strong>Listed Date:</strong> 01-Mar-24</li>
                                            <li><strong>Period:</strong> 1 Mar 24 - 1 Dec 24</li>
                                            <li><strong>Harga Sewa:</strong> <span id="roomPrice">-</span></li>
                                            <li><strong>Turnover Rate:</strong> 20,00%</li>
                                            <li><strong>Occupancy:</strong> 85,00%</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-3" style="margin-top: 70px;">
                                            <h2 class="text-primary mb-4">Status</h2>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator available-status"></span>
                                                <span>Available</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator reserved-status"></span>
                                                <span>Reserved</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator confirmed-status"></span>
                                                <span>Confirmed</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator unavailable-status"></span>
                                                <span>Unavailable</span>
                                            </div>
                                        </div>


                                        <div class="col-md-9">
                                            <h2 class="text-primary text-center mb-4">Daftar Kost</h2>
                                            <div class="seat-container">
                                                <div class="seat confirmed">112</div>
                                                <div class="seat available">113</div>
                                                <div class="seat available">114</div>
                                                <div class="seat available">115</div>
                                                <div class="seat available">116</div>
                                                <div class="seat available">117</div>

                                                <div class="seat unavailable">118</div>
                                                <div class="seat available">119</div>
                                                <div class="seat confirmed">120</div>
                                                <div class="seat available">121</div>
                                                <div class="seat available">123</div>
                                                <div class="seat available">124</div>

                                                <div class="seat available">211</div>
                                                <div class="seat available">212</div>
                                                <div class="seat available">213</div>
                                                <div class="seat available">214</div>
                                                <div class="seat confirmed">215</div>
                                                <div class="seat available">216</div>

                                                <div class="seat available">217</div>
                                                <div class="seat confirmed">218</div>
                                                <div class="seat available">219</div>
                                                <div class="seat available">220</div>
                                                <div class="seat available">311</div>
                                                <div class="seat reserved">312</div>
                                                <div class="seat confirmed">313</div>
                                                <div class="seat available">314</div>
                                                <div class="seat unavailable">315</div>
                                                <div class="seat available">316</div>
                                                <div class="seat available">317</div>
                                                <div class="seat available">318</div>

                                                <div class="seat available">319</div>
                                                <div class="seat available">320</div>
                                                <div class="seat confirmed">321</div>
                                                <div class="seat unavailable">411</div>
                                                <div class="seat available">412</div>
                                                <div class="seat available">413</div>

                                                <div class="seat available">414</div>
                                                <div class="seat reserved">415</div>
                                                <div class="seat available">416</div>
                                                <div class="seat available">417</div>
                                                <div class="seat confirmed">418</div>
                                                <div class="seat available">419</div>

                                                <div class="seat available">420</div>
                                                <div class="seat confirmed">421</div>
                                                <div class="seat available">422</div>
                                                <div class="seat reserved">423</div>
                                                <div class="seat available">424</div>
                                                <div class="seat available">425</div>

                                                <div class="seat confirmed">511</div>
                                                <div class="seat available">512</div>
                                                <div class="seat available">513</div>
                                                <div class="seat available">514</div>
                                                <div class="seat reserved">515</div>
                                                <div class="seat available">516</div>

                                                <div class="seat available">517</div>
                                                <div class="seat unavailable">518</div>
                                                <div class="seat confirmed">519</div>
                                                <div class="seat available">520</div>
                                                <div class="seat reserved">611</div>
                                                <div class="seat available">612</div>

                                                <div class="seat reserved">613</div>
                                                <div class="seat available">614</div>
                                                <div class="seat available">615</div>
                                                <div class="seat available">616</div>
                                                <div class="seat confirmed">617</div>
                                                <div class="seat available">618</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="newtonNew">
                        <div class="card shadow-lg border-0 mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 text-center">
                                        <img id="kostImage" src="img/kost1.jpeg" class="kost-image" alt="Kost Image"
                                            width="350px" height="250px">
                                        <div class="mt-3">
                                            <button class="btn btn-circle" onclick="prevImage()">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <button class="btn btn-circle" onclick="nextImage()">
                                                <i class="fas fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <h3 class="text-primary font-weight-bold">Deskripsi Kost</h3>
                                        <ul>
                                            <li><strong>Branch:</strong> newtonNew</li>
                                            <li>
                                                <strong>Tipe Kamar:</strong>
                                                <select id="roomType" class="form-select" onchange="changeRoomType()">
                                                    <option value="Standard" selected>Standard</option>
                                                    <option value="Deluxe">Deluxe</option>
                                                    <option value="Premiere">Premiere</option>
                                                    <option value="Studio">Studio</option>
                                                </select>
                                            </li>
                                            <li><strong>Luas Kamar:</strong> <span id="roomSize">12</span> m²</li>
                                            <li><strong>Listed Date:</strong> 01-Mar-24</li>
                                            <li><strong>Period:</strong> 1 Mar 24 - 1 Dec 24</li>
                                            <li><strong>Harga Sewa:</strong> <span id="roomPrice">-</span></li>
                                            <li><strong>Turnover Rate:</strong> 20,00%</li>
                                            <li><strong>Occupancy:</strong> 85,00%</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-3" style="margin-top: 70px;">
                                            <h2 class="text-primary mb-4">Status</h2>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator available-status"></span>
                                                <span>Available</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator reserved-status"></span>
                                                <span>Reserved</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator confirmed-status"></span>
                                                <span>Confirmed</span>
                                            </div>
                                            <div class="d-flex align-items-center icon">
                                                <span class="status-indicator unavailable-status"></span>
                                                <span>Unavailable</span>
                                            </div>
                                        </div>


                                        <div class="col-md-9">
                                            <h2 class="text-primary text-center mb-4">Daftar Kost</h2>
                                            <div class="seat-container">
                                                <div class="seat confirmed">112</div>
                                                <div class="seat available">113</div>
                                                <div class="seat available">114</div>
                                                <div class="seat available">115</div>
                                                <div class="seat available">116</div>
                                                <div class="seat available">117</div>

                                                <div class="seat unavailable">118</div>
                                                <div class="seat available">119</div>
                                                <div class="seat confirmed">120</div>
                                                <div class="seat available">121</div>
                                                <div class="seat available">123</div>
                                                <div class="seat available">124</div>

                                                <div class="seat available">211</div>
                                                <div class="seat available">212</div>
                                                <div class="seat available">213</div>
                                                <div class="seat available">214</div>
                                                <div class="seat confirmed">215</div>
                                                <div class="seat available">216</div>

                                                <div class="seat available">217</div>
                                                <div class="seat confirmed">218</div>
                                                <div class="seat available">219</div>
                                                <div class="seat available">220</div>
                                                <div class="seat available">311</div>
                                                <div class="seat reserved">312</div>
                                                <div class="seat confirmed">313</div>
                                                <div class="seat available">314</div>
                                                <div class="seat unavailable">315</div>
                                                <div class="seat available">316</div>
                                                <div class="seat available">317</div>
                                                <div class="seat available">318</div>

                                                <div class="seat available">319</div>
                                                <div class="seat available">320</div>
                                                <div class="seat confirmed">321</div>
                                                <div class="seat unavailable">411</div>
                                                <div class="seat available">412</div>
                                                <div class="seat available">413</div>

                                                <div class="seat available">414</div>
                                                <div class="seat reserved">415</div>
                                                <div class="seat available">416</div>
                                                <div class="seat available">417</div>
                                                <div class="seat confirmed">418</div>
                                                <div class="seat available">419</div>

                                                <div class="seat available">420</div>
                                                <div class="seat confirmed">421</div>
                                                <div class="seat available">422</div>
                                                <div class="seat reserved">423</div>
                                                <div class="seat available">424</div>
                                                <div class="seat available">425</div>

                                                <div class="seat confirmed">511</div>
                                                <div class="seat available">512</div>
                                                <div class="seat available">513</div>
                                                <div class="seat available">514</div>
                                                <div class="seat reserved">515</div>
                                                <div class="seat available">516</div>

                                                <div class="seat available">517</div>
                                                <div class="seat unavailable">518</div>
                                                <div class="seat confirmed">519</div>
                                                <div class="seat available">520</div>
                                                <div class="seat reserved">611</div>
                                                <div class="seat available">612</div>

                                                <div class="seat reserved">613</div>
                                                <div class="seat available">614</div>
                                                <div class="seat available">615</div>
                                                <div class="seat available">616</div>
                                                <div class="seat confirmed">617</div>
                                                <div class="seat available">618</div>
                                            </div>
                                        </div>
                                    </div>
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
            const images = [
                "img/kost1.jpeg",
                "img/kost2.jpg",
                "img/kost3.jpg"
            ];

            let currentImageIndex = 0;

            function prevImage() {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
                document.getElementById("kostImage").src = images[currentImageIndex];
            }

            function nextImage() {
                currentImageIndex = (currentImageIndex + 1) % images.length;
                document.getElementById("kostImage").src = images[currentImageIndex];
            }
            $('.nav-links').click(function (e) {
                e.preventDefault();

                $('.nav-links').removeClass('active');
                $('.tab-pane').removeClass('show active');

                $(this).addClass('active');

                var targetTab = $(this).data('tab');

                $('#' + targetTab).addClass('show active');
            });
        </script>
    @endsection