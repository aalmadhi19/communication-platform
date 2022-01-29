@extends('admin::layouts.master')
<title>إدارة النظام</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">

                            <div class="title_01 border-bottom">
                                <h4><i class="lni lni-cog f-60 hvr-wobble-vertical"></i> إدارة النظام </h4>
                            </div>
                            <div class="row">
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('facultyMembers') }}" target="_self" class="btn_bg_success">
                                            <i class="lni lni-users f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">اعضاء هيئة التدريس</div>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('students') }}" target="_self" class="btn_bg_secondary">
                                            <i class="lni lni-users f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">الطلاب</div>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('admins') }}" target="_self" class="btn_bg_warning">
                                            <i class="lni lni-cog f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">مدراء النظام</div>
                                        </a>
                                    </h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('courses') }}" target="_self" class="btn_bg_success">
                                            <i class="lni lni-book f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">المواد التدريسيه</div>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('sections') }}" target="_self" class="btn_bg_secondary">
                                            <i class="lni lni-users f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">الشعب</div>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('logs') }}" target="_self" class="btn_bg_warning">
                                            <i class="lni lni-eye f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">مراقبة اخطاء النظام</div>
                                        </a>
                                    </h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 text-center" style="padding: 12px;">
                                    <h3>
                                        <a href="{{ route('charts') }}" target="_self" class="btn_bg_success">
                                            <i class="fa  fa-pie-chart
                                            f-60 hvr-wobble-vertical"></i>
                                            <div class="font_icon">احصائيات</div>
                                        </a>
                                    </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
