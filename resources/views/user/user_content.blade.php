<style>
    h4{
        font-size:1.7em;
        color:#00aeff;
        margin-right:0.7em;
        display:inline-block;
        text-decoration:none;
        font-family: 'Oswald', sans-serif;
        font-weight:400;
        text-transform:uppercase;
        margin-bottom: 7px;
    }
    #task li {
        margin: 10px;
        list-style-image: url(images/icon3.png);
    }

    .content-grids {
        margin-top: 1.1em;
        float: left;
        width: 500px;
    }
    .top-menu li{
        font-size: 20px;
    }
    img#home_image {
        width: 700px;
        height: 305px;
    }
</style>
<style>
    .right_bar{
        width: 170px;
        margin-top: 25px;
        border-right: 1px solid #d2d2d2;
        float: left;
    }
    .right_bar img{
        width: 150px;
    }
    .right_bar li{
        margin-top: 10px;
        list-style-image: url(/images/icon3.png);
    }
    .task{
        margin-left: 21px;
        margin-top: 16px;
    }
    .content-grids {
        margin-top: 1.1em;
    }
    .content-main{
        float: right;
        margin-top: 25px;
    }
    .content-grid-info{
        width: 700px;
    }

</style>
<div class="right_bar">
    <img src="/images/{{$user->image}}">
    <p>{{$user->name}}</p>
</div>
<div class="col-md-8 content-main">
    <div class="content-grid">
        @foreach($articles as $article)
            <div class="content-grid-info">
                <img src="/images/{{$article->images}}" alt="" id="home_image"/>
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
