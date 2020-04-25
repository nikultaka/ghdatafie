
@if(!empty($news))
<div class="infographic-list">
    <div class="row">

        @foreach ($news as $new)
        <div class="col-sm-6">
            <a href="{{url('news/'.$new->id)}}">
            <div class="white-box p-0">
                <div class="image">
                    <?php
                    if (isset($new->image) && $new->image != '') {
                        $url = ASSET . 'upload/news/thumbnail/' . $new->image;
                    } else {
                        $url = ASSET . 'upload/'.NO_IMAGE_AVAILABLE;
                    }
                    ?>
                    <img class="img-fluid" alt="" src="{{url($url)}}">
                </div>

                <div class="p-3">
                    <div class="tag">{{$new->title}}</div>
                    <h5>{{$new->short_desc}}</h5>
                    <p><?php echo date("M d, Y", strtotime($new->created_at)); ?></p>
                </div>
            </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="pt-5">
            <center>{!! $news->render() !!}</center>
        </div>
    </div>
</div>
@endif
