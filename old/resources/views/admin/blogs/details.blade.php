@extends('layouts.application')
@section('title', $blog->meta_title ? $blog->meta_title : $blog->title  )
@section('meta')
    <meta property="og:title" content="{{ $blog->meta_title }}" />
    <meta property="og:title" content="{{ $blog->meta_title }}" />
    <meta property="og:image" content="{{ asset('images/blogs/thumbnail/'.$blog->image) }}" />

    <meta property="og:description" content="{{ $blog->meta_description }}" />
    <meta name="description" content="{{ $blog->meta_description }}"/>
    <meta name="keywords" content="{{ $blog->meta_keyword }}" />
@endsection
@section('content')
@section('content')

<div class="headershadow">
    <div class="blogDetailsWarp paddtb">
        <div class="container clear">
            <div class="leftBlogDetails">
                <div class="detailsTop">
                    <figure>
                        <img src="{{ asset('images/blogs/thumbnail/'.$blog->image) }}" alt="{{ $blog->title }}">
                    </figure>
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li><i class="fa fa-clock-o"></i>{{ date('d.m.y',strtotime($blog->created_at))  }}</li>
                        <li><i class="fa fa-user"></i>{{ str_limit($blog->users->name, $limit = 16, $end = '..') }}</li>
                    </ul>	

                </div>
                <div class="blogCnt">
                    <?= $blog->content ?>
                </div>	

                <div class="blogDetailsBtns clear">
                    <a href="#" class="prev btn">Previous Post</a>
                    <a href="#" class="next btn">Next Post</a>
                </div>	

                <div class="blogComment">

                    <img src="images/fb_comment.jpg" alt="">	
                </div>	
            </div>
            <div class="rightBlogDetails">
                <div class="rightBox">
                    <h3>Most recent tags</h3>
                    <div class="listbox">
                        <a href="#">Utenim </a>
                        <a href="#">Ipsum</a>
                        <a href="#">Lorem</a>
                        <a href="#">Dolor</a>
                        <a href="#">Sit</a>
                        <a href="#">Amet</a>
                        <a href="#">Labore</a>
                    </div>
                </div>
                <div class="rightBox">
                    <h3>Post Categories</h3>
                    <div class="category">
                        <ul>
                            <?php foreach($category as $cat){ ?>
                            <li><a href="{{ route('blogs-category',['slug'=>$cat->url]) }}"><?= $cat->title ?></a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="rightBox">
                    <h3>Recent Post</h3>
                    <div class="category recent">
                        <ul>
                            <?php foreach($latestBlogs as $blog){ ?>
                            <li>
                                <figure>
                                    <a href="{{ route('blogdetails',['slug'=>$blog->url]) }}">
                                        <img src="{{ asset('images/blogs/thumbnail/'.$blog->image) }}" alt="">
                                    </a>
                                </figure>
                                <p><a href="{{ route('blogdetails',['slug'=>$blog->url]) }}">{{ $blog->title }}</a></p>
                                <p class="datelist">{{ date('d M, Y',strtotime($blog->created_at))  }}</p>
                            </li>
                            <?php } ?>
                            
                        </ul>
                    </div>

                </div>

            </div>	
        </div>
    </div>

</div>
@endsection
