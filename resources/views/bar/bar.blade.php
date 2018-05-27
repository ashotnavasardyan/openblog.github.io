@if(isset($categories) && is_object($categories))
    <style>
        #categories{
            float: right;
            margin-top: 4em;
        }

    </style>
    <div class="col-md-4 content-right" id="categories">
        <div class="categories">
            <h3>CATEGORIES</h3>
            <ul>
                @foreach($categories as $category)
                    @if($category->name=="none")
                        @continue
                    @endif
                    <li><a href="{{route('category',$category->alias)}}">{{$category->name}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
@endif