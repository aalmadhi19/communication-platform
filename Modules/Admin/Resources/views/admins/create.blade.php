@extends('course::layouts.master')
<title>إضافة مدير</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu">
                            <div class="title_01 border-bottom">
                                <h4><i class="fa fa-users"></i> إضافة مدير </h4>
                            </div>
                            {!! Form::model('', ['route' => ['storeAdmin'], 'method' => 'post', 'files' => true]) !!}
                            @csrf
                            <br />
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div>تكليف عضو هيئة التدريس</div>
                                    <select required name="id" class="form-control form-control-lg">
                                        <option value="">اختر</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    <span
                                        class="text-danger"><strong>{{ $errors->first('id') }}</strong></span>
                                </div>
                            </div>
                            <div class="button-row d-flex float-right mt-4">
                                <button type="submit" class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <a href="{{ route('admin_home') }}" class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
