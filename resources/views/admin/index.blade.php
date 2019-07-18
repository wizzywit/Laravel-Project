@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Course Listings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                      <ul>
                      @foreach ($courses as $course)
                        <li>
                            <a href="/course/{{$course->id}}">{{$course->code}}</a>
                        </li>
                      @endforeach
                      </ul>
                    

                      <a href="/course/create">Create new Course</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection