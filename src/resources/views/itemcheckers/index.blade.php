@extends('layouts.app')
@section('content')
<script type="text/javascript" 
  src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.min.js"></script>
<script type="text/javascript" src="{{URL::asset('js/itemchecker_app.js')}}"></script>

<a href="{{route('projects.create')}}" class="btn btn-default">Add New</a>
<div class="container-fluid" ng-app='itemChecker' ng-init='projects=<?=$projects?>' ng-controller="itemlist">
  <div class="row">
    <div class="col-md-12"><h1>Backlinks</h1></div>
  </div>
  <div class="row">
      <div class="col-md-8">
        <span class="project-title" ng-if="ProjectName.length>0">Project: <%ProjectName%> - <%ProjectURL%></span>
      </div>
      <div class="col-md-4">
      Select Project: <select ng-model='projectData' ng-change="LoadLinks(projectData,{{\Auth::user()->id}})" ng-options="project.title for project in projects track by project.id">
        </select>
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
    <div class="col-md-1" style="color: green" ng-if="statuses[row.id]==true"></div>
    <div class="col-md-1" style="color: red" ng-if="statuses[row.id]==false"></div>
    <div class="col-md-2">
      <a href="{{route('items.index')}}/<%row.id%>/edit"><span class="icon icon-edit"></span></a>
      <a href="{{route('items.index')}}/<%row.id%>/delete" data-confirm="This will deactivate this site checking, are you sure?" data-method="delete"><span class="icon icon-delete"></span></a>
    </div>
  </div>
 <div class="row" ng-if="ItemData.length<1">
  <div class="col-md-12">No data</div>
 </div>
 <div class="row" ng-if="ErrorMsg">
  <div class="col-md-12"><%ErrorMsg%></div>
 </div>
</div>
@endsection