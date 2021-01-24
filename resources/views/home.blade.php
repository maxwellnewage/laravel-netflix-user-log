@extends('layouts.app')
@section('content')

    <h1>Subir un archivo CSV de Netflix</h1>

    <form method="post" action="{{ route('csv.result') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="csv-file" class="form-label">Archivo CSV</label>
            <input accept=".csv" required class="form-control" name="csv-file" type="file" aria-describedby="csv-help" />
            <div id="csv-help" class="form-text">Sube el archivo para procesar tus series.</div>
        </div>

        <button class="btn btn-primary" type="submit">Subir</button>
    </form>

@endsection('content')