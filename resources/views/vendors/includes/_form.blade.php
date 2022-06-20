<form method="POST" action="{{$action === 'create' ? route('dashboard.vendors.store') : route('dashboard.vendors.update', ['vendor' => $vendor->id])}}">
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

    {{-- <x-name-field :action="$action" name="{{$action === 'edit' ? $vendor->owner->user->name : (old('owner[name]') ?: request()->input('owner.name'))}}" :filedName="'owner[name]'"/> --}}
        <div  class="form-group">
            <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
            <label for="exampleInputEmail1">Name <x-required-star/></label>
            <input type="text" class="form-control" name="owner[name]" id="ec" placeholder="Enter name" value="{{$action === 'edit'? $vendor->user->name : old('name')}}">
            @error($filedName ?? 'name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        
    <div class="form-group">
        <label for="exampleInputEmail1">Email address <span class="text-danger"> * </span></label>
        <input type="email" class="form-control" name="owner[email]" placeholder="Enter email" value="{{$action === 'edit'? $vendor->owner->user->email : (old('owner[email]') ?: request()->input('owner.email'))}}">
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
    @if($action == 'create' && request()->filled("request_id"))
        <input type="hidden" name="request_id" value="{{request()->input('request_id')}}">
    @endif
    <div class="form-group">
        <label for="exampleInputPassword1">Password Confirmation<span class="text-danger"> * </span></label>
        <input type="password" class="form-control" name="owner[password_confirmation]" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
