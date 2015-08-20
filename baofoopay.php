<?php
class baofoopay extends CComponent
{

  public $MemberID = '100000178'; //测试商户号100000178

  public $TransID = '';

  public $PayID = '';

  public $TradeDate ='';

  public $OrderMoney = '';

  public $ProductName = '';

  public $Amount = '';

  public $Username = '';

  public $AdditionalInfo = '';

  public $PageUrl = '';

  public $ReturnUrl =  '';

  public $NoticeType = 1;

  public $Md5key = 'abcdefg';  //md5密钥（KEY）

  public $MARK = '|';

  public $TerminalID = '10000001'; //测试终端号10000001

  public $InterfaceVersion = '4.0';

  public $KeyType = 1;

  public function init()
  {

    Yii::import('application.vendors.baofoopay.baofoopay.*');

  }

  public function buildForm($request)
  {

    $params = array(
      'MemberID'=>$this->MemberID,
      'TransID'=>$this->TransID,
      'PayID'=>$this->PayID,
      'TradeDate'=>$this->TradeDate,
      'OrderMoney'=>$this->OrderMoney,
      'ProductName'=>$this->ProductName,
      'Amount'=>$this->Amount,
      'Username'=>$this->Username,
      'AdditionalInfo'=>$this->AdditionalInfo,
      'PageUrl'=>$this->PageUrl,
      'ReturnUrl'=>$this->ReturnUrl,
      'NoticeType'=>$this->NoticeType,
      'TerminalID'=>$this->TerminalID,
      'InterfaceVersion'=>$this->InterfaceVersion,
      'KeyType'=>$this->KeyType,
    );

    $service = new BaofoopayService($params, $this->Md5key, $this->MARK);

    return $service->build_form();

  }

  public function verify()
  {

    $verify = new BaofoopayVerify($this->Md5key);

    return $verify->verify();

  }

}

