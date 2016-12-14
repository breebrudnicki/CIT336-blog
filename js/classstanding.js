    /*DEFINING TABLE
         *Input: students name, number of credits
         *Processing: determine students year in school
         *Output: Students name and year in school
         */
        function schoolYear() {
            var name = document.getElementById("name").value;
            var credits = parseFloat(document.getElementById("credits").value);

            var year;
            if ((credits >= 0) && (credits < 30)) {
                year = "freshman";
            } else if ((credits >= 30) && (credits < 60)) {
                year = "sophomore";
            } else if ((credits >= 60) && (credits < 90)) {
                year = "junior";
            } else if (credits >= 90) {
                year = "senior";
            }

            //Output of year in school
            document.getElementById("outputDiv").innerHTML = name + " is a " + year;
        }
