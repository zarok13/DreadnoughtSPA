<?php


namespace App\Http\Controllers\API;


use App\Mail\Contact;
use App\Mail\Message;
use App\Models\MapCoordinate;
use App\Models\Marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function mapbox()
    {
        $contactID = hel_field('contact_id');
        $mapCoordinates = MapCoordinate::select('lat', 'lng', 'zoom')->where('page_id', $contactID)->first();
        $markers = Marker::select('lat', 'lng')->lang()->where('page_id', $contactID)->get();
        $mapboxData['mapCoordinates'] = $mapCoordinates;
        $mapboxData['markers'] = $markers;
        return response()->json($mapboxData);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        try {
            if ($this->sendMessageMail($request->all())) {
                return response()->json([
                    'status' => true,
                    'message' => 'Message successfully sent',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Message not sent',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContact(Request $request)
    {
        try {
            if ($this->sendContactMail($request->all())) {
                return response()->json([
                    'status' => true,
                    'message' => 'Contact message successfully sent',
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Contact message not sent',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param $request
     * @return bool
     */
    protected function sendMessageMail($request)
    {
        Mail::to(hel_field('email'))
            ->send(new Message($request));
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }

    /**
     * @param $request
     * @return bool
     */
    protected function sendContactMail($request)
    {
        Mail::to(hel_field('email'))
            ->send(new Contact($request));
        if (count(Mail::failures()) > 0) {
            return false;
        }
        return true;
    }
}