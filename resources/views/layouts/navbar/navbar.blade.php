<div class="container">
    <div class="logo">
        <a href="{{route('home')}}"><img src="images/logo.jpg" title="" /></a>
    </div>

    <div class="top-menu">
        <div class="search">
            <form>
                <input type="text" placeholder="" required="">
                <input type="submit" value=""/>
            </form>
        </div>
        <span class="menu"> </span>
        <ul>
            @if($menus)
                @foreach($menus as $menu)
                    <li><a href="{{$menu->path}}")}}>{{$menu->title}}</a></li>
                @endforeach
            @endif

            <div class="clearfix"> </div>
        </ul>
    </div>
    <div class="clearfix"></div>
    <script>
        $("span.menu").click(function(){
            $(".top-menu ul").slideToggle("slow" , function(){
            });
        });
    </script>

</div>

