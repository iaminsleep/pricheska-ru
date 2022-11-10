@include('include.header')
    <main class="page-main">
        <div class="main-container page-container">
            <section class="create__task">
                <h1>Публикация нового задания</h1>
                <div class="create__task-main">
                    <form class="create__task-form form-create" method="post" action="{{ route('task.create') }}" enctype="multipart/form-data" id="task-form">
                        {{ csrf_field() }}
                        <label for="10">Мне нужно</label>
                        <input class="input textarea" rows="1" id="10" name="name" placeholder="Повесить полку"/>

                        <span>Кратко опишите суть работы</span>
                        <label for="11">Подробности задания</label>
                        <input class="input textarea" rows="7" id="11" name="description" placeholder="Place your text"/>

                        <span>Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться</span>
                        <label for="12">Категория</label>
                        <select class="multiple-select input multiple-select-big" id="12" size="1" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>

                        {{-- <span>Выберите категорию</span>
                        <label>Файлы</label>
                        <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                        <div class="create__file">
                            <span>Добавить новый файл</span>
                            <!-- <input type="file" name="files[]" class="dropzone"> -->
                        </div> --}}

                        <label for="13">Локация</label>
                        <input class="input-navigation input-middle input" id="13" type="search" name="location" placeholder="Калининский район д.22"/>
                        <span>Укажите адрес исполнения, если задание требует присутствия</span>
                        
                        <div class="create__price-time">
                            <div class="create__price-time--wrapper">
                                <label for="14">Бюджет</label>
                                <input class="input textarea input-money" rows="1" id="14" name="budget" placeholder="1000"\>
                                <span>Не заполняйте для оценки исполнителем</span>
                            </div>
                            <div class="create__price-time--wrapper">
                                <label for="15">Срок исполнения</label>
                                <input id="15" class="input-middle input input-date" type="date" name="deadline" placeholder="10.11, 15:00"/>
                                <span>Укажите крайний срок исполнения</span>
                            </div>
                        </div>
                    </form>
                    <div class="create__warnings">
                        <div class="warning-item warning-item--advice">
                            <h2>Правила хорошего описания</h2>
                            <h3>Подробности</h3>
                            <p>Друзья, не используйте случайный<br>
                                контент – ни наш, ни чей-либо еще. Заполняйте свои
                                макеты, вайрфреймы, мокапы и прототипы реальным
                                содержимым.</p>
                            <h3>Файлы</h3>
                            <p>Если загружаете фотографии объекта, то убедитесь,
                                что всё в фокусе, а фото показывает объект со всех
                                ракурсов.</p>
                        </div>
                        @if($errors->any())
                            <div class="warning-item warning-item--error">
                                {{ $errors }}
                                <h2>Ошибки заполнения формы</h2>
                                <h3>Категория</h3>
                                <p>Это поле должно быть выбрано.<br>
                                    Задание должно принадлежать одной из категорий</p>
                            </div>
                        @endif
                    </div>
                </div>
                <button form="task-form" class="button" type="submit">Опубликовать</button>
            </section>
        </div>
    </main>
@include('include.footer')
{{-- <script src="js/dropzone.js"></script>
<script>
  var dropzone = new Dropzone("div.create__file", {url: "/", paramName: "Attach"});
</script> --}}

