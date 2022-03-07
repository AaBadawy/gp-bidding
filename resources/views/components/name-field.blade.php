<div  class="form-group">
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
    <label for="exampleInputEmail1">Name <x-required-star/></label>
    <input type="name" class="form-control" name="{{$filedName ?? 'name'}}" id="exampleInputEmail1" placeholder="Enter name" value="{{$action === 'edit'? $name : old('name')}}">
    @error($filedName ?? 'name')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>
