<style>
    #send {
        color: #fff;
        background: #00aeff;
        padding: 0.4em 1.5em;
        text-decoration: none;
        font-size: 0.9em;
        display: inline-block;
        margin-top: 1em;
        border: none;
        outline: none;
        border: 1px solid #00aeff;
        transition: 0.5s all ease;
        -webkit-transition: 0.5s all ease;
        -moz-transition: 0.5s all ease;
        -o-transition: 0.5s all ease;
        -ms-transition: 0.5s all ease;
    }

    #image {
        width: 47%;
        color: #fff;
        font-family: 'Lato', sans-serif;
        background: #00aeff;
        padding: 0.4em 1.5em;
        text-decoration: none;
        font-size: 1.1em;
        display: inline-block;
        margin-top: 1em;
        border: none;
        outline: none;
        border: 1px solid #00aeff;
        transition: 0.5s all ease;
        -webkit-transition: 0.5s all ease;
        -moz-transition: 0.5s all ease;
        -o-transition: 0.5s all ease;
        -ms-transition: 0.5s all ease
    }

    #send:hover {
        background: transparent;
        color: #00aeff;
    }

    .content-grids {
        float: none !important;

    }

    .top-menu li {
        font-size: 20px;
    }

    .right_bar {
        margin-right: 20px;
    }

    .contact-details form input[type="text"], .contact-details textarea {
        color: black;
    }

    .content-grids {
        width: 535px;
        margin-left: 180px;
    }
    .contact-info{
        width: 47%;
    }
</style>

<div class="container">

    <div class="contact-info">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <h2>My Settings</h2></div>
    <div class="contact-details" id="contact">
        <form action="{{route('settings',$user->id)}}" method="post" id="messageForm" enctype="multipart/form-data">
            <span style="color: #dc3545"> {!! $errors->first("text", '<p class="help-block">:message</p>') !!}</span>
            <input type="text" name="name" placeholder="Name" value="{{$user->name}}"/><br>
            <p style="font-size: 14px">Change Profile image</p>
            <input type="file" name="image" id="image"><br>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="UPDATE" id="send"/>
        </form>
    </div>
</div>
<script>
    $(".alert-success").fadeOut(2000);
</script>
