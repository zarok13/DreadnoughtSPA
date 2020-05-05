<?php

namespace Tests\Unit;

use App\Http\Controllers\Admin\Defaults\FileStoreController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DreadnoughtTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testBasicTest()
    {
        $fileStoreController = new FileStoreController();
        $this->assertTrue($fileStoreController->getFileTypes('jpg'));
    }
}
