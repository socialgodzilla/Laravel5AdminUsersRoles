<?php

// -----------------
// View Name Prefix
// -----------------
$VN = 'views/admin/folders/_form_data.';

$yes_no = ['0' => trans($VN . 'no'), '1' => trans($VN . 'yes')];

?>
<div class="panel-body">
    <div class="form-horizontal">
        <!--- Name Field --->
        <div class="form-group {{$errors->first('name','has-error')}}">
            {!! Form::label('name',  trans($VN.'name'),['class' =>'col-sm-2 control-label text-right']) !!}
            <div class="col-sm-10">
                {!! Form::text('name', $model->name, [
                    'class' => 'form-control input-sm',
                    'placeholder' => trans($VN.'name'),
                    'style' => 'width:100%;']+
                    ($readonly?['readonly']:[])) !!}
                {!! $errors->first('name', '<p class="help-block error-msg">:message</p>') !!}
            </div>
        </div>


        <!--- order Field --->
        <div class="form-group {{$errors->first('order','has-error')}}">
            {!! Form::label('order',  trans($VN.'order'),['class' =>'col-sm-2 control-label text-right']) !!}
            <div class="col-sm-2">
                {!! Form::text('order',$model->order, [
                    'class' => 'form-control input-sm ' .($readonly?'readonly':''),
                    'placeholder' => trans($VN.'order'),
                    'style' => 'width:100%;']+
                    ($readonly?['readonly']:[])) !!}
                {!! $errors->first('order', '<p class="help-block error-msg">:message</p>') !!}
            </div>
        </div>
        <!--- root_id Field --->
        <div class="form-group {{$errors->first('root_id','has-error')}}">
            {!! Form::label('root_id', trans($VN.'root_id'),
                                ['class' =>'col-sm-2 control-label text-right']) !!}
            <div class="col-sm-10">
                {!! Form::select('root_id',$roots, $model->root_id,
                                ['class' => 'form-control input-sm',
                                'style' => 'width:100%;']+
                                ($readonly?['disabled']:[])) !!}
                {!! $errors->first('root_id', '<p class="help-block error-msg">:message</p>') !!}
            </div>
        </div>

        <!--- user_id Field --->
        <div class="form-group {{$errors->first('user_id','has-error')}}">
            {!! Form::label('user_id', trans($VN.'owner'),
                                ['class' =>'col-sm-2 control-label text-right']) !!}
            <div class="col-sm-10">
                {!! Form::select('user_id',$users, $model->user_id,
                                ['class' => 'form-control input-sm',
                                'style' => 'width:100%;']+
                                ($readonly?['disabled']:[])) !!}
                {!! $errors->first('user_id', '<p class="help-block error-msg">:message</p>') !!}
            </div>
        </div>
        <!--- private Fields --->
        <div class="form-group {{$errors->first('private','has-error')}}">
            {!! Form::label('private', trans($VN.'private'),['class' =>'col-sm-2 control-label text-right']) !!}
            <div class="col-sm-2">
                {!! Form::select('private',$yes_no, $model->private, [
                    'class' => 'form-control input-sm',
                    'style' => 'width:100%;']+
                    ($readonly?['readonly']:[])) !!}
                {!! $errors->first('private', '<p class="help-block error-msg">:message</p>') !!}
            </div>
        </div>


        <!--- folder_id Field --->
        <div class="form-group {{$errors->first('folder_id','has-error')}}">
            @if ($model->parent)
                <p class="col-sm-2 control-label text-right">
                    <span class="glyphicon glyphicon-backward">&nbsp;</span>{!!link_to_route(SHOW_ROUTE,trans($VN.'parent'),['id'=>$model->parent->id,'tab' => 'tab_data'])!!}
                </p>
            @else
                {!! Form::label('parent',trans($VN.'parent'),['class' =>'col-sm-2 control-label text-right']) !!}
            @endif
            <div class="col-sm-10">
                @if ($readonly)
                    @if ($model->parent)
                        <p class="textarea">
                            {!!link_to_route(SHOW_ROUTE,$model->parent->Path(),['id'=>$model->parent->id,'tab' => 'tab_data'])!!}
                        </p>
                    @endif
                @else
                    {!! Form::select('folder_id',$folders, $model->folder_id,
                                    ['class' => 'form-control input-sm',
                                    'style' => 'width:100%;']+
                                    ($readonly?['readonly']:[])) !!}
                    {!! $errors->first('folder_id', '<p class="help-block error-msg">:message</p>') !!}
                @endif
            </div>
        </div>

        @if ($readonly)
            <div class="form-group">
                {!! Form::label('children',trans($VN.'children'),['class' =>'col-sm-2 control-label text-right']) !!}
                <div class="col-sm-10">
                    {!! Form::open(['route'=> ['admin.folders.delsubfolders',$model->id],
                                    'method' => 'delete']) !!}

                    <table class="table table-hover table-bordered table-condensed" name="children">
                        <col style="width:2em;">
                        <col style="width:4em;">
                        <thead>
                        <tr>
                            <th>
                                @if ($model->children()->withTrashed()->count()>0)
                                    {!! Form::submit(trans($VN.'trash'),['class'=>'btn-sm btn-danger'])!!}
                                @else
                                    {{trans($VN.'trash')}}
                                @endif
                            </th>
                            <th>{{trans($VN.'order')}}</th>
                            <th>{{trans($VN.'name')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($model->children()->withTrashed()->orderby('order')->orderby('name')->get() as $children)
                            <tr>
                                <td class="text-center">
                                    @if (! $children->children->count())
                                        {!! Form::checkbox('remove_children[]',$children->id,false) !!}
                                    @endif
                                </td>
                                <td style="text-align: right;">
                                    {!! (($children->order!=null)?link_to_route(SHOW_ROUTE,$children->order,['id'=>$children->id,'tab' => 'tab_data']):'') !!}
                                </td>
                                <td>
                                    {!! $children->trashed()?'<del>':'' !!}
                                    {!! link_to_route(SHOW_ROUTE,$children->name,['id'=>$children->id,'tab' => 'tab_data']) !!}
                                    {!! $children->trashed()?'</del>':'' !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! Form::close()!!}
                </div>
            </div>

            @endif
                    <!--- description Field --->
            <div class="form-group {{$errors->first('description','has-error')}}">
                {!! Form::label('description', trans($VN.'description'),['class' =>'col-sm-2 control-label text-right']) !!}
                <div class="col-sm-10">
                    @if ($readonly)
                        <div class="textarea">
                            {!! ($model->description?$model->description:'<br/><br>') !!}
                        </div>
                    @else
                        {!! Form::textarea('description',$model->description, [
                            'class' => 'form-control input-sm',
                            'placeholder' => trans($VN.'description'),
                            'style' => 'width:100%;']) !!}
                        {!! $errors->first('description', '<p class="help-block error-msg">:message</p>') !!}
                    @endif
                </div>
            </div>
            @include('partials.crud.timestamps',['model'=>$model])
    </div>
</div>
