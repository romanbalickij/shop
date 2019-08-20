<?php


namespace App\Repositories;


use App\Contracts\AttributeContract;
use App\Model\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AttributeRepository extends  BaseRepository implements AttributeContract
{

    public function __construct(Attribute $model)
    {
        parent::__construct($model);
        $this->model = $model ;
    }

    public function listAttributes($order = 'id', $sort = 'desc', $columns = ['*'])
    {
        return $this->all($columns, $order,$sort);
    }

    public function findAttributeId($id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    public function createAttribute($params)
    {
        $collection = collect($params);

        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;

        $merge = $collection->merge(compact('is_filterable', 'is_required'));

        $attribute = new Attribute($merge->all());

        $attribute->save();

        return $attribute;

    }

    public function updateAttribute($params, $id)
    {
        $attribute = $this->findAttributeId($id);

        $collection = collect($params)->except('_token');

        $is_filterable = $collection->has('is_filterable') ? 1 : 0;
        $is_required = $collection->has('is_required') ? 1 : 0;

        $merge = $collection->merge(compact('is_filterable', 'is_required'));

        $attribute->update($merge->all());

        return $attribute;
    }

    public function deleteAttribute( $id)
    {
        $attribute = $this->findAttributeId($id);

        $attribute->delete();

        return $attribute;
    }


}
