<?php

namespace App\Console;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Services\MailService;
use App\Exports\MailReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class Kernel extends ConsoleKernel
{

    private $mailService;
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    public function __construct(Application $app, Dispatcher $events, MailService $mailService)
    {
        $this->mailService = $mailService;
        parent::__construct($app, $events);
    }

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $attachment = Storage::disk('public')->path('expired_documents.xlsx');
        $to_name = config('mail.to.name');
        $to_address = config('mail.to.address');
        $from_address = config('mail.from.address');
        $mail_frecuency = config('mail.schedule.frecuency');

        if ($mail_frecuency == 'weekly') {
            $schedule->call($this->mailService->sendMail($to_name, $to_address, $from_address, $attachment))
                ->weeklyOn(config('mail.schedule.weekday'), config('mail.schedule.hour'))
                ->before(function () {
                    Excel::store(new MailReportExport, 'public/expired_documents.xlsx');
                });
        }
        else if ($mail_frecuency == 'daily') {
            $schedule->call($this->mailService->sendMail($to_name, $to_address, $from_address, $attachment))
            ->daily()
            ->before(function () {
                Excel::store(new MailReportExport, 'public/expired_documents.xlsx');
            });
        }
        // $schedule->call($this->mailService->sendMail($to_name,$to_address, $from_address,$attachment))
        //                         ->everyMinute()
        //                         ->before(function () {
        //                             Excel::store(new MailReportExport, 'public/expired_documents.xlsx');
        //                         });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
