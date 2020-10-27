@if( ! Request::segment(2) === 'login' && getSettings('status') == 0)

<script>
   window.location = "/maintenance";
</script>

@endif
<!doctype html>
<html lang="ar-sa" dir="rtl">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <meta name="author" content="Reda Mohamed Abdallah (Web Developer) ">
   <meta name="author" content="Mustafa Fathi Ibrahim (Front End Developer)">
   <meta name="viewport" content="width=device-width, initial-scale=1.0 , maximum-scale=3.0, user-scalable=no">
   <link rel="shortcut icon" href="{{Request::root()}}/public/upload/logo/favicon.png" />
   <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
   <title> @yield('title',getSettings('siteName'))</title>
   {!! HTML::style('public/website/css/bootstrap.css') !!}
   {!! HTML::style('public/website/css/style.css') !!}
   {!! HTML::style('public/website/css/face.css') !!}
   {!! HTML::style('public/website/css/owl.carousel.css') !!}
   <!-- BEGIN PAGE LEVEL Toastr -->
   {!! HTML::style('public/admin/global/plugins/bootstrap-toastr/toastr-rtl.min.css') !!}
   <!-- END PAGE LEVEL Toastr -->
   {!! HTML::script('public/website/js/jquery.js') !!}
   {!! HTML::script('public/website/js/bootstrap.js') !!}
   <!--       <link href="https://www.fontify.me/wf/0d2b0758024a3eb6e9e1a456e481ae51" rel="stylesheet" type="text/css">
 -->
   <meta name="description" content="@yield('description',getSettings('metaDesc'))" />
   <meta name="keywords" content="@yield('keywords',getSettings('KeyWords'))" />
   <meta name="twitter:card" content="summary_large_image">
   <meta property="og:title" content="@yield('og_title',getSettings())" />
   <meta property="og:description" content="@yield('og_description',getSettings('metaDesc'))" />
   <meta property="og:site_name" content="{{getSettings()}}" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <script>
      function myFunction() {

         //   $('nav').addClass('navv');

         // alert('asxasx');

      }
   </script>
   @yield('header')
</head>

<body>
   <div id="login"></div>

   <!--
   <div id="header-wrap">
      <div class="container">
         <div id="headerWarp" class="clear">
            @if(Session::has('error'))
            {{Session::get('error')}}
            @endif
            <ul style="list-style-type: none;display: flex;">
               <li style="flex-grow: 1;"><a href="{{url('/')}}">الرئيسية</a></li>

               @foreach(\App\Cat::where('parent_id' , null)->get() as $cat)
               <li class="mainCat2" style="flex-grow: 1;">
                  <a href="{{url("tags/$cat->id")}}" data-id="{{$cat->id}}" id="{{$cat->id}}"
                     value="{{$cat->id}}">{{$cat->name}}</a>
               </li>
               @endforeach
               <li style="flex-grow: 1;"><a href="{{url('pages/advsearch')}}"> <i class="fa fa-search"></i> البحث</a>
               </li> 
            </ul>
-->
   <!--<a href="{{url('tags/1')}}"><i class="fa fa-car"></i>حراج السيارات</a>-->
   <!--<a href="{{url('tags/3')}}"><i class="fa fa-mobile"></i>أجهزة</a>-->
   <!--<a href="{{url('tags/2')}}" class="aqarRedirectCity">عقارات</a>-->
   <!--<a href="{{url('tags/555')}}">مواشي حيوانات وطيور</a>-->
   <!--<a href="{{url('tags/548')}}">أثاث</a>-->
   <!--<a href="{{url('tags/557')}}"> خدمات </a>-->
   <!--<a href="{{url('pages/sitemap')}}"><i class="fa fa-sitemap"></i> أقسام أكثر ...</a>-->
   <!--{{--<a href="{{url('tags/4')}}">المشاريع والمقـاولات</a>-->
   <!--<a href="{{url('tags/546')}}">الموضة</a>-->
   <!--<a href="{{url('tags/549')}}"> مستلزمات الأطفال </a>-->
   <!--<a href="{{url('tags/551')}}">مستلزمات طبية</a>-->
   <!--<a href="{{url('tags/556')}}"> معدات صناعية </a>-->
   <!--<a href="{{url('tags/637')}}"> أسواق أخري </a>-->
   <!--<a href="{{url('commission')}}"> عمولة الموقع </a> --}}-->

   <!--
         </div>
      </div>
   </div>
-->


   <!-- start navbar-->
   <nav class="@auth jkllk @endauth">
      @if(!request()->is('/'))
      <a href="{{ url()->previous()}}" class="back-btn"><i class="fa fa-arrow-left"></i></a>
      @endif
      <div class="container" style="background-color: #1E3A9D;">
         <div class="row">
            <div class="col-md-4 col-sm-3 col-xs-6">
               <a class="logo-top" href="{{url('/')}}"><img src="{{Request::root()}}/public/upload/logo/logo.png">
                  <!--<span class="website-title">{{getSettings('siteName')}}</span>-->
               </a>
            </div>
            <div class="col-md-8 col-sm-9 col-xs-6  fixed-nav">
               <ul class="@auth classs @endauth">


                  @if (Auth::guest())
                  <li class="site-login">
                     @if(!empty(\Auth::user()->image))
                     <img src="{{!empty(\Auth::user()->image)?asset('public').'/'.\Auth::user()->image:''}}"
                        class="img-responsive img-thumbnail img-circle"
                        style="width:40px;height: 40px; margin-bottom: 30px;">
                     @endif
                     <a class="divider" href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                        <span> <i class="fa fa-user-plus"></i>
                           {{Auth::user() ? Auth::user()->name : ' جديد   /' }}</span>
                     </a>
                     <a href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}" style="color: #fff;">
                        <span> <i class="fa fa-sign-in"></i>
                           {{Auth::user() ? Auth::user()->name : ' دخول' }}</span>
                     </a>
                  </li>


                  @else
                  <li><a href="{{url('inbox')}}" class="hideSmall ">
                        @if(isset(Auth::user()->id))
                        @php $userMsgs =
                        \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get() @endphp
                        @if(count($userMsgs))
                        <span class="badge badge-danger">{{count($userMsgs)}}</span>
                        @endif
                        @endif
                        <i class="fa fa-envelope "></i>
                        الرسائل
                     </a>
                  </li>
                  <li>
                     <a href="{{url('notifications')}}" class="hideSmall notificationsa">
                        @if(isset(Auth::user()->unreadNotifications))
                        @if(count(Auth::user()->unreadNotifications))
                        <span
                           class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
                        @endif
                        @endif
                        <i class="fa fa-bell"></i>
                        الإشعارات
                     </a>
                  </li>
                  <li><a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> المفضلة</a></li>
                  <li><a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> المتابعة </a></li>
                  <a href="{{url('inbox')}}" class="hideSmall ">
                     @if(isset(Auth::user()->id))
                     @php $userMsgs = \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get()
                     @endphp
                     @if(count($userMsgs))
                     <span class="badge badge-danger">{{count($userMsgs)}}</span>
                     @endif



                     @endif
                     <i class="fa fa-envelope"></i>
                     الرسائل
                  </a>
                  <a href="{{url('notifications')}}" class="hideSmall notificationsa">
                     @if(isset(Auth::user()->unreadNotifications))
                     @if(count(Auth::user()->unreadNotifications))
                     <span
                        class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
                     @endif
                     @endif
                     <i class="fa fa-bell"></i>
                     الإشعارات
                  </a>
                  <a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> المفضلة</a>
                  <a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> المتابعة</a>
                  <li class="user-name-profile">
                     <a href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                        <i class="fa fa-user"></i>{{Auth::user() ? Auth::user()->name : 'تسجيل الدخول' }}</a>
                     <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                           @auth
                           @if(Auth::user()->type == 0)
                           <li class="dropdown-link-hover"><a href="{{ url('admincp') }}"> <i class="fa fa-cog"></i>
                                 الاعدادات</a></li>
                           @else
                           <li class="dropdown-link-hover"><a
                                 href="{{Auth::user() ? url('users/'.Auth::user()->id) : route('login')}}">
                                 <i class="fa fa-cog"></i>الصفحة الشخصية</a>
                           </li>
                           @endif
                           @endauth
                           <li class="dropdown-link-hover">
                              <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <i class="fa fa-sign-out"></i> خروج
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    {{ csrf_field() }}
                                 </form>
                              </a>
                           </li>
                           @endif
                           <li class="site-langs">
                              <div class="site-lang">
                                 <div class="lang-inline-box">
                                    @if (Auth::guest())
                                    @else
                                    <span class="it"> اللغه: </span>
                                    @endif
                                    <button class="lang-inline-btn active">عربي</button>
                                    <button class="lang-inline-btn">Eng</button>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </nav>
   <!-- end navbar-->



   @if (Auth::guest())
   @else
   <div class="mobile-nav-menu">
      <a href="{{url('inbox')}}" class="hideSmall ">
         @if(isset(Auth::user()->id))
         @php $userMsgs = \App\Message::where('user_to',Auth::user()->id)->where('status',1)->get() @endphp
         @if(count($userMsgs))
         <span class="badge badge-danger">{{count($userMsgs)}}</span>
         @endif
         @endif
         <i class="fa fa-envelope "></i>
      </a>
      <a href="{{url('notifications')}}" class="hideSmall notificationsa">
         @if(isset(Auth::user()->unreadNotifications))
         @if(count(Auth::user()->unreadNotifications))
         <span class="badge badge-danger notificationsNum">{{count(Auth::user()->unreadNotifications)}}</span>
         @endif
         @endif
         <i class="fa fa-bell"></i>
      </a>
      <a href="{{url('fav')}}" class="hideSmall"> <i class="fa fa-heart"></i> </a>
      <a href="{{url('follow')}}" class="hideSmall"><i class="fa fa-rss"></i> </a>
      <a href="{{url('/')}}" class="hideSmall "><i class="fa fa-th-large"></i></a>
   </div>
   @endif
   <div class="clearfix"></div>
   @yield('content')
   <div class="clearfix"></div>
   <!-- Footer -->
   <footer class="footer">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="download-buttons">
                  <a href="#" class="download-btn apple">
                     <img src="{{Request::root()}}/public/upload/app-store-badge.png">
                  </a>
                  <a href="#" class="download-btn google">
                     <img src="{{Request::root()}}/public/upload/google-play-badge.png">
                  </a>
               </div>
            </div>
            <div class="col-md-4">
               <ul class="footer-list">
                  @if(Auth::guest())
                  <li class="flist">
                     <a class="divider" href="{{route('register')}}">
                        <i class="fa fa-user-plus"></i>تسجيل </a></li>
                  @endif
                  <li class="flist"><a href="{{url('commission')}}"> <i class="fa fa-cc-mastercard "></i> حساب وسداد
                        العمولة</a></li>
                  <li class="flist"><a href="{{url('checkacc')}}"> <i class="star fa fa-star "> </i> القائمة
                        السوداء</a>
                  </li>
                  @if(!Auth::guest())
                  <li class="flist"><a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                           class="fa fa-sign-out"></i> تسجيل الخروج</a></li>
                  @endif
                  <li class="flist"><a href="{{url('show/contact')}}"> <i class="star fa fa-star "> </i> اتصل
                        بنا</a>
                  </li>
                  <li class="flist"><a href="{{url('page/notallowed')}}"> <i class="star fa fa-star "> </i> قائمة
                        السلع والإعلانات الممنوعة</a>
                  </li>
                  <li class="flist"><a href="#"> <i class="star fa fa-star "> </i> تطبيق حراج</a></li>
               </ul>
            </div>
            <div class="col-md-4">
               <ul class="footer-list">


                  <li class="flist"><a href="{{url('checkacc')}}"> <i class="star fa fa-star "> </i> القائمة
                        السوداء</a>
                  </li>

                  <li class="flist"><a href="{{url('page/discount')}}"> <i class="star fa fa-star "> </i> نظام
                        الخصم</a>
                  </li>
                  <!--<li class="flist"><a href="#"> <i class="star fa fa-star "> </i> نظام التقييم</a></li>-->

                  <li class="flist"><a href="{{url('commission')}}"> <i class="fa fa-home"></i> عمولة الموقع</a>
                  </li>

               </ul>
            </div>
            <div class="col-md-4">
               <ul class="footer-list">

                  @foreach(\App\Page::where('active',1)->get() as $page)

                  <li class="flist"><a href="{{url('pages/'.$page->pLink)}}"> <i class="star fa fa-star "> </i>
                        {{$page->pName}} </a>
                  </li>

                  @endforeach

                  <!--<li class="flist"><a href="{{url('pages/member')}}"> <i class="star fa fa-star "> </i> عضوية-->
                  <!--   مكاتب العقارات </a>-->
                  <!--</li>-->
                  <!--<li class="flist"><a href="#"> <i class="star fa fa-star "> </i> الإعلانات المميزة</a></li>-->

                  <!--<li class="flist"><a href="{{url('page/rules')}}"> <i class="fa fa-home"></i> معاهدة إستخدام-->
                  <!--   الموقع</a>-->
                  <!--</li>-->
                  <!--<li class="flist"><a href="{{url('page/terms')}}"> <i class="fa fa-home"></i> شروط استخدام-->
                  <!--   الموقع </a>-->
                  <!--</li>-->

                  <!--                     <li class="flist"><a href="{{url('page/n')}}"> <i class="star fa fa-star "> </i> رسوم الخدمات-->
                  <!--   المكررة</a>-->
                  <!--</li>-->
                  <!--<li class="flist"><a href="{{url('pages/member')}}"> <i class="star fa fa-star "> </i> العضوية-->
                  <!--   الذهبيه </a>-->
                  <!--</li>-->

               </ul>
            </div>
         </div>
      </div>
   </footer>
   @php
   if (isset(auth()->user()->id)){
   $user = auth()->user()->id;
   }
   @endphp
   <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title" style="text-align: center">الصورة الشخصية</h4>
            </div>
            <div class="modal-body" style="text-align: center">
               <form method="post" action="{{route('update-image')}}" id="Form" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="{{(isset($user))?$user:''}}">
                  <input type="file" name="image" class=" pull-left" onclick="$(e.preventDefault())">
               </form>
            </div>
            <div class="modal-footer ">
               <button type="button" class="btn btn-success pull-left" data-dismiss="modal"
                  onclick="$('#Form').submit()">تعديل</button>
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- BEGIN PAGE LEVEL Toastr -->
   {!! HTML::script('public/admin/global/plugins/bootstrap-toastr/toastr.min.js') !!}
   <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
   <script type="text/javascript">
      {
         {
            getSettings('analytics')
         }
      }

      // chrome.tabs.onCreated.addListener(function() {alert('hello new tab')});

      Pusher.logToConsole = false;

      var pusher = new Pusher('34b9ea6826c359c41c3f', {

         cluster: 'eu',

         encrypted: true

      });

      var channel = pusher.subscribe('desktopNotification');

      channel.bind('newCmntOnYourPost{{Auth::guest() ?0: Auth::user()->id}}', function (data) {

         if ($('.hideSmall').find('span').hasClass('notificationsNum')) {

            $('.notificationsNum').text(parseInt($('.notificationsNum').text()) + 1);

         } else {

            $('.notificationsa').prepend('<span class="badge badge-danger notificationsNum">1</span>');

         }

      });



      if (+localStorage.tabCount > 0) {

      } else {

         localStorage.tabCount = 0;

         channel.bind('newCmntOnYourPost{{Auth::guest() ?0: Auth::user()->id}}', function (data) {

            // request permission on page load

            document.addEventListener('DOMContentLoaded', function () {

               if (Notification.permission !== "granted")

                  Notification.requestPermission();

            });



            if (!Notification) {

               alert('Desktop notifications not available in your browser. Try Chromium.');

               return;

            }



            if (Notification.permission !== "granted")

               Notification.requestPermission();

            else {

               var notification = new Notification('يوجد رد جديد على إعلان خاص بك', {

                  icon: '{{Request::root()}}/public/upload/logo/favicon.png',

                  body: "قام " + data.username + " بالرد عى إعلانك " + data.title + " !",

                  dir: "rtl",

                  lang: "ar-sa",

               });



               notification.onclick = function () {

                  window.open(data.url);

               };

               setTimeout(notification.close.bind(notification), 15000);

            }

         });

      }

      localStorage.tabCount = +localStorage.tabCount + 1;

      window.onunload = function () {

         localStorage.tabCount = +localStorage.tabCount - 1;

      };
   </script>
   <script>
      $(document).ready(function () {

         $("#myBtn").click(function (event) {

            event.preventDefault();

            $("#myModal").modal();

         });

      });

      $("#myBtn").one('click', function () {

         $("#user").clone().appendTo(".modal-body");

      });
   </script>
   <!-- END PAGE LEVEL Toastr -->
   @include('admin/layouts/fMsg')
   @yield('footer')
</body>

</html>
