@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} replyed to 
        <a href="{{ $activity->subject->thread->path() }}">
            '{{ $activity->subject->thread->title }}'
        </a>
    @endslot
    @slot('heading')
        {{ $activity->subject->body }}
    @endslot
@endcomponent
 
