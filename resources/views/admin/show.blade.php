@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Course Description</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3><strong>Course Code: </strong>{{$course->code}}</h3>
                    <h3><strong>Course Title: </strong>{{$course->title}}</h3>
                    <h3><strong>Course Credit: </strong> {{$course->credit}} unit(s)</h3>
                    <h3><strong>Course Lecturer: </strong>{{$course->lecturer}}</h3>
                    <h3><strong>Course Description</strong></h3>
                    <p>{{$course->description}}</p>

                    <a href="/course/{{$course->id}}/edit">Edit</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection