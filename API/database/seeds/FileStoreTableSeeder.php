<?php

use App\Models\FileStore;
use Illuminate\Database\Seeder;

class FileStoreTableSeeder extends Seeder
{
    /**
     * @throws Exception
     */
    public function run()
    {
        FileStore::truncate();
    }
}