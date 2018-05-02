        <div class="col-md-8 content-main">
            <div class="content-grid">
                @foreach($articles as $article)
                        <div class="content-grid-info">
                            <img src="images/{{$article->images}}" alt=""/>
                            <div class="post-info">
                                <h4><a href="{{route('blogshow',$article->alias)}}">{{$article->title}}</a>  {{$article->created_at}} /  {{count($article->comments)}} Comments <h3> Category : <a href="#">{{$article->category->name}}</a></h3></h4>
                                <h3>User: <a href="#">{{$article->user->name}}</a></h3><br>
                                <p>{{$article->desc}}</p>
                                <a href="{{route('blogshow',$article->alias)}}"><span></span>READ MORE</a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        <div class="clearfix"></div>
