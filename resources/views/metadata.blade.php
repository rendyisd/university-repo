@extends('layouts.app')

@section('scripts')
    {{-- @vite(['']) --}}
    @vite(['resources/sass/metadata.scss'])
@endsection
@section('content')
    <div class="container {{-- d-flex justify-content-center align-items-center mt-5 --}}">
        <div class="row">
            <div class="col-lg-8">
                {{-- table for metadata --}}
                <div class="tablemeta">
                    <table class=" table table-striped">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <h1 style="font-size: 25px;color:#555">
                                        Persepsi jarak berjalan kaki di wilayah stasiun MRT(walking distance perception in
                                        MRT station area)</h1>
                                    <span style="font-size:16px;color:#222">
                                        Alfaizs Vi Afkara;
                                        Andyka Kusuma, supervisor; Alan Marino, examiner; Silvanus Nohan Rudrokasworo,
                                        examiner
                                        (Fakultas Teknik Universitas Indonesia , 2019)
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="uri" id="url">URI:
                                        https://lib.unsri.ac.id/detail?id=20490420&amp;lokasi=lokal</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="cont_metadata">
                    <h4>
                        <i class="fa fa-list"></i>
                        &nbsp;Metadata
                        <div class="icon mt-2" style="border-bottom: 1px dotted #cccccc;"></div>
                    </h4>
                    <div class="meta_container d-flex justify-content-center align-items-center mt-5"
                        style="text-align: right;vertical-align:top;font-size:16px">
                        <table class="table-striped2">
                            <tbody>
                                <tr>
                                    <td class="detailField">Jenis Koleksi : </td>
                                    <td class="detailContent">Unsri - Skripsi (open)</td>
                                </tr>

                                <tr>
                                    <td class="detailField">No. Panggil : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Entri utama-Nama orang : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Subjek : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Penerbitan : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Program Studi : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Kode Bahasa : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Sumber Pengatalogan : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Tipe Konten : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Tipe Media : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Tipe Carrier : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Deskripsi Fisik : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Catatan Bibliographi : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Lembaga Pemilik : </td>
                                    <td class="detailContent"></td>
                                </tr>
                                <tr>
                                    <td class="detailField">Lokasi : </td>
                                    <td class="detailContent"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- end --}}

                {{-- side other recomendation --}}
            </div>
            <div class="col-lg-4">
                <div class="card rightside-container">
                    {{-- header --}}
                    <div class="card-header">
                        <i class="fa fa-link"></i>
                        <span style="font-size:19px;color:#222">
                            &nbsp;Other
                        </span>
                    </div>
                    {{-- content other --}}
                    <div class="content-other" style="padding: 8px">

                        <div class="author mt-3">
                            <h7 class="name fw-">Arsy Karima Zahra, author</h7>
                        </div>
                        <div class="collection-title">
                            <a href="detail?id=20518367&amp;lokasi=lokal" target="_top">
                                <div>Pemilihan Kebijakan Pemeliharaan Berbasis Kualitas Layanan dan Analisis Risiko
                                    Kegagalan MRT Jakarta = Service Quality &amp; Risk Analysis-Based Maintenance Policy
                                    Selection for Rail-Transport</div>
                            </a>
                        </div>
                        <div>
                            Fakultas Teknik Universitas Sriwijaya, 2022</div>
                        <div>
                            <i class="fa fa-database"></i>
                            &nbsp;Unsri - Tesis (Membership)
                            <div class="border mt-3" style="border-bottom: 1px solid black"></div>
                        </div>

                        <div class="author mt-3">
                            <h7 class="name fw-">Farhan Nugraha, author</h7>
                        </div>
                        <div class="collection-title">
                            <a href="detail?id=20518367&amp;lokasi=lokal" target="_top">
                                <div>Pemilihan Kebijakan Pemeliharaan Berbasis Kualitas Layanan dan Analisis Risiko
                                    Kegagalan MRT Jakarta = Service Quality &amp; Risk Analysis-Based Maintenance Policy
                                    Selection for Rail-Transport</div>
                            </a>
                        </div>
                        <div>
                            Fakultas Ilmu Komputer Universitas Sriwijaya, 2023</div>
                        <div>
                            <i class="fa fa-database"></i>
                            &nbsp;Unsri - Tesis (Membership)
                            <div class="border mt-3" style="border-bottom: 1px solid black"></div>
                        </div>
                        {{-- end other --}}
                    </div>
                </div>
            </div>
        </div>
    @endsection
