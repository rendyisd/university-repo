@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/deposit.scss',
    'resources/js/deposit.js'
])
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-search pb-2 mb-4">
                <i class="fa-solid fa-book me-2"></i>
                <span class="fw-bold">Sriwijaya University Repository Deposit System</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form action="" method="post">
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
                                <input type="text" class="form-control" id="depositTitle" aria-describedby="titleHelp">
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
                                <input type="text" class="form-control" id="depositAuthorMain" aria-describedby="authorMHelp">
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
                                <textarea class="form-control" id="depositAuthorContributor" aria-describedby="authorCHelp" rows="4"></textarea>
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
                                <select class="form-select" id="depositFaculty" aria-describedby="facultyHelp">
                                    <option selected disabled>Select Faculty</option>
                                    <option value="">Faculty of Economics</option>
                                    <option value="">Faculty of Law</option>
                                    <option value="">Faculty of Engineering</option>
                                    <option value="">Faculty of Medicine</option>
                                    <option value="">Faculty of Agriculture</option>
                                    <option value="">Faculty of Education and Educational Science</option>
                                    <option value="">Faculty of Social and Politic Science</option>
                                    <option value="">Faculty of Mathematics and Natural Science</option>
                                    <option value="">Faculty of Computer Science</option>
                                    <option value="">Faculty of Public Health</option>
                                </select>
                                <div id="facultyHelp" class="form-text">
                                    The faculty of the author that produced this thesis or dissertation.
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
                                <textarea class="form-control" id="depositAbstract" aria-describedby="abstractHelp" rows="4"></textarea>
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
                                <select class="form-select" id="depositType" aria-describedby="typeHelp">
                                    <option selected disabled>Select Item Type</option>
                                    <option value="ug">Undergraduate Thesis</option>
                                    <option value="ms">Master Thesis</option>
                                    <option value="phd">Doctoral Dissertation</option>
                                </select>
                                <div id="typeHelp" class="form-text">
                                    The category or type of this thesis or dissertation.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositKeywords" class="deposit-form-label">
                                    Keywords
                                    <br>
                                    <span class="badge text-bg-secondary">Optional</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <textarea class="form-control" id="depositKeywords" aria-describedby="keywordsHelp" rows="4"></textarea>
                                <div id="keywordsHelp" class="form-text">
                                    Please list each keywords on a separate line in the input field provided.
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="depositDocument" class="deposit-form-label">
                                    Document
                                    <br>
                                    <span class="badge text-bg-danger">Required</span>
                                </label>
                            </td>
                            <td class="deposit-form-table-cell">
                                <input class="form-control" type="file" id="depositDocument" aria-describedby="documentHelp" accept="application/pdf">
                                <div id="documentHelp" class="form-text">
                                    Only accepts document of <span class="fw-bold">.pdf</span> file format
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>

                <button type="submit" class="btn btn-success py-2 px-4">Deposit</button>
            </form>
        </div>
    </div>
</div>
@endsection