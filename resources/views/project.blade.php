
@extends ('layout.frontend', ['title' => $project->title])

@section ('content')

<section class="w3-padding">

    <h2 class="w3-text-blue">{{$project->title}}</h2>

    @if ($project->image)
        <div class="w3-margin-top">
            <img src="{{asset('storage/'.$project->image)}}" width="400">
        </div>
    @endif

    <p><{{$project->content}}</p>

    <p>View Github Project <a href="{{$project->github_url}}">{{$project->github_url}}</a></p>

    @if ($project->live_url)
        View Live Project: <a href="{{$project->live_url}}">{{$project->live_url}}</a>
    @endif

    <p>
        Posted: {{$project->created_at->format('M j, Y')}}
    </p>

    <a href="/">Back to Home</a>

</section>

@endsection
