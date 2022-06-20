
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Your Review</h5>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Number Of Stars</label>
                    <div class="ratings">
                        @for($i = 1; $i <= 5;$i++)
                            <livewire:website.review-star :key="$i.'-star'" :number="$i" :mouseHovered="$review?->stars >= $i"/>
                        @endfor
                    </div>
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Body</label>
                    <textarea class="form-control" id="message-text" wire:model="body"></textarea>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" wire:click="submit">Submit</button>
        </div>
    </div>
</div>
</div>
