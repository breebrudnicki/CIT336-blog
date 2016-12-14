 function doPayment() {
            //get input from the user
            var principal = parseFloat(document.getElementById('principal').value);
            var annualRate = parseFloat(document.getElementById('annualRate').value);
            var years = parseFloat(document.getElementById('years').value);
            var periodsPerYear = parseFloat(document.getElementById('periodsPerYear').value);
            
            //call the function
            var payment = computePayment(principal, annualRate, years, periodsPerYear);
            
            //display a result to the user
            document.getElementById('output1').innerHTML = payment;
        }
        
        function doBalance() {
            //get input from the user
            var principal = parseFloat(document.getElementById('principal').value);
            var annualRate = parseFloat(document.getElementById('annualRate').value);
            var years = parseFloat(document.getElementById('years').value);
            var periodsPerYear = parseFloat(document.getElementById('periodsPerYear').value);
            var numberofPaymentsPaidToDate = parseFloat(document.getElementById('numberofPaymentsPaidToDate').value);
            
            //call the function
            var balance = computeBalance(principal, annualRate, years, periodsPerYear, numberofPaymentsPaidToDate);
            
            //display a result to the user
            document.getElementById('output2').innerHTML = balance;
        }
        function computePayment(principal, annualRate, years, periodsPerYear) {
            var r = annualRate / periodsPerYear;
            var n = periodsPerYear * years;
            var top = principal * r;
            var bottom = 1 - Math.pow( 1 + r, -n);
            var payment = top / bottom;
            return payment;
            
        }
        function computeBalance(principal, annualRate, years, periodsPerYear, numberofPaymentsPaidToDate) {
            var a = principal;
            var n = numberofPaymentsPaidToDate;
            var r = annualRate / periodsPerYear;
            var p = computePayment(principal, annualRate, years, periodsPerYear);
            var beginning = a * Math.pow(1 + r, n);
            var top1 = Math.pow(1 + r, n) - 1;
            var top2 = p * top1;
            var end = top2 / r;
            var balance = beginning - end;
            return balance;
                
        }
        
        function clearText() {
            document.getElementById('principal').value = "";
            document.getElementById('annualRate').value = "";
            document.getElementById('years').value = "";
            document.getElementById('periodsPerYear').value = "";
            document.getElementById('numberofPaymentsPaidToDate').value = "";
        }
