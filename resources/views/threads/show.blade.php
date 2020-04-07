@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="level">
                        <span class="flex">
                            <a href="{{ route('profile', $thread->creator) }}">
                            {{ $thread->creator->name }}
                            </a> Posted:
                            {{ $thread->title }}
                        </span>

                        @can ('update', $thread)
                            <form action="{{ $thread->path() }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-link">Delete Thread</button>
                            </form>
                        @endcan
                        
                    </div>
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
            <br>
            @foreach ($replies as $reply)
                @include('threads.reply')
                <br>
            @endforeach

            {{ $replies->links() }}


            @if(auth()->check())
                <form method="POST" action="{{ $thread->path() . '/replies' }}">
                    @csrf
                    <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Have Something To Say?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success form-control">Post</button>
                    
                </form>
            @else
            <p class="text-center">Please <a href="{{ route('login') }}"> Sign In </a> To Participate In This Discussion.</p>
            @endif
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p>
                        This Thread Was Published {{ $thread->created_at->diffForHumans() }} By 
                        <a href="#">{{ $thread->creator->name }}</a>, And Currently Has {{ $thread->replies_count }} 
                        {{Str::plural('comment', $thread->replies_count)}} .
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
