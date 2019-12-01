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
                            <h3>Blog Details</h3>
                        </div>
                        <ul class="breadcrumb-bg">
                            <li class="home-bread">Home</li>
                            <li>Blog Details</li>
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
                <div class="blog-details">
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        <!-- single-blog start -->
                        <article class="blog-post-wrapper">
                            <div class="blog-banner">
                                <a class="blog-images">
                                    <img src="{{asset('admin_assets/images/blog/'.$blog->image)}}" alt="">
                                </a>
                                <div class="blog-content">
                                    <div class="blog-meta">
                                        <span class="date-type">
                                            {{ $blog->created_at->format('d M y') }}
                                        </span>
                                    </div>
                                    <h4>{{$blog->title}}</h4>
                                    <p>{!! $blog->content !!}</p>
                                </div>
                            </div>
                        </article>
                        <div class="clear"></div>
                        <div class="single-post-comments">
                            <div class="comments-area">
                                <div class="comments-heading">
                                    <h3>{{$blog->comment_count()}} comments</h3>
                                </div>
                                <div class="comments-list">
                                    <ul>
                                        @foreach($blog->comments() as $comment)
                                        <li class="threaded-comments">
                                            <div class="comments-details">
                                                <div class="comments-content-wrap">
                                                    <span>
                                                        <b>{{$comment->user_id != null ? $comment->user->name : $comment->admin->name}}</b>
                                                        <span class="post-time">{{ $comment->created_at->format('d M y') }}</span>
                                                    </span>
                                                    <p>{{$comment->comment}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach							
                                    </ul>
                                </div>
                            </div>
                            <div class="comment-respond">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                                @endif
                                <h3 class="comment-reply-title">Leave a Reply </h3>
                                @if(Auth::guard('admin')->check() || Auth::guard('web')->check())
                                <form action="{{route('comment')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 comment-form-comment">
                                            <p>Massage *</p>
                                            <textarea id="message-box" cols="30" rows="10" name="comment" required></textarea>
                                            @if ($errors->has('comment'))
                                                <div class="alert alert-danger">
                                                    <strong>{{ $errors->first('comment') }}</strong>
                                                </div>
                                            @endif
                                            <input class="add-btn contact-btn" type="submit" value="Post Comment" />
                                        </div>
                                    </div>
                                </form>
                                @else
                                <div class="alert alert-danger">You must Logged to make comment</div>
                                @endif
                            </div>						
                        </div>
                        <!-- single-blog end -->
                    </div>
                    <!-- End single blog -->
                    <!-- Start Right Sidebar blog -->
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
                    <!-- End Right Sidebar -->
                </div>
            </div>
            <!-- End row -->
        </div>
    </div>
    <!--End of Blog Area-->	
@endsection