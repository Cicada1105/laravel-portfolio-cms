@extends('layout/console')

@section('content')
<section class="w3-padding">

	<h2>Add Education</h2>

    <form method="post" action="/console/education/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="institution_name">Institution Name:</label>
            <input type="institution_name" name="institution_name" id="institution_name" value="{{old('institution_name')}}" required>
            
            @if ($errors->first('institution_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('institution_name')}}</span>
            @endif
        </div>


		<?php
			$degree_types = array("Undergraduate","Masters","Post Graduate Certificate","Doctorate");
		?>
        <div class="w3-margin-bottom">
            <label for="degree_type">Degree Type:</label>
			<select name="degree_type" id="degree_type">
				<option value="" disabled>--Select--</option>
				@foreach($degree_types as $degree_type)
			  		<option value="{{$degree_type}}">{{$degree_type}}</option>
				@endforeach
			</select>

            @if ($errors->first('degree_type'))
                <br>
                <span class="w3-text-red">{{$errors->first('degree_type')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="degree">Degree:</label>
            <input type="text" name="degree" id="degree" value="{{old('degree')}}" required>

            @if ($errors->first('degree'))
                <br>
                <span class="w3-text-red">{{$errors->first('degree')}}</span>
            @endif
        </div>

        <?php 
        	$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
        ?>
        <div class="w3-margin-bottom">
			<label for="start_month">Start Month:</label>
			<select name="start_month" id="start_month">
				@foreach($months as $month)
					@if (old('start_month') == strtolower($month))
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
			<input type="text" name="start_year" id="start_year" pattern="\d{4}" value="{{old('start_year')}}">

			@if ($errors->first('start_year'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_year')}}</span>
			@endif
        </div>

        <div class="w3-margin-bottom">
			<label for="end_month">End Month:</label>
			<select name="end_month" id="end_month">
				@foreach($months as $month)
					@if (old('end_month') == strtolower($month))
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
			<input type="text" name="end_year" id="end_year" pattern="\d{4}" value="{{old('end_year')}}">

			@if ($errors->first('end_year'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_year')}}</span>
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

        <button type="submit" class="w3-button w3-green">Add Education</button>

    </form>

    <a href="/console/education/list">Back to Education List</a>

</section>
@endsection