<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Feed as ModelFeed;
use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use App\Models\Club;
use App\Models\Group;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Feed extends Component
{
    public $feed;
    public $user;

    protected $listeners = ['postCreated' => 'resetCreate', 'photoCreated' => 'resetCreate'];

    public function mount($user)
    {
        $this->$user = $user;
        $this->feed = $this->getFeed();
    }

    public function getFeed()
    {
        $id=$this->user->id;
        if (!!auth()->user() && auth()->user()->id == $id) {
            $groups = $this->user->subscribes()->where('subscrable_type', Group::class)->pluck('subscrable_id');
            $users = $this->user->subscribes()->where('subscrable_type', User::class)->pluck('subscrable_id');
            $clubs = $this->user->subscribes()->where('subscrable_type', Club::class)->pluck('subscrable_id');
            $feeds = ModelFeed::where(function ($query) use ($users){
                return $query->where('authorable_type', [User::class])->whereIn('authorable_id', $users);
                })->orWhere(function ($query) use ($clubs){
                    return $query->where('authorable_type', [Club::class])->whereIn('authorable_id', $clubs);
                })->orWhere(function ($query) use ($groups){
                        return $query->where('authorable_type', [Group::class])->whereIn('authorable_id', $groups);
                })->orderBy('updated_at','DESC');
        } else {
            $feeds = $this->user->feeds();
        }
        $feeds->with(['feedable.comments',
                    'feedable.likes.authorable'])
                    ->with(['feedable' => function (MorphTo $morphTo) {
                    $morphTo->morphWith([
                        Image::class => ['imageable'],
                        Post::class => ['postable'],
                    ]);
                }]);
        return $feeds->get();
    }

    public function resetCreate()
    {
        $this->feed = $this->getFeed();
    }

    public function render()
    {
        return view('livewire.feed');
    }
}
