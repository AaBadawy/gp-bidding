
<div class="card-body">
    <div class="card-header">
        <h3>Location Details</h3>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name <span class="text-danger"> * </span></label>
        <input type="name" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name" value="{{$action === 'edit' ? $location->name : old('name')}}">
        @error('name')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label >Type <span class="text-danger"> * </span></label>
        <select name="type" id="type-select2">
            <option value="country" {{$action === 'edit' && $location->type === 'country' ? 'selected':  (old('type') == 'country' ? 'selected' : '')}}>Country</option>
            <option value="city" {{$action === 'edit' && $location->type === 'city' ? 'selected':  (old('type') == 'city' ? 'selected' : '')}}>City</option>
            <option value="region" {{$action === 'edit' && $location->type === 'region' ? 'selected': (old('type') == 'region' ? 'selected' : '')}}>region</option>
        </select>
        @error('type')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Parent Location</label>
        <select name="parent_id" id="locations-select2">
            <option label="label"></option>
            @foreach(\App\Entities\Location::all() as $selected_location)
                <option value="{{$selected_location->id}}" {{$action === 'edit' && $location->parent_id === $selected_location->id ? 'selected': (old('parent_id') == $selected_location->id ? 'selected' : '')}}>{{$selected_location->name}}</option>
            @endforeach
        </select>
        @error('parent_id')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
