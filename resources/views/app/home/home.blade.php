@extends('app.layouts.app')

@section('content')
    <main>

        <section class="section-about">
            <div class="u-center-text u-m-b-big">
                <h2 class="heading-secondary">
                    @lang('main.exciting_dress_for_your_party')
                </h2>
            </div>
            <div class="row">
                <div class="col-1-of-2">
                    <div class="section-about__text">
                        <h3 class="heading-tertiary u-m-b-small">
                            @lang('main.you_are_going_to_fail_in_love_with_out_dresses')
                        </h3>
                        <p class="paragraph">
                            ipsum dolor sit amet consectetur adipisicing elit. Quaerat labore ipsa odit cumque at quidem laboriosam quae ad perferendis. Fugiat repellat assumenda quasi non recusandae ipsum praesentium, qui nulla error!
                        </p>

                        <h3 class="heading-tertiary u-m-b-small">
                            @lang('main.be_a_princess_like_you_never_have_been_before')
                        </h3>
                        <p class="paragraph">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum fugit adipisci deserunt iusto pariatur mollitia dignissimos magnam exercitationem, quisquam doloremque accusantium quae sequi laudantium facere obcaecati similique tenetur possimus quasi!
                        </p>

                        <a href="#" class="btn-text">@lang('main.see_more') &rarr;</a>
                    </div>
                </div>
                <div class="col-1-of-2">
                    <div class="composition">
                        <img src="new/new.jpg" alt="Image 1" class="composition__photo composition__photo--p1">
                        <img src="img/p2.jpg" alt="Image 2" class="composition__photo composition__photo--p2">
                        <img src="img/p3.jpg" alt="Image 3" class="composition__photo composition__photo--p3">
                    </div>
                </div>
            </div>
        </section>

        <section class="section-products">
            <div class="u-m-b-big u-center-text">
                <h2 class="heading-secondary">
                    @lang('main.most_popular_dresses')
                </h2>
            </div>

            <div class="row">
                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__side card__side--front">
                            <img class="card__side--front-img" src="img/p1.jpg" alt="img 1">
                            <div class="card__side--front-text">
                                <h4 class="card__side--front-heading">
                                    <span class="name">Wedding Dress</span>
                                    <span class="price">1200 <span class="currency">@lang('main.currency')</span></span>
                                </h4>
                            </div>
                        </div>
                        <div class="card__side card__side--back card__side--back-1">
                            <div class="card__side--back-content">
                                <a href="#" class="btn btn-light">@lang('main.more_details')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__side card__side--front">
                            <img class="card__side--front-img" src="img/p2.jpg" alt="img 1">
                            <div class="card__side--front-text">
                                <h4 class="card__side--front-heading">
                                    <span class="name">Wedding Dress</span>
                                    <span class="price">1200 <span class="currency">@lang('main.currency')</span></span>
                                </h4>
                            </div>
                        </div>
                        <div class="card__side card__side--back card__side--back-1">
                            <div class="card__side--back-content">
                                <a href="#" class="btn btn-light">@lang('main.more_details')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__side card__side--front">
                            <img class="card__side--front-img" src="img/p3.jpg" alt="img 1">
                            <div class="card__side--front-text">
                                <h4 class="card__side--front-heading">
                                    <span class="name">Wedding Dress</span>
                                    <span class="price">1200 <span class="currency">@lang('main.currency')</span></span>
                                </h4>
                            </div>
                        </div>
                        <div class="card__side card__side--back card__side--back-1">
                            <div class="card__side--back-content">
                                <a href="#" class="btn btn-light"> @lang('main.more_details') </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="u-m-t-big u-center-text">
                <a href="#" class="btn btn-dark"> @lang('main.see_all_dresses') </a>
            </div>
        </section>

        <section class="section-features">
            <div class="row">
                <div class="col-1-of-3">
                    <div class="feature-box">
                        <i class="feature-box__icon icon-basic-world"></i>
                        <h3 class="heading-tertiary u-m-b-small">Explore The World</h3>
                        <p class="feature-box__text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                        </p>
                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="feature-box">
                        <i class="feature-box__icon icon-basic-world"></i>
                        <h3 class="heading-tertiary u-m-b-small">Explore The World</h3>
                        <p class="feature-box__text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                        </p>
                    </div>
                </div>
                <div class="col-1-of-3">
                    <div class="feature-box">
                        <i class="feature-box__icon icon-basic-world"></i>
                        <h3 class="heading-tertiary u-m-b-small">Explore The World</h3>
                        <p class="feature-box__text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit
                        </p>
                    </div>
                </div>
            </div>
        </section>

    </main>
@stop
