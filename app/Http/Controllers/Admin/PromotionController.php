<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    const PATH_VIEW = 'admin.promotions.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Promotion::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required', 'after:start_date'],
        ]);

        $data = $request->all();
        $data['is_active'] ??= 0;

        Promotion::query()->create($data);

        return redirect()->route('admin.promotions.index')->with('message', 'Thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Promotion $promotion)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('promotion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promotion $promotion)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required', 'after:start_date'],
        ]);

        $data = $request->all();

        $data['is_active'] ??= 0;

        // Kiểm tra và cập nhật giá trị cho discount_percentage và discount_amount
        $discountPercentage = $request->input('discount_percentage');
        $discountAmount = $request->input('discount_amount');

        if ($discountPercentage) {
            $data['discount_percentage'] = $discountPercentage;
            $data['discount_amount'] = null; // Đặt giá trị của discount_amount thành null
        } else {
            $data['discount_amount'] = $discountAmount;
            $data['discount_percentage'] = null; // Đặt giá trị của discount_percentage thành null
        }

        $promotion->update($data);
        return redirect()->route('admin.promotions.index')->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promotion $promotion)
    {
        $promotion->delete();
        return back()->with('message', 'Xóa thành công');
    }
}
