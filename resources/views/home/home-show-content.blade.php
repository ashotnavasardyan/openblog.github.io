<style>
    input[name="answer"], #send {
        color: #fff;
        background: #00aeff;
        padding: 0.4em 1.5em;
        text-decoration: none;
        font-size: 0.9em;
        display: inline-block;
        margin-top: 1em;
        border: none;
        outline: none;
        border: 1px solid #00aeff;
        transition: 0.5s all ease;
        -webkit-transition: 0.5s all ease;
        -moz-transition: 0.5s all ease;
        -o-transition: 0.5s all ease;
        -ms-transition: 0.5s all ease;
    }

    input[name="answer"]:hover {
        background: transparent;
        color: #00aeff;
    }

    .content-grids {
        float: none !important;

    }

    .single-grid * {
        margin-top: 35px;
        white-space: pre-line;
    }

    td, th {
        padding: 8px;
        text-align: center;
    }

    .answercomment {
        width: 70%;
        float: right;
        margin-bottom: 0 !important;
        margin-top: 7px !important;
    }

    .com {
        margin-bottom: 2px !important;
        margin-top: 2px !important;
    }

    .answercomment .desc p:first-child {
        display: initial;
    }

    table {
        margin: auto;
    }

    .single {
        border-top: none;
    }

    .content-grids {
        margin-top: 0 !important;
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
                <h5 class="post-author_head">This post written by {{$article->user->name}}</h5>
                <li><img src="/images/{{$article->user->image}}" class="img-responsive" alt="">
                    <div class="desc">
                        <p>View all posts by: <a href="{{route('user',$article->user->id)}}"
                                                 style="font-size: 15px">{{$article->user->name}}</a></p>
                    </div>
                    <div class="clearfix"></div>
                </li>
            </ul>
            @if(session('status'))
                <p class="alert alert-success">{{session('status')}}</p>
            @endif
            <h3 id="comcount" style="color: #00aeff;">Comments <span>{{count($article->comments)}}</span></h3>
            <div id="comments">
                @if($comments)
                    @foreach($comments as $key => $comment)
                        <ul class="comment-list com">
                            <li><img src="/images/{{$comment->user->image}}" class="img-responsive" alt="">
                                <div class="desc">
                                    <p>Comment by: <a href="{{route('user',$comment->user->id)}}"
                                                      style="font-size: 15px">{{$comment->user->name}}</a>
                                        / {{$comment->created_at}}</p>
                                    <br>
                                    <p>Title:{{$comment->title}}</p>
                                    <br>
                                    <p>{{$comment->text}}</p>
                                    <br>
                                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                    <input type="hidden" name="id" value="{{$comment->parent_id}}">
                                    @if($comment->user->id != $user->id)
                                        <input type="button" name="answer" value="ANSWER">
                                    @endif
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
                    <span style="color: #dc3545"> {!! $errors->first("title", '<p class="alert-danger">:message</p>') !!}</span>
                    <input placeholder="Title" type="text" name="title">
                    <span style="color: #dc3545"> {!! $errors->first("text", '<p class="alert-danger">:message</p>') !!}</span>
                    <textarea placeholder="Message" name="text"></textarea>
                    <input type="hidden" name="article_id" value="{{$article->id}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" value="SEND" id="send"/>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="testdiv">

</div>
<!-- LikeBtn.com BEGIN -->
<span class="likebtn-wrapper" data-identifier="item_1" data-share_enabled="false" data-share_size="small"></span>
{{--<script>(function (d, e, s) {--}}
{{--if (d.getElementById("likebtn_wjs")) return;--}}
{{--a = d.createElement(e);--}}
{{--m = d.getElementsByTagName(e)[0];--}}
{{--a.async = 1;--}}
{{--a.id = "likebtn_wjs";--}}
{{--a.src = s;--}}
{{--m.parentNode.insertBefore(a, m)--}}
{{--})(document, "script", "//w.likebtn.com/js/w/widget.js");</script>--}}
{{--<!-- LikeBtn.com END -->--}}
<script>

    $(".comment-list").each(function () {
        if (Number($(this).find("input[name='id']").val()) != 0) {
            var parent_id = $(this).find("input[name='id']").val();
            if (parent_id != undefined) {
//                    $("input[value='18']").parents().eq(5).after($(this));
//                    $("input[value="+parent_id+"]").parents().eq(5).after(this);
                $("input[value=" + parent_id + "][name=parent_id]").parents().eq(2).after($(this).addClass('answercomment'));
                $(this).after('<div class="clearfix"></div>');
            }
        }
    });

    $("input[name='answer']").on("click", function (event) {
        $(event.target).parents().eq(2).after($('.content-form'));
        if ($(event.target).parent().find("input[name='parent_id']")) {
            $('#commentForm').append($(event.target).parent().find("input[name='parent_id']"));
        }
    });

    //        $("#send").on("click", function (event) {
    //
    //            var data = $('#commentForm').serializeArray();
    //            $.ajax({
    //                url: $('#commentForm').attr('action'),
    //                data: data,
    //                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    //                type: 'POST',
    //                datatype: 'JSON',
    //                success: function (resp) {
    //                    if (resp.status) {
    //                        $(".alert").remove();
    //                        $("#comments").before('<div class="alert alert-success">' + '</div>');
    //                        $('.alert-success').append('<li>' + resp.status + '</li>');
    //                        $('.alert-success').fadeOut(2000);
    //                        $('#comments').after($('.content-form'));
    //                        $('#comments').empty();
    //                        for (var i in resp.comments) {
    //                            var comment = resp.comments[i];
    //                            $('#comments').append('<ul class="comment-list">\n' +
    //                                '\n' +
    //                                '                            <p class="key" style="float:right;">#' + (++i) + '</p>\n' +
    //                                '\n' +
    //                                '                            <li><img src="/images/' + resp.image + '" class="img-responsive" alt="">\n' +
    //                                '                                <div class="desc">\n' +
    //                                '\n' +
    //                                '\n' +
    //                                '                                    <p>Comment by: <a href="#" title="Posts by admin"\n' +
    //                                '                                                      rel="author">' + resp.user_name + '</a>\n' +
    //                                '                                        / ' + comment.created_at + '</p>\n' +
    //                                '                                    <br>\n' +
    //                                '                                    <p>Title:' + comment.title + '</p>\n' +
    //                                '                                    <br>\n' +
    //                                '                                    <p>' + comment.text + '</p>\n' +
    //                                '                                    <br>\n' +
    //                                '                                    <input type="hidden" name="parent_id" value="' + comment.id + '">\n' +
    //                                '                                    <input type="hidden" name="id" value="' + comment.parent_id + '">\n' +
    //                                '                                    <input type="button" name="answer" value="ANSWER">\n' +
    //                                '                                </div>\n' +
    //                                '                                <div class="clearfix"></div>\n' +
    //                                '                            </li>\n' +
    //                                '                        </ul>')
    //                        }
    //
    //                        $('#comcount span').text(resp.comments.length)
    //                        $('#commentForm textarea').val('');
    //                        $('#commentForm input[name="title"]').val('');
    //
    //
    //
    //                    }
    //                    resp = JSON.parse(resp);
    //                    if (resp.errors) {
    //                        $(".alert").remove();
    //                        $(".content-form h3").after('<div class="alert alert-danger">' + '</div>');
    //                        resp = resp.errors;
    //                        for (i in resp) {
    //                            $('.alert-danger').append('<li>' + resp[i] + '</li>');
    //                        }
    //
    //                    }
    //
    //                },
    //                error: function(html) {
    //
    //                }
    //            });
    //        });
</script>