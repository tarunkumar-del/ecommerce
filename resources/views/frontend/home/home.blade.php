@extends('frontend.layouts.master')
@section('section')
    <!--============================
                        MOBILE MENU START
                    ==============================-->
    @include('frontend.home.partials.mobliemenu')
    <!--============================
                        MOBILE MENU END
                    ==============================-->
    <!--==========================
                  PRODUCT MODAL VIEW START
                ===========================-->
    @include('frontend.home.partials.productmodel')
    <!--==========================
                  PRODUCT MODAL VIEW END
                ===========================-->
    <!--============================
                    BANNER PART 2 START
                ==============================-->
    @include('frontend.home.partials.bannerpart2')
    <!--============================
                    BANNER PART 2 END
                ==============================-->

    <!--============================
                    FLASH SELL START
                ==============================-->
    @include('frontend.home.partials.flashsale')

    <!--============================
                    FLASH SELL END
                ==============================-->
    <!--============================
               MONTHLY TOP PRODUCT START
            ==============================-->
    @include('frontend.home.partials.monthlytopproduct')

    <!--============================
               MONTHLY TOP PRODUCT END
            ==============================-->

    <!--============================
            BRAND SLIDER START
        ==============================-->
    @include('frontend.home.partials.brandslider')
    <!--============================
            BRAND SLIDER END
        ==============================-->

    <!--============================
            SINGLE BANNER START
        ==============================-->
    @include('frontend.home.partials.singlebanner')
    <!--============================
            SINGLE BANNER END
        ==============================-->
    <!--============================
            HOT DEALS START
        ==============================-->
    @include('frontend.home.partials.hotdeal')
    <!--============================
            HOT DEALS END
        ==============================-->
    <!--============================
            ELECTRONIC PART START
        ==============================-->
    @include('frontend.home.partials.electronicpart')

    <!--============================
            ELECTRONIC PART END
        ==============================-->
    <!--============================
            LARGE BANNER  START
        ==============================-->
    @include('frontend.home.partials.largebanner')

    <!--============================
            LARGE BANNER  END
        ==============================-->
    <!--============================
            WEEKLY BEST ITEM START
        ==============================-->
    @include('frontend.home.partials.weeklybest')

    <!--============================
            WEEKLY BEST ITEM END
        ==============================-->
    <!--============================
          HOME SERVICES START
        ==============================-->
    @include('frontend.home.partials.homeservice')

    <!--============================
            HOME SERVICES END
        ==============================-->
    <!--============================
            HOME BLOGS START
        ==============================-->
    @include('frontend.home.partials.homeblog')
    <!--============================
            HOME BLOGS END
        ==============================-->
@endsection
