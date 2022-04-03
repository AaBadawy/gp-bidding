
    <div>
        <div class="top-content">
            <a href="index.html" class="logo">
                <img src="{{asset_website("images/logo/logo2.png")}}" alt="logo">
            </a>
            <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
        </div>
        <div class="bottom-content">
            <div class="cart-products">
                <h4 class="title">Watching List cart</h4>
                @foreach(watching()->all(5) as $auction)
                    <livewire:website.watching.single-auction :auction="$auction"/>
                @endforeach
                <div class="btn-wrapper text-center">
                    <a href="#0" class="custom-button"><span>See All</span></a>
                </div>
            </div>
        </div>
    </div>
