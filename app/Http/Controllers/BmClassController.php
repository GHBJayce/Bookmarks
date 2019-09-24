<?php

namespace App\Http\Controllers;

use App\Http\Requests\BmClassRequest;
use App\Models\BmClass;
use Illuminate\Support\Facades\Auth;

class BmClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param BmClass $bm_class
     * @return \Illuminate\Http\Response
     */
    public function index(BmClass $bm_class)
    {
        $uid = Auth::id();
        $data = $bm_class::where('uid', $uid)->paginate($this->per_page_num);

        return response()->json($this->returnData($data));
    }

    /**
     * 创建书签分类
     *
     * @param BmClassRequest $request
     * @param BmClass $bm_class
     * @return mixed
     */
    public function store(BmClassRequest $request, BmClass $bm_class)
    {
        $data = array_merge($request->all(), ['uid' => Auth::id()]);

        $response = $this->error('创建失败');
        if ($bm_class->create($data)) {
            $response = $this->success('创建成功');
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = BmClass::where('uid', Auth::id())->find($id);

        return response()->json($this->returnData($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @param BmClassRequest $request
     * @param BmClass $model_class
     * @return \Illuminate\Http\Response
     */
    public function update($id, BmClassRequest $request, BmClass $model_class)
    {
        $response = $this->error('更新失败');

        $data = $model_class->fill($request->all())->toArray();

        if (
            $model_class->where([
                'uid' => Auth::id(),
                $model_class->getKeyName() => $id,
            ])->update($data)
        ) {
            $response = $this->success('更新成功');
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = $this->error('删除失败');

        if (BmClass::destroy($id)) {
            $response = $this->success('删除成功');
        }

        return response()->json($response);
    }
}
