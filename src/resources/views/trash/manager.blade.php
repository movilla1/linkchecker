@extends('layouts.page')
@section('page-title')
  TRASH BIN
@endsection

@section('actions')
  <div class="actions">
  {!! Form::open(['method' => 'DELETE','route' => ["trash_empty"]]) !!}    
    <button class="btn btn-sm btn-primary" onclick=" return confirm('This will remove everything, it will be impossible to recover, are you sure? (it\'s not possible to undo later)')">
      <i class="fa fa-trash"></i>&nbsp;Clear Everything
    </button>
    {!! Form::close() !!}
  </div>
@endsection

@section('page-content')
<h2>Recoverable items</h2>
<section class="items no-padding-top">
  <div class="container-fluid">
    <div class="card-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Website</th>
            <th>Back Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($items as $k=>$item) 
          <tr> 
            <td>{{$item->id}}</td>
            <td>{{$item->website}}</td>
            <td>{{$item->backlink}}</td>
            <td>
              <div class="row">
              <div class="col-sm-2">
              <a class="btn btn-sm btn-success" href="{{route('trash_unerase_item',['item'=>$item])}}"><i class="fa fa-reply"></i> Restore</a>
              </div><div class="col-sm-1"></div><div class="col-sm-2">
              {!! Form::open(['method' => 'DELETE','route' => ["trash_item_remove","item"=>$item]]) !!}    
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-sm btn-danger"  onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i> Delete</button>
              {!! Form::close() !!}</div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>
<h2>Recoverable Projects</h2>
<section class="Projects no-padding-top">
  <div class="container-fluid">
    @foreach ($projects as $k=>$project)
     @include("projects._project_item",["project"=>$project,"route"=>"trash_project_remove","trash"=>true])
    @endforeach
  </div>
</section>
@endsection