<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessProfilePictureUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public array $photo) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $filePath = cloudinary()->upload(
            $this->photo['path'], [
            'transformation' => [
                'width' => 300,
            ]
        ])->getSecurePath();
    }
}
