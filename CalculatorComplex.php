<?php

class CalculatorComplex{

	public function sum($x,$xImag,$y,$yImag){

		$re=$x+$y;

		$im = $this->Imag($xImag)+$this->Imag($yImag);

		if($im>=0){

			return $re."+".$im."i" ;
		}else{

			return $re.$im."i" ;
		}
	}

	public function division($x,$xImag,$y,$yImag){


	  $re=($x*$y-$this->Imag($xImag)*$this->Imag($yImag))/25;

	  $im = $this->Imag($xImag)*$y-$x*$this->Imag($xImag)/25;

	  if($im>0){

		return $re."+".$im."i" ;
	}else{

		return $re.$im."i" ;
	}

	}

	public function subtraction ($x,$xImag,$y,$yImag){

		$re=$x-$y;

		$im = $this->Imag($xImag)-$this->Imag($yImag);

		if($im>=0){

			return $re."+".$im."i" ;
		}else{

			return $re.$im."i" ;
		}
	}

	public function multiplication($x,$xImag,$y,$yImag){


		$re=$x*$y-$this->Imag($xImag)*$this->Imag($yImag);

		$im = $this->Imag($xImag)*$y+$x*$this->Imag($yImag);


		if($im>=0){

			return $re."+".$im."i" ;
		}else{

			return $re.$im."i" ;
		}
	}


	protected function Imag($imag){

      if(substr($imag, -1)==="i"){

	  $imag=substr($imag,0,-1);

        if(iconv_strlen($imag,'UTF-8')===0){

	      $imag=0;

        }elseif(iconv_strlen($imag,'UTF-8')===1&&
			$imag=="-"){

			$imag=-1;

        }elseif(iconv_strlen($imag,'UTF-8')===1&&
	      $imag=="+"){

		   $imag=1;

	    }else{

		$imag=(integer)$imag;

		}

	  }else{

	   $imag=0;

      }
	  return $imag;
	}

}