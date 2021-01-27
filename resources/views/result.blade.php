@extends('layouts.app')

@section('header')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
@endsection

@section('content')

    <h1>Tus series vistas</h1>

    <table id="results-table" class="display">
        <thead>
            <tr>
                <th scope="col">Tipo</th>
                <th scope="col">Nombre</th>
                <th scope="col">Temporada</th>
                <th scope="col">Capitulo</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contentList as $content)
                <tr>
                    <td>{{ $content->type }}</td>
                    <td>{{ $content->name }}</td>

                    @if($content->type == 'Serie')
                        <td>{{ $content->seasonNumber }}</td>
                        <td>{{ $content->seasonTitle }}</td>
                    @else
                        <td>No aplica</td>
                        <td>No aplica</td>
                    @endif
                    
                    <td>{{ $content->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1>Tus Estadísticas</h1>
    <div class="row">
        <canvas id="statsChart" width="400" height="100"></canvas>
    </div>

@endsection('content')

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

    <script src="js/datatables.js"></script>
    <script src="js/charts.js"></script>
@endsection