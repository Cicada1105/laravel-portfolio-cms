@extends('layout/console')

@section('content')
<section class="w3-padding">

	<h2>Edit Employment</h2>

    <form method="post" action="/console/employment/edit/{{$employment->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="title" name="title" id="title" value="{{old('title', $employment->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="employer">Employer:</label>
            <input type="text" name="employer" id="employer" value="{{old('employer', $employment->employer)}}">

            @if ($errors->first('employer'))
                <br>
                <span class="w3-text-red">{{$errors->first('employer')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{old('description', $employment->description)}}</textarea>

            @if ($errors->first('description'))
                <br>
                <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>

        <?php 
        	$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
        ?>
        <div class="w3-margin-bottom">
			<label for="start_month">Start Month:</label>
			<select name="start_month" id="start_month">
				@foreach($months as $month)
					@if (old('start_month', $employment->start_month) == strtolower($month))
				  		<option value="{{strtolower($month)}}" selected>{{ $month }}</option>
				  	@else
				  		<option value="{{strtolower($month)}}">{{ $month }}</option>
				  	@endif
				@endforeach
			</select>
            @if ($errors->first('start_month'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_month')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
			<label for="start_year">Start Year:</label>
			<input type="text" name="start_year" id="start_year" pattern="\d{4}" value="{{old('start_year', $employment->start_year)}}">

			@if ($errors->first('start_year'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_year')}}</span>
			@endif
        </div>

        <div class="w3-margin-bottom">
			<label for="end_month">End Month:</label>
			<select name="end_month" id="end_month">
				@foreach($months as $month)
					@if (old('end_month', $employment->end_month) == strtolower($month))
				  		<option value="{{strtolower($month)}}" selected>{{ $month }}</option>
				  	@else
				  		<option value="{{strtolower($month)}}">{{ $month }}</option>
				  	@endif
				@endforeach
			</select>
            @if ($errors->first('end_month'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_month')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
			<label for="end_year">End Year:</label>
			<input type="text" name="end_year" id="end_year" pattern="\d{4}" value="{{old('end_year', $employment->end_year)}}">

			@if ($errors->first('end_year'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_year')}}</span>
			@endif
        </div>

        <div class="w3-margin-bottom">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" value="{{old('slug', $employment->slug)}}" required>

            @if ($errors->first('slug'))
                <br>
                <span class="w3-text-red">{{$errors->first('slug')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Employment</button>

    </form>

    <a href="/console/employment/list">Back to Employment List</a>
</section>
@endsection