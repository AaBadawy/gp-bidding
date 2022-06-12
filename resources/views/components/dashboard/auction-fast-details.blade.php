<tr>
    <td class="pl-0 py-4">
        <div class="symbol symbol-50 symbol-light">
                                                                <span class="symbol-label">
                                                                    <img src="{{$auction->products()->first()->getFirstMediaUrl('main_image')}}" class="h-50 align-self-center" alt="" />
                                                                </span>
        </div>
    </td>
    <td class="pl-0">
        <a href="{{route("dashboard.auctions.show",['auction' => $auction->id])}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$auction->name}}</a>
        <div>
            <span class="font-weight-bolder">End at</span>
            <a class="text-muted font-weight-bold text-hover-primary" href="#">{{$auction->end_at->format("y-m-d H:m")}}</a>
        </div>
    </td>
    <td class="text-right">
        <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$auction->preview_price}}</span>
        {{--                                                        <span class="text-muted font-weight-bold"></span>--}}
    </td>
    <td class="text-right">
        <span class="text-muted font-weight-500">{{$auction->products()->count()}} Products</span>
    </td>
    <td class="text-right">
        <span class="text-muted font-weight-500">{{$auction->bidders?->unique()->count()}} Biders</span>
    </td>
</tr>
