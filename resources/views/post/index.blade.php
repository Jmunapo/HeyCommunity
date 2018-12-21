@extends('layouts.default')

@section('title')
    新闻资讯 - {{ $system->site_title }}
@endsection

@section('description')
    实时的新闻与资讯
@endsection

@section('mainBody')
<div id="section-mainbody" class="page-post-index">
    <div class="container pt-2">
        <div class="row">
            <div class="col-md-9 mt-4 m-np">
                <ul class="list-group">
                    @foreach($posts as $post)
                        <li class="list-group-item">
                            <small class="text-muted d-inline d-md-none">{{ $post->created_at->format('m-d') }} &nbsp;</small>
                            <a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a>
                            <small class="pull-right text-muted d-none d-md-inline">{{ $post->created_at->format('Y-m-d') }}</small>
                        </li>
                    @endforeach
                </ul>

                @if ($posts->count() == 0)
                    <div class="card">
                        <div class="card-body">
                            暂无数据
                        </div>
                    </div>
                @endif

                <!-- Pagination -->
                <nav id="section-pagination">
                    {{ $posts->links() }}
                </nav>
            </div>

            <div class="col-md-3 mt-4 m-np">
                @if (Auth::check() && Auth::user()->is_super_admin)
                    <a class="btn btn-primary btn-block d-none d-md-block text-white mb-3" href="{{ route('post.create') }}">发布资讯</a>
                @endif

                @include('layouts._tail')
            </div>
        </div>
    </div>
</div>
@endsection
