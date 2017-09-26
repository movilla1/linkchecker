@extends('layouts.page')
@section("page-title")
    Items - Details
@endsection
@section('actions')
  <div class="actions">
    <a href="{{route('items.create',['project_id'=>$project->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</a>
  </div>
@endsection
@section('page-content')
<link href="{{URL::asset('css/itemchecker.css')}}" rel="stylesheet" />
<script type="text/javascript" 
  src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/itemchecker_app.js')}}"></script>

<div class="container-fluid" ng-app='itemChecker' ng-init='project={{$project}}?>;statuses=[]' ng-controller="itemlist">
  <div class="row">
      <div class="col-md-11">
        <span class="project-title" >Project: {{$project->title}} - {{$project->link}}</span>
      </div>
      <div class="col-md-1">
        <button type="button" ng-click="CheckAllLinks()" title="Refresh statuses"><span class="fa fa-refresh"></span></button>
      </div>
  </div>
  <div class="row" ng-if="!ErrorMsg">
    <div class="col-md-1"><h3>#</h3></div>
    <div class="col-md-4"><h3>Website</h3></div>
    <div class="col-md-4"><h3>Back Link</h3></div>
    <div class="col-md-1"><h3>Status</h3></div>
    <div class="col-md-2"><h3>Operations</h3></div>
  </div>
  <div class="row row-color-<% $index%2 %>" ng-repeat="row in ItemData">
    <div class="col-md-1"><%row.id%></div>
    <div class="col-md-4"><%row.website%></div>
    <div class="col-md-4"><%row.backlink%></div>
    <div class="col-md-1">
      <span ng-style='<% statuses[row.id] %>' class="blank-status">&nbsp;</span>
    </div>
    <div class="col-md-2">
      <a href="{{route('items.index')}}/<%row.id%>/edit"><span class="icon icon-edit"></span></a>
      <a href="{{route('items.index')}}/<%row.id%>/delete" data-confirm="This will deactivate this site checking, are you sure?" data-method="delete"><span class="icon icon-delete"></span></a>
    </div>
  </div>
 <div class="row" ng-if="ItemData.length<1">
   <br/><br/>
  <div class="col-md-12"><div style="font-size: 18pt;text-align: center; margin-left: auto;margin-top: 30pt">No data</div></div>
 </div>
 <div class="row" ng-if="ErrorMsg">
  <div class="col-md-12"><%ErrorMsg%></div>
 </div>
</div>
<div ng-bind="statuses"></div>
@endsection