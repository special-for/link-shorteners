<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-7 col-md-8">
            <form wire:submit.prevent="save" class="bg-white rounded-5 shadow-5-strong p-5 border border-primary mt-5 mb-3">
                <div class="mb-3">
                    <label for="link" class="form-label">Original Link</label>
                    <input wire:model.defer='link' type="url" class="form-control" id="link" placeholder="Your link">
                    @error('link') <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="limit" class="form-label">Transfer Limit</label>
                    <input wire:model.defer='limit' type="number" class="form-control" id="limit" min="1" @if($unlimited) disabled @endif>
                    @error('limit') <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                    <div class="form-check">
                        <input wire:model='unlimited' class="form-check-input" type="checkbox" id="unlimited">
                        <label class="form-check-label" for="unlimited">Unlimited</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lifetime" class="form-label">Lifetime (hours, max 24h)</label>
                    <input wire:model.defer='lifetime' type="number" class="form-control" id="lifetime" min="1" max="24">
                    @error('lifetime') <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Short</button>
                @error('error') <div class="alert alert-danger mt-2" role="alert">{{ $message }}</div> @enderror
            </form>
            @if($shortLink)
            <div class="bg-white rounded-5 shadow-5-strong p-5 border border-success">
                <h5>Your short link:</h5>
                <a href="{{$shortLink}}">{{$shortLink}}</a>
            </div>
            @endif
        </div>
    </div>
</div>
