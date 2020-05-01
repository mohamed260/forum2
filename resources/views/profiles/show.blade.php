@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>
                        {{ $profileUser->name }}
                        
                    </h1>
                </div>
                <hr>
                @foreach ($activities as $date => $activity)
                    <h3 class="page-header">{{ $date }}</h3>
                    <hr>
                    @foreach($activity as $record)
                        @include ("profiles.activities.{$record->type}", ['activity' => $record])
                    @endforeach
                    <br>
                @endforeach
        </div>
    </div>
@endsection