<ul>
    @php
        $prev = true;
        $next = true;
        if ($pageCurrent - 3 > 0) {
            $prev = true;
        } else {
            $prev = false;
        }
        if ($pageCurrent + 2 < ceil(count($sumPage) / $pageLimit)) {
            $next = true;
        } else {
            $next = false;
        }

        $Page_start = 1;
        if ($pageCurrent - 2 > 0) {
            $Page_start = $pageCurrent - 2;
        }
        $Page_end = ceil(count($sumPage) / $pageLimit);
        if ($pageCurrent + 2 <= ceil(count($sumPage) / $pageLimit)) {
            $Page_end = $pageCurrent + 2;
        }
        if ($pageCurrent - 2 <= 0 && $pageCurrent + 1 <= ceil(count($sumPage) / $pageLimit)) {
            $Page_end = $pageCurrent + 1;
        }
        if ($pageCurrent + 2 > ceil(count($sumPage) / $pageLimit) && $pageCurrent - 1 > 0) {
            $Page_start = $pageCurrent - 1;
        }

    @endphp
    @foreach ($dataComment as $value)
        <li>
            <div class="comments-details">
                <div class="comments-list-img">
                    <img width="40" height="40"
                        src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png"
                        alt="">
                </div>
                <div class="comments-content-wrap">
                    <span>
                        <b><a href="#">{{ $value->name }} - </a></b>
                        <span class="post-time">{{ $value->created_at }}</span>
                    </span>
                    <div class="pro-rating">
                        @php
                        if ($value->vote != 0){
                            echo str_repeat('<a href="#"><i class="fa active-vote fa-star"></i></a>', $value->vote);
                            echo str_repeat('<a href="#"><i class="fa fa-star-o"></i></a>', 5 - $value->vote );
                        }

                    @endphp
                    </div>
                    <p>{{ $value->content }}</p>
                    <a class="reply-comment add-template-comment-{{$value->id}}" data-reply="{{$value->id}}" href="javascript:;">  <span> Trả lời</span></a>
                </div>
            </div>
            @foreach ($value->getCommentChild as $value)
        <li>
            <div class="commets-child comments-details">
                <div class="comments-list-img">
                    <img width="40" height="40"
                        src="https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png"
                        alt="">
                </div>
                <div class="comments-content-wrap">
                    <span>
                        <b><a href="#">{{ $value->name }} - </a></b>
                        <span class="post-time">{{ $value->created_at }}</span>
                    </span>
                    <p>{{ $value->content }}</p>
                </div>
            </div>
        </li>
    @endforeach
    </li>
    @endforeach
</ul>
<div class="col-md-4 col-sm-4 col-xs-12 text-center">
    <div class="pages">
        <ul>
            @if ($prev == true)
                <li data-page="{{ $pageCurrent - 1 }}" class="custom-left current"><a href="javascript:;" title="Prev"><i
                            class="fa fa-arrow-left"></i></a></li>
            @endif
            @for($i = $Page_start; $i <= $Page_end; $i ++)
            <li data-page="{{$i}}" class="current {{$i == $pageCurrent ? 'active-page' : ''}}">{{$i}}</li>

            @endfor
            <!--<li class="custom-left "><a href="#" title="Next"><i
                                class="fa fa-arrow-left"></i></a></li>
             <li class="current active-page">1</li>
                    <li><a href="#">2</a></li>-->
            {{-- @for ($page = 1; $page <= 3; $page++)
                @if ($page <= $totalPage)
                    <li data-page="{{ $page }}"
                        class="current {{ $page == 1 ? 'active-page' : '' }}">
                        {{ $page }}</li>
                @endif
            @endfor --}}

            @if ($next == true)
                <li data-page="{{ $pageCurrent + 1 }}" class="current custom-right"><a href="javascript:;"
                        class="next i-next" title="Next"><i class="fa fa-arrow-right"></i></a></li>
            @endif
        </ul>
    </div>
</div>
