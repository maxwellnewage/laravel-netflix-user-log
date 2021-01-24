@extends('layouts.app')
@section('content')

    <h1>Test</h1>

    <form method="post" action="{{ route('csv.result') }}" enctype="multipart/form-data">
        @csrf
        <input name="csv-file" type="file" />
        <input type="submit" value="Subir">
    </form>

@endsection('content')