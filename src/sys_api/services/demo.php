<?php

//@REST_RULE: /log/$method
class LogREST extends XRuleService implements XService
{
    public function recv($xcontext,$request,$response)
    {
        $data = json_encode($_POST) ;
        XLogKit::logger("app")->info($data,"APPLOG");
        $response->success("OK");
    }

    public function fetch($xcontext,$request,$response)
    {

        $response->success("hellow world user: " . $request->uid );
    }
}
