<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MyCommand extends Command
{

    //Tipos de parametros para el command
    //Parametro obligatorio {argument}
    //Parametro opcional {argument?} {argument=default}
    //Parametro array {argument*}
    //Opcion {--option} {--option=default} {--option=}

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:mycommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //$argument = $this->argument('argument');
        //$this->info('Argument value is: '.$argument);
        //$this->line('Line');
        //$this->withProgressBar(range(0, 3), function ($value) {
         //   sleep(1);
        //});
        //$name = $this->ask('What is your name?');
        //$this->info('Your name is '.$name);

        //$this->confirm('Do you wish to continue?');
        //$this->secret('What is the password?');
        //$this->choice('What is your name?', ['Taylor', 'Dayle'], 0);
        //$this->anticipate('What is your name?', ['Taylor', 'Dayle']);
        //$this->error('Something went wrong!');
        Log::info('MyCommand was run');
    }
}
