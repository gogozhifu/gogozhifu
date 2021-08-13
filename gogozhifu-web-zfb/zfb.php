<?php
/**
 * User: gump994
 * Date: 2021-08-08
 * Time: 18:08
 * Description: 利用网页版支付宝Cookie监听交易订单数据，实现个人支付宝收款试试回调
 *
 * 【GOGO支付】已经完整实现该模式云端监听收款，很稳定，效率很高，欢迎测试体验~
 *  官网地址： https://www.gogozhifu.com
 *
 * 微信：gump994  邮箱：gogozhifu@qq.com
 *
 */

goZfb('your-cookie', 'your-token', 'your-userId');

//调用支付宝交易订单列表接口
function goZfb($cookie, $token, $userId)
{
    $url = "https://mbillexprod.alipay.com/enterprise/tradeListQuery.json?ctoken=" . $token;
    $header = [
        'referer: https://mbillexprod.alipay.com/enterprise/bizTradeOrder.htm',
        'origin: https://mbillexprod.alipay.com',
        'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36'
    ];
    $data = [
        'billUserId' => $userId,
        'pageNum' => 1,
        'pageSize' => 20,
        'startTime' => date('Y-m-d') . ' 00:00:00',
        'endTime' => date("Y-m-d", strtotime("+1 day")) . ' 00:00:00',
        'status' => 'ALL',
        'queryEntrance' => 1,
        'entityFilterType' => 1,
        'sortTarget' => 'gmtCreate',
        'activeTargetSearchItem' => 'tradeNo',
        'tradeFrom' => 'ALL',
        'sortType' => 0,
        '_input_charset' => 'gbk'
    ];
    $res = go_curl($url, $data, $header, $cookie);

    print_r($res);
}

//发送Http请求
function go_curl($url, $post = 0, $header = 0, $cookie = 0, $nobaody = 0)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    if ($header) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    }
    if ($cookie) {
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($nobaody) {
        curl_setopt($ch, CURLOPT_NOBODY, 1);
    }
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}

?>
