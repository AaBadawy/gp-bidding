<li>
    <input type="checkbox" id="check{{$notification->id}}" {{$notification->read_at ?? 'checked'}} wire:click="routeTo">
    <label for="check{{$notification->id}}" wire:click="routeTo">
        <h6 class="title">{{$notification->data['title']}}</h6>
        <p>{{$notification->data['content']}}</p>
    </label>
</li>
