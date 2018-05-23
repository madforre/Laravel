<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Document extends Model
{
    private $directory = 'docu';
    
    public function get($file = null)
    {
        // File::exists(string $path) 로 인자로 넘어온 파일이 존재하지 않으면, 
        // abort() Helper로 404 NotFoundHttpException 을 던지도록 했다. 
        // if 테스트를 통과하면, 인자로 받은 마크다운 파일의 내용을 읽어서 반환한다. 
        // 인자로 넘겨 받은 $file 값이 없을 경우를 대비해, index.md 를 기본값으로 지정했다.
        $file = is_null($file) ? 'index.md' : $file;
        if (! File::exists($this->getPath($file))) {
            abort(404, 'File not exist');
        }
        
        return File::get($this->getPath($file));
    }
    
    private function getPath($file)
    {
        return base_path($this->directory . DIRECTORY_SEPARATOR . $file);
    }
}
// getPath()란 메소드를 먼저 보자. base_path()는 프로젝트 루트 디렉토리의 절대 경로를 반환하는 Helper이다. 
// 추가 경로로 인자를 넣으면 덧붙여서 반환해 준다.

// 참고 : DIRECTORY_SEPARATOR 상수는 윈도우즈 시스템에서는 \ *nix 에서는 /를 반환한다.

