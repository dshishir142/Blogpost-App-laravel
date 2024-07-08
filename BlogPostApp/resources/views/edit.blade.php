@extends('layouts.app')

@section('content')
<div>
    <form enctype="multipart/form-data" action="{{url('/edit/' . $blog['id'])}}" method="POST">
        @csrf
        <input placeholder="Title" name="title" value="{{$blog->title}}">
        <input placeholder="description" name="description" value="{{$blog->description}}">
        <input type="file" accept="image/*" name='image' value="{{$blog->image}}">
        <input type="hidden" name="username" value="{{$blog->user->name}}">
        <select name="category" id="category">
            <option value="sports" {{ $blog->category == 'sports' ? 'selected' : '' }}>Sports</option>
            <option value="vehicle" {{ $blog->category == 'vehicle' ? 'selected' : '' }}>Vehicle</option>
            <option value="education" {{ $blog->category == 'education' ? 'selected' : '' }}>Education</option>
            <option value="people" {{ $blog->category == 'people' ? 'selected' : '' }}>People</option>
        </select>        
        <button>Submit</button>
    </form>
</div>
@endsection
