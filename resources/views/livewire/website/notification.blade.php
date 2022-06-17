<li>
    <input type="checkbox" id="check1" {{$notification->read_at ?? 'checked'}} wire:click="routeTo">
    <label for="check1">
        <h6 class="title">{{$notification->data['title']}}</h6>
        <p>{{$notification->data['content']}}</p>
    </label>
</li>
