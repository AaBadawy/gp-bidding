
<div class="card-body">
    <div class="card-header">
        <h3>Category Details</h3>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Name <span class="text-danger"> * </span></label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter name" value="{{$action === 'edit' ? $category->name : old('name')}}">
        @error('name')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image <x-required-star /></label>
        <input type="file" name="image" />
        @error('image')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</div>
