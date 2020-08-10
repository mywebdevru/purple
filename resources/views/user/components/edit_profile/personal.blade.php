@php
/**
 * @var $profile \App\User
*/
$data = $profile;
@endphp

@extends('layouts.app')

@section('content')
    @component('user.components.left.l_sidebar')@endcomponent
    @component('user.components.right.r_sidebar')@endcomponent

    <div class="header-spacer"></div>

    @component('user.components.wallpaper_block.main', ['data' => $profile, 'user' => $profile])@endcomponent

    <a class="back-to-top" href="#">
        <img src="{{ asset('svg-icons/back-to-top.svg') }}" alt="arrow" class="back-icon">
    </a>

    <div class="container">
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h3 class="text-center">
                        Редактирование профиля {{ $profile->full_name }}
                    </h3>
                </div>
                <div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12" id="edit-profile">
                    <profile-edit-form :id="{{ $profile->id }}"></profile-edit-form>
                </div>

                <div class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-6 col-12">

                    <div class="ui-block">
                        @if ($data->usersVehicles->isEmpty())
                            <div class="ui-block-title">
                                <h6 class="title">Редактировать транспорт</h6>
                            </div>
                        @else
                            <div class="ui-block-title">
                                <h6 class="title">Редактировать транспорт</h6>
                            </div>
                        @endif

                        <ul class="widget w-friend-pages-added notification-list friend-requests js-zoom-gallery">
                            @forelse ($data->usersVehicles as $item)
                                <li class="inline-items">
                                    <div class="author-thumb">
                                        <img src="{{ $item->avatar }}" alt="author" class="avatar">
                                    </div>
                                    <div class="notification-event">
                                    <a href="{{ $item->avatar }}" class="h6 notification-friend">{{ $item->type }}</a>
                                        <span class="chat-message-item">{{ $item->full_vehicle_name }}</span>
                                    </div>
                                    <span class="notification-icon" data-toggle="tooltip" data-placement="top" data-original-title="ADD TO YOUR FAVS">
                                        <a href="#">
                                            <svg class="olymp-star-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-star-icon') }}"></use></svg>
                                        </a>
                                    </span>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
            </div>


            <div class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-6 col-12">

                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Друзья ({{ count($data->friends) }}) Редактировать</h6>
                    </div>
                    <div class="ui-block-content">

                        <!--друзья -->

                        <ul class="widget w-faved-page js-zoom-gallery">
                            @foreach ($data->friends as $friend)
                                <li>
                                    <a href="#">
                                        <img src="{{ $friend->user->avatar }}" alt="author">
                                    </a>
                                </li>
                            @break($loop->iteration == 14)
                            @endforeach
                            @if (count($data->friends)-14 > 0)
                                <li class="all-users">
                                    <a href="#">+{{ count($data->friends)-14 }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @javascript('user', $profile->id)
@endsection
@section('css')
    <style>
        #photo {
            display: none;
        }
        .upload-photo-item:hover {
            cursor: pointer;
        }
    </style>
@endsection
@section('scripts')
    <script src="{{ asset('js/edit.js') }}"></script>
    <script>
        let type = '';
        $('#upload-photo').on('click', function (e) {
            e.preventDefault();
            $('#photo').trigger('click');
        });
        $('.profile-photo-modal-link').on('click', function (e) {
            e.preventDefault();
            type = $(this).data('upload-type')
        });
        $('#photo').on('change', async function (){
            const file = $(this).prop('files')[0];
            const formData = new FormData();
            formData.append('file', file);
            formData.append('type', type);
            formData.append('user', user);
            try {
                const response = await imageUpload(formData);
                $('#update-header-photo').modal('hide');
                const image = response.image,
                    imgType = response.type;
                if(image && imgType) {
                    const src = "{{ URL::to('/') }}" + '/' + image;
                    if(imgType === 'avatar') {
                        $('.author-image').attr('src', src);
                        $('#header-avatar').attr('src', src);
                    } else if (imgType === 'wallpaper') {
                        $('#wallpaper').attr('src', src);
                    }
                    swal("Успех!", "Вы успешно загрузили новое изображение", "success");
                }
            } catch (e) {
                console.log(e.message);
                swal("Ошибка!", e.message, "error");
            }
        });
        async function imageUpload(data) {
            try {
                const response = (await axios({
                    data,
                    method: 'post',
                    url: "{{ route('api.profile.upload') }}",
                })).data;
                if(response.status) {
                    return response;
                }
            } catch (e) {
                throw new Error(e.message);
            }
        }
    </script>
@endsection
