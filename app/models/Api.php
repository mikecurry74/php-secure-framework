<?php declare(strict_types=1); // strict mode

/**
 * Created by PhpStorm.
 * User: mcurry
 * Date: 9/28/17
 * Time: 1:02 PM
 */
class Api extends Base
{
    /**
     * The names of the attributes that cannot be edited
     * externally after creation.
     *
     * @var array
     */
    protected $immutable_fields = [
        'id',
        'record_guid',
        'date_created',
        'created_by',
        'date_modified',
        'modified_by',
        'signature',
    ];

    public function __construct()
    {
        parent::__construct();
    }


    public function getAllUsersKeys(int $userId)
    {
        if (!Validate::recordId($userId)) {
            return null;
        }

        // TODO: get rid of the *
        return DB::query('SELECT * FROM `api` WHERE user_id=%i;', $userId);
    }
}