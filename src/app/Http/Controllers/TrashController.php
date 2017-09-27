<?php

namespace App\Http\Controllers;

use App\ItemChecker;
use App\User;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Req;

class TrashController extends Controller
{
  public function manage() {
    $items = ItemChecker::onlyTrashed()->get();
    $projects = Project::onlyTrashed()->get();
    return view("trash.manager",["items"=>$items,"projects"=>$projects]);
  }

  public function unerase_item($item) {
    $unerase = ItemChecker::withTrashed()->find($item);
    if ($unerase) {
      $ret = $unerase->restore();
    }
    return \redirect()->route("trash",[ "notice"=>"Item Restored"]);
  }

  public function unerase_project($project) {
    $unerase = Project::withTrashed()->find($project);
    if ($unerase) {
      $unerase->restore();
    }
    return \redirect()->route("trash",[ "notice"=>"Project Restored"]);
  }

  public function empty() {
    $items = ItemChecker::onlyTrashed()->get();
    foreach($items as $item) {
      $item->forceDelete();
    }
    $projects = Project::onlyTrashed()->get();
    foreach ($projects as $project) {
      $project->forceDelete();
    }
    return \redirect()->route("trash",[ "notice"=>"Trash Bin is now EMPTY"]);
  }

  public function remove_item($item) {
    $erase = ItemChecker::find($item);
    if ($erase) {
      $erase->forceDelete();
    }
    return \redirect()->route("trash",[ "notice"=>"Item Permanently REMOVED"]);
  }

  public function remove_project($project) {
    $erase = Project::find($item);
    if ($erase) {
      $erase->forceDelete();
    }
    return \redirect()->route("trash",[ "notice"=>"Project Permanently REMOVED"]);
  }
}