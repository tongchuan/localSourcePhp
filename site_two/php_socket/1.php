<?php   
  
/** 
* 聊天室服务器  websocket 专用 
*/  
class Server_socket  
{  
    private $socket;  
    private $accept = [];  
    private $hands = [];  
    function __construct($host, $port, $max)  
    {  
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);  
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, TRUE);  
        socket_bind($this->socket, $host,$port);  
        socket_listen($this->socket,$max);   
        print_r($this->socket);  
    }  
  
    public function start()  
    {  
        while (true) {  
  
            $cycle = $this->accept;  
            $cycle[] = $this->socket;  
            socket_select($cycle, $write, $except, null);  
  
            foreach ($cycle as $sock) {  
                if ($sock == $this->socket) {  
                    $this->accept[] = socket_accept($sock);  
                    $arr =  array_keys($this->accept);  
                    $key = end($arr);  
                    $this->hands[$key] = false;  
                }else{  
                    $length = socket_recv($sock, $buffer, 204800, null);  
                    $key = array_search($sock, $this->accept);  
                    if (!$this->hands[$key]) {  
                        $this->dohandshake($sock,$buffer,$key);  
                    }else if($length < 1){  
                        $this->close($sock);  
                    }else{  
                        // 解码  
                        $data = $this->decode($buffer);  
                        print_r($data);  
                        //编码  
                        $data = $this->encode($data);  
                        print_r($data);  
                        //发送  
                        socket_write($sock, $data,strlen($data));  
                        // 发送所有客户端
                        // foreach ($this->accept as $client) {  
                        //     socket_write($client, $data,strlen($data));  
                        // }     
                    }          
                }  
            }  
            sleep(1);  
        }  
    }/* end of start*/  
  
    /** 
     * 首次与客户端握手 
     */  
    public function dohandshake($sock, $data, $key) {  
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $data, $match)) {  
            $response = base64_encode(sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));  
            $upgrade  = "HTTP/1.1 101 Switching Protocol\r\n" .  
                    "Upgrade: websocket\r\n" .  
                    "Connection: Upgrade\r\n" .  
                    "Sec-WebSocket-Accept: " . $response . "\r\n\r\n";  
            socket_write($sock, $upgrade, strlen($upgrade));  
            $this->hands[$key] = true;  
        }  
    }/*dohandshake*/  
  
    /** 
     * 关闭一个客户端连接 
     */  
    public function close($sock) {  
        $key = array_search($sock, $this->accept);  
        socket_close($sock);  
        unset($this->accept[$key]);  
        unset($this->hands[$key]);  
    }  
  
    /** 
     * 字符解码 
     */  
    public function decode($buffer) {  
        $len = $masks = $data = $decoded = null;  
        $len = ord($buffer[1]) & 127;  
        if ($len === 126) {  
            $masks = substr($buffer, 4, 4);  
            $data = substr($buffer, 8);  
        }   
        else if ($len === 127) {  
            $masks = substr($buffer, 10, 4);  
            $data = substr($buffer, 14);  
        }   
        else {  
            $masks = substr($buffer, 2, 4);  
            $data = substr($buffer, 6);  
        }  
        for ($index = 0; $index < strlen($data); $index++) {  
            $decoded .= $data[$index] ^ $masks[$index % 4];  
        }  
        return $decoded;  
    }  
  
    /** 
     * 字符编码 
     */  
    public function encode($buffer) {  
        $length = strlen($buffer);  
        if($length <= 125) {  
            return "\x81".chr($length).$buffer;  
        } else if($length <= 65535) {  
            return "\x81".chr(126).pack("n", $length).$buffer;  
        } else {  
            return "\x81".char(127).pack("xxxxN", $length).$buffer;  
        }  
    }  
  
}/* end of class Server_socket*/  
  
$server_socket = new Server_socket('127.0.0.1',8008,1000);  
$server_socket->start(); sleep(1000); ?>  