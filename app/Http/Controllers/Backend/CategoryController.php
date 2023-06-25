<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\TagRepository;
use App\Http\Requests\Backend\CategoryRequest;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $tagRepository;

    public function __construct(CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
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
        //
        return view('backend.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create', [
            'categories' => $this->categoryRepository->getAllCates(),
            'tags' => $this->tagRepository->getAllTags()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // dd(__METHOD__);
        try {
            DB::beginTransaction();

            $category = $this->categoryRepository->save($request->only([
                'name',
                'parent_id',
                'slug',
                'meta_title',
                'meta_keyword',
                'meta_description',
            ]));

            $category->tags()->sync($request->tag_ids);

            DB::commit();

            return redirect()->route('admin.category.index')->with('flash_success', 'Thêm mới thành công');
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
    public function show($id)
    {
        $category = $this->categoryRepository->findById($id);
        return view('backend.categories.show', [
           'categories' => $category,
           'tags' => $this->tagRepository->getAllTags(),
           'currentTagIds' => $category->tags->pluck('id')->toArray(),
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
        $category = $this->categoryRepository->findById($id);

        return view('backend.categories.edit', [
            'getcategories' => $this->categoryRepository->getAllCates(),
            'categories' => $category,
            'tags' => $this->tagRepository->getAll(),
            'currentTagIds' => $category->tags->pluck('id')->toArray(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $category = $this->categoryRepository->save([
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'slug' => $request->input('slug'),
                'meta_title' => $request->input('meta_title'),
                'meta_keyword' => $request->input('meta_keyword'),
                'meta_description' => $request->input('meta_description'),                
            ], $id);

            $category->tags()->sync($request->tag_ids);

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
        $this->categoryRepository->deleteByid($id);
        return redirect()->back()->with('flash_success', 'Xóa thành công');
    }
}
