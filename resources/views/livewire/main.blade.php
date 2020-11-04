<div>
    <livewire:wallpaper-block :user="$user" :key="'wallpaper'.time()" />
    <div class="container">
        <div class="row">
            @if ($actionMap == 'create' || $actionMap == 'edit')
                <livewire:create-new.new-map :action="$actionMap" :map="$map" :key="'newMap'.time()" />
            @elseif(!!$actionMap == 'preview')
                <livewire:main.map :map="$map" :user="$user" preview="1" :key="'previewMap'.time()" />
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
