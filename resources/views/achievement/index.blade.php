@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('menu.achievement')</h1>

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">
                    <a href="{{ route('achievement.index') }}">
                        <i class="fas @lang('icon.achievement')"></i> <span>@lang('menu.achievement')</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- dashboard-pencapaian --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="https://www.gravatar.com/avatar/"></div>

                                    <div class="article-title">
                                        <h2>
                                            <a href="{{ route('achievement.dashboard-pencapaian') }}">Dashboard Pencapaian</a>
                                        </h2>
                                    </div>
                                </div>

                                <div class="article-details">
                                    <p>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>

                                    <div class="article-cta">
                                        <a href="{{ route('achievement.dashboard-pencapaian') }}" class="btn btn-primary">@lang('Read More')</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        {{-- /.dashboard-pencapaian --}}

                        {{-- dashboard-growth-new-cin --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="https://www.gravatar.com/avatar/"></div>

                                    <div class="article-title">
                                        <h2>
                                            <a href="{{ route('achievement.dashboard-growth-new-cin') }}">Dashboard Growth New CiN</a>
                                        </h2>
                                    </div>
                                </div>

                                <div class="article-details">
                                    <p>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>

                                    <div class="article-cta">
                                        <a href="{{ route('achievement.dashboard-growth-new-cin') }}" class="btn btn-primary">@lang('Read More')</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        {{-- /.dashboard-growth-new-cin --}}

                        {{-- dashboard-penutupan-cin --}}
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                            <article class="article">
                                <div class="article-header">
                                    <div class="article-image" data-background="https://www.gravatar.com/avatar/"></div>

                                    <div class="article-title">
                                        <h2>
                                            <a href="{{ route('achievement.dashboard-penutupan-cin') }}">Dashboard Penutupan CiN</a>
                                        </h2>
                                    </div>
                                </div>

                                <div class="article-details">
                                    <p>
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                    </p>

                                    <div class="article-cta">
                                        <a href="{{ route('achievement.dashboard-penutupan-cin') }}" class="btn btn-primary">@lang('Read More')</a>
                                    </div>
                                </div>
                            </article>
                        </div>
                        {{-- /.dashboard-penutupan-cin --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection