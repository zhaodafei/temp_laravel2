<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class init extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'init {init}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
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
     * @return mixed
     */
    public function handle()
    {
        $method = $this->argument('init');
        if (method_exists($this, $method)) {
            $this->$method();
            echo "执行完成\n";
        }else{
            echo "${method} 方法不存在\n";
        }
    }

    /**
     * 执行命令  php artisan init test
     */
    public function test()
    {
        exit('test');
    }

    /**
     *  注册用户
     *
     *  执行命令  php artisan init register
     */
    public function register()
    {
        $userModel = new User();
        $userModel->account_name = 'fei';
        $userModel->password = Hash::make("123456");
        if ($userModel->save()) {
            exit('用户创建成功');
        }else{
            exit('用户创建失败');
        }
    }
}
