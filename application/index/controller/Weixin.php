<?php
namespace app\index\controller;
use think\Log;
use app\common\controller\User as commonUser;
class Weixin extends commonUser
{
    public function index()
    {

        //获得参数 signature nonce token timestamp echostr
        $nonce     = $_GET['nonce'];
        $token     = 'weixin';
        $timestamp = $_GET['timestamp'];

        $signature = $_GET['signature'];
        //形成数组，然后按字典序排序
        $array = array();
        $array = array($nonce, $timestamp, $token);
        sort($array);


        //拼接成字符串,sha1加密 ，然后与signature进行校验
        $str = sha1( implode( $array ) );
        // Log::record(json_encode($_GET),'notice');
        if( $str  == $signature && $_GET['echostr']){
            //第一次接入weixin api接口的时候
            echo  $_GET['echostr'];
            exit;
        }else{

            $this->reponseMsg();
        }

    }
    // 接收事件推送并回复
    public function reponseMsg(){
        //1.获取到微信推送过来post数据（xml格式）
        //$GLOBALS['HTTP_RAW_POST_DATA'] php7用不了
        $postArr = file_get_contents("php://input");
        Log::record('zheli','notice');

        Log::record(json_encode($postArr),'notice');
        //2.处理消息类型，并设置回复类型和内容
        /*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[FromUser]]></FromUserName>
<CreateTime>123456789</CreateTime>
<MsgType><![CDATA[event]]></MsgType>
<Event><![CDATA[subscribe]]></Event>
</xml>*/
        $postObj = simplexml_load_string( $postArr );
        //$postObj->ToUserName = '';
        //$postObj->FromUserName = '';
        //$postObj->CreateTime = '';
        //$postObj->MsgType = '';
        //$postObj->Event = '';
        // gh_e79a177814ed
        //判断该数据包是否是订阅的事件推送
        if( strtolower( $postObj->MsgType) == 'event'){
            //如果是关注 subscribe 事件
            if( strtolower($postObj->Event == 'subscribe') ){
                //回复用户消息(纯文本格式)
                $toUser   = $postObj->FromUserName;
                $fromUser = $postObj->ToUserName;
                $time     = time();
                $msgType  =  'text';
                $content  = '欢迎关注我们的微信公众账号'.$postObj->FromUserName.'-'.$postObj->ToUserName;
                $template = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							</xml>";
                $info     = sprintf($template, $toUser, $fromUser, $time, $msgType, $content);
                echo $info;
                /*<xml>
                <ToUserName><![CDATA[toUser]]></ToUserName>
                <FromUserName><![CDATA[fromUser]]></FromUserName>
                <CreateTime>12345678</CreateTime>
                <MsgType><![CDATA[text]]></MsgType>
                <Content><![CDATA[你好]]></Content>
                </xml>*/


            }
        }

        //当微信用户发送imooc，公众账号回复‘imooc is very good'
        /*<xml>
<ToUserName><![CDATA[toUser]]></ToUserName>
<FromUserName><![CDATA[fromUser]]></FromUserName>
<CreateTime>12345678</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[你好]]></Content>
</xml>*/
        /*if(strtolower($postObj->MsgType) == 'text'){
            switch( trim($postObj->Content) ){
                case 1:
                    $content = '您输入的数字是1';
                break;
                case 2:
                    $content = '您输入的数字是2';
                break;
                case 3:
                    $content = '您输入的数字是3';
                break;
                case 4:
                    $content = "<a href='http://www.imooc.com'>慕课</a>";
                break;
                case '英文':
                    $content = 'imooc is ok';
                break;

            }
                $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
//注意模板中的中括号 不能少 也不能多
                $fromUser = $postObj->ToUserName;
                $toUser   = $postObj->FromUserName;
                $time     = time();
                // $content  = '18723180099';
                $msgType  = 'text';
                echo sprintf($template, $toUser, $fromUser, $time, $msgType, $content);

        }
    }
*/
        //用户发送tuwen1关键字的时候，回复一个单图文
        if( strtolower($postObj->MsgType) == 'text' && trim($postObj->Content)=='tuwen2' ){
            $toUser = $postObj->FromUserName;
            $fromUser = $postObj->ToUserName;
            $arr = array(
                array(
                    'title'=>'imooc',
                    'description'=>"imooc is very cool",
                    'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    'url'=>'http://www.imooc.com',
                ),
                array(
                    'title'=>'hao123',
                    'description'=>"hao123 is very cool",
                    'picUrl'=>'https://www.baidu.com/img/bdlogo.png',
                    'url'=>'http://www.hao123.com',
                ),
                array(
                    'title'=>'qq',
                    'description'=>"qq is very cool",
                    'picUrl'=>'http://www.imooc.com/static/img/common/logo.png',
                    'url'=>'http://www.qq.com',
                ),
            );
            $template = "<xml>
						<ToUserName><![CDATA[%s]]></ToUserName>
						<FromUserName><![CDATA[%s]]></FromUserName>
						<CreateTime>%s</CreateTime>
						<MsgType><![CDATA[%s]]></MsgType>
						<ArticleCount>".count($arr)."</ArticleCount>
						<Articles>";
            foreach($arr as $k=>$v){
                $template .="<item>
							<Title><![CDATA[".$v['title']."]]></Title> 
							<Description><![CDATA[".$v['description']."]]></Description>
							<PicUrl><![CDATA[".$v['picUrl']."]]></PicUrl>
							<Url><![CDATA[".$v['url']."]]></Url>
							</item>";
            }

            $template .="</Articles>
						</xml> ";

            echo sprintf($template, $toUser, $fromUser, time(), 'news');

            //注意：进行多图文发送时，子图文个数不能超过10个
        }else{
            switch( trim($postObj->Content) ){
                case 1:
                    $content = '您输入的数字是1';
                    break;
                case 2:
                    $content = '您输入的数字是2';
                    break;
                case 3:
                    $content = '您输入的数字是3';
                    break;
                case 4:
                    $content = "<a href='http://www.imooc.com'>慕课</a>";
                    break;
                case '英文':
                    $content = 'imooc is ok';
                    break;
            }
            $template = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>";
//注意模板中的中括号 不能少 也不能多
            $fromUser = $postObj->ToUserName;
            $toUser   = $postObj->FromUserName;
            $time     = time();
            // $content  = '18723180099';
            $msgType  = 'text';
            echo sprintf($template, $toUser, $fromUser, $time, $msgType, $content);

        }//if end
    }//reponseMsg end


}
