<?php


namespace App\Contracts;


interface CategoryContract
{
    public function listCategories( $order = 'id', $sort = 'desc', $columns = ['*']);

    public function findCategoryBuId( $id);

    public function createCategory ( $params);

    public function updateCategory( $params);

    public function deleteCategory($id);



}
