<?php

class CheckFiles
{
        public function isFileExists($file)
        {
            if (!file_exists($file)) {
                throw new \Exception("{$file} is not exists\n");
            }
            return true;
        }
}
?>
