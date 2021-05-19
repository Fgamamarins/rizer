<?php

namespace App\Console\Commands;

use App\Repositories\SupportTicketRepository;
use Illuminate\Console\Command;

/**
 * Class ChangeLatenessTicketStatus
 * @package App\Console\Commands
 */
class ChangeLatenessTicketStatus extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'lateness:ticket';
    /**
     * The console command description.
     * @var string
     */
    protected $description = 'Command description';
    /**
     * @var SupportTicketRepository
     */
    private $supportTicketRepository;

    /**
     * Create a new command instance.
     * @param SupportTicketRepository $supportTicketRepository
     * @return void
     */
    public function __construct(SupportTicketRepository $supportTicketRepository)
    {
        $this->supportTicketRepository = $supportTicketRepository;
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $latenessTickets = $this->supportTicketRepository->getLatenessTickets();

        foreach($latenessTickets as $latenessTickets) {
            $latenessTickets->status_enum = 3;
            $latenessTickets->save();
        }
    }
}
