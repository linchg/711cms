<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Http_client {
    public function get($url, $params = array())
    {
        return HttpClient::get($url, $params);
    }

    public function save($url,$save)
    {
        return HttpClient::save($url,$save);
    }

    public function post($url, $params = array())
    {
        return HttpClient::post($url, $params);
    }

    public function request(Request $request)
    {
        return HttpClient::request($request);
    }
}

abstract class HttpClient
{
    static function save($url, $save)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $raw = curl_exec($ch);
        if(curl_errno($ch) === 0) {
            if (file_exists($save)) {
                unlink($save);
            }
            $fp = fopen($save, 'x');
            fwrite($fp, $raw);
            fclose($fp);
            curl_close ($ch);
            return true;
        }else{
           $err = curl_error($ch);
           curl_close ($ch);
           return $err;
        }
    }

    static function get($url, $params)
    {
        $request = new Request($url, Request::METHOD_GET);
        $request->setParams($params);
        return self::request($request);
    }

    static function post($url, $params)
    {
        $request = new Request($url, Request::METHOD_POST);
        if(is_array($params) && count($params)) {
            $request->setParams($params);
        }
        return self::request($request);
    }

    static function request(Request $request)
    {
        $requestHeader[] = "API-RemoteIP: " . $_SERVER['REMOTE_ADDR'];
        foreach($request->getHeaders() as $k => $v) {
            $requestHeader[] = "{$k}:{$v}";
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $requestHeader);
        curl_setopt($ch, CURLOPT_URL, $request->getFullURL());
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $request->getMethod());
        if($request->getMethod() == Request::METHOD_POST) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getParam());
        }
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_PORT, $request->getPort());
        curl_setopt($ch, CURLOPT_TIMEOUT, $request->getTimeout());
        $responseBody = curl_exec($ch);
        $response = null;
        if(curl_errno($ch) === 0) {
            $info = curl_getinfo($ch);
            $response = new Response($info['http_code'], $responseBody);
            $response->setHeader(HttpHeader::CONTENT_TYPE, $info['content_type']);
            $response->setExecTime($info['total_time']);
        } else {
            $response = Response::errorResponse(curl_error($ch));
        }
        curl_close($ch);
        return $response;
    }
}

abstract class HttpHeader
{
    const CONTENT_TYPE = "Content-Type";
}

class Request {
    /**
     * 默认超时时间，秒
     */
    const DEFAULT_TIMEOUT = 60;

    const METHOD_GET  = "GET";

    const METHOD_POST = "POST";

    const METHOD_PUT  = "PUT";

    /**
     * @var 请求url
     */
    private $url;

    /**
     * @var 请求类型
     */
    private $method;

    /**
     * @var cookie值
     */
    private $cookies;

    /**
     * @var 请求参数
     */
    private $params;

    /**
     * @var 超时时间
     */
    private $timeoutSeconds;

    /**
     * @var 请求header头信息
     */
    private $headers;

    /**
     * @var 请求端口信息
     */
    private $port;

    public function __construct($url, $method = "get")
    {
        $this->url = $url;
        $this->method = $method;
        $this->timeoutSeconds = self::DEFAULT_TIMEOUT;
        $this->port = 0;
        $this->headers = array();
        $this->params  = array();
        $this->cookies = array();
    }

    /**
     * 设置端口
     * @param $port
     * @return $this
     */
    public function setPort($port)
    {
        $this->port = intval($port);
        return $this;
    }

    /**
     * 获取端口
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * 设置header信息
     *
     * @param $k
     * @param $v
     * @return $this
     */
    public function setHeader($k, $v)
    {
        $this->headers[$k] = $v;
        return $this;
    }

    /**
     * 设置多个header信息
     *
     * @param $kv
     * @return $this
     */
    public function setHeaders($kv)
    {
        foreach($kv as $k => $v) {
            $this->setHeader($k, $v);
        }
        return $this;
    }

    /**
     * 获取单个header信息或者全部header信息
     *
     * @param null $k
     * @param null $default
     * @return array|null
     */
    public function getHeaders($k = null, $default = null)
    {
        if($k == null) {
            return $this->headers;
        } else {
            if(isset($this->headers[$k])) {
                return $this->headers[$k];
            } else {
                return $default;
            }
        }
    }

    /**
     * 获取请求类型
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * 设置单个请求参数
     * @param $k
     * @param $v
     * @return $this
     */
    public function setParam($k, $v)
    {
        $this->params[$k] = $v;
        return $this;
    }

    /**
     * 设置多个请求参数
     * @param $kv
     * @return $this
     */
    public function setParams($kv)
    {
        foreach($kv as $k => $v) {
            $this->setParam($k, $v);
        }
        return $this;
    }

    /**
     * 获取单个参数信息或者全部参数信息
     * @param null $k
     * @param null $default
     * @return array|null
     */
    public function getParam($k = null, $default = null)
    {
        if($k == null) {
            return $this->params;
        } else {
            if(isset($this->params[$k])) {
                return $this->params[$k];
            } else {
                return $default;
            }
        }
    }


    public function setCookie($k, $v)
    {
        $this->cookies[$k] = $v;
        return $this;
    }

    public function setCookies($kvs)
    {
        foreach($kvs as $k => $v) {
            $this->cookies[$k] = $v;
        }
        return $this;
    }

    public function getCookie($k = null, $default = null)
    {
        if($k == null) {
            return $this->cookies;
        } else {
            if(isset($this->cookies[$k])) {
                return $this->cookies[$k];
            } else {
                return $default;
            }
        }
    }

    /**
     * 设置url
     * @param $url
     * @return $this
     */
    public function setURL($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * 获取请求url
     * @return mixed
     */
    public function getURL()
    {
        return $this->url;
    }

    /**
     * 获取完整的url信息
     * @return string
     */
    public function getFullURL()
    {
        if(count($this->params) && $this->getMethod() == self::METHOD_GET) {
            if(strpos($this->url,"?") > 0) {
                return $this->url . "&" . http_build_query($this->params);
            } else {
                return $this->url . "?" . http_build_query($this->params);
            }
        } else {
            return $this->url;
        }
    }

    /**
     * 设置超时时间
     * @param $seconds
     * @return $this
     */
    public function setTimeout($seconds)
    {
        $this->timeoutSeconds = intval($seconds);
        return $this;
    }

    /**
     * 返回超时时间
     * @return int
     */
    public function getTimeout()
    {
        return $this->timeoutSeconds;
    }
}

class Response {

    const STATUS_OK = 200;

    /**
     * @var header信息
     */
    private $headers;

    /**
     * @var  httpCode
     */
    private $httpCode;

    /**
     * @var body内容
     */
    private $body;

    /**
     * @var 执行时间
     */
    private $execTime;

    /**
     * @var 错误信息
     */
    private $error;

    public function __construct($code, $body)
    {
        $this->httpCode = $code;
        $this->body = $body;
        $this->error = "";
    }

    /**
     * 获取字符信息
     * @return string
     */
    public function getCharset()
    {
        if(strpos($this->headers[HttpHeader::CONTENT_TYPE], "charset")) {
            return substr($this->headers[HttpHeader::CONTENT_TYPE], strpos($this->headers[HttpHeader::CONTENT_TYPE], "charset") + 8);
        } else {
            return "";
        }
    }

    /**
     * 获取body信息
     * @return body
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * 获取http返回结果状态
     * @return httpCode
     */
    public function getStatus()
    {
        return $this->httpCode;
    }

    public function setHeader($k, $v)
    {
        $this->headers[$k] = $v;
    }

    /**
     * 返回http response header信息
     * @param $k
     * @param null $default
     * @return null
     */
    public function getHeader($k, $default = null)
    {
        if(isset($this->headers[$k])) {
            return $this->headers[$k];
        } else {
            return $default;
        }
    }

    public function setExecTime($time)
    {
        $this->execTime = $time;
    }

    /**
     * 获取执行时间
     * @return mixed
     */
    public function getExecTime()
    {
        return $this->execTime;
    }

    /**
     * 是否包含错误信息
     * @return bool
     */
    public function isError()
    {
        return !empty($this->error);
    }

    /**
     * 返回错误信息
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    public function setError($msg)
    {
        $this->error = $msg;
    }

    /**
     * 构造一个包混错误信息的 Response
     * @param $error
     * @return Response
     */
    static function errorResponse($error)
    {
        $response = new Response(0, "");
        $response->setError($error);
        return $response;
    }
}

