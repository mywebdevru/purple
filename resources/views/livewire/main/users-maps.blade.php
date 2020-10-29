<div>
    <div class="ui-block">
        <div>Черновики</div>
    </div>
    @forelse ($unpublishedMaps as $map)
        <div class="ui-block">
            <a href="#">{{ $map->title }}</a>
        </div>
    @empty
    <div class="ui-block">
        Черновиков карт нет
    </div>
    @endforelse
</div>
