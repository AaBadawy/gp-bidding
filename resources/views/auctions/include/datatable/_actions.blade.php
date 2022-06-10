<div class="row">
    <a href="{{$show_url}}" class='text-primary mx-1'>show</a>
    <a href="{{$edit_url}}" class='text-info mx-1'>edit</a>
    @isset($model)
    <livewire:dashboard.actions.delete :model="$model"/>
    @endisset
</div>
