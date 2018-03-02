<?php
declare(strict_types=1);

class Tranche {
  var $maximumAvailable = 1000;
  var $currentlyInvested = 0;

  function addFunds($amount) {
    $newAmount = $this->currentlyInvested + $amount;
    if ($newAmount <= $this->maximumAvailable) {
      $this->setCurrentlyInvested($newAmount);
    } else {
      throw new Exception("exception");
    }
  }

  function getMaximumAvailable() {
    return $this->maximumAvailable;
  }

  function getCurrentlyInvested() {
    return $this->currentlyInvested;
  }

  function setCurrentlyInvested($amount) {
    $this->currentlyInvested = $amount;
  }

  function getRemainingAvailable() {
    return $this->maximumAvailable - $this->currentlyInvested;
  }
}
