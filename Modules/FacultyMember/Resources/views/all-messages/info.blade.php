@extends('facultymember::layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">الاسم</th>
                                            <th class="text-center">الرقم الجامعي</th>
                                            <th class="text-center">المادة</th>
                                            <th class="text-center">الشعبة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="tr_01 align-middle text-center">{{ $student->name }}</td>
                                            <td class="tr_02 align-middle text-center">{{ $student->student_id }}</td>
                                            <td class="tr_01 align-middle text-center">{{ $section->Course->name }}</td>
                                            <td class="tr_02 align-middle text-center">{{ $section->code }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('all_messages') }}"class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
