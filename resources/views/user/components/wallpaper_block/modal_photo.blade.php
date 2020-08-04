<!-- всплывающее окно для смены фото -->

<div class="modal fade" id="update-header-photo" tabindex="-1" role="dialog" aria-labelledby="update-header-photo" aria-hidden="true">
	<div class="modal-dialog window-popup update-header-photo" role="document">
		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
			</a>

			<div class="modal-header">
				<h6 class="title">Обновить главное фото</h6>
			</div>

			<div class="modal-body">
				<a href="#" class="upload-photo-item">
				<svg class="olymp-computer-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-computer-icon') }}"></use></svg>

				<h6>Загрузить фото</h6>
				<span>С компьютера</span>
			</a>

				<a href="#" class="upload-photo-item" data-toggle="modal" data-target="#choose-from-my-photo">

			<svg class="olymp-photos-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-photos-icon') }}"></use></svg>

			<h6>Выбрать фото</h6>
			<span>Выбрать из загруженных</span>
		</a>
			</div>
		</div>
	</div>
</div>


<!-- ... окончание всплывающего окна по смене фото -->

<!-- всплывающее окно по смене фото -->

<div class="modal fade" id="choose-from-my-photo" tabindex="-1" role="dialog" aria-labelledby="choose-from-my-photo" aria-hidden="true">
	<div class="modal-dialog window-popup choose-from-my-photo" role="document">

		<div class="modal-content">
			<a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
				<svg class="olymp-close-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-close-icon') }}"></use></svg>
			</a>
			<div class="modal-header">
				<h6 class="title">Выбрать из моих фото</h6>

				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-expanded="true">
							<svg class="olymp-photos-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-photos-icon') }}"></use></svg>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-expanded="false">
							<svg class="olymp-albums-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-albums-icon') }}"></use></svg>
						</a>
					</li>
				</ul>
			</div>

			<div class="modal-body">
				<div class="tab-content">
					<div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo1.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo2.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo3.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo4.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo5.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo6.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>

						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo7.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo8.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<div class="radio">
								<label class="custom-radio">
									<img src="{{ asset('img/choose-photo9.jpg') }}" alt="photo">
									<input type="radio" name="optionsRadios">
								</label>
							</div>
						</div>


						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
						<a href="#" class="btn btn-primary btn-lg btn--half-width">Выбрать</a>

					</div>
					<div class="tab-pane" id="profile" role="tabpanel" aria-expanded="false">

						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="{{ asset('img/choose-photo10.jpg') }}" alt="photo">
								<figcaption>
									<a href="#">lorem</a>
									<span>Добавлено: 2 часа назад</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="{{ asset('img/choose-photo11.jpg') }}" alt="photo">
								<figcaption>
									<a href="#">lorem 2016</a>
									<span>Добавлено: 5 недель назад</span>
								</figcaption>
							</figure>
						</div>
						<div class="choose-photo-item" data-mh="choose-item">
							<figure>
								<img src="{{ asset('img/choose-photo12.jpg') }}" alt="photo">
								<figcaption>
									<a href="#">lorem 2018</a>
									<span>Добавлено: 6 минут назад</span>
								</figcaption>
							</figure>
						</div>






						<a href="#" class="btn btn-secondary btn-lg btn--half-width">Отмена</a>
						<a href="#" class="btn btn-primary btn-lg disabled btn--half-width">Добавить</a>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- ... окончание всплывающего окна по смене фото -->
