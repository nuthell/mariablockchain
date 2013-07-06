<?php

namespace MariaBlockChain;

require_once "BlockChain.php";

class Account extends BlockChainObject
{
  var $account;

  public function __construct($account)
  {
    parent::__construct();

    $this->account = $account;
  }

  function getID($account)
  {
    self::log("Looking up account $account");
    $account_id = BlockChain::$db->value("select account_id from accounts where name = '$account'");
    if (!$account_id)
    {
        $account_id = BlockChain::$db->insert("insert into accounts (name) values ('$account')");
    }
    return $account_id;
  }

}