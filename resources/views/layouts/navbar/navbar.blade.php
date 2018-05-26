@if(isset($menus))
    <style>
        .top-menu ul li a {
            margin: 1em 1.7em 1em 0em;
            display: block;
            color: #4a5054;
            font-weight: 400;
            font-size: 0.9em;
            text-decoration: none;
            transition: 0.5s all;
            -webkit-transition: 0.5s all;
            -moz-transition: 0.5s all;
            -o-transition: 0.5s all;
        }
        .top-menu li{
            font-size: 20px;
        }
        .container {
            width: 1100px;
            margin-bottom: 17px;
        }
    </style>
<div class="container">
    <div class="logo">
        <a href="{{route('home')}}"><img src="/images/logo.jpg" title="" /></a>
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
                    <li><a href="{{env('PUBLIC_PATH').$menu->path}}">{{$menu->title}}</a></li>
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
@endif
