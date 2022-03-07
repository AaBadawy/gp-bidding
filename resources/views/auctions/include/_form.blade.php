<form action="{{$action === 'create'? route('auctions.store'): route('auctions.update', ['auction' => $auction->id])}}" method="POST">
    @if($action === 'edit')
        @method('PUT')
    @endif
    @csrf
    <x-name-field :action="$action" name="{{$action === 'edit' ? $product->name : old('name')}}"/>
    <div class="form-group">
        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
            <label for="start_at">Start At <x-required-star /></label>
            <input type="text" name="start_at" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
            <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @error('start_at')
        <p class="text-danger font-weight-bold">
            {{$message}}
        </p>
        @enderror
    </div>

        <div class="form-group">
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <label for="start_at">End At <x-required-star /></label>
                <input type="text" name="end_at" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            @error('end_at')
            <p class="text-danger font-weight-bold">
                {{$message}}
            </p>
            @enderror
        </div>
    <div class="form-group">
        <label for="">Bidding Start Price <x-required-star /></label>
        <input type="number" class="form-control" name="start_price" value="{{$action === 'edit' ? $auction->start_price : old('start_price')}}">
        @error('start_price')
        <p class="text-danger font-weight-bold">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Bidding Price <x-required-star /></label>
        <input type="text" name="bidding_price" class="form-control" value="{{$action === 'edit' ? $auction->bidding_price: old('bidding_price')}}">
        @error('bidding_price')
        <p class="text-danger font-weight-bold">
            {{$message}}
        </p>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea class="form-control" name="description"></textarea>
    </div>
    <livewire:vendors-selector
        :key="'vendors-selector'"
    />
    <livewire:products-selector
        :key="'products-selector'"
    />
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
