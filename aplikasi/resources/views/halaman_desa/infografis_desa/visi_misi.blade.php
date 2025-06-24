@extends('layouts.desa.landing_page.app')

@section('title', 'Visi Misi')

@section('content')
<br>
<div class="container mt-5">
    <!-- Visi -->
    <div class="visi-misi text-center p-4 mb-4">
        <h2 class="title-visi-misi">Visi</h2>
        <p class="content-visi-misi">“Isi Visi”</p>
    </div>

    <!-- Misi -->
    <div class="visi-misi p-4">
        <h2 class="title-visi-misi text-center">Misi</h2>
        <ol class="mt-3">
            <li>Misi 1</li>
            <li>Misi 2</li>
            <li>Misi 3</li>
            <li>Misi 4</li>
            <li>Misi 5</li>
        </ol>        
    </div>
</div>
<br>
@endsection