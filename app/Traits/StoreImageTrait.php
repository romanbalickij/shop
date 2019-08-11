<?php


namespace App\Traits;


use App\Model\ProductImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait StoreImageTrait
{

    public function getImage($id, $column = 'full' ) {
        $image = ProductImage::where('product_id', $id)->first();
        if($image !=null) {
            return  '/shop/img/product-img/'.$image[$column];
        }

    }

    public function uploadOne(UploadedFile $file, $folder = null, $disk = 'public', $filename = null)
        {
            $name = !is_null($filename) ? $filename : str_random(25);

            return $file->storeAs(
                $folder,
                $name . "." . $file->getClientOriginalExtension(),
                $disk
            );
        }

        public function deleteOne($path = null, $disk = 'public')
        {
            Storage::disk($disk)->delete($path);
        }


}
