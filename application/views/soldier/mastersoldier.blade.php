<!DOCTYPE html>
<html lang="fa_IR">


<head>
    <!-- Header meta tags -->
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{$root}}public/css/style.css" />


    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="{{$root}}public/img/Organization-Icon.gif">

    <!-- Header scripts -->
    <script type="text/javascript" src="{{$root}}public/js/modernizr-custom.js"></script>
    @yield('css')
</head>

<body class="container-fluid">

<!-- Main content -->
<section class="main_content row">


    <!-- Header and top nav -->
    <header id="top-navbar">

        <!-- Header top help panel -->
        <div id="top_panel" class="t#333">
            <div class="help-text b#fff clearfix">
                <div class="col-sm-3 shortcut-help">
                    <h4>کلیدهای میانبر</h4>
                    <p>M - منو</p>
                    <p>R - پنل سمت چپ</p>
                    <p>T - پنل بالا</p>
                    <p>N - حالت شب</p>
                    <p>B - حالت جعبه ای</p>
                    <p>V - منوی عمودی</p>
                    <p>H - منوی افقی</p>
                    <p><strong class="t#0d2fa5">LOCK</strong> - برای <i class="fa fa-lock t#333"></i> یا <i class="fa fa-unlock t#333"></i></p>
                </div>

                <div class="col-sm-9 b#89c4f4 b%5">
                    <h4>سامانه جامع مدیریت پادگان</h4><br><br>
                    طراح : پرهام عظیمی <br><br> برنامه نویسی : پرهام عظیمی
                </div>
            </div>
        </div>
        <!-- /End Header top help panel -->


        <!-- Header buttons and navbar -->
        <nav id="first-navbar">

            <!-- mobile and tablet -->
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav_1">
                    <span class="fa fa-bars fa-2x"></span>
                </button>

                <!-- Sidebar toggle button -->
                <i id="sidebar_toggle" class="fa fa-outdent pull-left" data-toggle="tooltip" title="تغییر وضعیت منو" data-placement="left"></i>
                <!-- Side panel toggle -->
                <i class="side_panel_toggle_1 fa fa-sliders pull-right visible-xs"></i>
            </div>

            <div class="collapse navbar-collapse" id="nav_1">

                <!-- Dropdown menu buttons -->
                <ul class="nav navbar-nav">

                    <!-- Mega menu -->
                    <li id="mega_menu_btn">
                        <a>
                            مگامنو <span class="caret"></span>
                        </a>
                        <div id="mega_menu" class="t#333 b#ffb b%9">

                            <ul class="col-sm-4 icon">
                                <li><h4>پنل مدیریت پادگان</h4></li>
                                <li><a href="#" class="b%0=5"><i class="fa fa-user"></i> ویرایش پروفایل</a></li>
                                <li><a href="{{base_url('soldier/absent')}}.html" class="b%0=5"><i class="fa fa-user-times"></i>مرخصی بلند مدت همکاران</a></li>
                                <li><a href="{{base_url('soldier/vacations')}}.html" class="b%0=5"><i class="fa fa-calendar-times-o"></i>مرخصی های من</a></li>
                                <li><a href="{{base_url('soldier/overtime')}}.html" class="b%0=5"><i class="fa fa-hourglass-half"></i>اضافه خدمت</a></li>
                            </ul>
                            <ul class="col-sm-4 icon">
                                <li><h4>پنل مدیریت پادگان</h4></li>

                                <li><a href="{{base_url('soldier/mission')}}.html" class="b%0=5"><i class="fa fa-plane"></i> ماموریت</a></li>
                                <li><a href="{{base_url('soldier/delay')}}.html" class="b%0=5"><i class="fa fa-clock-o"></i>تاخیر های من</a></li>
                                <li><a href="{{$root}}" class="b%0=5"><i class="fa fa-power-off"></i>خروج امن</a></li>
                            </ul>


                            <ul class="col-sm-4 custom">
                                <li><h4>{{$title}}</h4></li>
                                <li><img src="{{$root}}public/img/sazman.jpg" alt="بارگذاری نشد"></li>
                                <li>
                                    سامانه جامع مدیریت کارکنان پادگان
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- /End Mega menu -->

                </ul>

                <!-- navbar right buttons -->
                <ul class="nav navbar-right">
                    <!-- Side panel toggle -->
                    <li class="side_panel_toggle_2 hidden-xs" data-placement="bottom" data-toggle="tooltip" title="پنل کناری"><i class="fa fa-sliders"></i></li>
                    <!-- Top hidden panel -->
                    <li id="top_panel_slide" data-placement="bottom" data-toggle="tooltip" title="پنل راهنمایی"><i class="fa fa-question-circle-o"></i></li>

                    <!-- Full screen -->
                    <li id="full_screen" data-placement="bottom" data-toggle="tooltip" title="تمام صفحه"><i class="fa fa-arrows-alt"></i></li>
                    <!-- Save options -->
                    <li id="save_options" data-placement="bottom" data-toggle="tooltip" title="ذخیره تنظیمات"><i class="fa fa-save"></i></li>
                </ul>
            </div>
        </nav>
        <!-- End header buttons and navbar -->
    </header>
    <!-- /End header and top nav -->



    <!-- side panel -->
    <section id="side_panel" class="b#fff">
        <div class="board">
            <div class="board-inner">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#options" data-toggle="tab">
                            <span class="fa fa-lg fa-cogs round-tabs" data-toggle="tooltip" title="تنظیمات"></span>
                        </a>
                    </li>
                    <li id="taskbtn">
                        <a href="#tasks" data-toggle="tab">
                            <span class="fa fa-lg fa-tasks round-tabs" data-toggle="tooltip" title="کارها"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#chats" data-toggle="tab">
                            <span class="fa fa-lg fa-comments round-tabs" data-placement="top" data-toggle="tooltip" title="گفت و گوها"></span>
                            <span class="label blink label-success chat-alert">12</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="tab-content">

                <!-- options tab -->
                <div class="tab-pane fade in active" id="options">
                    <ul class="list-group">

                        <h4 class="Montserrat-font">تنظیمات پوسته</h4>

                        <!-- font size -->
                        <li class="list-group-item fs-btn">
                            <p>اندازه فونت</p>
                            <i class="fa fa-plus fontsize" id="larger"></i>
                            <i class="fa fa-minus fontsize" id="smaller"></i>
                        </li>


                        <!-- top bar color -->
                        <li class="list-group-item top-color-changer">
                            <p>رنگ نوار بالا</p>
                            <button class="b#555 t#ddd"></button>
                            <button class="b#fff t#777"></button>
                            <button class="b#fde3a7 t#555"></button>
                            <button class="b#232D65 t#eee"></button>
                            <button class="b#399bff t#fff"></button>
                            <button class="b#098 t#fff"></button>
                        </li>


                        <!-- menu color -->
                        <li class="list-group-item menu-color-changer">
                            <p>رنگ منو</p>
                            <button class="b#555 t#ddd"></button>
                            <button class="b#fff t#777"></button>
                            <button class="b#fde3a7 t#555"></button>
                            <button class="b#232D65 t#eee"></button>
                        </li>


                        <!-- background image -->
                        <li class="list-group-item">
                            <p>تصویر پس زمینه:</p>
                            <button id="patt_btn" class="btn round btn-block" data-toggle="modal" data-target="#PatternsModal">
                                نمایش الگوها
                            </button>
                        </li>


                        <!-- menu position -->
                        <li class="list-group-item">
                            موقعیت منو
                            <select id="m_orient" class="option-select pull-right">
                                <option value="vertical" selected>عمودی</option>
                                <option value="horizontal">افقی</option>
                            </select>
                        </li>


                        <!-- fixed top bar -->
                        <li class="list-group-item">
                            ثابت بودن نوار بالا
                            <div class="material-switch pull-right">
                                <input id="topfix" type="checkbox" checked />
                                <label for="topfix" class="label-primary"></label>
                            </div>
                        </li>


                        <!-- sticky side bar -->
                        <li class="list-group-item">
                            ستون کناری چسبان
                            <div class="material-switch pull-right">
                                <input id="sidefix" type="checkbox" checked />
                                <label for="sidefix" class="label-warning"></label>
                            </div>
                        </li>


                        <!-- night mode -->
                        <li class="list-group-item">
                            حالت شب
                            <div class="material-switch pull-right">
                                <input id="nightmode" type="checkbox"/>
                                <label for="nightmode" class="label-default"></label>
                            </div>
                        </li>


                        <!-- boxed layout -->
                        <li class="list-group-item">
                            طرح جعبه ای
                            <div class="material-switch pull-right">
                                <input id="box_option" type="checkbox"/>
                                <label for="box_option" class="label-success"></label>
                            </div>
                        </li>


                        <!-- Corners radius -->
                        <li class="list-group-item">
                            شعاع پنل ها:
                            <span id="corners_txt">4px</span>
                            <div id="corners_slider" class="m-t-10"></div>
                        </li>


                        <!-- Sidebar width -->
                        <li class="list-group-item">
                            عرض ستون کناری:
                            <span id="side_width_txt">230px</span>
                            <div id="side_width_slider" class="m-t-10"></div>
                        </li>

                    </ul>
                </div>
                <!-- /End options tab -->

                <!-- tasks tab -->
                <div class="tab-pane fade" id="tasks">
                    <ul class="list-group">
                        <li class="list-group-item t#c3272b">
                            <h4>شما 10 پروژه دارید</h4>
                        </li>
                        <li class="list-group-item">
                            <a href="#">پنل مدیریت 27%</a>
                            <div class="progress progress-striped pr-good">
                                <div class="progress-bar" style="width: 27%"></div>
                                <!-- for usage of pr-bad and pr-good please open custom-functions.js -->
                            </div>
                            <a href="#">به روزرسانی ها 60%</a>
                            <div class="progress progress-striped pr-good">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                            <a href="#">استفاده سی پی یو 90%</a>
                            <div class="progress progress-striped pr-bad">
                                <div class="progress-bar" style="width: 90%"></div>
                            </div>
                            <a href="#">برنامه اندروید 85%</a>
                            <div class="progress progress-striped pr-good">
                                <div class="progress-bar" style="width: 85%"></div>
                            </div>
                            <a href="#">افزایش حمله ها 10%</a>
                            <div class="progress progress-striped pr-bad">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                            <a href="#">و بیشتر...</a>
                        </li>
                    </ul>
                    <ul class="list-group">
                        <li class="list-group-item t#c3272b">
                            <h4>شما 6 کار دارید</h4>
                        </li>
                        <li class="list-group-item">
                            <p class="label b#7a3">به روزرسانی افزونه</p>
                            <div class="side-task">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            </div>
                        </li>
                        <li class="list-group-item">
                            <p class="label b#239 t#f8e">مهمانی تولد</p>
                            <div class="side-task">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            </div>
                        </li>
                        <li class="list-group-item">
                            <p class="label b#192 t#bef">تیم توسعه دهنده</p>
                            <div class="side-task">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- /End tasks tab -->

                <!-- chat tab -->
                <div class="tab-pane fade" id="chats">
                    <!-- chat tower -->
                    <div class="chat-tower b#fff">

                        <!-- chat header -->
                        <div class="tower-head b#fff t#7b7b7b">
                            <div class="pull-left">
                                <span id="chat_header">انتخاب کنید</span>
                            </div>
                            <!-- chat buttons -->
                            <div class="pull-right btn-group">
                                <!-- options for chat list -->
                                <div id="chats_btn" class="btn-group">
                                    <button data-toggle="dropdown"><i class="fa fa-cog"></i></button>
                                    <ul role="menu" class="dropdown-menu pull-right">
                                        <li><a href="#">من را آفلاین نشان بده</a></li>
                                        <li><a href="#">پاک کردن لیست</a></li>
                                        <li><a href="#">برون بری لیست</a></li>
                                    </ul>
                                </div>
                                <!-- options for message list -->
                                <div id="messages_btn" class="btn-group">
                                    <button data-toggle="dropdown"><i class="fa fa-cogs"></i></button>
                                    <ul role="menu" class="dropdown-menu pull-right">
                                        <li><a href="#">مسدود کردن کاربر</a></li>
                                        <li><a href="#">پاک کردن پیام ها</a></li>
                                        <li><a href="#">ایمیل کردن گفت و گو</a></li>
                                    </ul>
                                </div>
                                <!-- log out from live chat -->
                                <button id="log_outer"><i class="t#444 fa fa-power-off"></i></button>
                            </div>
                            <!-- /end chat buttons -->
                            <div class="back-to">
                                <i class="fa fa-2x fa-hand-o-left"></i>
                            </div>
                        </div>
                        <!-- /End chat header -->

                        <!-- chat body -->
                        <div class="tower-body js-control b#6c7a89">


                            <!-- users list fade -->
                            <div id="chat_users">

                                <!-- user loop -->
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{$root}}public/img/other/avatar2.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="media-body">
                                        <p>لورم ایپسوم</p>
                                        <small>3:30 بعد از ظهر</small>
                                        <p>ایالات متحده آمریکا</p>
                                    </div>
                                </div>
                                <!-- /End user loop -->
                                <!-- user loop -->
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{$root}}public/img/other/avatar1.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="media-body">
                                        <p>لورم ایپسوم 2</p>
                                        <small>1:30 بعد از ظهر</small>
                                        <p>ایالات متحده آمریکا</p>
                                    </div>
                                </div>
                                <!-- /End user loop -->
                                <!-- user loop -->
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{$root}}public/img/other/avatar3.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="media-body">
                                        <p>لورم ایپسوم 3</p>
                                        <small>9:30 صبح</small>
                                        <p>کارگردان هنری</p>
                                    </div>
                                </div>
                                <!-- /End user loop -->
                                <!-- user loop -->
                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{$root}}public/img/other/avatar4.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="media-body">
                                        <p>لورم ایپسوم 4</p>
                                        <small>8:00 صبح</small>
                                        <p>تیم سئو</p>
                                    </div>
                                </div>
                                <!-- /End user loop -->
                            </div>
                            <!-- /End chat_users -->


                            <!-- messages of user fade -->
                            <div id="user_message">
                                <div class="chat-line">
                                    <abbr>امروز</abbr>
                                </div>
                                <!-- Message loop -->
                                <div class="direct-chat-msg">
                                    <img src="{{$root}}public/img/other/avatar5.jpg" alt="بارگذاری نشد" data-lity>
                                    <div class="chat-info clearfix"><span>لورم</span></div>

                                    <div class="direct-chat-text">
                                        من هنگام ورود به حساب کاربری خود خطایی دریافت کردم. معنی این خطاها چیست؟
                                    </div>

                                    <div class="chat-info clearfix">
                                        <small class="pull-right">3:36 بعد از ظهر</small>
                                    </div>
                                </div>
                                <!-- /End message loop -->
                                <!-- Message loop -->
                                <div class="direct-chat-msg">
                                    <img src="{{$root}}public/img/users/{{$img}}" alt="بارگذاری نشد" data-lity>
                                    <div class="chat-info clearfix"><span>مدیر</span></div>

                                    <div class="direct-chat-text">
                                        سلام، می توانم متن خطا را ببینم؟
                                    </div>

                                    <div class="chat-info clearfix">
                                        <small class="pull-right">3:37 بعد از ظهر</small>
                                    </div>
                                </div>
                                <!-- /End message loop -->
                                <!-- Message loop -->
                                <div class="direct-chat-msg">
                                    <img src="{{$root}}public/img/other/avatar5.jpg" alt="بارگذاری نشد" data-lity>
                                    <div class="chat-info clearfix"><span>لورم</span></div>

                                    <div class="direct-chat-text">
                                        <img src="{{$root}}public/img/other/warning.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="chat-info clearfix">
                                        <small class="pull-right">3:40 بعد از ظهر</small>
                                    </div>
                                </div>
                                <!-- /End message loop -->
                                <!-- Message loop -->
                                <div class="direct-chat-msg">
                                    <img src="{{$root}}public/img/other/avatar5.jpg" alt="بارگذاری نشد" data-lity>
                                    <div class="chat-info clearfix"><span>لورم</span></div>

                                    <div class="direct-chat-text">
                                        ببخشید، تصویر را اشتباه فرستادم. تصویر درست:
                                    </div>
                                    <div class="chat-info clearfix">
                                        <small class="pull-right">3:40 بعد از ظهر</small>
                                    </div>
                                </div>
                                <!-- /End message loop -->
                                <!-- Message loop -->
                                <div class="direct-chat-msg">
                                    <img src="{{$root}}public/img/other/avatar5.jpg" alt="بارگذاری نشد" data-lity>
                                    <div class="chat-info clearfix"><span>لورم</span></div>

                                    <div class="direct-chat-text">
                                        <img src="{{$root}}public/img/other/error.jpg" alt="بارگذاری نشد" data-lity>
                                    </div>
                                    <div class="chat-info clearfix">
                                        <small class="pull-right">3:45 بعد از ظهر</small>
                                    </div>
                                </div>
                                <!-- /End message loop -->
                            </div>
                            <!-- /End user_message -->

                        </div>
                        <!-- /End chat body -->

                        <!-- chat fotter -->
                        <div class="tower-foot b#fff">
                            <textarea id="status_message" placeholder="پیام خود را بنویسید..." name="message"></textarea>
                            <div class="btn-footer">
									<span class="bg_none">
										<i class="fa fa-film"></i>
										<input name="uploadvideo" role="button" tabindex="0" type="file" accept=".mp4,.avi,.mkv,.mov" />
									</span>
                                <span class="bg_none">
										<i class="fa fa-camera"></i>
										<input name="uploadimage" role="button" tabindex="0" type="file" accept=".jpg,.png,.gif" />
									</span>
                                <span class="bg_none">
										<i class="fa fa-paperclip"></i>
										<input name="uploadfile" role="button" tabindex="0" type="file" accept=".xls,.xlsx,.doc,.docx,.pdf,.xps,.psd" />
									</span>

                                <!-- send message -after load each message pleas run "chat_scroller();" js function- -->
                                <button id="send_btn" class="bg_none pull-right"><i class="fa fa-send"></i></button>
                            </div>
                        </div>
                        <!-- /End chat fotter -->

                    </div>
                    <!-- /End chat -->
                </div>
                <!-- /End chats tab -->

                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <!-- /End side panel -->




    <!-- sidebar -->
    <aside id="sidebar"><!-- This id(=sidebar) is important -->
        <div id="menu_ver" class="StickySidebar">

            <!-- admin details -->
            <div class="well-sm administrator">
                <div class="clearfix">
                    <div class="admin-pic col-xs-5">
                        <img class="img-rounded" src="{{$root}}public/img/users/{{$img}}" alt="بارگذاری نشد" data-lity>
                    </div>
                    <div class="admin-name col-xs-7"> {{$name.' '.$family}} </div>
                </div>
                <div class="clearfix">
                    <div class="col-xs-12 text-center">
                        <p>کد پرسنلی : <strong>{{$id}}</strong></p>
                    </div>
                </div>
                <span id="admin_close" class="fa fa-times fa-2x"></span>
            </div>
            <!-- /End admin details -->


            <!-- accordion menu -->
            <div id="cssmenu">
                <ul>
                    <!-- Dashboard -->
                    <li>
                        <a href="index.html">
                            <i class="fa fa-user-secret t#ff561c"></i> ویرایش پروفایل
                        </a>
                    </li>

                    <li>
                        <a href="{{base_url('soldier/absent')}}.html" class="b%0=5" style="transition: all 0.3s ease 0s; background-color: rgba(255, 255, 255, 0);">
                            <i class="fa fa-user-times " style="color: rgba(31,255,243,0.75)"></i>مرخصی همکاران
                        </a>
                    </li>

                    <li>
                        <a href="{{base_url('soldier/vacations')}}.html" class="b%0=5" style="transition: all 0.3s ease 0s; background-color: rgba(255, 255, 255, 0);">
                            <i class="fa fa-calendar-times-o t#ff561c"></i>مرخصی ها
                        </a>
                    </li>
                    <li>
                        <a href="{{base_url('soldier/mission')}}.html" class="b%0=5" style="transition: all 0.3s ease 0s; background-color: rgba(255, 255, 255, 0);">
                            <i class="fa fa-plane " style="color: rgba(255,155,45,0.75)"></i> ماموریت
                        </a>
                    </li>

                    <li><a href="{{base_url('soldier/overtime')}}.html" class="b%0=5"><i style="color: rgba(255,74,178,0.75)" class="fa fa-hourglass-half"></i> اضافه خدمت</a></li>
                    <li>
                        <a href="{{base_url('soldier/delay')}}.html" class="b%0=5" style="transition: all 0.3s ease 0s; background-color: rgba(255, 255, 255, 0);">
                            <i class="fa fa-clock-o " style="color: rgba(255,122,0,0.75)"></i> تاخیر
                        </a>
                    </li>


                    <li>
                        <a href="{{$root}}" class="b#333 b%0=05 waves-effect">
                            <i class="fa fa-power-off fa-2x t#ff561c"></i>خروج
                        </a>
                    </li>

                </ul>

                <ul id="user_btn" class="pull-right">
                    <li><i class="fa fa-user fa-2x"></i></li>
                </ul>
            </div>
            <!-- /End accordion menu -->

        </div>
    </aside>
    <!-- /End sidebar -->




    <!-- content -->
    <section class="clearfix b#f1f0f0">
        <div class="col-lg-12 col-xs-12" id="content">
            @yield('content')
        </div>
    </section>
    <!-- /End content -->




    <!-- Footer and copyright -->
    <footer class="page-footer b#444=000 t#bbb=fff">
        طراحی شده با <i class="fa fa-heart t#F22613"></i> توسط پرهام عظیمی
        <a href="javascript:;" id="ToTop" class="fa fa-arrow-up pull-right"></a>
    </footer>
    <!-- /End Footer -->


</section>
<!-- /End main content -->


<!-- best Modal place -->
<div class="modal fade" id="PatternsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">الگوها</h4>
            </div>
            <div class="modal-body">
                <ol id="pattern_thumb"><!-- Ajax loading --></ol>
            </div>
            <div class="modal-footer">
                <input id="PattInput" type="hidden" />
                <div class="btn-group pull-left">
                    <button id="BodyBtn" class="btn btn-info">تنظیم روی بدنه</button>
                    <button id="ContentBtn" class="btn btn-info">تنظیم روی محتوا</button>
                </div>
                <button id="RemoveBtn" class="btn btn-primary pull-right">حذف الگوها</button>
            </div>
        </div>
    </div>
</div>
<!-- /End Modals -->



<!-- loaders and alerts -->
<div class="page-loading">
    <svg class="circular" height="50" width="50">
        <circle class="path" cx="25" cy="25.2" r="19.9" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
    </svg>
</div>

<div id="wait" class="alert" style="display:none">
    <i class="fa fa-spinner fa-spin"></i>بارگذاری ...
</div>

<div id="ChangesSaved" class="alert" style="display:none">
    <i class="fa fa-check"></i>ذخیره شد
</div>

<div id="lockscreen" style="display:none"><i class="fa fa-lock"></i>برند
    <p>اگر این برگه را رفرش کنید به برگه ورود منتقل خواهید شد.</p>
</div>



<!-- downloaded scripts (for all pages) -->
<!-- colorclass, jquery, uery-ui, bootstrap, lity, malihu, mousetrap, toastr, Waves -->
<script type="text/javascript" src="{{$root}}public/js/pack.js"></script>

<!-- custom script (for all pages) -->
<script type="text/javascript" src="{{$root}}public/js/custom-scripts.js"></script>
<script type="text/javascript" src="{{$root}}public/js/custom-functions.js"></script>

<!-- script files (for this page) -->


<!-- inline custom script (for this page) -->
<script type="text/javascript">
    $(document).ready(function() {

    });
</script>
@yield('js')
</body>

</html>