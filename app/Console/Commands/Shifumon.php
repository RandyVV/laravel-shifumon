<?php

namespace App\Console\Commands;

use Illuminate\Support\Arr;
use Illuminate\Console\Command;

class Shifumon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:shifumon';

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
        // On déclare les choix possibles
        $choices = ['Salamèche', 'Carapuce', 'Bulbizarre'];

        // On récupère le choix de l'utilisateur
        $userChoice = $this->choice(
            'Choisis ton Pokémon',
            $choices,
            array_rand($choices)
        );

        // On récupère le choix de l'ordinateur
        $computerChoice = Arr::random($choices);

        // On compare les choix
        if ($userChoice === $computerChoice) {
            $this->warn('Égalité');
        } elseif (
            ($userChoice === 'Salamèche' && $computerChoice === 'Bulbizarre') ||
            ($userChoice === 'Carapuce' && $computerChoice === 'Salamèche') ||
            ($userChoice === 'Bulbizarre' && $computerChoice === 'Carapuce')
        ) {
            $this->info('Tu as gagné');
        } else {
            $this->error('Tu as perdu');
        }
        $this->line('L\'ordinateur a choisi ' . $computerChoice . '.');
        $this->line('Tu as choisi ' . $userChoice . '.');
    }
}
