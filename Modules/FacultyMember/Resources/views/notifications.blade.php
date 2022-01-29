@foreach ($notifications as $notification)
        <div class="notification-ui_dd-content">
            <div class="notification-list notification-list--unread">
                <div class="notification-list_content">
                    <div class="notification-list_img">
                        <img src="{{ asset('storage/avatars/' . $notification->Owner->avatar) }}">
                    </div>&nbsp;&nbsp;
                    <div class="notification-list_detail">
                        <p>
                            <b>
                                <button id="infoModalOpen" type="button" class="btn btn-success btn-sm"
                                    data-toggle="modal" data-target-email="{{ $notification->Owner->email }}"
                                    data-target-conversation_id="{{ $notification->conversation_id }}"
                                    data-target="#infoModal">{{ $notification->Owner->name }}</button>
                                <b class="small">
                                    {{ $notification->title != '-' ? ' إستفسار جديد' : 'رد جديد' }}</b>
                            </b>
                        </p>
                        <p class="title">{{ $notification->title }}</p>
                        <a href="{{ route('show_notify', [$notification->conversation_id, $notification->id]) }}">{{ $notification->body }}
                        </a>
                        <p class="small">{{ $notification->updated_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
@endforeach
