
@extends('layouts.app')
<link rel="stylesheet" href="{{ URL::asset('public/css/commentStyle.css') }}" />
@section('content')
  <div class="col-md-8" id="div_left">
    <div class="row">
      <div class="col-md-12">
        <h1>{{$post['title']}}</h1>
        <p>{!! nl2br(e($post['body']))!!}</p>
        <hr>
        <p>Posted at {{ date('M j, Y', strtotime($post->created_at)) }}</p>
      </div>
    </div>


    <div id="backend-comments" style="margin-top: 50px;">
      <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
    </div>


    <div class="row">
      <div class="col-md-12">
          <section class="comment-list">
            <!-- First Comment -->
            @foreach ($post->comments as $comment)
                <article class="row">
                  <div class="col-md-2 col-sm-2 hidden-xs">
                    <figure class="thumbnail">
                      <img class="circle-avatar" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                    </figure>
                  </div>
                  <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                      <div class="panel-body">
                        <header class="text-left">
                          <div class="comment-user"><i class="fa fa-user"></i> Username</div>
                          <time class="comment-date"><i class="fa fa-clock-o"></i> <strong>{{$comment->created_at->diffForHumans()}}</strong></time>
                        </header>
                        <div class="comment-post">
                          {{ $comment->comment }}
                        </div>
                        <div class="row">
                          <div class="col-sm-7">
                            <span><strong><small>{{ $comment->replies()->count() }} replies</small></strong></span>
                          </div>
                          <div class="col-sm-5">
                            <p class="text-right">
                              <button class="btn btn-default btn-sm showhidereply"  data-id="{{ $comment->id }}">
                                  <span class="fa fa-reply"></span>
                              </button>
                            </p>
                          </div>
                        </div>


                      </div>
                    </div>

                    <div id="div_reply_{{$comment->id}}" style="display:none;">
                      <!-- <form method="POST" action="/forum/{{ $post->id }}/comments/{{ $comment->id }}/newresponse" id="replycomment-{{ $comment->id }}"> -->
                      <form method="POST" action="/PostReply" class="form-horizontal">
                          {{csrf_field()}}
                          <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                          <div class="form-gorup">
                            <!-- <label name="message">Leave a Comment:</label> -->
                            <textarea id="reply" name="reply" placeholder="Type your comment here..." class="form-control"></textarea>
                          </div>
                         <br>
                          <input type="submit" value="Add Reply" class="btn btn-primary">
                      </form>

                    </div>
                  </div>
                </article>

                @foreach ($comment->replies as $reply)
                <!-- Second Comment Reply -->
                    <article class="row">
                      <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
                        <figure class="thumbnail">
                          <img class="img-responsive" src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" />
                          <figcaption class="text-center">username</figcaption>
                        </figure>
                      </div>
                      <div class="col-md-9 col-sm-9">
                        <div class="panel panel-default arrow left">
                          <div class="panel-heading right">Reply</div>
                          <div class="panel-body">
                            <header class="text-left">
                              <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                              <time class="comment-date"><i class="fa fa-clock-o"></i> <strong>{{$reply->created_at->diffForHumans()}}</strong></time>
                            </header>
                            <div class="comment-post">
                              <p>{{$reply->reply}}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </article>
                @endforeach

            @endforeach
          </section>
      </div>
    </div>

    <hr>

    <div class="card">
      <div class="card-block">
        <form class="form-horizontal" method="POST" action="/PostComment">
          {{csrf_field()}}
          <input type="hidden" name="post_id" value="{{ $post->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">


          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <div class="form-gorup">
            <label name="message">Leave a Comment:</label>
            <textarea id="comment" name="comment" class="form-control" placeholder="Type your comment here..."></textarea>
          </div>
          <br/>
          <input type="submit"  value="Add Comment" class="btn btn-primary">

        </form>
      </div>
    </div>
  </div>


  <div class="col-md-3 col-md-offset-1">
    <div class="col-md-12" style="background-color:#eee;border-radius: 6px;padding-left: 20px;padding-right: 20px;">
      <h2>About me</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>

@endsection

@section('scripts')
<script>
  $(function(){
      // change the selector to use a class
      $(".showhidereply").click(function(){
          var id = $(this).data('id');
          $("#div_reply_"+id).toggle();
      });
  });
</script>
@endsection
