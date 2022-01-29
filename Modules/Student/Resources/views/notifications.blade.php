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
                                <a href="#">{{ $notification->Owner->name }}</a>
                                <b class="small">
                                    {{ $notification->title != '-' ? ' رسالة جديدة' : 'رد جديد' }}</b>
                            </b>
                        </p>
                        <p class="title">{{ $notification->title }}</p>
                        <a href="{{ route('show-notify', [$notification->conversation_id, $notification->id]) }}">
                            {{ $notification->body }} </a>
                        <p class="small">{{ $notification->updated_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
        </div>
@endforeach
