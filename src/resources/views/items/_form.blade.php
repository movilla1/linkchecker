{{Form::model($item, array('route' =>$route,'method'=>$method)) }}
  @if(isset($item->id))
    <div class="row">
      <div class="col-md-1 offset-md-1">Id</div>
      <div class="col-md-8">{{$item->id}}</div>
    </div>
    <br>
  @endif
  <div class="row">
    <div class="col-md-1 offset-md-1">Website</div>
    <div class="col-md-8">
      {{Form::text("website",null,["class"=>"inputbox","size"=>"50"])}}
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-1 offset-md-1">Back Link</div>
    <div class="col-md-8">
    {{Form::text("backlink",null,["class"=>"inputbox","size"=>"50"])}}
    </div>
  </div>
  {{Form::hidden("project_id",$project_id)}}
  {{ Form::close()}}