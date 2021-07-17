<?php


interface Fowl
{

    /*
    Any class implemnts this interface must provide this method which returns the instance of Egg
    */    

    public function layEgg() : Egg;
}

class Hen implements Fowl
{

    /*
    Hen : Implemnts fowl
    */    
    public function layEgg() : Egg{

        return new Egg('Hen');

    }

}


class Eagle implements Fowl
{

    /*

    Eagle Implements Fowl

    */

    public function layEgg() : Egg{

        return new Egg('Eagle');

    }

}

class Egg
{

    private $Fowl;    
    private $hatchCount = 0;

    public function __construct(string $fowlType)
    {
        /*
        storing fowltype in private property to be used later
        This approach assumes that string type must match with corresponding fowlType instance
        */

        $this->Fowl = $fowlType;

    }

    public function hatch() : ?Fowl
    {

        /*
        - This method hatches egg and return new instance of a class which implements fowl interface.
        - We will use string which consumer provides in constructor
        - WE use that stored private property string for instantiating object 
        */

        if($this->hatchCount > 0) {

            /*
            check count if exceeds from zero thow exception
            */
            throw new Exception('Hatch one time only');
            
        }

        $this->hatchCount++;
        /*
        getting string for fowlType 
        and use that variabel to instance an object 
        */
        $fowlType = $this->Fowl;
        return new $fowlType();

    }
}


$hen = new Hen();
$henEgg = $hen->layEgg(new Hen());

var_dump($henEgg->hatch());
$eagle = new Eagle();


$eagleEgg = $eagle->layEgg();
var_dump($eagleEgg->hatch());