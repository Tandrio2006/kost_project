@extends('layout.main')

@section('title', 'Property')

@section('main')
    <style>
        .seat-container {
            display: grid;
            grid-template-columns: repeat(18, 50px);
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
                        <a class="nav-links nav-link active" aria-current="page" href="#" data-tab="newton">Newton</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links nav-link" href="#" data-tab="newtonNew">Newton New</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-links nav-link" href="#" data-tab="pilar12">Pilar 12</a>
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
                                        <h3 class="text-primary font-weight-bold">Deskripsi Kost</h3>
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

                                <div class="container text-center mt-5">
                                    <h2 class="text-primary"><b>Daftar Kost</b></h2>

                                    <div class="seat-container">
                                        <div class="seat confirmed">A1</div>
                                        <div class="seat available">A2</div>
                                        <div class="seat available">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat available">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat unavailable">B1</div>
                                        <div class="seat available">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat available">B4</div>
                                        <div class="seat available">B5</div>
                                        <div class="seat available">B6</div>

                                        <div class="seat available">C1</div>
                                        <div class="seat available">C2</div>
                                        <div class="seat available">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat available">C6</div>

                                        <div class="seat available">D1</div>
                                        <div class="seat confirmed">D2</div>
                                        <div class="seat available">D3</div>
                                        <div class="seat available">D4</div>
                                        <div class="seat available">D5</div>
                                        <div class="seat reserved">D6</div>
                                        <div class="seat confirmed">A1</div>
                                        <div class="seat available">A2</div>
                                        <div class="seat unavailable">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat available">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat available">B1</div>
                                        <div class="seat available">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat unavailable">B4</div>
                                        <div class="seat available">B5</div>
                                        <div class="seat available">B6</div>

                                        <div class="seat available">C1</div>
                                        <div class="seat reserved">C2</div>
                                        <div class="seat available">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat available">C6</div>

                                        <div class="seat available">D1</div>
                                        <div class="seat confirmed">D2</div>
                                        <div class="seat available">D3</div>
                                        <div class="seat reserved">D4</div>
                                        <div class="seat available">D5</div>
                                        <div class="seat available">D6</div>

                                        <div class="seat confirmed">A1</div>
                                        <div class="seat available">A2</div>
                                        <div class="seat available">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat reserved">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat available">B1</div>
                                        <div class="seat unavailable">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat available">B4</div>
                                        <div class="seat reserved">B5</div>
                                        <div class="seat available">B6</div>

                                        <div class="seat reserved">C1</div>
                                        <div class="seat available">C2</div>
                                        <div class="seat available">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat available">C6</div>

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

                                <div class="container text-center mt-5">
                                    <h2 class="text-primary"><b>Daftar Kost</b></h2>

                                    <div class="seat-container">
                                        <div class="seat confirmed">A1</div>
                                        <div class="seat available">A2</div>
                                        <div class="seat available">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat available">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat unavailable">B1</div>
                                        <div class="seat available">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat available">B4</div>
                                        <div class="seat available">B5</div>
                                        <div class="seat available">B6</div>

                                        <div class="seat available">C1</div>
                                        <div class="seat available">C2</div>
                                        <div class="seat available">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat available">C6</div>

                                        <div class="seat available">D1</div>
                                        <div class="seat available">D2</div>
                                        <div class="seat available">D3</div>
                                        <div class="seat available">D4</div>
                                        <div class="seat available">D5</div>
                                        <div class="seat reserved">D6</div>
                                        <div class="seat confirmed">A1</div>
                                        <div class="seat confirmed">A2</div>
                                        <div class="seat unavailable">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat available">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat available">B1</div>
                                        <div class="seat available">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat unavailable">B4</div>
                                        <div class="seat available">B5</div>
                                        <div class="seat confirmed">B6</div>

                                        <div class="seat reserved">C1</div>
                                        <div class="seat reserved">C2</div>
                                        <div class="seat confirmed">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat confirmed">C6</div>

                                        <div class="seat available">D1</div>
                                        <div class="seat confirmed">D2</div>
                                        <div class="seat reserved">D3</div>
                                        <div class="seat available">D4</div>
                                        <div class="seat available">D5</div>
                                        <div class="seat confirmed">D6</div>

                                        <div class="seat available">A1</div>
                                        <div class="seat confirmed">A2</div>
                                        <div class="seat available">A3</div>
                                        <div class="seat available">A4</div>
                                        <div class="seat reserved">A5</div>
                                        <div class="seat available">A6</div>

                                        <div class="seat available">B1</div>
                                        <div class="seat unavailable">B2</div>
                                        <div class="seat confirmed">B3</div>
                                        <div class="seat available">B4</div>
                                        <div class="seat reserved">B5</div>
                                        <div class="seat available">B6</div>

                                        <div class="seat available">C1</div>
                                        <div class="seat available">C2</div>
                                        <div class="seat confirmed">C3</div>
                                        <div class="seat available">C4</div>
                                        <div class="seat confirmed">C5</div>
                                        <div class="seat available">C6</div>

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
            $('.nav-link').click(function (e) {
                e.preventDefault();

                $('.nav-link').removeClass('active');
                $('.tab-pane').removeClass('show active');

                $(this).addClass('active');

                var targetTab = $(this).data('tab');

                $('#' + targetTab).addClass('show active');
            });
        </script>
    @endsection