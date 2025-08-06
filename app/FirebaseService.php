<?php

namespace App;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

class FirebaseService
{
    /**
     * Create a new class instance.
     */
  protected $database;

    public function __construct()
    {
        $factory = (new Factory)->withServiceAccount(config('firebase.projects.app.credentials.file'))->withDatabaseUri('https://laravel-11695-default-rtdb.firebaseio.com/');
        $this->database = $factory->createDatabase();
    }

    public function setData(string $path, array $data)
    {
        return $this->database->getReference($path)->set($data);
    }

    public function pushData(string $path, array $data)
    {
        return $this->database->getReference($path)->push($data);
    }

    public function getData(string $path)
    {
        return $this->database->getReference($path)->getValue();
    }

    public function deleteData(string $path)
    {
        return $this->database->getReference($path)->remove();
    }
}
