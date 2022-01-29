@extends('student::layouts.master')
<title>جميع المحادثات</title>

@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-comments"></i> جميع المحادثات</h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">من</th>
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">الاجراء</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($conversations as $index => $conversation)
                                            <tr>
                                                <td class="tr_01 align-middle text-center">
                                                    {{ $index + 1 }}
                                                </td>
                                                <td class="tr_02 align-middle text-center">
                                                    {{ $conversation->owner_name }}
                                                </td>
                                                <td class="tr_01 align-middle text-center">{{ $conversation->title }}
                                                </td>
                                                <td class="tr_02 align-middle text-center"><a
                                                        href="{{ route('show-message', $conversation->id) }}">
                                                        <button type="button" class="btn btn-info ">عرض</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $conversations->links() }}

                        </div>
                        <a href="{{ route('student_home') }}"
                            class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
