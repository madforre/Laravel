<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Document;
use App\Http\Requests;
use Cache;
use Image;



class DocumentsController extends Controller
{
    protected $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }
    
    public function show($file = '01-welcome.md')
    {
        
        $index = \Cache::remember('documents.index', 120, function () {
            return markdown($this->document->get());
        });

        $content = \Cache::remember("documents.{$file}", 120, function() use ($file) {
            return markdown($this->document->get($file));
        });

        return view('documents.index', compact('index', 'content'));
    }
    
    public function image($file)
    {
        $image = $this->document->image($file);

        return response($image->encode('png'), 200, [
            'Content-Type'  => 'image/png'
        ]);
    }

//    public function show($file = null)
//    {
//        return view('documents.index', [
//            'index'   => markdown($this->document->get()),
//            'content' => markdown($this->document->get($file ?: '01-welcome.md'))
//        ]);
//    }
}

// 생성자(Constructor)에서 App\Document 인스턴스를 주입(Dependency Injection)했다. 
// 뷰에 2개의 데이터를 바인딩하는데 $index는 왼쪽 사이드 바에 보여줄 목록이며, $content는 본문이다.

