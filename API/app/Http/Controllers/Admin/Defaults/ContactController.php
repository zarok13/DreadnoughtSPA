<?php


namespace App\Http\Controllers\Admin\Defaults;


use App\Http\Controllers\Admin\Dreadnought\Controller;
use App\MapCoordinate;
use App\Marker;
use App\Traits\DatabaseAction;
use App\Traits\Sort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ContactController extends Controller
{
    use DatabaseAction;
    use Sort {
        sort as ContactSort;
    }

    protected $moduleName = 'contact';
    protected $modelName = 'Marker';
    protected $defaultMarkerCoordinates;

    /**
     * ContactController constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->viewTemplate .= '.' . $this->moduleName;
        $this->data['moduleName'] = $this->moduleName;
        $this->data['title'] = trans('default.' . $this->moduleName);
        $this->defaultMarkerCoordinates = setting('defaultMarkerCoordinates');
        $this->data['defaultMarkerCoordinates'] = $this->defaultMarkerCoordinates;
        $this->data['templateTypes'] = array_index_to_value(setting('mapTypeList'));
    }

    /**
     * @param Marker $marker
     * @param $pageID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Marker $marker, $pageID)
    {
        perms($this->data['modules'], $this->moduleName, __FUNCTION__);

        $this->data['pageID'] = $pageID;
        $this->data['options'] = $this->getDefaultCoordinates($pageID);
        $this->data['markerList'] = $marker->getList($pageID);
        $this->data['modalTitle'] = 'Add';
        $templateType = MapCoordinate::select('template_type')->where('page_id', $pageID)->first();
        $this->data['selectedTemplateType'] = setting('mapTypeList')[$templateType->template_type];

        return view($this->viewTemplate . '.show', $this->data);
    }


    /**
     * @param Marker $marker
     * @param $pageID
     * @param null $markerID
     * @throws \Throwable
     */
    public function getMarkerForm(Marker $marker, $pageID, $markerID = null)
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

            echo json_encode([
                'status' => 'ok',
                'response' => view('admin.modules.contact._form', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * @param $pageID
     */
    public function saveDataCoordinates($pageID)
    {
        try {
            perms($this->data['modules'], $this->moduleName, __FUNCTION__,true);

            $this->saveMarkerCoordinates();
            $this->saveMapCoordinates($pageID);
            echo json_encode([
                'status' => 'ok',
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * @param $pageID
     * @throws \Exception
     */
    public function saveMapCoordinates($pageID)
    {
        MapCoordinate::where('page_id', $pageID)->delete();
        $mapCoordinate = new MapCoordinate();
        $mapCoordinate->lat = Input::post('lat');
        $mapCoordinate->lng = Input::post('lng');
        $mapCoordinate->zoom = Input::post('zoom');
        $mapCoordinate->template_type = array_search(Input::post('template_type'), setting('mapTypeList'));
        $mapCoordinate->page_id = $pageID;
        $mapCoordinate->save();
    }

    /**
     * @return bool
     */
    protected function saveMarkerCoordinates()
    {
        $coordinates = !empty(Input::post('coordinates')) ? Input::post('coordinates') : [];
        foreach ($coordinates as $id => $item) {
            Marker::where('id', $id)->update([
                'lat' => $item['lat'],
                'lng' => $item['lng'],
            ]);
        }
        return true;
    }

    /**
     * @param Request $request
     * @param Marker $marker
     * @param $pageID
     * @param null $markerID
     * @throws \Throwable
     */
    public function updateMarker(Request $request, Marker $marker, $pageID, $markerID = null)
    {
        try {
            perms($this->data['modules'], $this->moduleName, __FUNCTION__,true);

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

            echo json_encode([
                'status' => 'ok',
                'response' => view('admin.modules.contact.marker_list', $this->data)->render(),
                'response2' => view('admin.modules.contact.map_box', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }
    }


    /**
     * @param $markerID
     * @throws \Throwable
     */
    public function deleteMarker($markerID)
    {
        try {
            perms($this->data['modules'], $this->moduleName, __FUNCTION__,true);

            $marker = Marker::find($markerID);
            $this->data['pageID'] = $marker->page_id;
            Marker::destroy($markerID);
            $this->data['options'] = $this->getDefaultCoordinates($marker->page_id);
            $this->data['markerList'] = (new Marker())->getList($this->data['pageID']);

            echo json_encode([
                'status' => 'ok',
                'response' => view('admin.modules.contact.marker_list', $this->data)->render(),
                'response2' => view('admin.modules.contact.map_box', $this->data)->render(),
            ]);
        } catch (\Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * @param null $pageID
     * @return mixed
     * @throws \Exception
     */
    protected function getDefaultCoordinates($pageID = null)
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
     * @param Request $request
     */
    public function sort(Request $request)
    {
        $this->moduleName = 'markers';
        $this->ContactSort($request, 'id');
    }
}