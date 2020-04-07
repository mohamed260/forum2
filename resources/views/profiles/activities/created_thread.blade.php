                    <div class="card">
                        <div class="card-header">
                            <div class="level">
                                <span class="flex">
                                    {{ $profileUser->name }} published to thread
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ $activity->subject->body }}

                        </div>
                    </div>