<section class="content dash-board">
    <a class="close-custom" href="javascript:;"> &times;</a>
        <div class="card" style="width:400px">
          <img class="card-img-top" src="https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png" alt="Card image" style="width:100%">
          <div class="card-body">
            <h4 class="card-title">Tên : {{$dataItem->name}}</h4>
            <p class="card-text">Email: {{$dataItem->email}}</p>
            <p class="card-text">SĐT : {{$dataItem->number_phone}}</p>
            <p class="card-text">Nội dung : {{$dataItem->content}}</p>
            <p class="card-text">Ngày đánh giá : {{$dataItem->created_at}}</p>
          </div>
        </div>
      </section>
