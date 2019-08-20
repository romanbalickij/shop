<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    protected $table = 'attribute_values';

    protected $fillable = [
        'attribute_id', 'value', 'price'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'attribute_id'  =>  'integer',
    ];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class);
    }

    public function getAttributeName()
    {
        if($this->attribute != null) {
            return $this->attribute->name;
        }
           return 'The attribute is offset';
    }

    public  static  function createAttributeValue($param)
    {
        $attributeValue = new static();
        $attributeValue->fill($param);
        $attributeValue->save();
        return $attributeValue;
    }

    public static function updateAttributeValue($param, $id) {

        $attributeValue = AttributeValue::findOrFail($id);
        $attributeValue->update($param);
        return $attributeValue;
    }

    public static function deleteAttributeValue($id)
    {
        $attributeValue  = AttributeValue::findOrFail($id);
        $attributeValue->delete();
        return $attributeValue;
    }

}
