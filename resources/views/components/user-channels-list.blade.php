<div class="user-channels-list-container">
    <h3 class="user-channels-list-head">Подписанные каналы</h3>
    <ul class="user-channels-list">
        @foreach($channels as $channel)
            <li class="user-channels-list-item">{{ $channel->id }}</li>
        @endforeach
    </ul>
</div>
