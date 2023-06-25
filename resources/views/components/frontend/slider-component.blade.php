@if ($slider->attachments->isNotEmpty())
<div class="slideshow container-fluid">
    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @foreach ($slider->attachments as $sliderIndex => $item)
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                @endforeach
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                @foreach ($slider->attachments as $index => $sliderItem)
                <div class="item {{ $index == 0 ? 'active' : ''}}">
                    <img src="{{ $sliderItem->file_name}}" alt="{{ $slider->name}}">
                </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
@endif