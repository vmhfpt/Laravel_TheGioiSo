@extends('post.layout.main')
@section('content_post')
@foreach ($dataItem as $category)
<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>{{$category->name}}</h2>
        </div>
        <div class="row">
            <div class="all-singlepost">
    @foreach ($category->getNews as $news)
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="single-post">
            <div class="post-thumb">
                <a href="/news/{{$news->slug}}">
                    <img src="{{url('storage/news/'.$news->thumb.'')}}" alt="">
                </a>
            </div>
            <div class="post-thumb-info">
                <div class="post-time">
                    <a href="/news/{{$news->slug}}">{{$news->title}}</a>

                </div>
                <div class="postexcerpt">
                    <p>{{$news->description}}...</p>
                    <a href="/news/{{$news->slug}}" class="read-more">Đọc thêm</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
<!--<div class="latest-post-area">
    <div class="container">
        <div class="area-title">
            <h2>Latest Post</h2>
        </div>
        <div class="row">
            <div class="all-singlepost">

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-post">
                        <div class="post-thumb">
                            <a href="#">
                                <img src="img/post/post-1.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="post-time">
                                <a href="#">Beauty</a>
                                <span>/</span>
                                <span>Post by</span>
                                <span>BootExperts</span>
                            </div>
                            <div class="postexcerpt">
                                <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas...</p>
                                <a href="#" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-post">
                        <div class="post-thumb">
                            <a href="#">
                                <img src="img/post/post-2.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="post-time">
                                <a href="#">Fashion</a>
                                <span>/</span>
                                <span>Post by</span>
                                <span>BootExperts</span>
                            </div>
                            <div class="postexcerpt">
                                <p>Fusce ac odio odio. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus...</p>
                                <a href="#" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="single-post">
                        <div class="post-thumb">
                            <a href="#">
                                <img src="img/post/post-3.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-thumb-info">
                            <div class="post-time">
                                <a href="#">Brunch Network</a>
                                <span>/</span>
                                <span>Post by</span>
                                <span>BootExperts</span>
                            </div>
                            <div class="postexcerpt">
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt...</p>
                                <a href="#" class="read-more">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>-->
@endsection
