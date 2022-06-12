<div class="form-group">
    <label for="exampleSelect2">Select Products <span class="text-danger">*</span></label>
    <select multiple="" class="form-control" id="exampleSelect2" name="product_ids[]">
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
    </select>
    @error("product_ids")
        <p class="text-danger font-weight-bold my-3">{{$message}}</p>
    @enderror
</div>
