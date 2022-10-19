@extends('post.layout.main')
@section('content_post')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="index.html">Thông tin</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{ $dataItem->name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home-hello-info">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="f-title text-center">
                        <h3 class="title text-uppercase">{{ $dataItem->name }}</h3>
                    </div>

                </div>
            </div>
            <div class="row">

                    <div style=" text-align: center !important" class="about-page-cntent">
                        {!! $dataItem->content !!}
                    </div>


            </div>
        </div>
    </div>

@endsection
