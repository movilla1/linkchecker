@extends('layouts.page')
@section("page-title")
    Items
@endsection
@section('actions')
  <div class="actions">
    <a href="{{route('items.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<style>
select {
  padding: 5px;
  margin-right: 15px;
  margin-top: 10px;
  font-size: 1em;
  border: 1px solid #ccc;
}
.spinner {
  position:absolute;
  top:0;
  left:0;
  width:100%;
  height:100%;
  z-index:1000;
  background-color:grey;
  opacity: .8;
}
.ajax-loader {
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -32px; /* -1 * image width / 2 */
    margin-top: -32px;  /* -1 * image height / 2 */
    display: block;     
}
</style>

<div class="container-fluid" ng-app='itemChecker' ng-init='projects=<?=$projects?>;statuses=[]' ng-controller="itemlist">
  <div class="spinner hidden" id="spinner"><img src="/double_ring.svg" class="ajax-loader" /></div>
    <!-- Title -->
    <div class="project">
      <div class="row bg-white has-shadow">
        <div class="left-col col-lg-11 d-flex align-items-center justify-content-between">
          <div class="project-title d-flex align-items-center">
              <div class="text">
                <select ng-model='projectData' ng-change="LoadLinks(projectData,{{\Auth::user()->id}})" ng-options="project.title for project in projects track by project.id"></select>
              </div>
          </div>
          <div class="text">
            <h3><%ProjectURL%></h3>
          </div>
        </div>
        <div class="right-col col-lg-1 d-flex align-items-center">
          <button class="btn btn-secondary" ng-click="CheckAllLinks()" title="Refresh statuses"><span class="fa fa-refresh"></span></button>
        </div>
      </div> 
    </div>

    <!-- Links -->
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <div class="row">
            <div class="col-lg-1 offset-lg-11">
              
            </div>
          </div>
        </div>
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
                <th scope="row"><%row.id%></th>
                <td><%row.website%></td>
                <td><%row.backlink%></td>
                <td>
                  <div class='blank-status' ng-class='statuses[row.id]'>&nbsp;</div>
                </td>
                <td>
                  <div class="btn-group">
                    <a class="btn btn-sm btn-info" href="{{route('items.index')}}/<%row.id%>/edit"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger" href="{{route('items.index')}}/<%row.id%>/delete" onclick="return confirm('Are you sure?');"><i class="fa fa-trash-o"></i></a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="row" ng-if="ItemData.length<1">
          <div class="col-md-12"><div style="font-size: 18pt;text-align: center; margin-left: auto;margin-top: 30pt">No data</div></div>
        </div>
        <div class="row" ng-if="ErrorMsg">
          <div class="col-md-12"><%ErrorMsg%></div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $("#spinner").hide();
});
</script>
@endsection