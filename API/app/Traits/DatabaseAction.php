<?php

namespace App\Traits;

trait DatabaseAction
{
    ////////////////// ADD ///////////////////

    /**
     * @param $modelName
     * @param array $request
     * @param $emptyFieldList
     * @param string $titleField
     * @return null
     */
    public function addForAllLanguages($modelName, array $request, $emptyFieldList, $titleField = 'title')
    {
        $langID = $this->addForCurrentLanguage($modelName, $request);
        $this->addFormOtherLanguages($modelName, $langID, $request, $emptyFieldList, $titleField);
        return $langID;
    }

    /**
     * @param $modelName
     * @param $request
     * @return null
     */
    protected function addForCurrentLanguage($modelName, $request, $cloneLang = null)
    {
        if (!empty($cloneLang)) {
            $currentLang = $cloneLang;
        } else {
            $currentLang = $this->lang;
        }
        $model = MODELS_PATH . ucfirst($modelName);
        foreach ($this->langList as $key => $value) {
            if ($currentLang == $key) {
                $data = $request;
                $data['lang'] = $key;
                $item = $model::create($data);
                
                if (empty($cloneLang)) {
                    $item->update(['lang_id' => $item->id]);
                }
                return $item;
            }
        }
        return null;
    }

    /**
     * @param $modelName
     * @param $itemID
     * @param array $request
     * @param $emptyFieldList
     * @param $titleField
     */
    protected function addFormOtherLanguages($modelName, $itemID, array $request, $emptyFieldList, $titleField)
    {
        $model = MODELS_PATH . ucfirst($modelName);
        foreach ($this->langList as $key => $value) {
            if ($this->lang != $key) {
                $data = $this->removeFields($request, $emptyFieldList);
                if ($titleField != false) {
                    $data[$titleField] = $key . '_' . $request[$titleField];
                }
                $data['lang'] = $key;
                $data['lang_id'] = $itemID;
                $model::insert($data);
            }
        }
    }

    /**
     * @param array $request
     * @param array $emptyFieldList
     * @return array
     */
    private function removeFields(array $request, array $emptyFieldList)
    {
        foreach ($emptyFieldList as $field) {
            if (isset($request[$field])) {
                unset($request[$field]);
            }
        }
        return $request;
    }

    /////////////////// UPDATE //////////////////////
    /**
     * @param $modelName
     * @param $langID
     * @param $request
     * @param array $updateFields
     */
    public function updateInAllLanguage($modelName, $langID, $request, $updateFields = [])
    {
        $this->updateMainLang($modelName, $langID, $request);
        $this->updateSecondLanguageItems($modelName, $langID, $request, $updateFields);
    }

    /**
     * @param $modelName
     * @param $langID
     * @param $request
     */
    protected function updateMainLang($modelName, $langID, $request)
    {

        $model = MODELS_PATH . ucfirst($modelName);
        $model::where('lang_id', $langID)
            ->where('lang', $this->lang)
            ->update($request);
    }

    /**
     * @param $modelName
     * @param $langID
     * @param $request
     * @param $updateFields
     */
    protected function updateSecondLanguageItems($modelName, $langID, $request, $updateFields)
    {
        $model = MODELS_PATH . ucfirst($modelName);
        $data = $this->addFields($request, $updateFields);
        if (count($data) >= 1) {
            $model::where('lang_id', $langID)
                ->update($data);
        }
    }

    /**
     * @param array $request
     * @param array $emptyFieldList
     * @return array
     */
    protected function addFields(array $request, array $emptyFieldList)
    {
        $newFields = [];
        foreach ($emptyFieldList as $field) {
            if (isset($request[$field]) || (isset($request[$field]) && is_null($request[$field]))) {
                $newFields[$field] = $request[$field];
            }
        }
        return $newFields;
    }
}
