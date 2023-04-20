@extends('front.blog.posts.layouts.layout')

@section('title', 'Причёска.ру - Блог')

@section('header')

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
                        <small><a href="#" title="">от {{ $post->creator->name }}</a></small>
                        <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                    </div>
                </div>

                <hr class="invis">
            @endforeach
        </div>
    </div>

    <hr class="invis">

    {{ $posts->links('front.blog.vendor.pagination.bootstrap-4') }}
@endsection
