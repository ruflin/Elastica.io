<?php $this->getConfig()->raw = true; 
if (empty($this->counter)) {
    $this->counter = 0;
} 
echo ++$this->counter;

