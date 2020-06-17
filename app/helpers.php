<?php
// 自定义文件, 在composer.json 中引入  "app/helpers.php"

function showMsg($error = 0, $msg = '', $data = array(), $page_count = 0)
{
    $retJson = [
        'error' => $error,
        'msg' => $msg,
        'data' => $data,
        'page_count' => $page_count
    ];

    return $retJson;
}


function getPayload($key = null, $token = null)
{
    if ($token) {
        $a = \Tymon\JWTAuth\Facades\JWTAuth::setToken($token);
        $req = new \Illuminate\Http\Request(["token" => $token]);
        $a->setRequest($req);
    }
    $auth = \Tymon\JWTAuth\Facades\JWTAuth::parseToken();
    $payload = $auth->getPayload($auth->getToken());

    $res = null;
    if (!empty($key)) {
        if (is_string($key)) $res = $payload->get($key);
        if (is_array($key)) {
            foreach ($key as $v) {
                $res[$v] = $payload->get($key);
            }
        }
    }

    if (empty($key)) $res = $payload;

    return $res;
}


//获取当前毫秒时间
function getMsectime()
{
    list($msec, $sec) = explode(' ', microtime());
    $msectime = (float)sprintf('%.0f', (floatval($msec) + floatval($sec)) * 1000);
    $time = date('Y-m-d H:i:s -') . substr($msectime, -3);
    return $time . ' 毫秒';
}

/**
 * 是否开启时间日志
 * @param string $fileDir 日志位置
 * @param string $content_str 日志内容
 */
function putFileLogTime($content_str = '', $fileDir = 'logs/time.log')
{
    $dir = storage_path($fileDir);
    file_put_contents($dir, $content_str . " ==> " . getMsectime() . PHP_EOL, FILE_APPEND);

}

/**
 * 创建一个随机盐值
 * @param int $star
 * @param int $end
 * @return bool|string
 */
function generateSalt($star = -4, $end = 4)
{
    return substr(hash('md5', '123' . rand(0, 10)), -4, 4);
}

?>