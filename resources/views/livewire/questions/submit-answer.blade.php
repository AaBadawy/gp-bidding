<div wire:ignore>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$question->id}}" data-whatever="@mdo">Submit Answer</button>
    <div class="modal fade" id="exampleModal-{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Start Answering</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <p>{{$question->title}}</p>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Answer</label>
                            <textarea class="form-control" id="message-text" wire:model="answer"></textarea>
                            @error("message")
                                <p class="text-danger font-weight-bold mx-2 my-1">testing</p>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-primary" wire:click="submitAnswer">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
