@extends('layouts.page')
@section("page-title")
    Items for Project
@endsection
@section('actions')
  <div class="actions">
    <a href="{{route('items.create',["project_id"=>$project->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<div class="container-fluid" ng-app='itemChecker' ng-init='projects={!!$project!!};statuses=[];ItemData={!! $links !!}' ng-controller="itemlist">
  <div class="spinner hidden" id="spinner"><img src="/double_ring.svg" class="ajax-loader" /></div>
    <!-- Title -->
    <div class="project">
      <div class="row bg-white has-shadow">
        <div class="left-col col-lg-11 d-flex align-items-center justify-content-between">
          <div class="project-title d-flex align-items-center">
              <div class="text">
                {{$project->title}}
              </div>
          </div>
          <div class="text">
            <h3>{{$project->link}}</h3>
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
              <!-- todo -->
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