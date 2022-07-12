<?php
return [
    /*
     |------------------------------
     | Path
     |------------------------------
     |
     |
     |
     */
    'path' => [
        'avatar' => 'images/avatar/',
    ],


    /*
     |------------------------------
     | Message
     |------------------------------
     |
     |
     |
     */

    'message' => [

        //AUTH
        'register_succ' => 'User registered successfully.',
        'login_succ'    => 'User Login Successfully',
        'logout_succ'   => 'User LogedOut Successfully',
        'logout_fail'   => 'unsuccessfull Log Out ',
        'unauthorised'  => 'Unauthorised',

        //CRUD Success Message
        'create'        => 'Created Successfully',
        'update'        => 'Updated Successfully',
        'delete'        => 'Deleted Successfully',

        //CRUD Fail Message
        'fail_create'   => 'Fail While Creating!',
        'exist'        => 'The Record was exists'

    ]
];
