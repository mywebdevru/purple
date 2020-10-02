<form class="comment-form inline-items"  @isset($feedItem)) x-data="{show_button : 0}" @else x-data="{show_button : 1}"  @endisset wire:submit.prevent="saveComment">
    <div class="post__author author vcard inline-items">
        <img src="{{ asset(auth()->user()->avatar) }}" alt="author">
        <div class="form-group with-icon-right">
        <textarea class="form-control @empty($feedItem)edit-comment @endempty" x-on:focus="show_button = 1"  @isset($feedItem) x-on:click.away="show_button = 0" @endisset placeholder="Комментируй! Не стесняйся!" wire:model.defer="text"></textarea>
        </div>
    </div>
    @isset($feedItem)
        <button type="submit" style="display:none" x-show="show_button" class="btn btn-md-2 btn-primary comment-form__button" wire:loading.attr="disabled">Запостить комментарий</button>
        <button style="display:none" x-show="show_button" x-on:click="show_button = 0" class="cancel btn btn-md-2 btn-border-think c-grey btn-transparent custom-color" wire:click.prevent="$set('text', '')" wire:loading.attr="disabled">Отмена</button>
    @else
        <button type="submit" x-show="show_button" class="btn btn-md-2 btn-primary comment-form__button" wire:loading.attr="disabled">Сохранить</button>
        <button x-show="show_button" x-on:click="show_button = 0" wire:click.prevent="cancelEdit" class="cancel btn btn-md-2 btn-border-think c-grey btn-transparent custom-color" wire:loading.attr="disabled">Отмена</button>
    @endisset
</form>
