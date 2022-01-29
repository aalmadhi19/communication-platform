@extends('course::layouts.master')
<title> إضافة مادة جديدة</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-book"></i> إضافة مادة جديدة </h4>
                            </div>
                            {!! Form::model('', ['route' => ['storeCourse'], 'method' => 'post', 'files' => true]) !!}
                            @csrf
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>الاسم</div>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg">
                                    <span class="text-danger"><strong>{{ $errors->first('name') }}</strong></span>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>الرمز</div>
                                    <input type="text" name="code" id="code" class="form-control form-control-lg">
                                    <span class="text-danger"><strong>{{ $errors->first('code') }}</strong></span>
                                </div>
                            </div>
                            <div class="button-row d-flex float-right mt-4">
                                <button type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <a href="{{ route('courses') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
            </section>
        </div>
    </div>
@endsection
