@extends('layouts.app')

@section('scripts')
    {{-- @vite(['']) --}}
@endsection

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- frame work --}}
        <script src="https://kit.fontawesome.com/4c177f5af8.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        @vite(['resources/sass/home.scss'])
        <title>Home</title>
    </head>

    <body>
        <div class="container">
            <a href="{{ route('metadata') }}" class="btn btn-primary">Metadata</a>
            <a href="{{ route('browse') }}" class="btn btn-primary">Browse</a>
            <a href="{{ route('admin') }}" class="btn btn-primary">Admin</a>
            <a href="{{ route('deposit') }}" class="btn btn-primary">Deposit</a>

            <div class="search_box mt-5">
                <div class="toggle_box">
                    <div class="toggle">
                        <i class="fa-solid fa-book"></i>
                        &nbsp;Pencarian
                        <div class="border-dotted mt-2"></div>
                    </div>
                </div>

                <div class="toggle_container mt-2">
                    <form class="wpcf7-form" role="form" name="form1" id="form" action="">
                        <div class="section-content">
                            <div class="rad-container">

                                <select class="mt-3 form-select-" id="input1" name="input1"
                                    aria-label="Default select example">
                                    <option selected>Judul Tesis</option>
                                    <option value="1">Pembimbing</option>
                                    <option value="2">Penguji</option>
                                </select>

                                <input type="text" id="input2" name="input2" class="mt-2 form-control"
                                    placeholder="Kata Kunci">
                            </div>
                        </div>
                </div>
                </form>
                <table class="mt-2 table table-striped">
                    <tbody>
                        <tr>
                            <th id="t1" class="oddRowEvenCol">Bibliography</th>
                            <th id="t2" class="oddRowOddCol" width="10%">Contents</th>
                        </tr>
                        <tr>
                            <td headers="t1" class="oddRowOddCol">
                                <strong>
                                    <a href="https://repository.kulib.kyoto-u.ac.jp/dspace/handle/2433/279517">
                                        Identification of a tomato UDP-arabinosyltransferase for airborne volatile
                                        reception</a>
                                </strong>
                                <br>
                                <p>
                                    Sugimoto, Koichi; Ono, Eiichiro; Inaba, Tamaki; Tsukahara, Takehiko; Matsui, Kenji;
                                    Horikawa, Manabu; Toyonaga, Hiromi; Fujikawa, Kohki; Osawa, Tsukiho; Homma, Shunichi;
                                    Kiriiwa, Yoshikazu; Ohmura, Ippei; Miyagawa, Atsushi; Yamamura, Hatsuo; Fujii, Mikio;
                                    Ozawa,
                                    Rika; Watanabe, Bunta; Miura, Kenji; Ezura, Hiroshi; Ohnishi, Toshiyuki; Takabayashi,
                                    Junji
                                    (2023-02-08)
                                    Nature Communications, 14
                                </p>
                                <br>
                                &nbsp;&nbsp;Nature Communications, 14
                                <br>
                            </td>
                            <td headers="t2" class="oddRowEvenCol" align="center">
                                <a href="/dspace/bitstream/2433/279517/1/s41467-023-36381-8.pdf">
                                    <i class="fa-regular fa-file-pdf large-icon"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td headers="t1" class="oddEvenCol">
                                <strong>
                                    <a href="https://repository.kulib.kyoto-u.ac.jp/dspace/handle/2433/275860">
                                        The crucial influence of trophic status on the relative requirement of nitrogen to
                                        phosphorus for phytoplankton growth</a>
                                </strong>
                                <br>
                                <p>
                                    &nbsp;&nbsp;Jiang, Mengqi; Nakano, Shin-ichi (2022-08-15)
                                </p>
                                <br>
                                &nbsp;&nbsp;Water Research, 222
                                <br>
                            </td>
                            <td headers="t2" class="oddRowEvenCol" align="center">
                                <a href="/dspace/bitstream/2433/279517/1/s41467-023-36381-8.pdf">
                                    <i class="fa-regular fa-file-pdf large-icon"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </body>

    </html>
@endsection
