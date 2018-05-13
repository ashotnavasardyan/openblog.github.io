@if(isset($rightbar))
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
    </style>
<div class="right_bar">
    <img src="/images/avatar.png">
    <p>{{$user->name}}</p>
    <div class="task">
        <ul>
            @foreach($rightbar as $item)
            <li><a href="{{$item->path}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
@endif