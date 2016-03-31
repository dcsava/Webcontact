@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('webcontact::webcontacts.title.webcontacts') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li class="active">{{ trans('webcontact::webcontacts.title.webcontacts') }}</li>
    </ol>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="{{ route('admin.webcontact.webcontact.create') }}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> {{ trans('webcontact::webcontacts.button.create webcontact') }}
                    </a>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($webcontacts)): ?>
                        <?php foreach ($webcontacts as $webcontact): ?>
                        <tr>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ $webcontact->contact_name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ $webcontact->contact_phone }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ $webcontact->contact_email }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ $webcontact->contact_subject }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ str_limit($webcontact->contact_message, 110) }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}">
                                    {{ $webcontact->created_at }}
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.webcontact.webcontact.view', [$webcontact->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-envelope"></i></a>
                                    {{--<a href="{{ route('admin.webcontact.webcontact.edit', [$webcontact->id]) }}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>--}}
                                    <button class="btn btn-danger btn-flat" data-toggle="modal" data-target="#modal-delete-confirmation" data-action-target="{{ route('admin.webcontact.webcontact.destroy', [$webcontact->id]) }}"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>{{ trans('core::core.table.created at') }}</th>
                            <th>{{ trans('core::core.table.actions') }}</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>
    @include('core::partials.delete-modal')
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>c</code></dt>
        <dd>{{ trans('webcontact::webcontacts.title.create webcontact') }}</dd>
    </dl>
@stop

@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'c', route: "<?= route('admin.webcontact.webcontact.create') ?>" }
                ]
            });
        });
    </script>
    <?php $locale = locale(); ?>
    <script type="text/javascript">
        $(function () {
            $('.data-table').dataTable({
                "paginate": true,
                "lengthChange": true,
                "filter": true,
                "sort": true,
                "info": true,
                "autoWidth": true,
                "order": [[ 0, "desc" ]],
                "language": {
                    "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                }
            });
        });
    </script>
@stop
