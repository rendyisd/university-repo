@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/home.scss',
    'resources/js/home.js'
])
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9">
            <a href="{{ route('metadata') }}" class="btn btn-primary">Metadata</a>
            <a href="{{ route('browse') }}" class="btn btn-primary">Browse</a>
            <a href="{{ route('admin') }}" class="btn btn-primary">Admin</a>
            <a href="{{ route('deposit') }}" class="btn btn-primary">Deposit</a>
            <br>
            {{-- Kolom kiri --}}
            <div class="row mb-3">
                <div class="title-text pb-2 mb-4">
                    <i class="fa-solid fa-magnifying-glass me-2"></i>
                    <span class="fw-bold">Searching</span>
                </div>
    
                {{-- Search form --}}
                <form action="" method="get">
                    <div class="row mb-4">
                        <div class="col">
                        
                            <select class="form-select" aria-label="Default select example">
                                <option selected disabled>Select search by</option>
                                <option value="searchTitle">Title</option>
                                <option value="searchAuthor">Author</option>
                            </select>

                        </div>
                        <div class="col search-box-container">
                            <input type="text" class="form-control" id="searchForm">
                            <i class="fa-solid fa-magnifying-glass me-2 search-icon"></i>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">

                            <div class="card mb-4 w-100 panel-browse">
                                <div class="card-header text-center">
                                    Browse
                                </div>
                                <div class="card-body d-grid gap-2">
                                    <div class="row">
                                        <div class="col px-1">
                                            <a href="" class="btn btn-secondary w-100">Faculty</a>
                                        </div>
                                        <div class="col px-1">
                                            <a href="" class="btn btn-secondary w-100">Year</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col px-1">
                                            <a href="" class="btn btn-secondary w-100">Document Type</a>
                                        </div>
                                        <div class="col px-1">
                                            <a href="" class="btn btn-secondary w-100">Keyword</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="title-text pb-2 mb-4">
                    <i class="fa-solid fa-book me-2"></i>
                    <span class="fw-bold">Relevant Document</span>
                </div>
    
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th scope="col" class="fw-bold">Bibliography</th>
                            <th scope="col" class="fw-bold">Content</th>
                        </tr>
                        <tr>
                            <td class="col-bibliography">
                                <a href="#" class="fw-bold">
                                    Colonization process determines species diversity via competitive quasi-exclusion
                                </a>
                                <p class="col-bibliography-sub">
                                    Sugimoto, Koichi; Ono, Eiichiro; Inaba, Tamaki; Tsukahara, Takehiko; Matsui, Kenji
                                </p>
                                <p class="col-bibliography-sub">
                                    Undergraduate Thesis
                                </p>
                                <p class="col-bibliography-sub">
                                    Sriwijaya University, Faculty of Computer Science, Computer System
                                </p>
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <i class="fa-regular fa-file-pdf" style="font-size: 60px"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-bibliography">
                                <a href="#" class="fw-bold">
                                    Fresh-marketable tomato yields enhanced by moderate weed control and suppressed fruit dehiscence with woodchip mulching
                                </a>
                                <p class="col-bibliography-sub">
                                    Horimoto, Sakae; Fukuda, Kazuaki; Yoshimura, Jin; Ishida, Atsushi (2022)
                                </p>
                                <p class="col-bibliography-sub">
                                    Master Thesis
                                </p>
                                <p class="col-bibliography-sub">
                                    Sriwijaya University, Faculty of Agriculture, Agribusiness
                                </p>
                            </td>
                            <td class="text-center">
                                <a href="#">
                                    <i class="fa-regular fa-file-pdf" style="font-size: 60px"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="col-lg-3">
            <div class="card mb-4 w-100 panel-submission">
                <div class="card-header text-center">
                    Recent Submissions
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#">
                            Examining the Relationship Between Sleep Quality and Cognitive Functioning in Older Adults with Mild Cognitive Impairment
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            The Role of Self-Compassion in Mental Health: A Cross-Sectional Study
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            The Role of Parental Involvement in Children's Education: A Cross-Cultural Study
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Predictors of Successful Aging: A Longitudinal Study of Older Adults
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Colonization process determines species diversity via competitive quasi-exclusion
                        </a>
                    </li>
                </ul>
            </div>

            <div class="card mb-4 w-100 panel-shortcut-author">
                <div class="card-header">
                    Author
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="#">
                            Isdwanta, Rendy
                        </a>
                        <span class="badge">420</span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Cristianto, Rico
                        </a>
                        <span class="badge">69</span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Nugraha, Farhan
                        </a>
                        <span class="badge">169</span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Patra, Fauzan Abghi
                        </a>
                        <span class="badge">42</span>
                    </li>
                    <li class="list-group-item">
                        <a href="#">
                            Irawan, Chandra
                        </a>
                        <span class="badge">5</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
