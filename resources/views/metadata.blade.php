@extends('layouts.app')

@section('scripts')
    {{-- @vite(['']) --}}
    @vite(['resources/sass/home.scss'])
@endsection
@section('content')
    <div class="container {{-- d-flex justify-content-center align-items-center mt-5 --}}">
        <div class="row">
            <div class="col-lg-9">
                {{-- table for metadata --}}
                <div class="tablemeta">
                    <table class=" table table-striped">
                        <tbody>
                            <tr>
                                <td colspan="2">
                                    <h1 class="fw-bold fs-3 m-0">
                                        {{ $currentDocument->title }}
                                    </h1>
                                    @if ($currentDocument->status === 'Pending')
                                        <span class="badge rounded-pill text-bg-danger fs-6 my-2 px-3 py-2">Awaiting approval</span> <br>
                                    @endif
                                    <span style="font-size:14px;color:#222">
                                        @foreach ($currentDocument->author as $author)
                                            {{ $author->name }};
                                        @endforeach
                                        <br>
                                        {{ $currentDocument->resolveFaculty() }},
                                        @if (!empty($currentDocument->published_date))
                                            @php
                                                $year = date('Y', strtotime($currentDocument->published_date));
                                            @endphp
                                            {{ $year }}
                                        @endif
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}

                <div class="cont_abstract mb-4">
                    <div class="title-text pb-2 mb-4 fs-5">
                        <i class="fa fa-list me-2"></i>
                        <span class="fw-bold">Abstract</span>
                    </div>
                    <div class="rounded p-4" style="background-color: #eee;">
                        <p class="m-0">
                            {{ $currentDocument->abstract }}
                        </p>
                    </div>
                </div>

                <div class="cont_metadata mb-4">
                    <div class="title-text pb-2 mb-4 fs-5">
                        <i class="fa fa-list me-2"></i>
                        <span class="fw-bold">Metadata</span>
                    </div>
                    <div class="meta_container d-flex justify-content-center align-items-center mt-5"
                        style="text-align: right;vertical-align:top;font-size:16px">
                        <table class="table-striped2">
                            <tbody>
                                <tr>
                                    <td class="detailField">Title :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->title }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Document Type :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->resolveItemType() }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Main Author :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->author[0]->name }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Contributor :&nbsp;</td>
                                    <td class="detailContent">
                                        @foreach ($currentDocument->author->slice(1) as $author)
                                            {{ $author->name }}<br>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td class="detailField">Published Date :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->published_date }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Faculty :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->resolveFaculty() }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Language :&nbsp;</td>
                                    <td class="detailContent">Indonesia</td>
                                </tr>
                                <tr>
                                    <td class="detailField">Depositted by :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->user->name }}</td>
                                </tr>
                                <tr>
                                    <td class="detailField">File Name :&nbsp;</td>
                                    <td class="detailContent">{{ $currentDocument->filename }}</td>
                                </tr>
                                

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="cont_file">
                    <div class="title-text pb-2 mb-4 fs-5">
                        <i class="fa fa-list me-2"></i>
                        <span class="fw-bold">Document File</span>
                    </div>

                    <div class="card w-100 panel-submission">
                        <div class="card-header">
                            File in This Item
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @if ($currentDocument->status === 'Pending')
                                    <a href="{{ route('pending', ['filename' => $currentDocument->filename]) }}">
                                        {{ $currentDocument->filename }}
                                    </a>
                                @elseif ($currentDocument->status === 'Accepted')
                                    <a href="{{ route('accepted', ['filename' => $currentDocument->filename]) }}">
                                        {{ $currentDocument->filename }}
                                    </a>
                                @else
                                    {{ $currentDocument->filename }}
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- end --}}

                {{-- side other recomendation --}}
            </div>
            <div class="col-lg-3">
                <div class="card w-100 panel-submission">
                    <div class="card-header text-center">
                        Recent Submissions
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($documents->take(5) as $document)
                            <li class="list-group-item">
                                <a href="{{ route('metadata.accepted', ['id' => $document->id]) }}">
                                    {{ $document->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <a href="{{ route('deposit') }}" class="btn btn-primary my-3 w-100">Deposit Your Document Here</a>
    
                <div class="card mb-4 w-100 panel-shortcut-author">
                    <div class="card-header">
                        Author
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($authors->take(10) as $author)
                            <li class="list-group-item">
                                <a href="{{ route('home.search', ['type' => 'author', 'q' => $author->name]) }}">
                                    {{ $author->name }}
                                </a>
                                <span class="badge">{{ $author->documents_count }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
