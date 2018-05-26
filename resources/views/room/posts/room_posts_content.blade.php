@isset($articles)
    <style>

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
    <h1>My Posts</h1>
    @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
<div class="limiter">
    <form action="{{route('posts.create')}}">
        <input type="submit" value="Create New Post" class="btn btn-warning btn-sm btn-block newarticle">
    </form>
    <div class="container-table100">
        <div class="wrap-table100">
            <div class="table">
                <div class="row header">
                    <div class="cell">
                        <h4>Title</h4>
                    </div>
                    <div class="cell">
                        <h4>Category</h4>
                    </div>
                    <div class="cell">
                        <h4>Image</h4>
                    </div>
                    <div class="cell">
                        <h4>Alias</h4>
                    </div>
                    <div class="cell">
                        <h4>Edit</h4>
                    </div>
                    <div class="cell">
                        <h4>Delete</h4>
                    </div>
                </div>
                @foreach($articles as $article)

                    <div class="row">
                        <div class="cell" data-title="Full Name">
                            <a href="{{route('posts.show',$article->alias)}}"><p>{{$article->title}}</p></a>
                        </div>
                        <div class="cell" data-title="Age">
                            <p>{{$article->category->name}}</p>
                        </div>
                        <div class="cell" data-title="Job Title">
                            <img src="/images/{{$article->images}}" alt="image" id="image_table">
                        </div>
                        <div class="cell" data-title="Location">
                            <p>{{$article->alias}}</p>
                        </div>
                        <div class="cell" data-title="Location">
                            <form action="{{route('posts.edit',$article->alias)}}">
                                <input type="submit" value="Edit" class="btn btn-success">
                            </form>
                        </div>
                        <div class="cell" data-title="Job Title">
                            <form method="post" action="{{route('posts.destroy',$article->id)}}" id="eleteForm" >
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
