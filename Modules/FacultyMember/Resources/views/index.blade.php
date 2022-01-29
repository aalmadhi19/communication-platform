@extends('facultymember::layouts.master')
<title>تنبيهاتي</title>
@section('content')

    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">

                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-bell"></i> تنبيهاتي</h4>
                            </div>
                            <div id="post-data">
                                @include('facultymember::notifications')

                            </div>
                            @if ($notifications->isNotEmpty())
                                <div class="text-center">
                                    <a class="text-center ajax-load" id="loadMore" href="#">عرض المزيد ..</a>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 text-center" style="padding: 10px;">
                                <h3>
                                    <a href="{{ route('all_messages') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"><i class="fa fa-question"></i> </span>
                                        <div class="font_icon">جميع الإستفسارات</div>
                                    </a>
                                </h3>
                            </div>
                            <div class="col-md-6 text-center" style="padding: 10px;">
                                <h3>
                                    <a href="{{ route('my_messages') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-comments"></i> </span>
                                        <div class="font_icon">رسائلي</div>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-6 text-center" style="padding: 10px;">
                                <h3>
                                    <a href="{{ route('new_message') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-envelope"></i> </span>
                                        <div class="font_icon">رسالة جديدة</div>
                                    </a>
                                </h3>
                            </div>
                            <div class="col-md-6 text-center" style="padding: 10px;">
                                <h3>
                                    <a href="{{ route('broadcast') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-bullhorn"></i> </span>
                                        <div class="font_icon">رسالة جماعية</div>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('facultymember::modal')
@endsection
