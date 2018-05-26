@isset($comments)
    <style>
        .cell{
            width: 25% !important;
        }
        h1  {
            color:#00aeff;
            margin:5px;
        }
        .cell input,h4{
            font-family: 'Lato', sans-serif;
        }
        .newarticle {
            font-size: 16px;
            margin-bottom: 15px;
            margin-top: 10px;
        }
        .container-table100{
            min-height: 0;
        }
        #image_table{
            width:200px;
            height:100px;
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
    <h1>My Comments</h1>
    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table">
                    <div class="row header">
                        <div class="cell">
                            <h4>Post</h4>
                        </div>
                        <div class="cell">
                            <h4>Title</h4>
                        </div>
                        <div class="cell">
                            <h4>Comment</h4>
                        </div>
                        <div class="cell">
                            <h4>Edit</h4>
                        </div>
                        <div class="cell">
                            <h4>Delete</h4>
                        </div>
                    </div>
                    @foreach($comments as $comment)

                        <div class="row">
                            <div class="cell">
                                <p>{{$comment->article->title}}</p>
                            </div>

                            <div class="cell">
                                <p>{{$comment->title}}</p>
                            </div>
                            <div class="cell">
                                <p>{{str_limit($comment->text,70)}}</p>
                            </div>
                            <div class="cell">
                                <form action="{{route('comments.edit',$comment->id)}}">
                                    <input type="submit" value="Edit" class="btn btn-success">
                                </form>
                            </div>
                            <div class="cell" data-title="Job Title">
                                <form method="post" action="{{route('comments.destroy',$comment->id)}}" id="eleteForm" >
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="button" value="Delete" class="btn btn-danger">
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".alert-success").fadeOut(2000);
            $('input[value="Delete"]').on('click',function(event){
                var data = $(this).parent().serializeArray();
                $.ajax({
                    url:$(this).parent().attr('action'),
                    data:data,
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type:'POST',
                    datatype:'JSON',
                    success:function(resp){
                        $(event.target).parents().eq(2).remove();
                        $('.limiter').before('<div class="alert alert-success">'
                            +resp.status+
                            ' </div>');
                        $(".alert-success").fadeOut(2000);
                    }

                });
            });
        });
    </script>
@endif
