<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Главная
                </p>
            </a>
        </li>
        <li class="nav-header">СЕРВИС</li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                    Категории
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список категорий</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая категория</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Тэги
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список тэгов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tags.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый тэг</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Заказы
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('tasks.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список заказов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tasks.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый заказ</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">БЛОГ</li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                    Категории
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список категорий</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('categories.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая категория</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tags"></i>
                <p>
                    Тэги
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список тэгов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tags.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый тэг</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    Статьи
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('posts.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список статей</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('posts.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая статья</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>