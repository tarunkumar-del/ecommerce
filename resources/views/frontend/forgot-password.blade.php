@extends('frontend.layouts.master')
@section('section')
    <!--============================
                                                 BREADCRUMB START
                                            ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>FORGET PASSWORD</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">forget password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                BREADCRUMB END
                                            ==============================-->


    <!--============================
                                            FRONT END PAGE START
                                            ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">forget password</button>
                            </li>

                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">

                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input type="email" placeholder="email" name="email" value="{{old('email')}}">
                                        </div>
                                        </div>
                                        <button class="common_btn" style="margin-top:10px " type="submit">Email Password Reset Link</button>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                              FRONT END  PAGE END
                                            ==============================-->
@endsection
