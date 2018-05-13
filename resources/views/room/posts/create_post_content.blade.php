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



    .contact-details form input[type="text"]:nth-child(2),.contact-details form input[type="text"]:nth-child(4){
        margin-right:0%;
    }
</style>

<div class="container">
    <div class="contact-info">
        <h2>New Post</h2>
    </div>
    <div class="add-post">
        <form action="{{route('posts.store')}}" method="post" id="messageForm" enctype="multipart/form-data">
            <span style="color: #dc3545"> {!! $errors->first("alias", '<p class="help-block">:message</p>') !!}</span>
            <input type="text" name="alias" placeholder="Alias" value="{{old('alias')}}"/>
            <span style="color: #dc3545"> {!! $errors->first("title", '<p class="help-block">:message</p>') !!}</span>
            <input type="text" name="title" placeholder="Title" value="{{old('title')}}"/>
            <span style="color: #dc3545"> {!! $errors->first("desc", '<p class="help-block">:message</p>') !!}</span>
            <input type="text" name="desc" placeholder="Description" value="{{old('desc')}}"/>
            <input type="hidden" name="user_id">
            <select name="category_id">
                <option disabled>Select category for your post ?</option>
                @foreach($category as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            <div class="ck">
                <span style="color: #dc3545"> {!! $errors->first("text", '<p class="help-block">:message</p>') !!}</span>
            <textarea  name="text" class="ckeditor" >{{((old('text'))?old('text'):"")}}</textarea>
            </div>
            <span style="color: #dc3545"> {!! $errors->first("images", '<p class="help-block">:message</p>') !!}</span>
            <input type="file" name="images">

            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="submit" value="Add Post" id="send"/>
        </form>
    </div>
</div>
