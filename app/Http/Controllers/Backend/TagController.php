<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\TagRepository;
use App\Http\Requests\Backend\TagRequest;

class TagController extends Controller
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tags.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd(__METHOD__);
        return view('backend.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        // $inputs = $request->validated();
        $this->tagRepository->save($request->only('name'));
        return redirect()->route('admin.tag.index')->with('flash_success', 'Thêm tag thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd(__METHOD__);
        return view('backend.tags.show', [
            'tags' => $this->tagRepository->findById($id)
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
        // dd(__METHOD__);
        return view('backend.tags.edit', [
            'tags' => $this->tagRepository->findById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        // dd(__METHOD__);
        // $inputs = $request->validated();
        $this->tagRepository->save($request->only('name'), ['id' => $id]);
        return redirect()->route('admin.tag.index')->with('flash_success', 'Cập nhật tag thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd(__METHOD__);
        $this->tagRepository->deleteByid($id);
        return redirect()->back()->with('flash_success', 'Xóa thành công');
    }
}
