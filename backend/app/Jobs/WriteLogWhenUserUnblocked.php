<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class WriteLogWhenUserUnblocked implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $client_ip;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $last_login_attemps;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$client_ip, $name, $last_login_attemps)
    {
        //
        $this-> email = $email;
        $this-> client_ip = $client_ip;
        $this-> name = $name;
        $this-> last_login_attemps = $last_login_attemps;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //ecrire dans le fichier log de laravel et syslog via la méthode debug
        $converted_last_login_attemps = Carbon::parse($this -> last_login_attemps);
        Log::debug('Compte débloqué. Adresse Ip de l\'utilisateur :'.$this -> client_ip.' Mr./Mme '.$this->name.' titulaire de l\'email : '.$this->email);
        DB::table('users')
                    ->where('email', $this->email)
                    ->update(['nb_login_attempts' => 0,'last_login_attemps'=> $converted_last_login_attemps, 'ip_client'=>$this -> client_ip]);  
    }
}
