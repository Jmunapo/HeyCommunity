@extends('layouts.default')

@section('title')
    {{ $column->title }} - {{ $columnist->title }} 专栏
@endsection

@section('description')
    {{ str_limit(strip_tags($column->content), 100) }}
@endsection

@section('avatar')
    {{ $column->user->avatar }}
@endsection

@section('mainBody')
    <div id="section-site" class="page-site-about">
        <div class="container pt-4">
            <div class="row">
                <div class="col-lg-3 col-md-3 m-np">
                    @include('columnist._columnist_card', ['columnist' => $columnist])
                </div>

                <div class="col-lg-9 col-md-9 m-np">

                    <nav id="section-breadcrumb" class="d-none d-md-block" aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">首页</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('columnist.show', $columnist->domain) }}">{{ $columnist->title }}</a> <span class="text-muted">专栏</span></li>
                            <li class="breadcrumb-item active" aria-current="page">文章详情</li>
                        </ol>
                    </nav>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"><span>{{ $column->title }}</span></h4>

                            <div class="card-text">
                                {!! ($column->content) !!}
                            </div>

                            <div class="footer mt-3">
                                <div class="pull-right d-none d-md-block">
                                    <div class="topic-info text-muted">
                                        {{ $column->favorite_num }} 收藏
                                        &nbsp;/&nbsp;
                                        {{ $column->thumb_up_num }} 赞
                                        &nbsp;/&nbsp;
                                        {{ $column->thumb_down_num }} 踩
                                        &nbsp;/&nbsp;
                                        {{ $column->comment_num }} 评论
                                        &nbsp;/&nbsp;
                                        {{ $column->read_num }} 阅读
                                    </div>
                                </div>

                                <div>
                                    @if (Gate::allows('auth.ownOrAdmin', $column))
                                        <a class="btn btn-link p-0 border-0 mr-2" href="{{ route('column.edit', $column->id) }}">编辑</a>
                                        <button class="btn btn-link p-0 border-0 mr-2" onclick="confirmPostSubmit('是否要删除该文章', '{{ route("column.destroy", $column->id) }}')">删除</button>
                                        <span class="text-muted">|</span>&nbsp;
                                    @endif
                                    {{ $column->created_at }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 m-np mt-4">
                    @include('layouts._tail')
                </div>
            </div>
        </div>
    </div>
@stop
