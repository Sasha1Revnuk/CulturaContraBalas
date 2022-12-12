<?php

namespace App\Repositories;

use App\Services\TableService;
use App\Services\UniqueFieldService;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class __Repository
{
    public function __construct(TableService $tableService)
    {
        $this->tableService = $tableService;
    }

    public function getApi(Request $request) : array
    {
        $models = __::query();

        if ( $request->get( 'search' ) ) {
//            $search_field = [ '%' . mb_strtolower( $request->get( 'search' ) ) . '%' ];
//            $models = $models->where( function ( $q ) use ( $search_field ) {
//                $q->whereRaw( 'LOWER(title) like ?', $search_field )
//                    ->orWhereRaw( 'LOWER(url) like ?', $search_field );
//            } );
        }

        $modelsCount = $models->count();

        $models = $models->oldest('sort')->offset($request->get('start'))->limit($request->get('length'))->get();

        $data = [];

        foreach ($models as $model) {
            $dataArray = [
                $model->sort,
                $model->id,
                $this->tableService->sorting(),
            ];
            $buttons = [
                [
                    'type' => 1,
                    'title' => __('content/buttons.edit'),
                    'href' => route('admin.__.form', ['__' => $model]),
                ], [
                    'title' => __('content/buttons.delete'),
                    'id' => $model->id,
                    'class' => 'delete',
                    'data-attribute-name' => 'data-model',
                ]
            ];
            $dataArray[] = $this->tableService->getButtons($buttons);
            $data[] = $dataArray;
        }
        return [
            'data' => $data,
            'recordsTotal' => $modelsCount,
            'recordsFiltered' => $modelsCount,
        ];
    }

    public function store( __ $model, Collection $data, $withLog = true ) : __
    {
        $created = (bool)$model->id;
        $model = $this->processFields($model, $data, $created);
        if ( $withLog ) {
            ($created ? $model->actionUpdate() : $model->actionCreate());
        } else {
            $model->save();
        }

        return $model;
    }

    private function processFields(__ $model, Collection $data, bool $created)
    {
        foreach ( $data as $key => $item ) {
            switch ( $key ) {
                case 'url':
                    $model->$key = UniqueFieldService::generateUniqueUrl($model, 'title', $key, $item);
                    break;
                default:
                    $model->$key = $item;
                    break;
            }
        }
        return $model;
    }


    public function delete( __ $model )
    {
        $model->actionDelete();
    }



}
