<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cgy;
use App\Models\Item;
use Illuminate\Http\Request;
use Throwable;

class ItemController extends Controller
{

    //用於生成 JSON 字串
    private function makeJson($status, $data, $msg)
    {
        //轉 JSON 時確保中文不會變成 Unicode
        return response()->json(['status' => $status, 'data' => $data, 'message' => $msg])->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectAll(Item $item)
    {
        $cgy = Cgy::find($item->cgy_id);
        $items = $item->cgy()->associate($cgy);
        return $item;

    }
    public function index()
    {
        $items = Item::get();
        if (isset($items) && count($items) > 0) {
            $data = ['items' => $items];
            return $this->makeJson(1, $data, null);
        } else {
            return $this->makeJson(0, null, '找不到產品');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {;
        $input = $request->only(['title', 'pic', 'price', 'enabled', 'desc', 'enabled_at', 'cgy_id']);
        $item = Item::create($input);
        // dd($input);
        if (isset($item)) {
            $data = ['item_id' => $item->id];
            return $this->makeJson(1, $data, '新增產品成功');
        } else {
            return $this->makeJson(0, null, '新增產品失敗');
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
        $item = Item::find($id); //用主鍵來尋找資料

        if (isset($item)) {
            $data = ['item' => $item];
            return $this->makeJson(1, $data, null);
        } else {
            return $this->makeJson(0, null, '找不到該產品');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $item = Item::findOrFail($id);

            $input = $request->only(['title', 'pic', 'price', 'enabled', 'desc', 'enabled_at', 'cgy_id']);
            // return $input;
            if ($input['enabled'] == '1') {
                $input['enabled'] = true;
            } else {
                $input['enabled'] = false;
            }
            $item->update($input);
        } catch (Throwable $e) {
            //更新失敗
            return $this->makeJson(0, null, '更新產品失敗');
        }

        $data = ['item_id' => $item->id];
        return $this->makeJson(1, $data, '更新產品成功');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = Item::findOrFail($id);
            $item->delete();
        } catch (Throwable $e) {
            //刪除失敗
            return $this->makeJson(0, null, '刪除產品失敗');
        }
        return $this->makeJson(1, null, '刪除產品成功');

    }
}