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
        <li class="nav-header">ОСНОВНОЕ</li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Пользователи
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список пользователей</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый пользователь</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Роли
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список ролей</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('roles.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая роль</p>
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
                <i class="nav-icon fas fa-book"></i>
                <p>
                    Заказы
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('admin.tasks.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список заказов</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.tasks.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый заказ</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-reply"></i>
                <p>
                    Отклики
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('responses.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Все отклики</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('responses.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новый отклик</p>
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
                    <a href="{{ route('blog-categories.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список категорий</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog-categories.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая категория</p>
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
                    <a href="{{ route('admin.posts.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Список статей</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.posts.create') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Новая статья</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
