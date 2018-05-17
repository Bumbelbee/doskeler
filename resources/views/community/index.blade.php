@extends('layouts.app')

@section('content')
    <div class="h-20"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('widgets.sidebar')
            </div>
            <div class="col-md-9">
                @include('flash')
                <div class="content-page-title">
                    <i class="fa fa-users"></i> Сообщества 
                        <div class="green">
                            <a href="javascript:;" data-toggle="modal" data-target="#group" id="create">
                            <i class="fa fa-pencil"></i>Создать Сообщество</a>
                        </div>
                </div>
{{-- my community list --}}
        
    <div class="list-group col-md-5 text-center">
    <p class="list-group-item list-group-item-action active ">Список моих сообществ</p>
  @foreach ($communities as $community )
  <a href="/community/{{ $community->title }}" class="list-group-item list-group-item-action">{{ $community->title }}</a>
    @endforeach
    
</div>
{{-- group creation modal window --}}
    <div class="modal fade" id="group" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Создать сообщество</h3>
                </div>
                <form id="form-profile-hobbies" method="post" action="">

                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label>Название:</label>
                            <input type="text" class = 'form-control' name = 'title' id="title">
                    </div>
                    <div class="form-group">
                        <label>Описание:</label>
                            <input type="text" name = 'desc' class = 'form-control' id="desc">
                            <input type="hidden" name = 'creator' value="{{$user->name}}">
                        @foreach($lastId as $id)
                            <input type = 'hidden' name = 'lastId' value = '{{ $id->id +1 }}'
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="save">Сохранить</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                </div>
            </form>

        </div>
    </div>
</div>
{{-- end of modal window of group creation --}}
            </div>
        </div>
    </div>


@endsection

@section('footer')

@endsection