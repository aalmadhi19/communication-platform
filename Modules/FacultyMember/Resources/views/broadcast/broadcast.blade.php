@extends('facultymember::layouts.master')
<title>رسالة جماعية</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-bullhorn"></i> رسالة جماعية</h4>
                            </div>
                            {!! Form::model('', ['route' => ['store_broadcast'], 'method' => 'post', 'files' => true]) !!}
                            @csrf
                            <br />
                            <input type="hidden" name="type" value="broadcast">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>المادة</div>
                                    <select required id="course" name="course" class="form-control form-control-lg"
                                        style="border: 1px solid #dddddd; font-size: 14px;">
                                        <option value="">يرجى الاختيار</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}">
                                                {{ $course->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div>الشعبة</div>
                                    <select required id="section"name="section_id" class="form-control form-control-lg"
                                    style="border: 1px solid #dddddd; font-size: 14px;">
                                    <option value="">يرجى الاختيار</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('section_id') }}</span>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>العنوان</div>
                                    <input type="text" class="form-control form-control-lg" name="title" id="title" value="{{ old('title') }}">
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>الرسالة</div>
                                    <textarea name="body" class="form-control form-control-lg" id="body" cols="100" rows="10">{{ old('body') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('body') }}</span>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                            {!! Form::close() !!}
                        </div>
                        <a href="{{ route('faculty_member_home') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
