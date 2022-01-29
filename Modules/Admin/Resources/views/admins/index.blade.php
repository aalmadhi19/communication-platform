@extends('admin::layouts.master')
<title>مدراء النطام</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <a href="{{ route('addAdmin') }}" class="btn btn-success " style="float: left; color:#fff;">إضافة مدير
                                    <i class="fa fa-plus" style="color:#fff;"></i></a>
                                <h4><i class="lni lni-user f-60 hvr-wobble-vertical"></i>مدراء النطام </h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الاسم</th>
                                            <th class="text-center">البريد الإلكتروني</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $index => $admin)
                                            <tr>
                                                <td class="tr_01 align-middle text-center">{{ $index +1 }}</td>
                                                <td class="tr_02 align-middle text-center">{{ $admin->name }}</td>
                                                <td class="tr_01 align-middle text-center">{{ $admin->email }}</td>
                                                <td class="tr_02 align-middle text-center"><a
                                                        href="{{ route('deleteAdmin', $admin->id) }}">
                                                        <button type="button" class="btn btn-danger_02">الغاء الصلاحية</button></a>
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
