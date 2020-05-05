<?php


namespace App\Traits;

trait RemoveDirectory
{
    /**
     * @param $dir
     * @param $originalPath
     * @return bool
     */
    protected function deleteDirectory($dir, $originalPath): bool
    {
        // Remove directories recursively
        $scan_dir = scandir($dir);
        if (count($scan_dir) < 3) {
            // Remove directory if empty
            if ($dir == $originalPath) {
                // Remove the root directory and return function
                rmdir($originalPath);
                return true;
            }
            rmdir($dir);
            $this->deleteDirectory($dir = $originalPath, $originalPath);
        }
        foreach ($scan_dir as $item) {
            // Empty directory except for '.','..' items
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (is_file($dir . '/' . $item)) {
                unlink($dir . '/' . $item);
                if (end($scan_dir) == $item) {
                    /* When the last item removed from current directory
                     * also remove it if is root return function
                     * if not repeat for next directory
                     */
                    $this->deleteDirectory($dir, $originalPath);
                }
            } else {
                // If the directory has a child directory repeat for the next directory
                $this->deleteDirectory($dir . '/' . $item, $originalPath);
            }
        }
        return false;
    }
}
