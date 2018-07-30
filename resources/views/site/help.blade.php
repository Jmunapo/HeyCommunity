@extends('layouts.default')

@section('title')
    帮助 - {{ $system->site_title }}
@endsection

@section('mainBody')
    <div id="section-site" class="page-site-about">
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-3 col-md-3 m-np">
                    @include('site._sidebar')
                </div>

                <div class="col-lg-9 col-md-9 m-np">
                    <div id="sitepage-card" class="card">
                        <div class="card-body">
                            <h4 class="card-title">帮助</h4>

                            <div class="mt-3">
                                <p>
                                    在本网站的使用过程中遇到任何疑问或问题，您可以发送电子邮件到 hi@hey-ganzhou.com <br>
                                    我们非常愿意帮忙您 ~
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-block d-md-none m-np mt-4">
                    @include('layouts._tail')
                </div>
            </div>
        </div>
    </div>
@stop

