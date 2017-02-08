<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

class Zap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'zap:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate static site using Laravel';

  	/**
  	 * The router instance.
  	 *
  	 * @var \Illuminate\Routing\Router
  	 */
  	protected $router;

  	/**
  	 * An array of all the registered routes.
  	 *
  	 * @var \Illuminate\Routing\RouteCollection
  	 */
  	protected $routes;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
      parent::__construct();

      $this->router      = $router;
      $this->routes      = $router->getRoutes();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      try{
        $time_start = microtime(true);

        if(env('APP_ENV') == 'local'){
          //delete all files in env('APP_LOCAL_DEV_DIRECTORY', 'build_local') folder
          $files = \File::allFiles(env('APP_LOCAL_DEV_DIRECTORY', 'build_local'));

          foreach ($files as $file){
            $filename =  (string)$file;
            \File::delete($filename);
            $this->info('Deleted:'. $filename);
          }

          $directories = $files = \File::directories(env('APP_LOCAL_DEV_DIRECTORY', 'build_local'));
          foreach ($directories as $directory){
            $directoryname =  (string)$directory;
            if($directoryname != env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/storage'){
              \File::deleteDirectory($directory);
              $this->info('Deleted:'. $directory);
            }
          }
        }

        //delete all files in env('APP_PUBLIC_DIRECTORY', 'public') folder
        $files = \File::allFiles(env('APP_PUBLIC_DIRECTORY', 'public'));
        foreach ($files as $file){
            $filename =  (string)$file;
            if($filename != env('APP_PUBLIC_DIRECTORY', 'public').'/robots.txt'){
              \File::delete($filename);
              $this->info('Deleted:'. $filename);
            }
        }

        $directories = $files = \File::directories(env('APP_PUBLIC_DIRECTORY', 'public'));
        foreach ($directories as $directory){
          $directoryname =  (string)$directory;
          if($directoryname != env('APP_PUBLIC_DIRECTORY', 'public').'/storage'){
            \File::deleteDirectory($directory);
            $this->info('Deleted:'. $directory);
          }
        }

        if(\File::exists(env('APP_PUBLIC_DIRECTORY', 'public').'/index.php')) {
          \File::delete(env('APP_PUBLIC_DIRECTORY', 'public').'/index.php');
          $this->info('Deleted: index.php');
        }

        $this->info('Building site...');

        //loop thru all the routes
      		foreach ($this->routes as $route){

            $app = new \Illuminate\Foundation\Application(
                realpath(__DIR__.'/../../../')
            );

            $app->singleton(
                \Illuminate\Contracts\Http\Kernel::class,
                \App\Http\Kernel::class
            );

            $app->singleton(
                Illuminate\Contracts\Console\Kernel::class,
                \App\Console\Kernel::class
            );

            $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

            $response = $kernel->handle(
                $request = \Request::create($route->uri(), 'GET')
            );

            if($route->uri() == '/'){
              if(env('APP_ENV') == 'local'){
                if(\File::exists(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/index.html')) {
                  \File::put(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/index.html', $response->content());
                } else {
                  \File::put(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/index.html', $response->content());
                }
              }

              if(\File::exists(env('APP_PUBLIC_DIRECTORY', 'public').'/index.html')) {
                \File::put(env('APP_PUBLIC_DIRECTORY', 'public').'/index.html', $response->content());
              } else {
                \File::put(env('APP_PUBLIC_DIRECTORY', 'public').'/index.html', $response->content());
              }

            } else {
              if(env('APP_ENV') == 'local'){
                if(!\File::exists(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/'.$route->uri())) {
                  \File::makeDirectory(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/'.$route->uri());
                }

                \File::put(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/'.$route->uri().'/index.html', $response->content());
              }

              if(env('APP_ENV') == 'local'){

                if (!file_exists(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/storage')) {
                  $this->laravel->make('files')->link(storage_path('app/public'),env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/storage');
                  $this->info('The ['.env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/storage] directory has been linked.');
                }

              }

              if(!\File::exists(env('APP_PUBLIC_DIRECTORY', 'public').'/'.$route->uri())) {
                \File::makeDirectory(env('APP_PUBLIC_DIRECTORY', 'public').'/'.$route->uri());
              }

              \File::put(env('APP_PUBLIC_DIRECTORY', 'public').'/'.$route->uri().'/index.html', $response->content());

            }

          }

          $time_end = microtime(true);
          $execution_time = ($time_end - $time_start)/60;
          $message = 'Zap! Site built in '. round($execution_time, 4) . ' seconds!';

          $this->info($message);

          \File::put(env('APP_LOCAL_DEV_DIRECTORY', 'build_local').'/site_generated.txt', $message);
          \File::put(env('APP_PUBLIC_DIRECTORY', 'public').'/site_generated.txt', $message);

          \Log::info($message);

        } catch(\Exception $e) {
          $this->info('Sorry. An error has occurred. Please check the Laravel log file for details.');
        }
    }
}
