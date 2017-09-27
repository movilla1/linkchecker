@extends('layouts.page')
@section("page-title")
    Items
@endsection
@section('actions')
  <div class="actions" id="#act">
    <a href="#act" onclick="add_item_to_current_prj()" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<div class="container-fluid" ng-app='itemChecker' ng-init='projects=<?=$projects?>;statuses=[]' ng-controller="itemlist">
  <div class="spinner hidden" id="spinner"><img src="/double_ring.svg" class="ajax-loader" /></div>
    <!-- Title -->
    <div class="project">
      <div class="row bg-white has-shadow">
        <div class="left-col col-lg-10 d-flex align-items-center justify-content-between">
          <div class="project-title d-flex align-items-center">
              <div class="text">
                <select ng-model='projectData' ng-change="LoadLinks(projectData,{{\Auth::user()->id}})" ng-options="project.title for project in projects track by project.id"></select>
              </div>
          </div>
          <div class="text">
            <h3><%ProjectURL%></h3>
          </div>
        </div>
        <div class="right-col col-lg-2 d-flex align-items-center">
          <button class="btn btn-sm btn-info" ng-click="CheckAllLinks()" title="Refresh statuses"><i class="fa fa-refresh"></i> Refresh</button>
        </div>
      </div> 
    </div>
    <input type="hidden" id="project_id" name="project_id" value="<%ProjectID%>"/>
    <!-- Links -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body" ng-if="!ErrorMsg">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Website</th>
                <th>Back Link</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="row in ItemData">
                <th scope="row">
                  <%row.id%>
                </th>
                <td><%row.website%></td>
                <td><%row.backlink%></td>
                <td>
                  <div class='blank-status' ng-class='statuses[row.id]'>&nbsp;</div>
                </td>
                <td>
                  <form ng-submit="delete_selected_item(row.id)" id="del<%row.id%>" method="post"/>
                    {!! method_field("DELETE")!!}
                    {!! csrf_field() !!}
                    <div class="btn-group">
                      <a class="btn btn-sm btn-info" href="{{route('items.index')}}/<%row.id%>/edit"><i class="fa fa-pencil"></i></a>
                      <input type="hidden" name="ignore" id="act<%row.id%>" value="{{route('items.index')}}" />
                      <button class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>
                    </div>
                  </form>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row" ng-if="ItemData.length<1">
        <div class="col-md-12"><div style="font-size: 18pt;text-align: center; margin-left: auto; padding-bottom:30px;">No data</div></div>
        </div>
        <div class="row" ng-if="ErrorMsg">
          <div class="col-md-12"><div style="font-size: 18pt;text-align: center; margin-left: auto; padding-bottom:30px;"><%ErrorMsg%></div></div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#spinner").hide();
});

function add_item_to_current_prj() {
  var project_id = $("#project_id").val() || "";
  var item_route='{{route("items.create")}}';
  var new_url=item_route;
  if (project_id.length >= 1) {
    new_url += "?project_id="+project_id;
  }
  window.location.href=new_url;
}
</script>
@endsection