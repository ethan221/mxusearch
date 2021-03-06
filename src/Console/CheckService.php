<?php

namespace Antsfree\Mxusearch\Console;

use Antsfree\Mxusearch\Mxusearch;
use Illuminate\Console\Command;

class CheckService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:check-server';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Mxusearch server status.';

    /**
     * CheckService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            $count = Mxusearch::getIndexCount();
            if (isset($count)) {
                return $this->line("搜索服务正常,当前共有 $count 条索引\n");
            }
        } catch (\Exception $e) {
            return $this->error("讯搜服务异常\n");
        }
    }
}
