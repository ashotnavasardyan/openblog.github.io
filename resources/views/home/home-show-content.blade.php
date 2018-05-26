<style>
    input[name="answer"] , #send{
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

    input[name="answer"]:hover{
        background: transparent;
        color:#00aeff;
    }
    .content-grids{
        float: none !important;

    }
    .single-grid * {
        margin-top: 35px;
        white-space: pre-line;
    }
    td,th{
        padding: 8px;
        text-align: center;
    }
    table{
        margin: auto;
    }
    .single{
        border-top: none;
    }
    .content-grids {
        margin-top:0 !important;
    }
</style>
<div class="single">
    <div class="container">
        <div class="col-md-8 single-main">
            <h2 style="color: #00aeff;margin-bottom: 20px">{{$article->title}}</h2>
            <div class="single-grid">
                <img src="/images/{{$article->images}}" alt=""/>
                <p>{!! $article->text !!}</p>
            </div>
            <ul class="comment-list">
                <h5 class="post-author_head">This post written by <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></h5>
                <li><img src="/images/avatar.png" class="img-responsive" alt="">
                    <div class="desc">
                        <p>View all posts by: <a href="#" title="Posts by admin" rel="author">{{$article->user->name}}</a></p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            <h3 id="comcount" style="color: #00aeff;">Comments <span>{{count($article->comments)}}</span></h3>
            <div id="comments">
            @if($comments)

            @foreach($comments as $key => $comment)
            <ul class="comment-list">

                <p class="key" style="float:right;">#{{++$key}}</p>

                <li><img src="/images/avatar.png" class="img-responsive" alt="">
                    <div class="desc">


                        <p>Comment by: <a href="#" title="Posts by admin" rel="author">{{$comment->user->name}}</a> / {{$comment->created_at}}</p>
                        <br>
                        <p>Title:{{$comment->title}}</p>
                        <br>
                        <p>{{$comment->text}}</p>
                        <br>
                            <input type="hidden" name="parent_id" value="{{$comment->id}}">
                            <input type="button" name="answer" value="ANSWER">
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            @endforeach
            @endif
            </div>
            <div class="content-form">
                <h3>Leave a comment</h3>
                <form action="{{route('commentsend',$article->alias)}}" method="post" id="commentForm">
                    <input placeholder="Title" type="text" name="title">
                    <textarea placeholder="Message" name="text" ></textarea>
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="button" value="SEND" id="send"/>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="testdiv">

</div>
<!-- LikeBtn.com BEGIN -->
<span class="likebtn-wrapper" data-identifier="item_1" data-share_enabled="false" data-share_size="small"></span>
<script>(function(d,e,s){if(d.getElementById("likebtn_wjs"))return;a=d.createElement(e);m=d.getElementsByTagName(e)[0];a.async=1;a.id="likebtn_wjs";a.src=s;m.parentNode.insertBefore(a, m)})(document,"script","//w.likebtn.com/js/w/widget.js");</script>
<!-- LikeBtn.com END -->
<script>
    $(document).ready(function(){

        $("input[name='answer']").on("click",function (event) {
            //var data = $('#comment').serializeArray();
            //var data = this.prev;
           // console.log(data);
            //$('#commentForm').append( '<input type="hidden" name="parent_id" value='+this.parent_id+'>');
        });

        $( "#send" ).on( "click", function( event ){

            var data = $('#commentForm').serializeArray();
            var key =  $('#comcount span').text();
            $.ajax({
                url:$('#commentForm').attr('action'),
                data:data,
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                datatype:'JSON',
                success: function (resp) {
                    if(resp.status){
                        key++;
                        $(".alert").remove();
                        $(".content-form h3").after('<div class="alert alert-success">' + '</div>');
                        var stat = resp.status;
                        for(i in stat){
                            $('.alert-success').append('<li>'+stat[i]+'</li>');
                        }
                        $('#comments').append('<ul class="comment-list">\n' +
                            '<p style="float:right;">'+'#'+key+'</p>'+
                            '                <li><img src="/images/avatar.png" class="img-responsive" alt="">\n' +
                            '                    <div class="desc">\n' +
                            '                        <p>Comment by: <a href="#" title="Posts by admin" rel="author">'+resp.user_name+'</a></p>\n' +
                            '                        <br>\n' +
                            '                        <p>Title:'+data[0].value+'</p>\n' +
                            '                        <br>\n' +
                            '                        <p>'+data[1].value+'</p>\n' +
                            '                        <br>\n' +
                            '                        <input type="submit" name="answer" value="ANSWER" id="answer">\n' +
                            '                    </div>\n' +
                            '                    <div class="clearfix"></div>\n' +
                            '                </li>\n' +
                            '            </ul>\n')
                        $('#commentForm textarea').val('');
                        $('#commentForm input[name="title"]').val('');
                        $('#comcount span').text(key);
                        $(".alert-success").fadeOut(2000);
                    }
                    resp = JSON.parse(resp);
                    if(resp.errors){
                        $(".alert").remove();
                        $(".content-form h3").after('<div class="alert alert-danger">' + '</div>');
                        resp = resp.errors;
                        for(i in resp){
                            $('.alert-danger').append('<li>'+resp[i]+'</li>');
                        }

                    }

                },
                error: function (html) {

                }
            });
        });
    });
</script>