@extends('admin::layouts.master')
<title>المواد</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <a href="{{ route('addCourse') }}" class="btn btn-success " style="float: left; color:#fff;">إضافة مادة
                                    <i class="fa fa-plus" style="color:#fff;"></i></a>

                                <h4><i class="lni lni-book f-60 hvr-wobble-vertical"></i>المواد</h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الاسم</th>
                                            <th class="text-center">الرمز </th>
                                            <th class="text-center">الشعب</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($courses as $index =>$course)
                                            <tr>
                                                <td class="tr_01 align-middle text-center">{{ $index + 1 }}</td>
                                                <td class="tr_02 align-middle text-center">
                                                    <div class="text-lift">
                                                        {{ $course->name }}
                                                        {{-- <span><a href="{{ route('deleteCourse', $course->id) }}" onclick="return confirm('هل انت متاكد من حذف المادة ؟ ')"><i class="fa fa-close" style="color:#888; font-size:13px;"></i></a></span> --}}
                                                    </div>
                                                </td>
                                                <td class="tr_01 align-middle text-center">{{ $course->code }}</td>
                                                <td class="tr_02 align-middle text-center">
                                                    @foreach ($course->sections() as $section)
                                                        <div class="text-lift">
                                                            {{ $section->code }}
                                                            <span><a href="{{ route('deleteSection', $section->id) }}" onclick="return confirm('هل انت متاكد من حذف الشعبة')"><i class="fa fa-close" style="color:#888; font-size:13px;"></i></a></span>
                                                        </div>
                                                    @endforeach
                                                    <a href="{{ route('addSection', $course->id) }}"class="btn btn-success " style="float: left;"><i style=" font-size:13px" class="fa fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('admin_home') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
            </section>
        </div>
    </div>
@endsection
