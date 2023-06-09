<!DOCTYPE html>
<html>
        <head>
            <meta charset="UTF-8"/>
            <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
            <link rel="stylesheet" href="../css/login.css"/>
            <link rel="stylesheet" href="../css/fonts.css"/>
            <title>login</title>
        </head>
        <body>
            <h1 class="title">رابطة أتباع أهل البيت</h1>
            <section class="form-section">
                @if (Session::has('error'))
                <div class="error">{{Session::get('error')}}</div> 
                @endif
                @error('email')
                    <div class="error error1">{{$message}}</div>
                @enderror
                @error('password')
                    <div class="error error2">{{$message}}</div>
                @enderror
                <form method="POST" action="{{route('log')}}">
                    @csrf
                    <input id="email" name="email" type="text" placeholder="Email"/>
                    <input id="password" name="password" type="password" placeholder="Password"/>
                    <button onclick="Store();" type="submit">تسجيل الدخول</button>
                </form>
            </section>

            {{-- <script src="/js/store.js"></script> --}}
        </body>
</html>