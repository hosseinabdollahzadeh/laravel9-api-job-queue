<?php

namespace Abd\Api\Jobs;

use Abd\Api\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $posts;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($posts)
    {
        //
        $this->posts = $posts;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $newObject = [];
        foreach ($this->posts as $key => $value) {
            $newObject[$key]['user_id'] = $value['userId'];
            $newObject[$key]['title'] = $value['title'];
            $newObject[$key]['body'] = $value['body'];
            $newObject[$key]['created_at'] = now()->toDateTimeString();
            $newObject[$key]['updated_at'] = now()->toDateTimeString();
        }
        $chunks = array_chunk($newObject, 300); // For large sizes
        foreach ($chunks as $chunk) {
            Post::insert($chunk);
        }
    }
}
