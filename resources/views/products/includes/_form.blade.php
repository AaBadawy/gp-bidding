@if(! isset($product))
    @php
    $product = null;
    @endphp
@endif
<div class="card-body">
<x-name-field :action="$action" name="{{$action === 'edit' ? $product->name : ''}}"/>
@if(auth()->user()->isAdmin())
    <div class="form-group">
        <label for="">Vendor <x-required-star /></label>
        <select name="vendor_id" id="" class="form-control">
            @foreach(\App\Entities\Vendor::all() as $index => $vendor)
                <option value="{{$vendor->id}}">{{$vendor->name}}</option>
            @endforeach
        </select>
    </div>
@endif
@error('vendor_id')
    <p class="text-danger font-weight-bold">{{$message}}</p>
@enderror
<div class="form-group">
    <label for="exampleInputPassword1">price <x-required-star/></label>
    <input type="number" class="form-control" name="price" placeholder="Price" value="{{old_or('price',$product)}}">
    @error('price')
        <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label>Description</label>
    <textarea class="form-control" name="description">{{old_or('description',$product)}}</textarea>
    @error('description')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="main_image">Image <x-required-star /></label>
    <input type="file" name="main_image" />
    @error('main_image')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
