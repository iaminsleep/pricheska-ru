@extends('front.blog.posts.layouts.layout')

@section('title', $post->title . ' - Причёска.ру')

@section('content')
    <div class="page-wrapper">
        <div class="blog-title-area">
            <ol class="breadcrumb hidden-xs-down">
                <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Главная</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}">
                        {{ $post->category->title }}
                    </a>
                </li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>

            <span class="color-yellow">
                <a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                    title="">{{ $post->category->title }}</a></span>
            <h3>{{ $post->title }}</h3>
            <div class="blog-meta big-meta">
                <small><a href="marketing-single.html" title="">{{ $post->getDate() }}</a></small>
                <small><a href="blog-author.html" title="">{{ $post->creator->name }}</a></small>
                <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
            </div>
        </div>
        <div class="single-post-media">
            <img src="{{ $post->getImage() }}" alt="{{ $post->title }}" class="img-fluid">
        </div>

        <div class="blog-content">
            {!! $post->content !!}
            {{-- нам не нужно экранировать html-контент, а именно вставить html-код, поэтому используется такая конструкция вместо двух фигурных скобок --}}
        </div>

        <div class="blog-title-area">
            @if ($post->tags->count())
                <div class="tag-cloud-single">
                    <span style="color: white !important;">Tags</span>
                    @foreach ($post->tags as $tag)
                        <small>
                            <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}"
                                title="{{ $tag->title }}">{{ $tag->title }}</a>
                        </small>
                    @endforeach
                </div><!-- end meta -->
            @endif

            <div class="post-sharing" style="display: flex; justify-content: center;">
                <form id="form-like" onclick="document.getElementById('form-like').submit();"
                    style="display:flex; flex-direction:row; align-items:center; margin-bottom: 15px; margin-right: 50px; cursor:pointer"
                    action="{{ route('posts.like', ['slug' => $post->slug]) }}">
                    @if ($post->isAuthUserLiked())
                        <i class="fa fa-heart" style="font-size:28px; color:red"></i>
                    @else
                        <i class="fa fa-heart-o" style="font-size:28px"></i>
                    @endif
                    <p
                        style="padding-left:10px;font-size:28px; margin:0;@if ($post->isAuthUserLiked()) color:red; @endif">
                        {{ $post->likes()->count() }}
                    </p>
                    @csrf
                </form>
                <ul class="list-inline">
                    <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-vk"></i> <span
                                class="down-mobile">Поделиться ВК</span></a></li>
                </ul>
            </div><!-- end post-sharing -->
        </div><!-- end title -->

        {{-- <div class="row">
            <div class="col-lg-12">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="upload/banner_01.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row --> --}}

        <hr class="invis1">

        <div class="custombox authorbox clearfix">
            <h4 class="small-title">Об авторе</h4>
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <img src="{{ $post->creator->getImage() }}" alt="" class="img-fluid rounded-circle">
                </div><!-- end col -->

                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <h4><a href="#">{{ $post->creator->name }}</a></h4>
                    <p>{{ $post->creator->description }}</p>

                    <div class="topsocial">
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                class="fa fa-facebook"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i
                                class="fa fa-youtube"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                class="fa fa-pinterest"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                class="fa fa-twitter"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                class="fa fa-instagram"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i
                                class="fa fa-link"></i></a>
                    </div><!-- end social -->

                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end author-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">Вам могут также понравиться</h4>
            <div class="row">
                @foreach ($recommendedPosts as $recommendedPost)
                    <div class="col-lg-6">
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="{{ route('posts.single', ['slug' => $recommendedPost->slug]) }}"
                                    title="{{ $recommendedPost->title }}">
                                    <img src="{{ $recommendedPost->getImage() }}" alt="{{ $recommendedPost->title }}"
                                        class="img-fluid">
                                    <div class="hovereffect">
                                        <span class=""></span>
                                    </div><!-- end hover -->
                                </a>
                            </div><!-- end media -->
                            <div class="blog-meta">
                                <h4><a href="{{ route('posts.single', ['slug' => $recommendedPost->slug]) }}"
                                        title="">{!! $recommendedPost->description !!}</a>
                                </h4>
                                <small><a
                                        href="{{ route('categories.single', ['slug' => $recommendedPost->category->slug]) }}"
                                        title="">{{ $recommendedPost->category->title }}</a></small>
                                <small><a href="blog-category-01.html"
                                        title="">{{ $recommendedPost->getDate() }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                    </div><!-- end col -->
                @endforeach
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">

        <div class="custombox clearfix">
            <h4 class="small-title">{{ $post->comments->count() }} Комментария</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="comments-list">
                        @forelse($post->comments as $comment)
                            <div class="media @if ($loop->last) last-child @endif">
                                <a class="media-left" href="#">
                                    <img src="{{ $comment->author->getImage() }}" alt="{{ $comment->author->name }}"
                                        class="rounded-circle">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading user_name">{{ $comment->author->name }}
                                        <small>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</small>
                                    </h4>
                                    <p>{{ $comment->text }}</p>
                                    {{-- <a href="#" class="btn btn-primary btn-sm">Ответить</a> --}}
                                </div>
                                @auth
                                    @if (auth()->user()->id === $comment->author_id)
                                        <form action="{{ route('comments.delete', ['commentId' => $comment->id]) }}"
                                            method="post">
                                            @method('DELETE')
                                            <button class="button__small-color refusal-button button" type="submit"
                                                style="border: 0;padding: 0;outline: 0;background: transparent;">
                                                <img src="{{ asset('public/assets/front/blog/images/garbage.png') }}"
                                                    width="20px" height="20px" />
                                            </button>
                                            @csrf
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @empty
                            <p>Никто ещё не оставлял комментарий. Станьте первыми!</p>
                        @endforelse
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end custom-box -->

        <hr class="invis1">
        @auth
            <div class="custombox clearfix">
                <h4 class="small-title">Оставь отзыв</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-wrapper"
                            action="{{ route('comments.store', ['postId' => $post->id, 'slug' => $post->slug]) }}"
                            method="post" method="post">
                            @csrf
                            <textarea class="form-control" name="text" placeholder="Ваш комментарий"></textarea>
                            <button type="submit" class="btn btn-primary" style="cursor:pointer">Опубликовать</button>
                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </div><!-- end page-wrapper -->
@endsection
