@extends('layout.app')
@section('main')
<div class="d-flex justify-content-between">
    <h5><i class="bi bi-journal-richtext"></i> Student list</h5>
    <a href="/add" class="btn btn-primary">Add Student</a>
</div>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers:{
                'x-csrf-token': $('meta[name="csrf-token"]').attr('content')
            }
        })
    })
</script>
<div class="col-md-12 table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>name</th>
                <th>email</th>
                <th>phone</th>
                <th>address</th>
                <th>city</th>
                <th>state</th>
                <th>Country</th>
                <th>status</th>
                <th>english</th>
                <th>maths</th>
                <th>history</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->address}}</td>
            <td>{{$student->city}}</td>
            <td>{{$student->state}}</td>
            <td>{{$student->country}}</td>
            <td id="status{{$student->id}}">@if ($student->status)
                true
            @else
                false
            @endif </td>
            <td>{{$student->subject[0]->english}}</td>
            <td>{{$student->subject[0]->maths}}</td>
            <td>{{$student->subject[0]->history}}</td>
            <td>
                <button class="btn btn-primary btn-sm" style="font-size: 12px" id="change{{$student->id}}">Change by ajax</button>
                <a href="/student/{{$student->id}}/edit" class="btn btn-dark btn-sm mt-1"><i class="bi bi-pencil-square"></i></a>
                <a href="/student/{{$student->id}}/delete" class="btn btn-danger btn-sm mt-1"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
        <script>
            $('#change{{$student->id}}').click(function(e){
                // console.log('working',e);
                $.ajax({
                    url:'/updatestatus/{{$student->id}}',
                    type:'PUT',

                }).done(function(res){
                    $('#status{{$student->id}}').text(res.status)
                    console.log(res.status);
                })
            })
        </script>
            @endforeach
        </tbody>

    </table>
</div>
@endsection