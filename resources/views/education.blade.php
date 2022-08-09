
@extends ('layout/frontend', ['title' => $education->title])

@section ('content')

<section class="w3-padding">

    <h2 class="w3-text-blue">{{$education->degree_type}} {{$education->degree}}</h2>
    <h4 class="w3-text-blue">{{$education->institution_name}}</h4>

    <p><b>Start: </b>{{$education->start_month}} {{$education->start_year}}</p>

    <p><b>End: </b>{{$education->end_month}} {{$education->send_year}}</p>

    <p>
        Posted: {{$education->created_at->format('M j, Y')}}
    </p>

    <a href="/">Back to Home</a>

</section>

@endsection
