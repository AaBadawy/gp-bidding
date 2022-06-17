@if(! isset($auction))
    @php
    $auction = null
    @endphp
@endif
<div class="card-body">
    <div class="form-group mb-8">
        <div class="alert alert-custom alert-default" role="alert">
            <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
            <div class="alert-text">
                Important, You will not be able to close the auction before the end date
            </div>
        </div>
    </div>
    <div class="form-group form-row">
        <div class="form-group col-lg-6">
            <label>Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control"  placeholder="Enter The Auction Title" name="name" value="{{old_or("name",$auction)}}"/>
            <span class="form-text text-muted">Be Creative!.</span>

            @error("name")
            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group col-lg-6">
            <label for="exampleInputPassword1">Bidding Type<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="exampleInputPassword1" value="step" readonly/>
            <span class="form-text text-info mx-3 my-2">Only Supported This type current now</span>
        </div>
    </div>
    <div class="form-group form-row">
        <div class="form-group col-lg-6">
            <label for="exampleInputPassword1">Start Price <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="starting price ..." name="start_price" value="{{old_or("start_price",$auction)}}"/>
            <span class="form-text text-muted">Keep it relevant with the auction items</span>

            @error("start_price")
            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
            @enderror
        </div>

        <div class="form-group col-lg-6">
            <label for="exampleInputPassword1">Bidding Price <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="Biding ber one bid" name="bidding_price" value="{{old_or("bidding_price",$auction)}}"/>
            <span class="form-text text-muted">Keep it relevant with the auction items</span>

            @error("bidding_price")
            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
            @enderror
        </div>

    </div>
    <div class="form-group row">
        <div class="col-lg-6 col-md-9 col-sm-12">
            <label class="col-form-label col-lg-6 col-sm-12">Auction Starting Date-time</label>
            <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                <input type="text" class="form-control " name="start_at" value="{{old_or("start_at",$auction)}}"/>
                <div class="input-group-append" data-target="#kt_datetimepicker_1" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                     <i class="ki ki-calendar"></i>
                                    </span>
                </div>
            </div>


            @error("start_at")
            <p class="text-danger font-weight-bold my-3">{{$message}}</p>
            @enderror
        </div>
        <div class="col-lg-6 col-md-9 col-sm-12">
            <label class="col-form-label col-lg-6 col-sm-12">Auction Ending Date-time</label>
            <div class="input-group date" id="kt_datetimepicker_2" data-target-input="nearest">
                <input type="text" class="form-control " name="end_at" value="{{old_or("end_at",$auction)}}"/>
                <div class="input-group-append" data-target="#kt_datetimepicker_2" data-toggle="datetimepicker">
                                    <span class="input-group-text">
                                     <i class="ki ki-calendar"></i>
                                    </span>
                </div>
            </div>

            @error("end_at")
{{--            <p class="text-danger font-weight-bold my-3">{{$message}}</p>--}}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="exampleSelect1">Select Category<span class="text-danger">*</span></label>
        <select class="form-control" id="exampleSelect1" name="category_id">
            @foreach(\App\Entities\Category::limit(10)->get() as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @error("category_id")
        <p class="text-danger font-weight-bold my-3">{{$category}}</p>
    @enderror

    <div class="form-group row">
    </div>
    @if(auth()->user()->isAdmin())
        <livewire:dashboard.auction.select-vendor />
        @error("vendor_id")
        <p class="text-danger font-weight-bold my-3">{{$message}}</p>
        @enderror
    @endif
    <livewire:dashboard.auction.select-product />

    <div class="form-group mb-1">
        <label for="exampleTextarea">Explain a brief about the auction items <span class="text-danger">*</span></label>
        <textarea class="form-control" id="exampleTextarea" rows="3" name="description">{{old_or("description",$auction)}}</textarea>
    </div>
    @error("description")
    <p class="text-danger font-weight-bold my-3">{{$message}}</p>
    @enderror
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary mr-2">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</div>
