<div class="dash-pro-item mb-30 dashboard-widget">
    <nav class="header" wire:click="toggleEdit">
        <h4 class="title">{{$title}}</h4>
        <span class="edit"><i @class(["flaticon-edit" => ! $startEditing,"flaticon-lock" => $startEditing])></i> {{$startEditing ? "cancel" : "Edit"}}</span>
    </nav>
    <ul class="dash-pro-body">
        <li>
            <div  @class(['info-name' ,'mt-1' => $startEditing])>{{$title}}</div>
            @if($startEditing)
                <div class="info-value">
                    <input type="text" class="form-control col-12" wire:model="input" value="{{$value}}">
                </div>
                @error('name')
                    <div class="col-12  ml-5 my-1">
                        <p class="text-danger font-weight-bold">{{$message}}</p>
                    </div>
                @enderror
                <div class="">
                        <input class="btn btn-primary form-control col-lg-12 mt-2 mr-4"  type="button" value="save" wire:click="save"/>
                </div>
            @else
                <div class="info-value">{{$value}}</div>
            @endif
        </li>
    </ul>
</div>
