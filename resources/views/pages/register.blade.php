<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/register.css"/>
        <link rel="stylesheet" href="../css/fonts.css"/>
        <title>register</title>
    </head>
    <body>
        <h1 class="title">الانضمام إلى رابطة أتباع أهل البيت</h1>
        <section class="form-section">
            @if(Session::has('error'))
            <div class="error error1">{{Session::get('error')}}</div>
            @endif

            @error("email")
            <div class="error error2">{{$message}}</div>
            @enderror
            @error("password")
            <div class="error error3">{{$message}}</div>
            @enderror
            <form enctype="multipart/form-data" method="post" action="{{route('signup')}}">
                @csrf
                <section class="container">
                    <div class="image-section">
                        <img id="photo" class="static-img" src="../static_images/user.jpg" alt="error"/>
                        <div class="camera-section">
                            <img class="camera-img" src="../static_images/camera.png"/>
                            <input name="image" id="file" class="file-input" type="file" accept="image/*"/>
                        </div>
                    </div>
                </section>
                    <input name="username" class="input1" type="text" placeholder="Username"/>
                    <input name="email" class="input1" type="text" placeholder="Email"/>
                    <input minlength="8" name="password" class="input1" type="password" placeholder="Password"/>
                    <input name="date" style="text-indent: 0;" class="input1" type="date" value="2023-02-23"/>
                    <div class="licenses">   <span>الشروط: </span>الحفاظ على الاحترام وعدم نشر منشورات مسيئة</div>
                    <div class="accept">
                        <span class="accept-text">الموافقة على الشروط</span>
                        <input name="accept" type="checkbox" class="check-box"/>
                    </div>
                    <button id="send" type="submit">إنشاء الحساب</button>
            </form>
        </section>
        <script src="../js/photo_preview.js"></script>
        {{-- <script src="../js/save_register.js"></script> --}}
    </body>
</html>