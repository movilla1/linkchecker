      <div class="project">
        <div class="row bg-white has-shadow">
            <div class="left-col col-lg-8 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="text">
                <h3 class="h4">{{ $project->title }}</h3><small>{{$project->link}}</small>
              </div>
            </div>
            <div class="user"><span class="hidden-sm-down"><i class="fa fa-user"></i>&nbsp;&nbsp;{{ $project->get_user_name() }}</span></div>
            </div>
            <div class="right-col col-lg-4 d-flex align-items-center">
             @if (isset($trash))
             <div class="actions"><a class="btn btn-sm btn-success" href="{{route('trash_unerase_project',['project'=> $project]) }}"><i class="fa fa-reply"></i>&nbsp;Restore</a></div><div class="col-sm-1"></div>
             @else
              <div class="actions"><a class="btn btn-sm btn-success" href="{{route("project_items",['project_id'=> $project->id]) }}"><i class="fa fa-check"></i>&nbsp;Open</a></div>
              <div class="actions"><a class="btn btn-sm btn-info" href="{{route("projects.edit",['id'=> $project->id]) }}"><i class="fa fa-pencil"></i>&nbsp;Edit</a></div>
             @endif
              <div class="actions">
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' => [$route, $project->id]
                ]) !!}
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                  <i class="fa fa-trash-o"></i>&nbsp;Delete</button>
                {!! Form::close() !!}
              </div>
            </div>
        </div>
      </div>