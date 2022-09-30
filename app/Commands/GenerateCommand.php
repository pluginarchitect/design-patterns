<?php

namespace App\Commands;

use App\Markdown;
use App\Pages;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use LaravelZero\Framework\Commands\Command;

class GenerateCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'generate';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Generate a static site from markdown pages.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Pages::all()->map(function($page) {
            ob_start();
            $title = '';
            $content = Markdown::toHtml($page['contents']);
            include resource_path('/views/layout.html.php');
            $view = ob_get_clean();
            File::put(
                config('pages.dist') . '/' . $page['filename'] . '.html',
                $view
            );
        });
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
