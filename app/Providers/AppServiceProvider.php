<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
use App\News;
use App\New_Trash;
use App\Category;
use App\Category_Trash;
use App\Faculty_trash;
use App\Subject_trash;
use App\Employee_trash;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Lấy thông tin User hiện tại
        view()->composer('*',function($view){
            $view->with('auth',Auth::user());
        });

        // Tổng số tin tức đã xóa
         view()->composer('*',function($view){
            $new_draft_num =  News::where('isDraft','=',1)
                                    ->where('isBrowse','=',0)
                                    ->where('isPublish','=',0)->get();
            $view->with('num_dr_new',$new_draft_num);
        });

         // Tổng số tin tức chờ duyệt
         view()->composer('*',function($view){
            $new_browses_num =  News::where('isBrowse','=',1)
                                    ->where('isDraft','=',0)
                                    ->where('isPublish','=',0)->get();
            $view->with('num_br_new',$new_browses_num);
        });
         
         // Tổng số tin tức chờ xuất bản
         view()->composer('*',function($view){
            $new_publish_num =  News::where('isPublish','=',1)
                                    ->where('isDraft','=',0)
                                    ->where('isBrowse','=',0)->get();
            $view->with('num_pl_new',$new_publish_num);
        });

         //Tổng số tin tức đã xuất bản
        view()->composer('*',function($view){
            $num_published_new =  News::where('isPublish','=',0)
                                    ->where('isDraft','=',0)
                                    ->where('isBrowse','=',0)->get();
            $view->with('num_published_new',$num_published_new);
        });

        // Tổng số tin tức đã xóa
          view()->composer('*',function($view){
            $new_trash =  New_Trash::all();
            $view->with('num_trash_new',$new_trash);
        });

        //Tổng số chuyên mục đã xóa
           view()->composer('*',function($view){
            $category_trash =  Category_Trash::all();
            $view->with('num_trash_category',count($category_trash));
        });

        //Lấy chuyên mục đưa vào thanh menu
           view()->composer('*',function($view){
             $menu = Category::orderBy('orderBy','asc')
                                ->where('isShowNav',1)
                                ->get();
                $view->with('menu',$menu);
           });

        //Tổng số Khoa đã xóa
         view()->composer('*',function($view){
            $faculty_trash = Faculty_trash::all();
            $view->with('num_trash_faculty',count($faculty_trash));
         });

         //Tổng số phong ban đã xóa
         view()->composer('*',function($view){
            $subject_trash = Subject_trash::all();
            $view->with('num_trash_subject',count($subject_trash));
         });

         //Tổng số cán bộ đã xóa
         view()->composer('*',function($view){
            $employee_trash = Employee_trash::all();
            $view->with('num_trash_employee',count($employee_trash));
         });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
