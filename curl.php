<?php

//初始化
$ch = curl_init();

// 要上传的本地文件地址"@F:/xampp/php/php.ini"上传时候，上传路径前面要有@符号
//$furl = "@E:/www/redpack3/images/banner-1.png";
$post_data = array (
    "name" => "王金香",
	"sex" =>'女'
);
//CURLOPT_URL 是指提交到哪里？相当于表单里的“action”指定的路径
$url = "http://localhost/test/curl_post.php";
//$post_data=json_encode($post_data,true);
//设置变量
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);//执行结果是否被返回，0是返回，1是不返回
curl_setopt($ch, CURLOPT_HEADER, 0);//参数设置，是否显示头部信息，1为显示，0为不显示
//伪造网页来源地址,伪造来自百度的表单提交
curl_setopt($ch, CURLOPT_REFERER, "http://www.qq.com");
//表单数据，是正规的表单设置值为非0
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);//设置curl执行超时时间最大是多少
//使用数组提供post数据时，CURL组件大概是为了兼容@filename这种上传文件的写法，
//默认把content_type设为了multipart/form-data。虽然对于大多数web服务器并
//没有影响，但是还是有少部分服务器不兼容。本文得出的结论是，在没有需要上传文件的
//情况下，尽量对post提交的数据进行http_build_query，然后发送出去，能实现更好的兼容性，更小的请求数据包。
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
//执行并获取结果
$output = curl_exec($ch);
print_r($output);
if($output === FALSE)
{
    echo "<br/>","cUrl Error:".curl_error($ch);
}
$output=json_decode($output,true);
//    释放cURL句柄
curl_close($ch);
echo "1115555555";
//$output = json_decode($output,true);
print_r($output);
?>