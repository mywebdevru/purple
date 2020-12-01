<div class="container">
    <livewire:wallpaper-block :user="$user" :key="'wallpaper'.time()" />
    <div class="col-md-12">
        @if(!!$isOwner)
            <div class="h4 pl-2">Черновики</div>
            @forelse ($unpublishedMaps as $map)
                <div class="ui-block map-list-item">
                    <div class="map-list-item__basic">
                        <a href="{{ route('user.map.show', ['user' => $user,  'mode' => 'show', 'map' => $map])}}">{{ $map->title }}</a>
                        <div>
                            <button type="button" class="btn btn-primary" wire:click.prevent="editMap({{ $map->id }})" wire:loading.attr="disabled"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" wire:click.prevent="deleteMap({{ $map->id }})" wire:loading.attr="disabled"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="ui-block map-list-item">
                    <div class="map-list-item__basic">
                        Черновиков карт нет
                    </div>
                </div>
            @endforelse
        @endif
        @if (!!$isOwner)
            <div class="h4 pl-2">Опубликованные</div>
        @endif
        @forelse ($publishedMaps as $map)
            <div class="ui-block map-list-item">
                <div class="map-list-item__basic">
                    <a href="{{ route('user.map.show', ['user' => $user,  'mode' => 'show', 'map' => $map])}}">{{ $map->title }}</a>
                    @if(!!$isOwner)
                        <div>
                            <button type="button" class="btn btn-primary" wire:click.prevent="editMap({{ $map->id }})" wire:loading.attr="disabled"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" wire:click.prevent="deleteMap({{ $map->id }})" wire:loading.attr="disabled"><i class="fa fa-trash"></i></button>
                        </div>
                    @endif
                </div>
                <div class="px-2 pb-2">
                    <div class="map-list-item__additional inline-items">
                        <div class="inline-items">
                            <a class="post-add-icon inline-items">
                                <svg class="olymp-heart-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                                </svg>
                                <span>{{ $map->likes_count }}</span>
                            </a>
                        </div>
                        <div class="comments-shared">
                            <a class="post-add-icon inline-items">
                                <svg class="olymp-speech-balloon-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-speech-balloon-icon') }}"></use>
                                </svg>
                                <span>{{ $map->comments_count }}</span>
                            </a>
                            <a class="post-add-icon inline-items">
                                <svg class="olymp-share-icon">
                                    <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-share-icon') }}"></use>
                                </svg>
                                <span>16</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="ui-block  w-100">
                Опубликованных карт нет
            </div>
        @endforelse
    </div>
</div>
