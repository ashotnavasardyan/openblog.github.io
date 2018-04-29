<div class="col-md-4 content-right">
    <div class="categories">
        <h3>CATEGORIES</h3>
        <ul>
            @foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="clearfix"></div>
</div>