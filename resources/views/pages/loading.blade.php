<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/loading.css"/>
        <link rel="stylesheet" href="../css/fonts.css"/>
        <link rel="stylesheet" href="../css/animations.css"/>
        <title>loading</title> 
    </head>
    <body>
        <div class="circle">

        </div>
        <div class="title">جاري التحميل</div>

        <form method="POST" name="myForm" id="form" action="{{route('log')}}">
            @csrf
            <input style="display: none" name="email" id="email" type="text" value=""/>
            <input style="display: none" name="password" id="password" type="text" value=""/>
        </form>

        <script src="/js/login.js"></script>
    </body>
</html>