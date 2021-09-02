<?php

namespace App\Services;

use App\Models\Safelock;
use App\Repositories\SafelockRepository;
use Illuminate\Support\Facades\DB;

class SafelockService implements SafelockRepository
{
    public function createSafelock($data)
    {
        $safelock_id = md5(microtime());
        $data['safelock_id'] = $safelock_id;
        $data['user_id'] = auth()->user()->id;
        unset($data['source']);
        // return $data;
        $safelock = Safelock::create($data);
        if($safelock){
            return ['message' => 'You have Successfully created a new safelock', 'status' => true,'safelock_id' => $safelock_id];
        }
        else{
            return ['message' => 'There was an issue while creating safelock. Try again in 5 minutes', 'status' => false];
        }
    }

    public function getInterestRate($data)
    {
        return DB::table('interest_rate')->select('interest')->where('days', $data);
    }
}