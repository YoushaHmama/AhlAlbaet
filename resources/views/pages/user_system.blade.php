<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="stylesheet" href="/css/user_system.css"/>
        <link rel="stylesheet" href="/css/fonts.css"/>
        <link rel="stylesheet" href="/css/animations.css"/>
        <title>user system</title>
    </head>
    <body>
        <input style="display: none" type="text" id="email" value="{{$user->email}}">
        <input style="display: none" type="text" id="password" value="{{$user->password}}">
        <section class="profile-container">
            <section class="profile-section">
                <div class="image-section">
                    <img src="/users_images/{{$user->photo}}"/>
                </div>
                <h1 class="username">{{$user->username}}</h1>
                <hr/>
                <section style="display: flex;flex-direction: column-reverse;">
                @foreach ($user->post as $post)
                
                <section class="post-section">
                    <div class="text">{{$post->text}}</div>
                    <div class="image-div">
                        <img src="/posts_images/{{$post->photo}}" alt=""/>
                    </div>
                    <div class="like-post">
                        <form method="POST" action="{{route('favorite',[$user->id,$post->id])}}">
                            @csrf
                            <button type="submit" style="background: none;border: none; display: flex; align-items: center;">
                                <svg style="position: absolute;z-index: 1;" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="">
                                    <path d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z" fill="" stroke="" stroke-width="2"/>
                                </svg>
                                @foreach ($user->favorite as $favorite)
                                @if ($favorite->id == $post->id)
                                    <svg style="position: absolute;z-index: 2;" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="">
                                        <path d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z" fill="red" stroke="" stroke-width="2"/>
                                    </svg>              
                                @endif
                                @endforeach
                            </button>
                        </form>
                        
                        <div class="like-number">{{$post->favorites}}</div>
                    </div>
                </section>
                @endforeach
            </section>

                <svg id="notification" class="notification" xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1">
                    <title>chat2</title>
                    <path d="M16 5.274c-6.939 0-12.565 4.187-12.565 9.352 0 3.104 2.032 5.854 5.16 7.555-0.009 0.027-2.492 4.545-2.492 4.545s7.583-2.892 7.604-2.904c0.744 0.103 1.511 0.155 2.294 0.155 6.939 0 12.565-4.187 12.565-9.351-0.001-5.165-5.627-9.352-12.566-9.352zM9.968 15.625c-0.552 0-1-0.448-1-1 0-0.553 0.448-1 1-1s1 0.447 1 1c0 0.552-0.447 1-1 1zM13.947 15.667c-0.552 0-1-0.448-1-1 0-0.553 0.448-1 1-1 0.553 0 1 0.447 1 1 0 0.552-0.447 1-1 1zM17.988 15.667c-0.552 0-1-0.448-1-1 0-0.553 0.448-1 1-1 0.553 0 1 0.447 1 1 0 0.552-0.447 1-1 1zM21.988 15.667c-0.552 0-1-0.448-1-1 0-0.553 0.448-1 1-1 0.553 0 1 0.447 1 1 0 0.552-0.447 1-1 1z"/>
                    </svg>
            </section>
            <section id="setting_section" class="setting-section">
                <h1 class="title">الإعدادات</h1>
                <section class="form-section">
                    <form enctype="multipart/form-data" method="POST" action="{{route('edit',$user->id)}}">
                        @csrf
                        @error('password')
                            <div class="error">{{$message}}</div>
                        @enderror
                        @error('username')
                            <div class="error">{{$message}}</div>
                        @enderror
                        <section class="container">
                            <div class="image-section">
                                <img id="photo1" class="static-img" src="/users_images/{{$user->photo}}" alt="error"/>
                                <div class="camera-section">
                                    <img class="camera-img" src="/static_images/camera.png"/>
                                    <input name="image" id="file1" class="file-input" type="file" accept="image/*"/>
                                </div>
                            </div>
                        </section>
                        <input name="username" value="{{$user->username}}" class="input1" type="text" placeholder="Username"/>
                        <input name="password" value="{{$user->password}}" class="input1" type="password" placeholder="Password"/>
                        <button class="save-btn" type="submit">حفظ التعديلات</button>
                        <a><button id="logout" class="logout-btn" type="button">تسجيل الخروج</button></a>
                    </form>
                </section>
            </section>
            <section id="common_posts_section" class="common-posts-section">
                <section class="posting-section">
                    <div class="make-post" id="create_post">
                         إنشاء منشور
                    </div>
                    <div id="tools" class="make-post-tools">
                        <svg id="delete" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 -0.5 17 17" version="1.1" class="si-glyph si-glyph-button-error">
                            <title>970</title>
                            <defs>
                        </defs>
                            <g stroke="" stroke-width="1" fill="" fill-rule="evenodd">
                                <g transform="translate(1.000000, 0.000000)" fill="#434343">
                                    <path d="M13.646,2.371 C10.535,-0.739 5.469,-0.74 2.358,2.371 C-0.753,5.483 -0.752,10.548 2.358,13.66 C5.469,16.77 10.534,16.771 13.646,13.66 C16.758,10.547 16.757,5.483 13.646,2.371 L13.646,2.371 Z M3.587,12.431 C1.148,9.993 1.146,6.028 3.58,3.594 C6.014,1.159 9.979,1.162 12.418,3.6 C14.856,6.038 14.857,10.004 12.424,12.438 C9.988,14.872 6.024,14.869 3.587,12.431 L3.587,12.431 Z" class="si-glyph-fill">
                        </path>
                                    <path d="M10.164,11.063 C9.982,11.063 9.845,10.991 9.776,10.922 L8.009,9.157 L6.314,10.852 C6.248,10.918 6.095,10.998 5.891,10.998 C5.738,10.998 5.507,10.952 5.288,10.733 C5.067,10.513 5.018,10.295 5.017,10.153 C5.013,9.965 5.086,9.823 5.157,9.753 L6.881,8.028 L5.201,6.35 C5.049,6.197 4.922,5.723 5.321,5.325 C5.546,5.1 5.767,5.053 5.914,5.053 C6.097,5.053 6.234,5.125 6.301,5.194 L8.009,6.9 L9.705,5.204 C9.773,5.137 9.925,5.058 10.129,5.058 C10.283,5.058 10.514,5.104 10.733,5.324 C11.111,5.703 11.035,6.134 10.864,6.304 L9.138,8.03 L10.875,9.766 C10.942,9.834 11.021,9.986 11.021,10.19 C11.021,10.344 10.976,10.573 10.756,10.792 C10.531,11.016 10.311,11.063 10.164,11.063 L10.164,11.063 L10.164,11.063 Z" class="si-glyph-fill">
                        
                        </path>
                                </g>
                            </g>
                        </svg>
                        <form enctype="multipart/form-data" method="POST" action="{{route('posting',$user->id)}}">
                            @csrf
                            <textarea class="input-text" name="text" cols="30" rows="3" placeholder="أدخل النص هنا"></textarea>
                            <section class="photo-section">
                                <img class="photo" src="" id="photo2" alt="error"/>
                                <div>
                                    <button onclick="remove_image();" class="remove" id="remove" type="button">إزالة</button>
                                    <img class="camera" src="/static_images/camera.png"/>
                                    <input name="image" type="file" id="file2" class="file-input" accept="image/*"/>
                                </div>
                            </section>
                            <button class="send" type="submit"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 122.56 122.88"><defs><style>.cls-1{fill-rule:evenodd;}</style></defs><title>send</title><path class="cls-1" d="M2.33,44.58,117.33.37a3.63,3.63,0,0,1,5,4.56l-44,115.61h0a3.63,3.63,0,0,1-6.67.28L53.93,84.14,89.12,33.77,38.85,68.86,2.06,51.24a3.63,3.63,0,0,1,.27-6.66Z"/></svg></button>
                    </div>
                        </form>
                </section>

                <section class="post-section-1">
                @foreach ($posts as $post)
                    
                <section class="post-section">
                    <div class="author">
                        <img src="/users_images/{{$post->user->photo}}" alt="error"/>
                        {{$post->user->username}} 
                    </div>
                    <div class="text">{{$post->text}}</div>
                    <div class="image-div">
                        <img src="/posts_images/{{$post->photo}}" alt=""/>
                    </div>
                    <div class="like-post">
                        <form method="POST" action="{{route('favorite',[$user->id,$post->id])}}">
                            @csrf
                            <button type="submit" style="background: none;border: none; display: flex; align-items: center;">
                                <svg style="position: absolute;z-index: 1;" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="">
                                    <path d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z" fill="" stroke="" stroke-width="2"/>
                                </svg>
                                @foreach ($user->favorite as $favorite)
                                @if ($favorite->id == $post->id)
                                    <svg style="position: absolute;z-index: 2;" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 24 24" fill="">
                                        <path d="M4.45067 13.9082L11.4033 20.4395C11.6428 20.6644 11.7625 20.7769 11.9037 20.8046C11.9673 20.8171 12.0327 20.8171 12.0963 20.8046C12.2375 20.7769 12.3572 20.6644 12.5967 20.4395L19.5493 13.9082C21.5055 12.0706 21.743 9.0466 20.0978 6.92607L19.7885 6.52734C17.8203 3.99058 13.8696 4.41601 12.4867 7.31365C12.2913 7.72296 11.7087 7.72296 11.5133 7.31365C10.1304 4.41601 6.17972 3.99058 4.21154 6.52735L3.90219 6.92607C2.25695 9.0466 2.4945 12.0706 4.45067 13.9082Z" fill="red" stroke="" stroke-width="2"/>
                                    </svg>              
                                @endif
                                @endforeach
                            </button>
                        </form>
                        <div class="like-number">{{$post->favorites}}</div>
                    </div>
                </section>
                
                @endforeach
            </section>
            </section>
            <section id="notification_section" class="notification-section">
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
                <section style="display: flex; flex-direction: column-reverse;">
                @foreach ($user->notification as $notification)
                @if ($notification->agree == 0)
                @foreach ($user->post_remove as $remove)
                @if ($remove->post_id == $notification->post_id)
                <div class="notification-container">
                    <img src="/posts_images/{{$remove->photo}}" alt="error"/>
                    <span class="not-approve">تم الرفض:</span>
                    <span class="reason">{{$notification->reason}}</span>
                </div>
                @endif

                @endforeach


                @else
                @foreach ($user->approve as $approve)
                @foreach ($user->post as $post)
                    @if ($approve->post_id == $post->id)
                    <div class="notification-container">
                        <img src="/posts_images/{{$post->photo}}" alt="error"/>
                        <span class="approve">تمت الموافقة</span>
                    </div>
                    @endif
                @endforeach
      
                @endforeach


                @endif

                @endforeach
            </section>
            </section>
        </section>
        <footer>
            <svg id="profile" xmlns="http://www.w3.org/2000/svg" fill="#000000" width="800px" height="800px" viewBox="0 0 32 32" version="1.1">
                <title>profile1</title>
                <path d="M23 11.031c0-0.553-0.448-1-1-1h-3c0 0 0.033-1.204 0.033-2.954 0-1.625-1.346-3.108-3.033-3.108s-2.988 1.411-2.988 3.099c0 1.625-0.012 2.964-0.012 2.964h-3c-0.553 0-1 0.447-1 1 0 0.552 0 1.938 0 1.938h14c0-0.001 0-1.387 0-1.939zM16 8.969c-0.553 0-1-0.448-1-1 0-0.553 0.447-1 1-1 0.552 0 1 0.447 1 1s-0.448 1-1 1zM28 11.031l-4-0.062 0.021 3.104h-16.021v-2.979l-4-0.062c-1.104 0-2 0.896-2 2v14c0 1.104 0.896 2 2 2h24c1.104 0 2-0.896 2-2v-14c0-1.105-0.896-2.001-2-2.001zM10 16.844c1.208 0 2.188 1.287 2.188 2.875s-0.98 2.875-2.188 2.875-2.188-1.287-2.188-2.875 0.98-2.875 2.188-2.875zM5.667 25.979c0 0 0.237-1.902 0.776-2.261s2.090-0.598 2.090-0.598 1.006 1.075 1.434 1.075c0.427 0 1.433-1.075 1.433-1.075s1.552 0.238 2.091 0.598c0.633 0.422 0.791 2.261 0.791 2.261h-8.615zM26 25.031h-9v-1h9v1zM26 23.031h-9v-1h9v1zM26 21.031h-9v-1h9v1zM26 19.031h-9v-1h9v1z"/>
                </svg>
                  <svg id="posts" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 98.63 122.88"><title>paper</title><path d="M98.63,35.57A8.37,8.37,0,0,0,96,32.12L64.39,1.32A3.53,3.53,0,0,0,61.63,0H6.43A6.42,6.42,0,0,0,0,6.43v110a6.42,6.42,0,0,0,6.43,6.43H92.21a6.42,6.42,0,0,0,6.4-6.43V63.37h0V35.57Zm-33.43-23L86.68,32.69H65.2V12.57ZM49.75,115.7H7.18V7.15H58V36.26a3.61,3.61,0,0,0,3.61,3.61H91.45v23.5h0V115.7ZM20.47,53a2.58,2.58,0,0,1,1.87-.88H64.53a2.55,2.55,0,0,1,1.91.87,3,3,0,0,1,.76,2,3.08,3.08,0,0,1-.77,2,2.57,2.57,0,0,1-1.9.88H22.37a2.56,2.56,0,0,1-1.91-.87,3.1,3.1,0,0,1,0-4.08Zm0,40.77a2.53,2.53,0,0,1,1.9-.88H76.25a2.55,2.55,0,0,1,1.91.88,3.1,3.1,0,0,1,0,4.08,2.59,2.59,0,0,1-1.92.86H22.37a2.59,2.59,0,0,1-1.91-.86,3.1,3.1,0,0,1,0-4.08ZM76.25,72.52a2.59,2.59,0,0,1,1.91.88,3.1,3.1,0,0,1,0,4.08,2.57,2.57,0,0,1-1.92.87H22.37a2.56,2.56,0,0,1-1.91-.87,3.1,3.1,0,0,1,0-4.08,2.57,2.57,0,0,1,1.9-.88ZM20.47,32.63a2.57,2.57,0,0,1,1.9-.88H41.86a2.56,2.56,0,0,1,1.91.87,3,3,0,0,1,.76,2,3.07,3.07,0,0,1-.75,2l0,0a2.58,2.58,0,0,1-1.9.88H22.37a2.56,2.56,0,0,1-1.91-.87,3.1,3.1,0,0,1,0-4.08Z" fill=""/></svg>
                  <svg id="setting" class="setting" xmlns="http://www.w3.org/2000/svg" width="13.936" height="11" viewBox="0 0 13.936 11">
                    <path id="_" data-name="" d="M1271.937,28.25h-.437V27.5h-.75v-.437l.906-.906,1.188,1.187Zm3.438-5.625a.184.184,0,0,1-.008.258l-2.734,2.734a.177.177,0,1,1-.25-.25l2.734-2.734A.184.184,0,0,1,1275.375,22.625Zm.625,4.64a.245.245,0,0,0-.156-.226.241.241,0,0,0-.273.055l-.5.5a.242.242,0,0,0-.07.172v.984a1.254,1.254,0,0,1-1.25,1.25h-6.5a1.254,1.254,0,0,1-1.25-1.25v-6.5a1.254,1.254,0,0,1,1.25-1.25h6.5a1.361,1.361,0,0,1,.351.047.235.235,0,0,0,.25-.062l.383-.383a.245.245,0,0,0,.07-.227.254.254,0,0,0-.141-.18,2.186,2.186,0,0,0-.914-.2h-6.5a2.251,2.251,0,0,0-2.25,2.25v6.5a2.251,2.251,0,0,0,2.25,2.25h6.5a2.251,2.251,0,0,0,2.25-2.25Zm-.75-5.765L1270,26.75V29h2.25l5.25-5.25Zm3.469,1.031a.759.759,0,0,0,0-1.062l-1.187-1.188a.759.759,0,0,0-1.062,0l-.719.719,2.25,2.25Z" transform="translate(-1265 -20)" fill=""/>
                  </svg>
        </footer>

        <script src="/js/pages_swap.js"></script>
        <script src="/js/posting.js"></script>
        <script src="/js/setting.js"></script>
        <script src="/js/notification.js"></script>
        <script src="/js/logout.js"></script>
        {{-- <script src="/js/protect.js"></script> --}}
    </body>
</html>