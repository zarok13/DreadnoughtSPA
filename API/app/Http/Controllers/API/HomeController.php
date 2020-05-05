<?php

namespace App\Http\Controllers\API;



use App\Slider;

class HomeController extends Controller
{

    protected $validationArray = [
    ];

    /**
     * @param Slider $slider
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSlider(Slider $slider)
    {
        try {
            $slider = $slider->lang()->get();
            return response()->json([
                'status' => true,
                'data' => $slider,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}