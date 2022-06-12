<div class="form-group">
    <label for="exampleSelect1">Select The Vendor<span class="text-danger">*</span></label>
    <select class="form-control" id="exampleSelect1" name="vendor_id" wire:model="vendor_id">
        @foreach($vendors as $vendor)
            <option value="{{$vendor->id}}">{{$vendor->name}}</option>
        @endforeach
    </select>
</div>
