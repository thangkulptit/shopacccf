<style>
    .ui.card {
        background-color: #000000 !important;
        color: #ffffff !important;
        max-width: 350px !important;
        margin: auto;
    }
    .ui.card .content .header {
        color: #ffffff !important;
    }
    .ui.card .content .description {
        color: #cccccc !important;
    }
    .ui.green.button {
        background-color: #137f50 !important;
        color: #ffffff !important;
    }
    .ui.green.button:hover {
        background-color: #0f5f3c !important;
    }
    .ui.grid > .column {
        padding: 12px !important;
    }
</style>
<div class="ui doubling four column grid" style="margin: auto; padding: 1rem;">
    <!-- Row 1 -->
    @foreach ($list as $item)
      <div class="column">
        <div class="ui card" style="width: 100%;">
            <div class="image">
                <img src="{{ asset('frontend/images/yasuo-hinh.png') }}" style="height: 32px; position: absolute; width: 28px; right: 2px; top: -8px;" alt="Card Image">
                <img src="{{$item['bgr']}}" style="width: 100%; height: auto; object-fit: cover;" alt="Card Image">
            </div>
            <div class="content">
                <div class="header">{{$item['title']}}</div>
                <div class="description">{{$item['description']}}</div>
            </div>
            <div class="extra content" style="text-align: center;">
                <a href="{{$item['link']}}" class="ui green button">Xem ngay</a>
            </div>
        </div>
    </div>  
    @endforeach
</div>