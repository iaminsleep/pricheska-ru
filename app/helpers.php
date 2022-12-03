<?php

use Illuminate\Filesystem\Filesystem;

if (!function_exists('delete_folder')) {
    function delete_folder($path = '', $deleteFiles = false, $exceptFolderNames = [], $exceptFileNames = [])
    {
        $fs = new Filesystem();
        if (!$deleteFiles) {
            // delete directories
            $except_folder_names = $exceptFolderNames;

            $folder_paths = $fs->directories($path);
            foreach ($folder_paths as $folder_path) {
                $folder_name = last(explode('/', $folder_path));
                if (!in_array($folder_name, $except_folder_names)) {
                    $fs->deleteDirectory($folder_path);
                }
            }
        } else {
            // delete files
            $except_file_names = $exceptFileNames;

            $file_paths = $fs->files($path);
            foreach ($file_paths as $file_path) {
                $file_name = last(explode('/', $file_path));
                if (!in_array($file_name, $except_file_names)) {
                    $fs->delete($file_path);
                }
            }
        }
    }
}
