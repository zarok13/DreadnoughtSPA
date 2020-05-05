<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeTraits extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:trait {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create traits from command line';

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
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        if(file_exists("app/Traits/".$name.".php")){
            $this->line('Trait already exists!');
        } else {
            $myfile = fopen("app/Traits/".$name.".php", "w") or die("Unable to open file!");
            $txt = "<?php\n\nnamespace App\Traits;\n\ntrait ".$name."\n{\n    //\n}";
            fwrite($myfile, $txt);
            fclose($myfile);
            $this->line('Trait '.'"'.$name.'"'.' created successfully.');
        }
        return null;
    }
}
