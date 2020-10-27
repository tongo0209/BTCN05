<?php
    $tongo = array(
      'username' => 'tongo',
      'password' => '123456'
    );
    $users = array($tongo);

    function findUserByUsername($username)
    {
        global $users;
        for($i = 0; $i < sizeof($users); $i++)
        {
            $user = $users[$i];
            if($user['username'] == $username)
            {
                return $user;
            }
        }
        return null;
    }