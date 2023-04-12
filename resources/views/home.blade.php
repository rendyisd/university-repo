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
            <a href="{{ route('approvement') }}" class="btn btn-primary">Approvement</a>
            <a href="{{ route('deposit') }}" class="btn btn-primary">Deposit</a>
            <a href="{{ route('your_document') }}" class="btn btn-primary">Your Document</a>
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
                        @foreach ($documents as $document)
                            <tr>
                                <td class="col-bibliography">
                                    <a href="#" class="fw-bold">
                                        {{ $document->title }}
                                    </a>
                                    <p class="col-bibliography-sub">
                                        @foreach ($document->author as $author)
                                            @php
                                                $nameArr = explode(" ", $author->name);
                                                $authorName = $nameArr[count($nameArr) - 1] . ", " . implode(" ", array_slice($nameArr, 0, count($nameArr) - 1));  
                                            @endphp

                                            {{ $authorName }};
                                        @endforeach
                                    </p>
                                    <p class="col-bibliography-sub">
                                        {{ $document->resolveItemType() }}
                                    </p>
                                    <p class="col-bibliography-sub">
                                        Sriwijaya University, {{ $document->resolveFaculty() }}
                                    </p>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('accepted', ['filename' => $document->filename]) }}">
                                        <i class="fa-regular fa-file-pdf" style="font-size: 60px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
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
                    @foreach ($documents->take(5) as $document)
                        <li class="list-group-item">
                            <a href="#">
                                {{ $document->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="card mb-4 w-100 panel-shortcut-author">
                <div class="card-header">
                    Author
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($authors->take(5) as $author)
                        <li class="list-group-item">
                            <a href="#">
                                {{ $author->name }}
                            </a>
                            <span class="badge">{{ $author->documents_count }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
