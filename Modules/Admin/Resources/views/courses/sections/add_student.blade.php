@extends('course::layouts.master')
<title>اضافة طالب</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-user-plus"></i> اضافة طالب</h4>
                            </div>
                            {!! Form::model('', ['route' => ['storeStudent'], 'method' => 'post', 'files' => true]) !!}
                            @csrf
                            <br />
                            <input type="hidden" name="course_id" value="{{ $section->course_id }}">
                            <input type="hidden" name="section_id" value="{{ $section->id }}">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>قائمة الطلاب</div>
                                    <select name="student_id" class="form-control form-control-lg">
                                        <option value="">اختر طالب</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->student_id }}">{{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger"><strong>{{ $errors->first('student_id') }}</strong></span>
                                </div>
                            </div>
                            <div class="button-row d-flex float-right mt-4">
                                <button type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <a href="{{ route('sections') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
