<?php

// ide-helper 更新
// php artisan clear-compiled
// php artisan ide-helper:generate
// php artisan optimize

// 创建 model
// php artisan infyom:model 模型名称 --fromTabel --tableName=表名(需要表前缀)
// php artisan infyom:model PreDrugA001 --fromTable --tableName=cf_pre_drug_a001

//创建 console
// php artisan make:command init

// predis 使用
// $redis = Redis::connection();
// $redis->set('fei',"aaaa");
// $data = $redis->get('fei');
// $redis->del('fei');

namespace Tests\Feature;

use Tests\TestCase;


/**
 * Class ExampleTest
 * 调用这里所有测试方法命令
 *          ./vendor/bin/phpunit  --filter 'Tests\\Feature'
 *          ./vendor/bin/phpunit   --filter ExampleTest
 *
 * 查看方法:
 *           ./vendor/bin/phpunit  --help
 *
 *
 * @package Tests\Feature
 */
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     *    ./vendor/bin/phpunit  --filter hello
     *    ./vendor/bin/phpunit --filter 'Tests\\Feature\\ExampleTest::testHello'
     */
    public function testHello()
    {
        // $this->call('GET','v1');
        exit("hello world");
    }

}
