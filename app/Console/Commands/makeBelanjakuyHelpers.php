<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class makeBelanjakuyHelpers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'belanjakuy:helper {nameHelper}';

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
        $nameHelper = $this->arguments()["nameHelper"];
        $content = "<?php\n
namespace App\Http\HelperBelanjakuy;\n 
        
class ".$nameHelper." {\n
            
            
}\n
        
?>";
        try {
           


            
            $pathfinal = substr(config_path(),0,-6)."/app/Http/HelperBelanjakuy/".$nameHelper.".php";
            if(!file_exists($pathfinal)){
                file_put_contents($pathfinal, $content);
                echo "belanjakuyHelper berhasil dibuat sebelumnya";
            }else{
                echo "helper sudah dibuat";
            }
           

            
       } catch (\Exception $e) {
            dd($e);
       }
    }
}
