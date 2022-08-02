<?php

namespace App\Console\Commands;
use App\Components\ImportDataClient;
use Illuminate\Console\Command;

class ImportTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get data';

    /*
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $import = new ImportDataClient('Stream');
        $response = $import->client->request('GET', 'active-live-stream-count');
        //dd($response->getBody()->getContents());
        $data = json_decode($response->getBody()->getContents());
        foreach ($data as $item) {
            Stream::firstOrCreate([
                'name' => $item->name
            ], [
                'name' => $item->name,
                'description' => $item->description,
                
            ]);
        }
    
    }
}
