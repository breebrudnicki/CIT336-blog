
        /*Input: Two numbers, an operator, and an answer
         * Processing: Check the childs answer
         * Output: Whether or not the answer is correct
         */

        function checkMath() {
            //declare variables
            var n1 = parseFloat(document.getElementById("numberOne").value);
            var n2 = parseFloat(document.getElementById("numberTwo").value);
            var op = document.getElementById("operator").value;
            var ans = parseFloat(document.getElementById("answer").value);

            var message;
            if (op == "+") {
                if (n1 + n2 == ans) {
                    message = "Correct! Good job.";
                } else {
                    message = "Incorrect. Try again!";
                }
            } else if (op == "-") {
                if (n1 - n2 == ans) {
                    message = "Correct! Good job.";
                } else {
                    message = "Incorrect. Try again!";
                }

            } else if (op == "*") {
                if (n1 * n2 == ans) {
                    message = "Correct! Good job.";
                } else {
                    message = "Incorrect. Try again!";
                }

            } else if (op == "/") {
                if (n1 / n2 == ans) {
                    message = "Correct! Good job.";
                } else {
                    message = "Incorrect. Try again!";
                }

            }

            document.getElementById("outputDivTwo").innerHTML = message;

        }
