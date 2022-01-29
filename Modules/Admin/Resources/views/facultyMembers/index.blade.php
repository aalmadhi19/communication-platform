@extends('admin::layouts.master')
<title>اعضاء هيئة التدريس</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="lni lni-user f-60 hvr-wobble-vertical"></i>اعضاء هيئة التدريس </h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الاسم</th>
                                            <th class="text-center">عدد الشعب</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($facultyMembers as $index => $facultyMember)
                                            <tr>
                                                <td class="tr_01 align-middle text-center">{{ $index +1 }}</td>
                                                <td class="tr_02 align-middle text-center">{{ $facultyMember->name }}</td>
                                                <td class="tr_01 align-middle text-center">{{ $facultyMember->sections->count() }}</td>
                                                <td class="tr_02 align-middle text-center"><a
                                                        href="{{ route('facultyMember_profile', $facultyMember->id) }}">
                                                        <button type="button" class="btn btn-info">عرض</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a href="{{ route('admin_home') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @endsection
