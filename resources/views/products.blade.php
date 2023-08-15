@extends('layouts.main')

@section('title', 'Produto')

@section('content')

<h1>TELA DE PRODUTOS</h1>
@if($busca != '')
<p>O usuário está buscando por: {{ $busca }}</p>
@endif

@endsection
