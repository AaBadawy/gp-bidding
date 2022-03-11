<div class="form-group">
    <label for="">Products</label>
    <select name="product_ids[]" id="" class="form-control products-select2" multiple>
        @foreach($products as $index => $product)
            <option value="{{$product->id}}">{{$product->name}}</option>
        @endforeach
    </select>
    @error('product_ids')
        <p class="text-danger font-weight-bold">{{$message}}</p>
    @enderror
</div>
