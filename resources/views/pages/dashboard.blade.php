<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/dashboard.css"/>
        <link rel="stylesheet" href="../css/fonts.css"/>
        <link rel="stylesheet" href="../css/animations.css"/>
        <title>dashboard</title>
    </head>
    <body dir="rtl">
        <section class="users">
        <h1 class="title">لوحة التحكم</h1>
        <div class="users_number">عدد المستخدمين: {{$users->count()}}</div>
        <div class="title2">المستخدمين:</div>
    <section class="users-section">
        <table class="users_table">
            <tr>
                <td>الرقم</td>
                <td>اسم المستخدم</td>
                <td>الإيميل</td>
                <td>إزالة المستخدم</td>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><div>{{$user->username}}</div></td>
                    <td><div>{{$user->email}}</div></td>
                    <td><div><form method="POST" action="{{route('remove_user',$user->id)}}">
                        @csrf
                        <button type="submit">إزالة</button>
                    </form>
                </div>
            </td>
                </tr> 
            @endforeach
        </table>
    </section>
        </section>
        <div class="approvement-notification">
            <svg id="notification" class="empty" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 16 16">
                <path d="M6 0L5 .25V1h1zm0 1v1H5V1h-.006c-1.259.014-2.18-.03-2.932.384-.376.208-.675.56-.84.999C1.058 2.821 1 3.343 1 4v8c0 .657.058 1.178.222 1.617.165.439.464.788.84.996.753.415 1.674.372 2.932.387h6.012c1.258-.015 2.178.028 2.931-.387a1.87 1.87 0 0 0 .838-.996c.165-.439.225-.99.225-1.617V4c0-.658-.06-1.179-.225-1.617a1.88 1.88 0 0 0-.838-.998c-.753-.416-1.673-.37-2.931-.385H11v1h-1V1zm4 0h1V0l-1 .25zM5.006 5H11c1.26.014 2.087.06 2.453.261.183.102.289.213.386.473.098.26.16 1.266.16 1.266v5c0 .592-.062 1.005-.16 1.265-.097.26-.203.372-.386.473-.366.202-1.194.247-2.453.262H5c-1.26-.015-2.087-.06-2.454-.262-.183-.101-.289-.213-.386-.473C2.062 13.005 2 12.592 2 12V7c0-.593.062-1.006.16-1.266.097-.26.203-.371.386-.473.367-.202 1.196-.247 2.46-.261z" fill="gray" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;isolation:auto;mix-blend-mode:normal;marker:none" white-space="normal" color="#000000"/>
            </svg>
            @if ($users_wait!='[]' || $posts_wait!='[]')
                <svg id="exist" class="exist" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 16 16">
                <path d="M6 0L5 .25V1h1zm0 1v1H5V1c-1.258.015-2.179-.03-2.931.385-.377.208-.676.56-.84.998-.165.439-.223.96-.223 1.617v8c0 .658.058 1.179.223 1.617.164.44.463.789.84.997.752.415 1.673.372 2.931.386h3.004v-1H5c-1.26-.014-2.087-.06-2.453-.261-.183-.102-.29-.213-.387-.473C2.062 13.006 2 12.593 2 12V7c0-.592.063-1.005.16-1.265.098-.26.204-.372.387-.473.367-.202 1.195-.247 2.459-.262H11c1.26.015 2.087.06 2.453.262.184.101.29.213.387.473C13.938 5.995 14 7 14 7v1h1V4c0-.657-.06-1.178-.225-1.617a1.88 1.88 0 0 0-.837-.998c-.753-.415-1.674-.37-2.932-.385v1h-1V1zm4 0h1V0l-1 .25z" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;text-transform:none;isolation:auto;mix-blend-mode:normal;marker:none" color="#000000" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible" fill="gray"/>
                <path class="error" d="M12.5 9A3.5 3.5 0 0 0 9 12.5a3.5 3.5 0 0 0 3.5 3.5 3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 12.5 9zm-.5 1h1v1.168c0 .349-.016.668-.047.957-.03.29-.069.581-.115.875h-.666a12.898 12.898 0 0 1-.125-.875 9.146 9.146 0 0 1-.047-.957zm.5 4a.5.5 0 0 1 .5.5.5.5 0 0 1-.5.5.5.5 0 0 1-.5-.5.5.5 0 0 1 .5-.5z" style="marker:none" color="#000000" overflow="visible" fill="#f22c42"/>
            </svg>
            @endif

        </div>
        <section id="approvement_section" class="approvement-section">
            <svg id="close" class="close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" width="800px" height="800px" viewBox="0 0 64 64" version="1.1">
    
                <title>Button-circle-triangle-right</title>
                <desc>Created with Sketch.</desc>
                <defs>
            
            </defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                    <g id="Button-circle-triangle-right" sketch:type="MSLayerGroup" transform="translate(1.000000, 1.000000)" stroke="#6B6C6E" stroke-width="2">
                        <circle id="Oval" sketch:type="MSShapeGroup" cx="31" cy="31" r="31">
            
            </circle>
                        <path d="M31,5 C45.4,5 57,16.6 57,31" id="Shape" sketch:type="MSShapeGroup">
            
            </path>
                        <path d="M31,57 C16.6,57 5,45.4 5,31" id="Shape" sketch:type="MSShapeGroup">
            
            </path>
                        <path d="M25,42.3 C25,42.7 25.3,43 25.7,43 L41.2,32.9 C41.6,32.6 41.9,31.8 41.9,31.5 L41.9,31.5 C41.9,31.5 41.6,30.3 41.2,30 L25.7,19.8 C25.3,19.8 25,20.1 25,20.5 L25,42.3 L25,42.3 Z" id="Shape" sketch:type="MSShapeGroup">
            
            </path>
                    </g>
                </g>
            </svg>

            @foreach ($posts_wait as $post)
            <section class="post-section">
                <div class="author">
                    <img src="/users_images/{{$post->user->photo}}" alt="error"/>
                    {{$post->user->username}} 
                </div>
                <div class="text">{{$post->text}}</div>
                <div class="image-div">
                    <img src="/posts_images/{{$post->photo}}" alt=""/>
                </div>
                <div class="approve">
                    <form method="POST" action="{{route('agree_post',$post->id)}}">
                        @csrf
                    <button class="agree">الموافقة</button>
                    </form>

                    <form>
                    <button type="button" id="disagree" class="disagree">الرفض</button>
                    </form>
                </div>
            </section>                
            <div class="reason" id="reason">
                <h2>سبب الرفض</h2>
                <form method="POST" action="{{route('remove_post',$post->id)}}">
                    @csrf
                    <input name="reason" type="text"/>
                    <button type="submit">إرسال</button>
                </form>
            </div>
            @endforeach
            @foreach ($users_wait as $user_wait)
            <div class="person_section">
                <img src="/users_images/{{$user_wait->photo}}"/>
                <span>{{$user_wait->username}}</span>
                <form method="POST" style="width: 70px;" action="{{route('agree_user',$user_wait->id)}}">
                    @csrf
                <button type="submit" class="agree">قبول</button>
                </form>
                <form method="POST" style="width: 70px;" action="{{route('disagree_user',$user_wait->id)}}">
                    @csrf
                <button href="#" class="disagree">رفض</button>
                </form>
            </div>
            @endforeach
        </section>

        <script src="../js/approvement.js"></script>
    </body>
</html>