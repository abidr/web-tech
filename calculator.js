let operator = "";

function setNumber(number) {
  if(operator === "") {
    document.getElementById("left").innerHTML += number;
  } else {
    document.getElementById("right").innerHTML += number;
  }
}
function setOperator(op) {
  document.getElementById("operator").innerHTML = op;
  operator = op;
}
function deleteCalc() {
  if(operator === "") {
    document.getElementById("left").innerHTML = document.getElementById("left").innerHTML.slice(0, -1);
  } else {
    if(document.getElementById("right").innerHTML === "") {
      operator = "";
      document.getElementById("operator").innerHTML = "";
    }
    document.getElementById("right").innerHTML = document.getElementById("right").innerHTML.slice(0, -1);
  }
}
function ce() {
  if(operator === "") {
    document.getElementById("left").innerHTML = "";
  } else {
    document.getElementById("right").innerHTML = "";
  }
}
function clearCalc() {
  operator = "";
  document.getElementById("left").innerHTML = "";
  document.getElementById("right").innerHTML = "";
  document.getElementById("operator").innerHTML = "";
}
function setDecimal() {
  if(operator === "") {
    if(document.getElementById("left").innerHTML === "") {
      document.getElementById("left").innerHTML = "0.";
    } else if(!document.getElementById("left").innerHTML.includes(".")) {
      document.getElementById("left").innerHTML += ".";
    }
  } else {
    if(document.getElementById("right").innerHTML === "") {
      document.getElementById("right").innerHTML = "0.";
    } else if(!document.getElementById("right").innerHTML.includes(".")) {
      document.getElementById("right").innerHTML += ".";
    }
  }
}
function calculate() {
  let left = Number(document.getElementById("left").innerHTML);
  let right = Number(document.getElementById("right").innerHTML);
  if (left === "" && right === "") {
    alert("Please enter a number");
  }
  switch(operator) {
    case "+":
      document.getElementById("left").innerHTML = left + right;
      break;
    case "-":
      document.getElementById("left").innerHTML = left - right;
      break;
    case "*":
      document.getElementById("left").innerHTML = left * right;
      break;
    case "/":
      document.getElementById("left").innerHTML = left / right;
      break;
  }
  document.getElementById("right").innerHTML = "";
  document.getElementById("operator").innerHTML = "";
}
function square() {
  if (operator === "") {
    let left = Number(document.getElementById("left").innerHTML);
    document.getElementById("left").innerHTML = Math.pow(left, 2);
  } else {
    let right = Number(document.getElementById("right").innerHTML);
    document.getElementById("right").innerHTML = Math.pow(right, 2);
  }
}
function divideByOne() {
  if (operator === "") {
    let left = Number(document.getElementById("left").innerHTML);
    if(!left) {
      alert("Cannot divide by 0");
      return;
    }
    document.getElementById("left").innerHTML = 1 / left;
  } else {
    let right = Number(document.getElementById("right").innerHTML);
    if(!right) {
      alert("Cannot divide by 0");
      return;
    }
    document.getElementById("right").innerHTML = 1 / right;
  }
}
function squareRoot() {
  if (operator === "") {
    let left = Number(document.getElementById("left").innerHTML);
    if(left < 0) {
      alert("Cannot square root a negative number");
      return;
    }
    document.getElementById("left").innerHTML = Math.sqrt(left);
  } else {
    let right = Number(document.getElementById("right").innerHTML);
    if(right < 0) {
      alert("Cannot square root a negative number");
      return;
    }
    document.getElementById("right").innerHTML = Math.sqrt(right);
  }
}