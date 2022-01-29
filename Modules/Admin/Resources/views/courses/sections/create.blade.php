@extends('course::layouts.master')
<title>إضافة شعبة جديدة</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-users"></i> إضافة شعبة جديدة </h4>
                            </div>
                            {!! Form::model('', ['route' => ['storeSection'], 'method' => 'post', 'files' => true]) !!}
                            @csrf
                            <br />
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                            <input type="hidden" name="course_code" value="{{ $course->code }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>رمز الشعبة</div>
                                    <input type="text" name="code" id="code" class="form-control form-control-lg">
                                    <span class="text-danger"><strong>{{ $errors->first('code') }}</strong></span>
                                </div>
                            </div>
                            <br/>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>عضو هيئة التدريس</div>
                                    <select name="faculty_member_id" class="form-control form-control-lg">
                                        <option value="">اختر</option>
                                        @foreach ($facultyMembers as $facultyMember)
                                            <option value="{{ $facultyMember->id }}">{{ $facultyMember->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="text-danger"><strong>{{ $errors->first('faculty_member_id') }}</strong></span>
                                </div>
                            </div>
                            <div class="button-row d-flex float-right mt-4">
                                <button type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <a href="{{ route('courses') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
