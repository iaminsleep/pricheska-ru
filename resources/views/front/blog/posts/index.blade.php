@extends('front.blog.posts.layouts.layout')

@section('title', 'Причёска.ру - Блог')

@section('header')
    {{-- <section id="cta" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 align-self-center">
                    <h2>A digital marketing blog</h2>
                    <p class="lead"> Aenean ut hendrerit nibh. Duis non nibh id tortor consequat cursus at mattis
                        felis. Praesent sed lectus et neque auctor dapibus in non velit. Donec faucibus odio semper
                        risus rhoncus rutrum. Integer et ornare mauris.</p>
                    <a href="#" class="btn btn-primary">Try for free</a>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="newsletter-widget text-center align-self-center">
                        <h3>Subscribe Today!</h3>
                        <p>Subscribe to our weekly Newsletter and receive updates via email.</p>
                        <form class="form-inline" method="post">
                            <input type="text" name="email" placeholder="Add your email here.." required
                                class="form-control" />
                            <input type="submit" value="Subscribe" class="btn btn-default btn-block" />
                        </form>
                    </div><!-- end newsletter -->
                </div>
            </div>
        </div>
    </section> --}}
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="blog-custom-build">
            @foreach ($posts as $post)
                <div class="blog-box wow fadeIn">
                    <div class="post-media">
                        <a href="{{ route('posts.single', ['slug' => $post->slug]) }}" title="{{ $post->title }}">
                            <img src="{{ $post->getImage() }}" alt="{{ $post->title }}" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div>
                        </a>
                    </div>
                    <div class="blog-meta big-meta text-center">
                        <div class="post-sharing">
                            <ul class="list-inline">
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-vk"></i> <span
                                            class="down-mobile">Поделиться ВКонтакте</span></a></li>
                                {{-- <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet
                                            on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i
                                            class="fa fa-google-plus"></i></a> --}}
                                </li>
                            </ul>
                        </div>
                        <h4><a href="{{ route('posts.single', ['slug' => $post->slug]) }}"
                                title="{{ $post->title }}">{{ $post->title }}</a></h4>
                        <p>{!! $post->description !!}</p>
                        <small><a href="{{ route('categories.single', ['slug' => $post->category->slug]) }}"
                                title="{{ $post->category->title }}">{{ $post->category->title }}</a></small>
                        <small><a href="" title="{{ $post->getDate() }}">{{ $post->getDate() }}</a></small>
                        <small><a href="#" title="">by Jack</a></small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                    </div>
                </div>

                <hr class="invis">
            @endforeach
        </div>
    </div>

    <hr class="invis">

    <div class="row">
        <div class="col-md-12">
            <nav aria-label="Page navigation">
                {{ $posts->links() }}
                {{-- <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul> --}}
            </nav>
        </div><!-- end col -->
    </div><!-- end row -->
@endsection
