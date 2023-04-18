@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/deposit.scss',
])
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-text pb-2 mb-4">
                <i class="fa-solid fa-book me-2"></i>
                <span class="fw-bold">Document Control</span>
            </div>
        </div>
    </div>

    @if($documents->isEmpty())
        <h1 class="text-center fw-bold">No document depositted yet.</h1>
    @else

        <table class="table table-striped table-bordered">
            <tbody>
                <tr>
                    <th scope="col" class="fw-bold">Bibliography</th>
                    <th scope="col" class="fw-bold" style="min-width: 10rem;">Action</th>
                </tr>
                @foreach ($documents as $document)
                    <tr>
                        <td class="col-bibliography">
                            <a href="{{ route('metadata.accepted', ['id' => $document->id]) }}" class="fw-bold">
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
                            <a href="{{ route('edit', ['id' => $document]) }}" class="btn btn-warning me-2">Edit</a>
                            
                            <form action="{{ route('docControl.delete', ['id' => $document->id]) }}" method="POST" onsubmit="return confirm('Delete this document?');" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection