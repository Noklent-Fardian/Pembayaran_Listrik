<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class level extends Model
{
    use HasFactory;

    protected $table = 'level';

    // list of fields or coloumns in table
    public $fields = [
        'nama_level',
        // 'created_at',
        // 'updated_at',
        // 'created_by',
        // 'updated_by',
    ];

    /**
     * load all field ot coloumn in table, dant load image
     * 
     * @param $request for requested data from form
     * @param string $method for method we use
     * 
     * @return json
     */
    public function loadModel($request, $method = 'create')
    {
        if ($method == 'create') {
            foreach ($this->fields as $key_field) {
                foreach ($request as $key_request => $value) {
                    if ($key_field == $key_request) $this->setAttribute($key_field, $value);
                }
            }
            $this->setAttribute('created_by', Auth::user()->id);
        } else {
            foreach ($this->fields as $key_field) {
                foreach ($request as $key_request => $value) {
                    if ($key_field == $key_request) $this->setAttribute($key_field, $value);
                }
            }
            $this->setAttribute('updated_by', Auth::user()->id);
        }
    }

        /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_level';

    /**
     * for validation data
     * @param bool $hasUnique for is have unique field
     * @param string $method for method use use now
     * @param int $id for data unique except validation
     * 
     * @return array
     */
    public function validateData($hasUnique = false, $method = 'create', $id = null)
    {
        if ($hasUnique) {
            $arr = [
                // other validation
            ];
            if ($method == 'create') {
                $arr = array_merge($arr, [
                    // unique validation
                ]);
            } else {
                $arr = array_merge($arr, [
                    // unique validation
                ]);
            }
        } else {
            $arr = [
                'nama_level' => 'required|max:20',
            ];
        }
        return $arr;
    }

    /**
     * list of fields with label type and more
     * @return array
     */
    public function fieldsAttributes()
    {
        /**
         *  'column or field name' => [
         *      'label' => 'Column of Field Name',
         *       'autofocus' => false,
         *       'required' => true,
         *       'type' => '', input type + select
         *       'data' => null, data for select or checkboc type
         *       'subData' => null, data->key
         *       'isRelation' => false,
         *   '    isFunction' => false, for display image relaion or custom display
         *       'showInForm' => true,
         *       'showInDetail' => true,
         *       'useIcon' => false,
         *       'icon' => [
         *            [
         *               'text' => '',
         *               'bgColor' => '',
         *               'iconClass' => ''
         *           ],
         *       ],
         *       'helpText' => null,
         *   ],
         */
        return [
            'nama_level' => [
                'label' => '',
                'autofocus' => true,
                'required' => true,
                'type' => 'text',
                'data' => null,
                'subData' => null,
                'isRelation' => false,
                'isFunction' => false,
                'showInForm' => true,
                'showInDetail' => true,
                'useIcon' => false,
                'icon' => [
                    [
                        'text' => '',
                        'bgColor' => '',
                        'iconClass' => ''
                    ],
                ],
                'helpText' => null,
            ],
            'created_at' => [
                'label' => 'Created At',
                'autofocus' => false,
                'required' => false,
                'type' => '',
                'data' => null,
                'subData' => null,
                'isRelation' => false,
                'isFunction' => false,
                'showInForm' => false,
                'showInDetail' => true,
                'useIcon' => false,
                'icon' => [],
                'helpText' => null,
            ],
            'updated_at' => [
                'label' => 'Last Modified',
                'autofocus' => false,
                'required' => false,
                'type' => '',
                'data' => null,
                'subData' => null,
                'isRelation' => false,
                'isFunction' => false,
                'showInForm' => false,
                'showInDetail' => true,
                'useIcon' => false,
                'icon' => [],
                'helpText' => null,
            ],
            'created_by' => [
                'label' => 'Created By',
                'autofocus' => false,
                'required' => false,
                'type' => '',
                'data' => null,
                'subData' => null,
                'isRelation' => true,
                'isFunction' => false,
                'showInForm' => false,
                'showInDetail' => true,
                'useIcon' => false,
                'icon' => [],
                'helpText' => null,
            ],
            'updated_by' => [
                'label' => 'Last Modified By',
                'autofocus' => false,
                'required' => false,
                'type' => '',
                'data' => null,
                'subData' => null,
                'isRelation' => true,
                'isFunction' => false,
                'showInForm' => false,
                'showInDetail' => true,
                'useIcon' => false,
                'icon' => [],
                'helpText' => null,
            ],
        ];
    }

    /**
     * list of fields to displat in index
     * @return array
     */
    public function dataTable()
    {
        return [
            'nama_level' => 'Nama Level',
        ];
    }

    /**
     * get all data count
     * 
     * @return int
     */
    public static function getDataCount()
    {
        return level::all()->count();
    }

    /**
     * get data 
     * 
     * @param int $paginate for pagination each page
     * 
     * @return array json
     */
    public static function getData(int $paginate = 20)
    {
        return level::orderBy( 'desc')->paginate($paginate);
    }

    /**
     * search function
     * 
     * @param string $request for search value
     * @param string $col for column / field name
     * @param int $paginate for pagination each page
     * 
     * @return array
     */
    public static function search(string $request, string $col, int $paginate = 20)
    {
        return level::where($col, 'like', '%' . $request . '%')->orderBy( 'desc')->paginate($paginate);
    }

    /**
     * get created by data
     * 
     * @return json
     */

}
