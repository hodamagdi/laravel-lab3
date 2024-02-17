@extends('layouts.main')

@section('title')
show user - {{ $user->name }}
@endsection

@section('content')

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>User: {{ $user->id }}</h3>
                </div>
            </div>
            <div>

                <div>
                    <h2>User details</h2>
                </div>

                <div class="mb-3">
                    <p>ID: {{ $user->id }}</p>
                </div>

                <div class="mb-3">
                    <p>Name: {{ $user->name }}</p>
                </div>

                <div class="mb-3">
                    <p>E-mail: {{ $user->email }}</p>
                </div>

                <div class="mb-3">
                    <a href="{{ url("users/$user->id/edit") }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                    <form action="{{ url("users/$user->id") }}" method="post" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-sm btn-danger">

                    </form>
                </div>

                <div class="mb-3">
                    <h2>Posts</h2>
                    @if ($posts->count() > 0)
                        <ul>
                            @foreach ($posts as $post)
                                <li>{{ $post->title }} <a href="{{ url("posts/$post->id/edit") }}" class="btn btn-sm btn-secondary mr-2">Edit</a></li>
                            @endforeach
                        </ul>
                    @else
                        <p>No posts found.</p>
                    @endif
                </div>
                {{ $posts->links() }}

            </div>
        </div>
    </div>
</div>
@endsection
