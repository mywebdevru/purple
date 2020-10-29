<div>
    <div class="container">
        <div class="row">
            @if (!!$actionMap)
                <livewire:create-new.new-map :action="$actionMap" :key="'map'.time()" />
            @elseif(!!$showNewMap)
                <livewire:main.map :mapId="$showNewMap" :key="'newMap'.time()" />
            @elseif(!!$showMapList)
                <livewire:main.users-maps :user="$user" :key="'usersMaps'.time()" />
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
