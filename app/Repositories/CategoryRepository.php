<?php


namespace App\Repositories;


use App\Contracts\CategoryContract;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Model\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryRepository extends BaseRepository  implements CategoryContract
{

  public function __construct( Category $model)
  {
      parent::__construct($model);
      $this->model = $model;
  }

  public function listCategories($order = 'id', $sort = 'desc', $columns = ['*'])
  {
      return $this->all($columns, $order, $sort);
  }

  public function findCategoryBuId($id)
  {
      try {
          return $this->findOneOrFail($id);

      } catch (ModelNotFoundException $e) {

          throw new ModelNotFoundException($e);
      }
  }

  public function createCategory($params)
  {
        $this->create($params);
  }

  public function updateCategory($params)
  {
      $category =   $this->findCategoryBuId($params['id']);
      $category->update($params);
      return $category;

  }

  public function deleteCategory($id)
  {
      $this->delete($id);
  }
}
