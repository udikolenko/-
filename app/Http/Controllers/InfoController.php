<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfoController extends Controller
{
    //Метод для отображения информации о сервере (PHP)
    public function server()
{
    $dto = new ServerDataDto(
        phpversion(), 
        $_SERVER['SERVER_SOFTWARE'] ?? ''
    );

    return response()->json($dto->jsonSerialize());
}


    // Метод для отображения информации о клиенте (IP и User-Agent)
    public function client(Request $request)
{
    $dto = new ClientDataDto(
        $request->ip(),
        $request->header('User-Agent') ?? ''
    );

    return response()->json($dto->jsonSerialize());
}
    //Метод для отображения информации о базе данных
    public function database()
    {
        try {
            $databaseName = config('database.connections.mysql.database');
            $connectionStatus = DB::connection()->getDatabaseName() ? true : false;
        
            $dto = new DatabaseDataDto($databaseName, $connectionStatus);
        
            return response()->json($dto->jsonSerialize());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Could not connect to the database'], 500);
        }
    }
}
