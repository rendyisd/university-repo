@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/home.scss',
])
@endsection

@section('content')
<div class="container">
    <table>
        <h1>Faculty of Unsri</h1>
        <p><a href=""> 1. Faculty of Economics</a></p>
        <p><a href=""> 2. Faculty of Law</a></p>
        <p><a href=""> 3. Faculty of Engineering</a></p>
        <p><a href=""> 4. Faculty of Medicine</a></p>
        <p><a href=""> 5. Faculty of Argiculture</a></p>
        <p><a href=""> 6. Faculty of Education and Educational Science</a></p>
        <p><a href=""> 7. Faculty of Social and Politic Science</a></p>
        <p><a href=""> 8. Faculty of Mathematics and Natural Science</a></p>
        <p><a href=""> 9. Faculty of Computer Science</a></p>
        <p><a href=""> 10. Faculty of Public Health</a></p>
    </table>
</div>
@endsection