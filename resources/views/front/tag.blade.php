@extends('layouts.index')

@section('content')
    <!-- Start breadcumb Area -->
    <div class="page-area">
        <div class="breadcumb-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcrumb text-center">
                        <div class="section-headline white-headline">
                            <h3>Home</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Tags</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcumb Area -->
    <!--Blog Area Start-->
    <div class="blog-page-area page-padding">
        <div class="container">
            <div class="row">
                <div class="blog-sidebar">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="blog-left-content">
                            @foreach($blogs as $blog)
                            <div class="single-blog">
                                <div class="blog-image">
                                    <a class="image-scale" href="{{url('blog_details/'.str_replace(' ','_',$blog->blog->title).'/'.$blog->blog->id)}}">
                                        <img src="{{asset('admin_assets/images/blog/'.$blog->blog->image)}}" alt="">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="date-type">
                                            {{ $blog->blog->created_at->format('d M y') }}
                                        </span>
                                        <span class="comments-type">
                                            <i class="fa fa-comment-o"></i>
                                            {{$blog->blog->comment_count()}}
                                        </span>
                                    </div>
                                    <a href="{{url('blog_details/'.str_replace(' ','_',$blog->blog->title).'/'.$blog->blog->id)}}">
                                        <h4>{{$blog->blog->title}}</h4>
                                    </a>
                                    <p>{{$blog->blog->description}}</p>
                                    <a class="read-more" href="{{url('blog_details/'.str_replace(' ','_',$blog->blog->title).'/'.$blog->blog->id)}}"> Read more</a>
                                </div>
                            </div>
                            <!-- End single blog -->
                            @endforeach
                        </div>
                    </div>
                    <!-- End single blog -->
                    <!-- Start Left Sidebar blog -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="left-head-blog">
                            <div class="left-blog-page">
                                <!-- search option start -->
                                <form action="{{route('search')}}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="blog-search-option">
                                        <input type="text" placeholder="Search..." name="search">
                                        <button class="button" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <!-- search option end -->
                            </div>
                            <div class="left-blog-page">
                                <!-- recent start -->
                                <div class="left-blog">
                                    <h4>recent post</h4>
                                    <div class="recent-post">
                                        @foreach($lasts as $last)
                                        <!-- start single post -->
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="{{url('blog_details/'.str_replace(' ','_',$last->title).'/'.$last->id)}}">
                                                    <img src="{{asset('admin_assets/images/blog/'.$last->image)}}" alt="">
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <p><a href="{{url('blog_details/'.str_replace(' ','_',$last->title).'/'.$last->id)}}">{{$last->title}}</a></p>
                                                <span class="date-type">
                                                    {{ $last->created_at->format('d M y') }}
                                                </span>
                                            </div>
                                        </div>
                                        <!-- End single post -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- recent end -->
                            </div>
                            <div class="left-blog-page">
                                <div class="left-tags blog-tags">
                                    <div class="popular-tag left-side-tags left-blog">
                                        <h4>tags</h4>
                                        <ul>
                                            @foreach($tags as $tag)
                                            <li><a href="{{url('blog_tag/'.str_replace(' ','_',$tag->title).'/'.$tag->id)}}">{{$tag->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Left Sidebar -->
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!--End of Blog Area-->	
@endsection