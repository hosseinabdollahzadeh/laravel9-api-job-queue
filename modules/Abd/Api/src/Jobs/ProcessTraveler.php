<?php

namespace Abd\Api\Jobs;

use Abd\Api\Models\Traveler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessTraveler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $travelers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($travelers)
    {
        //
        $this->travelers = $travelers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newObject = [];
        foreach ($this->travelers as $key => $value) {
            $newObject[$key]['name'] = $value['name'];
            $newObject[$key]['email'] = $value['email'];
            $newObject[$key]['address'] = $value['adderes'];
            $newObject[$key]['created_at'] = now()->toDateTimeString();
            $newObject[$key]['updated_at'] = now()->toDateTimeString();
        }

        $chunks = array_chunk($newObject, 300); // For large sizes
        foreach ($chunks as $chunk) {
            Traveler::insert($chunk);
        }
    }
}
