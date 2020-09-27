<?php


namespace App\Http\Controllers\Admin\Defaults;


use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\MapCoordinate;
use App\Marker;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    use DatabaseAction;
    use Sort {
        sort as ContactSort;
    }

    protected $modelName = 'Marker';
    protected $defaultMarkerCoordinates;

    /**
     * ContactController __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'contact';
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->defaultMarkerCoordinates = setting('defaultMarkerCoordinates');
        $this->data['defaultMarkerCoordinates'] = $this->defaultMarkerCoordinates;
        $this->data['templateTypes'] = array_index_to_value(setting('mapTypeList'));
    }

    /**
     * @param \App\Marker $marker
     * @param int $pageID
     *
     * @return \Illuminate\View\View
     */
    public function index(Marker $marker, int $pageID): View
    {
        $this->data['pageID'] = $pageID;
        $this->data['options'] = $this->getDefaultCoordinates($pageID);
        $this->data['markerList'] = $marker->getList($pageID);
        $this->data['modalTitle'] = 'Add';
        $templateType = MapCoordinate::select('template_type')->where('page_id', $pageID)->first();
        $this->data['selectedTemplateType'] = setting('mapTypeList')[$templateType->template_type];

        return view($this->viewTemplate . '.show', $this->data);
    }

    /**
     * @param \App\Marker $marker
     * @param int $pageID
     * @param int $markerID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMarkerForm(Marker $marker, int $pageID, int $markerID = null): JsonResponse
    {
        try {
            $this->data['modalTitle'] = 'Add';
            if (!empty($markerID)) {
                $this->data['modalTitle'] = 'Edit';
                $this->data['item'] = Marker::find($markerID);
            }
            $this->data['pageID'] = $pageID;
            $this->data['options'] = $this->getDefaultCoordinates($pageID);
            $this->data['markerList'] = $marker->getList($pageID);

            return response()->json([
                'status' => 'ok',
                'response' => view('admin.modules.contact._form', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $pageID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function saveDataCoordinates(Request $request, int $pageID): JsonResponse
    {
        try {
            $this->saveMarkerCoordinates($request);
            $this->saveMapCoordinates($request, $pageID);
            return response()->json([
                'status' => 'ok',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int $pageID
     *
     * @return void
     */
    public function saveMapCoordinates(Request $request, int $pageID): void
    {
        MapCoordinate::where('page_id', $pageID)->delete();
        $mapCoordinate = new MapCoordinate();
        $mapCoordinate->lat = $request->lat;
        $mapCoordinate->lng = $request->lng;
        $mapCoordinate->zoom = $request->zoom;
        $mapCoordinate->template_type = array_search($request->template_type, setting('mapTypeList'));
        $mapCoordinate->page_id = $pageID;
        $mapCoordinate->save();
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return bool
     */
    protected function saveMarkerCoordinates(Request $request): bool
    {
        $coordinates = !empty($request->coordinates) ? $request->coordinates : [];
        foreach ($coordinates as $id => $item) {
            Marker::where('id', $id)->update([
                'lat' => $item['lat'],
                'lng' => $item['lng'],
            ]);
        }
        return true;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Marker $marker
     * @param int $pageID
     * @param int $markerID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateMarker(Request $request, Marker $marker, int $pageID, int $markerID = null): JsonResponse
    {
        try {
            $this->moduleName = 'markers';
            $this->data['pageID'] = $pageID;
            $filteredRequest = $request->all();
            if (!empty($markerID)) {
                $marker = $marker->find($markerID);
                $this->updateInAllLanguage($this->modelName, $marker->lang_id, $filteredRequest, ['title']);
            } else {
                $filteredRequest['lat'] = $this->defaultMarkerCoordinates['defaultLat'];
                $filteredRequest['lng'] = $this->defaultMarkerCoordinates['defaultLng'];
                $filteredRequest['page_id'] = $pageID;
                $filteredRequest['sort'] = $this->getMaxSort('page_id=' . $pageID, false);
                $this->addInAllLanguage($this->modelName, $filteredRequest, ['desc'], $titleField = 'title');
            }
            $this->data['markerList'] = $marker->getList($pageID);
            $this->data['options'] = $this->getDefaultCoordinates($pageID);
            cacheClear();

            return response()->json([
                'status' => 'ok',
                'response' => view('admin.modules.contact.marker_list', $this->data)->render(),
                'response2' => view('admin.modules.contact.map_box', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param int $markerID
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteMarker(int $markerID): JsonResponse
    {
        try {
            $marker = Marker::find($markerID);
            $this->data['pageID'] = $marker->page_id;
            Marker::destroy($markerID);
            $this->data['options'] = $this->getDefaultCoordinates($marker->page_id);
            $this->data['markerList'] = (new Marker())->getList($this->data['pageID']);

            return response()->json([
                'status' => 'ok',
                'response' => view('admin.modules.contact.marker_list', $this->data)->render(),
                'response2' => view('admin.modules.contact.map_box', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param int $pageID
     *
     * @return array
     */
    protected function getDefaultCoordinates(int $pageID = null): array
    {
        $coordinates = MapCoordinate::where('page_id', $pageID)->first();
        if (!empty($coordinates)) {
            $default['lat'] = $coordinates->lat;
            $default['lng'] = $coordinates->lng;
            $default['zoom'] = $coordinates->zoom;
            $default['templateType'] = setting('mapTypeList')[$coordinates->template_type];
        } else {
            $default['lat'] = $this->defaultMarkerCoordinates['defaultLat'];
            $default['lng'] = $this->defaultMarkerCoordinates['defaultLng'];
            $default['zoom'] = $this->defaultMarkerCoordinates['defaultZoom'];
            $default['templateType'] = $this->defaultMarkerCoordinates['templateType'];
        }
        return $default;
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function sort(Request $request)
    {
        $this->moduleName = 'markers';
        $this->ContactSort($request, 'id');
    }
}
