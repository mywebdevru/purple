<div>
    <div class="container">
        <div class="row">
            @if (!!$createMap)
                <livewire:create-new.new-map :key="'map'.time()" />
            @elseif(!!$showNewMap)
                <livewire:main.map :mapId="$showNewMap" :key="'newMap'.time()" />
            @else
                <livewire:feed :user="$user" :key="'feed'.time()" />
                <livewire:main.left-column :user="$user" :key="'left-column'.time()" />
                <livewire:main.rigth-column :user="$user" :key="'rigth-column'.time()" />
            @endif
        </div>
    </div>
    <a class="back-to-top" href="#">
        <img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
    </a>
</div>
