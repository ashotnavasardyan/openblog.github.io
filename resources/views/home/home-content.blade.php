<style>
    #home_image{
        width: 100%;
        height: 320px;
    }
    .content-grids{
        float:none !important;
        width: 1050px !important;
    }
    .content-grid-info{
        width: 120%;
    }
    .top-menu li{
        font-size: 20px;
    }

</style>
        <div class="col-md-8 content-main">
            <div class="content-grid">
                @foreach($articles as $article)
                        <div class="content-grid-info">
                            <img src="images/{{$article->images}}" alt="" id="home_image"/>
                            <div class="post-info">
                                <h4><a href="{{route('blogshow',$article->alias)}}">{{$article->title}}</a> <br><br>Post by :&nbsp;{{$article->user->name}}&ensp;/&ensp;{{$article->category->name}}&ensp;/&ensp;{{$article->created_at}}&ensp;/&ensp;{{count($article->comments)}} comments</h4>
                                <p>{{$article->desc}}</p>
                                <a href="{{route('blogshow',$article->alias)}}"><span></span>READ MORE</a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
