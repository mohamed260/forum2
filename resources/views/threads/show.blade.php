@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <a href="#">
                {{ $thread->creator->name }}
                </a> Posted:
                {{ $thread->title }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $thread->body }}

                </div>
            </div>
        </div>
    </div>
<br>
    <div class="row justify-content-center">
        <div class="col-md-8">

        @foreach ($thread->replies as $reply)
        @include('threads.reply')
        <br>
        @endforeach
        </div>
    </div>
    @if(auth()->check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ $thread->path() . '/replies' }}">
                @csrf
                <div class="form-group">
                <textarea name="body" id="body" class="form-control" placeholder="Have Something To Say?"></textarea>
                </div>

                <button type="submit" class="btn btn-success form-control">Post</button>
                
            </form>
        </div>
    </div>
    @else
    <p class="text-center">Please <a href="{{ route('login') }}"> Sign In </a> To Participate In This Discussion.</p>
    @endif
</div>
@endsection
