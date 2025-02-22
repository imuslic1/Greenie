<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Connection;
use App\Repositories\ConnectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ConnectionController extends Controller
{
    private $connectionRepository;

    public function __construct(ConnectionRepository $connectionRepository)
    {
        $this->connectionRepository = $connectionRepository;
    }

    public function store(Connection $connection, Request $request)
    {
        $accepted = (bool)$request->input('accepted'); 

        $this->connectionRepository->updateConnection($connection, $accepted);

        return redirect()->back();
    }
}
