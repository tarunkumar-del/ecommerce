<section id="wsus__banner">

    <div class="row">
        <div class="col-xl-12">
            <div class="wsus__banner_content">
                <div class="row banner_slider">
                    @foreach ($slider as $details)
                        <div class="col-xl-12">
                            <div class="wsus__single_slider"
                                style="background:  url('{{ asset($details->images[0]->url) }}');">
                                <div class="wsus__single_slider_text">
                                    <h3>{{ $details->type }}</h3>
                                    <h1>{{ $details->title }}</h1>
                                    <h6>start at ${{ $details->starting_price }}</h6>
                                    <a class="common_btn" href="{{ $details->btn_url }}">shop now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
