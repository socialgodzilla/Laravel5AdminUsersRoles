<?php
use App\Models\Admin\Permission;

?>

<fieldset>
    <legend>Permissions</legend>
    <table class="table-bordered table-condensed table-hover" style="width: 100%;">
        <col>
        <col style="width: 9em;">
        <thead>
        <tr>
            <th>Name</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        @foreach(Permission::latest()->take(5)->get() as $model)
            <tr>
                <td>
                    {{ $model->name }}
                </td>
                <td>
                    {{ $model->updated_at->diffForHumans()}}
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

</fieldset>