@extends ('layout/console')

@section ('content')

<section class="w3-padding">

    <h2>Add Project</h2>

    <form method="post" action="/console/projects/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="github_url">Github URL:</label>
            <input type="url" name="github_url" id="github_url" value="{{old('github_url')}}">

            @if ($errors->first('github_url'))
                <br>
                <span class="w3-text-red">{{$errors->first('github_url')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="live_url">Live URL:</label>
            <input type="url" name="live_url" id="live_url" value="{{old('live_url')}}">

            @if ($errors->first('live_url'))
                <br>
                <span class="w3-text-red">{{$errors->first('live_url')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{old('slug')}}" required>

            @if ($errors->first('slug'))
                <br>
                <span class="w3-text-red">{{$errors->first('slug')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="content">Content:</label>
            <textarea name="content" id="content" required>{{old('content')}}</textarea>

            @if ($errors->first('content'))
                <br>
                <span class="w3-text-red">{{$errors->first('content')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Project</button>

    </form>

    <a href="/console/projects/list">Back to Project List</a>

</section>

@endsection