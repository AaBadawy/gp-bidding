<div class="row">
    @isset($show_url)
    <a href="{{$show_url}}" class='text-primary mx-1'>show</a>
    @endisset
    @isset($edit_url)
    <a href="{{$edit_url}}" class='text-info mx-1'>edit</a>
    @endisset
    @isset($model)
    <livewire:dashboard.actions.delete :model="$model"/>
    @endisset
</div>
