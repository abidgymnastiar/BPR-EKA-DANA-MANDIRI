<div>
    <form action="{{ $action }}" method="GET">
        <div class="input-group">
            <input type="text" name="search" class="rounded-lg" placeholder="{{ $placeholder }}" value="{{ request('search') }}">
            <div class="input-group-append inline" style="margin-left: -30px;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>