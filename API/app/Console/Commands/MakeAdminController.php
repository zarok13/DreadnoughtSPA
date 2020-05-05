<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeAdminController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:controller {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new controller class in app/Http/Controller/Admin location';

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
        if(file_exists(base_path("app/Http/Controllers/Admin/".$name.".php"))){
            $this->line('Admin controller already exists!');
        } else {
            $myfile = fopen("app/Http/Controllers/Admin/".$name.".php", "w") or die("Unable to open file!");
            $txt = "<?php\n\nnamespace App\Http\Controllers\Admin;\n\nclass ".$name." extends Controller\n{\n    //\n}";
            fwrite($myfile, $txt);
            fclose($myfile);
            $this->line('Admin controller '.'"'.$name.'"'.' created successfully.');
        }
        return null;
    }
}
