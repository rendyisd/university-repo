@extends('layouts.app')

@section('scripts')
 @vite([
    'resources/sass/home.scss',
]) 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-text pb-2 mb-4">
                <i class="fa-solid fa-book me-2"></i>
                <span class="fw-bold">Your Document</span>
            </div>
        </div>
    </div>

    @if($documents->isEmpty())
        <h1 class="text-center fw-bold">You haven't deposited any document</h1>
    @else
        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="col" class="fw-bold">Bibliography</th>
                    <th scope="col" class="fw-bold">Content</th>
                    <th scope="col" class="fw-bold">Status</th>
                </tr>

                @foreach ($documents as $document)
                    <tr>
                        <td class="col-bibliography">
                            @if ($document->status === 'Pending')
                                <a href="{{ route('metadata.pending', ['id' => $document->id]) }}" class="fw-bold">
                                    {{ $document->title }}
                                </a>
                            @elseif ($document->status === 'Accepted')
                                <a href="{{ route('metadata.accepted', ['id' => $document->id]) }}" class="fw-bold">
                                    {{ $document->title }}
                                </a>
                            @else
                                <p class="fw-bold m-0 text-danger">
                                    {{ $document->title }}
                                </p>
                            @endif

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
                            @if ($document->status === 'Pending')
                                <a href="{{ route('pending', ['filename' => $document->filename]) }}">
                                    <i class="fa-regular fa-file-pdf" style="font-size: 60px"></i>
                                </a>
                            @elseif ($document->status === 'Accepted')
                                <a href="{{ route('accepted', ['filename' => $document->filename]) }}">
                                    <i class="fa-regular fa-file-pdf" style="font-size: 60px"></i>
                                </a>
                            @else
                                <i class="fa-regular fa-file-pdf text-danger" style="font-size: 60px"></i>
                            @endif
                        </td>
                        <td class="approve text-center">
                            {{ $document->status }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection