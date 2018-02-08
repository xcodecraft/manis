<?php

 class AutoCommit  extends XInterceptor
 {
     static $aps=null;
     private $needCommit=true;
     public function _before($xcontext,$request,$response)
     {
         self::$aps = XAppSession::begin();
         XLogKit::logger("main")->info("app session begin");
     }
     static public function commitAndBegin()
     {
         self::$aps->commit();
         self::$aps = null;
         self::$aps = XAppSession::begin();
     }
     public function cancleCommit()
     {
         $this->needCommit = false;
     }
     public function _after($xcontext,$request,$response)
     {
         if($this->needCommit)
         {
             XLogKit::logger("main")->info("app session commit");
             self::$aps->commit();
         }
         self::$aps=null;
         $xcontext->autocommit=null;
     }
 }

class  AccessAllow  extends XInterceptor
{

    public function _after($xcontext,$request,$response)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    }
}


