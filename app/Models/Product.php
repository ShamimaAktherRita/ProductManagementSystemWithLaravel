<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $uploadedImage, $imageName, $imageDirectory, $imageUrl;
    //protected $fillable = ['category_id','brand_id','name','price','description','image','status'];


    public static function uploadImage($request,$product = null)
    {
        self::$uploadedImage          = $request->file('image');
        if(self::$uploadedImage)
        {
            if($product)
            {
                if (file_exists($product->image))
                {
                    unlink($product->image);
                }
            }
            self::$imageName = self::$uploadedImage->getClientOriginalName();
            self::$imageDirectory = 'admin/assets/images/uploaded-files/';
            self::$uploadedImage->move(self::$imageDirectory, self::$imageName);
            self::$imageUrl = self::$imageDirectory.self::$imageName;
        }else{
            if($product)
            {
                self:: $imageUrl = $product->image;
            }else{
                self::$imageUrl = null;
            }
        }
        return self::$imageUrl;
    }

    public static function createProduct($request)
    {
        self::$product                = new Product();
        self::$product->category_id   = $request->category_id;
        self::$product->brand_id      = $request->brand_id;
        self::$product->name          = $request->name;
        self::$product->price         = $request->price;
        self::$product->description   = $request->description;
        self::$product->image         = self::uploadImage($request);
        self::$product->status        = $request->status;
        self::$product->save();
    }

    public static function updateProduct($request, $id)
    {
        self::$product                = Product::find($id);
        self::$product->category_id   = $request->category_id;
        self::$product->brand_id      = $request->brand_id;
        self::$product->name          = $request->name;
        self::$product->price         = $request->price;
        self::$product->description   = $request->description;
        self::$product->image         = self::uploadImage($request, self::$product);
        self::$product->status        = $request->status;
        self::$product->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
