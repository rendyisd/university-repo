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
            <div class="title-search pb-2 mb-4">
                <i class="fa-solid fa-book me-2"></i>
                <span class="fw-bold">Edit Document</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="{{ route('docControl.edit', ['id' => $document->id]) }}" method="post">
                @csrf
                <table class="table table-bordered deposit-table">
                    <thead>
                        <tr  class="deposit-table-head">
                            <th colspan="2">General Item Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <label for="depositTitle" class="deposit-form-label">
                                    Title
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <input type="text" class="form-control" id="depositTitle" aria-describedby="titleHelp" autocomplete="off" name="title" required value="{{ $document->title }}">
                                <div id="titleHelp" class="form-text">
                                    The title of this thesis or dissertation.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositAuthorMain" class="deposit-form-label">
                                    Author - Main
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <input type="text" class="form-control" id="depositAuthorMain" aria-describedby="authorMHelp" autocomplete="off" name="mainAuthor" required value="{{ $document->author[0]->name }}">
                                <div id="authorMHelp" class="form-text">
                                    The main author of this thesis or dissertation.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositAuthorContributor" class="deposit-form-label">
                                    Author - Contributor
                                    <br>
                                    <span class="badge text-bg-secondary">Optional</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <textarea class="form-control" id="depositAuthorContributor" aria-describedby="authorCHelp" rows="4" name="contAuthor">@foreach($document->author->slice(1) as $author){{ $author->name }}
@endforeach</textarea>
                                <div id="authorCHelp" class="form-text">
                                    Please list each contributor author's name on a separate line in the input field provided.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositFaculty" class="deposit-form-label">
                                    Faculty
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <select class="form-select" id="depositFaculty" aria-describedby="facultyHelp" required name="faculty">
                                    <option disabled>Select Faculty</option>
                                    <option @if ($document->faculty === "feco") {{ "selected" }} @endif value="feco">Faculty of Economics</option>
                                    <option @if ($document->faculty === "flaw") {{ "selected" }} @endif value="flaw">Faculty of Law</option>
                                    <option @if ($document->faculty === "feng") {{ "selected" }} @endif value="feng">Faculty of Engineering</option>
                                    <option @if ($document->faculty === "fmed") {{ "selected" }} @endif value="fmed">Faculty of Medicine</option>
                                    <option @if ($document->faculty === "fagr") {{ "selected" }} @endif value="fagr">Faculty of Agriculture</option>
                                    <option @if ($document->faculty === "fedu") {{ "selected" }} @endif value="fedu">Faculty of Education and Educational Science</option>
                                    <option @if ($document->faculty === "fsoc") {{ "selected" }} @endif value="fsoc">Faculty of Social and Politic Science</option>
                                    <option @if ($document->faculty === "fmat") {{ "selected" }} @endif value="fmat">Faculty of Mathematics and Natural Science</option>
                                    <option @if ($document->faculty === "focs") {{ "selected" }} @endif value="focs">Faculty of Computer Science</option>
                                    <option @if ($document->faculty === "foph") {{ "selected" }} @endif value="foph">Faculty of Public Health</option>
                                </select>
                                <div id="facultyHelp" class="form-text">
                                    The faculty that produced this thesis or dissertation.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositAbstract" class="deposit-form-label">
                                    Abstract
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <textarea class="form-control" id="depositAbstract" aria-describedby="abstractHelp" rows="4" name="abstract" required>{{ $document->abstract }}</textarea>
                                <div id="abstractHelp" class="form-text">
                                    A brief summary of the main points and conclusions of this thesis or dissertation, typically no more than 300-500 words in length.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositType" class="deposit-form-label">
                                    Item type
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <select class="form-select" id="depositType" aria-describedby="typeHelp" required name="itemType">
                                    <option disabled>Select Item Type</option>
                                    <option @if ($document->item_type === "ug"){{ "selected" }} @endif value="ug">Undergraduate Thesis</option>
                                    <option @if ($document->item_type === "ms"){{ "selected" }} @endif value="ms">Master Thesis</option>
                                    <option @if ($document->item_type === "phd"){{ "selected" }} @endif value="phd">Doctoral Dissertation</option>
                                </select>
                                <div id="typeHelp" class="form-text">
                                    The category or type of this thesis or dissertation.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositDocument" class="deposit-form-label">
                                    Document
                                    <br>
                                    <span class="badge text-bg-dark">Not Editable</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                
                                <p class="fw-bold">Cannot be edited!</p>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <button type="submit" class="btn btn-success py-2 px-4">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection

