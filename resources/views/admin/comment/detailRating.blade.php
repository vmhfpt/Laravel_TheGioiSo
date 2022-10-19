@extends('admin.layout.main')
@section('content')
  @if (isset($error))
  <div style="margin-top : 13px" class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Xin lỗi!</h5>
    Chưa có xếp hạng nào cho sản phẩm này,vui lòng quay trở lại trang trước đó hoặc lựa chọn sản phẩm khác.
  </div>
  @else
  <div class="show-here-comment-dashboard">

    <section class="content">
        <div class="container-fluid">
            <h5 class="mt-4 mb-2"> Tổng cộng <span>({{ $sumTotal }} xếp hạng kèm theo đánh giá) cho sản phẩm
                    {{ $dataItem->name }}</span></h5>
            <div class="col-md-4">
                <p class="text-center">
                    <strong>Thuộc danh hiệu : {{ round($sumVote / $sumTotal, 2) }}/5 sao</strong>
                </p>

                <div class="progress-group">
                    Thống kê trung bình xếp hạng sản phẩm
                    <span class="float-right"><b>{{ round((100 / 5) * ($sumVote / $sumTotal), 2) }}</b>/100</span>
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: {{ (100 / 5) * ($sumVote / $sumTotal) }}%">
                        </div>
                    </div>
                </div>
            </div><br />

        </div>

        <div class="row">

            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="far fa-frown"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Rất tệ</span>
                        <span
                            class="info-box-number">{{ count($dataItem->getComment()->where('vote', 1)->where('vote', '<>', 0)->get()) }}
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ (100 / $sumTotal) * $voteRating[1] }}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số {{ round((100 / $sumTotal) * $voteRating[1], 4) }}%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="far fa-angry"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tệ</span>
                        <span
                            class="info-box-number">{{ count($dataItem->getComment()->where('vote', 2)->where('vote', '!=', 0)->get()) }}
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ (100 / $sumTotal) * $voteRating[2] }}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số {{ round((100 / $sumTotal) * $voteRating[2], 4) }}%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="far fa-meh"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bình thường</span>
                        <span
                            class="info-box-number">{{ count($dataItem->getComment()->where('vote', 3)->where('vote', '!=', 0)->get()) }}
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ (100 / $sumTotal) * $voteRating[3] }}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số {{ round((100 / $sumTotal) * $voteRating[3], 4) }}%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far fa-grin-hearts"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Tốt</span>
                        <span
                            class="info-box-number">{{ count($dataItem->getComment()->where('vote', 4)->where('vote', '!=', 0)->get()) }}
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ (100 / $sumTotal) * $voteRating[4] }}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số {{ round((100 / $sumTotal) * $voteRating[4], 4) }}%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="far fa-dizzy"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Rất tốt</span>
                        <span
                            class="info-box-number">{{ count($dataItem->getComment()->where('vote', 5)->where('vote', '!=', 0)->get()) }}
                            Đánh giá</span>

                        <div class="progress">
                            <div class="progress-bar" style="width: {{ (100 / $sumTotal) * $voteRating[5] }}%">
                            </div>
                        </div>
                        <span class="progress-description">
                            Chiếm tổng số {{ round((100 / $sumTotal) * $voteRating[5], 4) }}%
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="container mt-3">
            <h2>Chi tiết xếp hạng</h2>
            <br>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-slug="{{ $dataItem->id }}" data-id="5" data-bs-toggle="tab"
                        href="javascript:;">Rất tốt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-slug="{{ $dataItem->id }}" data-id="4" data-bs-toggle="tab"
                        href="javascript:;">Tốt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-slug="{{ $dataItem->id }}" data-id="3" data-bs-toggle="tab"
                        href="javascript:;">Bình thường</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-slug="{{ $dataItem->id }}" data-id="2" data-bs-toggle="tab"
                        href="javascript:;">Tệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-slug="{{ $dataItem->id }}" data-id="1" data-bs-toggle="tab"
                        href="javascript:;">Rất tệ</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Logo</th>
                                <th>Nội dung</th>
                                <th>Ngày</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="get-more">
                            @foreach ($dataItem->getComment()->where('vote', 5)->where('product_id', $dataItem->id)->get()
    as $key => $value)
                                <tr id="{{$value->id}}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td><span class="fa fa-star checked-icon"></span>
                                        <span class="fa fa-star checked-icon"></span>
                                        <span class="fa fa-star checked-icon"></span>
                                        <span class="fa fa-star checked-icon"></span>
                                        <span class="fa fa-star checked-icon"></span>
                                    </td>
                                    <td>{{ $value->content }}</td>
                                    <td>{{ $value->created_at }}</td>
                                    <td data-id="{{$value->id}}" class="dash-board-show"> <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            Chi tiết
                                        </a></td>
                                    <td>
                                        <a  class="btn btn-danger btn-sm" href="javascript:deleteComment({{$value->id}}, '/admin/comment/delete', '{{$value->name}}');">
                                            <i class="fas fa-trash">
                                            </i>
                                            Xóa
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </section>
  @endif


        <script src="/template/admin/js/rating/rating.js"></script>
        <script src="/template/admin/js/comment/comment.js"></script>
    @endsection
