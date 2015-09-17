<aside class="comments">
    @if(Auth::check())
        @include('partials.commentform')
    @endif
    <div class="commentwrapper">
        @if(count($comments  = $video->comments) > 0)
            @foreach($comments as $comment)
                <div class="panel panel-default">
                    <div class="panel-body">
                        {{$comment->content}}
                    </div>
                    <div class="panel-footer">by <a href="/user/{{$comment->user->username}}">{{$comment->user->username}}</a> <small>{{$comment->created_at->diffForHumans()}}</small>
                    @if(auth()->check())
                        @if(auth()->user()->can('delete_comment'))
                            <br><a class="btn btn-danger" href="{{url('comment/' . $comment->id . '/delete')}}">Delete</a>
                        @endif
                    @endif
                    </div>
                </div>
            @endforeach
        @else
            <div class="panel panel-default">
                <div class="panel-body">
                    No comments yet.
                </div>
            </div>
        @endif
    </div>
</aside>