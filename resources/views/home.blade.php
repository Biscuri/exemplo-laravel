@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                <div class="card-body">
                    @forelse ($posts as $post)
                        <h1>{{$post->title}}</h1>
                        <p>{{ $post->post }}</p>
                        <hr>
                    @empty
                        <p>Nenhum post.</p>
                    @endforelse
                </div>
            </div>

            <div>
                <form name="posts" action="{{ route ('newPost') }}" method="POST">
                    @csrf
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" id="title" name="title">
                    </div>
                    <div>
                        <label for="post">Post:</label>
                        <textarea name="post" id="post"></textarea>
                    </div>
                    <div>
                        <button type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
