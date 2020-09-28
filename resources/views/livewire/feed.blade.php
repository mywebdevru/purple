<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
    <div id="newsfeed-items-grid">
        @switch($create)
            @case('post')
                First case...
                @break
            @case('image')
                Second case...
                @break.
        @endswitch
        @foreach ($feed as $item)
            @if($item['feedable_type'] == 'App\Models\Post')
                <livewire:feed.post :post="$item->feedable" :key="'post'.$item->feedable->id"/>
            @else
                <livewire:feed.image :image="$item->feedable" :key="'image'.$item->feedable->id"/>
            @endif
        @endforeach
    </div>
    <a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="" data-container="newsfeed-items-grid">
        <svg class="olymp-three-dots-icon">
            <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
        </svg>
    </a>
</div>

