@extends('facultymember::layouts.master')
<title>رسائلي</title>
@section('content')
    <div class="container">
        <div class="row">
            <section class="content_mu pt-40 pl-20 pr-20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="body_content_mu" style="min-height: 480px;">
                            <div class="title_01 border-bottom">
                                <a href="{{ route('new_message') }}" class="btn btn-success " style="float: left; color:#fff; padding: 7px;">  &nbsp; رسالة جديدة&nbsp;
                                    <i class="fa fa-envelope" style="color:#fff;"></i></a>

                                    <a href="{{ route('broadcast') }}" class="btn btn-success " style="float: left; color:#fff; padding: 7px;     margin-left: 10px;">  &nbsp; رسالة جماعية&nbsp;
                                        <i class="fa fa-bullhorn" style="color:#fff;"></i></a>
                                <h4><i class="fa fa-comments"></i> رسائلي</h4>
                            </div>
                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead class="thead-light_yellow">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">الى</th>
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">التاريخ</th>
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
                                                    @foreach ($conversation->users as $user)
                                                        @if ($user->User->email != auth()->user()->email)
                                                            <a type="button" data-toggle="modal"
                                                                data-target-email="{{ $user->User->email }}"
                                                                data-target-conversation_id="{{ $conversation->id }}"
                                                                data-target="#infoModal">
                                                                - {{ $user->User->name }}
                                                                <i class="fa fa-info-circle" style="font-size: 18px;"></i>
                                                            </a>
                                                            <br>
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="tr_01 align-middle text-center">{{ $conversation->title }}
                                                </td>
                                                <td class="tr_02 align-middle text-center">
                                                    {{ $conversation->created_at->format('Y-m-d')}} <br>
                                                    {{ $conversation->created_at->isoFormat('h:mm a')}}
                                                </td>
                                                <td class="tr_01 align-middle text-center"><a
                                                        href="{{ route('show_conversation', $conversation->id) }}">
                                                        <button type="button" class="btn btn-block ">عرض</button></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $conversations->links() }}
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
