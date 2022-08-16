<?php

namespace App\Http\Controllers;

use App\Components\Recursive;
use App\Components\brandDisplay;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $brand;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;

    public function __construct(Category $category, Brand $brand, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag){
        $this->category = $category;
        $this->brand = $brand;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }
    

    public function index() {
        $products = $this->product->latest()->paginate(5);
        return view('admin.product.index', compact('products'));
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = ' ');
        $htmlBrand = $this->getBrand($brandId = ' ');
        return view('admin.product.create', compact('htmlOption', 'htmlBrand'));
    }


    public function getCategory($parentId) {
        $data = $this->category->all;
        $recursive = new Recursive($data);
        $htmlOption = $recursive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function getBrand($brandId) {
        $brandDisplay = new brandDisplay();
        $htmlBrand = $brandDisplay->brandDisplay($brandId);
        return $htmlBrand;
    }

    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $dataProductCreated =  [
                'name' => $request->name,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'content' => $request->contents,
                'employee_id' => auth()->id(),
            ];

            $featuredImageUpload = $this->storageTraitUpload($request, 'featured_image_path', 'product');
            if (!empty($featuredImageUpload)) {
                $dataProductCreated['featured_image_path'] = $featuredImageUpload['file_path'];
                $dataProductCreated['featured_image_name'] = $featuredImageUpload['file_name'];
            }

            $product = $this->product->create($dataProductCreated);

            // Insert data to product_images
            if($request->hasFile('image_path')) {
                foreach($request->image_path as $imageItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMulti($imageItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name'],
                    ]);

                }
            }

            //Insert tags for product
            if(!empty($request->tags)) {
                foreach($request->tags as $tagItem) {
                    //Tag Insert
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            
            $product->tags()->attach($tagIds);
            DB::commit();
            return redirect()->route('products.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error(message: 'Message: ' . $exception->getMessage() . ' ----- Line: ' . $exception->getLine());
        }

        
    }

    public function edit($id) {

        $product = $this->product->find($id);
        $htmlOption = $this->getCategory($product->category_id);
        $htmlBrand = $this->getBrand($product->brand_id);

        return view('admin.product.edit', compact('product', 'htmlOption', 'htmlBrand'));
    }




}
