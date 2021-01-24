@extends('layouts.app')
@section('content')

    <h1>Tus series vistas</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Serie</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $s)
                <tr>
                    <td>{{ $s[0] }}</td>
                    <td>{{ $s[1] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection('content')