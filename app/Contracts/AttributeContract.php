<?php


namespace App\Contracts;


interface AttributeContract
{
    public function listAttributes( $order = 'id', $sort = 'desc', $columns = ['*']);

    public function findAttributeId($id);

    public function createAttribute($params);

    public function updateAttribute($params, $id);

    public function deleteAttribute($id);



}
