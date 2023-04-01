@extends('layouts.app')

@section('scripts')
 @vite([
    'resources/sass/admin.scss',
]) 
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="title-search pb-2 mb-4">
                <i class="fa-solid fa-book me-2"></i>
                <span class="fw-bold">Approvement Page</span>
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <tbody>
            <tr>
                <th scope="col" class="fw-bold">Bibliography</th>
                <th scope="col" class="fw-bold">Content</th>
                <th scope="col" class="fw-bold">Approvement</th>
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
                <td class="approve text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="approve">
                        <button type="button" class="btn btn-success">Approve</button>
                        <input type="hidden" name="denied">
                        <button type="button" class="btn btn-danger">Deny</button>
                    </form>
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
                <td class="approve text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="approve">
                        <button type="button" class="btn btn-success">Approve</button>
                        <input type="hidden" name="denied">
                        <button type="button" class="btn btn-danger">Deny</button>
                    </form>
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
                <td class="approve text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="approve">
                        <button type="button" class="btn btn-success">Approve</button>
                        <input type="hidden" name="denied">
                        <button type="button" class="btn btn-danger">Deny</button>
                    </form>
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
                <td class="approve text-center">
                    <form action="" method="POST">
                        <input type="hidden" name="approve">
                        <button type="button" class="btn btn-success">Approve</button>
                        <input type="hidden" name="denied">
                        <button type="button" class="btn btn-danger">Deny</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection