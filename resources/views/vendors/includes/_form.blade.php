<form method="POST" action="{{$action === 'create' ? route('vendors.store') : route('vendors.update', ['vendor' => $vendor->id])}}">
    @csrf
    @if($action === 'edit')
        @method('PUT')
    @endif
    <div class="card-header">
        <h3>Vendor Details</h3>
    </div>

    <x-name-field :action="$action" name="{{$action === 'edit' ? $vendor->name : old('name')}}"/>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address <span class="text-danger"> * </span></label>
        <input type="email" class="form-control" name="email" placeholder="Enter email" value="{{$action === 'edit'? $vendor->email : old('email')}}">
        @error('email')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Website </label>
        <input type="text" class="form-control" name="website" value="{{$action === 'edit'? $vendor->website : old('website')}}">
        @error('website')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Description </label>
        <textarea class="form-control" name="description" >{{$action === 'edit'? $vendor->description : old('description')}}</textarea>
        @error('description')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="card-header">
        <h3>Owner Details</h3>
    </div>

    <x-name-field :action="$action" name="{{$action === 'edit' ? $vendor->owner->user->name : old('owner[name]')}}" :filedName="'owner[name]'"/>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address <span class="text-danger"> * </span></label>
        <input type="email" class="form-control" name="owner[email]" placeholder="Enter email" value="{{$action === 'edit'? $vendor->owner->user->email : old('owner[email]')}}">
        @error('owner.email')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password <span class="text-danger"> * </span></label>
        <input type="password" class="form-control" name="owner[password]" placeholder="Password">
        @error('owner.password')
            <small class="form-text text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password Confirmation<span class="text-danger"> * </span></label>
        <input type="password" class="form-control" name="owner[password_confirmation]" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
