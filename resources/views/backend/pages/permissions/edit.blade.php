@extends(config('system.paths.backend.layout') . 'master')

@section('title', 'Permission')

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="my-1 float-left"><i class="fas fa-info-circle text-info"></i>&nbsp;Update Permission</h3>
            @can('permissions.index')
                <div class="btn-group btn-group-sm float-right" role="group">
                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-info" title="List All">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    </a>
                </div>
            @endcan
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('permissions.update', $permission->id) }}" method="post" class="form">
                    @method('patch')
                    @csrf
                    @include(config('system.paths.backend.page') . 'permissions.form')
                </form>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
