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
    .single{
        border-top:none !important;
    }
    .cell{
        width:200px;
    }
    .table{
        display: block !important;
    }
    #save{
        margin-top: 15px;
        margin-bottom: 15px;
        font-size: 22px;
        font-family: Poppins-Regular;
    }
    .top-menu li{
        font-size: 20px;
    }
    .container {
        width: 1170px;
    }
    .content-grids{
        float: right !important;
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
            <h3 id="comcount" style="color: #00aeff;">Comments <span>{{count($article->comments)}}</span></h3>
            {{--<form method="post" action="{{route('comment_show')}}">--}}
            <input type="button" value="SAVE" class="btn btn-success btn-block" id="save">
                <input type="hidden" name="article_alias" value="{{$article->id}}">
            {{--<div id="comments">--}}
                {{--@if($comments)--}}

                    {{--@foreach($comments as $key => $comment)--}}
                        {{--<ul class="comment-list">--}}

                            {{--<p class="key" style="float:right;">#{{++$key}}</p>--}}

                            {{--<li><img src="/images/avatar.png" class="img-responsive" alt="">--}}
                                {{--<div class="desc">--}}


                                    {{--<p>Comment by: <a href="#" title="Posts by admin" rel="author">{{$comment->user->name}}</a></p>--}}
                                    {{--<br>--}}
                                    {{--<p>Title:{{$comment->title}}</p>--}}
                                    {{--<br>--}}
                                    {{--<p>{{$comment->text}}</p>--}}
                                    {{--<br>--}}
                                    {{--<input type="hidden" name="parent_id" value="{{$comment->id}}">--}}
                                    {{--<input type="button" name="answer" value="ANSWER">--}}
                                {{--</div>--}}
                                {{--<div class="clearfix"></div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table">
                        <div class="row header">
                            <div class="cell">
                                <h4>Comment</h4>
                            </div>
                            <div class="cell">
                                <h4>Author</h4>
                            </div>
                            <div class="cell">
                                <h4>show</h4>
                            </div>
                            <div class="cell">
                                <h4>Delete</h4>
                            </div>
                        </div>
                        @foreach($comments as $comment)
                                <div class="row">
                                    <div class="cell">
                                        <p>{{$comment->text}}</p>
                                    </div>
                                    <div class="cell">
                                        <p>{{$comment->user->name}}</p>
                                    </div>
                                    <div class="cell">
                                        <input type="checkbox"  name="box" value="1" checked>
                                    </div>

                                    {{--<div class="cell" data-title="Job Title">--}}

                                        {{--<input type="checkbox" {{($comment->show==1)?"checked":""}} name="box" value="['show'=>{{$comment->show}},'id'=>{{$comment->id}}]" >--}}


                                    {{--</div>--}}
                                    <div class="cell">
                                        <form method="post" action="{{route('comment_delete',$comment->id)}}">
                                            {{csrf_field()}}
                                            <input type="button" value="Delete" class="btn btn-danger" id="{{$comment->id}}">
                                        </form>
                                    </div>
                                </div>
                        @endforeach
                        </div>
            {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('input[value="Delete"]').on('click',function(event){
        var comcount = $('#comcount span').text();
        var data = $(event.target).parent().serializeArray();
        $.ajax({
            url:$(event.target).parent().attr('action'),
            data:data,
            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type:'POST',
            datatype:'JSON',
            success:function(resp){
                var obj = JSON.parse(resp);
                comcount--;
                $(event.target).parents().eq(2).after('<div style="margin-bottom: -2px;" class="alert alert-success" ><p style="text-align: center;">'+obj.status+'</p></div>');
                $(event.target).parents().eq(2).remove();
                $('#comcount span').text(comcount);
                $(".alert-success").fadeOut(2000,function () {
                    $(".alert-success").remove();
                });


            }
        });
    });
//    $('input[type="checkbox"]').on('click',function(event){
//        var show = $(event.target).attr('value');
//        if(show==1){
//            $(event.target).attr('value',0);
//        }
//        else{
//            $(event.target).attr('value',1);
//        }
//    });
//    $('#save ,input[name="id"]').on('click',function(event){
//        var data  = $('input[name="box"]');
//        var data = data.serializeArray();
//        data.push($('input[name="article_alias"]').val());
//        console.log(data);
//        $.ajax({
//            url:$(event.target).parent().attr('action'),
//            data:data,
//            headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
//            type:'POST',
//            datatype:'JSON',
//            success:function(resp){
//                var resp = JSON.parse(resp);
//                console.log(resp);
//
//            }
//        });

//    });
</script>