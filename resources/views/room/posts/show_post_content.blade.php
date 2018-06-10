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

    .single {
        border-top: none !important;
    }

    .cell {
        width: 200px;
    }

    .table {
        display: block !important;
    }

    #save {
        margin-top: 15px;
        margin-bottom: 15px;
        font-size: 22px;
        font-family: Poppins-Regular;
    }

    .top-menu li {
        font-size: 20px;
    }

    .container {
        width: 1170px;
    }

    .content-grids {
        float: right !important;
    }

    .single-grid * {
        margin-top: 35px;
        white-space: pre-line;
    }

    td, th {
        padding: 8px;
        text-align: center;
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
            <h3 id="comcount" style="color: #00aeff;">Comments <span>{{count($article->comments)}}</span></h3>
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
                                    <a href="{{route('user',$article->user->id)}}" style="font-size: 15px">
                                        <p>{{$comment->user->name}}</p></a>
                                </div>
                                <div class="cell">
                                    <form action="{{route('comment_show')}}" method="post">
                                        <label for="check_show" name="comment_show"></label>
                                        <input type="checkbox" name="comment_show" id="check_show" value="{{$comment->comment_show}}"@if($comment->comment_show){{'checked'}}@endif>
                                        <input type="hidden" name="id" value="{{$comment->id}}">
                                        {{csrf_field()}}
                                    </form>
                                </div>
                                <div class="cell">
                                    <form method="post" action="{{route('comment_delete',$comment->id)}}">
                                        {{csrf_field()}}
                                        <input type="button" value="Delete" class="btn btn-danger"
                                               id="{{$comment->id}}">
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $('input[value="Delete"]').on('click', function (event) {
        var comcount = $('#comcount span').text();
        var data = $(event.target).parent().serializeArray();

        $.ajax({
            url: $(event.target).parent().attr('action'),
            data: data,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            datatype: 'JSON',
            success: function (resp) {
                var obj = JSON.parse(resp);
                comcount--;
                $(event.target).parents().eq(2).after('<div style="margin-bottom: -2px;" class="alert alert-success" ><p style="text-align: center;">' + obj.status + '</p></div>');
                $(event.target).parents().eq(2).remove();
                $('#comcount span').text(comcount);
                $(".alert-success").fadeOut(2000, function () {
                    $(".alert-success").remove();
                });
            }
        });
    });
    $('input[type="checkbox"]').on('click', function (event) {
        var show = $(event.target).attr('value');
        (show == 1) ? $(event.target).attr('value', 0) : $(event.target).attr('value', 1);
        var data = $(event.target).parent().serializeArray();
        console.log(data);
            $.ajax({
                url: $(event.target).parent().attr('action'),
                data: data,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                datatype: 'JSON',
                success: function (resp) {
//                    var resp = JSON.parse(resp);
//                    console.log(resp);
                }
            });
    });
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