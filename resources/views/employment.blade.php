
@extends ('layout.frontend', ['title' => $employment->title])

@section ('content')

<section class="w3-padding">

    <h2 class="w3-text-blue">{{$employment->title}}</h2>
    <h4 class="w3-text-blue">{{$employment->employer}}</h4>

    <p><{{$employment->description}}</p>

    <p><b>Start: </b>{{$employment->start_month}} {{$employment->start_year}}</p>

    <p><b>End: </b>{{$employment->end_month}} {{$employment->send_year}}</p>

    <p>
        Posted: {{$employment->created_at->format('M j, Y')}}
    </p>

    <a href="/">Back to Home</a>

</section>

@endsection
