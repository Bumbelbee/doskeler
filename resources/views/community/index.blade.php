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
                    <i class="fa fa-users"></i> Communities 
                        <div class="green">
                            <a href="javascript:;" data-toggle="modal" data-target="#group">
                            <i class="fa fa-pencil"></i>Create Community</a>
                        </div>
                </div>
{{-- my community list --}}
        
    <div class="list-group col-md-5 text-center">
    <p class="list-group-item list-group-item-action active ">My communities list</p>
  @foreach ($communities as $community )
  <a href="/community/{{ $community->title }}" class="list-group-item list-group-item-action">{{ $community->title }}</a>
    @endforeach
    
</div>


 {{-- end of comm list --}}

 {{-- <table class="table table-bordered table-hover">
  <thead>
    <tr class="bg-primary">
      <th scope="col" class = 'text-center'>Title</th>
      <th scope="col" class = 'text-center'>Description</th>
      <th scope="col" class = 'text-center'>Follow</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($all as $community )
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
</table> --}}


{{-- group creation modal window --}}
    <div class="modal fade" id="group" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Create community</h3>
                </div>
                <form id="form-profile-hobbies" method="post" action="">

                {{ csrf_field() }}

                <div class="modal-body">
                    <div class="form-group">
                        <label>Title:</label>
                            <input type="text" class = 'form-control' placeholder="community title" name = 'title'>
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                            <input type="text" name = 'desc' class = 'form-control' placeholder="community description">
                            <input type="hidden" name = 'creator' value="{{$user->name}}">
                        @foreach($lastId as $id)
                            <input type = 'hidden' name = 'lastId' value = '{{ $id->id +1 }}'
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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