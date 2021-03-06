<style>
    input {
        border: 1px solid #E2E0ED !important;
    }
    .add-post{
        margin-bottom: 60px;
    }

    .add-post textarea {
        resize: none;
        height: 200px;
        width: 55%;
        margin-right: 0%;
    }
    .add-post form input[type="text"], .add-post textarea , .add-post select{
        width: 55%;
        margin-right: 4%;
        padding: 12px;
        border: 1px solid #E2E0ED;
        font-size: 1em;
        margin-bottom: 2em;
        color: #585858;
        background: #fff;
        outline: none;
        font-weight: 400;
        font-family: 'Lato', sans-serif;
        transition: 0.5s all ease;
        -webkit-transition: 0.5s all ease;
        -moz-transition: 0.5s all ease;
        -o-transition: 0.5s all ease;
        -ms-transition: 0.5s all ease;
    }
    .add-post form input[type="file"],.add-post form input[type="submit"]{
        width: 55%;
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
        -ms-transition: 0.5s all ease;
    }
    .add-post form input[type="text"]:hover, .add-post textarea:hover{
        border: 1px solid #00aeff;
    }
    .ck{
        width: 55%;
    }
    .help-block{
        color:red;
    }
    #edit_image{
        width: 55%;
        height:300px;
        margin-bottom: 20px;
        margin-top: 20px;
    }
    .top-menu li{
        font-size: 20px;
    }
    .container {
        width: 1170px;
    }

    .contact-details form input[type="text"]:nth-child(2),.contact-details form input[type="text"]:nth-child(4){
        margin-right:0%;
    }
    .content-grids{
        float: right !important;
    }
</style>

<div class="container">
    <div class="contact-info">
        <h2>Edit Comment</h2>
    </div>
    <div class="add-post">
        <form action="{{route('comments.update',$comment->id)}}" method="post" id="messageForm">
            <span style="color: #dc3545"> {!! $errors->first("title", '<p class="help-block">:message</p>') !!}</span>
            <input type="text" name="title" placeholder="Title" value="{{$comment->title}}"/>
            <span style="color: #dc3545"> {!! $errors->first("text", '<p class="help-block">:message</p>') !!}</span>
            <textarea type="text" name="text" placeholder="Text">{{$comment->text}}</textarea>
            {{ method_field('PATCH') }}
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="Update" id="send"/>
        </form>
    </div>
</div>
