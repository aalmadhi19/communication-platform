@extends('admin::layouts.master')
<title>الشعب</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="lni lni-book f-60 hvr-wobble-vertical"></i>الشعب</h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">رمز المادة</th>
                                            <th class="text-center">رمز الشعبه</th>
                                            <th class="text-center">عضو هيئة التدريس</th>
                                            <th class="text-center" style="width:400px;">الطلاب</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $index => $section)
                                            <tr>
                                                <td class="tr_02 align-middle text-center">{{ $index +1 }}</td>
                                                <td class="tr_02 align-middle text-center">{{ $section->course_code }}
                                                </td>
                                                <td class="tr_02 align-middle text-center">{{ $section->code }}
                                                </td>
                                                <td class="tr_02 align-middle text-center">
                                                    {{ $section->FacultyMember->name }}
                                                </td>
                                                <td class="tr_02 align-middle text-lift">
                                                    <span class="float-right"><a href="{{ route('addStudent', $section->id) }}"><i class="fa fa-user-plus"></i></a></span>
                                                    @foreach ($section->ClassRoom as $index => $ClassRoom)
                                                        <div class="text-lift">
                                                            {{ $index + 1 }}-{{ $ClassRoom->student->name }} <span><a href="{{ route('deleteStudent', $ClassRoom->id) }}" onclick="return confirm('هل انت متاكد ؟')"><i class="fa fa-close" style="color: #888; font-size:13px;"></i></a></span> <br>
                                                        </div>
                                                    @endforeach
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
