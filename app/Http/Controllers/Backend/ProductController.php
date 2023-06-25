<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\Backend\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Products\Product;
use App\Helpers\UploadHelper;
use App\Helpers\UpdateHelper;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $tagRepository;

    public function __construct(
        ProductRepository $productRepository, 
        CategoryRepository $categoryRepository,
        TagRepository $tagRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.products.create', [
            'categories' => $this->categoryRepository->getAllCates(),
            'tags' => $this->tagRepository->getAllTags(), 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();

            $product = $this->productRepository->save($request->only([
                'name',
                'price',
                'category_id',
                'sale_price',
                'content',
                'sku',
                'description',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'is_feature',
                'barcode',
                'slug'
            ]));

            $product->tags()->sync($request->tag_ids);

            // Start upload Image
            $file = $request->file('image');
            try {
                UploadHelper::uploadImage($file, $product, Product::class);
            } catch (\InvalidArgumentException $e) {
                return redirect()->back()->with('flash_error', $e->getMessage());
            }
            // End upload Image

            DB::commit();

            return redirect()->route('admin.product.index')->with('flash_success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            report($e);
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = $this->productRepository->findById($id);
        return view('backend.products.show', [
        'product' => $product,
        'tags' => $this->tagRepository->getAllTags(),
        'currentTagIds' => $product->tags->pluck('id')->toArray(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findById($id);

        return view('backend.products.edit', [
            'categories' => $this->categoryRepository->getAllCates(),
            'tags' => $this->tagRepository->getAllTags(),
            'product' => $product,
            'currentTagIds' => $product->tags->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $product = $this->productRepository->save([
                'name' => $request->input('name'),
                'is_feature' => $request->has('is_feature') ? 1 : 0,
                'price' => $request->input('price'),
                'category_id' => $request->input('category_id'),
                'sale_price' => $request->input('sale_price'),
                'content' => $request->input('content'),
                'sku' => $request->input('sku'),
                'description' => $request->input('description'),
                'meta_title' => $request->input('meta_title'),
                'meta_keyword' => $request->input('meta_keyword'),
                'meta_description' => $request->input('meta_description'),
                'barcode' => $request->input('barcode'),
                'slug' => $request->input('slug')
            ], $id);

            $product->tags()->sync($request->tag_ids);

            // Start upload Image
                UpdateHelper::processAttachment($request, $product, Product::class);
            // End upload Image

            DB::commit();

            return redirect()->back()->with('flash_success', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $e) {
            report($e);
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->with('flash_error', 'Cập nhật sản phẩm thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->deleteByid($id);
        return redirect()->back();
    }

    // get list filter_category
    public function filter_category($categoryId)
    {
        $product  = $this->productRepository->getProductsByCategoryId($categoryId);
        
        return view('backend.products.filter_category', [
            'products' => $product,
            'categoryId' => $categoryId
        ]);
    }

    // list soft delete
    public function list_softDelete()
    {
        return view('backend.products.list_soft_delete', [
            'listsoftdeletes' => $this->productRepository->GetListSoftDelete()
        ]);
    }

    // force delete
    public function force_delete($id)
    {
        $this->productRepository->ForceDelete($id);
        return redirect()->route('admin.soft_delete');
    }

    // restore delete
    public function restore_delete($id)
    {
        $this->productRepository->RestoreDelete($id);
        return redirect()->route('admin.soft_delete');
    }
}
