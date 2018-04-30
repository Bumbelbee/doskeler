@extends('layouts.app')

@section('content')
    <div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">


                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#posts">Posts ({{ $posts->count() }})</a></li>
                    <li><a data-toggle="pill" href="#users">Users ({{ $users->count() }})</a></li>
                    <li><a data-toggle="pill" href="#communities">Communities ({{ $communities->count() }})</a></li>
                </ul>

                <div class="tab-content">
                   <!-- search posts -->
                    <div id="posts" class="tab-pane fade in active">


                        @if($posts->count() == 0)


                            <div class="alert-message alert-message-default">
                                <h4>Not Found !</h4>
                            </div>


                        @else
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    @foreach($posts as $post)

                                        @include('widgets.post_detail.single_post')

                                    @endforeach
                                </div>
                            </div>
                        @endif


                    </div>

                    {{-- community search --}}
                    <div id="communities" class="tab-pane fade">
                        @if($communities->count() == 0)

                            <div class="alert-message alert-message-default col-md-10">
                                <h4>Not Found !</h4>
                            </div>
                        @else
                                                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="bg-primary">
                                    <th scope="col" class = 'text-center'>Title</th>
                                    <th scope="col" class = 'text-center'>Description</th>
                                    <th scope="col" class = 'text-center'>Follow</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($communities as $community )
                                    <tr>
                                    <td class ="col-sm-3">{{ $community->title }}</td>
                                    <td>{{ $community->description }}</td>
                                    <td class="col-sm-1">
                                                                            <form action="/commfollow" method="get">
                                                                            <button class="btn btn-primary">follow</button>
                                                                            <input type="hidden" name="title" value="{{$community->title}}">
                                                                            <input type="hidden" name="commId" value="{{$community->id}}">
                                                                            <input type="hidden" name="userId" value="{{$user->id}}">
                                                                            </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
@endif
                    </div>

                    <!-- search people -->
                    <div id="users" class="tab-pane fade">

                        @if($users->count() == 0)


                            <div class="alert-message alert-message-default">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
  
  
                         @else
                            <div class="m-t-20"></div>
                            <div class="row">
                                    @foreach($users as $user_p)

                                        <div class="col-sm-6 col-md-4">
                                            <div class="card-container">
                                                <div class="card">
                                                    <div class="front">
                                                        <div class="cover" style="background-image: url('{{ $user_p->getCover() }}')"></div>
                                                        <div class="user">
                                                            <a href="{{ url('/'.$user_p->username) }}">
                                                                <img class="img-circle @if($user_p->sex == 1){{ 'female' }}@endif" src="{{ $user_p->getPhoto(130, 130) }}"/>
                                                            </a>
                                                        </div>
                                                        <div class="content" style="padding-bottom: 20px">
                                                            <div class="main">
                                                                <a href="{{ url('/'.$user_p->username) }}">
                                                                    <h3 class="name">{{ $user_p->name }}</h3>
                                                                    <p class="profession">
                                                                        {{ '@'.$user_p->username }}
                                                                        @if($user_p->canSeeProfile(Auth::id()))
                                                                            <small>{{ Auth::user()->distance($user_p) }}</small>
                                                                        @else
                                                                            <small>(Private)</small>
                                                                        @endif
                                                                    </p>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                            </div>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('footer')
@endsection