@if($this->vendors->count())
<div class="form-group">
    <label for="">Vendor <x-required-star /></label>
    <select  id="vendorId" wire:model="vendor" class="js-example-basic-single" name="vendor_id">
        @foreach($this->vendors as $vendor)
            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
        @endforeach
    </select>
</div>
@endif
