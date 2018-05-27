@isset($subscribes)
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
        #subscribe{
            text-transform: uppercase;
        }
        .cell{
            width: 33% !important;
        }
    </style>
    <h1>My Subscribes</h1>
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
                            <h4>Category</h4>
                        </div>
                        <div class="cell">
                            <h4>Alias</h4>
                        </div>
                        <div class="cell">
                            <h4>Subscribe</h4>
                        </div>
                    </div>
                    @foreach($subscribes as $subscribe)

                        <div class="row">
                            <div class="cell">
                                <a href="{{route('category',$subscribe->alias)}}"><p>{{$subscribe->name}}</p></a>
                            </div>
                            <div class="cell">
                                <p>{{$subscribe->alias}}</p>
                            </div>
                            <div class="cell">
                                <form method="post" action="{{route('unsubscribe',$subscribe->alias)}}" id="eleteForm" >
                                    {{ csrf_field() }}
                                    <input type="button" value="unsubscribe" class="btn btn-danger" id="subscribe">
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
            $('#subscribe').on('click',function(event){
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
