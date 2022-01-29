@extends('admin::layouts.master')
<title>عرض عضو هيئة تدريس</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="row">
                                <div class="col-12">
                                    <div class="title_01 border-bottom">
                                        <h4><i class="lni lni-user f-60 hvr-wobble-vertical"></i> {{ $facultyMember->name }} </h4>
                                    </div>
                                </div>
                            </div>

                            <form class="mt-20" style="background-color: #f9f9f9; padding: 20px;">
                                <fieldset disabled>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">الاسم</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    placeholder="{{ $facultyMember->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">البريد الالكنروني </label>
                                                <input type="text" class="form-control form-control-lg hijri-picker"
                                                    placeholder="{{ $facultyMember->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">عدد المواد</label>
                                                <input type="text" class="form-control form-control-lg hijri-picker"
                                                    placeholder="{{ $facultyMember->sections->count() }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold">عدد الشعب </label>
                                                <input type="text" class="form-control form-control-lg hijri-picker"
                                                    placeholder="{{ $facultyMember->sections->count() }}">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                        <a href="{{ route('facultyMembers') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
