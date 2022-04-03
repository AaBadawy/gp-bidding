<div class="buy-now-area">
    <a href="#0" @class(["rating custom-button","active" => $watching,"border"]) wire:click="toggle"><i class="fas fa-star"></i> {{$watching ? "watching" : "add to watching"}}</a>
</div>
