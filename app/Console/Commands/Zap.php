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
      $time_start = microtime(true);

      if(env('APP_ENV') == 'local'){
        //delete all files in build_local folder
        $files = \File::allFiles('build_local');

        foreach ($files as $file){
          $filename =  (string)$file;
          \File::delete($filename);
          $this->info('Deleted:'. $filename);
        }

        $directories = $files = \File::directories('build_local');
        foreach ($directories as $directory){
          $directoryname =  (string)$directory;
          if($directoryname != 'build_local/storage'){
            \File::deleteDirectory($directory);
            $this->info('Deleted:'. $directory);
          }
        }
      }

      //delete all files in public folder
      $files = \File::allFiles('public');
      foreach ($files as $file){
          $filename =  (string)$file;
          if($filename != 'public/robots.txt'){
            \File::delete($filename);
            $this->info('Deleted:'. $filename);
          }
      }

      $directories = $files = \File::directories('public');
      foreach ($directories as $directory){
        $directoryname =  (string)$directory;
        if($directoryname != 'public/storage'){
          \File::deleteDirectory($directory);
          $this->info('Deleted:'. $directory);
        }
      }

      if(\File::exists('public/index.php')) {
        \File::delete('public/index.php');
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
                if(\File::exists('build_local/index.html')) {
                  \File::put('build_local/index.html', $response->content());
                } else {
                  \File::put('build_local/index.html', $response->content());
                }
              }

              if(\File::exists('public/index.html')) {
                \File::put('public/index.html', $response->content());
              } else {
                \File::put('public/index.html', $response->content());
              }

            } else {
              if(env('APP_ENV') == 'local'){
                if(!\File::exists('build_local/'.$route->uri())) {
                  \File::makeDirectory('build_local/'.$route->uri());
                }

                \File::put('build_local/'.$route->uri().'/index.html', $response->content());
              }

              if(env('APP_ENV') == 'local'){

                if (!file_exists('build_local/storage')) {
                  $this->laravel->make('files')->link(storage_path('app/public'),'build_local/storage');
                  $this->info('The [build_local/storage] directory has been linked.');
                }

              }

              if(!\File::exists('public/'.$route->uri())) {
                \File::makeDirectory('public/'.$route->uri());
              }

              \File::put('public/'.$route->uri().'/index.html', $response->content());
            }

        }

        // add error handling duh

        $time_end = microtime(true);

        //dividing with 60 will give the execution time in minutes other wise seconds
        $execution_time = ($time_end - $time_start)/60;

        $this->info('Zap! Site compiled in '. round($execution_time, 4) . ' seconds!');
    }
}
