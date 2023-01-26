<?php
class Node {
    public $data;
    public $next;

    public function __construct($dataz) {
        $this->data = $dataz;
        $this->next = null;
    }
}

class LinkedList {
    private $head;

    public function __construct() {
        $this->head = null;
    }

    /*
        * Add a node to the beginning of the list
        */
    public function addFirst($data) {
    
    	echo '<br/><br/>********************************************************** <br/> Data is : ' . $data . '<br/>'; 
        
        $node = new Node($data);
        echo ' <br/> node : <br/>';
        echo '<pre>'; print_r($node);
        echo ' <br/> node end: <br/>';
        
        echo ' <br/> @@@@@@@@@@@@ $this->head top start: <br/>';
        echo '<pre>'; print_r($this->head);
        echo ' <br/> @@@@@@@@@@@@ $this->head top end : <br/>';
        
        $node->next = $this->head;
        
        echo ' <br/> ############ node bottom start: <br/>';
        echo '<pre>'; print_r($node);
        echo ' <br/> ############ node bottom end : <br/>';
        
        $this->head = $node;
        
        echo ' <br/> !!!!!!!!!!!! $this->head bottom start: <br/>';
        echo '<pre>'; print_r($this->head);
        echo ' <br/> !!!!!!!!!!!! $this->head bottom end : <br/>';
        
    }

    /*
        * Add a node to the end of the list
        */
    
    public function addLast($data) {
        $node = new Node($data);
        if ($this->head === null) {
            $this->head = $node;
            return;
        }
        $current = $this->head;
        while ($current->next !== null) {
            $current = $current->next;
        }
        $current->next = $node;
    }

    /*
        * Insert a node at a specific position
        */
    
    public function insertNode($data, $position) {
        $newNode = new Node($data);
        if ($position == 1) {
        	echo '<br/> @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ $this->head @@@@@@@@@@@@@@@@@<br/>';
        	echo '<pre>'; print_r($this->head);
            $newNode->next = $this->head;
            $this->head = $newNode;
            
            echo '<br/> !!!!!!!!!!!!!!!!!!! $this->head after reassign !!!!!!!!!!! <br/>';
            echo '<pre>'; print_r($this->head);
            return;
        }

        $current = $this->head;
        echo '<br/> @@@@@@@@@@@@@@@@@@@@@@@@@@@@@ $current @@@@@@@@@@@@@@@@@<br/>';
      	echo '<pre>'; print_r($current);
        $count = 1;
        while ($current->next !== null && $count < $position - 1) {
        	echo '<br/> ############## count :  ############## <br/>';
            echo $count;
            echo '<br/> ############## position - 1 : <br/>';
            echo $position - 1;
            
            $current = $current->next;
            echo '<br/> !!!!!!!!!!!!!!!! $current after !!!!!!!!!!!!!!!!!! <br/>';
      		echo '<pre>'; print_r($current);
            
            $count++;
        }
		echo '<br/> ^^^^^^^^^^^^^^ newNode b4 assign ^^^^^^^^^^^^^^^^^^^^ <br/> ';
        echo '<pre>'; print_r($newNode);
        
        $newNode->next = $current->next;
        
        echo '<br/> ^^^^^^^^^^^^^^ newNode after assign ^^^^^^^^^^^^^^^^^^^^ <br/> ';
        echo '<pre>'; print_r($newNode);
        
        $current->next = $newNode;
    }

    /*
        * view all nodes
        */
        
    public function getAll() {
        $data = array();
        $current = $this->head;
        #echo '<br/> &&&&&&&&&&&&&&&&&&&&&&&&&&&& $current<br/> ';
        #echo '<pre>'; print_r($current);
        
        while ($current !== null) {
            $data[] = $current->data;
            #echo '<br/> ^^^^^^^^^^^^^^^^^^^^^ $data<br/> ';
            #echo '<pre>'; print_r($data);
            
            $current = $current->next;
        }
        //return $data;
        $linkarr = array();
        foreach($data AS $key=> $value){
        	$position = $key +1;
          if($key == 0 ){
          	$linkarr['position: '.$position.' head'] = $value;
          }else if($key == (count($data)-1) ){
          	$linkarr['position: '.$position.' tail'] = $value;
          }else{
          	$linkarr['position: '.$position.' node ' . $key ] = $value;
          }
          
        }
        return $linkarr;
    }
}

$list = new LinkedList();
$list->addLast('element1');
$list->addLast('element2');
$list->addLast('element3');
$list->addLast('element4');
$list->addLast('element5');

$elements = $list->getAll();
echo '<pre>'; print_r($elements);

foreach ($elements as $element) {
    echo $element . PHP_EOL;
}

echo '<br/> ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ Insert new node <br/>';
$list->insertNode('element6',4);

$elements = $list->getAll();
echo '<pre>'; print_r($elements);

?>
