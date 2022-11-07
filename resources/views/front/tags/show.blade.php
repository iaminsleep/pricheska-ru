@extends('front.tags.layouts.layout')

@section('title', $tag->title . ' - Markedia')

@section('header')
    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>{{ $tag->title }} <small class="hidden-xs-down hidden-sm-down">Nulla felis eros, varius sit amet
                            volutpat non. </small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                        <li class="breadcrumb-item active">Marketing</li>
                    </ol>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
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
                                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span
                                            class="down-mobile">Share
                                            on Facebook</span></a></li>
                                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span
                                            class="down-mobile">Tweet
                                            on Twitter</span></a></li>
                                <li><a href="#" class="gp-button btn btn-primary"><i
                                            class="fa fa-google-plus"></i></a>
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
