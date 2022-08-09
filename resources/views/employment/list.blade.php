@extends('layout/console')

@section('content')
<section class="w3-padding">
	<h2>Manage Employment</h2>

	<table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Title</th>
            <th>Employer</th>
            <th>Description</th>
            <th>Start Month</th>
            <th>Start Year</th>
            <th>End Month</th>
            <th>End Year</th>
            <th>Slug</th>
            <th>Created</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($employments as $employment)
            <tr>
                <td></td>
                <td>{{$employment->title}}</td>
                <td>{{$employment->employer}}</td>
                <td>{{$employment->description}}</td>
                <td>{{$employment->start_month}}</td>
                <td>{{$employment->start_year}}</td>
                <td>{{$employment->end_month}}</td>
                <td>{{$employment->end_year}}</td>
                <td>
                    <a href="/employment/{{$employment->slug}}">
                        {{$employment->slug}}
                    </a>
                </td>
                <td>{{$employment->created_at->format('M j, Y')}}</td>
                <td><a href="/console/employment/edit/{{$employment->id}}">Edit</a></td>
                <td><a href="/console/employment/delete/{{$employment->id}}">Delete</a></td>
                <td></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/employment/add" class="w3-button w3-green">New Employment</a>
</section>
@endsection