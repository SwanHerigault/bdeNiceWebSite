@extends('template')

@section('content')


    <div>
        <div class="orange-bar">
            <p id="inside-bar">Prochainement au BDE...</p>
        </div>
    </div>

    <div role="main">
        <div id="eventsCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                @php
                    $i = 0;
                    $nextMonth = mktime(0, 0, 0, date('Y') + 1, date('m'), date('d'));
                    $today = date('Y-m-d');
                @endphp

                @foreach($events as $event)

                    @if($event->begin_at < $nextMonth && $event->begin_at > $today)

                        <div class="event-box item {{ $i == 0 ? 'active' : '' }}">
                            <div class="event-container-container">
                                <article class="event-container">
                                    <div class="event-img">
                                        <img class="image" src="{{ $event->pictures[0]->name }}" alt="{{ $event->pictures[0]->name }}" />
                                    </div>
                                    <p class="eventtitle">{{$event->name}}</p>
                                    <p class="text">{{$event->description}}</p>
                                    <a href="events/{{$event->id}}"><p class="buttonevent">En savoir plus</p></a>
                                </article>
                                <div class="event-background">De {{$event->begin_at }} à {{$event->end_at }}</div>
                            </div>
                        </div>

                        @php $i++ @endphp
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <a href="{{ route('events.index') }}"><button class="button"><span>Intéressé par d'autres évènements ?</span></button></a>

    <div role="main">
        <div id="articlesCarousel" class="carousel slide" data-ride="carousel">
            Wrapper for slides
            <div class="carousel-inner">

                @php $i = 0 @endphp

                @foreach($articles as $article)

                    @if($i % 3 == 0)

                        @if($i != 0)

            </div>

            @endif

            <div class="event-box item {{ $i == 0 ? 'active' : '' }}">

                @endif

                <div class="event-container-container">
                    <article class="event-container">
                        <div class="event-img"> <img class="image"  src="{{ $article->pictures[0]->name }}" alt="{{ $article->pictures[0]->name }}" /></div>
                        <p class="eventtitle">{{ $article->name }}</p>
                        <p class="text">{{ $article->description }}</p>
                        <p class="buttonevent">En savoir plus</p>
                    </article>
                    <div class="event-background">{{$article->price }} €</div>
                </div>

                @php $i++

                @endphp

                @endforeach

            </div>
        </div>
    </div>

    <div class="wrapper-div">
        <a href="{{ route('articles.index') }}"><button class="button"><span>Intéressé par d'autres produits ?</span></button></a>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection
