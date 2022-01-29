@extends('student::layouts.master')
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
                                @include('student::notifications')
                            </div>
                            @if ($notifications->isNotEmpty())
                                <div class="text-center">
                                    <a class="text-center ajax-load" id="loadMore" href="#">عرض المزيد ..</a>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-center" style="padding: 20px;">
                                <h3>
                                    <a href="{{ route('my-messages') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-envelope"></i> </span>
                                        <div class="font_icon">إستفساراتي</div>
                                    </a>
                                </h3>
                            </div>

                            <div class="col-md-4 text-center" style="padding: 20px;">
                                <h3>
                                    <a href="{{ route('new-message') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-question"></i> </span>
                                        <div class="font_icon">إستفسار جديد</div>
                                    </a>
                                </h3>
                            </div>

                            <div class="col-md-4 text-center" style="padding: 20px;">
                                <h3>
                                    <a href="{{ route('all-messages') }}" target="_self" class="btn_sm_success">
                                        <span style="font-size: 20px"> <i class="fa fa-comments"></i> </span>
                                        <div class="font_icon">جميع المحادثات</div>
                                    </a>
                                </h3>
                            </div>

                        </div>
                    </div>
            </section>
        </div>
    </div>
@endsection
