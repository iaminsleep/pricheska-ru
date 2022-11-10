<div class="content-view__feedback-wrapper">
  <div class="content-view__feedback-card">
      <div class="feedback-card__top">
          <a href="#"><img src="/img/avatar/{{ $feedback->user->avatar }}" width="55" height="55"></a>
          <div class="feedback-card__top--name">
              <p><a href="#" class="link-regular">{{ $feedback->user->name }}</a></p>
              <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
              <b>{{ $feedback->user->rating }}</b>
          </div>
          <span class="new-task__time">25 минут назад</span>
      </div>
      <div class="feedback-card__content">
          <p> {{ $feedback->message }} </p>
          <span>{{ $feedback->price }} ₽</span>
      </div>
      <div class="feedback-card__actions">
          <a class="button__small-color request-button button"
                  type="button">Подтвердить</a>
          <a class="button__small-color refusal-button button"
                  type="button">Отказать</a>
      </div>
  </div>
</div>