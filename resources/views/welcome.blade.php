@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')
{{-- <img src="{{ asset('img/banner.jpg') }}" alt="Banner"> --}}
{{-- <script src="{{ asset('js/script.js') }}"></script> --}}


<div id="search-container" class="col-md-12">
    <h1>Busque um Evento</h1>
    <form action="/" method="GET">
        <div class="input-group">
         <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
         <button type="submit" class="btn btn-primary">Buscar</button>
         {{-- <input type="submit" value="Buscar"> --}}
        </div>
    </form>
</div>
<div id="events-container" class="cold-md-12">
    @if ($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Próximos Eventos</h2>
    <p class="subtitle">Veja os eventos dos próximos dias</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants"> {{ count($event->users) }} participantes</p>
                    <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber Mais</a>
                </div>
            </div>
        @endforeach
    </div>
    <div id="cards-container">
        @if (count($events) == 0 && $search)
        <p>Não foi possível encontrar nenhum evento com {{ $search }}!</p>
        <a href="/" class="new-line-link d-block">Volte para a tela principal</a>

        @elseif(count($events) == 0)
        <p>Não há eventos disponíveis</p>

        @endif
    </div>
</div>
@endsection
