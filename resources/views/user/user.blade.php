@extends('layouts.purple')

@section('content')
<div class="mainbody container-fluid mt-4">
    <div class="row">
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
            <div class="card card-default">
                <div class="card-body">
                    <div class="">
                        <div align="center">
                            <img class="thumbnail img-responsive" src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" width="100%">
                        </div>
                        <div class="media-body">
                            <hr>
                            <h3><strong>Девиз по жизни</strong></h3>
                            <p>{{ $data->creed }}</p>
                            <hr>
                            <h3><strong>Друзья</strong> всего - {{ count($data->friends) }}</h3>
                            @if (count($data->friends) > 0)
                                @foreach ($data->friends as $friend)
                                    <a href="{{ route('user.show',['user' => $friend->user->id] ) }}"><p>{{ $friend->user->full_name }}</p></a>
                                    @can('update', $data)
                                        <form action="{{ route('friend.destroy', ['friend' => $friend->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $data->id }}">
                                            <input type="hidden" name="friend_id" value="{{$friend->user->id}}">
                                            <button type="submit" class="btn btn-danger">Отменить</button>
                                        </form>
                                    @endcan
                                    <hr>
                                @endforeach
                            @else
                                <p>
                                    Ищу друзей :)
                                </p>
                                <hr>
                            @endif
                            {{-- @dd($data) --}}
                            @can('update', $data)
                                <h3><strong>С вами хотят подружиться</strong> всего - {{ count($data->requestedFriendships) }}</h3>
                                @if (count($data->requestedFriendships) > 0)
                                    @foreach ($data->requestedFriendships as $requestedFriendship)
                                        <p>{{ $requestedFriendship->user->full_name }}</p>
                                        <div class="row">
                                            <form class="mx-3"  action="{{ route('friend.store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $requestedFriendship->user_id }}">
                                                <input type="hidden" name="friend_id" value="{{$data->id}}">
                                                <input type="hidden" name="requested_friendship" value="{{$requestedFriendship->id}}">
                                                <button type="submit" class="btn btn-success">Принять</button>
                                            </form>
                                            <form action="{{ route('friendship_request.destroy', ['friendship_request' => $requestedFriendship->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $requestedFriendship->user_id }}">
                                                <input type="hidden" name="friend_id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-danger">Отклонить</button>
                                            </form>
                                        </div>
                                        <hr>
                                    @endforeach
                                @else
                                    <p>
                                        Новых запросов на дружбу пока нет.
                                    </p>
                                    <hr>
                                @endif
                                <h3><strong>Вы хотите дружить </strong> всего - {{ count($data->friendshipRequests) }}</h3>
                                @if (count($data->friendshipRequests) > 0)
                                    @foreach ($data->friendshipRequests as $friendshipRequest)
                                        <p>{{ $friendshipRequest->friend->full_name }}</p>
                                        <form  action="{{ route('friendship_request.destroy', ['friendship_request' => $friendshipRequest->id]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$data->id}}">
                                            <input type="hidden" name="friend_id" value="{{ $friendshipRequest->friend_id }}">
                                            <button type="submit" class="btn btn-danger">Я передумал(а)</button>
                                        </form>
                                        <hr>
                                    @endforeach
                                @else
                                    <p>
                                        Новых запросов на дружбу пока нет.
                                    </p>
                                    <hr>
                                @endif
                            @endcan
                            @if (count($data->usersVehicles) > 0)
                            {{-- @dd($vehicles) --}}
                                @foreach ($data->usersVehicles as $vehicle)
                                    <h3><strong>{{ $vehicle->type }}</strong></h3>
                                    <p>{{ $vehicle->full_vehicle_name }}</p>
                                    <p>{{ $vehicle->description }}</p>
                                    <hr>
                                @endforeach
                            @else
                                <h3><strong>Пока хожу пешком.</strong></h3>
                                <hr>
                            @endif
                            <h3><strong>Страна</strong></h3>
                            <p>{{ $data->country }}</p>
                            <hr>
                            <h3><strong>Город</strong></h3>
                            <p>{{ $data->city }}</p>
                            <hr>
                            <h3><strong>Пол</strong></h3>
                            <p>{{ $data->gender }}</p>
                            <hr>
                            <h3><strong>Родился</strong></h3>
                            <p>{{ $data->birth_date }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="card card-default">
                <div class="card-body">
                    <h1 class="card-title pull-left" style="font-size:30px;">{{ $data->full_name }}</h1>
                    <button class="btn btn-primary ml-2" id="friend">Управление профилем</button><br>
                    <hr>
                    <span class="pull-left">
                    <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> Мои посты {{ $data->posts_count }}</a>
                    <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-files-o" aria-hidden="true"></i> Мои подписки {{ $data->subscribes_to_clubs_count + $data->subscribes_to_users_count +$data->subscribes_to_groups_count}}</a>
                    <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-picture-o" aria-hidden="true"></i> Фотографии <span class="badge">42</span></a>
                    <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-fw fa-camera" aria-hidden="true"></i> Видео <span class="badge">42</span></a>
                    </span>
                    <span class="pull-right">
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-at" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Упомянуть в посте"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-envelope-o" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Написать сообщение"></i></a>
                        <a href="#" class="btn btn-link" style="text-decoration:none;"><i class="fa fa-lg fa-ban" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Заблокировать"></i></a>
                    </span>
                </div>
            </div>
            <hr>
            <div class="card card-default">
                <div class="card-body">
                    <div class="media">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="media-body form-post">
                            <form action="{{ route('post.update', ['post' => $data->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="text" class="form-control form-rows" id="comment" onclick="view('hidden1'); return false" rows="1" cols="20" placeholder="Добавить пост..."></textarea>
                                <input type="hidden" name="model" value="App\User">
                                <button type="submit" class="btn btn-primary mt-2">Отправить</button>
                            </form>
                            <span id="charlimitinfo"></span>
                            <div class="upload-item__area"></div>
                            <div id="hidden1" style="display: none;">
                                <button class="btn btn-primary mt-2">Отправить</button>
                                <i class="fa fa-image fa-lg attach" id="attach1" title="Прикрепить ФОТО"></i>
                                <i class="fa fa-film fa-lg attach" id="attach2" title="Прикрепить ВИДЕО"></i>
                                <i class="fa fa-file-word-o fa-lg attach" id="attach3" title="Прикрепить ДОКУМЕНТ"></i>
                                <i class="fa fa-map-o fa-lg attach" id="attach4" title="Прикрепить ГЕОМЕТКУ"></i>
                                <i class="fa fa-newspaper-o fa-lg attach" id="attach5" title="Выбрать ТЕМАТИКУ"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Simple post content example. -->
            <div class="card card-default">
                @foreach ($posts as $post)
                    <div class="card-body">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                            </a>
                        </div>
                    <h4><a href="{{ $post->author_route ? route($post->author_route) :'#' }}" style="text-decoration:none;"><strong>{{ $post->author ? $post->author : $data->full_name}}</strong></a> – <small><small><a href="" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->created_at }}</i></a></small></small></h4>
                        <span>
                            <div class="navbar-right">
                                <div class="dropdown">
                                    <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                        <li><a href="#"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i> Редактировать</a></li>
                                        <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> Скрыть</a></li>
                                        <li><a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i> Уведомления для этого поста</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Удалить</a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                        <hr>
                        <div class="post-content">
                            <p>Simple post content example.</p>
                            <p>{{ $post->text }}</p>
                        </div>
                        <hr>
                        <div>
                            <div class="pull-right btn-group-xs">
                                <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Лайк</a>
                                <a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Поделиться</a>
                                <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Комментировать</a>
                            </div>
                            <div class="pull-left">
                                <p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Для всех</p>
                            </div>
                            <br>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="pull-left">
                                <a href="#">
                                    <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                                </a>
                            </div>
                            <div class="media-body">
                                <textarea class="form-control" rows="1" placeholder="Комментарий"></textarea><button class="btn btn-primary mt-2">Отправить</button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <!-- Reshare Example -->
            <div class="card card-default">
                <div class="card-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>Джон Доу</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 42 минуты назад</i></a></small></small></h4>
                    <span>
                        <div class="navbar-right">
                            <div class="dropdown">
                                <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                    <li><a href="#"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i> Редактировать</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> Скрыть</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i> Уведомления для этого поста</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Удалить</a></li>
                                </ul>
                            </div>
                        </div>
                    </span>
                    <hr>
                    <div class="post-content">
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="pull-left">
                                    <a href="#">
                                        <img class="media-object rounded-circle" src="https://diaspote.org/uploads/images/thumb_large_283df6397c4db3fe0344.png" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                                    </a>
                                </div>
                                <h4><a href="#" style="text-decoration:none;"><strong>✪ SтeғOғғιcιel ✪ ツ</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 15 часов назад</i></a></small></small></h4>
                                <hr>
                                <div class="post-content">
                                    Reshare post example.
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"><i class="fa fa-heart declined-text" aria-hidden="true"></i> Лайк</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Комментировать</a>
                        </div>
                        <div class="pull-left">
                            <p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Для всех</p>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <textarea class="form-control" rows="1" placeholder="Комментарий"></textarea><button class="btn btn-primary mt-2">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample post content with picture. -->
            <div class="card card-default">
                <div class="card-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>Джон Доу</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 42 минуты назад</i></a></small></small></h4>
                    <span>
                        <div class="navbar-right">
                            <div class="dropdown">
                                <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                    <li><a href="#"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i> Редактировать</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> Скрыть</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i> Уведомления для этого поста</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Удалить</a></li>
                                </ul>
                            </div>
                        </div>
                    </span>
                    <hr>
                    <div class="post-content">
                        <p>Sample post content with picture.</p>
                        <img class="img-responsive" src="https://media.giphy.com/media/j1QQj6To9Pbxu/giphy.gif">
                        <p><br><a href="/tags/christmas" class="tag">#Christmas</a> <a href="/tags/caturday" class="tag">#Caturday</a></p>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Лайк</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-retweet" aria-hidden="true"></i> Поделиться</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Комментировать</a>
                        </div>
                        <div class="pull-left">
                            <p class="text-muted" style="margin-left:5px;"><i class="fa fa-globe" aria-hidden="true"></i> Для всех <strong>с мобильного</strong></p>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <textarea class="form-control" rows="1" placeholder="Комментарий"></textarea><button class="btn btn-primary mt-2">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sample post content with comments. -->
            <div class="card card-default">
                <div class="card-body">
                    <div class="pull-left">
                        <a href="#">
                            <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="50px" height="50px" style="margin-right:8px; margin-top:-5px;">
                        </a>
                    </div>
                    <h4><a href="#" style="text-decoration:none;"><strong>Джон Доу</strong></a> – <small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 42 минуты назад</i></a></small></small></h4>
                    <span>
                        <div class="navbar-right">
                            <div class="dropdown">
                                <button class="btn btn-link btn-xs dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dd1" style="float: right;">
                                    <li><a href="#"><i class="fa fa-fw fa-pencil" aria-hidden="true"></i> Редактировать</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye-slash" aria-hidden="true"></i> Скрыть</a></li>
                                    <li><a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i> Уведомления для этого поста</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"><i class="fa fa-fw fa-trash" aria-hidden="true"></i> Удалить</a></li>
                                </ul>
                            </div>
                        </div>
                    </span>
                    <hr>
                    <div class="post-content">
                        <p>Sample post content with comments.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida metus, non ultrices sapien. Morbi odio metus, dapibus non nibh id amet.</p>
                    </div>
                    <hr>
                    <div>
                        <div class="pull-right btn-group-xs">
                            <a class="btn btn-default btn-xs"><i class="fa fa-heart" aria-hidden="true"></i> Лайк</a>
                            <a class="btn btn-default btn-xs"><i class="fa fa-comment" aria-hidden="true"></i> Комментировать</a>
                        </div>
                        <div class="pull-left">
                            <p class="text-muted" style="margin-left:5px;"><i class="fa fa-user-secret" aria-hidden="true"></i> Ограниченый доступ</p>
                        </div>
                        <br>
                    </div>
                    <hr>
                    <div>
                        <a class="btn btn-default btn-xs"><i class="fa fa-bars" aria-hidden="true"></i> Показать еще комментарии</a>
                        <hr>
                        <div class="post-content">
                            <div class="card-default">
                                <div class="card-body">
                                    <div class="pull-left">
                                        <a href="#">
                                            <img class="media-object rounded-circle" src="https://diaspote.org/uploads/images/thumb_large_283df6397c4db3fe0344.png" width="35px" height="35px" style="margin-right:8px; margin-top:-5px;">
                                        </a>
                                    </div>
                                    <h4><a href="#" style="text-decoration:none;"><strong>✪ SтeғOғғιcιel ✪ ツ</strong></a></h4>
                                    <hr>
                                    <div class="post-content">
                                        Comment example.<br><br>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at arcu sapien. Donec laoreet, nisl quis tempor hendrerit, libero augue blandit turpis, in dignissim odio mauris eu tortor. Ut hendrerit ipsum elit, a elementum nulla ultrices eu. In posuere mollis efficitur. Maecenas justo turpis, tristique sit amet ultricies quis, molestie eget ex. Nam vestibulum consequat tincidunt. Morbi vitae placerat sapien. Phasellus quis mi tincidunt sem scelerisque tincidunt. Ut viverra porttitor sagittis. Phasellus aliquam auctor purus, id sollicitudin mauris pulvinar ac. Vivamus vel erat nec orci ultricies iaculis quis sit amet augue. Vestibulum aliquam felis lorem, interdum porttitor sapien sodales ac. Maecenas id ullamcorper risus. Suspendisse id dui sed urna rutrum pharetra. Nam eu lectus et orci vestibulum bibendum. Mauris et pulvinar dui, ac facilisis leo.
                                        <br><small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 12 минут назад</i></a></small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="post-content">
                            <div class="card-default">
                                <div class="card-body">
                                    <div class="pull-left">
                                        <a href="#">
                                            <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-right:8px; margin-top:-5px;">
                                        </a>
                                    </div>
                                    <h4><a href="#" style="text-decoration:none;"><strong>Mi Chleen</strong></a></h4>
                                    <hr>
                                    <div class="post-content">
                                        Another comment.<br><br>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at arcu sapien. Donec laoreet, nisl quis tempor hendrerit, libero augue blandit turpis, in dignissim odio mauris eu tortor. Ut hendrerit ipsum elit, a elementum nulla ultrices eu. In posuere mollis efficitur. Maecenas justo turpis, tristique sit amet ultricies quis, molestie eget ex. Nam vestibulum consequat tincidunt. Morbi vitae placerat sapien. Phasellus quis mi tincidunt sem scelerisque tincidunt. Ut viverra porttitor sagittis. Phasellus aliquam auctor purus, id sollicitudin mauris pulvinar ac. Vivamus vel erat nec orci ultricies iaculis quis sit amet augue. Vestibulum aliquam felis lorem, interdum porttitor sapien sodales ac. Maecenas id ullamcorper risus. Suspendisse id dui sed urna rutrum pharetra. Nam eu lectus et orci vestibulum bibendum. Mauris et pulvinar dui, ac facilisis leo.
                                        <br><small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 9 минут назад</i></a></small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="post-content">
                            <div class="card-default">
                                <div class="card-body">
                                    <div class="pull-left">
                                        <a href="#">
                                            <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-right:8px; margin-top:-5px;">
                                        </a>
                                    </div>
                                    <h4><a href="#" style="text-decoration:none;"><strong>John Doe</strong></a></h4>
                                    <hr>
                                    <div class="post-content">
                                        Yet another post.<br><br>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque at arcu sapien. Donec laoreet, nisl quis tempor hendrerit, libero augue blandit turpis, in dignissim odio mauris eu tortor. Ut hendrerit ipsum elit, a elementum nulla ultrices eu. In posuere mollis efficitur. Maecenas justo turpis, tristique sit amet ultricies quis, molestie eget ex. Nam vestibulum consequat tincidunt. Morbi vitae placerat sapien. Phasellus quis mi tincidunt sem scelerisque tincidunt. Ut viverra porttitor sagittis. Phasellus aliquam auctor purus, id sollicitudin mauris pulvinar ac. Vivamus vel erat nec orci ultricies iaculis quis sit amet augue. Vestibulum aliquam felis lorem, interdum porttitor sapien sodales ac. Maecenas id ullamcorper risus. Suspendisse id dui sed urna rutrum pharetra. Nam eu lectus et orci vestibulum bibendum. Mauris et pulvinar dui, ac facilisis leo.
                                        <br><small><small><a href="#" style="text-decoration:none; color:grey;"><i><i class="fa fa-clock-o" aria-hidden="true"></i> 2 минуты назад</i></a></small></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <a href="#">
                                <img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                            </a>
                        </div>
                        <div class="media-body">
                            <textarea class="form-control" rows="1" placeholder="Комментарий"></textarea><button class="btn btn-primary mt-2">Отправить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- м о д а л к и -->
<div class="modal fade" id="notifyModal" tabindex="-1" role="dialog" aria-labelledby="notifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notifyModalLabel">Уведомления</h5>
                <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <!-- Подписался -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important subscribed"><i class="fa fa-plus bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">peacefulisac</a> отправил Вам заявку в друзья. <span class="text-muted notifytime">00:12</span><br>
                        </p>
                        <div class="mb-2">
                            <button class="btn btn-primary"><i class="fa fa-plus"></i> Принять</button>
                            <button class="btn btn-danger"><i class="fa fa-minus"></i> Отклонить</button>
                        </div>
                        <div class="mb-2">
                            <l class="accepted-text">Вы приняли заявку.</l>
                            <l class="declined-text">Вы отклонили заявку.</l>
                        </div>
                    </div>
                </div>
                <!-- Лайкнул пост -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important liked"><i class="fa fa-heart bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">rus</a> понравился ваш <a href="#">пост</a>. Как насчёт взаимности? <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
                <!-- Дал комментарий -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important commented"><i class="fa fa-comment bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">пажилойжмых</a> прокомментрировал вашу <a href="#">запись</a>. «Одно знаю точно, это будет MVP» <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
                <!-- Лайкнул комментарий -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important liked"><i class="fa fa-comment bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">unknown4126</a> понравился ваш комментарий «Главное не умереть, пока верстаешь» <a href="#">под постом</a>. <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
                <!-- Поделился записью -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important reposted"><i class="fa fa-retweet bt4fix-fa-icons-notif" aria-hidden="true"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">42</a> поделился <a href="#">вашей записью</a>. <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
                <!-- Принял заявку в друзья -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important accepted"><i class="fa fa-plus bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">zelenskiy</a> принял вашу заявку в друзья. <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
                <!-- Клуб одобрил заявку на вступление -->
                <div class="row mb-2">
                    <div class="col-sm-1 text-left">
                        <a href="#">
                            <span class="badge badge-important accepted"><i class="fa fa-check bt4fix-fa-icons-notif"></i></span><img class="media-object rounded-circle" src="https://placehold.it/200x200" width="35px" height="35px" style="margin-left:3px; margin-right:-5px;">
                        </a>
                    </div>
                    <div class="col-sm-10 text-left">
                        <p class="mt-2 ml-2">
                            <a href="#">Название клуба</a> одобрило запрос на членство. Самое время посмотреть, чем живёт клуб! <span class="text-muted notifytime">00:12</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="msgModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="msgModalLabel">Сообщения</h5>
                <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="mail-block">
                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"> Написать письмо</i>
                    </div>
                    <div class="mail-block">
                        <i class="fa fa-envelope-o fa-lg" aria-hidden="true"> Входящие</i>
                    </div>
                    <div class="mail-block">
                        <i class="fa fa-share fa-lg" aria-hidden="true"> Исходящие</i>
                    </div>
                    <div class="mail-block">
                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"> Корзина</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form  method="POST">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aboutModalLabel">Обо мне</h5>
                    <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h3 class="abouthead">Основная информация</h3>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="profeditName">Имя</label>
                                <input type="name" name="name" class="form-control" value="{{ $data->name ?? $data->name}}" }} id="profeditName" aria-describedby="profnameHelp" placeholder="Ваше имя">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="profeditsurName">Фамилия</label>
                                <input type="surname" name="surname" class="form-control" id="profeditsurName" value="{{ $data->surname ?? $data->surname}}" }} placeholder="Ваша Фамилия">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emailName">Email</label>
                                <input type="email" name="email" value="{{ $data->email ?? $data->email}}" }} class="form-control" id="emailName" placeholder="ex@purple.mail">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="passwordName">Пароль</label>
                                <input type="password" class="form-control" id="passwordName" placeholder="...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Дата рождения</label>
                            <input type="date" name="birth_date" value="{{ $data->birth_date ?? $data->birth_date}}" }} class="form-control" id="date" name="date" placeholder="16.01.2003">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cityName">Город</label>
                                <input type="text" name="city" value="{{ $data->city ?? $data->city}}" }} class="form-control" id="cityName" placeholder="Москва">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <div class="alert accepted">
                                <strong>Готово!</strong> Клуб <b>Бампера и Грязь</b> получит вашу заявку на вступление.
                            </div>
                            <div class="alert liked">
                                <strong>Внимание!</strong> Клуб <b>Бампера и Грязь</b> отклонил вашу последнюю заявку, но вы можете подать заявку еще раз.
                            </div>
                            <div class="alert commented">
                                <strong>Важно!</strong> Вы уже состоите в клубе <b>Бампера и Грязь</b>. Прежде чем перейти в другой клуб, покиньте нынешний.
                            </div>
                            <div class="alert subscribed">
                                Клуб <b>Бампера и Грязь</b> одобрил вашу заявку. Клуб установлен у вас в Профиле.
                            </div>
                            <label>Клуб</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <h3 class="abouthead">Транспортное средство</h3>
                        <div class="col-sm-6">
                            <label>Марка</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>Модель</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label>Девиз по жизни</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success">Сохранить</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="setsModal" tabindex="-1" role="dialog" aria-labelledby="setsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="setsModalLabel">Настройки</h5>
                <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="settings-block">
                        <i class="fa fa-bell-o fa-lg" aria-hidden="true"> Настройка уведомлений</i>
                    </div>
                    <div class="settings-block">
                        <i class="fa fa-calendar fa-lg" aria-hidden="true"> Календарь событий</i>
                    </div>
                    <div class="settings-block">
                        <i class="fa fa-commenting-o fa-lg" aria-hidden="true"> FAQ</i>
                    </div>
                    <div class="settings-block">
                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"> Удалить профиль</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="profpicModal" tabindex="-1" role="dialog" aria-labelledby="profpicModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="profpicModalLabel">Настройка аватарки</h5>
                <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center">
                        <img src="https://lut.im/7JCpw12uUT/mY0Mb78SvSIcjvkf.png" alt="AVATAR" style="width: 250px; height: 250px;">
                    </div>
                </div>
                <span class="control-fileupload mt-2">
                    <label for="fileInput">Выберите файл:</label>
                    <input type="file" id="fileInput">
                </span>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="passwdModal" tabindex="-1" role="dialog" aria-labelledby="passwdModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwdModalLabel">Сменить пароль</h5>
                <button type="button" class="close times-fix" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

@endsection
