@extends('layouts.site')
@section('content')
    @if(isset($content))
    <style>
        li {
            font-size: 0.9em;
        }

        h3,h4,h5{
            font-size: 1.2em;
            margin-bottom: 0.5em;
            margin-top:10px;
            color: #4a5054;
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
        }
        p{
            color: #7C7C7C;
            font-family: 'Lato', sans-serif;
            font-size: 0.9em;
            line-height: 1.8em;
            font-weight: 400;
            margin-bottom: 1em;
        }
        .about-content li{
            list-style-image: url(images/icon3.png);
            margin: 0 0 10px 20px;
            font-family: 'Oswald', sans-serif;
        }
        .content-grids{
            float: none !important;
            margin: 0;
        }
        .top-menu li{
            font-size: 20px;
        }
        .about-content{
            border-top: none;
        }
    </style>
    <div class="about-content">
        <div class="container">
            {!!$content!!}
        </div>
    </div>
    @endif
@endsection

