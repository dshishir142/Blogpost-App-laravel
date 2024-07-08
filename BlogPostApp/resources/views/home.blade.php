@extends('layouts.app')

@section('content')

<a href="{{ url('/addblog') }}">
    <button>Add Blogs</button>
</a>
<hr>
    @foreach ($data as $item)
        <div>
            <h2>{{ $item->title }}</h2>
            <img src="{{ asset('uploads/demo/' . $item->image) }}" width="250" height="auto">
            <h5>{{ $item->description }}</h5>
            <p>- {{ $item->user->name }}</p>
            <p>{{ $item->created_at->diffForHumans() }}</p>


                <a href="{{ url('/editpage/' . $item->id) }}">
                    <button class="btn btn-dark">edit</button>
                </a>

            <a href="{{ url('/delete/' . $item->id) }}">
                <button class="btn btn-danger">delete</button>
            </a>
        </div>
    @endforeach
@endsection
