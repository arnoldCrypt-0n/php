abstract class Object {
	
    public function __construct($tab=null) {
        if($tab){$this->hydrate($tab);}
        }
        
    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists( $this, $method) ) {
                $this->$method($value);
                }
            }
        } 
        
    public function toArray() {
        return $this->processArray(get_object_vars($this));
        } 
        
    private function processArray($array) {
        foreach($array as $key => $value) {
            if (is_object($value)) {
                $array[$key] = $value->toArray();
            }
            if (is_array($value)) {
                $array[$key] = $this->processArray($value);
            }
        }
        return $array;
        }  
        
    public function __toString() {
        return json_encode($this->toArray());
        }


}
