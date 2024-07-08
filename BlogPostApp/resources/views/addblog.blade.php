@extends('layouts.app')

@section('content')

<div>

    <form enctype="multipart/form-data" action="{{url('/blog/store')}}" method="POST">
        @csrf
        <input placeholder="Title" type="text" name="title">
        <input placeholder="Description" type="text" name="description">
        <input type="file" name="image" accept="image/*">
        <input type="hidden" name="userid" value="{{Auth::user()->id}}">
        <label for="category">Category</label>
        <select name="category" id="category">
            <option value="sports">Sports</option>
            <option value="vehicle">Vehicle</option>
            <option value="education">Education</option>
            <option value="people">People</option>
        </select>
        <button>Submit</button>


    </form>

</div>


@endsection