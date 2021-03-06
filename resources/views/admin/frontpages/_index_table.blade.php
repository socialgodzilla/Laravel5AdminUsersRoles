<?php

// -----------------
// View Name Prefix
// -----------------
$VN = 'views/admin/frontpages/_index_table.';
?>


{!! Form::model($filter,['route' => FILTER_ROUTE,
                         'class'=>'form-inline',
                         'role'=>'form']) !!}

@include ('partials.crud.index_buttons')

<table class="table table-striped table-bordered table-compact table-hover table-responsive">
    <col style="width:6em;"> {{-- Buttons --}}
    <col style="width:4em;"> {{-- ID --}}
    <col style="width:6em;"> {{-- code --}}
    <col style="width:4em;"> {{-- edition--}}
    <col> {{-- status --}}
    <col style="width:4em;"> {{-- total_pages --}}
    <col> {{-- title --}}
    <col> {{-- reason_for_revision --}}
    <col style="width:3em;"> {{-- author --}}
    <col style="width:4em;"> {{-- creation_date --}}
    <col style="width:3em;"> {{-- reviewer --}}
    <col style="width:4em;"> {{-- review_date --}}
    <col style="width:3em;"> {{-- approver --}}
    <col style="width:4em;"> {{-- approval_date --}}
    <col style="width:3em;"> {{-- publisher --}}
    <col style="width:4em;"> {{-- publishing_date --}}
    <col> {{-- description --}}
    <thead>
    <th>
        {!! link_to_route(SORT_ROUTE,trans($VN.'reset'),[],
                    ['class' => 'btn-sm btn-primary']) !!}

    </th>
    <th class="text-right">
        {!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'id',trans($VN.'id'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'code',trans($VN.'code'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'edition',trans($VN.'edition'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'status',trans($VN.'status'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'total_pages',trans($VN.'total_pages'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'title',trans($VN.'title'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'reason_for_revision',trans($VN.'reason_for_revision'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'author_id',trans($VN.'author'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'creation_date',trans($VN.'creation_date'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'reviewer_id',trans($VN.'reviewer'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'review_date',trans($VN.'review_date'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'approver_id',trans($VN.'approver'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'approval_date',trans($VN.'approval_date'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'publisher_id',trans($VN.'publisher'))!!}</th>
    <th>{!!App\Traits\SortableTrait::link_to_sorting(SORT_ROUTE,VIEW_NAME,'publishing_date',trans($VN.'publishing_date'))!!}</th>
    <th>{{trans($VN.'description')}}</th>
    </thead>
    <tbody>
    <tr>
        <td>
            {!! Form::submit(trans($VN.'filter'),['class'=>"btn-sm btn-primary"]) !!}
        </td>
        <td>
            <!--- filter id Field --->
            {!! Form::text('id', null, ['class' => 'form-control input-sm',
                                                   'style' => 'width:100%;',
                                                   'placeholder'=>trans($VN.'id')]) !!}
        </td>
        <td>
            <!--- code Field --->
            {!! Form::text('code', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'code')]) !!}
        </td>
        <td>
            <!--- edition Field --->
            {!! Form::text('edition', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'edition')]) !!}
        </td>
        <td>
            <!--- status Field --->
            {!! Form::select('status',App\Library\Status::getFrontPageStatus(), null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'onchange'=> 'this.form.submit()',
                                                     'placeholder'=>trans($VN.'status')]) !!}
        </td>
        <td>
            <!--- total_pages Field --->
            {!! Form::text('total_pages', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'total_pages')]) !!}
        </td>
        <td>
            <!--- title Field --->
            {!! Form::text('title', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'title')]) !!}
        </td>
        <td>
            <!--- reason_for_revision Field --->
            {!! Form::text('reason_for_revision', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'reason_for_revision')]) !!}
        </td>
        <td>
            <!--- author Field --->
            {!! Form::text('author', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'author')]) !!}
        </td>
        <td>
            <!--- creation_date Field --->
            {!! Form::text('creation_date', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'creation_date')]) !!}
        </td>
        <td>
            <!--- reviewer Field --->
            {!! Form::text('reviewer', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'reviewer')]) !!}
        </td>
        <td>
            <!--- review_date Field --->
            {!! Form::text('review_date', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'review_date')]) !!}
        </td>
        <td>
            <!--- approver Field --->
            {!! Form::text('approver', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'approver')]) !!}
        </td>
        <td>
            <!--- approval_date Field --->
            {!! Form::text('approval_date', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'approval_date')]) !!}
        </td>
        <td>
            <!--- publisher Field --->
            {!! Form::text('publisher', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'publisher')]) !!}
        </td>
        <td>
            <!--- publishing_date Field --->
            {!! Form::text('approval_date', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                     'placeholder'=>trans($VN.'publishing_date')]) !!}
        </td>
        <td>
            <!--- filter description Field --->
            {!! Form::text('description', null, ['class' => 'form-control input-sm',
                                                     'style' => 'width:100%;',
                                                         'placeholder'=>trans($VN.'description')]) !!}
        </td>
    </tr>

    @foreach($models as $model)
        <tr>
            <td>
                {!! link_to_route(SHOW_ROUTE,($model->trashed()?trans($VN.'trash'):trans($VN.'show')),['id'=>$model->id],
                                  ['class' => 'btn-sm '.($model->trashed()?'btn-danger':'btn-primary')]) !!}
            </td>
            <td class="text-right">
                {!! link_to_route(SHOW_ROUTE,$model->id,['id'=>$model->id]) !!}
            </td>
            <td>
                {!! link_to_route(SHOW_ROUTE,$model->code,['id'=>$model->id]) !!}
            </td>
            <td class="text-right">
                {{$model->edition}}
            </td>
            <td>
                {{$model->status}}
            </td>
            <td class="text-right">
                {{$model->total_pages}}
            </td>
            <td>
                {!! link_to_route(SHOW_ROUTE,$model->title,['id'=>$model->id]) !!}
            </td>
            <td>
                {!! link_to_route(SHOW_ROUTE,$model->reason_for_revision,['id'=>$model->id]) !!}
            </td>
            <td>
                @if($model->author)
                    {{ $model->author->acronym }}
                @endif
            </td>
            <td>
                {{ $model->creation_date}}
            </td>
            <td>
                @if($model->reviewer)
                    {{ $model->reviewer->acronym }}
                @endif
            </td>
            <td>
                {{ $model->review_date}}
            </td>
            <td>
                @if($model->approver)
                    {{ $model->approver->acronym }}
                @endif
            </td>
            <td>
                {{ $model->approval_date}}
            </td>
            <td>
                @if($model->publisher)
                    {{ $model->publisher->acronym }}
                @endif
            </td>
            <td>
                {{ $model->publishing_date}}
            </td>
            <td>
                {{ $model->ShortDescription}}
            </td>

        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td class="text-right">
            <small>{{ trans($VN.'records',['total'=>$models->total()]) }}</small>
        </td>
        <td colspan="10">
            @if (App\Profile::OrderByLabel(VIEW_NAME) !='')
                <small>{{trans($VN.'order_by')}}: <strong>{{ App\Profile::OrderByLabel(VIEW_NAME) }}</strong>
                </small>
            @endif
            &nbsp;
            @if (App\Profile::FilterByLabel(VIEW_NAME) !='')
                <small>{{trans($VN.'filter_by')}}: <strong>{{ App\Profile::FilterByLabel(VIEW_NAME) }}</strong>
                </small>
            @endif

        </td>
    </tr>
    </tfoot>
</table>
@include ('partials.crud.index_buttons')
{!! Form::close() !!}
