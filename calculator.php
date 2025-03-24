<!DOCTYPE html>
<html>
  <head>
    <title>Calculator</title>
    <link rel="stylesheet" type="text/css" href="calculator.css">
  </head>
  <body>
    <div class="calculator">
      <div class="display">
        <div id="left"></div>
        <div id="operator"></div>
        <div id="right"></div>
      </div>
      <div class="operations">
        <button>%</button>
        <button onclick="ce()">CE</button>
        <button onclick="clearCalc()">C</button>
        <button onclick="deleteCalc()"><</button>
        <button onclick="square()">x^2</button>
        <button onclick="divideByOne()">1/x</button>
        <button onclick="squareRoot()">√x</button>
        <button onclick="setOperator('/')">÷</button>
        <button onclick="setNumber(7)">7</button>
        <button onclick="setNumber(8)">8</button>
        <button onclick="setNumber(9)">9</button>
        <button onclick="setOperator('*')">X</button>
        <button onclick="setNumber(4)">4</button>
        <button onclick="setNumber(5)">5</button>
        <button onclick="setNumber(6)">6</button>
        <button onclick="setOperator('-')">-</button>
        <button onclick="setNumber(1)">1</button>
        <button onclick="setNumber(2)">2</button>
        <button onclick="setNumber(3)">3</button>
        <button onclick="setOperator('+')">+</button>
        <button onclick="setNumber(0)">0</button>
        <button onclick="setDecimal()">.</button>
        <button id="action-button" onclick="calculate()">=</button>
      </div>
    </div>
    <script src="calculator.js"></script>
  </body>
</html>