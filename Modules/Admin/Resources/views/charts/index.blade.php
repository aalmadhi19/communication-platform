@extends('admin::layouts.master')
<title>الاحصائيات</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa  fa-pie-chart f-60 hvr-wobble-vertical"></i> الاحصائيات</h4>
                            </div>
                            <div class="row">

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_success">
                                            <span
                                                style="font-size: 20px">{{ \Modules\Student\Entities\Student::count() }}</span>
                                            <div class="font_icon"> الطلاب</div>
                                        </a>
                                    </h3>
                                </div>

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_secondary">
                                            <span
                                                style="font-size: 20px">{{ \Modules\FacultyMember\Entities\FacultyMember::count() }}</span>
                                            <div class="font_icon"> اعضاء هيئة التدريس</div>
                                        </a>
                                    </h3>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_secondary">
                                            <span
                                                style="font-size: 20px">{{ \Modules\Course\Entities\Course::count() }}</span>
                                            <div class="font_icon"> المواد</div>
                                        </a>
                                    </h3>
                                </div>

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_warning">
                                            <span
                                                style="font-size: 20px">{{ \Modules\Course\Entities\Section::count() }}</span>
                                            <div class="font_icon"> الشعب</div>
                                        </a>
                                    </h3>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_success">
                                            <span style="font-size: 20px">{{ \App\Models\Message::count() }}</span>
                                            <div class="font_icon"> الرسائل</div>
                                        </a>
                                    </h3>
                                </div>

                                <div class="col-md-4 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_warning">
                                            <span
                                                style="font-size: 20px">{{ \App\Models\Message::IsRead()->count() }}</span>
                                            <div class="font_icon"> الرسائل المقروءة </div>
                                        </a>
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_secondary">
                                            <span
                                                style="font-size: 20px">{{ \App\Models\Message::IsNotRead()->count() }}</span>
                                            <div class="font_icon"> الرسائل غير المقروءة </div>
                                        </a>
                                    </h3>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_secondary">
                                            <span
                                            style="font-size: 20px">%{{ number_format(\App\Models\Message::IsRead()->count() / \App\Models\Message::count()*100, 0) }}</span>
                                            <div class="font_icon">  نسبة الرسائل المقروءة  </div>
                                            </a>
                                    </h3>
                                </div>

                                <div class="col-md-6 text-center" style="padding: 10px;">
                                    <h3>
                                        <a href="#" target="_self" class="btn_bg_warning">
                                            <span
                                                style="font-size: 20px">%{{ number_format(\App\Models\Message::IsNotRead()->count() / \App\Models\Message::count()*100, 0) }}</span>

                                            <div class="font_icon">  نسبة الرسائل غير المقروءة  </div>
                                        </a>
                                    </h3>
                                </div>

                            </div>
                        </div>
                        <a href="{{ route('admin_home') }}"
                            class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('extend_js')

@endsection
