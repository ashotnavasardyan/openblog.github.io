<style>
    #answer{
        color: #fff;
        background: #00aeff;
        padding: 0.4em 1.5em;
        text-decoration: none;
        font-size: 0.9em;
        display: inline-block;
        margin-top: 1em;
        border: none;
        outline: none;
        border: 1px solid  #00aeff;
        transition: 0.5s all ease;
        -webkit-transition: 0.5s all ease;
        -moz-transition: 0.5s all ease;
        -o-transition: 0.5s all ease;
        -ms-transition: 0.5s all ease;
    }

    #answer:hover{
        background: transparent;
        color:#00aeff;
    }
</style>
<div class="single">
    <div class="container">
        <div class="col-md-8 single-main">
            <div class="single-grid">
                <img src="images/{{$article->images}}" alt=""/>
                <p>{{$article->text}}</p>
            </div>
            <ul class="comment-list">
                <h5 class="post-author_head">This post written by <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></h5>
                <li><img src="images/avatar.png" class="img-responsive" alt="">
                    <div class="desc">
                        <p>View all posts by: <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            <h3>Comments</h3>
            @if($comments)
            @foreach($comments as $comment)
            <ul class="comment-list">
                <li><img src="images/avatar.png" class="img-responsive" alt="">
                    <div class="desc">
                        <p>Comment by: <a href="#" title="Posts by admin" rel="author">{{$comment->user->name}}</a></p>
                        <br>
                        <p>Title:{{$comment->title}}</p>
                        <br>
                        <p>{{$comment->text}}</p>
                        <br>
                        <input type="submit" name="answer" value="ANSWER" id="answer">
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            @endforeach
            @endif
            <div class="content-form">
                <h3>Leave a comment</h3>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                    @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                    @endforeach
                        </ul>
                    </div>
                @endif
                @if($status)
                    <div class="alert alert-success">
                        <ul>
                            @foreach($status as $s)
                                <li>{{$s}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('commentsend',$article->alias)}}" method="post" id="commentForm">
                    <input placeholder="Title" type="text" name="title">
                    <textarea placeholder="Message" name="text" ></textarea>
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <input type="hidden" name="user_id" value="{{$article->user->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="SEND" id="send"/>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        /*$( "#send" ).on( "click", function( event ) {
            var data = $('#commentForm').serializeArray();
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET",data,true);
            xhttp.send();
            /*$.ajax({
                url:$('#commentForm').attr('action'),
                data:data,
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                datatype:'JSON',
                success: function () {

                },
                error: function () {

                }
                

            });
        });*/
    });
</script>