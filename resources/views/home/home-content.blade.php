<style>
    #home_image {
        width: 100%;
        height: 300px;
    }

    .content-grids {
        float: none !important;
        width: 1050px !important;
    }

    .content-grid-info {
        width: 107%;
    }

    .top-menu li {
        font-size: 20px;
    }

    .cat_name {
        color: #00aeff;
        margin-bottom: 15px;
    }

    #subscribe {
        float: right;
        background-color: red;
        white-space: nowrap;
        font-size: 1.4rem;
        font-weight: 500;
        letter-spacing: .007px;
        text-transform: uppercase;
        color: white;
        border: navajowhite;
        padding: 6px;
        margin-right: 101px;
    }

    #subscribe:hover {
        font-size: 1.43rem;

    }

</style>
@if(isset($category))
    <div>
        <form method="post" action="{{route('subscribe',$category->alias)}}" id="subscribe_form">
            <input type="hidden" value="{{($subscribed)?"1":"0"}}" name="subscribed">
            {{ csrf_field() }}
            <input type="submit" value="{{($subscribed)?"unsubscribe":"subscribe"}}" id="subscribe">


        </form>
    </div>
    <h1 class="cat_name">{{$category->name}}</h1>

@endif
<div class="col-md-8 content-main">
    <div class="content-grid">
        @foreach($articles as $article)
            <div class="content-grid-info">
                <img src="/images/{{$article->images}}" alt="" id="home_image"/>
                <div class="post-info">
                    <h4><a href="{{route('blogshow',$article->alias)}}">{{$article->title}}</a> <br><br>Post by
                        :&nbsp;<a href="{{route('user',$article->user->id)}}"
                                  style="font-size: 15px">{{$article->user->name}}</a>&ensp;/&ensp;<a
                                href="{{route('category',$article->category->alias)}}"
                                style="font-size: 15px">{{$article->category->name}}</a>&ensp;/&ensp;{{$article->created_at}}&ensp;/&ensp;{{count($article->comments)}}
                        comments</h4>
                    <p>{{$article->desc}}</p>
                    <a href="{{route('blogshow',$article->alias)}}"><span></span>READ MORE</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="clearfix"></div>
{{--<script>--}}
    {{--$(document).ready(function(){--}}

        {{--$( "#subscribe" ).on( "click", function( event ){--}}

            {{--var data = $('#subscribe_form').serializeArray();--}}
            {{--$.ajax({--}}
                {{--url:$('#subscribe_form').attr('action'),--}}
                {{--data:data,--}}
                {{--headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
                {{--type:'POST',--}}
                {{--datatype:'JSON',--}}
                {{--success: function (resp) {--}}
                    {{--if(data[0].value){--}}
                        {{--$('#subscribe').value('subscribe');--}}
                    {{--}--}}
                    {{--else{--}}
                        {{--$('#subscribe').value('unsubscribe');--}}
                    {{--}--}}
                {{--},--}}
                {{--error: function (html) {--}}

                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}
