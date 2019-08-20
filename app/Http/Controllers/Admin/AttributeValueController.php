<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\AttributeContract;
use App\Http\Requests\Attribute\AttributeValueRequest;
use App\Model\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\Constraint\Attribute;

class AttributeValueController extends BaseController
{


    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setPageTitle('Attribute Values', 'List Attribute Values');
        $attributeValues = AttributeValue::all();
        return  view('admin.attributes_values.index', compact('attributeValues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setPageTitle('Attribute Values', 'Create Attribute Values');
        $attributes  = $this->attributeRepository->listAttributes();
        return view('admin.attributes_values.create', compact('attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeValueRequest $request)
    {
          $attributeValue =  AttributeValue::createAttributeValue($request->all());

        if(!$attributeValue){
            return  $this->responseRedirectBack('Error occurred while creating attribute Values.', 'error', true, true);
        }
          return  $this->responseRedirect('attribute-values.index','Attribute  Values added successfully' ,'success',false, false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attributeValue  = AttributeValue::findOrFail($id);
        $attributes      = $this->attributeRepository->listAttributes();
        $this->setPageTitle('Attribute Values', 'Edit Attribute Values');
        return  view('admin.attributes_values.edit', compact('attributeValue', 'attributes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeValueRequest $request, $id)
    {
        $attributeValue = AttributeValue::updateAttributeValue($request->all(), $id);

        if(!$attributeValue){
            return  $this->responseRedirectBack('Error occurred while update attribute Values.', 'error', true, true);
        }
        return  $this->responseRedirectBack('Attribute  Values update successfully' ,'success',false, false);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributeValue = AttributeValue::deleteAttributeValue($id);

        if (!$attributeValue) {
            return $this->responseRedirectBack('Error occurred while deleting attribute.', 'error', true, true);
        }
        return $this->responseRedirect('attribute-values.index', 'Attribute Value deleted successfully' ,'success',false, false);
    }
}
