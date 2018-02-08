<?php
use PHPUnit\Framework\TestCase;

class ApiTest  extends TestCase
{

    public function testLog()
    {
        $domain  = XSetting::ensureEnv("API_DOMAIN") ;
        $conf    = XHttpConf::localSvc($domain,80);
        $this->curl = new XHttpCaller($conf);
        $data["coin"] = "btc" ;
        $resp = $this->curl->post("/log/recv",json_encode($data));
        $data = XRestResult::ok($resp) ;
        /* $this->assertTrue($data != null); */

    }

}
