<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;


class MakeView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {nameView}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $nameBlade = $this->arguments()["nameView"];
        try {
           

            $bladePath = explode(":", $nameBlade);

            $folder = $bladePath[0];
            $bladename = $bladePath[1];
            
            $pathfinal = substr(config_path(),0,-6)."/resources/views/".$folder."/".$bladename.".blade.php";
            if(!file_exists($pathfinal)){
                if(!file_exists(substr(config_path(),0,-6)."/resources/views/".$folder)){
                    mkdir(substr(config_path(),0,-6)."/resources/views/".$folder, 0755, true);
                }
                file_put_contents($pathfinal, 'hello world');
                echo "view berhasil dibuat";
            }else{
                echo "blade sudah dibuat";
            }
           

            
       } catch (\Exception $e) {
            dd($e);
       }
    }
}
