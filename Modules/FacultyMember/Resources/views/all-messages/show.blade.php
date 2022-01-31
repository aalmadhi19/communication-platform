@extends('facultymember::layouts.master')
<title>محادثة</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div dir="rtl">
                                <div class="card card-bordered">
                                    <div class="card-header">
                                        @if ($conversation->owner_email == auth()->user()->email)
                                            <h4 class="card-title"><strong>محادثة مع : <a style="cursor:pointer;"
                                                        type="button" data-toggle="modal"
                                                        data-target-email="{{ $student->email }}"
                                                        data-target-conversation_id="{{ $conversation->id }}"
                                                        data-target="#infoModal">
                                                        {{ $student->name }}
                                                        <i class="fa fa-info-circle" style="font-size: 18px;"></i>
                                                    </a></strong><br>
                                                <strong>العنوان : {{ $conversation->title }} </strong>
                                            </h4>
                                        @else
                                            <h4 class="card-title"><strong>محادثة مع : <a style="cursor:pointer;"
                                                        type="button" data-toggle="modal"
                                                        data-target-email="{{ $conversation->owner_email }}"
                                                        data-target-conversation_id="{{ $conversation->id }}"
                                                        data-target="#infoModal">
                                                        {{ $conversation->owner_name }}
                                                        <i class="fa fa-info-circle" style="font-size: 18px;"></i>
                                                    </a></strong><br>
                                                <strong>العنوان : {{ $conversation->title }} </strong>
                                            </h4>
                                        @endif
                                    </div>
                                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content"
                                        style="overflow-y: scroll !important; height:600px !important;">

                                        @foreach ($messages as $message)

                                            @if ($message->from == Auth::user()->email)
                                                <div class="media media-chat">
                                                    <img class="avatar"
                                                        src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}">
                                                    <div class="media-body">
                                                        <small>{{ Auth::user()->name }}</small>
                                                        <p> {{ $message->body }} &nbsp;<br>
                                                            <small class="meta" style="color: rgb(80, 80, 80);">
                                                                <time>{{ $message->created_at->isoFormat('h:mm a') }}</time><br>
                                                                <time>{{ $message->created_at->format('Y-m-d') }}</time><br>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="media media-chat media-chat-reverse">
                                                    <img class="avatar"
                                                        src="{{ asset('storage/avatars/' . $message->Owner->avatar) }}">
                                                    <div class="media-body">
                                                        <small>{{ $message->Owner->name }}</small>
                                                        <p> {{ $message->body }} &nbsp;<br>
                                                            <small class="meta" style="color: rgb(80, 80, 80);">
                                                                <time>{{ $message->created_at->isoFormat('h:mm a') }}</time><br>
                                                                <time>{{ $message->created_at->format('Y-m-d') }}</time><br>
                                                            </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif

                                        @endforeach
                                        <div id="last"></div>

                                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                            <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                            <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                                        </div>
                                    </div>
                                    {!! Form::model('', ['route' => ['reply_message'], 'method' => 'get', 'files' => true]) !!}

                                    <div class="publisher bt-1 border-light">
                                        <img class="avatar avatar-xs"
                                            src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}">
                                        <input type="hidden" name="conversation_id"
                                            value="{{ $message->conversation_id }}">
                                        <textarea class="publisher-input" name="body" autofocus cols="120" rows="2"
                                            placeholder="اكتب .."></textarea>
                                            <span class="text-danger">{{ $errors->first('body') }}</span>
                                        <a class="publisher-btn text-info" href="#" data-abc="true">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg hvr-wobble-horizontal">إرسال</button>
                                        </a>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                        <a href="{{ route('faculty_member_home') }}"
                            class="btn-green float-right hvr-wobble-horizontal mt-20">رجوع</a>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('facultymember::modal')
@endsection

@section('extend_js')
    <script>
        $(document).ready(function() {
            $('html, body').animate({
                scrollTop: $('.publisher-btn').offset().top
            }, 'slow');
            var topPos = document.getElementById('last').offsetTop;
            document.getElementById('chat-content').scrollTop = topPos - 10;
        });
    </script>
@endsection