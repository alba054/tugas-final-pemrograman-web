<?php namespace App\Models;

use CodeIgniter\Model;

class ComicModel extends Model
{
    protected $table = "comics";
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'author', 'publisher', 'cover', 'synopsis'];

    public function getComic($id=0)
    {
        if($id == 0)
        {
            return $this->findAll();
        }
        else
        {
            return $this->where(['id' => $id])->first();
        }
    }
}