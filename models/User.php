<?php

class User
{
    public static function find($id)
    {
        // Dummy data
        $users = [
            1 => ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
            2 => ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
            3 => ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com'],
        ];

        // Print the returned value
        $result = isset($users[$id]) ? $users[$id] : null;
        return $result;
    }

    public static function all()
    {
        // Dummy data
        $users = [
            1 => ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
            2 => ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
            3 => ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com'],
        ];

        // Return all the users
        return $users;
    }
}
