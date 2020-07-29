<div class="control-block">
    @auth
        {{ $auth_user }}
    @else
        {{ $unauth }}
    @endauth
</div>







