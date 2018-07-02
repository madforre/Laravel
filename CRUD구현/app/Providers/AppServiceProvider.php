<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (glob(app_path() . '/Helpers/*.php') as $filename) {
          require_once($filename);
        }
        // 헬퍼 등록 이유 :
        // Laravel의 컨트롤러는 제약이 있기에 Helper를 구성
        // 어떤 곳에서도 접근 add() 함수에 접근 가능
        // 사용자가 만드는 함수 저장 (반복사용, 유틸리티)
        // 뷰에서도 접근 가능
        // 정식 메뉴얼에는 없음
        //
    }
}
