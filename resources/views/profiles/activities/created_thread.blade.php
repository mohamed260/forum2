@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} published 
            <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}
        </a>
    @endslot
    @slot('heading')
        {{ $activity->subject->body }}
    @endslot
@endcomponent
 