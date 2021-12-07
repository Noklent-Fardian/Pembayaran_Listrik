<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function packCrud($modelName = '', $folder = 'admin', $subFolder = '', $name = 'admin', $route = '', $include = false, $includeFiles = [])
    {
        $title = $this->titleCRUD($modelName);
        $files = $this->filesCRUD($folder, $subFolder, $include, $includeFiles);
        $route = $this->routesCRUD($name, $route);
        return array_merge(
            $title, $files, $route
        );
    }

    /**
     * get or set title crud
     * 
     * @param string $modelName classname or Class Name
     * 
     * @return array
     */
    public function titleCRUD($modelName)
    {
        return [
            'title' => [
                'index' => $modelName,
                'create' => 'Create '.$modelName,
                'edit' => 'Edit '.$modelName,
                'show' => 'Show '.$modelName,
            ],
        ];
    }

    /**
     * get or set file crud
     * 
     * @param string $folder for the first folder name
     * @param string $subFolder for the sub folder
     * @param bool $include if include file statement
     * @param array $includeFiles for files will include
     * 
     * @return array
     */
    public function filesCRUD(string $folder = 'admin', string $subFolder = 'base', $include = false, $includeFiles = [])
    {
        $arr = [
            'files' => [
                'index' => $folder. '.' .$subFolder. '.index',
                'show' => $folder. '.' .$subFolder. '.show',
                'create' => $folder. '.' .$subFolder. '.create',
                'edit' => $folder. '.' .$subFolder. '.edit',
                'fields' => $folder. '.' .$subFolder. '.__fields'
            ],
        ];
        if($include) {
            $folderInclude = $includeFiles['folder'];
            if($includeFiles['indexFilter'] != null) {
                $indexFilter = ['indexFilter' => $folder.'.'.$folderInclude.'.'.$includeFiles['indexFilter']];
                $arr = array_merge($arr, $indexFilter);
            }
            if($includeFiles['indexTable'] != null) {
                $indexTable =  ['indexTable' => $folder.'.'.$folderInclude.'.'.$includeFiles['indexTable']];
                $arr = array_merge($arr, $indexTable);
            }
            if($includeFiles['fields'] != null) {
                $fields =  ['fieldsInclude' => $folder.'.'.$folderInclude.'.'.$includeFiles['fields']];
                $arr = array_merge($arr, $fields);
            }
            if($includeFiles['show'] != null) {
                $showInclude =  ['showInclude' => $folder.'.'.$folderInclude.'.'.$includeFiles['show']];
                $arr = array_merge($arr, $showInclude);
            }
        }
        return $arr;
    }

    /**
     * get or set route crud
     * 
     * @param string $name for route name
     * @param string $route for route or model name [model-name]
     * 
     * @return array
     */
    public function routesCRUD(string $name = 'admin', string $route = '')
    {
        return [
            'route' => [
                'index' => $name. '.' .$route. '.index',
                'show' => $name. '.' .$route. '.show',
                'create' => $name. '.' .$route. '.create',
                'store' => $name. '.' .$route. '.store',
                'edit' => $name. '.' .$route. '.edit',
                'update' => $name. '.' .$route. '.update',
                'destroy' => $name. '.' .$route. '.destroy',
            ],
        ];
    }

    /**
     * get or set message redirect status crud
     * 
     * @param bool $success for status reponse
     * @param string $action for action type [create, update, delete, other]
     * @param string $message for message to display
     * @param string $exceptionMessage for exception Message
     * 
     * @return array 
     */
    public function messageRedirectCRUD(bool $success = true, string $action = 'create', string $message = null, string $exceptionMessage = null,) 
    {
        if ($success){
            if($message == null) {
                if ($action == 'create') {
                    $message = 'Success insert new data.';
                } else if ($action == 'update') {
                    $message = 'Success edit data.';
                } else if ($action == 'delete') {
                    $message = 'Success delete data.';
                } else {
                    $message = 'Success '.$message;
                }
            } else {
                $message = 'Success '.$message;
            }
            return [
                'success' => true,
                'message' => $message
            ];
        } else {
            if($message == null) {
                if ($action == 'create') {
                    $message = 'Failed insert new data.';
                } else if ($action == 'update') {
                    $message = 'Failed edit data.';
                } else if ($action == 'delete') {
                    $message = 'Failed delete data.';
                } else {
                    $message = 'Failed '.$message;
                }
            } else {
                $message = 'Failed '.$message;
            }
            if($exceptionMessage != null) {
                $message = $message.' '.$exceptionMessage;
            }
            return [
                'success' => false,
                'message' => $message
            ];
        }
    }
}
