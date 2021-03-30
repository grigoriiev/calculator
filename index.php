<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Calculator</title>
</head>
<body>
<div class="container">
<?php
if(isset($_POST['submit'])){

    $result = '';

    $firstNumber=trim(strip_tags($_POST['firstNumber']));

    $secondNumber=trim(strip_tags($_POST['secondNumber']));

    $firstNumberImag=trim(strip_tags($_POST['firstNumberImag']));

    $secondNumberImag=trim(strip_tags($_POST['secondNumberImag']));

    $operation= $_POST['operation'];

  if(isset($firstNumber)&&

  isset($firstNumberImag)&&

  isset($secondNumberImag)&&

  isset($secondNumber)&&

  isset($operation)){

    require_once('CalculatorComplex.php');

          $calc= new CalculatorComplex;

      if($operation=='+'){

       $result = $calc->sum($firstNumber,$firstNumberImag,$secondNumber,$secondNumberImag);

      }else if($operation=='-'){

       $result =$calc->subtraction($firstNumber,$firstNumberImag,$secondNumber,$secondNumberImag);

      }else if($operation=='/'){

        if($secondNumber==0){

            $result ="деленние на ноль не возможно";

        }else{

            $result =$calc->division($firstNumber,$firstNumberImag,$secondNumber,$secondNumberImag);
        }
      }else if($_POST['operation']=='*'){

           $result=$calc->multiplication($firstNumber,$firstNumberImag,$secondNumber,$secondNumberImag);

      }else{

        $result = "Что-то пошло не так";

      }

  }else{

    $result ="Что-то пошло не так!!!";

}

}else{

    $result ="Введите числа";

}
?>
    <form class="form-inline" method="post" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF"], ENT_QUOTES);?>">
        <div class="form-group  mx-sm-3 mb-2">
            <input type="number" class="form-control" id="firstNumber" required name="firstNumber">
            <label for="firstNumber" class="sr-only">Первое число действительная часть:</label>
            <span>Первое число действительная часть</span>
        </div>
        <div class="form-group  mx-sm-3 mb-2">
            <label for="firstNumber" class="sr-only">Первое число мнимая часть</label>
            <input type="text" class="form-control" id="firstNumber" required name="firstNumberImag">
            <span>Первое число мнимая часть</span>
        </div>
        <div class="form-group  mx-sm-3  mb-2">
            <label for="inputState" class="sr-only">Операция</label>
            <select name="operation" id="inputState" class="form-control" required>
                <option selected></option>
                <option value="+">плюс</option>
                <option value="-">минус</option>
                <option value="/">деление</option>
                <option value="*">умножение</option>
            </select>
            <?php echo htmlspecialchars($_POST["operation"], ENT_QUOTES);?>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="secondNumber" class="sr-only">Второе число  действительная часть:</label>
            <input type="number" class="form-control" id="secondNumber" name="secondNumber" required>
            <span>Второе число  действительная часть:</span>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="secondNumber" class="sr-only">Второе число  мнимая часть</label>
            <input type="text" class="form-control" id="secondNumber" name="secondNumberImag" required>
            <span>Второе число  мнимая част</span>
        </div>
<?php
  echo  '<div class="form-group mx-sm-3 mb-2">';
  echo $result ;
  echo'</div>';
  ?>
        <button type="submit" class="btn btn-primary mb-2" name="submit" >Выполнить действие</button>
    </form>
    </div>
</body>

</html>