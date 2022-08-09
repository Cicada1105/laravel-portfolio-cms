@extends('layout/console')

@section('content')
<section class="w3-padding">

	<h2>Manage Education</h2>


	<table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th></th>
            <th>Institution Name</th>
            <th>Degree Type</th>
            <th>Degree</th>
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
        @foreach ($institutions as $education)
            <tr>
                <td></td>
                <td>{{$education->institution_name}}</td>
                <td>{{$education->degree_type}}</td>
                <td>{{$education->degree}}</td>
                <td>{{$education->start_month}}</td>
                <td>{{$education->start_year}}</td>
                <td>{{$education->end_month}}</td>
                <td>{{$education->end_year}}</td>
                <td>
                    <a href="/education/{{$education->slug}}">
                        {{$education->slug}}
                    </a>
                </td>
                <td>{{$education->created_at->format('M j, Y')}}</td>
                <td><a href="/console/education/edit/{{$education->id}}">Edit</a></td>
                <td><a href="/console/education/delete/{{$education->id}}">Delete</a></td>
                <td></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/education/add" class="w3-button w3-green">New Education</a>

</section>
@endsection