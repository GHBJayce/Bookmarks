<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookMarksRequest;
use App\Models\Bookmarks;
use Illuminate\Support\Facades\Auth;

class BookMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $data = Bookmarks::where('uid', Auth::id())->paginate($this->per_page_num);

        return response()->json($this->returnData($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BookMarksRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(BookMarksRequest $request)
    {
        $data = array_merge($request->only($request->acceptFields()), ['uid' => Auth::id()]);

        $response = $this->error('创建书签失败');
        if (Bookmarks::create($data)) {
            $response = $this->success('创建书签成功');
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $data = Bookmarks::where('uid', Auth::id())->find($id);

        return response()->json($this->returnData($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookMarksRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, BookMarksRequest $request)
    {
        $response = $this->error('更新书签失败');
        if (
            Bookmarks::where([
                'uid' => Auth::id(),
                (new Bookmarks())->getKeyName() => $id,
            ])->update($request->only($request->acceptFields()))
        ) {
            $response = $this->success('更新书签成功');
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $bookmark = Bookmarks::where('uid', Auth::id())->find($id);

        $response = $this->error('删除书签失败');
        if ($bookmark->delete()) {
            $response = $this->success('删除书签成功');
        }

        return response()->json($response);
    }

    /**
     * 书签访问量+1
     *
     * @param $id
     * @return bool
     */
    protected function accessBookmarks($id)
    {
        $result = false;

        $bookmark = Bookmarks::find($id);
        $bookmark->last_access_time = time();

        if ($bookmark->save() && $bookmark->increment('access_num')) {
            $result = $bookmark->url;
        }

        return $result;
    }

    /**
     * 跳转网页代理 访问量+1
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function access($id/*, Request $request*/)
    {
        /*
        $validator = Validator::make($request->all(), [
            'target' => 'required|url',
        ]);

        if ($validator->fails()) {
            return response()->json($this->error($validator->errors()->first(), $validator->errors()));
        }
        */

        if ($target = $this->accessBookmarks($id)) {
            header("Location:{$target}");
        } else {
            return response()->json($this->error('操作失败'));
        }
    }
}
