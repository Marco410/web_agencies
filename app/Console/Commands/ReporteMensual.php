<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Mail;

use App\Mail\MensualReport;
use App\User;


class ReporteMensual extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:mensual';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de correo mensual para avisar sobre el reporte.';

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
        $users = User::role('Dealer')->with('agencies')->withCount('agencies')->get();

        foreach($users as $user){
            if($user->agencies_count > 0){
                Mail::to($user->email)->send(new MensualReport($user));
            }
        }

        $this->info('Reporte mensual enviado correctamente');
        return Command::SUCCESS;
    }
}
