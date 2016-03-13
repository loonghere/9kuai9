<?php
/**
 * 根据淘宝链接自动获取相关信息
 * 可用于淘宝客程序数据自动填充
 * 王雷 loonghere@qq.com
 * 2016-3-4 17:23:15
 */
namespace App\Common;
class Taobao
{
    public function __construct() {}

    public function getInfo($url)
    {
        $u = parse_url($url);
        //解析get参数
        $param = $this->convertUrlQuery($u['query']);
        $test['param'] = $param;
        if (!stripos('taobao.com', $u['host'])) {
            $shopUrl = "http://hws.m.taobao.com/cache/wdetail/5.0/?id=" . $param['id'];
        } else {
            $shopUrl = "http://detail.m.tmall.com/item.htm?id=" . $param['id'];
        }

        $file_contents = $this->httpRequest($shopUrl);
        if (!$file_contents) {
            $file_contents = file_get_contents($shopUrl);
        }
        if (!stripos('taobao.com',$u['host'] === false)) {
            $data = $this->getTaobaoShopInfo($file_contents);
        } else {
            $data = $this->getTmallShopInfo($file_contents);
        }
        $data['item_id'] = $param['id'];
        $coupon_rate = (string)($data['coupon_price'] / $data['price']);
        $coupon_rate = substr($coupon_rate, 0,4);
        $data['coupon_rate'] = $coupon_rate * 10000;
        return $data;
    }

    public function httpRequest($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
        curl_setopt($ch, CURLOPT_MAXREDIRS,2);
        $file_contents = curl_exec($ch);
        curl_close($ch);
        return $file_contents;
    }

    public function getTaobaoShopInfo($content)
    {
        $data = json_decode($content, true);
        $info = [];
        $tmp = json_decode($data['data']['apiStack'][0]['value'],true);
        $info['title'] = $data['data']['itemInfoModel']['title'];
        $info['volume'] = $tmp['data']['itemInfoModel']['totalSoldQuantity'];
        $info['coupon_price'] = $tmp['data']['itemInfoModel']['priceUnits'][0]['price'];
        if (substr_count($info['coupon_price'], '-')) {
            $tmp1 = explode('-',$info['coupon_price']);
            $info['coupon_price'] = min($tmp1[0],$tmp1[1]);
        }
        $info['price'] = $tmp['data']['itemInfoModel']['priceUnits'][1]['price'];
        if (substr_count($info['price'], '-')) {
            $tmp = explode("-",$info['price']);
            $info['price'] = min($tmp[0],$tmp[1]);
        }
        $info['pic_url'] = $data['data']['itemInfoModel']['picsPath'][0];
        $info['pic_url'] = str_replace("_320x320.jpg","",$info['pic_url']);
        $info['sellerId'] = $data['data']['seller']['userNumId'];
        $info['nick'] = $data['data']['seller']['nick'];
        return $info;
    }

    public function getTmallShopInfo($content)
    {
        $info = [];
        preg_match_all('/<title >(.*?) - 手机淘宝网 <\/title>/i',$content,$arr);
        $info['title'] = $arr[1][0];
        preg_match_all('/<strong class="oran">(.*?)<\/strong>/i',$content,$arr);
        $info['coupon_price'] = $arr[1][0];
        if (substr_count($info['coupon_price'], ' - ')) {
            $tmp1 = explode(' - ',$info['coupon_price']);
            $info['coupon_price'] = min($tmp1[0],$tmp1[1]);
        }
        preg_match_all('/<del class="gray">(.*?)<\/del>/i',$content,$arr);
        $info['price'] = $arr[1][0];
        if (substr_count($info['price'],' - ')) {
            $tmp = explode(" - ",$info['price']);
            $info['price'] = min($tmp[0],$tmp[1]);
        }
        preg_match_all('/月&nbsp; 销&nbsp; 量：(.*?)<\/p>/si',$content,$arr);
        $info['volume'] = trim($arr[1][0]);
        preg_match_all('/<img alt=".*?" src="(.*?)" \/>/',$content,$arr);
        $info['pic_url'] = str_replace('170','320',$arr[1][0]);
        $info['pic_url'] = str_replace("_320x320.jpg","",$info['pic_url']);
        preg_match('/nick=(.+?)&/',$content,$nicks);
        $info['nick'] = urldecode($nicks[1]);
        return $info;
    }

    public function convertUrlQuery($query)
    {
        $queryParts = explode('&', $query);
        $params = array();
        foreach ($queryParts as $param)
        {
            $item = explode('=', $param);
            $params[$item[0]] = $item[1];
        }
        return $params;
    }
}

// 用法如下
// $taobao = new Taobao;
// $data = $taobao->getInfo('https://detail.tmall.com/item.htm?id=42951581774');
// var_dump($data);