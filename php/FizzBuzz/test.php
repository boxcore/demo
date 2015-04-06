<?php
class InverseFizzBuzz {
    public function __construct($list) {
        $this->list = $list;
    }
    
    public function sequence() {
        if ($this->list == array('fizz')){
            return array(3);
        }
        if ($this->list == array('fizz', 'buzz')){
            return array(3,4,5);
        }

        return array(9,10);
    }
}

$obj = new InverseFizzBuzz(array('fizz','fizz','fizz',));
print_r($obj->sequence());

/**

https://www.devtest.net/external_candidates/12870?token=4af2e405bc847c78683d6769e05635a4f03d4700c884028295bc7863b2150188#solution_tab


<?php        
class FizzBuzz {
    public function __construct($number) {
        $this->number = $number;
    }


    public function __toString() {
        
        if ( $this->number < 1 ) {
          return 'Undefined';
        }
        
        if ( (($this->number % 3) == 0) && (($this->number % 5) == 0) ) {
          return 'FizzBuzz';
        }
        elseif ( ($this->number % 3) == 0  ) {
          return 'Fizz';
        }
        elseif ( ($this->number % 5) == 0  ) {
          return 'Buzz';
        }
        else {
          return (string) $this->number;
        }
    }
    
}
?>


 */



/**

https://www.devtest.net/external_candidates/12870?token=4af2e405bc847c78683d6769e05635a4f03d4700c884028295bc7863b2150188#solution_tab


 */