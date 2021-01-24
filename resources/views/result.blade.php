@extends('layouts.app')
@section('content')

    <h1>Tus series vistas</h1>

    <table class="table table-hover">
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

@endsection('content')