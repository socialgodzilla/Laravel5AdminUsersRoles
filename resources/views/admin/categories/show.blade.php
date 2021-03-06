<?php

// -----------------
// View Name Prefix
// -----------------
$VN = 'views/admin/categories/show.';

const VIEW_NAME    = 'admin.categories.show';
?>

@include('admin.categories._routes')

@extends ('app')

@section('headings')
    <h1>{{trans($VN.'title')}}: {{ $model->name }}</h1>
@endsection

@section('breadcrumbs')
    {!! Breadcrumbs::render(VIEW_NAME) !!}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
             @include('partials.crud.show_buttons')

                <div role="tabpanel">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" {!! Input::get('tab','tab_data')=='tab_data'?'class="active"':''!!}>
                                <a href="#tab_data" aria-controls="tab_data" role="tab"
                                   data-toggle="tab">{{trans($VN.'tab_data')}}</a></li>
                        <li role="presentation" {!! Input::get('tab','tab_data')=='tab_description'?'class="active"':''!!}>
                            <a href="#tab_description" aria-controls="tab_description" role="tab"
                                   data-toggle="tab">{{trans($VN.'tab_description')}}</a></li>
                        <li role="presentation" {!! Input::get('tab','tab_data')=='tab_relations'?'class="active"':''!!}>
                            <a href="#tab_relations" aria-controls="tab_relations" role="tab"
                                   data-toggle="tab">{{trans($VN.'tab_relations')}}</a></li>
                        <li role="presentation" {!! Input::get('tab','tab_data')=='tab_frontpages'?'class="active"':''!!}>
                            <a href="#tab_frontpages" aria-controls="tab_frontpages" role="tab"
                                  data-toggle="tab">{{trans($VN.'tab_frontpages')}}</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane {!! Input::get('tab','tab_data')=='tab_data'?'active':''!!}" id="tab_data">
                            @include('admin.categories._form_data',['readonly' => true])
                        </div>
                        <div role="tabpanel" class="tab-pane {!! Input::get('tab','tab_data')=='tab_descripton'?'active':''!!}" id="tab_description">
                            @include('admin.categories._form_description',['readonly' => true])
                        </div>
                        <div role="tabpanel" class="tab-pane {!! Input::get('tab','tab_data')=='tab_relations'?'active':''!!}" id="tab_relations">
                            @include('admin.categories._form_relations',['readonly' => true])
                        </div>
                        <div role="tabpanel" class="tab-pane {!! Input::get('tab','tab_data')=='tab_frontpages'?'active':''!!}" id="tab_frontpages">
                            @include('admin.categories._form_frontpages',['readonly' => true])
                        </div>
                    </div>
                </div>

             @include('partials.crud.bottom_buttons')
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

