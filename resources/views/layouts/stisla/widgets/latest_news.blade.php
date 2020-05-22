<div class="card">
    <div class="card-header">
        <h4>@lang('widgets.latestnews.news')</h4>
        <div class="card-header-action">
            <a data-collapse="#collapse" class="btn btn-icon btn-primary" href="#"><i class="fas fa-minus"></i></a>
        </div>
    </div>
    <div class="collapse show" id="collapse">
        <div class="card-body">
            @if($news->count() === 0)
                <div class="text-center text-muted" style="font-size: 15px;">
                    @lang('widgets.latestnews.nonewsfound')
                </div>
            @endif

            @foreach($news as $item)
                <h4>{{ $item->subject }}</h4>
                <p>{{ $item->user->name_private }} - {{ show_datetime($item->created_at) }}</p>
                <p>{{ $item->body }}</p>
                <hr>
            @endforeach
        </div>
    </div>
</div>
